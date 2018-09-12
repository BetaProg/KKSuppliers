<?php
	include 'db_config.php';
	session_start();
	
	$data_to_pass = $_POST['supplier_data_to_pass'];
	
	$supplier_mobile = $data_to_pass;
	//echo "<script>console.log(".$supplier_mobile.");</script>";
	
	$supplier_login = mysql_query("SELECT * from kks_suppliers where supplier_mobile = $supplier_mobile");
	if(mysql_num_rows($supplier_login)>0){
		echo "Login Success";
		while ($user_row = mysql_fetch_array($supplier_login)) {
			$supplier_name = $user_row['supplier_name'];
			$supplier_mobile = $user_row['supplier_mobile'];
			$supplier_id = $user_row['supplier_id'];
			$_SESSION["supplier_name"] = $supplier_name;
			$_SESSION["supplier_id"] = (string)$supplier_id;
			$_SESSION["supplier_mobile"] = $supplier_mobile;
			//header('Location: supplier_index.php');
		}
	}
	else {
		echo "Mobile Number doesn't exist. Please Sign up if not registered already.";
	}
	
?>



