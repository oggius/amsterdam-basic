<script type="text/javascript">
$(document).ready(function(){
    $('.link-remove').click(function() {
        var albumId = $(this).attr('data-id');
        $('body').append('<div id="dialog-block"></div>');
        $('#dialog-block').text('Вы уверены, что хотите удалить целый альбом? Это повлечет за собой физическое удаление файлов, а так же удаление всех ссылок из отчетов на этот альбом. Всё равно удалить?');
        $('#dialog-block').dialog({
                            'buttons' : [
                                {
                                    'text' : 'Да, удалить',
                                    'click' : function(){
                                        location.href = '/admin/albums/delete/' + albumId;
                                    }
                                },
                                {
                                    'text' : 'Нет, я передумал',
                                    'click' : function(){
                                        $(this).dialog('close');
                                        $('#dialog-block').remove();
                                    }
                                }
                            ],
                            modal : true
                           });                           
    return false;                      
    });
})
</script>
<div class="admincontent">    
    <h2>Список фотоальбомов</h2>
    <?php foreach ($items as $item) { ?>
        <div class="itemAdmin">
            <h2><?php echo $item['name'];?></h2>
            <div class="text">
                <?php echo $item['description']; ?>
            </div>
            <img class="albumImg" src="<?php echo '/userfiles/gallery/' . $item['id'] . '/title.jpg' ?>" />
            <p style="clear:left; margin-top: 20px">
                <a class="link-edit" href="/admin/albums/edit/<?php echo $item['id']?>">Редактировать</a>&nbsp;&nbsp;
                <a class="link-edit" href="/admin/albums/photos/<?php echo $item['id']?>">Фотографии</a>&nbsp;&nbsp;
                <a class="link-remove" data-id="<?php echo $item['id'];?>" href="#">Удалить</a>&nbsp;&nbsp;
                <?php if ($item['show_in_gallery']) {?>
                    <a class="link-block" href="/admin/albums/deactivate/<?php echo $item['id']?>">Скрыть из галереи</a>&nbsp;&nbsp;
                <?php } else { ?>
                    <a class="link-unblock" href="/admin/albums/activate/<?php echo $item['id']?>">Показывать в галерее</a>&nbsp;&nbsp;
                <?php } ?>
            </p>
        </div>
    <?php } ?>    
</div>