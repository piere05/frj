<?
ob_start();
ob_clean();
session_start();
include 'adminp/forst/soft/cnt.php';
extract($_REQUEST);
$currentdate = date('Y-m-d H:i:s');



if (isset($submit)) {
$insert_enq=mysqli_query($conn,"insert into enquiry SET name='$fullname',email='$email',mobile='$mobile',subject='$subject',message='$message',created_datetime='$currentdate'");

$messages='<table width="683" border="0" align="left" style="font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px">
<tbody>
<tr>
<td width="677">
<table width="680" border="0" align="left" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td height="40">&nbsp;</td>
<td colspan="2" align="left" style="font-size:22px; font-weight:bold; color:#b68d57;">
<strong>Fr. Joseph Jeyaraj</strong>
</td>
</tr>
<tr>
<td height="40">&nbsp;</td>
<td colspan="2" align="left" style="color:#f57900;font-size:16px;font-weight:bold">
<strong>Enquiry Details From ' . $fullname . '</strong>
</td>
</tr>
<tr>
<td width="5%" height="25">&nbsp;</td>
<td width="25%" style="font-size:12px; font-weight:bold;"><strong>Name</strong></td>
<td width="70%">' . $fullname . '</td>
</tr>
<tr>
<td width="5%" height="25">&nbsp;</td>
<td width="25%" style="font-size:12px; font-weight:bold;"><strong>Email id</strong></td>
<td width="70%">' . $email . '</td>
</tr>
<tr>
<td width="5%" height="25">&nbsp;</td>
<td width="25%" style="font-size:12px; font-weight:bold;"><strong>Phone Number</strong></td>
<td width="70%">' . $mobile . '</td>
</tr>
<tr>
<td width="5%" height="25">&nbsp;</td>
<td width="25%" style="font-size:12px; font-weight:bold;"><strong>Subject</strong></td>
<td width="70%">' . $subject . '</td>
</tr>
<tr>
<td width="5%" height="25">&nbsp;</td>
<td width="25%" style="font-size:12px; font-weight:bold;"><strong>Message</strong></td>
<td width="70%">' . $message . '</td>
</tr>';


$messages .= '</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table width="680" border="0" align="left" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td height="40">&nbsp;</td>
<td>Warm Regards, </td>
<td>&nbsp;</td>
</tr>
<tr>
<td height="40">&nbsp;</td>
<td><a href="https://josephjeyarajsdb.com/" target="_blank" style="color:#f57900;"><strong>Fr. Joseph 
</strong></a></td>
<td>&nbsp;</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>';
$to='piere2004amal@gmail.com';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'Sender: <noreply@josephjeyarajsdb.com>' . "\r\n";
$headers .= 'From: Joseph Jeyaraj <noreply@josephjeyarajsdb.com>' . "\r\n";
$headers .= 'Reply-To: Joseph Jeyaraj <support@josephjeyarajsdb.com>' . "\r\n";
$mailsend=mail($to, $subject, $messages, $headers, '-fnoreply@josephjeyarajsdb.com');
if ($mailsend) {
$msg='Thank You For Contacting';
header("location:index.php?msg=$msg#contact");
}else{
$alertmsg="Couldn't Submit Try Again ";
header("location:index.php?alertmsg=$alertmsg#contact");
}
}
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


<section class="spacer-top spacer-bottom f-seg" id="about">

<div class="container">
<div class="row">

<div class="col-lg-5 align-self-center text-center">
<img src="assets/images/about.jpg" class="img-fluid abt-img" width="350px">
</div>

<div class="col-lg-7 align-self-center">

<h2 class="heading title split-collab animated fadeIn">About</h2>

<p class="para">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>

<p class="para">
It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
</p>

<a href="" class="rts-btn btn-primary-4-border arrow-rotate inner"><i class="fa-light fa-arrow-right"></i> Contact</a>
</div>



</div>


</div>

</section>


<section class="spacer-top spacer-bottom">

<div class="rts-counter-up-avout-area ">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="container-counter-about-page">
<div class="single-counter-up">
<div class="icon maincounter">
<i class="fa-solid fa-briefcase"></i>

</div>
<h2 class="title"><span class="counter animated fadeInDownBig">20 </span>+</h2>
<span class="brand-name">Years of Experience <br> in Counseling</span>
</div>
<div class="single-counter-up">
<div class="icon maincounter">
<i class="fa-solid fa-user"></i>

</div>
<h2 class="title"><span class="counter animated fadeInDownBig">500</span>+</h2>
<span class="brand-name">Clients Guided <br> Successfully</span>
</div>
<div class="single-counter-up">
<div class="icon maincounter">
<i class="fa-solid fa-brain"></i>

</div>
<h2 class="title"><span class="counter animated fadeInDownBig">800</span>+</h2>
<span class="brand-name">Minds Guided  <br> Globally</span>
</div>
<div class="single-counter-up" >
<div class="icon maincounter">
<i class="fa-solid fa-comments"></i>
</div>
<h2 class="title" ><span class="counter animated fadeInDownBig">500</span>+</h2>
<span class="brand-name" >Counseling Sessions <br> Completed</span>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

<?

$select_blog=mysqli_query($conn,"select * from blogs where status=1 limit 3");


if (mysqli_num_rows($select_blog)!=0) {

?>
<section class="spacer-top spacer-bottom" id="blogs">

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

<div class="text-center" >
<a href="blog.php" class="rts-btn btn-primary-4-border arrow-rotate inner d-inline-block mx-auto"><i class="fa-light fa-arrow-right"></i> View All Blogs</a>
</div>
</div>
</section>
<?}?>

<!-- 
<?

$select_english=mysqli_query($conn,"select * from english_res where status=1 limit 3");

