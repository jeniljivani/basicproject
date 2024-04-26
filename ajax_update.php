<?php 
	$con = mysqli_connect("localhost","root","","formdata");


	if(isset($_POST['u_id'])) {
		$uname = $_POST['u_name'] ;
		$uemail = $_POST['u_email'] ;
		$u_id = $_POST['u_id'] ;
		$sql = "update `ajaxdata` set `name`='$uname',`email`='$uemail' where `id`=".$u_id;
		mysqli_query($con,$sql);

	}

	if(isset($_GET['uid']))
	{
		$id = $_GET['uid'];
		$res = mysqli_query($con , "select * from `ajaxdata` where id=$id");
		$data = mysqli_fetch_assoc($res);
		echo json_encode($data);

	}
	else {

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
	}
?>


