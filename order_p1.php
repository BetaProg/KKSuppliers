<?php 
	session_start();
?>
<!--<?php include 'db_config.php'; ?> -->
<html>
	<head>
		<title>Order Creation1</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="styles/materialize.min.css" >
		<link rel="stylesheet" href="styles/jquery.mobile-1.4.5.css" >
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 
		<link rel="stylesheet" href="styles/custom/order_styles.css" >
		<link rel="stylesheet" href="styles/custom/common_styles.css" >
		<script type="text/javascript" src="scripts/jquery.min.js"></script>
		<script type="text/javascript" src="scripts/materialize.min.js"></script>
		<script type="text/javascript" src="scripts/major_navigate.js"></script>
		
		<style type="text/css">
	@keyframes float {
	0% {
		box-shadow: 0 5px 15px 0px rgba(0,0,0,0.6);
		transform: translatey(0px);
	}
	50% {
		box-shadow: 0 25px 15px 0px rgba(0,0,0,0.2);
		transform: translatey(-20px);
	}
	100% {
		box-shadow: 0 5px 15px 0px rgba(0,0,0,0.6);
		transform: translatey(0px);
	}
}

.instructions_container img{
	margin-top: 2%;
	width: 100%;
	!height: 52%;
	height:auto;
	display: flex;
	!display:none;
	flex-direction: column;
	justify-content: center;
	align-items: center;
}

.avatar {
	!width: 60%;
	!height: 100%;
	padding-top:15%;
	text-align: center;
	box-sizing: border-box;
	border: 2px white solid;
	border-radius: 4%;
	overflow: hidden;
	box-shadow: 0 5px 15px 0px rgba(0,0,0,0.6);
	transform: translatey(0px);
	animation: float 6s ease-in-out infinite;
	img { width: 100%; height: auto; }
}


</style>
	</head>
	<body>
		<div class='land_main'>
			<div class="land_inner">
				<div class="title_section">
					<h5>KK Consultants</h5>
				</div>
				<div class="type_selection_section">
					<div class="row selection_row">
						
						<div class="instructions_container">
							<div class="avatar">
								<div class="col s12 offline_selection waves-effect waves-#000" onclick="load_offline_creation();">
								<center>
									<img src="images/transp/trans_rocket1.png">
									<h5>Offline Order</h5>
								</center>
							</div>
							</div>
						</div>
	
						
						
						
						<hr>
						<div class="col s12 online_selection disabled">
							<center>
								<img src="images/rocket_blue.png">
								<h5>Online Order</h5>
								<p>(Build In-Progress)</p>
							</center>
						</div>
					</div>
				</div>
			</div>
			  <a class="btn-floating btn-small waves-effect waves-light red"><i class="material-icons">add</i></a>
		</div>
	</body>
</html>