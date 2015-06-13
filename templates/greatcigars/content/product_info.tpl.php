<form method="post" action="product_info.php?products_id=<?php echo $_REQUEST['products_id'];?>&action=add_product" name="cart_quantity">
<?php echo tep_draw_form('cart_quantity', tep_href_link(FILENAME_PRODUCT_INFO, tep_get_all_get_params(array('action')) . 'action=add_product')); ?>
	<table border="0" width="100%" cellspacing="0" cellpadding="0">
<?php
  if ($product_check['total'] < 1) {
   // BOF Separate Price per Customer
     if(!tep_session_is_registered('sppc_customer_group_id')) { 
     $customer_group_id = '0';
     } else {
      $customer_group_id = $sppc_customer_group_id;
     }
   // EOF Separate Price per Customer
?>
      <tr>
        <td><?php new infoBox(array(array('text' => TEXT_PRODUCT_NOT_FOUND))); ?></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
      <tr>
        <td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">
          <tr class="infoBoxContents">
            <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
              <tr>
                <td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
                <td align="right"><?php echo '<a href="' . tep_href_link(FILENAME_DEFAULT) . '">' . tep_image_button('button_continue.gif', IMAGE_BUTTON_CONTINUE) . '</a>'; ?></td>
                <td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
<?php
  } else {
	
	$product_info_query = tep_db_query("select p.products_id,p.products_status,p.keyword_variations, p.offer_free_shipping, pd.products_name,p.products_qty_in_box,p.products_size, pd.products_description, p.products_quantity, p.products_image, pd.products_url, p.products_price, p.products_tax_class_id, p.products_date_added, p.products_date_available, p.manufacturers_id from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where  p.products_id = '" . (int)$_REQUEST['products_id'] . "' and pd.products_id = p.products_id and pd.language_id = '" . (int)$languages_id . "'");
    $product_info = tep_db_fetch_array($product_info_query);
    //print_r($product_info);
    tep_db_query("update " . TABLE_PRODUCTS_DESCRIPTION . " set products_viewed = products_viewed+1 where products_id = '" . (int)$_REQUEST['products_id'] . "' and language_id = '" . (int)$languages_id . "'");

    if ($new_price = tep_get_products_special_price($product_info['products_id'])) {
// BOF Separate Price per Customer

        $scustomer_group_price_query = tep_db_query("select customers_group_price from " . TABLE_PRODUCTS_GROUPS . " where products_id = '" . (int)$_REQUEST['products_id']. "' and customers_group_id =  '" . $customer_group_id . "'");
        if ($scustomer_group_price = tep_db_fetch_array($scustomer_group_price_query)) {
        $product_info['products_price']= $scustomer_group_price['customers_group_price'];
	}
// EOF Separate Price per Customer
      $products_price = '<span style="text-decoration:line-through">' . $currencies->display_price($product_info['products_price'], tep_get_tax_rate($product_info['products_tax_class_id'])) . '</span> <span class="productSpecialPrice">' . $currencies->display_price($new_price, tep_get_tax_rate($product_info['products_tax_class_id'])) . '</span>';
    } else {
// BOF Separate Price per Customer
        $scustomer_group_price_query = tep_db_query("select customers_group_price from " . TABLE_PRODUCTS_GROUPS . " where products_id = '" . (int)$_REQUEST['products_id']. "' and customers_group_id =  '" . $customer_group_id . "'");
        if ($scustomer_group_price = tep_db_fetch_array($scustomer_group_price_query)) {
        $product_info['products_price']= $scustomer_group_price['customers_group_price'];
	}
// EOF Separate Price per Customer
      $products_price = $currencies->display_price($product_info['products_price'], tep_get_tax_rate($product_info['products_tax_class_id']));
    }

    if (tep_not_null($product_info['products_model'])) {
      $products_name = $product_info['products_name'] . '<br><span class="smallText">[' . $product_info['products_model'] . ']</span>';
    } else {
      $products_name = $product_info['products_name'];
    }

// BOF: Mod - Wishlist
//DISPLAY PRODUCT WAS ADDED TO WISHLIST IF WISHLIST REDIRECT IS ENABLED
    if(tep_session_is_registered('wishlist_id')) {
?>  
      <tr>
        <td class="messageStackSuccess"><?php echo PRODUCT_ADDED_TO_WISHLIST; ?></td>
      </tr> 
<?php
      tep_session_unregister('wishlist_id');
    }
// EOF: Mod - Wishlist
?>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading" valign="top"><h1 class="pageHeading">
            <?php
                ( $variation_flag == 1)?$products_name_heading = $product_variation_name:$products_name_heading = $products_name;
                echo $products_name_heading; ?>
			<?php 
			if($product_info['offer_free_shipping'] == 1 ){
                            if( $offer_free_shipping != 1){
                            ?>
                            <span>Free Shipping</span>
                         <?php }
                         } else{
                          if($offer_free_shipping == 1){
                          ?>
                            <span>Free Shipping</span>
                          <?php
                          }
                        }
                         ?>
			</h1></td>
            <td class="pageHeading" align="right" valign="top"><?php echo $products_price; ?></td>
          </tr>
	  
	 
        </table></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
      <tr>
        <td class="main">
<?php
		//// BEGIN:  Added for Dynamic MoPics v3.000
    //echo $product_info['products_image'];
	if (tep_not_null($product_info['products_image'])) {
    
?>
          <table border="0" cellspacing="0" cellpadding="2" align="right">
            <tr>
              <td align="center" class="smallText">
<?php
			$image_lg = mopics_get_imagebase($product_info['products_image'], DIR_WS_IMAGES . DYNAMIC_MOPICS_BIGIMAGES_DIR);
			//if (false) {
			//echo "here".$image_lg;
			if ($lg_image_ext = mopics_file_exists($image_lg, DYNAMIC_MOPICS_BIG_IMAGE_TYPES)) {
				$image_size = @getimagesize($image_lg . '.' . $lg_image_ext);
				
			//BOF SLIMBOX
			$lightlarge = $image_lg . "." . $lg_image_ext;
?>
<script  type="text/javascript"language="javascript"><!--
document.write('<?php echo '<a href="' . tep_href_link($lightlarge) . '" target="_blank" rel="lightbox[group]" title="'.addslashes($product_info['products_name']).'" style="color:#000000;" >' . tep_image(DIR_WS_IMAGES . DYNAMIC_MOPICS_THUMBS_DIR . $product_info['products_image'], addslashes($product_info['products_name']), PRODUCT_IMAGE_WIDTH, PRODUCT_IMAGE_HEIGHT, 'hspace="4" vspace="4"') . '<br>' . TEXT_CLICK_TO_ENLARGE . '</a>'; ?>');
//--></script>
<!--		 EOF SLIMBOX   -->

<?php
			} else {
           
		   echo tep_image(DIR_WS_IMAGES . DYNAMIC_MOPICS_THUMBS_DIR . $product_info['products_image'], stripslashes($product_info['products_name']), SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT);
			}

//++++ QT Pro: Begin Changed code
    if (tep_not_null($product_info['products_image'])) {
?>

              </td>
            </tr>
          </table>
		  
<?php
}
//++++ QT Pro: End Changed Code
} 
		//// END:  Added for Dynamic MoPics v3.000
?>
          <?php
          if(( $variation_flag == 1)){
            $product_info['products_description'] = str_replace($products_name, $product_variation_name,$product_info['products_description']);
          }
          echo stripslashes($product_info['products_description']); ?>
		  <?php if($product_info['products_qty_in_box'] > 0){ ?>
			<br >
			Qty in Box:<?php echo $product_info['products_qty_in_box'];?>
		   <?php }?>
		   <?php if($product_info['products_size']){ ?>
			<br >
			Size:<?php echo $product_info['products_size'];?>
		   <?php }
                   if(!empty($product_info['keyword_variations']) && empty($variation_flag)){
                   ?>
                        <br >   More Information on <a href="<?php echo tep_href_link('product_variations.php', '&products_id=' . (int)$_REQUEST['products_id']);?>"> <?php echo $products_name; ?></a>
		   <?php }?>
		   
<?php
    // start Get 1 Free
    // If this product qualifies for free product(s) display promotional text
    $get_1_free_query = tep_db_query("select pd.products_name,
                                             g1f.products_free_quantity,
                                             g1f.products_qualify_quantity
                                      from " . TABLE_GET_1_FREE . " g1f,
                                           " . TABLE_PRODUCTS_DESCRIPTION . " pd
                                      where g1f.products_id = '" . (int)$product_info['products_id'] . "'
                                        and pd.products_id = g1f. products_free_id
                                        and pd.language_id = '" . (int)$languages_id . "'
                                        and status = '1'"
                                    );
    if (tep_db_num_rows($get_1_free_query) > 0) {
      $free_product = tep_db_fetch_array($get_1_free_query);
      echo '<p class=get1free>' . sprintf (TEXT_GET_1_FREE_PROMOTION, $free_product['products_qualify_quantity'], $product_info['products_name'], $free_product['products_free_quantity'], $free_product['products_name']) . '</p>';
    }
// end Get 1 Free
    $products_attributes_query = tep_db_query("select count(*) as total from " . TABLE_PRODUCTS_OPTIONS . " popt, " . TABLE_PRODUCTS_ATTRIBUTES . " patrib where patrib.products_id='" . (int)$_REQUEST['products_id'] . "' and patrib.options_id = popt.products_options_id and popt.language_id = '" . (int)$languages_id . "'");
    $products_attributes = tep_db_fetch_array($products_attributes_query);
    if ($products_attributes['total'] > 0) {
//++++ QT Pro: Begin Changed code
      $products_id=(preg_match("/^\d{1,10}(\{\d{1,10}\}\d{1,10})*$/",$_REQUEST['products_id']) ? $_REQUEST['products_id'] : (int)$_REQUEST['products_id']); 
      require(DIR_WS_CLASSES . 'pad_' . PRODINFO_ATTRIBUTE_PLUGIN . '.php');
      $class = 'pad_' . PRODINFO_ATTRIBUTE_PLUGIN;
      $pad = new $class($products_id);
      echo $pad->draw();
    }

//Display a table with which attributecombinations is on stock to the customer?
if(PRODINFO_ATTRIBUTE_DISPLAY_STOCK_LIST == 'True'): require(DIR_WS_MODULES . "qtpro_stock_table.php"); endif;

//++++ QT Pro: End Changed Code
?>
        </td>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>

<?php
		//// BEGIN:  Added for Dynamic MoPics v3.000
 if (is_file(DIR_WS_IMAGES . DYNAMIC_MOPICS_THUMBS_DIR . $product_info['products_image']) && DIR_WS_IMAGES . DYNAMIC_MOPICS_THUMBS_DIR . $product_info['products_image'] != "pixel_trans.gif"){
 					 echo "
					 <tr><td>
					 <center>";
					 include(DIR_WS_MODULES . 'dynamic_mopics.php'); 
					 echo "</center>
					 </td></tr>
					 ";  	
	   } 
		//// END:  Added for Dynamic MoPics v3.000
?>

      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
<?php
    $reviews_query = tep_db_query("select count(*) as count from " . TABLE_REVIEWS . " where products_id = '" . (int)$_REQUEST['products_id'] . "'");
    $reviews = tep_db_fetch_array($reviews_query);
    if ($reviews['count'] > 0) {
?>
      <tr>
        <td class="main"><?php echo TEXT_CURRENT_REVIEWS . ' ' . $reviews['count']; ?></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
<?php
    }

?>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
     <tr>
        <td><table border="0" width="100%" cellspacing="1" cellpadding="2" >
          <tr >
            <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
              <tr>
                <td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
                <td class="main"><?php echo '<a href="' . tep_href_link(FILENAME_PRODUCT_REVIEWS, "products_id=".$_REQUEST['products_id']) . '">' . tep_image_button('button_reviews.gif', IMAGE_BUTTON_REVIEWS) . '</a>'; ?></td>
                <!--
				<td align="center"><?php echo '<a href="' . tep_href_link('account_subscription.php', "action=viewadd&activepage=subscribeforproduct&products_id=".$_REQUEST['products_id']) . '">';?>Add to My Subscriptions </a>
			   </td>
				-->
                <td class="main" align="right">
		<?php 
			if (tep_session_is_registered('affiliate_id')) { 
				
				echo  tep_draw_hidden_field('products_id', $product_info['products_id']) . tep_image_submit('button_in_cart.gif', IMAGE_BUTTON_IN_CART) . '<br><a href="' . tep_href_link(FILENAME_AFFILIATE_BANNERS_BUILD, 'individual_banner_id=' . $product_info['products_id']) .'" target="_self">' . tep_image('includes/languages/english/images/buttons/button_affiliate_build_a_link.gif', 'Make a link') . ' </a>';
				
	       } else {
	       	        if( $product_info['products_price'] > 1 ){
                            if($product_info['products_status'] == 1){
                                echo tep_draw_hidden_field('products_id', $product_info['products_id']) . tep_image_submit('button_in_cart.gif', IMAGE_BUTTON_IN_CART);
                            }else{
                                echo "Out of Stock";
                            }

                         } else {
                             echo '<a href="' . tep_href_link("contact_us.html", '') . '">Call Us to Purchase</a>&nbsp;';
                         }
		}
	       ?></td>
                <td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
	 <tr>
	 	<td style="padding:3px;"  class="main">
	    <?php 
		 //print_r($product_info); 
		// products_qty_in_box
		?>
		
		</td>
	</tr>	
	 
	  
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
      <tr>
        <td>
	
	
<?php

//added for cross -sell
  
   if ( (USE_CACHE == 'true') && !SID) {
    echo tep_cache_also_purchased(3600);
     include(DIR_WS_MODULES . FILENAME_XSELL_PRODUCTS);
   } else {
     	include(DIR_WS_MODULES . FILENAME_XSELL_PRODUCTS);
		 if (isset($_REQUEST['products_id'])) {
		$orders_query = tep_db_query("select p.products_id, p.products_image from " . TABLE_ORDERS_PRODUCTS . " opa, " . TABLE_ORDERS_PRODUCTS . " opb, " . TABLE_ORDERS . " o, " . TABLE_PRODUCTS . " p where opa.products_id = '" . (int)$_REQUEST['products_id'] . "' and opa.orders_id = opb.orders_id and opb.products_id != '" . (int)$_REQUEST['products_id'] . "' and opb.products_id = p.products_id and opb.orders_id = o.orders_id and p.products_status = '1' group by p.products_id order by o.date_purchased desc limit " . MAX_DISPLAY_ALSO_PURCHASED);
		$num_products_ordered = tep_db_num_rows($orders_query);
		if ($num_products_ordered >= MIN_DISPLAY_ALSO_PURCHASED) {
	?>
	<!-- also_purchased_products //-->
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr><td  style="background-image:<?= DIR_WS_IMAGES . 'h_r_big.gif' ?>" class="hright"><?=TEXT_ALSO_PURCHASED_PRODUCTS?></td></tr>
			</table>
	<?php
		  //$info_box_contents = array();
		  //$info_box_contents[] = array('text' => TEXT_ALSO_PURCHASED_PRODUCTS);
	
		  //new contentBoxHeading($info_box_contents);
	
		  $row = 0;
		  $col = 0;
		  $info_box_contents = array();
		  while ($orders = tep_db_fetch_array($orders_query)) {
			$orders['products_name'] = tep_get_products_name($orders['products_id']);
			$info_box_contents[$row][$col] = array('align' => 'center',
												   'params' => 'class="smallText" width="33%" valign="top"',
												   'text' => '<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $orders['products_id']) . '">' . tep_image(DIR_WS_IMAGES . $orders['products_image'], $orders['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a><br><a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $orders['products_id']) . '">' . $orders['products_name'] . '</a>');
	
			$col ++;
			if ($col > 2) {
			  $col = 0;
			  $row ++;
			}
		  }
	
		  new contentBox($info_box_contents);
	?>
	<!-- also_purchased_products_eof //-->
	<?php
		}
  }
    }
  }
?>
        </td>
      </tr>
    </table>
	</form>