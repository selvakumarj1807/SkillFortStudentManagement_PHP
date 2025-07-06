<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<title>SPS Online Shop</title>
<meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="HandheldFriendly" content="True">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- CSS  -->
<link rel="stylesheet" href="lib/font-awesome/web-fonts-with-css/css/fontawesome-all.css">
<link rel="stylesheet" href="css/materialize.min.css">
<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/style.css">
<!-- materialize icon -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- Owl carousel -->
<link rel="stylesheet" href="lib/owlcarousel/assets/owl.carousel.min.css">
<link rel="stylesheet" href="lib/owlcarousel/assets/owl.theme.default.min.css">
<!-- Slick CSS -->
<link rel="stylesheet" type="text/css" href="lib/slick/slick/slick.css">
<link rel="stylesheet" type="text/css" href="lib/slick/slick/slick-theme.css">
<link rel='stylesheet' href="swiper-slider.css"> 
<!-- Magnific Popup core CSS file -->
<link rel="stylesheet" href="lib/Magnific-Popup-master/dist/magnific-popup.css">
<style>
  a{
    color: #fff;
  }
/* The Modal (background) */
.click {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  
  -webkit-animation-name: fadeIn; /* Fade in the background */
  -webkit-animation-duration: 0.4s;
  animation-name: fadeIn;
  animation-duration: 0.4s
}

/* Modal Content */
.click-content {
  position: fixed;
  bottom: 0;
  background-color: #fefefe;
  width: 100%;
  -webkit-animation-name: slideIn;
  -webkit-animation-duration: 0.4s;
  animation-name: slideIn;
  animation-duration: 0.4s
}

/* The Close Button */
.close {  
  float: right;
  font-size: 28px;
  font-weight: bold;
}


.click-body {padding: 2px 16px;}

.click-footer {
  padding: 2px 16px;
  background-color: #16881b;
  color: white;
  height:40px;
}

/* Add Animation */
@-webkit-keyframes slideIn {
  from {bottom: -300px; opacity: 0} 
  to {bottom: 0; opacity: 1}
}

@keyframes slideIn {
  from {bottom: -300px; opacity: 0}
  to {bottom: 0; opacity: 1}
}

@-webkit-keyframes fadeIn {
  from {opacity: 0} 
  to {opacity: 1}
}

@keyframes fadeIn {
  from {opacity: 0} 
  to {opacity: 1}
}



    /* The Modal (background) */
  .modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 50%;
}

/* The Close Button */


.close:hover,
.close:focus {
  color: #fff;
  text-decoration: none;
  cursor: pointer;
}
.ex3 {
  height: 210px;
  width: 280px;
  overflow: auto;
  border-radius: 10px;
}
.one1
{
	  text-align:center;   
    border-left:none;
    border-right:none;
    border-bottom:none;  
    padding-top: 30px;
    padding-bottom: 10px;
    border-bottom: 1px solid;
}
.one
{
	  text-align:center;   
    border-left:none;
    border-right:none;
    border-bottom:none;  
    padding-top: 10px;
    padding-bottom: 10px;
    border-bottom: 1px solid;
}
.two
{
    text-align:center;
    font-size: 20px;
   
}
.ownh4{
  font-size: 16px;
    text-align: center;
    margin-top: -90px;
    margin-left: 4%;
    line-height: 110%;
    color: #d71149;
    font-family: auto;
    /* margin: 1.14rem 0 0.912rem 0; */
}
.color{
  color: #d71149;
  font-family: auto;
}
.ownh6{
  font-size: 16px;
    text-align: center;
    margin-left: -5%;
    line-height: 110%;
    font-family: auto;
    /* margin: 1.14rem 0 0.912rem 0; */
}
.ownbtn{
  background-color: #d71149;
    height: 35px;
   /* margin-left: 67%;
    margin-top: -12%;
    width: 35%;
    margin-top: -60px;*/  
    padding-bottom: 0px;
}
.pro-list{
    margin-left: 0%;
    border: 1px solid;
	color: #00000094;
    width: 66px;
    padding: 2px;
}
form {
  width: 300px;
  margin: 0 auto;
  text-align: center;
  padding-top: 50px;
}

