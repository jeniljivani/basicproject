
<?php 

	$con = mysqli_connect("localhost","root","","formdata");




	if(isset($_GET['id'])) 		
	{		
		$id = $_GET['id'];
		$img_data = "select * from `data` where `id`=".$id;
		$res1 = mysqli_query($con,$img_data);			
		$data_img = mysqli_fetch_assoc($res1);
		$image = $data_img['image'];
		$path = 'image/'.$image;
unlink(filename)
unlink(filename)
		// echo $image;

		unlink($image);

		$delete = "delete from `data` where `id`=".$id;		
		$res = mysqli_query($con,$delete);

		// $d_img = $data['image'];
		// $path = 'image/'.$d_img;

			// unlink($d_img,$path);	
	}


	$sql = "select * from `data`";
	$res = mysqli_query($con,$sql);
	

 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<table border="1">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Contect</th>
			<th>Gender</th>
			<th>Hobby</th>
			<th>City</th>
			<th>Adderss</th>
			<th>Password</th>
			<th>Image</th>
			<th>Delete</th>
			<th>Updata</th>
		</tr>

		<?php 
			while ($data=mysqli_fetch_assoc($res)) {			
		?>
		<tr>
			<td><?php echo @$data['id']; ?></td>
			<td><?php echo @$data['name']; ?></td>
			<td><?php echo @$data['email']; ?></td>
			<td><?php echo @$data['contect']; ?></td>
			<td><?php echo @$data['gender']; ?></td>
			<td><?php echo @$data['hobby']; ?></td>
			<td><?php echo @$data['city']; ?></td>
			<td><?php echo @$data['address']; ?></td>
			<td><?php echo @$data['password']; ?></td>
			<td>
				<img src="image/<?php echo @$data['image']; ?>" height="100px" width="100px">
			</td>
			<td><a href="form_view.php?id=<?php echo $data['id']; ?>">Delete</td>
			<td><a href="form.php?id=<?php echo $data['id']; ?>">Updata</td>

		</tr>
	<?php } ?>
	</table>
	<a href="form.php">add data</a>

</body>
</html>