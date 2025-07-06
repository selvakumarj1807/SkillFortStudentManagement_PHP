
function addRow() {
    var myName = document.getElementById("");
    var item = document.getElementById("item");
	
    var hsn = document.getElementById("hsn");
	var rate = document.getElementById("rate");
    var gst= document.getElementById("gst");
	
    var  mrp= document.getElementById("mrp");
var sno = 1;
    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);
 sno=sno+1;
    row.insertCell(0).innerHTML= sno.value;
    row.insertCell(1).innerHTML= DESCRIPTION OF GOODS.value;
    row.insertCell(2).innerHTML= HSN/SAC.value;
	row.insertCell(3).innerHTML= RATE.value;
    row.insertCell(4).innerHTML= GST;
	row.insertCell(5).innerHTML= MRP.valu;
    row.insertCell(6).innerHTML= QUANTITY.value;
    row.insertCell(8).innerHTML= AMOUNT.value;
row.insertCell(9).innerHTML= '<input type="button" value = "Delete" onClick="Javacsript:deleteRow(this)">';
}

function deleteRow(obj) {
     
    var index = obj.parentNode.parentNode.rowIndex;
    var table = document.getElementById("myTableData");
    table.deleteRow(index);
   
}

function load() {
   
    console.log("Page load finished");
    

}