.value-button {
  display: inline-block;
  border: 1px solid #ddd;
  margin: 0px;
  width: 25px;
 
  color: #00000094;
  text-align: center;
  vertical-align: middle;  
 
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
.value-button1 {
  display: inline-block;
  border: 1px solid #ddd;
  margin: 0px;
  width: 25px;

  color: #00000094;
  text-align: center;
  vertical-align: middle;  
 
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.value-button:hover {
  cursor: pointer;
}

form #decrease {
  margin-right: -4px;
  border-radius: 8px 0 0 8px;
}

form #increase {
  margin-left: -4px;
  border-radius: 0 8px 8px 0;
}

/* form #input-wrap {
  margin: 0px;
  padding: 0px;
} */

input#number {
  text-align: center;
  border: none;
  border-top: 1px solid #ddd;
  border-bottom: 1px solid #ddd;
  margin: 0px;
  width: 40px;
 height: 23px;
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
.swiper-container {
    width: 100%; 
    padding: 10px 0px 10px 0px;
}    
 .swiper-slide {
        text-align: center;
        font-size: 18px;
        height:40px;
        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }
    .btn-tab
    {
      height: 30px;
    width: 100%;
    border-color: #16881b;
    /* border: double; */
    background-color: white;
    }
	.column-r {
  float: left;
  width: 40%;
  padding: 10px;
 /* Should be removed. Only for demonstration */
}
	.column-l {
  float: left;
  width: 60%;
  padding: 10px;
 /* Should be removed. Only for demonstration */
}
.column1 {
  float: left;
  width: 45%;
	padding-top: 10px;
 
 /* Should be removed. Only for demonstration */
}
.column2 {
  float: right;
  width: 55%;
	padding-top: 10px;
 
 /* Should be removed. Only for demonstration */
}
/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
/*h6 {
    font-size: 1.2rem;
    line-height: 110%;
    margin: 0.5rem 0 0.4rem 0;
}*/
h6 {
	font-family:auto;
    font-weight: 500;
    font-size: 1rem;
    line-height: 110%;
    margin: 0.5rem 0 0.4rem 0;
}
.line {
    border-bottom: 1px solid;
}
	p
	{
		font-family:auto;
		color: slategray;
		padding-top: 5px;
	}
	.row
	{
	    margin-bottom: 0px !important;
		margin-top: -15px;
	}
	span.space {
    margin-left: 20px;
}
</style>
</head>
<body id="homepage">
<!-- BEGIN PRELOADING -->
<!-- <div class="preloading">
  <div class="wrap-preload">
    <div class="cssload-loader"></div>
  </div>
</div>
END PRELOADING -->
<!-- HEADER -->
<header id="header">
<div class="nav-wrapper container">
  <div class="header-logo">
    <a href="#" class="nav-logo"><i class="fab fa-envira"></i>SPS Shop</a>
  </div>
  <div class="header-menu-button">
    <a href="#" data-activates="nav-mobile-category" class="button-collapse" id="button-collapse-category">
    <div class="cst-btn-menu">
      <i class="fas fa-align-right"></i>
    </div>
    </a>
  </div>
  <div class="header-icon-menu cart-item-wrap">
    <a href="product-return.html">
    <i class="fas fa-shopping-bag"></i>
    <span class="cart-item">1</span>
    </a>
  </div>
  <div class="header-icon-menu cart-item-wrap">
    <a href="shopping-cart.html">
    <i class="fas fa-shopping-cart shopping-cart"></i>
    <span class="cart-item">4</span>
    </a>
  </div>
