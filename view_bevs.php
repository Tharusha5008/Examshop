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

//adding wishlist
if (isset($_POST['add_to_wishlist'])) {
	$id = unique_id();
	$product_id = $_POST['product_id'];

	$varify_wishlist = $conn->prepare("SELECT * FROM wishlist WHERE user_id = ? AND product_id = ? ");
	$varify_wishlist->execute([$user_id, $product_id]);

	$cart_num = $conn->prepare("SELECT * FROM cart WHERE user_id = ? AND product_id = ?");
	$cart_num->execute([$user_id, $product_id]);

	if ($varify_wishlist->rowCount() > 0) {
		$warning_msg[] = 'product already exist in your wishlist';
		echo "<script>alert('product already exist in your cart');</script>";
	}elseif ($cart_num->rowCount() > 0) {
		$warning_msg[] = 'product already exist in your cart';
		echo "<script>alert('product already exist in your cart');</script>";
	}else{
		$select_price = $conn->prepare("SELECT * FROM beverage WHERE id = ? LIMIT 1");
		$select_price->execute([$product_id]);
		$fetch_price = $select_price->fetch(PDO::FETCH_ASSOC);

		$insert_wishlist = $conn->prepare("INSERT INTO wishlist (id,user_id,product_id,price) VALUES(?,?,?,?)");
		$insert_wishlist->execute([$id,$user_id,$product_id,$fetch_price['price']]);
		$success_msg[]='product added to wishlist successfully';
		echo "<script>alert('product added to wishlist successfully.');</script>";
	}
}
//adding cart
if (isset($_POST['add_to_cart'])) {
	$id = unique_id();
	$product_id = $_POST['product_id'];

	$qty = $_POST['qty'];
	$qty = filter_var($qty, FILTER_SANITIZE_STRING);

	$varify_cart = $conn->prepare("SELECT * FROM cart WHERE user_id = ? AND product_id = ? ");
	$varify_cart->execute([$user_id, $product_id]);

	$max_cart_items = $conn->prepare("SELECT * FROM cart WHERE user_id = ? ");
	$max_cart_items->execute([$user_id]);

	if ($varify_cart->rowCount() > 0) {
		$warning_msg[] = 'product already exist in your wishlist';
		echo "<script>alert('product already exist in your wishlist');</script>";
	}elseif ($max_cart_items->rowCount() > 20) {
		$warning_msg[] = 'cart is full';
		echo "<script>alert('cart is full.');</script>";
	}else{
		$select_price = $conn->prepare("SELECT * FROM beverage WHERE id = ? LIMIT 1");
		$select_price->execute([$product_id]);
		$fetch_price = $select_price->fetch(PDO::FETCH_ASSOC);

		$insert_cart = $conn->prepare("INSERT INTO cart (id,user_id,product_id,price,qty) VALUES(?,?,?,?,?)");
		$insert_cart->execute([$id,$user_id,$product_id,$fetch_price['price'],$qty]);
		$success_msg[]='product added to cart successfully';
		echo "<script>alert('product added to cart successfully.');</script>";
	}
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
		<div class="banner">
			<h1>Product Detail</h1>
		</div>
		<div class="title2">
			<a href="home.php">home  </a><span>/ product detail</span>
		</div>
		<section class="view_page">
			<?php
			if (isset($_GET['pid'])) {
				$pid = $_GET['pid'];
				$select_products = $conn->prepare("SELECT * FROM beverage WHERE id = '$pid'");
				$select_products->execute();
				if ($select_products->rowCount() > 0) {
					while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
			?>
			<form method="post">
				<img src="components/beverage/<?php echo $fetch_products['image']; ?>">
				<div class="detail">
					<div class="price"><?php echo $fetch_products['price']; ?></div>
					<div class="name"><?php echo $fetch_products['name']; ?></div>
					<div class="product-detail">
						<?php echo $fetch_products['product_detail']; ?>
					</div>
					<input type="hidden" name="product_id" value="<?php echo $fetch_products['id']; ?>">
					<div class="button">
						<button type="submit" name="add_to_wishlist" class="btn">add to wishlist</button>
						<button type="submit" name="add_to_cart" class="btn">add to cart</button>
					</div>
				</div>
			</form>	
			<?php		
					}
				}
			}
			?>
		</section>
		<!--home slider end-->
		<?php include 'components/footer.php'; ?>
	</div>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
	<script src="script.js"></script>
	<?php include 'components/alert.php'; ?>
</body>
</html>