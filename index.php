<?php 
	session_start();
?>
<!--<?php include 'db_config.php'; ?> -->

<html>
	<?php include 'headers.php'; ?>
	<script>
	$(".button-collapse").sideNav();
</script>
	<body>
		<div class="top_nav_bar">
			<a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
			<h5 class="nav_title">KK Consultants</h5>
		</div>
		<div class="side_nav_container">
			
		</div>
		<div class="main_content">
			<div class="extras_content">
				
			</div>
			<div class="grid_menu">
				<table class="striped">
					<tr>
						<td>
							<div class="row" onclick="$('.main_content').load('order_p1.php');">
								<div class="col s12">
									<center><img src="images/landing_icons/brick.png"></center>
								</div>
								<div class="col s12">
									<center><p>Create Order</p></center>
								</div>
							</div>
						</td>
						<td>
							<div class="row" onclick="$('.main_content').load('view_orders.php');">
								<div class="col s12">
									<center><img src="images/landing_icons/clipboard.png"></center>
								</div>
								<div class="col s12">
									<center><p>View All Orders</p></center>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="row" onclick="$('.main_content').load('view_suppliers.php');">
								<div class="col s12">
									<center><img src="images/landing_icons/truck.png"></center>
								</div>
								<div class="col s12">
									<center><p>View Suppliers</p></center>
								</div>
							</div>
						</td>
						<td>
							<div class="row">
								<div class="col s12">
									<center><img src="images/landing_icons/businessman.png"></center>
								</div>
								<div class="col s12">
									<center><p>View Customers</p></center>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="row">
								<div class="col s12">
									<center><img src="images/landing_icons/account.png"></center>
								</div>
								<div class="col s12">
									<center><p>My Account</p></center>
								</div>
							</div>
						</td>
						<td>
							<div class="row">
								<div class="col s12">
									<center><img src="images/landing_icons/management.png"></center>
								</div>
								<div class="col s12">
									<center><p>Admin Panel</p></center>
								</div>
							</div>
						</td>
					</tr>
				</table>
			</div>
		</div>
		
	</body>
</html>

<script>
	$('.button-collapse').click(function(){
		if($('.side_nav_container').css('display') == "none"){
			$(".side_nav_container").css("margin-left",-$(this).width()).animate({marginLeft:0}, 700);
			$('.side_nav_container').css('display', 'block');
		}
		else{
			$('.side_nav_container').css('display', 'none');
		}
	})
</script>









