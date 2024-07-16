<?php 
include 'add.php';

if (isset($_SESSION['user_id'])) {
	$user_id = $_SESSION['user_id'];
}else{
	$user_id = '';
}

include 'components/connection.php'; 

if (isset($_POST['logout'])) {
	session_destroy();
	header("location: login.php");
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
	<title>Green Cofee - Order page</title>
</head>
<body>
	<?php include 'components/header.php'; ?>
	<div class="main">
		<div class="banner">
			<h1>Orders</h1>
		</div>
		<div class="title2">
			<a href="home.php">home  </a><span>/ orders</span>
		</div>

		<section class="products">
			<div class="box-container">
				<?php
				$select_orders = $conn->prepare("SELECT * FROM orders WHERE user_id = ?");
				$select_orders->execute([$user_id]);
				if ($select_orders->rowCount()>0) {
					while ($fetch_order = $select_orders->fetch(PDO::FETCH_ASSOC)) {
						$select_products = $conn->prepare("SELECT * FROM productst WHERE ID = ?");
						$select_products->execute([$fetch_order['product_id']]);
						if ($select_products->rowCount()>0) {
							while($fetch_products=$select_products->fetch(PDO::FETCH_ASSOC)){

			
				?>
				<div class="box" <?php if($fetch_order['status']=='cancel'){echo 'style="border:2px solid red";';} ?>>
					<a href="view_order.php?get_id=<?=$fetch_order['id']; ?>">
	            <div class="row">
	            	<h3 class="name"><?=$fetch_products['name']; ?></h3>
	            	<p class="price">Price: <?=$fetch_order['price']; ?> x <?=$fetch_order['qty']; ?></p>
	            	<P class="status" style="color: <?php if($fetch_order['status']=='confirmed'){
	            		echo 'green';}elseif ($fetch_order['status']=='canceled'){
	            		echo 'red';}else{echo 'orange';}?>"></P>
	            </div>
				</a>
				</div>
				<?php
 						   }
						}
					}
				}

				?>
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