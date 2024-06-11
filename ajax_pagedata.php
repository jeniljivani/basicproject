<?php 
 $con = mysqli_connect("localhost","root","","student");
	
	$page =$_GET['page_no'];
 	$limit = 10;

	$start = ($page - 1) * $limit ;

 	if(isset($_GET['search']))
 	{
	 	$search = $_GET['search'];
	 	$sql_page = "select * from `pagination` where name like '%$search%'  limit $start , $limit";
	 	$total_rec = "select * from `pagination` where name like '%$search%' ";
 	}
 	else {
		$sql_page = "select * from `pagination` limit $start , $limit";
		$total_rec = "select * from `pagination`";

 	}

 	$res = mysqli_query($con,$total_rec);
 	$total_row = mysqli_num_rows($res);
 	$total_page= ceil($total_row/$limit);


	$res_page = mysqli_query($con,$sql_page);

	while ($data = mysqli_fetch_assoc($res_page))
	{
?>
	<tr>
		<td><?php echo @$data['id'] ?></td>
		<td><?php echo @$data['name'] ?></td>
		<td><?php echo @$data['val1'] ?></td>
		<td><?php echo @$data['val2'] ?></td>
		<td><?php echo @$data['ans'] ?></td>
	</tr>
<?php 
	}
?>