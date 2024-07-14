<?php 
include 'connection.php'; 
session_start();
if (isset($_SESSION['user_id'])) {
	$user_id = $_SESSION['user_id'];
}else{
	$user_id ='';
}
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
		<section class="home-section">
					<div class="slider">
			<div class="slider__slider slide1">
				<div class="overlay"></div>
					<div class="slide-detail">
						<h1>cat1 buy</h1>
						<p>lorem ipsum dolor sit amet conseijdjcjx jcsndu</p>
						<a href="view_products.php" class="btn">shop now</a>
					</div>
					<div class="hero-dec-top"></div>
					<div class="hero-dec-bottom"></div>		
			</div>
			<!-- slide end--->
			<div class="slider__slider slide2">
				<div class="overlay"></div>
					<div class="slide-detail">
						<h1>cat2 buy</h1>
						<p>lorem ipsum dolor sit amet conseijdjcjx jcsndu</p>
						<a href="view_products.php" class="btn">shop now</a>
					</div>
					<div class="hero-dec-top"></div>
					<div class="hero-dec-bottom"></div>		
			</div>
			<div class="slider__slider slide3">
				<div class="overlay"></div>
					<div class="slide-detail">
						<h1>cat3 buy</h1>
						<p>lorem ipsum dolor sit amet conseijdjcjx jcsndu</p>
						<a href="view_products.php" class="btn">shop now</a>
					</div>
					<div class="hero-dec-top"></div>
					<div class="hero-dec-bottom"></div>		
			</div>
			<div class="slider__slider slide4">
				<div class="overlay"></div>
					<div class="slide-detail">
						<h1>cat4 buy</h1>
						<p>lorem ipsum dolor sit amet conseijdjcjx jcsndu</p>
						<a href="view_products.php" class="btn">shop now</a>
					</div>
					<div class="hero-dec-top"></div>
					<div class="hero-dec-bottom"></div>		
			</div>
			<div class="slider__slider slide5">
				<div class="overlay"></div>
					<div class="slide-detail">
						<h1>cat5 buy</h1>
						<p>lorem ipsum dolor sit amet conseijdjcjx jcsndu</p>
						<a href="view_products.php" class="btn">shop now</a>
					</div>
					<div class="hero-dec-top"></div>
					<div class="hero-dec-bottom"></div>		
			</div>
			<!--slide end-->
			
		</div>
		</section>
		<section class="thumb">
			<div class="box-container">
				<div class="box">
					<img src="components/img/thumb2.jpg">
					<h3>green Tea</h3>
					<p>lorem ispsum green tea </p>
					<i class="fa-solid fa-chevron-right"></i>
				</div>
				<div class="box">
					<img src="components/img/thumb0.jpg">
					<h3>lemon Tea</h3>
					<p>lorem ispsum green tea </p>
					<i class="fa-solid fa-chevron-right"></i>
				</div>
				<div class="box">
					<img src="components/img/thumb1.jpg">
					<h3>coffee Tea</h3>
					<p>lorem ispsum green tea </p>
					<i class="fa-solid fa-chevron-right"></i>
				</div>
				<div class="box">
					<img src="components/img/thumb.jpg">
					<h3>Normal Tea</h3>
					<p>lorem ispsum green tea </p>
					<i class="fa-solid fa-chevron-right"></i>
				</div>
			</div>
		</section>
		<section class="container">
			<div class="box-container">
			<div class="box">
				<img src="components/img/about-us.jpg">
			</div>
			<div class="box">
				<img src="components/img/download.png">
				<span>healthy tea</span>
				<h1>save up to 20% off</h1>
				<p>lorem ipsum discount</p>
			</div>
		</div> 
		</section>
		<section class="shop">
			<div class="title">
				<img src="components/img/download.png">
				<h1>Trending Products</h1>
			</div>
			<div class="row">
				<img src="components/img/about.jpg">
				<div class="row-detail">
					<img src="components/img/basil.jpg">
					<div class="top-footer">
						<h1>a cup of tea makes you refresh</h1>
					</div>
				</div>
			</div>
			<div class="box-container">
				<div class="box">
					<img src="components/img/card.jpg">
					<a href="view_products.php" class="btn">shop now</a>
				</div>
				<div class="box">
					<img src="components/img/card0.jpg">
					<a href="view_products.php" class="btn">shop now</a>
				</div>
				<div class="box">
					<img src="components/img/card1.jpg">
					<a href="view_products.php" class="btn">shop now</a>
				</div>
				<div class="box">
					<img src="components/img/card2.jpg">
					<a href="view_products.php" class="btn">shop now</a>
				</div>
				<div class="box">
					<img src="components/img/10.jpg">
					<a href="view_products.php" class="btn">shop now</a>
				</div>
				<div class="box">
					<img src="components/img/6.webp">
					<a href="view_products.php" class="btn">shop now</a>
				</div>
			</div>
		</section>
		<section class="shop-category">
			<div class="box-container">
				<div class="box">
					<img src="components/img/6.jpg">
					<div class="detail">
						<span>BIG OFFER</span>
						<h1>Extra 15% off</h1>
						<a href="view_products.php" class="btn">shop now</a>
					</div>
				</div>
				<div class="box">
					<img src="components/img/6.jpg">
					<div class="detail">
						<span>new taste</span>
						<h1>coffee house</h1>
						<a href="view_products.php" class="btn">shop now</a>
					</div>
				</div>
			</div>
		</section>
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
		<section class="brands">
			<div class="box-container">
				<div class="box">
					<img src="components/img/brand (1).jpg">
				</div>
				<div class="box">
					<img src="components/img/brand (2).jpg">
				</div>
				<div class="box">
					<img src="components/img/brand (3).jpg">
				</div>
				<div class="box">
					<img src="components/img/brand (4).jpg">
				</div>
			    <div class="box">
					<img src="components/img/brand (5).jpg">
				</div>
			</div>
		</section>
		<!--home slider end-->
		<?php include 'components/footer.php'; ?>
	</div>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
	
	<script src="script.js"></script>
	<?php include 'components/alert.php'; ?>
</body>
</html>