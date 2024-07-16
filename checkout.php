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
if (isset($_POST['add_to_cart'])) {
	$p_id = $_POST['product_id'];
}

if (isset($_POST['place_order'])) {
	$name = $_POST['name'];
	$name = filter_var($name, FILTER_SANITIZE_STRING);
	$number = $_POST['number'];
	$number = filter_var($number, FILTER_SANITIZE_STRING);
	$email = $_POST['email'];
	$email = filter_var($email, FILTER_SANITIZE_STRING);
   $method = $_POST['method'];
	$method = filter_var($method, FILTER_SANITIZE_STRING);

	$varify_cart = $conn->prepare("SELECT * FROM cart WHERE user_id=?");
	$varify_cart->execute([$user_id]);
	$oid = unique_i();

	if (isset($_GET['get_id'])) {
       $get_product = $conn->prepare("SELECT * FROM productst WHERE id=? LIMIT 1");
       $get_product->execute([$_GET['get_id']]);
       
       if ($get_product->rowCount() > 0) {
       	while($fetch_p = $get_product->fetch(PDO::FETCH_ASSOC)){
       		$insert_order = $conn->prepare("INSERT INTO orders (id, user_id, name, number, email,
       			method, product_id, price, qty) VALUES(?,?,?,?,?,?,?,?,?)");
       		$insert_order->execute([$oid, $user_id, $name, $number, $email, $method, $fetch_p['id'],
       			$fetch_p['price'],1]);
       		echo "<script>alert('Pre ordering Succefful');</script>";
       		echo '<script>alert("Your order sent successfully. Order ID is "+"'.$oid.'")</script>';
       		
       	}
       	// code...
       }else{
       	echo "<script>alert('something Wrong');</script>";
       }
	}elseif($varify_cart->rowCount()>0){
		while($f_cart = $varify_cart->fetch(PDO::FETCH_ASSOC)){
		$insert_order = $conn->prepare("INSERT INTO orders (id, user_id, name, number, email,
       			method, product_id, price, qty) VALUES(?,?,?,?,?,?,?,?,?)");
       		$insert_order->execute([$oid, $user_id, $name, $number, $email, $method, $f_cart['id'],
       			$f_cart['price'],$f_cart['qty']]);
       		
       		echo '<script>alert("Your order sent successfully. Order ID is "+"'.$oid.'")</script>';
       		
       	}
       	if ($insert_order) {
       		$delete_cart_id = $conn->prepare("DELETE FROM cart WHERE user_id = ?");
       		$delete_cart_id->execute([$user_id]);
       		echo '<script>alert("Your order sent successfully. Order ID is "+"'.$oid.'")</script>';
       	}
	}else{
		echo "<script>alert('something Wrong');</script>";
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
			<h1>Checkout Summary</h1>
		</div>
		<div class="title2">
			<a href="home.php">home  </a><span>/ checkout</span>
		</div>
		<section class="checkout">
			<div class="title">
				<img src="components/img/download.png" class="logo">
				<h1>Pre-Order summary</h1>
				<p>Make sure you must need to fill details</p>
			</div>
				<div class="row">
					<form method="post">
						<h3>billing details</h3>
						<div class="flex">
							<div class="box">
								<div class="input-field">
									<p>your name</p>
									<input type="text" name="name" required placeholder="Enter name" class="input">
								</div>
								<div class="input-field">
									<p>your number</p>
									<input type="number" name="number" required placeholder="Enter number" class="input">
								</div>
								<div class="input-field">
									<p>your email</p>
									<input type="email" name="email" required placeholder="Enter email" class="input">
								</div>
								<div class="input-field">
									<p>payment method</p>
									<select name="method" class="input">
										<option value="cod">On Shop</option>
										<option value="crd">Pay Online</option>
									</select>
								</div>
							</div>
						</div>
						<button type="submit" name="place_order" class="btn">place order</button>
					</form>
					<div class="summary">
						<h3>my Tastes</h3>
						<div class="box-container">
							<?php
							$grand_total=0;
							if (isset($_GET['get_id'])) {
								$select_get = $conn->prepare("SELECT * FROM productst WHERE id=?");
								$select_get->execute([$_GET['get_id']]);
								while($fetch_get = $select_get->fetch(PDO::FETCH_ASSOC)){
									$sub_total = $fetch_get['price'];
									$grand_total+=$sub_total;
													
							?>
							<div class="flex">
								<img src="image/<?=$fetch_get['image']; ?>" class="image">
						      <div>
						      	<h3 class="name"><?=$fetch_get['name']; ?></h3>
						      	<p class="price"><?=$fetch_get['price']; ?></p>
						      </div>		
							</div>
							<?php
								}
							}else{
								$select_cart = $conn->prepare("SELECT * FROM cart WHERE user_id=?");
								$select_cart->execute([$user_id]);
								if ($select_cart->rowCount()>0) {
									while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
										$select_products = $conn->prepare("SELECT * FROM productst WHERE id=?");
										$select_products->execute([$fetch_cart['product_id']]);
										$fetch_products = $select_products->fetch(PDO::FETCH_ASSOC);
										$sub_total=($fetch_cart['qty']*$fetch_products['price']);
										$grand_total += $sub_total;
							?>
							<div class="flex">
								<img src="image/<?=$fetch_products['image']; ?>">
								<div>
									<h3 class="name"><?=$fetch_products['name']; ?></h3>
						      	<p class="price"><?=$fetch_products['price']; ?> X <?=$fetch_cart['qty']; ?></p>
								</div>
							</div>
							<?php
		                         }
							   	}
							}	
							?>
						</div>
						<div class="grand-total"><span>total amount payable:</span>$<?=$grand_total ?></div>
				</div>
			</div>
		</section>
		<?php include 'components/footer.php'; ?>
	</div>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
	<script src="script.js"></script>
	<?php include 'components/alert.php'; ?>
</body>
</html>