<script>
	$(document).ready(function() {
		//$('select').material_select();
		sessionStorage.setItem('material_selected', "");
	  });
</script>
<script type="text/javascript" src="scripts/major_navigate.js"></script>
<div class="order_details_title">
	<h5>View Supplier Details</h5>
</div>
<?php
	include 'db_config.php';
	
	$supplier_id = $_POST['supplier_id'];
	$get_supplier_details_sql = mysql_query("SELECT * from kks_suppliers where supplier_id = $supplier_id");
	while($row_supplier_details = mysql_fetch_array($get_supplier_details_sql)){
		$supplier_id = $row_supplier_details['supplier_id'];
		$supplier_reg_date = $row_supplier_details['supplier_reg_date'];
		$supplier_name = $row_supplier_details['supplier_name'];
		$supplier_type = $row_supplier_details['supplier_type'];
		$supplier_location = $row_supplier_details['supplier_location'];
		$supplier_mobile = $row_supplier_details['supplier_mobile'];
		
		$supplier_reg_day = substr($supplier_reg_date, 4, 2);
		$supplier_reg_month = substr($supplier_reg_date, 2, 2);
		$supplier_reg_year = '20'.substr($supplier_reg_date, 0, 2);
		
		if($supplier_type == "Sand"){
			$material_icon = "images/landing_icons/sand.png";
		}
		else if($supplier_type == "Cement"){
			$material_icon = "images/landing_icons/cement.png";
		}
		else if($supplier_type == "Bricks"){
			$material_icon = "images/landing_icons/brick.png";
		}
		echo "<div class='row single_order'><div class='col s2'><img class='material_icons' src='$material_icon'></div><div class='col s10'><b>$supplier_type</b><p>Registered on: $supplier_reg_day-$supplier_reg_month-$supplier_reg_year</p></div></div>";
		echo "<table class='bordered suppliers_table'>
			<tr>
				<td><label>Order Id</label></td>
				<td>$supplier_id</td>
			</tr>
			<tr>
				<td><label>Registered on</label></td>
				<td>$supplier_reg_day-$supplier_reg_month-$supplier_reg_year</td>
			</tr>
			<tr>
				<td><label>Mobile No.</label></td>
				<td>$supplier_mobile</td>
			</tr>
			<tr>
				<td><label>Type</label></td>
				<td>$supplier_type</td>
			</tr>
			<tr>
				<td><label>Location</label></td>
				<td>$supplier_location</td>
			</tr>
		</table>";
	}
	
?>