<script>
function exportExcel(tb_id) {
    var tab_text = "<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange;
    var j = 0;
    tab = document.getElementById(tb_id); // id of table
    for (j = 0; j < tab.rows.length; j++) {
        tab_text = tab_text + tab.rows[j].innerHTML.replace(/<A[^>]*>|<\/A>/g, "").replace(/<img[^>]*>/gi, "").replace(
            /<input[^>]*>|<\/input>/gi, "") + "</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text = tab_text + "</table>";

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE ");

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) // If Internet Explorer
    {
        txtArea1.document.open("txt/html", "replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus();
        sa = txtArea1.document.execCommand("SaveAs", true,
            "excel_<?php echo isset($_POST['mem'])?$_POST['mem'].'_'.$_POST['year'].'_'.$_POST['month'].'_'.$_POST['day']:'';?>.xls"
            );
    } else //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel;charset=utf-8,\uFEFF' + encodeURIComponent(tab_text));

    return (sa);
}
</script>