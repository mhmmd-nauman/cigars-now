<table width="100%" border="0" cellspacing="0" cellpadding="2">
<?php
  $sql = "select manufacturers_id, offer_free_shipping , manufacturers_name, manufacturers_image , manufacturers_url from manufacturers order by manufacturers_name";
  $res = tep_db_query($sql);

  if (tep_db_num_rows($res) > 0) {
    while ($brands = tep_db_fetch_array($res)) {
	$pos = strpos($brands['manufacturers_name'],"Cigars");
	if($pos === false)$brands['manufacturers_name'] = $brands['manufacturers_name']." Cigars"; 
?>
                  <tr>
                    <td class="main">
						<a href="<?php echo  tep_href_link("cigars/".$brands['manufacturers_url'].".html") ?>">
							<?php echo  $brands['manufacturers_name']; ?>
						</a>
						<?php if($brands['offer_free_shipping'] == 1){?><span style="color:#FF0000; padding-left:5px;">Free Shipping</span><?php }?>
				   </td>
<?php
        if ($brands = tep_db_fetch_array($res)) {
		$pos = strpos($brands['manufacturers_name'],"Cigars");
		if($pos === false)$brands['manufacturers_name'] = $brands['manufacturers_name']." Cigars"; 
?>
                    <td class="main">
						<a href="<?php echo  tep_href_link("cigars/".$brands['manufacturers_url'].".html") ?>">
							<?php echo  $brands['manufacturers_name']; ?>
						</a>
						<?php if($brands['offer_free_shipping'] == 1){?><span style="color:#FF0000; padding-left:5px;">Free Shipping</span><?php }?>
					</td>
<?php
        } else {
?>
                    <td class="main">&nbsp;</td>
<?php
        }
?>
                  </tr>
<?php
    }
?>
<?php
  } else {
?>
              <tr>
                <td><?php new infoBox(array(array('text' => 'No Brands'))); ?></td>
              </tr>
              <tr>
                <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
              </tr>
<?php
  }
?>
        </table>