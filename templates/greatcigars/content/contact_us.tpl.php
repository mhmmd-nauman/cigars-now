    <?php echo tep_draw_form('contact_us', tep_href_link(FILENAME_CONTACT_US, 'action=send')); ?><table border="0" width="100%" cellspacing="0" cellpadding="0">
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading"><?php echo HEADING_TITLE; ?></td>
            <td class="pageHeading" align="right"></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
<?php
  if ($messageStack->size('contact') > 0) {
?>
      <tr>
        <td><?php echo $messageStack->output('contact'); ?></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
<?php
  }

  if (isset($_REQUEST['action']) && ($_REQUEST['action'] == 'success')) {
?>
      <tr>
        <td class="main" align="center"><?php echo tep_image(DIR_WS_IMAGES . 'table_background_man_on_board.gif', HEADING_TITLE, '0', '0', 'align="left"') . TEXT_SUCCESS; ?></td>
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
?>
      <tr>
        <td><table border="0" width="95%" cellspacing="1" cellpadding="2" class="infoBox">
          <tr class="infoBoxContents">
            <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
              
			  <tr>
			  <td class="main">
			  
			  </td>
			  </tr>
			  
			  <tr>
			  <td>
			  <table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td width="50%">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td class="main"><?php echo ENTRY_NAME; ?></td>
				  </tr>
				  <tr>
					<td class="main"><?php echo tep_draw_input_field('name'); ?></td>
				  </tr>
				  <tr>
					<td class="main"><?php echo ENTRY_EMAIL; ?></td>
				  </tr>
				  <tr>
					<td class="main"><?php echo tep_draw_input_field('email'); ?></td>
				  </tr>
				</table>

				</td>
				<td valign="top" class="main">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td width="19%" valign="top"  class="main"  align="right">Address: </td>
					<td width="81%"  class="main" style="font-size:12px; font-weight:normal;">GreatCigarPrices<br />
			  39 Old Lancaster Road<br/>
			  Sudbury, MA 01776<br/></td>
				  </tr>
				<tr>
				<td class="main" align="right">Call:</td>
				<td class="main" style="font-size:12px; font-weight:normal;">877-24-CIGAR</td>
				</tr>
				</table>

				
			  
				</td>
			  </tr>
			  </table>

			  </td>
			  </tr>
			
			  
              <tr>
                <td class="main"><?php echo ENTRY_ENQUIRY; ?></td>
              </tr>
              <tr>
                <td><?php echo tep_draw_textarea_field('enquiry', 50, 15); ?></td>
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
                <td align="right"><?php echo tep_image_submit('button_continue.gif', IMAGE_BUTTON_CONTINUE); ?></td>
                <td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
<?php
  }
?>
    </table></form>

