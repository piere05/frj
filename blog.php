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
</head>

<body>


<? include 'header.php';?>



<?

$select_blog=mysqli_query($conn,"select * from blogs where status=1");

    
if (mysqli_num_rows($select_blog)!=0) {

?>
<section class="spacer-top spacer-bottom f-seg">

<div class="container">
<h2 class="heading title split-collab animated fadeIn text-center">Recent Blogs</h2>

<div class="row">

  <?

while($row_blog=mysqli_fetch_array($select_blog)){

  $blog_title=$row_blog['title'];
  $blog_id=$row_blog['id'];

  $blog_published_by=$row_blog['published_by'];

  $blog_createddatetime=$row_blog['created_datetime'];
  $image1=$row_blog['image1'];

  ?>

<div class="col-lg-4 col-md-6 col-sm-10">

<div class="single-blog-area-style-one eight-area text-center">
<a href="blog-details.php?id=<?=$blog_id;?>" class="thumbnail">
<img src="adminp/uploads/blog-images/<?=$image1;?>" width="200px" alt="blog-image">
</a>
<div class="inner-content-wrapper">
<div class="bottom-area mb-2">
<span class="admin"><?=$blog_published_by;?></span>
<span class="date">•  <?=date("d M, Y",strtotime($blog_createddatetime));?> </span>
</div>
<a href="blog-details.php?id=<?=$blog_id;?>">
<h6 class="title mb--20">
<?=$blog_title;?>
</h6>
</a>
<a href="blog-details.php?id=<?=$blog_id;?>" class="btn-readmore-inner">Read more</a>
</div>
</div>

</div>

<?}?>
</div>

</div>
</section>
<?}?>




<? include 'footer.php';?>
<div id="anywhere-home" class="">
</div>


<? include 'mobile-menu.php';?>




<script defer src="assets/js/plugins/jquery.min.js"></script>
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
</body>
</html>