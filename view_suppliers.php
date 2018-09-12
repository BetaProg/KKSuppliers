<script>
	$(document).ready(function() {
		//$('select').material_select();
		sessionStorage.setItem('material_selected', "");
	  });
</script>
<script type="text/javascript" src="scripts/major_navigate.js"></script>
<?php
	include 'db_config.php';
	$suppliers_count_sql = mysql_query("SELECT * from kks_suppliers");
	$suppliers_count = mysql_num_rows($suppliers_count_sql);
?>
<div class="orders_content">
	<div class="orders_title">
		<h5>Total Suppliers :<span class="order_count_value"><a><?php echo $suppliers_count; ?></a></span></h5>
	</div>
	<div class="orders_classification">
		<div class="order_type_selection">
			<hr>
			<p>
				<input class="with-gap" name="supplier_type" type="radio" id="all_suppliers"  />
				<label for="all_suppliers">All Suppliers</label>
			
				<input class="with-gap" name="supplier_type" type="radio" id="brick_suppliers"  />
				<label for="brick_suppliers">Bricks</label>
			
				<input class="with-gap" disabled="true" name="supplier_type" type="radio" id="other_suppliers"  />
				<label for="other_suppliers">Others</label>
			</p>
			<hr>
		</div>
		<div class="orders_list">
			<?php 
				$select_all_suppliers = mysql_query("SELECT * from kks_suppliers order by supplier_id desc");
				if((mysql_num_rows($select_all_suppliers))>0){
					echo "<br>";
					while($row_all_orders = mysql_fetch_array($select_all_suppliers)){
						$supplier_id = $row_all_orders['supplier_id'];
						$supplier_reg_date = $row_all_orders['supplier_reg_date'];
						$supplier_reg_day = substr($supplier_reg_date, 4, 2);
						$supplier_reg_month = substr($supplier_reg_date, 2, 2);
						$supplier_reg_year = '20'.substr($supplier_reg_date, 0, 2);
						$supplier_type = $row_all_orders['supplier_type'];
						$supplier_name = $row_all_orders['supplier_name'];
						$supplier_mobile = $row_all_orders['supplier_mobile'];
						
						if($supplier_type == "Sand"){
							$material_icon = "images/landing_icons/sand.png";
						}
						else if($supplier_type == "Cement"){
							$material_icon = "images/landing_icons/cement.png";
						}
						else if($supplier_type == "Bricks"){
							$material_icon = "images/landing_icons/brick.png";
						}
						echo "<div class='row single_order' id='$supplier_id' onclick='open_supplier_details(this.id);'><div class='col s2'><img class='material_icons' src='$material_icon'></div><div class='col s10'><b>$supplier_type</b><p>Registered on: $supplier_reg_day-$supplier_reg_month-$supplier_reg_year</p></div></div>";
					}
				}
				else {
					echo "<center><p>No Suppliers were Registered in this Category.</p></center>";
				}
			?>
		</div>
	</div>
</div>
<script>
	function open_supplier_details(supplier_id) {
		$.ajax({
		  url: "open_supplier.php",
		  data: {
			supplier_id: supplier_id
		  },
		  type: 'post',
		  cache: false,
		  success: function(html){
			  $('.orders_content').html(html);
		  }
		});
	}
</script>















