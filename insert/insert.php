<?php 

	$con = mysqli_connect("localhost","root","","formdata");
	
		$name = $_POST['name'];
		$email = $_POST['email'];
		$image = $_FILES['image']['name'];
    $path = "image/".$image;
	
    move_uploaded_file($_FILES['image']['tmp_name'], $path);

		$insert = "insert into ajaxdata (name,email,image)values('$name','$email','$image')";
		$res = mysqli_query($con,$insert);

		if($res)
		{
			echo "data insert";
		}
		else
		{
			echo "not";
		}

?>

<?php

  $con = mysqli_connect("localhost","root","","formdata");

  $sql = "SELECT * FROM ajaxdata";
  $result = mysqli_query($con,$sql);


?>
      <?php 
        while ($data = mysqli_fetch_assoc($result)) {
       ?>
        <tr>
          <td><?php echo $data['id']; ?></td>
          <td><?php echo $data['name']; ?></td>
          <td><?php echo $data['email']; ?></td>
          <td><img style="width: 100px;" src="image/<?php echo $data['image']; ?>"></td>
        </tr>
     <?php } ?>