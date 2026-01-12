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
$title = addslashes($title);
$content = addslashes($description);

$folder = "uploads/article-file/";
$fileName = $_FILES['blogimg']['name'];
$tmpName  = $_FILES['blogimg']['tmp_name'];
$fileType = $_FILES['blogimg']['type'];

$allowedTypes = array(
'application/pdf',
'application/msword',
'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
);

if (in_array($fileType, $allowedTypes)) {

move_uploaded_file($tmpName, $folder . $fileName);

$insert_blog = mysqli_query($conn,"INSERT INTO articles SET title='$title',content='$content',res_file='$fileName',status='$status',created_by='$user_id',created_by_name='$username',created_datetime='$currentdate'"
);

if ($insert_blog) {
$msg = 'Article Added Successfully';
header('location:list-article.php?msg=' . $msg);

} else {
$alert_msg = 'Could not add resource. Try again!';
}

} else {
$alert_msg = 'Only PDF or Word files are allowed!';
}
}

if ($submit == 'Update') {

    $title   = mysqli_real_escape_string($conn, $title);
    $content = mysqli_real_escape_string($conn, $description);

    $folder = "uploads/article-file/";
    $imgqry = "";

    // Check if new file uploaded
    if (!empty($_FILES['blogimg']['name'])) {

        $fileName = $_FILES['blogimg']['name'];
        $tmpName  = $_FILES['blogimg']['tmp_name'];
        $fileType = $_FILES['blogimg']['type'];

        $allowedTypes = array(
            'application/pdf',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
        );

        $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedExt = array('pdf', 'doc', 'docx');

        if (in_array($fileType, $allowedTypes) && in_array($ext, $allowedExt)) {

            move_uploaded_file($tmpName, $folder . $fileName);

            // Get old file
            $select_oldf = mysqli_query($conn, "SELECT res_file FROM articles WHERE id='$url_id'");
            $row_unlink = mysqli_fetch_assoc($select_oldf);

            if (!empty($row_unlink['res_file']) && file_exists($folder . $row_unlink['res_file'])) {
                unlink($folder . $row_unlink['res_file']);
            }

            $imgqry = ", res_file='$fileName'";

        } else {
            $alert_msg = 'Only PDF or Word files are allowed!';
            return;
        }
    }

    $update_blog = mysqli_query(
        $conn,
        "UPDATE articles 
         SET title='$title',
             content='$content',
             status='$status',
             created_by='$user_id',
             created_by_name='$username',
             created_datetime='$currentdate'
             $imgqry
         WHERE id='$url_id'"
    );

    if ($update_blog) {
        $msg = 'Article Updated Successfully';
        header('location:list-article.php?msg=' . $msg);
        exit;
    } else {
        $alert_msg = 'Update failed. Try again!';
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
<a href="add-article.php">Add Article</a>
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

$select_product_id=mysqli_query($conn,"select * from  articles where id='$url_id'"); 

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
<label for="exampleFormControlInput1">Article Title</label>
<input type="text" value="<?=$title;?>" name="title" class="form-control" id="exampleFormControlInput1" required placeholder="Article Title">
</div>
</div>  

<div class="col-md-6 col-12">
<div class="form-group">
<label for="exampleFormControlInput2">Article File</label>
<input type="file" name="blogimg" class="form-control" id="exampleFormControlInput2" <? if($res_file==''){?>required<?}?> placeholder="Resource Title">
</div>
<? if ($url_id!='' && $res_file!='') {?>
<div>
<a href="uploads/article-file/<?=$res_file?>" target="_blank">
<img src="assets/img/pdf.png" width="100px">
</a>
</div>

<?}?>
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
<input type="submit" name="submit" value="<?if($url_id==''){echo "Add";}else{echo "Update";}?>" class="btn btn-primary">
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