<?php
	session_start();
	if(isset($_SESSION["supplier_name"])){
		$supplier_name = $_SESSION["supplier_name"] ;
		$supplier_mobile = $_SESSION["supplier_mobile"];
		header('Location: supplier_index.php');
		//echo $supplier_name;
	}
	else {
		//header('Location: supplier_login.php');
		//echo "9898858585";
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
					  <input id="supplier_mobile" name="supplier_mobile" type="number" class="validate">
					  <label for="supplier_mobile">Mobile No.</label>
					</div>
				</div>
				<center>
					<button class="btn waves-effect waves-light signup_btn" onclick="signin();" name="action">SIGN IN
						<i class="material-icons right">send</i>
					</button>
					<p class="signin_btn"><a href="supplier_registration.php">New here? Sign Up</a></p>
				</center>
			
		</div>
	</div>
</div>

<script>
	function signin(){
		var supplier_mobile = $('#supplier_mobile').val();
		
		 $.ajax({
		  url: "supplier_login_backend.php",
		  data: {
			supplier_data_to_pass: supplier_mobile
		  },
		  type: 'post',
		  cache: false,
		  success: function(html){
			  //$('.record_details').html(html);
			  if(html.indexOf("Login Success")>=0){
				  window.location = 'supplier_index.php';
			  }
			  else {
				alert(html);  
			  }
			  //location.reload();
		  }
		});		
		
	}
	
	
</script>




