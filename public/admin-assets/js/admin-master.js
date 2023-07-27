function contact_us_print()
{
    var divToPrint = document.getElementById("table-to-print");
    var newWin = window.open("", "_blank");
    newWin.document.write(divToPrint.outerHTML);
    newWin.print();
    newWin.close();
}