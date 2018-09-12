<script type="text/javascript" src="scripts/major_navigate.js"></script>
<script>	
	var material_selected = sessionStorage.getItem('material_selected');
	var bricks_quantity = sessionStorage.getItem('bricks_quantity');
	var selected_location = sessionStorage.getItem('selected_location');
	var selected_suppliers = sessionStorage.getItem('selected_suppliers');
	var selected_supplier_id = sessionStorage.getItem('selected_supplier_id');
	var order_type = sessionStorage.getItem('order_type');
	
	$('.final_material_selected').text(material_selected);
	$('.final_quantity_selected').text(bricks_quantity);
	$('.final_location_selected').text(selected_location);
	$('.final_suppliers_selected').text(selected_suppliers);
</script>
<div class="offline_main order_review">
	<div class="offline_title">
		<h5>Order Details</h5>
		<p>Please review your order details before proceeding</p>
	</div>
	<div class="offline_form">
		<div class="row order_details">
			<table>
				<tr>
					<td><label>Material</label></td>
					<td><h5 class="final_material_selected"></h5></td>
				</tr>
				<tr>
					<td><label>Quantity</label></td>
					<td><h5 class="final_quantity_selected"></h5></td>
				</tr>
				<tr>
					<td><label>Location</label></td>
					<td><h5 class="final_location_selected"></h5></td>
				</tr>
				<tr>
					<td><label>Suppliers</label></td>
					<td><h5 class="final_suppliers_selected"></h5></td>
				</tr>
			</table>
		</div>
		<hr class="navigate_hr">
		<div class="save_button" onclick='save_order();'>
			<!--<center>Save<i class="material-icons save_order">save</i></center>-->
			<center><a class="waves-effect waves-light btn save_order"><i class="material-icons left">save</i>save</a></center>
		</div>
	</div>
</div>
<script>
	function save_order(){
		d = new Date();
		month = d.getMonth()+1;
		if(month<10){
			month='0'+month;
		}
		day = d.getDate();
		if(day<10){
			day='0'+day;
		}
		year = d.getFullYear().toString().substr(-2);
		date = year.toString()+month.toString()+day.toString();
		console.log(date);
		
		data_to_pass = date+"#|#"+order_type+"#|#"+"Admin"+"#|#"+material_selected+"#|#"+bricks_quantity+"#|#"+selected_location+"#|#"+selected_supplier_id;
		
		console.log(data_to_pass);
		
		$.ajax({
		  url: "order_insert.php",
		  data: {
			data_to_pass: data_to_pass
		  },
		  type: 'post',
		  cache: false,
		  success: function(html){
			  //$('.record_details').html(html);
			  alert('Success');
		  }
		});
		
		sessionStorage.setItem('material_selected', "");
		sessionStorage.setItem('bricks_quantity', "");
		sessionStorage.setItem('selected_location', "");
		sessionStorage.setItem('selected_supplier_id', "");
		location.reload();
	}
</script>



