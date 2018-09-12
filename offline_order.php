<script>
	$(document).ready(function() {
		//$('select').material_select();
		sessionStorage.setItem('material_selected', "");
	  });
</script>
<script type="text/javascript" src="scripts/major_navigate.js"></script>
<div class="offline_main material_selection">
	<div class="offline_title">
		<h5>Chose Material</h5>
	</div>
	<div class="offline_form">
		<div class="row chose_material">
			<p>
			  <input class="with-gap" name="materials" type="radio" id="cement" value="Cement" />
			  <label for="cement">Cement</label>
			</p>
			<p>
			  <input class="with-gap" name="materials" type="radio" id="bricks" value="Bricks" />
			  <label for="bricks">Bricks</label>
			</p>
			<p>
			  <input class="with-gap" name="materials" type="radio" id="sand"  value="Sand" />
			  <label for="sand">Sand</label>
			</p>
		</div>
		<hr class="navigate_hr">
		<div class="navigate_button" onclick='save_material();'>
			<i class="material-icons">forward</i>
		</div>
	</div>
</div>

<script>
	function save_material(){
		var material_selected = $('[name="materials"]:checked').val();
		console.log(material_selected);
		sessionStorage.setItem('material_selected', material_selected);
		$('.land_inner').load('order_quantity_selection.php');
	}
</script>