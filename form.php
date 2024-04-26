<?php 
	
	$con = mysqli_connect("localhost","root","","formdata");

	// echo "<pre>";
	// print_r($_POST);

	// echo "<pre>";
	// print_r($_FILES);

	// update query ************
	if (isset($_GET['id'])) 
	{
		$id = $_GET['id'];
		$rec = "select * from `data` where `id`=".$id;
		$res = mysqli_query($con,$rec);
  		$data = mysqli_fetch_assoc($res);  		
  		$hob_arr = explode(',', $data['hobby']);
	}
	// submit code **************
	if(isset($_POST['submit']))
	{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$contect = $_POST['contect'];
		$gender = $_POST['gender'];
		$hobby = $_POST['hobby'];
		$hob_str= implode(',', $hobby);
		$city = $_POST['city'];
		$address = $_POST['address'];
		$password = $_POST['password'];
		$image = $_FILES['image']['name'];

		$path = "image/".$image;
		move_uploaded_file($_FILES['image']['tmp_name'],$path);

		if($image == ""){
			$image = $data['image'];
		}

		if (isset($_GET['id'])) {		
			$sql = "update `data` set `name`='$name',`email`='$email',contect='$contect',`gender`='$gender',`hobby`='$hob_str',`city`='$city',`address`='$address',`password`='$password',`image`='$image' where `id`=".$_GET['id'];
		}
		else {			
	
		$sql = "insert into `data`(`name`,`email`,`contect`,`gender`,`hobby`,`city`,`address`,`password`,`image`)values('$name','$email','$contect','$gender','$hob_str','$city','$address','$password','$image')";
		}
		mysqli_query($con,$sql);
		// header("location:form_view.php");
	}


 ?>
		
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form method="post" enctype="multipart/form-data">
		<table border="1">
			<tr>
				<td>Name : </td>
				<td><input type="text"  value="<?php echo @$data['name'] ?>" name="name"></td>
			</tr>
			<tr>
				<td>Email : </td>
				<td><input type="email" value="<?php echo @$data['email'] ?>" name="email"></td>
			</tr>
			<tr>
				<td>Contect : </td>
				<td><input type="number" value="<?php echo@$data['contect'] ?>" name="contect"></td>
			</tr>
			<tr>
				<td>Gender : </td>
				<td>
					<input type="radio" name="gender" value="male"<?php if(@$data['gender']=='male') {?> checked <?php } ?>>Male
					<input type="radio" name="gender" value="female"<?php if(@$data['gender']=='female') {?> checked <?php } ?>>Female
				</td>
			</tr>
			<tr>
				<td>Hobby : </td>
				<td>
					<input type="checkbox" name="hobby[]" value="writing" <?php if(isset($_GET['id'])) {if(in_array("writing", @$hob_arr)) { ?> checked <?php } }?>> Writing
					<input type="checkbox" name="hobby[]" value="travel" <?php if(isset($_GET['id'])) {if(in_array("Travel", @$hob_arr)) { ?> checked <?php } } ?>>Travel
					<input type="checkbox" name="hobby[]" value="sport" <?php if(isset($_GET['id'])) {if(in_array("Sport", @$hob_arr)) { ?> checked <?php } } ?>>Sport<br>
					<input type="checkbox" name="hobby[]" value="reading" <?php if(isset($_GET['id'])) {if(in_array("Reading", @$hob_arr)) { ?> checked <?php } } ?>>Reading
					<input type="checkbox" name="hobby[]" value="music" <?php if(isset($_GET['id'])) {if(in_array("Music", @$hob_arr)) { ?> checked <?php } } ?>>Music
					<input type="checkbox" name="hobby[]" value="dance" <?php if(isset($_GET['id'])) {if(in_array("Dance", @$hob_arr)) { ?> checked <?php } } ?>>Dance
				</td>
			</tr>
			<tr>
				<td>City</td>
				<td>
					<select name="city">
						<option disabled selected hidden value="">-- select city --</option>
						<option value="surat" <?php if(@$data['city']=='surat') { ?> selected <?php } ?>>Surat</option>
						<option value="goa" <?php if(@$data['city']=='goa') { ?> selected <?php } ?>>Goa</option>
						<option value="mumbai" <?php if(@$data['city']=='mumbai') { ?> selected <?php } ?>>Mumbai</option>
						<option value="rajkot" <?php if(@$data['city']=='rajkot') { ?> selected <?php } ?>>Rajkot</option>
						<option value="navsari" <?php if(@$data['city']=='navsari') { ?> selected <?php } ?>>Navsari</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Address</td>
				<td><input type="textarea" value="<?php echo @$data['address'] ?>" name="address"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input  type="password" value="<?php echo @$data['password'] ?>" name="password"></td>
			</tr>
			<tr>
				<td>Image</td>
				<td><input type="file" value="<?php echo @$data['image'] ?>" name="image"></td>
			</tr>
			<tr>
				<td><input type="submit" name="submit"></td>
			</tr>
		</table>
	</form>
	<a href="form_view.php">view all data</a>

</body>
</html>