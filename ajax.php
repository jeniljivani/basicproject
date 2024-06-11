<?php 

	$con = mysqli_connect("localhost","root","","formdata");

	$sql = "select * from `ajaxdata`";
	$res_data = mysqli_query($con , $sql);

?>


 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title></title>
 	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 </head>
 <body id="body">
 
 	<form method="post" id="data" enctype="multipart/form-data">
 		<table>
 			<tr>
 				<th>Name :-</th>
 				<td><input type="text" name="name" id="name"></td> 	
 			</tr>
 			<tr>
 				<th>Email :-</th>
 				<td><input type="email" name="email" id="email"></td> 				
 			</tr>
 			<tr>
 				<th>image :-</th>
 				<td><input type="file" name="image" id="image"></td> 				
 			</tr>
 			<tr>
 				<td><input type="submit" name="submit" value="click here"></td> 				
 			</tr>
 		</table>
 	</form>

<table border="1" class="table">
	<tr>
		
		<th>ID</th>
		<th>Name</th>
		<th>Email</th>
		<th>image</th>
		<th>Delete</th>
		<th>Updata</th>
	</tr>

	
	<tbody id="ans">

<?php
	while($data = mysqli_fetch_assoc($res_data))
	{
 ?>
 	s<tr>
 		<td><?php echo @$data['id'] ?></td>
 		<td><?php echo @$data['name'] ?></td>
 		<td><?php echo @$data['email'] ?></td>
 		<td><img style="width: 100px" src="image/<?php echo @$data['image']; ?>"></td>
 		<td><a href="javascript:void(0)" class="delete" attr-id= <?php echo $data['id'] ?>>Delete</a> </td>
 		<td><a href="javascript:void(0)" class="updata" attr-id= <?php echo $data['id'] ?>>Updata</a> </td>
 	</tr>
<?php  
	}
?>
	</tbody>

</table>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">UPDATA FORM</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" id="u_form">
	    <div class="modal-body">
	    	<input type="hidden" name="u_id" id="u_id"><br>
	    	Name :- <input type="text" name="u_name" id="u_name"><br>
	    	Email :- <input type="email" name="u_email" id="u_email"><br>   	
	    	image :- <input type="file" name="u_image" id="u_image">	    	
	    </div>
      	<div class="modal-footer">
      		<input type="submit" class="btn btn-primary" value="save">
	    </div>
	  </form>
    </div>
  </div>
</div>

 </body>
 </html>

<script type="text/javascript" src="../jquery-3.7.1.min.js"></script>
<!--************ AJAX ************-->
<script>

	$(document).ready(function() {
		$('#data').submit(function(e) {
			e.preventDefault();
			
			var formdata = new FormData(this);		
			console.log(formdata);
			$.ajax({
				type:"POST",
				data:formdata, 
				url:"ajax_insert.php",
				processData: false,
        contentType: false,	
				success:function(res) {
					$('#name').val('');
					$('#email').val('');
					$('#image').val('');
					$('#ans').html(res);
					console.log(res);
				}			
			});
		});

		$(document).on('click','.delete',function() {
			var id = $(this).attr("attr-id")

			$.ajax({
				type:'POST',
				url:"ajax_delete.php",
				data:{"id":id},
				success:function(res){
					$('#ans').html(res);
				}
			})
		})

		$(document).on('click','.updata',function() {
			var id = $(this).attr("attr-id")
			$.ajax({
				type:"get",
				url:"ajax_update.php",
				dataType:"json",
				data:{"uid":id},
				success:function(res){
					$('#u_name').val(res.name);
					$('#u_email').val(res.email);
					$('#u_id').val(res.id);
					$("#exampleModal").modal("show");
				}
			})
		})
		$(document).on('submit','#u_form',function(e) {
			e.preventDefault();			
				var formdata = new FormData(this);	
			$.ajax({
				type:'post',
				url:'ajax_update.php',
				data:formdata,
				processData: false,
        contentType: false,	
				success:function(res) {
					$('#ans').html(res);
					$('#exampleModal').modal('hide');
				}
			})
		}) 
	})

</script>
