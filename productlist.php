<?php
  session_start();
  if(!isset($_SESSION['username']))
  header('location:login.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Products</title>
<style>
body{
	background-color:#e6e6e6;
}
img{
	width: 120px;
	height: 140px;
}
div{
    background: linear-gradient(to bottom, #74ebd5 20%, #acb6e5 100%);
	font-family:verdana;
	color:black; 
}

</style>
</head>
<body>
<?php 
$db = mysqli_connect("localhost", "root", "", "auction");
$_SESSION['category']=$_GET['c'];
if(!isset($_SESSION['category']))
header('location:categories.php');
$cat=$_SESSION['category'];?>
<h2 style="font-family:'Courier New'">Category: <?php echo $cat?></h2>
<a href="home.php">Return home</a><br>
<a href="logout.php">LOGOUT</a><br><br>
<?php
$list="select * from prod where prod_category='$cat'";
$result=mysqli_query($db,$list);
while ( $rows = $result->fetch_assoc() ) {
	?>
	<a style="text-decoration:none;" href="bid.php?p=<?php echo $rows['prod_id']?>">
	<div>
	<br><img src="images/<?php echo $rows['prod_pic']?>" style="  float:left; margin:0 15px 0 0;"/><br>
	Product name:<?php echo $rows['prod_name']?><br>
	Product condition:<?php echo $rows['prod_condition']?><br>
	Product description:<?php echo $rows['prod_description']?><br>
	Price:<?php echo $rows['prod_price']?><br>
	Bidding start date:<?php echo $rows['start_date']?><br>
	Bidding end date:<?php echo $rows['end_date']?><br><br><hr>
	</div></a>
<?php
}
?>
</body>
</html>
  