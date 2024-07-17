 <<!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 
    
  
 	<title></title>
 </head>
 <body>
 
 
 <header class="header">
 	<div class="flex">
 		<a href="home.php" class="logo"><img src="components/img/logo12.png"></a>
 		<nav class="navbar">
 			<a href="home.php">home</a>
 			<a href="view_products.php">Meals</a>
 			<a href="view_bev.php">Beverages</a>
 			<a href="view_order.php">Bookings</a>
 			<a href="tableres.php">Table Reserve</a>
 			<a href="register.php">my account</a>
 			<a href="about.php">about us</a>
 		</nav>
 		<div class="icons">
 			<a href="welcome.php" class="cart-btn"><i class="fa-solid fa-user" id="user-btn"></i></a>
 			
 			<a href="wishlist.php" class="cart-btn"><i class="fa-regular fa-heart"></i></a>
 			
 			<a href="cart.php" class="cart-btn"><i class="fa-solid fa-cart-shopping"></i></a>
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
 </body>
 </html>