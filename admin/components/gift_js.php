<script>
    $('[name=btn_stt]').click(function(){
        var $idx = $(this).attr('data');
        var func = $(this).attr('func');
        $.ajax({
                method: "POST",
                url: "api/update_state_gift.php",
                data: {
                    id_gift: $idx,
                    stt:(func=='lock'?1:0)
                }
            })
            .done(function (msg) {
                if(msg==1) {
                    $('#lstSL>tbody>tr:nth-child('+$idx+')>td:last-child>span').removeClass('text-primary').addClass('text-danger').html('Đang khoá');
                    $('#lstSL>tbody>tr:nth-child('+$idx+')>td:last-child>button').attr('func', 'unlock').html('Mở');
                }
                else
                {
                    $('#lstSL>tbody>tr:nth-child('+$idx+')>td:last-child>span').removeClass('text-danger').addClass('text-primary').html('Đang mở');
                    $('#lstSL>tbody>tr:nth-child('+$idx+')>td:last-child>button').attr('func', 'lock').html('Khoá');
                }
            }).fail(function(){
                
            })
    });
    
</script>