<?php
if($_SERVER['SERVER_NAME'] == 'localhost'){
	$back_url = tep_href_link(str_replace("/catalog/","",$_SERVER['PHP_SELF']),$_SERVER['QUERY_STRING']);
}else{
	$back_url = tep_href_link(str_replace("/","",$_SERVER['PHP_SELF']),$_SERVER['QUERY_STRING']);
}
?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS;
  // BOF Separate Pricing Per Customer
    if(!tep_session_is_registered('sppc_customer_group_id')) {
    $customer_group_id = '0';
    } else {
     $customer_group_id = $sppc_customer_group_id;
    }
  // EOF Separate Pricing Per Customer
	//$show_coupon_offer_pop=1;
	//$show_cart_offer_pop = 1;	
	
?>>

<head>


<script language="javascript" type="text/javascript">

function SetManufacture(manurl){
	if(manurl != ""){
		window.document.location.href = manurl;
    }
}
</script>

<?php require(DIR_WS_INCLUDES . 'meta_tags.php'); ?>
<title><?php echo META_TAG_TITLE; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<meta name="keywords" content="<?php echo META_TAG_KEYWORDS; ?>">
<meta name="description" content="<?php echo META_TAG_DESCRIPTION; ?>">
<meta name="google-site-verification" content="8T7YnCSUUWGSal8acdFZoaEJI5LMVsCZ1V5YtwvzEUE" >
<meta name="google-site-verification" content="X1uz_bO4wwD4qaoqtDx2pj3EV0DYP7fcFjNCsOL8N0Q" />
<base href="<?php echo (($request_type == 'SSL') ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG; ?>">
<?php
if(($_SERVER['SERVER_NAME'] == 'localhost') || (1 == 1)){
?>
<link rel="stylesheet" type="text/css" href="<?php echo (bts_select('stylesheet','dynamic_mopics.css')); // BTSv1.5 ?>">
<?php if (bts_select('stylesheets', $PHP_SELF)) { // if a specific stylesheet exists for this page it will be loaded ?>
<link rel="stylesheet" type="text/css" href="<?php echo (bts_select('stylesheets', $PHP_SELF)); // BTSv1.5 ?>">
<link rel="stylesheet" type="text/css" href="<?php echo (bts_select('stylesheet','stylesheet.css')); // BTSv1.5 ?>">
<link rel="stylesheet" type="text/css" href="<?php echo (bts_select('stylesheet','stylesheet-new.css')); // BTSv1.5 ?>">
<link rel="stylesheet" type="text/css" href="<?php echo (bts_select('stylesheet','print.css')); // BTSv1.5 ?>" media="print">
<link rel="stylesheet" type="text/css" href="<?php echo DIR_WS_TEMPLATES; ?>coolmenu.css">
<link rel="stylesheet" type="text/css" href="<?php echo (bts_select('stylesheet','slimbox2/slimbox2.css')); // BTSv1.5 ?>">
<?php } else {?>
<link rel="stylesheet" type="text/css" href="<?php echo (bts_select('stylesheet','css/main.css')); // BTSv1.5 ?>">

<link rel="stylesheet" type="text/css" href="<?php echo (bts_select('stylesheet','styles.css')); // BTSv1.5 ?>">

<link rel="stylesheet" type="text/css" href="<?php echo (bts_select('stylesheet','print.css')); // BTSv1.5 ?>" media="print">
<link rel="stylesheet" type="text/css" href="slimbox2/slimbox2.css">

<?php
 }
 ?>
<script type="text/javascript" src="slimbox2/jquery.js"></script>
<script type="text/javascript" src="slimbox2/slimbox2.js"></script>
<script type="text/javascript" src="includes/functions/bannerRotator.js"></script>
<?php
}else{
?>
<script type="text/javascript" src="/newsite/min/f=slimbox2/jquery.js,slimbox2/slimbox2.js,includes/functions/bannerRotator.js"></script>
<link type="text/css" rel="stylesheet" href="/newsite/min/f=templates/cubancigar/dynamic_mopics.css,templates/cubancigar/style.css,templates/cubancigar/print.css,templates/cubancigar/whitenav.css,templates/cubancigar/styles.css,slimbox2/slimbox2.css" >
<?php } ?> 
<?php if (bts_select('javascript', $PHP_SELF)) { // if a specific javscript file exists for this page it will be loaded
      require(bts_select('javascript', $PHP_SELF));
} else {
  if (isset($javascript) && file_exists(DIR_WS_JAVASCRIPT . basename($javascript))) { require(DIR_WS_JAVASCRIPT . basename($javascript)); }

  } 
