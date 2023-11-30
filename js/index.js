    initW_H();
    function initW_H(){
    var h_scr = window.innerHeight;
    var w_scr = window.innerWidth;
    var srcLogin = document.querySelector(".form_size");
    var h_scrLogin = h_scr;
    var w_scrLogin = h_scrLogin*800.0/1340;
    if(w_scrLogin>w_scr){
        h_scrLogin = w_scr*1340.0/800;
        w_scrLogin = w_scr;
    }
    srcLogin.style.height = h_scrLogin + "px";
    srcLogin.style.width = w_scrLogin + "px";
    }
    window.onresize = initW_H;

    function show_hide_dropdown(){
        var drop_menu = document.querySelector(".dropdown-menu");
        drop_menu.classList.toggle("display_none");
    }

    var menu_item=document.querySelectorAll(".menu_item");
        menu_item.forEach((item)=>{
            var _this = item;
            item.addEventListener("click",()=>{checkedBox(_this);});
        })
    function checkedBox(_this){
        var box = _this.querySelector("input[type='checkbox']:checked");
        var lab = _this.querySelector("label");
        if(box!=null){
            lab.style.color = "red";
            box.style.color = "red";
        }
        else{
            lab.style.color = "gray";
        }
    }
    