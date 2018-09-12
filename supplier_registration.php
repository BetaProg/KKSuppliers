<?php
	session_start();
	if(isset($_SESSION["supplier_name"])){
		$supplier_name = $_SESSION["supplier_name"] ;
		$supplier_mobile = $_SESSION["supplier_mobile"];
		header('Location: supplier_index.php');
		//echo $supplier_name;
	}
?>
<?php include 'headers.php'; ?>
<script>
	$(document).ready(function() {
		$('select').material_select();
	  });
</script>
<script type="text/javascript" src="scripts/major_navigate.js"></script>
<?php
	include 'db_config.php';
?>

<style>
	.register_logo{
		width:100%;
		height:30%;
		background-color:#3498db;
		color:#fff;
	}
	.register_logo h5{
		margin-left:5%;
		padding-top:5%;
		margin-top:0px;
		font-size: 18px;
		font-family: Josefin Sans;
	}
	.register_logo p{
		!padding-top:10%;
		padding-left:5%;
		!padding-right:5%;
		font-size:15px;
		font-family:calibri;
	}
	.register_logo img {
		width:50px;
	}
	.register_logo .s4{
		margin-top:5%;
	}
	
	.register_main_content{
		margin-top:5%;
		margin-bottom:15%;
		width:100%;
		height:auto;
	}
	.register_main_content .register_form{
		width:90%:
		height:100%;
		margin:5%;
	}
	.register_form .s12{
		margin-top:0px;
	}
	
	.signup_btn {
		background-color:#e74c3c;
	}
	.signin_btn{
		text-align:center;
	}
</style>


<div class="register_content">
	<div class="register_logo">
		<h5>K&K Associates</h5>
		<div class="row">
			<div class="col s8">
				<p>Your details are safe with us. We wont share your details with anyone</p>
			</div>
			<div class="col s4">
				<img src="images/rocket_red.png">
			</div>
		</div>
	</div>
	<div class="register_main_content">
		<div class="register_form">
			
				<div class="row">
					<div class="input-field col s12">
					  <input id="supplier_name" class="supplier_name" type="text" class="validate">
					  <label for="supplier_name">Name</label>
					</div>
					<div class="input-field col s12">
					  <input id="supplier_mobile" name="supplier_mobile" type="number" class="validate">
					  <label for="supplier_mobile">Mobile No.</label>
					</div>
					<div class="input-field col s12">
						<select name="supplier_location" id="supplier_location" class="supplier_location" >
						  <option value="" disabled selected>Your Location</option>
						  <option value="NAD">NAD</option>
						  <option value="Madhurawada">Madhurawada</option>
						  <option value="Anakapalli">Anakapalli</option>
						</select>
					</div>
					<div class="input-field col s12">
						<select name="supplier_material" id="supplier_material" class="supplier_material">
						  <option value="" disabled selected>Supplier Material</option>
						  <option value="NAD" disabled >Cement</option>
						  <option value="Bricks">Bricks</option>
						  <option value="Others" disabled>Others</option>
						</select>
					</div>
				</div>
				<center>
					<button class="btn waves-effect waves-light signup_btn" onclick="signup();" name="action">Sign up
						<i class="material-icons right">send</i>
					</button>
					<p class="signin_btn"><a href="supplier_login.php">Existing User? Sign In</a></p>
				</center>
			
		</div>
	</div>
</div>

<script>
	function signup(){
		var supplier_name = $('#supplier_name').val();
		var supplier_mobile = $('#supplier_mobile').val();
		var supplier_location = $('#supplier_location').val();
		
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
		
		var supplier_date = date;
		var supplier_material = $('#supplier_material').val();
		
		if(supplier_name!="" && supplier_mobile!= "" && supplier_location!= "" && supplier_location!= null && supplier_date!="" && supplier_material!= "" && supplier_material!= null){
			if(supplier_name.length>=5){
				if(supplier_mobile.length>=10){
					var data_to_pass = supplier_name+"#$#"+supplier_mobile+"#$#"+supplier_location+"#$#"+supplier_date+"#$#"+supplier_material;
					//alert(data_to_pass);
					 $.ajax({
					  url: "supplier_register_backend.php",
					  data: {
						supplier_data_to_pass: data_to_pass
					  },
					  type: 'post',
					  cache: false,
					  success: function(html){
						  //$('.record_details').html(html);
						  console.log(html);
						  if(html.indexOf("Insertion Success")>=0){
							  //alert(html);
							  //location.reload();
							  window.location.href = 'supplier_login.php';
						  }
						  else {
							alert(html);  
						  }
						  //location.reload();
					  }
					});
				}
				else {
					alert("Mobile Number should have minimum 10 numbers");
				}
			}
			else {
				alert("Minimum 5 Characters needed for Supplier name");
			}
		}
		else {
			alert("Please enter all values to proceed");
		}
		
	}
	
	
</script>




