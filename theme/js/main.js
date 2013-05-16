function trim(str) {
	str = str.replace(/^\s+/, '');
    for (var i = str.length - 1; i >= 0; i--) {
        if (/\S/.test(str.charAt(i))) {
            str = str.substring(0, i + 1);
            break;
        }
    }
    return str;
}

function generateDialog(dialogText)
{
    $('body').append('<div id="customDialogBlock">' + dialogText +  '</div>');
    $('#customDialogBlock').dialog({
                                buttons : [{
                                    text : 'Закрыть',
                                    click : function() {    
                                        $(this).dialog('close');
                                        $('#customDialogBlock').remove();
                                    }
                                }],
                                modal: true
                           });
}

$(document).ready(function(){
    $('.showguestform').on('click', function(){
        $(this).hide();
        $('.guestform').show();
    })
    
    $('.sendguestmessage').on('click', function(){
        var name = $('input[name="guestname"]').val();
        var email = $('input[name="guestemail"]').val();
        var message = $('textarea[name="guestmessage"]').val();
        var antispam = $('textarea[name="antispam"]').val();
        
        $.post('/guest/post', {'name' : name, 'email' : email, 'message' : message, 'antispam' : antispam}, function(resp){
            resp = $.parseJSON(resp);
            if (resp.result == 1) {
                $('.recordsTable').replaceWith(resp.recordsTable);
                $('.guestform').hide();
                $('.showguestform').text('Оставить отзыв').show();
                $('input[name="guestname"]').val('');
                $('input[name="guestemail"]').val('');
                $('textarea[name="guestmessage"]').val('');
            } else {
                generateDialog(resp.message);
            }
        })
    })
    
    $('.loadMore').on('click', function(){
        var currentAmount = $('.guestrecord').length;
        var amountMore = 20;
        $.post('/guest/loadMore', {'currentAmount' : currentAmount, 'amountMore' : amountMore}, function(resp){
            resp = $.parseJSON(resp);
            if (resp.result == 1) {
                $('.recordsTable').replaceWith(resp.recordsTable);
                if (resp.hasMore == 0) {
                    $('.loadMore').remove();
                }
            }
        })
    })
})