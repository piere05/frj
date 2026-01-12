<?
ob_start();
ob_clean();
session_start();
extract($_REQUEST);
include 'forst/soft/cnt.php';
include 'overall-functions.php';

$act=$_POST['act'];
$ID=$_POST['id'];

if ($act=='enquiry') {

$select_product_id=mysqli_query($conn,"select * from  enquiry where id='$ID'"); 

$rows_R=mysqli_fetch_array($select_product_id);

foreach($rows_R as $K1=>$V1) $$K1 = $V1;

?>

<form method="POST">

<label>Send Reply:</label>
<textarea name="reply_val" placeholder="Reply" class="form-control"><?=$reply;?></textarea>	
<input type="hidden" name="mainid" value="<?=$ID;?>">

<input type="hidden" name="name" value="<?=$name;?>">
<input type="hidden" name="email" value="<?=$email;?>">


<input type="submit" name="submit" value="Send" class="btn btn-primary mt-3">
</form>

<?}?>