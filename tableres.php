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
		<div class="box-container">
			  <div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="bookingModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="title2" id="bookingModal">Table Booking Form</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post">
              <div class="form-group">
                  <b><label for="name">Name:</label></b>
                  <input class="form-control" id="name" name="name" placeholder="Enter your Name" type="text" required>
              </div>
              <div class="form-group">
                  <b><label for="email">Email:</label></b>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email" required>
              </div>
              <div class="form-group">
                <b><label for="phone">Phone No:</label></b>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon">+91</span>
                  </div>
                  <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your Phone Number" required pattern="[0-9]{10}" maxlength="10">
                </div>
              </div>
              <div class="form-group">
                <b><label for="bookingdate">Booking Date:</label></b>
              <input type="date" class="form-control" name="bookingdate" placeholder="Choose Booking Date" min="<?php echo date("Y-m-d"); ?>" required>
          </div>
          <div class="form-group">
            <b><label for="bookingtime">Booking Time:</label></b>
              <input type="time" class="form-control" name="bookingtime" placeholder="Choose Booking Time" required>
              </div>
              <div class="text-left my-2">
                  <b><label for="adults">Number of Adults:</label></b>
                  <select name="adults" id="adults" class="custom-select browser-default" required>
                  <option hidden disabled selected value>Select Number of Adults</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
              </select>
              </div>
              <div class="text-left my-2">
                  <b><label for="childrens">Number of Childrens:</label></b>
                  <select name="childrens" id="childrens" class="custom-select browser-default" required>
                  <option hidden disabled selected value>Select Number of Children</option>
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
              </select>
              </div>
              <br>
              <center><button type="submit" name="submit" class="btn btn-success">Reserve a Table</button></center>
            </form>
            <center><p class="mb-0 mt-1">Booking Order Placed? Check From below</center>
          </div>
        </div>
      </div>
    </div>
		</div>
		<section class="services">
			<div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="title">
            <h5 class="modal-title" id="statusModal">Check Booking Status</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="status-details.php" method="post">
              <div class="text-left my-2">
                  <b><label for="bookingid">Enter Booking Number:</label></b>
                  <input class="form-control" id="booking_no" name="booking_no" placeholder="Enter your Booking Number" type="text" required>
              </div>
              <br>
              <center><button type="submit" name="status" class="btn btn-success">Check Status</button></center>
            </form>
          </div>
        </div>
      </div>
    </div>
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