if (mysqli_num_rows($select_english)!=0) {

?>

<section class="spacer-top spacer-bottom">
<div class="container">
<h2 class="heading title split-collab animated fadeIn text-center">English Resources</h2>
<div class="row">
</div>
<div class="text-center" id="italian">
<a href="" class="rts-btn btn-primary-4-border arrow-rotate inner d-inline-block mx-auto"><i class="fa-light fa-arrow-right"></i> View All English Resource</a>
</div>
</div>
</section>


<?}
$select_english=mysqli_query($conn,"select * from articles where status=1 limit 3");

if (mysqli_num_rows($select_english)!=0) {?>

<section class="spacer-top spacer-bottom">
<div class="container">
<h2 class="heading title split-collab animated fadeIn text-center">Italian Resources</h2>
<div class="row">
</div>
<div class="text-center" >
<a href="" class="rts-btn btn-primary-4-border arrow-rotate inner d-inline-block mx-auto"><i class="fa-light fa-arrow-right"></i> View All Italian Resource</a>
</div>
</div>
</section>
<?}?> -->


<?

$select_faq=mysqli_query($conn,"select * from faq where status=1 limit 5");


if (mysqli_num_rows($select_faq)!=0) {

?>

<section class="spacer-top spacer-bottom" id="faq">

<div class="container">

<h2 class="heading title split-collab animated fadeIn text-center">FAQ</h2>

<div class="accordion-faq-area-border-bottom-style style-four">
<div class="accordion" id="accordionExamples">


<?
$sno=0;
while($row_faq=mysqli_fetch_array($select_faq)){
$sno=$sno+1;
$faq_title=$row_faq['title'];
$faq_id=$row_faq['id'];

$faqcontent=$row_faq['content'];

?>

<div class="accordion-item">
<h2 class="accordion-header" id="<?=$sno;?>">
<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?=$sno;?>" aria-expanded="true" aria-controls="collapse<?=$sno;?>">
<?=$faq_title;?>
</button>
</h2>
<div id="collapse<?=$sno;?>" class="accordion-collapse collapse show" aria-labelledby="<?=$sno;?>" data-bs-parent="#accordionExamples">
<div class="accordion-body">
<p class="disc">
<?=$faqcontent;?>
</p>

</div>
</div>
</div>
<?}?>


</div>
</div>

</div>

</section>
<?}

$select_gallery=mysqli_query($conn,"select * from gallery where status=1 order by id desc limit 6 ");
if(mysqli_num_rows($select_gallery)!=0){
?>

<section class="spacer-top spacer-bottom" id="gallery">

<div class="container">
<h2 class="heading title split-collab animated fadeIn text-center">Gallery</h2>
<div class="row">
<div class="col-lg-12 my-4">
<div class="light swiper mySwiper-brand-about">
<div class="swiper-wrapper">
<?

while($row_gallery=mysqli_fetch_array($select_gallery)){
$image1=$row_gallery['image'];
?>  

<div class="swiper-slide"><a href="javascript:void(0);" class="img-popup"><img src="adminp/uploads/<?=$image1;?>" alt=""></a></div>
<?}?>
</div>
</div>

<div class="text-center py-5" >
<a href="gallery.php" 
class="rts-btn btn-primary-4-border arrow-rotate inner d-inline-block mx-auto">
<i class="fa-light fa-arrow-right"></i> View All Images</a>
</div>
</div>
</div>

</section>
<?}?>


<section class="spacer-top spacer-bottom" id="contact">
<div class="rts-contact-form-area contact-form-page rts-section-gapBottom">
<div class="container">
<h2 class="heading title split-collab animated fadeIn text-center">Contact Me</h2>
<div class="row justify-content-md-center">
<div class="col-lg-12 col-md-10">
<form class="contact-form" action="#" method="POST">

<div class="row">


<? if($msg!=''){?>
<div class="alert alert-m alert-success alert-dismissible fade show " role="alert">
<strong class="align-self-center w-100"><?=$msg;?></strong> 
<button type="button" onclick="closealert()" class="close close-bt" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<?}?>

<? if($alertmsg!=''){?>
<div class="alert alert-m alert-danger alert-dismissible fade show " role="alert">
<strong class="align-self-center w-100"><?=$alertmsg;?></strong> 
<button type="button" onclick="closealert()" class="close close-bt" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<?}?>


<div class="col-lg-6">
<div class="single-input-area">
<label for="name">Full name</label>
<input id="name" type="text" name="fullname" placeholder="Your name" required="">
<i class="fa-light fa-user"></i>
</div>
</div>


<div class="col-lg-6">
<div class="single-input-area">
<label for="email">Email address</label>
<input id="email" required type="text" name="email" placeholder="Your email">
<i class="fa-light fa-envelope"></i>
</div>
</div>


<div class="col-lg-6">
<div class="single-input-area">
<label for="mobile">Mobile</label>
<input id="mobile" required type="number" min="1" name="mobile" placeholder="Your Mobile">
<i class="fa-light fa-phone"></i>
</div>
</div>

<div class="col-lg-6">
<div class="single-input-area">
<label for="subject">Subject</label>
<input id="subject" required type="text" name="subject" placeholder="Subject">
<i class="fa-light fa-message"></i>
</div>
</div>

<div class="col-lg-12">
<div class="single-input-area">
<label for="subject">Message</label>
<textarea id="message" required rows="3" name="message" placeholder="Enter Your Message"></textarea>

</div>
</div>
</div>

<button class="rts-btn btn-primary"   name="submit"
value="contact">Contact<i class="fa-solid fa-location-arrow"></i></button>
</form>
</div>
</div>
</div>
</div>

</section>


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

<script>
function closealert(){
$(".alert-m").css("display","none");
}
</script>
</body>
</html>