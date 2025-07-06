   $('.nav_link').on("click",function(){ 
  var page = $(this).attr('href');   
  $('#content').load(page);
});
  
  $('.ctype').on("change",function(){ 
  var tablePage = $(this).attr('href');   
  $('#table-content').load(tablePage);
});  

  $('.caction').on("click",function(){ 
  var actionPage = $(this).attr('href');   
  $('#action-page-nav').load(actionPage);
});


  $('.cremove').on("click",function(){ 
 var cid = $(this).attr('href'); 
alert(cid); 
   $.ajax({
    url:"remove_contacts.php",
    method:"POST",
    data:{cid:cid},
    success:function(data)
    {
     if(data == 'Ok')
     {
      $('#notification').html('<div class="alert alert-success">Contact was Removed Successfully</div>');
      $('#table-content').load('customers_list.php');
	 }
    }
   });
});

