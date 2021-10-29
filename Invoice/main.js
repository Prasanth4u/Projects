function productUpdate() {
    if ($("#prodName").val() != null && $("#prodName").val() != '') {
        // Add product to Table
        productAddToTable();

        // Clear form fields
        formClear();

        // Focus to product name field
        $("#prodName").focus();
    }
}
var i = 1;
  
function productAddToTable() {
    // First check if a <tbody> tag exists, add one if not
    if ($("#productTable tbody").length == 0) {
        $("#productTable").append("<tbody></tbody>");
    }

    var gst = document.getElementById("gstPer").value;
    var unit_Price = document.getElementById("unitPrice").value;
    var q = document.getElementById("quant").value;
    //var p_name = 
    var net_Price = unit_Price*q;
    var tot_Gst = (gst/100)*net_Price;
    var tot_price = net_Price+tot_Gst;

    net_Price = Math.round(net_Price);
    tot_Gst = Math.round(tot_Gst);
    tot_price = Math.round(tot_price);


    // Append product to the table
    $("#productTable tbody").append("<tr>" +
        "<td>" + i + "</td>" + 
        "<td>" + $("#prodName").val() + "</td>" +
        "<td>" + $("#unitPrice").val() + "</td>" +
        "<td>" + $("#quant").val() + "</td>" +
        "<td id='net_price_loop'>" + net_Price + "</td>" +
        "<td>" + $("#gstPer").val() + "</td>" +
        "<td id='net_tax_loop'>" + tot_Gst + "</td>" +
        "<td id='net_grand_loop'>" + tot_price + "</td>" +
        "<td>" +
        "<button type='button' onclick='productDelete(this);' class='btn btn-default'>" +"<span>X</span>" +
        "</button>" +
        "</td>" +
        "</tr>");
        i = i+1;
        total_before_gst();
        total_tax();
        total_after_gst();
}

//total function starts

function total_before_gst() {

    var TotalValue = 0;

    $("tr #net_price_loop").each(function(index,value){
      currentRow = parseFloat($(this).text());
      TotalValue += currentRow
    });
    TotalValue = Math.round(TotalValue);
    var grand_price1 = decimalFormat(TotalValue);
    document.getElementById('b_gst').innerHTML = grand_price1;

}

function total_tax() {

    var TotalValue1 = 0;

    $("tr #net_tax_loop").each(function(index,value){
      currentRow = parseFloat($(this).text());
      TotalValue1 += currentRow
    });
    TotalValue1 = Math.round(TotalValue1);
    var grand_price2 = decimalFormat(TotalValue1);
    document.getElementById('t_tax').innerHTML = grand_price2;

}

function total_after_gst() {

    var TotalValue2 = 0;

    $("tr #net_grand_loop").each(function(index,value){
      currentRow = parseFloat($(this).text());
      TotalValue2 += currentRow
    });
    TotalValue2 = Math.round(TotalValue2);
    var grand_price3 = decimalFormat(TotalValue2);
    document.getElementById('a_gst').innerHTML = grand_price3;

}

//total function ends

//price formater starts
function decimalFormat(x){
    //var x=12345678;
    x=x.toString();
    var lastThree = x.substring(x.length-3);
    var otherNumbers = x.substring(0,x.length-3);
    if(otherNumbers != '')
        lastThree = ',' + lastThree;
    return res = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree;
}
//price formater ends

function formClear() {
    $("#prodName").val("");
    $("#unitPrice").val("");
    $("#quant").val("");
    $("#netPrice").val("");
    $("#gstPer").val("");
}

function productDelete(ctl) {
    $(ctl).parents("tr").remove();
    total_before_gst();
    total_tax();
    total_after_gst();
}
