<?php
class Guest extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('layout');
        $this->load->model('Guest_model', 'Guest');
        $this->layout->setLayout('layout_page_1col');
        $this->layout->setPartial('main_menu', $this->load->view('menu/main', array(), true));
    }
	
    public function index()
    {
        $records = $this->Guest->getRecords(0, 20);
        $totalCount = $this->Guest->getRecordsCount();
        $hasMore = $totalCount > count($records);
        $this->layout->setPartial('page_title', 'Гостевая книга, отзывы, рекомендации, пожелания');
        $this->layout->setPartial('page_description', 'Здесь можно ознакомиться с отзывами аудитоврии о живой музыке кавер группы AmsterDam, а также оставить свои отзывы, пожелания и рекомендации');
        $recordsTable = $this->load->view('guest/table', array('records' => $records), true);
        $this->layout->view('guest/index', array('recordsTable' => $recordsTable, 'recordsCount' => count($records), 'hasMore' => $hasMore));
    }
    
    public function post()
    {
        if ($this->input->server('HTTP_X_REQUESTED_WITH') === 'XMLHttpRequest') {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $message = $this->input->post('message');
            $ip = $this->input->ip_address();
            $validateResult = $this->Guest->validateRecord($name, $email, $message);
            $canPostResult = $this->Guest->checkCanPost($ip);
            if ($validateResult === true && $canPostResult === true) {
                $name = $this->Guest->convertName($name);
                $this->Guest->addRecord($name, $email, $message, $ip);
                $records = $this->Guest->getRecords(0, 20);
                $recordsTable = $this->load->view('guest/table', array('records' => $records), true);
                $this->output->set_output(json_encode(array('result' => 1, 'recordsTable' => $recordsTable)));
            } else {
                $this->output->set_output(
                                    json_encode(
                                        array(
                                            'result' => 0, 
                                            'message' => ($validateResult === true ? $canPostResult : $validateResult)
                                        )
                                    )
                                );
            }
        } else {
            show_404();
        }
    }
    
    public function loadMore()
    {
        if ($this->input->server('HTTP_X_REQUESTED_WITH') === 'XMLHttpRequest') {
            $currentAmount = (int)$this->input->post('currentAmount');
            $amountMore = (int)$this->input->post('amountMore');
            if ($currentAmount > 0 && $amountMore > 0) {
                $records = $this->Guest->getRecords(0, $currentAmount + $amountMore);
                $totalCount = $this->Guest->getRecordsCount();
                $hasMore = $totalCount > count($records);
                $recordsTable = $this->load->view('guest/table', array('records' => $records), true);
                $this->output->set_output(
                                    json_encode(
                                        array(
                                            'result' => 1, 
                                            'recordsTable' => $recordsTable, 
                                            'hasMore' => $hasMore ? 1 : 0
                                            )
                                        )
                                    );
            } else {
                $this->output->set_output(
                                    json_encode(
                                        array(
                                            'result' => 0
                                        )
                                    )
                                );
            }
        } else {
            show_404();
        }        
    }
}