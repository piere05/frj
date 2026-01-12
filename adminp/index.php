<?
ob_start();
ob_clean();
session_start();
extract($_REQUEST);
include 'forst/soft/cnt.php';
include 'overall-functions.php';

if(isset($_SESSION['username']) || isset($_COOKIE['Cusername'])){
$_SESSION['username'] = $_COOKIE['Cusername'];
$_SESSION['id'] = $_COOKIE['Cid'];
$_SESSION['NAME'] = $_COOKIE['CName'];

header('location:home.php');
die();
}


if(isset($_POST['Login']))
{

$final_password=password_pro($password,'encrypt');

$select_user=mysqli_query($conn,"select * from user where username='$username' and password='$final_password'");


if (mysqli_num_rows($select_user)!=0) {
$row=mysqli_fetch_array($select_user);

$_SESSION['username']=$row['username'];
$_SESSION['id']=$row['id'];
$_SESSION['NAME']=$row['name'];
$_SESSION['usertype']=$row['usertype'];
setcookie('CName',$row['name'],time()+60*60*24*30);
setcookie('Cusername',$row['username'],time()+60*60*24*30);
setcookie('Cid',$row['id'],time()+60*60*24*30);
setcookie('Cusertype',$row['usertype'],time()+60*60*24*30);
	header("Location:home.php");
}else{
	$alertmsg='Incorrect Username or Password';
	header("Location:index.php?alertmsg=$alertmsg");

}

}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Fr. Joseph Jeyaraj</title>
		<link rel="icon" href="assets/img/fav-icon.png" type="image/x-icon"/>
		<link rel="stylesheet" href="assets/css/login.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<script src="assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Public Sans:300,400,500,600,700"]},
			custom: {"families":["Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
</head>
<body>

	<div class="text-center logo-div">

		<img src="assets/img/bg-white-logo.png" width="300px">
		
	</div>

<div class="login-div">
	<div class="content">

  <form method="POST">
  	<?
if ($alertmsg!='') {
?>
<div class="alert alert-m alert-danger alert-dismissible fade show px-3" role="alert">
  <strong><?=$alertmsg;?></strong> 
  <button type="button" onclick="closealert()" class="close close-bt" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<?}?>
    <h2>Login</h2>
    <div class="input-box">
      <input type="text" placeholder="Username" name="username" required />
      <i class="ri-user-fill"></i>
    </div>
    <div class="input-box">
      <input type="password" id="password" name="password" placeholder="Password" required autocomplete="new-password" />

      <i class="fas fa-eye-slash toggle-password" id="togglePassword"></i>
    </div>
    <div class="remember">
      <label><input type="checkbox" />Remember me</label>
      <!-- <a href="#">Forgot Password?</a> -->
    </div>
    <input type="submit" name="Login" class="btnn">
    
  </form>
</div>

</div>


	<script src="assets/js/login.js"></script>
	<script src="assets/js/core/jquery-3.7.1.min.js"></script>
	<script>
		
		function closealert(){
    $(".alert-m").css("display","none");
}

	</script>
</body>

</html>