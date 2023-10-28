function show_hide_frm_create(){
    var drop_menu = document.querySelector(".create_acc");
    drop_menu.classList.toggle("display_none");
}
function checked_all(){
    $(document).ready(function() {
        $('#parentCheckbox').change(function() {
          var checkboxes = document.querySelectorAll('.cb_select');

          if($(this).is(':checked')) {
            checkboxes.prop('checked', true);
          } else {
            checkboxes.prop('checked', false);
          }
        });
      });
      
}

function xoa_obj(a){
    if(confirm("Xác nhận xóa tài khoản?")==true)
    {

    }
}