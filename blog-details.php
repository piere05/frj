<?
ob_start();
ob_clean();
session_start();
include 'adminp/forst/soft/cnt.php';
extract($_REQUEST);
$currentdate = date('Y-m-d H:i:s');
$id=$_GET['id'];
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

$select_blog=mysqli_query($conn,"select * from  blogs where id='$id'"); 

$rows_R=mysqli_fetch_array($select_blog);

foreach($rows_R as $K1=>$V1) $$K1 = $V1;


if (mysqli_num_rows($select_blog)!=0) {

?>
<section class="spacer-top spacer-bottom f-seg">

<div class="container">
<h2 class="heading title split-collab animated fadeIn text-center">Blog Details</h2>

<div class="row">

<div class="blog-img text-center">
<img src="adminp/uploads/blog-images/<?=$image1;?>" width="500px" height="500px">
</div>


<div class="inner-content-wrapper text-start">
<div class="bottom-area justify-content-start mb--10">
<span class="admin"><?=$published_by;?></span>
<span class="date"><span>•</span> <?=date("d M, Y",strtotime($created_datetime));?></span>
</div>
<h6 class="title text-start">
<?=$title;?>
</h6>

<p class="text-justify" style="text-align: justify;">
<?=$short_description;?>
</p>


<p class="text-justify" style="text-align: justify;">
<?=$content;?>
</p>
</div>


</div>

</div>
</section>
<?}?>

<!-- 
<section>

<div class="container">

<div class="row">


<?

$select_blog=mysqli_query($conn,"select * from blogs where status=1 and id='$id'");
if (mysqli_num_rows($select_blog)!=0) {

?>

<div class="col-xl-4 col-lg-4 sticky-coloum-item" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">

<div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 858.104px;"><div class="fluxi-right-ct-1">

<div class="rts-single-wized Recent-post">
<div class="wized-header">
<h5 class="title">
Recent Blog
</h5>
</div>
<div class="wized-body">


<?

while($row_recent=mysqli_fetch_array($select_blog)){

$blog_title=$row_recent['title'];
$blog_id=$row_recent['id'];

$blog_published_by=$row_recent['published_by'];

$blog_createddatetime=$row_recent['created_datetime'];
$image1=$row_recent['image1'];
?>
<div class="recent-post-single">
<div class="thumbnail">
<a href="blog-details.php?id=<?=$blog_id;?>"><img src="adminp/uploads/blog-images/<?=$image1;?>" width="200px" alt="Blog_post"></a>
</div>
<div class="content-area text-start">
<div class="user">
<i class="fal fa-clock"></i>
<span><?=date("d M, Y",strtotime($blog_createddatetime));?></span>
</div>
<a class="post-title" href="blog-details.php?id=<?=$blog_id;?>">
<h6 class="title"><?=$blog_title;?></h6>
</a>
</div>
</div>

<?}?>

</div>
</div>

</div></div></div>
<?}?>
</div>

</div>
</section>

-->

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