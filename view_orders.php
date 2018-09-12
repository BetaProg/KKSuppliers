<script>
	$(document).ready(function() {
		//$('select').material_select();
		sessionStorage.setItem('material_selected', "");
	  });
</script>
<script type="text/javascript" src="scripts/major_navigate.js"></script>
<?php
	include 'db_config.php';
	$order_count_sql = mysql_query("SELECT * from kks_orders");
	$order_count = mysql_num_rows($order_count_sql);
?>
<div class="orders_content">
	<div class="orders_title">
		<h5>Total Orders :<span class="order_count_value"><a><?php echo $order_count; ?></a></span></h5>
	</div>
	<div class="orders_classification">
		<div class="order_type_selection">
			<hr>
			<p>
				<input class="with-gap" name="order_type" type="radio" id="all_orders"  />
				<label for="all_orders">All Orders</label>
			
				<input class="with-gap" name="order_type" type="radio" id="offline_orders"  />
				<label for="offline_orders">Offline</label>
			
				<input class="with-gap" name="order_type" type="radio" id="online_orders"  />
				<label for="online_orders">Online</label>
			</p>
			<hr>
		</div>
		<div class="orders_list">
			<?php 
				$select_all_orders = mysql_query("SELECT * from kks_orders");
				$select_all_orders = mysql_query("SELECT * from kks_orders");
				$select_all_orders = mysql_query("SELECT * from kks_orders");
				if((mysql_num_rows($select_all_orders))>0){
					echo "<br>";
					while($row_all_orders = mysql_fetch_array($select_all_orders)){
						$order_id = $row_all_orders['order_id'];
						$order_date = $row_all_orders['order_date'];
						$order_day = substr($order_date, 4, 2);
						$order_month = substr($order_date, 2, 2);
						$order_year = '20'.substr($order_date, 0, 2);
						$order_type = $row_all_orders['order_type'];
						$order_quantity = $row_all_orders['order_quantity'];
						$order_creator = $row_all_orders['order_creator'];
						$order_material = $row_all_orders['order_material'];
						if($order_material == "Sand"){
							$material_icon = "images/landing_icons/sand.png";
						}
						else if($order_material == "Cement"){
							$material_icon = "images/landing_icons/cement.png";
						}
						else if($order_material == "Bricks"){
							$material_icon = "images/landing_icons/brick.png";
						}
						echo "<div class='row single_order' id='$order_id' onclick='open_order_details(this.id);'><div class='col s2'><img class='material_icons' src='$material_icon'></div><div class='col s10'><b>$order_quantity - $order_material</b><p>Ordered on: $order_day-$order_month-$order_year</p></div></div>";
					}
				}
				else {
					echo "<center><p>No Orders were created in this Category.</p></center>";
				}
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
			  $('.orders_content').html(html);
		  }
		});
	}
</script>















