
function chk(val) {

	$.ajax({
		
		url: "repeated_cus.php",
		type: "POST",
	data:'d_id='+val,
	success: function(data){
		
		$("#putval").html(data);
	}
	});
}
function getDistrict(val) {
	
	$.ajax({
		url: "get_district.php",
		type: "POST",
	data:'d_id='+val,
	success: function(data){
		$("#district_id").html(data);
		$("#districts").html(data);
	}
	});
}
function selectDepartment(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}

function onlyNos(e,t)
{
	   try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    return false;
                }
                return true;
            }
            catch (err) {
                alert(err.Description);
            }

}

function ValidateForm() {
var x = document.forms["myForm"]["email"].value;
var atpos = x.index0f("@");
var dotpos = x.lastIndex0f(".");
if( atpos<1 || dotpos<atpos+2 ||  dotpos+2>=x.length){
	alert("Not a valid e-mail address");
 return false;
}

}

        function onlyAlphabets(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))
                    return true;
                else
                    return false;
            }
            catch (err) {
                alert(err.Description);
            }
        }


		function getSub(val) {
	
	
	$.ajax({
		url: "get_item.php",
		type: "POST",
	data:'d_id='+val,
	success: function(data){
		$("#item").html(data);
	}
	});
	}

function getcnum(val) {
	
	$.ajax({
		url: "getcustomer.php",
		type: "POST",
		data:'d_id='+val,
		    
		success: function(data){
		   $("#cnumber").val(data); 
				}
				
	
	});
	}
	

	
	function getcaddress(val) {
	
	$.ajax({
		url: "getcustomeraddress.php",
		type: "POST",
		data:'d_id='+val,
		    
		success: function(data){
		   $("#address").val(data); 
				}
				
	
	});
	}

	function getcpin(val) {
	
	$.ajax({
		url: "getcpin.php",
		type: "POST",
		data:'d_id='+val,
		    
		success: function(data){
		   $("#cpinno").val(data); 
				}
				
	
	});
	}
	
	function getcstate(val) {
	
	$.ajax({
		url: "get_state.php",
		type: "POST",
		data:'d_id='+val,
		    
		success: function(data){
		   $("#states").val(data); 
				}
				
	
	});
	}
	
	function getd(val) {
	
	$.ajax({
		url: "get_cdistrict.php",
		type: "POST",
		data:'d_id='+val,
		    
		success: function(data){
		//	alert(data);
		   $("#dis").val(data); 
				}
				
	
	});
	}
	
	function getcemail(val) {
	
	$.ajax({
		url: "get_cemail.php",
		type: "POST",
		data:'d_id='+val,
		    
		success: function(data){
		   $("#email").val(data); 
				}
				
	
	});
	}
	
function getCusCompany(val) {
	
	$.ajax({
		url: "get_cus_company.php",
		type: "POST",
		data:'d_id='+val,
		    
		success: function(data){
	         $("#company").val(data);   
		   $("#cusaddress").val(data); 
		
				}
				
	
	});
	}
	
function getcusid(val) {
	
	$.ajax({
		url: "get_cus_id.php",
		type: "POST",
		data:'d_id='+val,
		    
		success: function(data){
		//alert(data);
	         $('#cusid').html(data); 			 
	         $('#cusid').val(data); 			 
				}
				
	
	});
	}
	
	function getcusid2(val) {
	
	$.ajax({
		url: "get_cus_tin.php",
		type: "POST",
		data:'d_id='+val,
		    
		success: function(data){
	         $("#cusid2").html(data);   
	         $("#cusid2").val(data);   
				}
				
	
	});
	}
	
	
	///////////////////////////////////SUPPLIER///////////////////////////////
	
		function getsperson(val) {
	
	$.ajax({
		url: "get_sup_per.php",
		type: "POST",
		data:'d_id='+val,
		    
		success: function(data){
	         $("#sperson").val(data);   
				}
				
	
	});
	}
		
		function gstsgst(val) {
	
	$.ajax({
		url: "get_sup_gst.php",
		type: "POST",
		data:'d_id='+val,
		    
		success: function(data){
	         $("#sgst").val(data);   
				}
				
	
	});
	}
	
			
		function getsaddress(val) {
	
	$.ajax({
		url: "get_sup_address.php",
		type: "POST",
		data:'d_id='+val,
		    
		success: function(data){
	         $("#saddress").val(data);   
				}
				
	
	});
	}
				
		function getsphone(val) {
	
	$.ajax({
		url: "get_sup_phone.php",
		type: "POST",
		data:'d_id='+val,
		    
		success: function(data){
	         $("#ph").val(data);   
				}
				
	
	});
	}
					
		function getsmail(val) {
	
	$.ajax({
		url: "get_sup_mail.php",
		type: "POST",
		data:'d_id='+val,
		    
		success: function(data){
	         $("#semail").val(data);   
				}
				
	
	});
	}
						
		function getsstate(val) {
	
	$.ajax({
		url: "get_sup_state.php",
		type: "POST",
		data:'d_id='+val,
		    
		success: function(data){
	         $("#states").val(data);   
				}
				
	
	});
	}
							
		function getsdist(val) {
	
	$.ajax({
		url: "get_sup_dis.php",
		type: "POST",
		data:'d_id='+val,
		    
		success: function(data){
	         $("#dis").val(data);   
				}
				
	
	});
	}
			function getspin(val) {
	
	$.ajax({
		url: "get_sup_pin.php",
		type: "POST",
		data:'d_id='+val,
		    
		success: function(data){
			//alert(data);
	         $("#spinno").val(data);   
				}
				
	
	});
	}
	
	
	
	/////////////////////////////////////////////////////////////////////////
	

	
	
	
	
	
	
	
	