</div>
</header>
<!-- END HEADER -->
<!-- SIDE NAV-->
<nav>
<!-- SIDENAV CATEGORY-->
<ul id="nav-mobile-category" class="side-nav">
  <li class="sidenav-logo">
    <i class="fa fa-leaf" aria-hidden="true"></i> SPS
  </li>
  <li>
    <div class="search-wrapper ">
      <input id="search"><i class="material-icons">search</i>
      <div class="search-results"></div>
    </div>
  </li>
  <li>
    <a class="waves-effect waves-blue" href="index.html"><i class="fas fa-home"></i><b>Home</b></a>
  </li>
  <li>
    <ul class="collapsible collapsible-accordion">
      <li>
        <div class="collapsible-header">
          <i class="fas fa-plus"></i><b>Products</b><span><i class="fas fa-caret-down"></i></span>
        </div>
        <div class="collapsible-body">
          <ul>
            <li>
              <a class="waves-effect waves-blue" href="product-list.html"><i class="fas fa-angle-right"></i><b>All Products</b></a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </li>
  <li>
    <a href="gallery.html"><i class="fas fa-camera-retro"></i><b>Gallery</b></a>
  </li>
  <li>
    <a href="shopping-cart.html"><i class="fas fa-shopping-cart"></i>Shopping Cart</a>
  </li>
  <li>
    <a href="checkout.html"><i class="fa fa-check"></i>Checkout</a>
  </li>
  <li>
    <a href="login.html"><i class="fas fa-sign-in-alt"></i>Sign in</a>
  </li>
  <li>
    <a href="contact.html"><i class="fa fa-address-book"></i>Contact Us</a>
  </li>
</ul>
<!-- END SIDENAV CATEGORY-->
<!-- SIDENAV ACCOUNT-->

<!-- END SIDENAV ACCOUNT--></nav>
<!-- END SIDENAV-->
<!-- CONTENT -->
<div class="swiper-container">
  <div class="swiper-wrapper">
    <div class="swiper-slide">	
  <button class="btn-tab"><b>Rice 1</b></button>
  <button class="btn-tab"><b>Rice 2</b></button>
  <button class="btn-tab"><b>Rice 3</b></button>
  </div>
  <div class="swiper-slide">	
    <button class="btn-tab"><b>Rice 4</b></button>
    <button class="btn-tab"><b>Rice 5</b></button>
    <button class="btn-tab"><b>Rice 6</b></button>
  </div>
  </div>
</div>

<div id="page-content">
  <div class="cart-page">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <!--<div class="section-title">
            <span class="theme-secondary-color">ALL </span>PRODUCTS</div>   
        </div>-->
      </div>
	  <div class="item">
	  <div class="row line">
  <div class="column-r item">
    <img src="img/rice-packet.png" style="width: 120px;margin-top: 30px;padding: 5px;"/>
  </div>
  <div class="column-l ">
  <div class="row ">
  <h6>ஐயப்பன் பிரான்ட் அரிசி </h6>
   <h6><b>Iyyappan Brand Rice</b></h6>
  <div class="column1 " >
  <div class="pro-list" id="myBtn">200kg &#9660;</div>
	  <p>MRP ₹: <strike> 200</strike></p>
  <h6>₹ : 100</h6>
  </div>
  <div class="column2" >
  <div>
                  <div class="value-button1" id="decrease" onclick="decreaseValue()" value="Decrease Value"> &#9664;</div>
	  <b><input type="number" id="number" value="0" /></b>
                  <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">&#9654;</div>
                 </div>
  </div>
 
</div>
</div>
</div>
	  <button style="margin-left:70%;margin-top: -20%;" class="add-to-cart btn theme-btn-rounded ownbtn" type="button"  id="click">ADD</button>
</div>
<div class="item">
	  <div class="row line">
  <div class="column-r item">
    <img src="img/rice-packet.png" style="width: 120px;margin-top: 30px;padding: 5px;"/>
  </div>
  <div class="column-l ">
  <div class="row ">
  <h6>ஐயப்பன் பிரான்ட் அரிசி </h6>
   <h6><b>Iyyappan Brand Rice</b></h6>
  <div class="column1 " >
  <div class="pro-list" id="myBtn">200kg &#9660;</div>
	  <p>MRP ₹: <strike> 200</strike></p>
  <h6>₹ : 100</h6>
  </div>
  <div class="column2" >
  <div>
                  <div class="value-button1" id="decrease" onclick="decreaseValue()" value="Decrease Value"> &#9664;</div>
	  <b><input type="number" id="number" value="0" /></b>
                  <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">&#9654;</div>
                 </div>
  </div>
 
</div>
</div>
</div>
	  <button style="margin-left:70%;margin-top: -20%;" class="add-to-cart btn theme-btn-rounded ownbtn" type="button"  id="click">ADD</button>
</div>
      
    </div>
  </div>
</div>
<!-- END CONTENT -->

