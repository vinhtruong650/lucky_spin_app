initW_H();
function initW_H() {
    var h_scr = window.innerHeight;
    var w_scr = window.innerWidth;
    var srcLogin = document.querySelector(".form_size");
    if (h_scr < w_scr) {
        var w_scrLogin = h_scr * 800.0 / 1340;
        srcLogin.style.height = h_scr + "px";
        srcLogin.style.width = w_scrLogin + "px";
    } else {
        var h_scrLogin = w_scr * 1340.0 / 800;
        srcLogin.style.height = h_scrLogin + "px";
        srcLogin.style.width = w_scr + "px";
    }
}
window.onresize = initW_H;

function btn(){
    alert('oke');
}