function getHsn(val) {
	
	$.ajax({
		url: "get_hsn.php",
		type: "POST",
		data:'d_id='+val,
		     dataType: "json", 
		success: function(data){
	         $("#hsn").val(data);   

				}
				
	
	});
	
	}
	
	
		
	
	
	
function getcount(val) {
	
	$.ajax({
		url: "get_count.php",
		type: "POST",
		data:'d_id='+val,
		     dataType: "json", 
		success: function(data){
	         $("#count").val(data);   

				}
				
	
	});
	
	}
	
	
	
	
	
	
function getRate(val) {
	
	$.ajax({
		url: "get_rate.php",
		type: "POST",
		data:'d_id='+val,
		     dataType: "json", 
		success: function(data){
	         $("#rate").val(data);   

				}
				
	
	});
	}	
	
//----FOR GST REQUEST-TESTING--OPENING---//	
	
	function getGst(val) {
	
	$.ajax({
		url: "get_gst.php",
		type: "POST",
		data:'d_id='+val,
		     dataType: "json", 
		success: function(data){
	         $("#gst").val(data);   

				}
				
	
	});
	}		
	
	
	//FOR MRP
	
	
	function getMrp(val) {
	
	$.ajax({
		url: "get_mrp.php",
		type: "POST",
		data:'d_id='+val,
		     dataType: "json", 
		success: function(data){
	         $("#mrp").val(data);   

				}
				
	
	});
	}	
	
	//GET INVOICE Number
	
		function getinvno(val) {
	
	$.ajax({
		url: "get_tab.php",
		type: "POST",
		data:'d_id='+val,
		dataType: "json", 
		success: function(data){
		//	alert(data);
	         $("#no").val(data);   

				}
				
	
	});
	}		
	
	//GET SALE RETURN INVOICE Number
	
		function getsaleinvno(val) {
	
	$.ajax({
		url: "get_tab_sale.php",
		type: "POST",
		data:'d_id='+val,
		dataType: "json", 
		success: function(data){
		//	alert(data);
	         $("#rino").val(data);   

				}
				
	
	});
	}	
	
	
	
	
	
	
	
//----FOR GST REQUEST-TESTING--CLOSING--//		
	

function getCompany(val) {
	
	$.ajax({
		url: "get_company.php",
		type: "POST",
		data:'d_id='+val,
		    dataType: "json", // Set the data type so jQuery can parse it for you
		success: function(data){
		      
	         $("#contact").val(data[0]);   
			 $("#address").val(data[2]);   
			 $("#phone").val(data[1]);   
				}
	
	});
	}

function selectDepartment(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}

function myFunction() {

    var x = document.getElementById("item").value;
		var y=document.getElementById("hsn").value;
			var z=document.getElementById("rate").value;
		 var a=document.getElementById("gst").value;

	        var b=document.getElementById("qty").value;




    $.ajax({
		url: "get_price.php",
		type: "POST",
		data:'d_id='+x,
		    dataType: "json", // Set the data type so jQuery can parse it for you
		success: function(data){
		   //   x=x* data[0];
			 // y=x* data[1]/100;
			  $("#hsn").val(data[0]); 

			 $("#gst").val(data[1]); 
			 

			 
			// $("#balance").val(data[1]);   
				}
	
	});
	
	
}
function getStock(val) {
	
	$.ajax({
		url: "get_stock.php",
		type: "POST",
		data:'d_id='+val,
		    dataType: "json", // Set the data type so jQuery can parse it for you
		success: function(data){
		      
	         $("#item_name").val(data[0]);   
			 $("#hsn").val(data[3]);   
			 $("#gst").val(data[2]);  
             $("#rate").val(data[1]); 
			 
			 
			 
				}
	
	});
	}
