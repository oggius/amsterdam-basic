<script type="text/javascript">
$(document).ready(function(){
    $('input').keyup(function(){
        $(this).parent().parent().parent('.itemAdmin').find('.link-update').show();
    });
    
    $('.link-update').click(function(){
        var parent = $(this).parent().parent('.itemAdmin');
        var photoId = parent.attr('data-id');
        var photoTitle = parent.find('input[name="photoTitle"]').val();
        var photoDescription = parent.find('input[name="photoDescription"]').val();
        $.post(
            '/admin/albums/updatephoto', 
            {'photoId' : photoId, 'photoTitle' : photoTitle, 'photoDescription' : photoDescription}, 
            function(resp){
                resp = $.parseJSON(resp);
                if (resp.result == 1) {
                    $('body').append('<div id="dialog-block"></div>');
                    $('#dialog-block').text('Фотография успешно обновлена');
                    $('#dialog-block').dialog({
                                        'buttons' : [
                                            {
                                                'text' : 'Ок',
                                                'click' : function(){
                                                    $(this).dialog('close');
                                                }
                                            }
                                        ],
                                        modal : true,
                                        close : function(){
                                            $('#dialog-block').remove();
                                        }
                                       });                     
                } else {
                    $('body').append('<div id="dialog-block"></div>');
                    $('#dialog-block').text('При обновлении фото произошла ошибка!');
                    $('#dialog-block').dialog({
                                        'buttons' : [
                                            {
                                                'text' : 'Жаль',
                                                'click' : function(){
                                                    $(this).dialog('close');
                                                }
                                            }
                                        ],
                                        modal : true,
                                        close : function(){
                                            $('#dialog-block').remove();
                                        }
                                       });                     
                }
            });
        return false;
    });
    
    $('.link-remove').click(function(){
        var parent = $(this).parent().parent('.itemAdmin');
        var photoId = parent.attr('data-id');
        $.post(
            '/admin/albums/deletephoto', 
            {'photoId' : photoId}, 
            function(resp){
                resp = $.parseJSON(resp);
                if (resp.result == 1) {
                    location.reload();
                }
            });
        return false;
    });
    
    $('.add-photo').click(function(){
        $(this).parent().remove();
        $('.addPhoto').show();
        return false;
    })
})
</script>
<div class="admincontent">    
    <h2>Список фотографий из альбома '<?php echo $albumData['name']?>'</h2>
    <div class="itemAdmin">
        <a href="#" class="add-photo">Добавить фотографию</a>
    </div>
    <div class="itemAdmin addPhoto" style="margin-bottom: 20px">
        <form method="post" action="/admin/albums/addphoto" enctype="multipart/form-data">
            <p class="formlabel">Название фотографии</p>
            <p><input type="text" name="photo_title" /></p>

            <p class="formlabel">Описание фотографии</p>
            <p><input type="text" name="photo_description" /></p>

            <p class="formlabel">Файл фотографии</p>
            <p><input type="file" name="photo_img" /></p>            
            
            <input type="hidden" name="album_id" value="<?php echo $albumData['id'];?>"/>
            
            <p><input type="submit" value="Загрузить" /></p>                        
        </form>
    </div>
    <hr style="display: block; margin-bottom: 20px"/>
    <?php foreach ($items as $item) { ?>
        <div class="itemAdmin" data-id="<?php echo $item['id']?>">
            <img class="albumImg" style="float: left" src="<?php echo $item['src'] ?>" width="150" />
            <div class="photoData">
                <p class="formlabel">Название фото</p>
                <p><input type="text" name="photoTitle" value="<?php echo $item['title']; ?>"/></p>
                <p class="formlabel">Короткое описание</p>
                <p><input type="text" name="photoDescription" value="<?php echo $item['description']; ?>" /></p>
            </div>
            <p style="clear:left; margin-top: 20px" class="links-block">
                <a class="link-update" href="#">Обновить</a>&nbsp;&nbsp;
                <a class="link-remove" href="#">Удалить</a>&nbsp;&nbsp;
            </p>
        </div>
    <?php } ?>    
</div>