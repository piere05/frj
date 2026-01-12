<?
ob_start();
ob_clean();
session_start();
include 'adminp/forst/soft/cnt.php';
extract($_REQUEST);
$currentdate = date('Y-m-d H:i:s');
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" type="image/x-icon" href="assets/images/fav-icon.png">
<title>Fr. Joseph Jeyaraj</title>
<link rel="stylesheet preload" href="assets/css/plugins/swiper.min.css" as="style">
<link rel="stylesheet preload" href="assets/css/plugins/magnific-popup.css" as="style">

<link rel="stylesheet preload" href="assets/css/plugins/metismenu.css" as="style">

<link rel="stylesheet preload" href="assets/css/vendor/bootstrap.min.css" as="style">

<link rel="stylesheet preload" href="assets/css/plugins/fontawesome.min.css" as="style">

<link rel="stylesheet preload" href="assets/css/style.css" as="style">
<link rel="stylesheet" href="assets/css/magnific-popup.min.css">

</head>

<body>


<? include 'header.php';?>



<?

$select_gallery=mysqli_query($conn,"select * from gallery where status=1 order by id desc limit 3");
if(mysqli_num_rows($select_gallery)!=0){
?>

<section class="spacer-top spacer-bottom f-seg" id="gallery">

<div class="container">
<h2 class="heading title split-collab animated fadeIn text-center">Gallery</h2>
<div class="row">
<div class="col-lg-12 my-4">
<div class="light">

<?php
while($row_gallery = mysqli_fetch_array($select_gallery)){
    $image1 = $row_gallery['image'];
?>  

<div class="gallery-item">
    <a href="adminp/uploads/<?=$image1;?>" class="img-popup">
        <img src="adminp/uploads/<?=$image1;?>" alt="">
    </a>
</div>

<?php } ?>


</div>


</div>
</div>

</section>
<?}?>



<? include 'footer.php';?>
<div id="anywhere-home" class="">
</div>


<? include 'mobile-menu.php';?>




<script  src="assets/js/plugins/jquery.min.js"></script>
<script defer src="assets/js/plugins/bootstrap.min.js"></script>
<script defer src="assets/js/plugins/metismenu.js"></script>
<script defer src="assets/js/vendor/jqueryui.js"></script>
<script defer src="assets/js/vendor/waypoint.js"></script>
<script defer src="assets/js/plugins/swiper.js"></script>
<script defer src="assets/js/plugins/theia-sticky-sidebar.min.js"></script>
<script defer src="assets/js/plugins/gsap.min.js"></script>
<script defer src="assets/js/plugins/scrolltigger.js"></script>
<script defer src="assets/js/vendor/split-text.js"></script>
<script defer src="assets/js/vendor/split-type.js"></script>
<script defer src="assets/js/vendor/waw.js"></script>
<script defer src="assets/js/plugins/counter-up.js"></script>
<script defer src="assets/js/plugins/magnific-popup.js"></script>
<script defer src="assets/js/plugins/contact-form.js"></script>
<script defer src="assets/js/main.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>

<script>
$(document).ready(function () {
    $('.img-popup').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        mainClass: 'mfp-img-mobile',
        image: {
            verticalFit: true
        },
        zoom: {
            enabled: true,
            duration: 300
        }
    });
});

</script>

</body>
</html>