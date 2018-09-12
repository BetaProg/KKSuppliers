<?php 
	session_start();
?>
<script>
	$(document).ready(function() {
		//$('select').material_select();
		sessionStorage.setItem('material_selected', "");
	  });
</script>
<script type="text/javascript" src="scripts/major_navigate.js"></script>
<div class="order_details_title">
	<h5>View Order Details</h5>
</div>
<?php
	include 'db_config.php';
	/* if(isset($_SESSION["supplier_name"])){
		$supplier_id = $_SESSION["supplier_id"];
	}
	else {
		//echo "<script>$('.supplier_order_progress').css('display', 'none');</script>";
	} */
	$order_id = $_POST['order_id'];
	$get_order_details_sql = mysql_query("SELECT * from kks_orders where order_id = $order_id");
	while($row_order_details = mysql_fetch_array($get_order_details_sql)){
		$order_id = $row_order_details['order_id'];
		
		$order_date = $row_order_details['order_date'];
			$order_supplier = $row_order_details['order_suppliers'];
			$order_material = $row_order_details['order_material'];
			$order_quantity = $row_order_details['order_quantity'];
			$order_location = $row_order_details['order_location'];
			$order_status = $row_order_details['order_status'];
		
		$_SESSION["order_id"] = $order_id;	
		
		if(isset($_SESSION["supplier_name"])){
			$supplier_id = $_SESSION["supplier_id"];
		}
		else {
			
			
			if($order_status == "Rejected"){
				echo "<script>$('#rejected').prop('checked', true);</script>";
				echo "<script>$('.filled-in').attr('disabled', true);</script>";
			}
			else if($order_status == "Accepted"){
				echo "<script>$('#accepted').prop('checked', true);</script>";
				echo "<script>$('.filled-in').attr('disabled', true);</script>";
			}
			else if($order_status == "Done"){
				echo "<script>$('#done').prop('checked', true);</script>";
				echo "<script>$('#accepted').prop('checked', true);</script>";
				echo "<script>$('.filled-in').attr('disabled', true);</script>";
			}
			else if($order_status == "Delivery"){
				echo "<script>$('#delivery').prop('checked', true);</script>";
				echo "<script>$('#done').prop('checked', true);</script>";
				echo "<script>$('#accepted').prop('checked', true);</script>";
				echo "<script>$('.filled-in').attr('disabled', true);</script>";
			}
			else if($order_status == "Completed"){
				echo "<script>$('#completed').prop('checked', true);</script>";
				echo "<script>$('#delivery').prop('checked', true);</script>";
				echo "<script>$('#done').prop('checked', true);</script>";
				echo "<script>$('#accepted').prop('checked', true);</script>";
				echo "<script>$('.filled-in').attr('disabled', true);</script>";
			}
		}
			

		
		$order_suppliers_individual = explode(",",$order_supplier);
		$order_supplier_array = [];
		for($i = 0;$i<2;$i++){
			
			$order_supplier_single = $order_suppliers_individual[$i];
			
			$order_supplier_name_sql = mysql_query("SELECT supplier_name from kks_suppliers where supplier_id = '$order_supplier_single'");
			while($order_supplier_name_row = mysql_fetch_array($order_supplier_name_sql)){
				$supplier_name = $order_supplier_name_row['supplier_name'];
				array_push($order_supplier_array, $supplier_name);
			}
		}
		$order_day = substr($order_date, 4, 2);
		$order_month = substr($order_date, 2, 2);
		$order_year = '20'.substr($order_date, 0, 2);
		
		if($order_material == "Sand"){
			$material_icon = "images/landing_icons/sand.png";
		}
		else if($order_material == "Cement"){
			$material_icon = "images/landing_icons/cement.png";
		}
		else if($order_material == "Bricks"){
			$material_icon = "images/landing_icons/brick.png";
		}
		echo "<div class='row single_order'><div class='col s2'><img class='material_icons' src='images/delivery_small.png'></div><div class='col s10'><b>$order_quantity - $order_material</b><p>Ordered on: $order_day-$order_month-$order_year</p></div></div>";
		echo "<table class='bordered orders_table'>
			<tr>
				<td><label>Order Id</label></td>
				<td>$order_id</td>
			</tr>
			<tr>
				<td><label>Date</label></td>
				<td>$order_day-$order_month-$order_year</td>
			</tr>
			<tr>
				<td><label>Material</label></td>
				<td>$order_material</td>
			</tr>
			<tr>
				<td><label>Supplier</label></td>
				<td>";for($x = 0; $x < 2; $x++) {
			echo $order_supplier_array[$x];
			echo "<br>";
			}
			echo"
			</td>
			</tr>
			<tr>
				<td><label>Quantity</label></td>
				<td>$order_quantity</td>
			</tr>
			<tr>
				<td><label>Location</label></td>
				<td>$order_location</td>
			</tr>
		</table>";
	}
	
