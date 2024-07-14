<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Kathi - Restaurant Table Booking</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

 

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
</head>
<style>
    
    .table-wrapper {
    background: #fff;
    padding: 20px 25px;
    margin: 30px auto;
    border-radius: 3px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
    .table-wrapper .btn {
        float: right;
        color: #333;
        background-color: #fff;
        border-radius: 3px;
        border: none;
        outline: none !important;
        margin-left: 10px;
    }
    .table-wrapper .btn:hover {
        color: #333;
        background: #f2f2f2;
    }
    .table-wrapper .btn.btn-primary {
        color: #fff;
        background: #03A9F4;
    }
    .table-wrapper .btn.btn-primary:hover {
        background: #03a3e7;
    }
    .table-title .btn {     
        font-size: 13px;
        border: none;
    }
    .table-title .btn i {
        float: left;
        font-size: 21px;
        margin-right: 5px;
    }
    .table-title .btn span {
        float: left;
        margin-top: 2px;
    }
    .table-title {
        color: #fff;
        background: #fff;        
        padding: 16px 25px;
        margin: -20px -25px 10px;
        border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
        margin: 5px 0 0;
        font-size: 24px;
    }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
        padding: 12px 15px;
        vertical-align: middle;
    }
    table.table tr th:first-child {
        width: 60px;
    }
    table.table tr th:last-child {
        width: 80px;
    }
    table.table-striped tbody tr:nth-of-type(odd) {
        background-color: #fcfcfc;
    }
    table.table-striped.table-hover tbody tr:hover {
        background: #f5f5f5;
    }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }   
    table.table td a {
        font-weight: bold;
        color: #566787;
        display: inline-block;
        text-decoration: none;
    }
    table.table td a:hover {
        color: #2196F3;
    }
    table.table td a.view {        
        width: 30px;
        height: 30px;
        color: #2196F3;
        border: 2px solid;
        border-radius: 30px;
        text-align: center;
    }
    table.table td a.view i {
        font-size: 22px;
        margin: 2px 0 0 1px;
    }   
    table.table .avatar {
        border-radius: 50%;
        vertical-align: middle;
        margin-right: 10px;
    }
    table {
        counter-reset: section;
    }
</style>
<body>
      <div class="container-xxl bg-white p-0">
        <div class="container-xxl position-relative p-0">
        <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="title">Booking</h1>
                    
                </div>
        </div>
<div class="cart-section mt-150 mb-150">
    <div class="container">
        <div class="table-wrapper" id="empty">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-4">
                        <h2>Booking <b>Details</b></h2>
                    </div>
                  
                </div>
            </div>
            
            <table class="table table-striped table-hover text-center">
                <thead>
                    <tr>
                        <th>Booking No.</th>
                        <th>Name</th>
                        <th>Emailid</th>
                        <th>Phone No.</th>
                        <th>Booking Date</th>				
                        <th>Booking Time</th>		
                        <th>No. of Adults</th>
                        <th>No. of Childrens</th>
                        <th>Status</th>						
                    </tr>
                </thead>
                <tbody>
                <?php
                    include 'connection2.php';
                    if($_SERVER["REQUEST_METHOD"] == "POST") {
                    if(isset($_POST['status'])) {
                        $booking_no = $_POST['booking_no'];
                        $fetch_details = mysqli_query($connection, "select * from tbl_booking where booking_id='$booking_no'");
                        $fetch_row = mysqli_num_rows($fetch_details);
                        if($fetch_row>0)
                        {
                        while($row = mysqli_fetch_assoc($fetch_details)){
                            $booking_id = $row['booking_id'];
                            $name = $row['name'];
                            $emailid = $row['emailid'];
                            $mobile = $row['mobile'];
                            $booking_date = $row['booking_date'];
                            $booking_time = date('h:i a', strtotime($row['booking_time']));
                            $adults = $row['adults'];
                            $childrens = $row['childrens'];
                            $booking_status = $row['booking_status'];
                            if ($booking_status == 0){ 
                                        $tstatus = "Booking Order Placed.";
                                    }
                                    elseif ($booking_status == 1) {
                                        $tstatus = "Booking Confirmed.";
                                    }
                                    else
                                    {
                                        $tstatus = "Booking Cancelled.";
                                    }
                            echo '<tr>
                                    <td>' . $booking_id . '</td>
                                    <td>' . $name.'</td>
                                    <td>' . $emailid . '</td>
                                    <td>' . $mobile . '</td>
                                    <td>' . $booking_date . '</td>
                                    <td>' . $booking_time . '</td>
                                    <td>' . $adults . '</td>
                                    <td>' . $childrens . '</td>
                                    <td>'.$tstatus.'</td>              </tr>';
                        }
                    }
                    else
                    {
                    echo "<script>alert('Please enter valid booking number');
            window.history.back(1);
            </script>";
                    }
                }
            }
            ?>
                </tbody>
            </table>
        </div>
    </div> 
</div>

    
  