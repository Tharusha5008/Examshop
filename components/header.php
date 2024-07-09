 <header class="header">
 	<div class="flex">
 		<a href="home.php" class="logo"><img src="components/img/logo.jpg"></a>
 		<nav class="navbar">
 			<a href="home.php">home</a>
 			<a href="view_product.php">products</a>
 			<a href="order.php">orders</a>
 			<a href="about.php">about us</a>
 			<a href="contact.php">conatct us</a>
 		</nav>
 		<div class="icons">
 			<i class="fa-solid fa-user" id="user-btn"></i>
 			<a href="wishlist.php" class="cart-btn"><i class="fa-regular fa-heart"></i><sup>0</sup></a>
 			<a href="cart.php" class="cart-btn"><i class="fa-solid fa-cart-shopping"></i><sup>0</sup></a>
 			<i class="fa-solid fa-bars" id="menu-btn" style="font-size: 2rem;"></i>
 		</div>
 		<div class="user-box">
 			<p>username : <span><?php echo $_SESSION['user_name']; ?></span></p>
 			<p>email : <span><?php echo $_SESSION['user_email']; ?></span></p>
 			<a href="login.php" class="btn">login</a>
 			<a href="register.php" class="btn">register</a>
 			<form method="post">
 				<button type="submit" name="logout" class="logout-btn">log out</button>
 			</form>
 		</div>
 	</div>
 </header>