<?php
	include 'db_config.php';
	
	$order_data_to_pass = $_POST['order_data_to_pass'];
	$order_data_to_pass_split = explode("#$#",$order_data_to_pass);
	
	$order_id = $order_data_to_pass_split[0];
	$supplier_id = $order_data_to_pass_split[1];
	$order_status = $order_data_to_pass_split[2];
	
	$update_order_status_sql = mysql_query("UPDATE kks_orders set order_status = '$order_status' where order_id = '$order_id'");
	
	if($update_order_status_sql){
	}
	
?>



