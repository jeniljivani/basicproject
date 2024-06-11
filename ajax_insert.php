<?php 

	$con = mysqli_connect("localhost","root","","formdata");	
	// echo $_POST['name'];
	// print_r($_FILES);

		$name = $_POST['name'];
		$email =  $_POST['email'];
		$image = $_FILES['image']['name'];

		$path = "image/".$image;
		move_uploaded_file($_FILES['image']['tmp_name'], $path);

		$sql = "insert into `ajaxdata`(`name`,`email`,`image`)values('$name','$email','$image')";
		$res = mysqli_query($con,$sql);

		$sql_res = "select * from `ajaxdata`";
		$res_data = mysqli_query($con,$sql_res);

?>
<?php
	while($data = mysqli_fetch_assoc($res_data))
	{
 ?>
 	<tr>
 		<td><?php echo @$data['id'] ?></td>
 		<td><?php echo @$data['name'] ?></td>
 		<td><?php echo @$data['email'] ?></td>
 		<td><img style="width: 100px" src="image/<?php echo @$data['image']; ?>"></td>
 		<td><a href="javascript:void(0)" class="delete" attr-id= <?php echo $data['id'] ?>>Delete</a> </td>
 		<td><a href="javascript:void(0)" class="updata" attr-id= <?php echo $data['id'] ?>>Updata</a> </td>
 	</tr>
<?php  
	}
?>
