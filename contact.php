<?php 
include 'components/connection.php'; 
?>
<style type="text/css">
<?php 
include 'style.css'; 
?>
</style>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='https://unpkg.com/browse/boxicons@2.1.4/css/boxicons.css' rel='stylsheet'>
	<title>Green Cofee - home page</title>
</head>
<body>
	<?php include 'components/header.php'; ?>
	<div class="main">
		<div class="banner">
			<h1>Contact us</h1>
		</div>
		<div class="title2">
			<a href="home.php">home  </a><span>/contact</span>
		</div>
		<section class="services">
			<div class="box-container">
				<div class="box">
					<img src="components/img/icon2.png">
					<div class="detail">
						<h3>great savings</h3>
						<p>save big on evry order</p>
					</div>
				</div>
				<div class="box">
					<img src="components/img/icon1.png">
					<div class="detail">
						<h3>24*7 support</h3>
						<p>we awake evrytime</p>
					</div>
				</div>
				<div class="box">
					<img src="components/img/icon0.png">
					<div class="detail">
						<h3>gift vouchers</h3>
						<p>get a gift</p>
					</div>
				</div>
				<div class="box">
					<img src="components/img/icon.png">
					<div class="detail">
						<h3>Global</h3>
						<p>we are at anyplace</p>
					</div>
				</div>
			</div>
		</section>
		<div class="address">
			<div class="title">
				<img src="components/img/download.png" class="logo">
				<h1>contact detail</h1>
				<p>contact us through following methods</p>
			</div>
			<div class="box-container">
				<div class="box">
					<i class="fa-solid fa-map-pin"></i>
					<div>
						<h4>address</h4>
						<p>1092 New York, 3rd lane</p>
					</div>
				</div>
				<div class="box">
					<i class="fa-solid fa-phone"></i>
					<div>
						<h4>phone number</h4>
						<p>+1 1254 4785 124</p>
					</div>
				</div>
				<div class="box">
					<i class="fa-solid fa-envelope"></i>
					<div>
						<h4>email</h4>
						<p>coffeecafer@nyc.us</p>
					</div>
				</div>
			</div>
		</div>
		<!--home slider end-->
		<?php include 'components/footer.php'; ?>
	</div>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
	<script src="script.js"></script>
	<?php include 'components/alert.php'; ?>
</body>
</html>