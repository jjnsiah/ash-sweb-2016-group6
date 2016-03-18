<?php 
include_once ("config.php");
$studentid=41;
	$set=new settings();
	$check=$set->query("select * from tblborrower where studentid=$studentid");
if ($check==false) {
	echo "false";
	}
	else {
		echo "true";
	}
	while ($row=$set->fetch()){



?>

<table border="0" cellspacing="1"  style=" font-family:Verdana, Geneva, sans-serif; font-size:12px; border:#999 solid 0px;margin-left:50px; margin-top:30px; margin-bottom:20px;">
<td width="50">
<img src="borrowersphoto/<?php echo $row['photo']; ?>" height="50">
</td>
<td>My Information</td>
</tr>
</table>

<table border="0"  style=" font-family:Verdana, Geneva, sans-serif; font-size:15px; border:#999 solid 1px;margin-left:50px; margin-top:30px; margin-bottom:20px;">
<tr>
<td align="right">First Name:</td><td><?php echo $row['fname']; ?></td>
</tr>
<tr>
<td align="right">Last Name:</td><td><?php echo $row['lname']; ?></td>
</tr>

<tr>
<td align="right">Gender:</td><td><?php echo $row['gender']; ?></td>
</tr>
</table>


<?php }	
?>
</table>
<?

//
