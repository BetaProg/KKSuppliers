<?php
	include 'db_config.php';
?>
<script>
	$(document).ready(function() {
		$('select').material_select();
		sessionStorage.setItem('selected_location', "");
		sessionStorage.setItem('selected_suppliers', "");
	  });
</script>
<script type="text/javascript" src="scripts/major_navigate.js"></script>
<div class="offline_main supplier_selection">
	<div class="offline_title">
		<h5>Select Supplier</h5>
	</div>
	<div class="offline_form">
		<div class="row chose_quantity">
			<div class="input-field col s12">
				<select class="brick_supply_locations" onchange="get_brick_suppliers(this.value);">
				  <option value="" disabled selected>Choose a Location</option>
				  <option value="NAD">NAD</option>
				  <option value="Madhurawada">Madhurawada</option>
				  <option value="Anakapalli">Anakapalli</option>
				</select>
			</div>
			<div class="input-field col s12 brick_suppliers nad_suppliers">
				<select multiple id="nad_suppliers">
				  <option value="" disabled selected>Select Supplier(s)</option>
				  <?php 
						$select_supplier_sql = mysql_query("SELECT * from kks_suppliers where supplier_location = 'NAD'");
						while($row_supplier_details = mysql_fetch_array($select_supplier_sql)){
						$supplier_id = $row_supplier_details['supplier_id'];
						$supplier_name = $row_supplier_details['supplier_name'];
						echo "
							<option value='$supplier_id' id='$supplier_id'>$supplier_name</option>
						";
						}
					?>
				</select>
			</div>
			<div class="input-field col s12 brick_suppliers mwd_suppliers">
				<select multiple id="mwd_suppliers">
					<option value="" disabled selected>Select Supplier(s)</option>
					<?php 
						$select_supplier_sql = mysql_query("SELECT * from kks_suppliers where supplier_location = 'Madhurawada'");
						while($row_supplier_details = mysql_fetch_array($select_supplier_sql)){
						$supplier_id = $row_supplier_details['supplier_id'];
						$supplier_name = $row_supplier_details['supplier_name'];
						echo "
							<option value='$supplier_id' id='$supplier_id'>$supplier_name</option>
						";
						}
					?>
				</select>
				<label>Select Supplier(s)</label>
			</div>
			
			<div class="input-field col s12 brick_suppliers akp_suppliers">
				<select multiple id="akp_suppliers">
				  <option value="" disabled selected>Select Supplier(s)</option>
				  <?php 
						$select_supplier_sql = mysql_query("SELECT * from kks_suppliers where supplier_location = 'Anakapalli'");
						while($row_supplier_details = mysql_fetch_array($select_supplier_sql)){
						$supplier_id = $row_supplier_details['supplier_id'];
						$supplier_name = $row_supplier_details['supplier_name'];
						echo "
							<option value='$supplier_id' id='$supplier_id'>$supplier_name</option>
						";
						}
					?>
				</select>
				<label>Select Supplier(s)</label>
			</div>
		</div>
		<hr class="navigate_hr">
		<div class="navigate_button" onclick='selected_suppliers();'>
			<i class="material-icons">forward</i>
		</div>
	</div>
</div>

<script>
	function get_brick_suppliers(location) {
		if($('.brick_supply_locations').find(":selected").text() == "NAD"){
			$('.brick_suppliers .active').text("");
			$('.mwd_suppliers').css('display', 'none');
			$('.akp_suppliers').css('display', 'none');
			$('.nad_suppliers').css('display', 'block');
		}
		else if($('.brick_supply_locations').find(":selected").text() == "Madhurawada"){
			$('.brick_suppliers .active').text("");
			$('.nad_suppliers').css('display', 'none');
			$('.akp_suppliers').css('display', 'none');
			$('.mwd_suppliers').css('display', 'block');
		}
		else if($('.brick_supply_locations').find(":selected").text() == "Anakapalli"){
			$('.brick_suppliers .active').text("");
			$('.nad_suppliers').css('display', 'none');
			$('.mwd_suppliers').css('display', 'none');
			$('.akp_suppliers').css('display', 'block');
		}
	}
	
	function selected_suppliers(){
		//var selected_suppliers =  $('.brick_suppliers .select-dropdown').val();
		var selected_suppliers = $('.brick_suppliers ul .active').text();
		
		var selected_supplier_id = $('#nad_suppliers').val() + $('#mwd_suppliers').val() + $('#akp_suppliers').val();
		
		var selected_location = $('.brick_supply_locations').find(":selected").text();
		console.log(selected_suppliers);
		console.log(selected_location);
		sessionStorage.setItem('selected_location', selected_location);
		sessionStorage.setItem('selected_suppliers', selected_suppliers);
		sessionStorage.setItem('selected_supplier_id', selected_supplier_id);
		$('.land_inner').load('review_order.php');
	}
</script>

