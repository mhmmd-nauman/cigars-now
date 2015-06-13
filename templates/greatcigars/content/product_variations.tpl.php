You may also find this information interestings<br>
<?php
$products_query = tep_db_query(" select keyword_variations from products where products_id = '" . (int)$_REQUEST['products_id'] . "'");
$product = tep_db_fetch_array($products_query);
$keyword_variations_array = explode(",", $product['keyword_variations']);
$product_actual_url = tep_href_link(FILENAME_PRODUCT_INFO, '&products_id=' . (int)$_REQUEST['products_id']);
$product_url_array = explode(".html",$product_actual_url);
$product_name_part_array = explode("/",$product_url_array[0]);
$actual_product_name = $product_name_part_array[count($product_name_part_array)-1];
//print_r($product);
foreach($keyword_variations_array as $key){
    $key=trim($key);
    $key_temp_url = strtolower(str_replace(" ", "_", $key));
    echo "<a href='".str_replace($actual_product_name,$key_temp_url,tep_href_link(FILENAME_PRODUCT_INFO, '&products_id=' . (int)$_REQUEST['products_id']))."'>$key</a>";
    echo  "<br/>";
}
?>