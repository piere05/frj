<?
ob_start();
ob_clean();
session_start();
function pattern() {
extract($_REQUEST);
include 'forst/soft/cnt.php';
include 'overall-functions.php';
$act=$_GET['act'];
$url_id=$_GET['id'];


if ($act=='delete' && $url_id!='') {
$select_oldf=mysqli_query($conn,"select * from blogs where id='$url_id'");
$row_unlink=mysqli_fetch_array($select_oldf);
unlink("uploads/blog-images/".$row_unlink['image1']);


$delete_blog=mysqli_query($conn,"delete from blogs where id='$url_id'");


if ($delete_blog) {
  
      $msg = 'Blog Deleted Successfully';
      header('location:list-blog.php?msg='.$msg);
   }
   else
   {
      $alert_msg = 'Could not able to delete try once again!!!';
       header('location:list-blog.php?alert_msg='.$alert_msg);
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
<a href="list-blog.php">Blogs</a>
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
}?>


<?
$select_blogs=mysqli_query($conn,"select * from blogs");
if (mysqli_num_rows($select_blogs)!=0) {


?>

<div class="row">
<div class="col-md-12">
<div class="card">

<div class="card-body">
<div class="table-responsive">
<table id="basic-datatables" class="display table table-striped table-hover" >
<thead>
<tr>
<th>Title</th>
<th>Published By</th>
<th>Short Description</th>
<th>Descrption</th>
<th>Status</th>
<th>Action</th>

</tr>
</thead>

<tbody>

<?

while($row_blog=mysqli_fetch_array($select_blogs)){
$id=$row_blog['id'];

$title=$row_blog['title'];


$published_by=$row_blog['published_by'];
$short_description=$row_blog['short_description'];
$content=$row_blog['content'];

if ($row_blog['status']==1) {
$status="<span class='btn btn-success   rounded-pill'>Active</span>";
}else{
  $status="<span class='btn btn-danger  rounded-pill'>Inactive</span>";
}
?>
<tr>
<td><?=$title;?></td>
<td><?=$published_by;?></td>
<td><?=wordwrap($short_description, 30, "<br />\n"); ;?></td>
<td><?=wordwrap($content, 50, "<br />\n"); ;?></td>
<td><?=$status;?></td>
<td class=""> <a href="add-blog.php?id=<?=$id;?>" class="btn-table mx-3" > <i class="fas fa-pen"></i>
</a>
<a href="list-blog.php?id=<?=$id;?>&act=delete" class="btn-table" > <i class="fas fa-trash"></i>
</a>
</td>
</tr>
<?}?>

</tbody>
</table>
</div>
</div>
</div>
</div>

</div>

<?}else{ echo "<h6>No Record Found</h6>";}?>

<?}

include 'pattern.php';?>