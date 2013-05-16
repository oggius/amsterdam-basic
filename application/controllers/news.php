<?php
class News extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('layout');
        $this->load->model('News_model', 'News');
        $this->layout->setLayout('layout_page_2col');
        $this->layout->setPartial('main_menu', $this->load->view('menu/main', array(), true));
    }
	
    public function index()
    {
        $newsList = $this->News->getLatest(3);
        $this->layout->setPartial('page_title', 'Последние новости с музыкального фронта');
        $this->layout->setPartial('page_description', 'Самые последние новости, а также всё самое интересное, что происходит в жизни группы, читайте здесь');
        $this->layout->view('news/index', array('news' => $newsList));
    }
    
    public function item($itemId)
    {
        $this->layout->setLayout('layout_page_1col');
        $itemId = intval($itemId);
        $newsItem = $this->News->getItem($itemId);
        if (!empty($newsItem)) {
            $this->layout->setPartial('page_title', $newsItem->title);
            $this->layout->setPartial('page_description', strip_tags($newsItem->text_short));
            $this->layout->view('news/item', array('item' => $newsItem));           
        } else {
            show_404();
        }
    }
}