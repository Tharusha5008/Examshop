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
		$select_price = $conn->prepare("SELECT * FROM productst WHERE id = ? LIMIT 1");
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
	}elseif ($max_cart_items->rowCount() > 0) {
		$warning_msg[] = 'cart is full';
		echo "<script>alert('cart is full.');</script>";
	}else{
		$select_price = $conn->prepare("SELECT * FROM productst WHERE id = ? LIMIT 1");
		$select_price->execute([$product_id]);
		$fetch_price = $select_price->fetch(PDO::FETCH_ASSOC);

		$insert_cart = $conn->prepare("INSERT INTO cart (id,user_id,product_id,price,qty) VALUES(?,?,?,?,?)");
		$insert_cart->execute([$id,$user_id,$product_id,$fetch_price['price'],$qty]);
		$success_msg[]='product added to cart successfully';
		echo "<script>alert('product added to cart successfully.');</script>";
	}
}
//delete btn
if (isset($_POST['delete_item'])) {
	$wishlist_id = $_POST['wishlist_id'];
	$wishlist_id = filter_var($wishlist_id, FILTER_SANITIZE_STRING);

	$varify_delete_items = $conn->prepare("SELECT * FROM wishlist WHERE id = ?");
	$varify_delete_items->execute([$wishlist_id]);

	if ($varify_delete_items->rowCount()>0) {
		$delete_wishlist_id = $conn->prepare("DELETE FROM wishlist WHERE id = ?");
		$delete_wishlist_id->execute([$wishlist_id]);
		echo "<script>alert('wishlist item deleted successfully.');</script>";
		// code...
	}else{
		echo "<script>alert('something went wrong.');</script>";
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
			<h1>wish list</h1>
		</div>
		<div class="title2">
			<a href="home.php">home  </a><span>/ wishlist</span>
		</div>
		<section class="products">
			<h1 class="title">products added in wishlist</h1>
			<div class="box-container">
				<?php
                    $grand_total = 0;
                    $select_wishlist = $conn->prepare("SELECT * FROM wishlist WHERE user_id = ?");
                    $select_wishlist->execute([$user_id]);
                    if ($select_wishlist->rowCount()>0) {
                    	while($fetch_wishlist = $select_wishlist->fetch(PDO::FETCH_ASSOC)){
                    		$select_products = $conn->prepare("SELECT * FROM productst WHERE id= ?");
                    		$select_products->execute([$fetch_wishlist['product_id']]);
                    		if ($select_products->rowCount()>0) {
                    			$fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)
                    	

				?>
				<form method="post" action="" class="box">
					<input type="hidden" name="wishlist_id" value="<?=$fetch_wishlist['id']; ?>">
					<img src="image/<?=$fetch_products['image']; ?>">
					<div class="button">
					<button type="submit" name="add_to_cart"><i class="fa-solid fa-cart-shopping"></i></button>
                    <a href="view_page.php?pid=<?php echo $fetch_products['id']; ?>" class="fa-solid fa-eye"></a>
                    <button type="submit" name="delete_item" onclick="return confirm('delete this item');"><i class="fa-solid fa-trash"></i></button>
                </div>
                <h3 class="name"><?=$fetch_products['name']; ?></h3>
                <input type="hidden" name="product_id" value="<?=$fetch_products['id']; ?>">
                <div class="flex">
                	<p class="price">price $<?=$fetch_products['price']; ?> /- </p>
                </div>
                <a href="checkout.php?get_id=<?=$fetch_products['id']; ?>" class="btn">buy now</a>
				</form>
				<?php 
				            $grand_total+=$fetch_wishlist['price'];
	                        }
                    	}
                    }else{
                    	echo "<script>alert('no products yet.');</script>";
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