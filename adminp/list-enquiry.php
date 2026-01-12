<?
ob_start();
ob_clean();
session_start();
function pattern() {
extract($_REQUEST);
include 'forst/soft/cnt.php';
include 'overall-functions.php';


if ($submit=='Send') {

$update_reply=mysqli_query($conn,"update enquiry set reply='$reply_val' where id='$mainid'");


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
<td width="5%" height="25">&nbsp;</td>
<td width="100%" style="font-size:12px; font-weight:bold;"><strong>Hi,</strong>' . $name . '</td>
</tr>
<tr>
<td width="5%" height="25">&nbsp;</td>
<td width="25%" style="font-size:12px; font-weight:bold;"><strong> Reply For Your Enquiry From Fr. Joseph Jeyaraj</td>
</tr>

<tr>
<td width="5%" height="25">&nbsp;</td>
<td width="25%" style="font-size:12px; font-weight:bold;"><strong>Reply: </strong>'.$reply_val.'</td>
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
$mailsubject='Reply For Your Enquiry';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'Sender: <noreply@josephjeyarajsdb.com>' . "\r\n";
$headers .= 'From: Joseph Jeyaraj <noreply@josephjeyarajsdb.com>' . "\r\n";
$headers .= 'Reply-To: Joseph Jeyaraj <support@josephjeyarajsdb.com>' . "\r\n";
$mailsend=mail($email, $mailsubject, $messages, $headers, '-fnoreply@josephjeyarajsdb.com');

if ($mailsend) {
    $msg='Reply Sent Successfully';
 header("location:list-enquiry.php?msg=$msg");
}else{
 $alertmsg="Couldn't Submit Try Again";
 header("location:list-enquiry.php?alertmsg=$alertmsg");
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
<a href="list-enquiry.php">Enquiry</a>
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
$select_enquiry=mysqli_query($conn,"select * from enquiry");
if (mysqli_num_rows($select_enquiry)!=0) {
?>

<div class="row">
<div class="col-md-12">
<div class="card">

<div class="card-body">
<div class="table-responsive">
<table id="basic-datatables" class="display table table-striped table-hover" >
<thead>
<tr>
<th>Name</th>
<th>Details</th>
<th>Subject</th>
<th>Message</th>
<th>Action</th>

</tr>
</thead>

<tbody>

<?
$select_enquiry=mysqli_query($conn,"select * from enquiry");

while($row_enq=mysqli_fetch_array($select_enquiry)){
$id=$row_enq['id'];

$name=$row_enq['name'];
$email=$row_enq['email'];
$subject=$row_enq['subject'];
$mobile=$row_enq['mobile'];
$message=$row_enq['message'];

?>
<tr>
<td><?=$name;?></td>
<td><?=$mobile."<br>".$email;?></td>
<td><?=$subject;?></td>
<td><?=wordwrap($message, 30, "<br />\n"); ;?></td>
<td> <a href="#" class="btn-table" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="addreply(<?=$id;?>)"> <i class="fas fa-envelope-square"></i>
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



<script>
	function addreply(id) {


$.ajax({
url: "ajax-popup.php", 
type: "POST",
data: "id="+id+"&act=enquiry",
success: function(result){

$("#output").html(result);
}}); 

}
</script>
<?}

include 'pattern.php';?>