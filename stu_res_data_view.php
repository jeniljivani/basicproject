<?php 
	
	$con = mysqli_connect("localhost","root","","student");
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$delete = "delete from `stu_result` where `id`=".$id;
		$res = mysqli_query($con,$delete);
	}
	$sql = "select * from `stu_result`";
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
		<th>Id</th>
		<th>Roll no.</th>
		<th>Name</th>
		<th>Sub 1</th>
		<th>Sub 2</th>
		<th>Sub 3</th>
		<th>Sub 4</th>
		<th>Sub 5</th>
		<th>Total</th>
		<th>per</th>
		<th>Min</th>
		<th>Max</th>
		<th>Gread</th>
		<th>Result</th>
		<th>Update</th>
		<th>Delete</th>

		<?php 
			while ($data = mysqli_fetch_assoc($res)) {			
		?>
		<tr >
			<td><?php echo @$data['id']; ?></td>
			<td><?php echo @$data['roll']; ?></td>
			<td><?php echo @$data['name']; ?></td>
			<td><?php echo @$data['sub1']; ?></td>
			<td><?php echo @$data['sub2']; ?></td>
			<td><?php echo @$data['sub3']; ?></td>
			<td><?php echo @$data['sub4']; ?></td>
			<td><?php echo @$data['sub5']; ?></td>
			<td><?php echo @$data['total']; ?></td>
			<td><?php echo @$data['per']; ?></td>
			<td><?php echo @$data['min']; ?></td>
			<td><?php echo @$data['max']; ?></td>
			<td><?php echo @$data['gread']; ?></td>
			<td><?php echo @$data['result']; ?></td> 				
			<td><a href="stu_res_data_viwe.php ?id=<?php echo $data['id']; ?>">Delete</a></td>
			<td><a href="stu_res_database.php ?id=<?php echo $data['id']; ?>">Update</a></td>
		</tr>

		<?php } ?>
	</table>
	<a href="stu_res_database.php">add student result</a>


</body>
</html> 