?> 
 <!-- coolMenu //-->
 <?php
 
 
if($show_coupon_offer_pop == 1 || $show_cart_offer_pop == 1){
 ?>
 <link rel="stylesheet" type="text/css" href="<?php echo (bts_select('stylesheet','expop/ExPop-2.css')); // BTSv1.5 ?>">
 <script type="text/javascript" src="expop/ExPop-2-js.php"></script>
 
 <!-- coolMenu_eof //-->
<?php
 }	
	//// BEGIN:  Added for Dynamic MoPics v3.000
?>
<script type="text/javascript" language="javascript"><!--
function couponpopupWindow(url) {
window.open(url,'popupWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=450,height=280,screenX=150,screenY=150,top=150,left=150')
}
//--></script> 
<script language="javascript" type="text/javascript"><!--
	function popupImage(url, imageHeight, imageWidth) {
		var newImageHeight = (parseInt(imageHeight) + 20);
		var yPos = ((screen.height / 2) - (parseInt(newImageHeight) / 2));
		var xPos = ((screen.width / 2) - (parseInt(imageWidth) / 2));

		imageWindow = window.open(url,'popupImages','toolbar=no,location=no,directories=no,status=yes,menubar=no,scrollbars=no,resizable=no,copyhistory=no,width=' + imageWidth + ',height=' + newImageHeight + ',screenY=' + yPos + ',screenX=' + xPos + ',top=' + yPos + ',left=' + xPos);

		imageWindow.moveTo(xPos, yPos);
		imageWindow.resizeTo(parseInt(imageWidth), parseInt(newImageHeight));

		if (window.focus) {
			imageWindow.focus();
		}
	}
//--></script>
<?php
	//// END:  Added for Dynamic MoPics v3.000
?>

<!-- BOF SLIMBOX2 -->

<?php // Start Banner Rotator; ?>
  
 

<script type="text/javascript">
	//exPopCookies=0;
	
	function specialofferNothanks(){
		document.normal_offer_form.action = "?action=nothanks";
		document.normal_offer_form.submit();
	}
	function couponofferNothanks(){
		document.cart_offer_form.action = "?action=nothanks_cart";
		document.cart_offer_form.submit();
	}
	
	function validateEmail(email) {
	   var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	   if(reg.test(email) == false) {
		  alert('Invalid Email Address');
		  return false;
	   }else{
	   	  return true;
	   }
	}
	
	function callAjax(){
	var user_email =$('#user_email').val();
	var user_fname =$('#user_fname').val();
	var user_lname =$('#user_lname').val();
	if(user_email == ""){
	  alert("Enter Email");
	  return false;
	} 
	var isValid = validateEmail(user_email);
	if(isValid){
	
	}else{
		return false;
	}
	if(user_fname == ""){
	  alert("Enter First Name");
	  return false;
	}
	if(user_lname == ""){
	  alert("Enter Last Name");
	  return false;
	}
	
	//$.get("sendcoupon.php", { name: user_fname +" "+ user_lname, user_email: user_email, action:'process' } );
	 return true;
	}
	
	
var Global = {};
Global.Config = {'imageUrl':'http://www.greatcigarprices.com/images/'};

	
</script>
<!-- EOF SLIMBOX2 -->

<style type="text/css">
    img, .fixPNG {behavior: url("css/iepngfix.htc") }
</style>

