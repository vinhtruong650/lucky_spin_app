<script>
    var $btn;
    var code;
    function initCode(){
        code = Math.floor(Math.random()*8999)+1000;
        $('.modal-body>b').html(code);
    }
    $('.btn_fail').click(function(){
        $btn = $(this);
        $('.btn_agree').val($(this).val());
        initCode();
    })
    $('.btn_agree').click(function(){
        if($('.modal-body>input').val()!==code+''){
            $('.modal-body>p').html('*Mã code không đúng');
            initCode();
            return;
        }
        var idBtn = $(this).val();
        var tdOfBtn = $('#'+idBtn+'');
        var btn_c = $btn;
        $.ajax({
                method: "POST",
                url: "api/update_state_logs.php",
                data: {
                    id_Btn: idBtn,
                    type: 1,
                }
            })
            .done(function (msg) {
                if(msg==1) {
                   tdOfBtn.html('Thất bại').removeClass('text-warning').removeClass('text-primary').addClass('text-danger');
                   btn_c.addClass('d-none-btn-update');
                }else if(msg==-1) {
                    alert("Đã có lỗi xảy ra");
                }
                $('.modal-body>input').val("");
                $('#myModal').modal('hide');    
            }).fail(function(){
                alert("Đã có lỗi xảy ra");
                $('.modal-body>input').val("");
                $('#myModal').modal('hide'); 
            });
    })
    $('.btn_del').click(function(){
        $('.modal-body>input').val("");
        $('.modal-body>p').html('');
    })
    var thisbtn;
    var stt;
    $('.btn_success').click(function(){
        thisbtn = $(this);
        stt = $(this).attr('data-stt');
        $('.btn_agree_sc').val($(this).val());
    })
    $('.btn_agree_sc').click(function(){
        var idBtn = $(this).val();
        var tdOfBtn = $('#'+idBtn+'');
        var btn_c = thisbtn;
        var sta = stt;
        $.ajax({
                method: "POST",
                url: "api/update_state_logs.php",
                data: {
                    id_Btn: idBtn,
                    type: sta,
                }
            })
            .done(function (msg) {
                if(msg==1) {
                    if(sta==1){
                        tdOfBtn.html('Thất bại').removeClass('text-primary').addClass('text-danger');
                        btn_c.removeClass('btn-warning').addClass('btn-primary');
                        btn_c.html('Khôi phục');
                        btn_c.attr('data-stt',2);
                    }else{
                        tdOfBtn.html('Thành công').removeClass('text-danger').addClass('text-primary');
                        btn_c.removeClass('btn-primary').addClass('btn-warning');
                        btn_c.html('Huỷ lượt');
                        btn_c.attr('data-stt',1);
                    }
                }else if(msg==-1){
                    alert("FĐã có lỗi xảy ra");
                }
                $('#Modal_success').modal('hide');    
            }).fail(function(){
                alert("FĐã có lỗi xảy ra"); 
            });
    })



    $('.export_exc_btn').click(function(){
        exportExcel('lstSL');
    })
</script>