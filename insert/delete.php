<?php 

  $con = mysqli_connect("localhost","root","","formdata");
  
  if(isset($_POST['id']))
  {  
    // @$id=  $_POST['id'];
    $sql = "delete from `ajaxdata` where id=".$_POST['id'];
    $res = mysqli_query($con,$sql);
  }

  $sql_res = "select * from `ajaxdata`";
  $res_data = mysqli_query($con,$sql_res);

  while($data = mysqli_fetch_assoc($res_data)) 
  {
 ?>
  <tr>
    <td><?php echo $data['id']; ?></td>
    <td><?php echo $data['name']; ?></td>
    <td><?php echo $data['email']; ?></td>
    <td><img style="width: 100px;" src="image/<?php echo $data['image']; ?>"></td>
    <td><a href="javascript:void(0)" class="delete" attr-id= <?php echo $data['id'] ?>>Delete</a> </td>
    <!-- <td><a href="javascript:void(0)" class="updata" attr-id= <?php echo $data['id'] ?>>Updata</a> </td> -->
  </tr>
<?php  
  }
?>