<!-- FOOTER  -->
<footer id="footer">
<div class="footer-info">
  <div class="container">
    <div class="col s12 center">
      <i class="fas fa-map-marker-alt"></i>SPS Department Store, 1/107, Senthurai(post), Dindigul-624403<br>
      <i class="fas fa-phone-square"></i> (+91)9442266880 <br>
      <i class="fas fa-envelope"></i>sarasara6492@gmail.com
    </div>
  </div>
</div>
<div class="container">
  <div class="row row-footer-icon">
    <div class="col s12">
      <div class="footer-sosmed-icon ">
        <div class="wrap-circle-sosmed ">
          <a href="#">
          <div class="circle-sosmed">
            <i class="fab fa-instagram"></i>
          </div>
          </a>
        </div>
        <div class="wrap-circle-sosmed ">
          <a href="#">
          <div class="circle-sosmed">
            <i class="fab fa-linkedin-in"></i>
          </div>
          </a>
        </div>
        <div class="wrap-circle-sosmed ">
          <a href="#">
          <div class="circle-sosmed">
            <i class="fab fa-twitter"></i>
          </div>
          </a>
        </div>
        <div class="wrap-circle-sosmed ">
          <a href="#">
          <div class="circle-sosmed">
            <i class="fab fa-facebook-f"></i>
          </div>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="row copyright">
     2020 <span>Tamilinfotech</span>, All rights reserved.
  </div>
</div>
<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  
  <div class="modal-content ex3">    
    <span class="close">&times;</span>
    <p class="two"><b>Select Product Package</p>
      <p class="one1">200 KG<span class="space"> MRP - 100</span><span class="space"> RS : 80</span></p>
      <p class="one">200 KG<span class="space"> MRP - 100</span><span class="space"> RS : 80</span></p>
      <p class="one">200 KG<span class="space"> MRP - 100</span><span class="space"> RS : 80</span></p>     
  </div>
</div>

	
	 <div class="click-content">
    <div class="click-footer">
      <h6><span><b>1 Item</b> </span><span style="padding-left: 20px;"><b>₹ 200.00</b></span><a style="color: #fff;" href="shopping-cart.html"><span style="float: right;"><b>View Cart</b></span></a></h6>
    </div>
  </div>
<!-- The Modal -->
</footer>
<!-- END FOOTER -->
<!-- Script -->
<script src="js/jquery.min.js"></script>
<script src="js/materialize.min.js"></script>
<!-- Owl carousel -->
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<!-- Magnific Popup core JS file -->
<script src="lib/Magnific-Popup-master/dist/jquery.magnific-popup.js"></script>
<!-- Slick JS -->
<script src="lib/slick/slick/slick.min.js"></script>
<!-- Custom script -->
<script src="js/custom.js"></script>
<script>
  $('.add-to-cart').on('click', function () {
        var cart = $('.shopping-cart');
        var imgtodrag = $(this).parent('.item').find("img").eq(0);
        if (imgtodrag) {
            var imgclone = imgtodrag.clone()
                .offset({
                top: imgtodrag.offset().top,
                left: imgtodrag.offset().left
            })
                .css({
                'opacity': '0.5',
                    'position': 'absolute',
                    'height': '150px',
                    'width': '150px',
                    'z-index': '100'
            })
                .appendTo($('body'))
                .animate({
                'top': cart.offset().top + 10,
                    'left': cart.offset().left + 10,
                    'width': 75,
                    'height': 75
            }, 1000, 'easeInOutExpo');
            
            setTimeout(function () {
                cart.effect("shake", {
                    times: 2
                }, 200);
            }, 1500);

            imgclone.animate({
                'width': 0,
                    'height': 0
            }, function () {
                $(this).detach()
            });
        }
    });
</script>
<script>
function increaseValue() {
  var value = parseInt(document.getElementById('number').value, 10);
  value = isNaN(value) ? 0 : value;
  value++;
  document.getElementById('number').value = value;
}

function decreaseValue() {
  var value = parseInt(document.getElementById('number').value, 10);
  value = isNaN(value) ? 0 : value;
  value < 1 ? value = 1 : '';
  value--;
  document.getElementById('number').value = value;
}

  </script>
   <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.min.js'></script>
   <script>
   var swiper = new Swiper('.swiper-container', {
         pagination: '.swiper-pagination',
         paginationClickable: true,
  // resizeReInit: true,
    // autoHeight: true
     });
   </script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
</body>


</html>x