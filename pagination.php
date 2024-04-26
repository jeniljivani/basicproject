<?php 

 $con = mysqli_connect("localhost","root","","student");

 $limit = 10;

if(isset($_GET['page'])) {
	$page = $_GET['page'];
}
else {
	$page = 1;
}
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

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title></title>

 	<style type="text/css">
 		.btn {
 			margin: 5px 2px;
 			border: 1px solid black;
 			padding: ;
 			text-decoration:none;
 			display: none;
 		}
 		.page:hover {
 			background: lightgray;
 		}
 	</style>

 </head>
 <body>
 <form method="get">
 	<input type="text" name="search">
 	<input type="submit" name="submit" value="search">
 </form>

	<table border="1">
		<tr>
			<th>ID</th>			
			<th>Name</th>			
			<th>Val1</th>
			<th>Val2</th>
			<th>Ans</th>
		</tr>
		<?php 
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
	</table>

	<br>
<?php 
	if($page<=1) { 
		echo "<a style='border:5px solid black; padding: 5px 10px; margin: 5px 2px; text-decoration: none; ' href='pagination.php?page=".$page."' >pre</a>";
	}
	else
	{
		
		echo "<a style='border:2px solid black; padding: 5px 10px; margin: 5px 2px; text-decoration: none;' href='pagination.php?page=".$page - 1 ."' >pre</a>";
	}

	for ($i=1; $i<=$total_page; $i++)
	{  
?>

		<a class="page" style="text-decoration: none; padding: 2px 10px;" href="pagination.php?page=<?php echo $i; if(isset($_GET['search'])) {?> &search=<?php  echo $_GET['search']; } ?>"><?php echo $i; ?></a>
		
<?php 
		
	} 
		if($page<=$total_page-1) 
		{ 
			echo "<a style='border:2px solid black; padding: 5px 10px; margin: 5px 2px; text-decoration: none;'  href='pagination.php?page=".$page + 1 ."'>net</a>";
		}
		else 
		{ 
			echo "<a style='border:2px solid black; padding: 5px 10px; margin: 5px 2px; text-decoration: none;'  href='pagination.php?page=".$page ."'>net</a>";
		}
?>

 </body>
 </html>