?>

<div class="supplier_order_progress">
	<div class="supplier_progress_title">
		<div class="row">
			<div class="col s6">
				<h5>Order Status</h5>
			</div>
			<div class="col s6">
				<p>
				  <input type="checkbox" class="filled-in checkbox-red" id="rejected" />
				  <label for="rejected">Rejected</label>
				</p>
			</div>
		</div>
	</div>
	<hr>
	<div class="row accept_selection">
		<div class="col s3">
			<div class="row">
				<div class="col s12">
					<p>
					  <input type="checkbox" class="filled-in  checkbox-yellow" id="accepted"/>
					  <label for="accepted">Accepted</label>
					</p>
				</div>
			</div>
		</div>
		<div class="col s3">
			<div class="row">
				<div class="col s12">
					<p>
					  <input type="checkbox" class="filled-in checkbox-orange" id="done" disabled/>
					  <label for="done">50% Done</label>
					</p>
				</div>
			</div>
		</div>
		<div class="col s3">
			<div class="row">
				<div class="col s12">
					<p>
					  <input type="checkbox" class="filled-in checkbox-blue" id="delivery" disabled/>
					  <label for="delivery">For Delivery</label>
					</p>
				</div>
			</div>
		</div>
		<div class="col s3">
			<div class="row">
				<div class="col s12">
					<p>
					  <input type="checkbox" class="filled-in checkbox-green" id="completed" disabled/>
					  <label for="completed">Completed</label>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
	$('#rejected').change(function(){
		if($('#rejected').prop('checked')==true){
			sessionStorage.setItem("Order_status", 'Rejected');
			update_order_status();
			$('.filled-in:not(#rejected)').attr('disabled', true);
			$('.filled-in:not(#rejected)').prop('checked', false);
			
		}
		else{
			$('#accepted').prop('checked', false);
			$('#accepted').attr('disabled', false);
		}
	});
	$('#accepted').change(function(){
		if($('#accepted').prop('checked')==true){
			sessionStorage.setItem("Order_status", 'Accepted');
			update_order_status();
			$('#done').attr('disabled', false);
		}
		else {
			$('#done').prop('checked', false);
			$('#delivery').prop('checked', false);
			$('#completed').prop('checked', false);
			$('#done').attr('disabled', true);
			$('#delivery').attr('disabled', true);
			$('#completed').attr('disabled', true);
		}
	});
	$('#done').change(function(){
		if($('#done').prop('checked')==true){
			sessionStorage.setItem("Order_status", 'Done');
			update_order_status();
			$('#delivery').attr('disabled', false);
		}
		else {
			$('#delivery').prop('checked', false);
			$('#completed').prop('checked', false);
			$('#delivery').attr('disabled', true);
			$('#completed').attr('disabled', true);
		}
	});
	$('#delivery').change(function(){
		if($('#delivery').prop('checked')==true){
			sessionStorage.setItem("Order_status", 'Delivery');
			update_order_status();
			$('#completed').attr('disabled', false);
		}
		else {
			$('#completed').prop('checked', false);
			$('#completed').attr('disabled', true);
		}
	});
	$('#completed').change(function(){
		if($('#completed').prop('checked')==true){
			sessionStorage.setItem("Order_status", 'Completed');
			update_order_status();
		}
	});
	
	function update_order_status(){
		var order_status = sessionStorage.getItem("Order_status");
		var order_id = "<?php printf($_SESSION["order_id"]); ?>";
		var supplier_id = "<?php echo $_SESSION["supplier_id"]; ?>";
		var order_data_to_pass = order_id.toString()+"#$#"+supplier_id.toString()+"#$#"+order_status;
		console.log(order_data_to_pass);
		$.ajax({
		  url: "update_order_status.php",
		  data: {
			order_data_to_pass: order_data_to_pass
		  },
		  type: 'post',
		  cache: false,
		  success: function(html){
			  alert('Order status successfully updated to '+order_status);
		  }
		});
	}
</script>





















