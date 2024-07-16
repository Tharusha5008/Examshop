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


		<?php
include 'connection2.php';
if(isset($_POST['submit'])){

$booking_id = mt_rand(10000000,99999999);
$name = $_POST['name'];
$emailid = $_POST['email'];
$mobile = $_POST['phone'];
$booking_date = date('Y-m-d', strtotime($_POST['bookingdate']));
$booking_time = $_POST['bookingtime'];
$adults = $_POST['adults'];
$childrens  =$_POST['childrens'];

$insert_query = mysqli_query($connection,"insert into tbl_booking set booking_id='$booking_id', name='$name', emailid='$emailid', mobile='$mobile', booking_date='$booking_date', booking_time='$booking_time', adults='$adults', childrens='$childrens'");
if($insert_query){
echo '<script>alert("Your order sent successfully. Booking number is "+"'.$booking_id.'")</script>';
echo "<script type='text/javascript'> document.location = 'home.php'; </script>";
} else {
echo "<script>alert('Something went wrong. Please try again.');</script>";
}
}
?>
	
		<section class="services">
			<div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="title">
            <h5 class="modal-title" id="statusModal">Check Pre-Order Status</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="order-details.php" method="post">
              <div class="text-left my-2">
                  <b><label for="bookingid">Enter Order Number:</label></b>
                  <input class="form-control" id="booking_no" name="booking_no" placeholder="Enter your Booking Number" type="text" required>
              </div>
              <br>
              <center><button type="submit" name="status" class="btn btn-success">Check Status</button></center>
            </form>
          </div>
        </div>
      </div>
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