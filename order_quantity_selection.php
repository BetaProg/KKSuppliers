<script>
 $(document).ready(function() {
    sessionStorage.setItem('bricks_quantity', "");
  });
</script>
<script type="text/javascript" src="scripts/major_navigate.js"></script>
<div class="offline_main quantity_selection">
	<div class="offline_title">
		<h5>Select Quantity</h5>
	</div>
	<div class="offline_form">
		<div class="row chose_quantity">
          <div class="input-field col s12">
            <input class="bricks_quantity" id="bricks_quantity" type="number" title="Only Numeric Value accepted">
            <label for="bricks_quantity">Bricks Quantity</label>
          </div> 
			<center><p>OR</p></center>
		  <div class="col s12 pre_filled_quantity">
			<div class="row">
				<!--<div class="col s4">
					<a class="waves-effect waves-light btn">10000</a>
				</div>
				<div class="col s4">
					<a class="waves-effect waves-light btn">50000</a>
				</div>
				<div class="col s4">
					<a class="waves-effect waves-light btn">100000</a>
				</div>
				<div class="col s4">
					<a class="waves-effect waves-light btn">500000</a>
				</div>-->
				<p class="range-field">
				  <input type="range" id="selected_range" onchange="selected_bricks();" min="1" max="100" />
				</p>
				<p><i>Selected Value x 1000 = </i><b class="total_range"></b></p>
			</div>
		  </div>
        </div>
		<hr class="navigate_hr">
		<div class="navigate_button" onclick='save_quantity();'>
			<i class="material-icons">forward</i>
		</div>
	</div>
</div>
<script>
	function save_quantity(){
		if($('#bricks_quantity').val() == ""){
			sessionStorage.setItem('bricks_quantity', parseInt($('.total_range').text()));
		}
		else {
			var bricks_quantity = $('#bricks_quantity').val();
			console.log(bricks_quantity);
			sessionStorage.setItem('bricks_quantity', bricks_quantity);
		}
		$('.land_inner').load('supplier_selection.php');
	}
	function selected_bricks(){
		$('.total_range').text("");
		$('.total_range').append(parseInt($('#selected_range').val())*1000);
		$('#bricks_quantity').val(parseInt($('#selected_range').val())*1000);
		//save_quantity();
	}
</script>