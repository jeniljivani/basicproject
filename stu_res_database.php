<?php 

	$con = mysqli_connect("localhost","root","","student");

	if(isset($_GET['id']))
  	{
  		$id = $_GET['id'];
  		$rec = "select * from `stu_result` where `id`=".$id;
  		$res = mysqli_query($con,$rec);
  		$data = mysqli_fetch_assoc($res);
  	}



	if(isset($_POST['submit']))
	{
		$roll = $_POST['roll'];
		$name = $_POST['name'];
		$sub1 = $_POST['sub1'];
		$sub2 = $_POST['sub2'];
		$sub3 = $_POST['sub3'];
		$sub4 = $_POST['sub4'];
		$sub5 = $_POST['sub5'];

		$total = $sub1+$sub2+$sub3+$sub4+$sub5;

		$per = $total/5;

		$min = min($sub1,$sub2,$sub3,$sub4,$sub5);
		$max = max($sub1,$sub2,$sub3,$sub4,$sub5);

		$gread; 
		$temp=0; $result;

		if($per>90) {
			$gread ="A+"; // 84
		}
		else if($per>80)
		{
			$gread = "A";
		}
		else if($per>70)
		{
			$gread = "B+";		
		}
		else if($per>60) {
			$gread = "B";
		}
		else if($per>50) {
			$gread = "C" ;
		}
		else if($per>35)
		{
			$gread ="D";			
		}
		else {
			$gread = "E";
		}

		if($sub1 > 35) {
			$temp +=1; //1
		}
		if($sub2 > 35) {
			$temp +=1; // 2
		}
		if($sub3 > 35) { //34
			$temp +=1; // 2
		}
		if($sub4 > 35) { // 40
			$temp +=1; // 3
		}
		if($sub5 > 35) { 
			$temp +=1; //3
		}


		if($temp == 5)
		{
			$result = "PASS";
		} 
		else if($temp == 3 || $temp == 4)
		{
			$result = "ATKT";
		}
		else
		{
			$result = "FAIl";
		}

		// insert in database ***************
		if(isset($_GET['id']))
		{
			// $sql = "update `stu_result` set `roll`=$roll,`name`=$name, where `id`=".$_GET['id'];
			$sql = "update `stu_result` set `roll`=$roll,`name`='$name',`sub1`='$sub1',`sub2`='$sub2',`sub3`='$sub3',`sub4`='$sub4',`sub5`='$sub5',`total`='$total',`per`='$per',`min`='$min',`max`='$max',`gread`='$gread',`result`='$result' where id=".$_GET['id'];
		}
		else {
			$sql = "insert into `stu_result`(`roll`,`name`,`sub1`,`sub2`,`sub3`,`sub4`,`sub5`,`total`,`per`,`min`,`max`,`gread`,`result`)values('$roll','$name','$sub1','$sub2','$sub3','$sub4','$sub5','$total','$per','$min','$max','$gread','$result')";
		}
		mysqli_query($con,$sql);
		header("location:stu_res_data_view.php");
	}
	if(isset($_GET['id'])) {
		$status = "Edit";
	}
	else {
		$status = "Submit";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student result in database</title>
</head>
<body>
	<form method="post">
		<table border="1">
			<tr>
				<td>Roll no.</td>
				<td> <input type="text" value="<?php echo @$data['roll']; ?>" name="roll" /></td>			
			</tr>
			<tr>
				<td>Name</td>
				<td> <input type="text" value="<?php echo @$data['name']; ?>" name="name" /></td>			
			</tr>
			<tr>
				<td>Sub 1</td>
				<td> <input type="text" value="<?php echo @$data['sub1']; ?>" name="sub1" /></td>			
			</tr>
			<tr>
				<td>Sub 2</td>
				<td> <input type="text" value="<?php echo @$data['sub2']; ?>"  name="sub2"/></td>			
			</tr>
			<tr>
				<td>Sub 3</td>
				<td> <input type="text" value="<?php echo @$data['sub3']; ?>" name="sub3" /></td>			
			</tr>
			<tr>
				<td>Sub 4</td>
				<td> <input type="text" value="<?php echo @$data['sub4']; ?>" name="sub4" /></td>			
			</tr>
			<tr>
				<td>Sub 5</td>
				<td> <input type="text" value="<?php echo @$data['sub5']; ?>" name="sub5" /></td>			
			</tr>
			<tr>
				<td> <input type="submit" name="submit" value="<?php echo $status; ?>"></td>
			</tr>
		</table>		
	</form>

	<a href="stu_res_data_view.php">viwe all student result</a>

</body>
</html>