<?php

  $con = mysqli_connect("localhost","root","","formdata");

  $sql = "SELECT * FROM ajaxdata";
  $result = mysqli_query($con,$sql);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		
	</title>
</head>
<body>

	<form method="post" enctype="multipart/form-data" id="userform">
		<table>
			<h1 id="mes"></h1>
			<tr>
				<td>Name</td>
				<td><input type="name" id="name" name="name"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="email" id="email" name="email"></td>
			</tr>
			<tr>
				<td>Image</td>
				<td><input type="file" id="image" name="image"></td>
			</tr>
			<tr>
				<td><input type="submit" name="submit" value="submit"></td>
			</tr>
			
		</table>
	</form>


</body>
</html>


<form method="">
  <table border="">
      <tr>
        <td>Id</td>
        <td>Name</td>
        <td>Email</td>
        <td>Image</td>
        <td>delete</td>
      </tr>
<tbody id="ans">
      <?php 
        while ($data = mysqli_fetch_assoc($result)) {
       ?>
        <tr>
          <td><?php echo $data['id']; ?></td>
          <td><?php echo $data['name']; ?></td>
          <td><?php echo $data['email']; ?></td>
          <td><img style="width: 100px;" src="image/<?php echo $data['image'] ?>"></td>
        </tr>
    <td><a href="javascript:void(0)" class="delete" attr-id= <?php echo $data['id'] ?>>Delete</a> </td>
          
        </tr>
     <?php } ?>
</tbody>
  </table>
</form>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.js"></script>

<script>

	$(document).ready(function() {
		// alert();
    	$('#userform').on('submit', function(e) {
        e.preventDefault();

        // let name = $('#name').val();
        // let email = $('#email').val();
        // let image = $('#image').val();
        var formdata = new FormData(this)
        $.ajax({
            url: 'insert.php',
            method: 'POST',
            data:formdata,
 			      contentType: false,
            processData: false,
            success: function(response) 
            {
              console.log(response);
            	// $('#name').val('');
            	// $('#email').val('');
              //   $('#mes').html(response);

                // $('#userForm')[0].reset();
                // console.log(response);
            }
            // contentType: false,
            // processData: false,
	        });
	    });
	});

// delete data


    //     $(function(){
    //     $('#userform').click(function(){
    //         var del_id= $(this).attr('id');
    //         var $ele = $(this).parent().parent();
    //         $.ajax({
    //             type:'POST',
    //             url:'delete.php',
    //             data:del_id,
    //             success: function(data){
                   
    //                 }

    //             })
    //         })
    // });


    $(document).on('click','.delete',function() {
      var id = $(this).attr("attr-id")

      $.ajax({
        type:'POST',
        url:"delete.php",
        data:{"id":id},
        success:function(res){
          $('#ans').html(res);
        }
      })
    })
    </script>