</head>
<body>


    <div class="wrapper">
        <div id="container">
            <div id="header">
                <div class="box">
                    <div class="search">
                        <table>
                        <tr>
                            <th>Select a Brand:</th>

                            <td>
                                <?php 
					$manufacturers_query = tep_db_query("select manufacturers_id, manufacturers_name,manufacturers_url from " . TABLE_MANUFACTURERS . " order by manufacturers_name");
					if ($number_of_rows = tep_db_num_rows($manufacturers_query)) {
						$manufacturers_array = array();
						 
					
						  while ($manufacturers = tep_db_fetch_array($manufacturers_query)) {
							$manufacturers_name = $manufacturers['manufacturers_name'];
							$manufacturers_array[] = array('id' => $manufacturers['manufacturers_id'],
														   'text' => $manufacturers_name,
														   'manufacturers_url' => $manufacturers['manufacturers_url'] 
														   );
						  }
					
						  
					}
					?>
				<select name="selectedManufacture"  id="selectedManufacture"  onchange="SetManufacture(this.value);">
					<option value="" > Select One</option>
					  <?php 
					  if($manufacturers_array){
					  foreach($manufacturers_array as $manRow){?> 
					  <option value="<?php echo  tep_href_link("cigars/".$manRow['manufacturers_url'].".html");?>"  <?php if($_REQUEST['manufacturers_id'] == $manRow['id']) echo "selected" ;?> > <?php echo $manRow['text'];?> </option>
					  <?php } 
					  }
					  ?>
					</select>

                            </td>
                        </tr>
                        <tr>
                            <th>Shop by Price:</th>
                            <td>    <FORM method="get" action="index.php">
        <select name="price_range_id" onChange="this.form.submit();">
		<option value="0" <?php if($_REQUEST['price_range_id'] == 0)echo"SELECTED";?>>Please Select</option>
		<option value="1" <?php if($_REQUEST['price_range_id'] == 1)echo"SELECTED";?>>Under $10</option>
		<option value="2" <?php if($_REQUEST['price_range_id'] == 2)echo"SELECTED";?>>$11-$25</option>
		<option value="3" <?php if($_REQUEST['price_range_id'] == 3)echo"SELECTED";?>>$26-$45</option>
		<option value="4" <?php if($_REQUEST['price_range_id'] == 4)echo"SELECTED";?>>$45-$70</option>
		<option value="5" <?php if($_REQUEST['price_range_id'] == 5)echo"SELECTED";?>>$71-$100</option>
		<option value="6" <?php if($_REQUEST['price_range_id'] == 6)echo"SELECTED";?>>$101-$150</option>
		<option value="7" <?php if($_REQUEST['price_range_id'] == 7)echo"SELECTED";?>>$151-$200</option>
		<option value="8" <?php if($_REQUEST['price_range_id'] == 8)echo"SELECTED";?>>$201-$500</option>
		<option value="9" <?php if($_REQUEST['price_range_id'] == 9)echo"SELECTED";?>>Over $500</option>
		</select>
		</FORM>

<!-- manufacturers_eof //-->
</td>
                        </tr>
                        <tr>
                            <th>Quick Find:</th>
                            <td><!-- search //-->
<?php echo tep_draw_form('quick_find', tep_href_link(FILENAME_ADVANCED_SEARCH_RESULT, '', 'NONSSL', false), 'get');?><a href="javascript:void(0)" class="find" onClick="this.parentNode.submit()"></a>
<input type="text" name="keywords" class="find" maxlength="30" value="<?php echo $_REQUEST['keywords'];?>"></form>
<!-- search_eof //-->

</td>
                        </tr>

                        </table>
                    </div>
                    <div class="advanced">
                         <a href="<?php echo tep_href_link('advanced_search.php', '', 'NONSSL', false)?>" class="find"></a>
						
                        <div class="text">Use keywords to find the<br>product you are looking for</div>
                    </div>
                </div>
            </div>




            <div id="content">
                <?php
										// Hide Left Column if not to show
				if (DOWN_FOR_MAINTENANCE == 'false' or DOWN_FOR_MAINTENANCE_COLUMN_LEFT_OFF =='false') {
				?>
				
				<?php require(bts_select('column', 'column_left.php')); // BTSv1.5 ?>
				
				<?php
				}
				?>

                <div class="box center">
                    <div class="border_right">
                        <div class="border_bottom">
                            <div class="border_left">
                                <div class="right_panel">
                                    <div class="top_buttons">
                                        <div class="corner_rb"></div>
                                        <div class="corner_lb"></div>
                                        <div class="border">

                                            <a href="<?php echo tep_href_link('index.html', '');?>" class="home" title="cigars, cigar, cuban cigars, discount cigars, cheap cigars, cigars online, cigar aficianado - GreatCigarPrices"></a>
                                            <a href="<?php echo tep_href_link('mailing_list.html', '');?>" class="premier" title="Premier Club"></a>
                                            <a href="<?php echo tep_href_link('shopping_cart.html', '');?>" class="cart" title="Shopping Cart"></a>
                                            <a href="<?php echo tep_href_link('contact_us.html', '');?>" class="contact" title="Contact Us"></a>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                    <!-- Right Line-->
