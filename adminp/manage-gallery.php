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




if ($submit == 'Add') {

$insert_blog = mysqli_query($conn,"INSERT INTO 
gallery SET 
status='$status',image='$blogimg',created_datetime='$currentdate'"
);

if ($insert_blog) {
$msg = 'Image Added Successfully';
header('location:manage-gallery.php?msg=' . $msg);

} else {
$alert_msg = 'Could not add resource. Try again!';
}

} 


if ($submit == 'Update') {
$update_blog = mysqli_query($conn,"UPDATE gallery SET status='$status',
image='$blogimg',created_datetime='$currentdate' WHERE id='$url_id'");

    if ($update_blog) {
        $msg = 'Image Updated Successfully';
        header('location:manage-gallery.php?msg=' . $msg);
        exit;
    } else {
        $alert_msg = 'Update failed. Try again!';
    }
}


$act=$_GET['act'];
$url_id=$_GET['id'];


if ($act=='delete' && $url_id!='') {

$select_oldf=mysqli_query($conn,"select * from gallery where id='$url_id'");
$row_unlink=mysqli_fetch_array($select_oldf);
unlink("uploads/gallery-file/".$row_unlink['image1']);


$delete_blog=mysqli_query($conn,"delete from gallery where id='$url_id'");


if ($delete_blog) {
      $msg = 'Gallery Image Deleted Successfully';
      header('location:manage-gallery.php?msg='.$msg);
   }
   else
   {
      $alert_msg = 'Could not able to delete try once again!!!';
       header('location:manage-gallery.php?alert_msg='.$alert_msg);
   }
}



?>
<script src="assets/js/core/jquery-3.7.1.min.js"></script>
<link rel="stylesheet" href="assets/css/croppie.css">

	<script src="assets/js/croppie.min.js"></script>


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
<a href="manage-gallery.php">Manage Gallery</a>
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

$select_product_id=mysqli_query($conn,"select * from  gallery where id='$url_id'"); 

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
<label for="exampleFormControlInput2">Gallery Image</label>
<input type="file" id="upload_image" class="form-control">

<input type="hidden" name="blogimg" id="blogimg" value="<?=$image;?>">
</div>
<? if ($url_id!='' && $image!='') {?>
<div class="my-4">
<img src="uploads/<?=$image?>" width="100px">

</div>

<?}?>
</div>  



<div class="col-md-6 col-12">
<div class="form-group">
<label>Status</label>
<br>
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
<input type="submit" name="submit" value="<?if($url_id==''){echo "Add";}else{echo "Update";}?>" class="btn btn-primary">
</div>
</div>


</form>

</div>
</div>
</div>

</div>




<?
$select_eng_res=mysqli_query($conn,"select * from gallery order by id desc");
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
<th>Image</th>
<th>Status</th>
<th>Action</th>

</tr>
</thead>

<tbody>

<?

while($row_eng_res=mysqli_fetch_array($select_eng_res)){
$id=$row_eng_res['id'];


$res_file=$row_eng_res['image'];

if ($row_eng_res['status']==1) {
$status="<span class='btn btn-success   rounded-pill'>Active</span>";
}else{
  $status="<span class='btn btn-danger  rounded-pill'>Inactive</span>";
}
?>
<tr>

<td><? if ($res_file!='') {?><img src="uploads/<?=$res_file; ?>" width="100px"><?}else{ echo "--";}?></td>
<td><?=$status;?></td>
<td class=""> <a href="manage-gallery.php?id=<?=$id;?>" class="btn-table mx-3" > <i class="fas fa-pen"></i>
</a>
<a href="manage-gallery.php?id=<?=$id;?>&act=delete" class="btn-table" > <i class="fas fa-trash"></i>
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


<div id="cropImageModal">
    <div class="crop-box">
        <div id="image_demo"></div>
        <button type="button" class="btn btn-primary mt-2" id="crop_and_upload">
            Crop & Upload
        </button>
    </div>
</div>



<script>

    var $image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
        width: 400,
        height: 400,
        type: 'square',
        format: 'webp',
        quality: 0.82
    },
    boundary: {
        width: 450,
        height: 450
    }
});

$('#upload_image').on('change', function () {
    var reader = new FileReader();
    reader.onload = function (event) {
        $image_crop.croppie('bind', {
            url: event.target.result
        });
        $('#cropImageModal').show();
        $('#cropImageModal').addClass('show');
    }
    reader.readAsDataURL(this.files[0]);
});

$('#crop_and_upload').click(function () {

    $image_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
    }).then(function (response) {

        $.ajax({
            url: "ajax-add-image.php",
            type: "POST",
            data: {
                image: response,
                old_image: $('#blogimg').val() // send old image path if exists
            },
            success: function (data) {
                $('#blogimg').val(data); // gallery-file/image.webp
                $('#cropImageModal').hide();
                  $('#cropImageModal').removeClass('show');
            }
        });

    });
});


</script>



<?}
include 'pattern.php';?>