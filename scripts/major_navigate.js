function load_offline_creation() {
	//$('.land_inner').load('offline_order.php .material_selection');
	$('.land_inner').load('offline_order.php');
	sessionStorage.setItem("order_type", "Offline");
}
function save_material(material_chosen){
	$('[name="materials"]').change(function(){
		sessionStorage.setItem('material_selected', material_chosen);
	});
}