<style>
.hr:hover{ background:#D5DEFF;}
.del:hover{ background:#FFF;}
</style>
<table width="853" border="0" cellspacing="1" style="  margin-left:15px;background:#B9C9FE;font-size:12px; font-family:Verdana, Geneva, sans-serif;">
<?php 
	include_once('config.php');
	$set=new settings();
	$check=$set->query("select * from books where status='1'");
if ($check==false) {
	echo "false";
	}
	else {
		echo "true";
	}
while($row=$set->fetch()){

?>

  <tr bgcolor="#E8EDFF"  align="center" class="hr" height="25">
    <td bgcolor="" width="100">
	<?php echo $row['accNo'];?>
    </td>
    <td  width="400"><?php echo $row['ename']; ?></td>
    <td width="200"><?php echo $row['Suppliername']; ?></td>
    <td width="70"><input readonly="readonly" type="text"  value="<?php echo $row['ecopies']; ?>"/></td>
   <td class="del"><a title="EDIT"  href="?addBooks&accNo=<?php echo $row['accNo']; ?>"><img src="icons/b_edit.png"/></a></td>
   <td class="del">
<?php echo '<div align="center"><a href="#" id="'.$row['accNo'].'" class="delbutton" title="Click To Delete"><img src="icons/b_drop.png" title="Delete"></a></div>'; ?>
<td><a href='myborrow.php?stid="'.$row["studentid"].'"'>Borrow</a></td>
   <td class="del">
   </td>
   </tr>
  

<?php }	
?>
<tr height="20px">
<td></td>
</tr>
</table>



<script type="text/javascript">
$(function() {

$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'accNo=' + del_id;
 if(confirm("Are you sure you want to delete this Equipment?"))
		  {

 $.ajax({
   type: "GET",
   url: "delete.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".hr").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>