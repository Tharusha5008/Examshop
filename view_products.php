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
	}elseif ($cart_num->rowCount() > 0) {
		$warning_msg[] = 'product already exist in your cart';
	}else{
		$select_price = $conn->prepare("SELECT * FROM productst WHERE id = ? LIMIT 1");
		$select_price->execute([$product_id]);
		$fetch_price = $select_price->fetch(PDO::FETCH_ASSOC);

		$insert_wishlist = $conn->prepare("INSERT INTO wishlist (id,user_id,product_id,price) VALUES(?,?,?,?)");
		$insert_wishlist->execute([$id,$user_id,$product_id,$fetch_price['price']]);
		$success_msg[]='product added to wishlist successfully';
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
			<h1>Shop</h1>
		</div>
		<div class="title2">
			<a href="home.php">home  </a><span>/ our shop</span>
		</div>
		<section class="products">
			<div class="box-container">
				<?php
				$select_products = $conn->prepare("SELECT * FROM productst");
				$select_products->execute();
                if ($select_products->rowCount() >0) {
                     while ($fetch_products = $select_products->fetch(PDO :: FETCH_ASSOC)) {
                  ?>
                <form action="" method="post" class="box">
                   <img src="image/<?=$fetch_products['image'];?>" class="img">
                   <div class="btn">
                   	<button type="submit" name="add_to_cart"><i class="fa-solid fa-cart-shopping"></i></button>
                    <button type="submit" name="add_to_wishlist"><i class="fa-solid fa-heart"></i></button>
                    <a href="view_page.php?pid=<?php echo $fetch_products['id']; ?>" class="fa-solid fa-eye"></a>
                   </div>
                 <h3 class="name"><?= $fetch_products['name'];?></h3>
                 <input type="hidden" name="product_id" value="<?=$fetch_products['id'];?>">
                 <div class="flex">
                 	<p class="price">price <?=$fetch_products['price'];?>/-</p>
                 	<input type="number" name="qty" required min="1" max="99" maxlength="2" class="qty">

                 </div>
                 <a href="checkout.php?get_id=<?=$fetch_products['id']; ?>" class="btn">buy now </a>


                </form>

           <?php
                    }
                }else{
                	echo '<p class="empty">no products added yet</p>';
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