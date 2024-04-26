<?php 

	$con = mysqli_connect("localhost","root","","formdata");	
		@$name = $_POST['name'];
		@$email =  $_POST['email'];
		$sql = "insert into `ajaxdata`(`name`,`email`)values('$name','$email')";
		$res = mysqli_query($con,$sql);
	$sql_res = "select * from `ajaxdata`";
	$res_data = mysqli_query($con,$sql_res);


	while($data = mysqli_fetch_assoc($res_data))
	{
 ?>
 	<tr>
 		<td><?php echo @$data['id'] ?></td>
 		<td><?php echo @$data['name'] ?></td>
 		<td><?php echo @$data['email'] ?></td>
 		<td><a href="javascript:void(0)" class="delete" attr-id= <?php echo $data['id'] ?>>Delete</a> </td>
 		<td><a href="javascript:void(0)" class="updata" attr-id= <?php echo $data['id'] ?>>Updata</a> </td>
 	</tr>
<?php  
	}
?>
