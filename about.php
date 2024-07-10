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
			<h1>about us</h1>
		</div>
		<div class="title2">
			<a href="home.php">home  </a><span>/about</span>
		</div>
		<div class="about-category">
			<div  class="box">
				<img src="components/img/3.webp">
				<div class="detail">
					<span>coffee</span>
					<h1>lemon green</h1>
					<a href="view_product.php" class="btn">shop now</a>
				</div>
			</div>
			<div  class="box">
				<img src="components/img/about.png">
				<div class="detail">
					<span>coffee</span>
					<h1>lemon teaname</h1>
					<a href="view_product.php" class="btn">shop now</a>
				</div>
			</div>
			<div  class="box">
				<img src="components/img/2.webp">
				<div class="detail">
					<span>piti</span>
					<h1>lemon teaname</h1>
					<a href="view_product.php" class="btn">shop now</a>
				</div>
			</div>
			<div  class="box">
				<img src="components/img/1.webp">
				<div class="detail">
					<span>coffee</span>
					<h1>lemon green</h1>
					<a href="view_product.php" class="btn">shop now</a>
				</div>
			</div>
		</div>
		<section class="services">
			<div class="title">
				<img src="components/img/download.png" class="logo">
				<h1>why choose us</h1>
				<p>ay apiwa toragtte moko hetuwa</p>
			</div>
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
		<div class="about">
			<div class="row">
				<div class="img-box">
					<img src="components/img/3.png">
				</div>
				<div class="detail">
					<h1>visit our beautiful showroom!</h1>
					<p>our showroom is an expression of what we love doing; being creative with floral and plant arrangements</p>
					<a href="view_product.php" class="btn">show now</a>
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