<!-- shopping_cart //-->
<?php
// Hide 
if (DOWN_FOR_MAINTENANCE == 'false' or DOWN_FOR_MAINTENANCE_COLUMN_RIGHT_OFF =='false') {
?>								
  <?php require(bts_select('column', 'column_right.php')); // BTSv1.5 ?>

<?php
}
?> 

<!-- shopping_cart_eof //-->
<!-- my_account //-->

<!-- my_account_eof //-->


<div class="box2 mailing">
    <h1>Mailing List</h1>
    <div class="content" style="text-align: center;">
        <A href="http://www.greatcigarprices.com/mailing_list.html"><img src="./images/r_im_maillist.gif" border="0" alt="   " title="  " width="143" height="125" vspace="0"></A>
	</div>
</div>

<!-- polls //-->
<!-- polls-eof //-->
<!-- Right Line_eof //-->                                </div>

                                <div class="main_area">
                                 <?php
								  if ($messageStack->size('error_sub') > 0) {
								?>
									  <table width="90%" border="0" cellspacing="2" cellpadding="2" align="center">
									  <tr>
										<td> <?php echo $messageStack->output('error_sub'); ?></td>
									  </tr>
									</table>
									<br>
								<?php
								  }
								?>
								<?php
                                                                 //echo bts_select ('content');
								 require (bts_select ('content')); // BTSv1.5
							  ?>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <div class="corner_lt"></div>
                    <div class="corner_rt"></div>

                    <div class="corner_rb"></div>
                    <div class="corner_lb"></div>
                </div>
            </div>
            <div id="footer">
                <div class="left">
                    <a href="/cigar-brands.htm" title="Cigar Brands">Cigar</a>
<a href="/brands.html" title="Cigar Brands"> Brands</a><br>

<a href="/resources.htm" title="Resources">Resources</a><br>
<a href="/sitemap_products.html" title="All Products">Products</a>                </div>
                <div class="center">
                    <a href="/discount_cigar_brands/acid_cigars/index.htm" title="Acid Cigars">Acid Cigars</a>,
<a href="/cigar/Arturo_Fuente_Cigars/index.htm" title="Arturo Fuente Cigars">Arturo Fuente Cigars</a>,
<a href="/cigar/Ashton_Cigars/index.htm" title="Ashton Cigars">Ashton Cigars</a>,
<a href="/discount_cigar_brands/cao_cigars/index.htm" title="CAO Cigars">CAO Cigars</a>,
<a href="/discount_cigar_brands/cohiba_cigars/index.htm" title="Cohiba Cigars">Cohiba Cigars</a>,

<a href="/discount_cigar_brands/h_upmann_cigars/index.htm" title="H Upmann Cigars">H Upmann Cigars</a>, <BR>
<a href="/discount_cigar_brands/helix_cigars/index.htm" title="Helix Cigars">Helix Cigars</a>,
<a href="/discount_cigar_brands/macanudo_cigars/index.htm" title="Macanudo Cigars">Macanudo Cigars</a>,
<a href="/discount_cigar_brands/monte_cristo_cigars/index.htm" title="Monte Cristo Cigars">Monte Cristo Cigars</a>,
<a href="/cigar/OPUS_X_Cigars/index.htm" title="Opus X Cigars">Opus X Cigars</a>,
<a href="/cigar/Padron_Cigars/index.htm" title="Padron Cigars">Padron Cigars</a>,
<a href="/discount_cigar_brands/punch_cigars/index.htm" title="Punch Cigars">Punch Cigars</a>, <a href="/resources2.php" title="Resources">More Resources</a>                </div>

                <div class="right">
                   <a href="/privacy.htm" title="Privacy Policy">Privacy Policy</a><br>
<a href="/return-policy.htm" title="Return Policy">Return Policy</a><br>
<a href="/shipping.htm" title="Shipping Policy">Shipping Policy</a>                </div>
                <div class="copyright">
                    Copyright &copy; GreatCigarPrices.com 2004-<?php echo date("Y");?> All rights reserved. <br>We DO NOT Ship To Addresses In The U.S. State of Massachusetts                </div>

            </div>
        </div>
    </div>


<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-8070769-2");
pageTracker._trackPageview();
} catch(err) {}</script>

</body>
</html>