<?php
	include 'db_config.php';
	
	$data_to_pass = $_POST['supplier_data_to_pass'];
	$supplier_details_split = explode("#$#",$data_to_pass);
	
	$supplier_name = $supplier_details_split[0];
	$supplier_mobile = $supplier_details_split[1];
	$supplier_location = $supplier_details_split[2];
	$supplier_date = $supplier_details_split[3];
	$supplier_material = $supplier_details_split[4];
	
	$insert_supplier_order = mysql_query("INSERT INTO kks_suppliers (supplier_name, supplier_mobile, supplier_location, supplier_reg_date, supplier_type) values ('$supplier_name', '$supplier_mobile', '$supplier_location', '$supplier_date', '$supplier_material')");
	
	if($insert_supplier_order){
		echo "Insertion Success";
	}
	else {
		echo "Mobile Number exists. Please login if already registered. Else try a different number";
	}
	
?>



