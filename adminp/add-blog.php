<?php
ob_start();
session_start();
function pattern() {
$username=$_SESSION['NAME'];
$user_id=$_SESSION['id'];
extract($_REQUEST);
include 'forst/soft/cnt.php';
include 'overall-functions.php';
$url_id=$_GET['id'];
$currentdate = date('Y-m-d H:i:s');




if ($submit=='Add') {
  $title = addslashes($title);
  //$url = addslashes($url);
  $published_by = addslashes($published_by);
  $content = addslashes($description);
  $short_description = addslashes($short_description);

$folder = "uploads/blog-images/";
$fileName = $_FILES['blogimg']['name'];
$tmpName  = $_FILES['blogimg']['tmp_name'];
move_uploaded_file($tmpName, $folder . $fileName);
   $insert_blog=mysqli_query($conn,"insert into blogs set title = '$title',content = '$content', short_description = '$short_description',image1='$fileName', status = '$status', meta_title = '$meta_title',published_by='$published_by', meta_description = '$meta_description', meta_keywords = '$meta_keywords', created_by = '$user_id',created_by_name= '$username', created_datetime = '$currentdate' ");
     if($insert_blog)
   {
      $msg = 'Blogs Added Successfully';
      header('location:list-blog.php?msg='.$msg);
   }
   else
   {
      $alert_msg = 'Could not able to add try once again!!!';
   }

}


if ($submit=='Update') {

  $title = addslashes($title);
  //$url = addslashes($url);
  $published_by = addslashes($published_by);
  $content = addslashes($description);
  $short_description = addslashes($short_description);
$folder = "uploads/blog-images/";


if ($blogimg!='') {
$fileName = $_FILES['blogimg']['name'];
$tmpName  = $_FILES['blogimg']['tmp_name'];
move_uploaded_file($tmpName, $folder . $fileName);
$select_oldf=mysqli_query($conn,"select * from blogs where id='$url_id'");
$row_unlink=mysqli_fetch_array($select_oldf);
unlink($folder."/".$row_unlink['image1']);

$imgqry=",image1='$fileName'";
}


   $update_blog=mysqli_query($conn,"update  blogs set  title = '$title',content = '$content', short_description = '$short_description', status = '$status', meta_title = '$meta_title',published_by='$published_by', meta_description = '$meta_description', meta_keywords = '$meta_keywords', created_by = '$user_id',created_by_name= '$username', created_datetime = '$currentdate' $imgqry where id='$url_id'");
     if($update_blog)
   {
      $msg = 'Blogs Updated Successfully';
      header('location:list-blog.php?msg='.$msg);
   }
   else
   {
      $alert_msg = 'Could not able to add try once again!!!';
   }

}

?>

<div class="page-header">

<ul class="breadcrumbs mb-3 mx-0 px-0">
<li class="nav-home">
<a href="home.php">
<i class="icon-home"></i>
</a>
</li>
<li class="separator">
<i class="icon-arrow-right"></i>
</li>
<li class="nav-item">
<a href="add-blog.php">Add Blog</a>
</li>

</ul>
</div>

<?
if ($msg!='') {
?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong><?=$msg;?></strong> 
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?
}

if ($alertmsg!='') {
?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong><?=$alertmsg;?></strong> 
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?
}
if ($url_id!='') {

$select_product_id=mysqli_query($conn,"select * from  blogs where id='$url_id'"); 

$rows_R=mysqli_fetch_array($select_product_id);

foreach($rows_R as $K1=>$V1) $$K1 = $V1;
}
?>



<div class="row">
<div class="col-md-12">
<div class="card">

<div class="card-body">

<form method="POST" enctype="multipart/form-data">

<div class="row">

<div class="col-md-6 col-12">
<div class="form-group">
<label for="exampleFormControlInput1">Blog Title</label>
<input type="text" value="<?=$title;?>" name="title" class="form-control" id="exampleFormControlInput1" required placeholder="Blog Title">
</div>
</div>  

<div class="col-md-6 col-12">
<div class="form-group">
<label for="exampleFormControlInput2">Blog Image</label>
<input type="file" name="blogimg" class="form-control" id="exampleFormControlInput2" <? if($image1==''){?>required<?}?> placeholder="Blog Title">
</div>
<? if ($url_id!='') {?>
<div>
  <img src="uploads/blog-images/<?=$image1?>" width="100px">
</div>

<?}?>
</div>  


<div class="col-md-6 col-12">
<div class="form-group">
<label >Short Description</label>
<textarea class="form-control" required name="short_description" placeholder="Short Description" rows="1"><?=$short_description;?></textarea>
</div>
</div>  


<div class="col-md-6 col-12">
<div class="form-group">
<label>Author</label>
<input type="text" name="published_by" value="<?=$published_by;?>" required class="form-control"  placeholder="Author">
</div>
</div>


<div class="col-md-12 col-12">
<div class="form-group">
<label >Description</label>
<textarea class="form-control" required name="description" placeholder="Description" rows="5"><?=$content;?></textarea>
</div>
</div>  


<div class="col-md-12 col-12">
  <div class="form-group">
<label>Status</label>
  <div class="form-check form-check-inline">

<div class="form-check">
  <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="1" <? if($status =='1' || $status=='') { echo 'checked'; } ?>>
  <label class="form-check-label" for="exampleRadios1">
    Active
  </label>
</div>
</div>
  <div class="form-check form-check-inline">
<div class="form-check">
  <input class="form-check-input" value="0" type="radio" name="status" id="exampleRadios2" <? if($status =='0') { echo 'checked'; } ?> >
  <label class="form-check-label" for="exampleRadios2">
    Inactive
  </label>
</div>
  </div>
</div>
</div>
<div class="col-md-12 col-12">
<input type="submit" name="submit" value="<?if($status==0){echo "Add";}else{echo "Update";}?>" class="btn btn-primary">
</div>
</div>


</form>

</div>
</div>
</div>

</div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h1 class="modal-title fs-5" id="exampleModalLabel">Send Reply</h1>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<div id="output"></div>
</div>


</div>
</div>
</div>



<?}

include 'pattern.php';?>