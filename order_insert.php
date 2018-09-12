<?php
	include 'db_config.php';
	
	$data_to_pass = $_POST['data_to_pass'];
	$order_details_split = explode("#|#",$data_to_pass);
	
	$date = $order_details_split[0];
	$order_type = $order_details_split[1];
	$order_creator = $order_details_split[2];
	$material_selected = $order_details_split[3];
	$bricks_quantity = $order_details_split[4];
	$selected_location = $order_details_split[5];
	$selected_suppliers = $order_details_split[6];
	
	$insert_order = mysql_query("INSERT INTO kks_orders (order_date, order_type, order_creator, order_location, order_material, order_quantity, order_suppliers) values ('$date', '$order_type', '$order_creator', '$selected_location', '$material_selected', '$bricks_quantity', '$selected_suppliers')");
	
	if($insert_order){
		echo "<script>alert('Insertion Successful');console.log('Backend Success');</script>";
	}
	else {
		echo mysql_error;
	}
	
?>



