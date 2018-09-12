<?php
	session_start();
	if(isset($_SESSION["supplier_name"])){
		$supplier_name = $_SESSION["supplier_name"] ;
		$supplier_mobile = $_SESSION["supplier_mobile"];
		$supplier_id = $_SESSION["supplier_id"];
		//echo $supplier_name;
		
		echo "<script>console.log($supplier_id);</script>";
		echo "<script>console.log($supplier_mobile);</script>";
	}
	else {
		header('Location: supplier_login.php');
	}
?>

<?php include 'db_config.php'; ?>
<?php include 'headers.php'; ?>
<div class="supplier_landing_all">
	<div class="supplier_landing_top_nav z-depth-1">
		<img src="images/user_icon.png"><h5><?php echo $supplier_name; ?></h5>
		<a href="logout.php" style="float: right;position: fixed;top:6;right:18;font-size: 5px;font-weight: bolder;/*color:#666;*/color:#EE4D43;"><i class="material-icons">power_settings_new</i></a>
	</div>
	<div class="supplier_landing_main_content">
		<div class="supplier_current">
			<?php 
				$get_my_orders = mysql_query("SELECT * FROM kks_orders WHERE order_suppliers LIKE '%{$supplier_id}%' order by order_date desc");
				if(mysql_num_rows($get_my_orders)>0){
					while ($my_orders_row = mysql_fetch_array($get_my_orders)) {
						$supplier_name = $my_orders_row['supplier_name'];
						$supplier_mobile = $my_orders_row['supplier_mobile'];
						$order_id = $my_orders_row['order_id'];
						$order_quantity = $my_orders_row['order_quantity'];
					}
					echo "<div class='delivery_truck_main'><p>Recent Order</p>";
					echo "<img src='images/delivery_truck.png' />";
					echo "<center><label>Order Id : </label><b>".$order_id."</b></center></div>";
				}
				else {}
			?>
		</div>
		<div class="supplier_landing_orders">
			<div class="supplier_my_orders">
				<h5>My Orders</h5>
				
			</div>
			<?php 
				$get_my_orders = mysql_query("SELECT * FROM kks_orders WHERE order_suppliers LIKE '%{$supplier_id}%' order by order_date desc");
				if(mysql_num_rows($get_my_orders)>0){
					while ($my_orders_row = mysql_fetch_array($get_my_orders)) {
						$supplier_name = $my_orders_row['supplier_name'];
						$supplier_mobile = $my_orders_row['supplier_mobile'];
						$order_material = $my_orders_row['order_material'];
						$order_quantity = $my_orders_row['order_quantity'];
						$order_id = $my_orders_row['order_id'];
						$order_quantity = $my_orders_row['order_quantity'];
						$order_date = $my_orders_row['order_date'];
						$order_day = substr($order_date, 4, 2);
						$order_month = substr($order_date, 2, 2);
						$order_year = '20'.substr($order_date, 0, 2);
						//echo "<center><label>Order Id : </label><b>".$order_id."</b></center>";
						if($order_material == "Sand"){
							$material_icon = "images/landing_icons/sand.png";
						}
						else if($order_material == "Cement"){
							$material_icon = "images/landing_icons/cement.png";
						}
						else if($order_material == "Bricks"){
							$material_icon = "images/landing_icons/brick.png";
						}
						echo "<div class='row single_order waves-effect waves-light' id='$order_id' onclick='open_order_details(this.id);'><div class='col s2'><img class='material_icons' src='images/delivery_small.png'></div><div class='col s10'><b><span>$order_quantity - $order_material</span></b><p>Ordered on: $order_day-$order_month-$order_year</p></div></div>";
						
					}
				}
				else {}
			?>
		</div>
	</div>
</div>
<script>
	function open_order_details(order_id) {
		$.ajax({
		  url: "open_order.php",
		  data: {
			order_id: order_id
		  },
		  type: 'post',
		  cache: false,
		  success: function(html){
			  $('.supplier_landing_main_content').html(html);
			  //document.write(html);
		  }
		});
	}
</script>