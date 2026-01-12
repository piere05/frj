<?
session_start();
if($_SESSION['id']=='' ){ header('Location:index.php');}
?>
<!DOCTYPE html>
<html lang="en">
<head>

<? include 'top-includes.php';?>


</head>
<body>
	<div class="wrapper">
		<? include 'side-bar.php';?>

		<div class="main-panel">
			<? include 'header.php';?>
			
			<div class="container">
			   <div class="page-inner">
 <?php pattern(); ?>
</div>
			</div>
			
			
				<? include 'footer.php';?>
		</div>
		
	
			

	</div>
	
	<? include 'bottom-includes.php';?>
</body>
</html>