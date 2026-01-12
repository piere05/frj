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

$delete_blog=mysqli_query($conn,"delete from faq where id='$url_id'");


if ($delete_blog) {
      $msg = 'FAQ Deleted Successfully';
      header('location:list-faq.php?msg='.$msg);
   }
   else
   {
      $alert_msg = 'Could not able to delete try once again!!!';
       header('location:list-faq.php?alert_msg='.$alert_msg);
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
<a href="list-faq.php">Italian Resource</a>
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
$select_eng_res=mysqli_query($conn,"select * from faq");
if (mysqli_num_rows($select_eng_res)!=0) {


?>

<div class="row">
<div class="col-md-12">
<div class="card">

<div class="card-body">
<div class="table-responsive">
<table id="basic-datatables" class="display table table-striped table-hover" >
<thead>
<tr>
<th>Question</th>
<th>Answer</th>
<th>Status</th>
<th>Action</th>

</tr>
</thead>

<tbody>

<?

while($row_eng_res=mysqli_fetch_array($select_eng_res)){
$id=$row_eng_res['id'];

$title=$row_eng_res['title'];
$short_description=$row_eng_res['short_description'];
$content=$row_eng_res['content'];

if ($row_eng_res['status']==1) {
$status="<span class='btn btn-success   rounded-pill'>Active</span>";
}else{
  $status="<span class='btn btn-danger  rounded-pill'>Inactive</span>";
}
?>
<tr>
<td><?=wordwrap($title, 50, "<br />\n"); ;?></td>


<td><?=wordwrap($content, 50, "<br />\n"); ;?></td>

<td><?=$status;?></td>
<td class=""> <a href="add-faq.php?id=<?=$id;?>" class="btn-table mx-3" > <i class="fas fa-pen"></i>
</a>
<a href="list-faq.php?id=<?=$id;?>&act=delete" class="btn-table" > <i class="fas fa-trash"></i>
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