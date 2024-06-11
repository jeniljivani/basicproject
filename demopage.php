<?php 
	$con = mysqli_connect("localhost","root","","student");
	$limit = 10;


	$select = "select * from `pagination` limit $limit";
	$total_select = "select * from `pagination`";
	$total_rec = mysqli_query($con,$total_select);
	$total = mysqli_num_rows($total_rec);

	$res= mysqli_query($con,$select);

?>
<table border="1">
<?php
	while($data = mysqli_fetch_assoc($res))
	{
?>
	<tr>
		<td><?php echo @$data['id']; ?></td>
		<td><?php echo @$data['name']; ?></td>
		<td><?php echo @$data['val1']; ?></td>
	</tr>
<?php  
	}
	for ($i=1; $i <=$total ; $i++) { 
		echo $i;
	}
?>
</table>