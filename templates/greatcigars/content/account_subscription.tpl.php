<?php 
	switch($_REQUEST['action']){
	case"viewadd":
		 if(!tep_session_is_registered('sppc_customer_group_id')) { 
		 $customer_group_id = '0';
		 } else {
		  $customer_group_id = $sppc_customer_group_id;
		 }
		
		$account_query = tep_db_query("select customers_gender, customers_firstname, customers_lastname, customers_dob, customers_email_address, customers_telephone, customers_fax from " . TABLE_CUSTOMERS . " where customers_id = '" . (int)$customer_id . "'");
		$account = tep_db_fetch_array($account_query);
		
		$product_info_query = tep_db_query("select p.products_id, pd.products_name,p.products_qty_in_box,p.products_size, pd.products_description, p.products_quantity, p.products_image, pd.products_url, p.products_price, p.products_tax_class_id, p.products_date_added, p.products_date_available, p.manufacturers_id from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_id = '" . (int)$_REQUEST['products_id'] . "' and pd.products_id = p.products_id and pd.language_id = '" . (int)$languages_id . "'");
		$product_info = tep_db_fetch_array($product_info_query);
		
		
		if ($new_price = tep_get_products_special_price($_REQUEST['products_id'])) {
			$scustomer_group_price_query = tep_db_query("select customers_group_price from " . TABLE_PRODUCTS_GROUPS . " where products_id = '" . (int)$_REQUEST['products_id']. "' and customers_group_id =  '" . $customer_group_id . "'");
			if ($scustomer_group_price = tep_db_fetch_array($scustomer_group_price_query)) {
				$product_info['products_price']= $scustomer_group_price['customers_group_price'];
			}
			$products_price = $currencies->display_price($new_price, tep_get_tax_rate($product_info['products_tax_class_id']));
		}else {
	
			  $scustomer_group_price_query = tep_db_query("select customers_group_price from " . TABLE_PRODUCTS_GROUPS . " where products_id = '" . (int)$_REQUEST['products_id']. "' and customers_group_id =  '" . $customer_group_id . "'");
			if ($scustomer_group_price = tep_db_fetch_array($scustomer_group_price_query)) {
			$product_info['products_price']= $scustomer_group_price['customers_group_price'];
			//print_r($scustomer_group_price_query);
		}
	
		  $products_price = $currencies->display_price($product_info['products_price'], tep_get_tax_rate($product_info['products_tax_class_id']));
		}	
		echo tep_draw_form('create_subscription', tep_href_link('account_subscription.php', '', 'SSL'), 'post', 'onSubmit="return check_form(create_subscription);"') . tep_draw_hidden_field('action', 'addnewsubscription').tep_draw_hidden_field('products_id', $_REQUEST['products_id']).tep_draw_hidden_field('activepage', "subscribeforproduct"); ?>
		<table border="0" width="100%" cellspacing="0" cellpadding="0">
		  <tr>
			<td><table border="0" width="100%" cellspacing="0" cellpadding="0">
			  <tr>
				<td class="pageHeading"><?php echo HEADING_TITLE; ?></td>
				<td class="pageHeading" align="right">&nbsp;</td>
			  </tr>
			</table></td>
		  </tr>
		  <tr>
			<td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
		  </tr>
		  <tr>
			<td class="main">You will be charged <?php echo $products_price;?> for every order that will be delivered to you after this subscription.</td>
		  </tr>
		  <tr>
			<td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
		  </tr>
		  
	<?php
	  if ($messageStack->size('subscription') > 0) {
	?>
		  <tr>
			<td><?php echo $messageStack->output('subscription'); ?></td>
		  </tr>
		  <tr>
			<td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
		  </tr>
	<?php
	  }
	?>
		  <tr>
			<td><table border="0" width="100%" cellspacing="0" cellpadding="2">
			  <tr>
				<td><table border="0" width="100%" cellspacing="0" cellpadding="2">
				  <tr>
					<td class="main"><b>Subscription Details</b></td>
					<td class="inputRequirement" align="right"><?php echo FORM_REQUIRED_INFORMATION; ?></td>
				  </tr>
				</table></td>
			  </tr>
			  <tr>
				<td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">
				  <tr class="infoBoxContents">
					<td><table border="0" cellspacing="2" cellpadding="2">
	
					  <tr>
						<td class="main"><?php echo ENTRY_FIRST_NAME; ?></td>
						<td class="main"><?php echo tep_draw_input_field('firstName', $account['customers_firstname']) . '&nbsp;' . (tep_not_null(ENTRY_FIRST_NAME_TEXT) ? '<span class="inputRequirement">' . ENTRY_FIRST_NAME_TEXT . '</span>': ''); ?></td>
					  </tr>
					  <tr>
						<td class="main"><?php echo ENTRY_LAST_NAME; ?></td>
						<td class="main"><?php echo tep_draw_input_field('lastName', $account['customers_lastname']) . '&nbsp;' . (tep_not_null(ENTRY_LAST_NAME_TEXT) ? '<span class="inputRequirement">' . ENTRY_LAST_NAME_TEXT . '</span>': ''); ?></td>
					  </tr>
					  <tr>
						<td class="main"><?php echo "Credit Card Number"; ?></td>
						<td class="main"><?php echo tep_draw_input_field('cardNumber', '') . '&nbsp;' . '<span class="inputRequirement">' . '*' . '</span>'; ?></td>
					  </tr>
					  <tr>
						<td class="main"><?php echo "Expiration Date"; ?></td>
						<td class="main"><?php echo tep_draw_input_field('expirationDate', '') . '&nbsp;' . '<span class="inputRequirement">' . "* (mmyy)" . '</span>'; ?></td>
					  </tr>
					  
					  <tr>
						<td class="main"><?php  echo "Subscription Name"; ?></td>
						<td class="main"><?php echo tep_draw_input_field('name', $product_info['products_name']) . '&nbsp;' . (tep_not_null('Subscription Name') ? '<span class="inputRequirement">' . "for your use ie product name" . '</span>': ''); ?></td>
					  </tr>
					  <tr>
					  <td class="main">Send Product after(days) Regularly</td>
					  <td class="main">
					  <select name="interval">
					  <?php for($i=1;$i<=90;$i++){?>
					  <option value="<?php echo $i;?>"><?php echo $i;?></option>
					  <?php } ?>
					  </select>
					  </td>
					  </tr>
					</table></td>
				  </tr>
				</table></td>
			  </tr>
			</table></td>
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
					<td><?php echo '<a href="' . tep_href_link(FILENAME_ACCOUNT, '', 'SSL') . '">' . tep_image_button('button_back.gif', IMAGE_BUTTON_BACK) . '</a>'; ?></td>
					<td align="right"><?php echo tep_image_submit('button_continue.gif', IMAGE_BUTTON_CONTINUE); ?></td>
					<td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
				  </tr>
				</table></td>
			  </tr>
			</table></td>
		  </tr>
		</table></form>
		
		<?php
		break;
		default:
		?>
		<table border="0" width="100%" cellspacing="0" cellpadding="0">
		  <tr>
			<td><table border="0" width="100%" cellspacing="0" cellpadding="0">
			  <tr>
				<td class="pageHeading"><?php echo "My Order Subscriptions"; ?></td>
				<td class="pageHeading"></td>
				<td class="pageHeading"></td>
			  </tr>
			</table></td>
		  </tr>
		  <tr>
			<td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
		  </tr>
		  <?php
		  if ($messageStack->size('subscription') > 0) {
		?>
			  <tr>
				<td><?php echo $messageStack->output('subscription'); ?></td>
			  </tr>
			  <tr>
				<td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
			  </tr>
		<?php
		  }
		  ?>
		  <tr>
			<td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">
			  <tr class="infoBoxContents">
				<td><table border="0" width="100%" cellspacing="0" cellpadding="2">
					<tr>
					<td width="1%"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
				    <td>
					<table width="100%" border="0" cellspacing="1" cellpadding="1">
					  <tr>
						<td width="30%"><?php echo " Subscription Name";?></td>
						<td><?php echo " Subscription Price ";?></td>
						<td width="30%" align="right" ><?php echo " Action ";?></td>
					  </tr>
					</table>
					</td>
				  	<td width="1%"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
					</tr>
					<?php
					  $subscription_query = tep_db_query(" select * from " . customers_subscribed_products . " where customers_id = '" . (int)$customer_id . "' order by csp_name");
					  $emptyfalg=0;
					  while ($subscription = tep_db_fetch_array($subscription_query)) {
					  $emptyfalg = 1;
					?>
				  	<tr>
					<td width="1%"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
					<td><table border="0" width="100%" cellspacing="0" cellpadding="2">
					  <tr class="moduleRow" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" >
						<td class="main" width="30%"><?php echo $subscription['csp_name']; ?></td>
						<td class="main" ><?php echo $subscription['csp_amount']; ?></td>
						<td class="main" width="30%" align="right" ><?php echo '<a href="' . tep_href_link('account_subscription.php', 'action=delete&csp_id=' . $subscription['csp_id'], 'SSL') . '">' . tep_image_button('small_delete.gif', SMALL_IMAGE_BUTTON_DELETE) . '</a>'; ?></td>
					  </tr>
					  <tr>
						<td colspan="2"><table border="0" cellspacing="0" cellpadding="2">
						  <tr>
							<td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
							<td class="main"><?php echo tep_address_format($format_id, $addresses, true, ' ', '<br>'); ?></td>
							<td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
						  </tr>
						</table></td>
					  </tr>
					</table></td>
					<td width="1%"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
				  </tr>
                                <?php
                                  }
                                  if(empty($emptyfalg)){
                                ?>
                                <tr>
                                    <td colspan="3">&nbsp;</td>
                                </tr>
                                <tr>
				<td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
                                <td class="main">No Subscriptios found.</td>
                                <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
			</tr>
			<?php } ?>
            </table></td>
          </tr>
        </table></td>
      </tr>
		</table>
		<?php
		break;
	}
	?>