<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		span
		{
			color: red;
			display: none;
		}
	</style>
</head>
<body>



	<form method="post" id="frm">
		<table border="2">
			<tr>
				<td>NAME : - </td>
				<td><input type="text" name="name" id="name"><span>enter your name</span></td>
			</tr>
			<tr>
				<td>EMAIL : - </td>
				<td><input type="email" name="email" id="email"><span>enter your email</span></td>
			</tr>
			<tr>
				<td>PASSWORD : - </td>
				<td><input type="text" name="password" id="password"><span>enter your password</span></td>
			</tr>
			<tr>
				<td>GENDER :-</td>
				<td>
					<input type="radio" name="gender">MALE
					<input type="radio" name="gender">FEMALE
					<span>enter your gender</span>
				</td>
			</tr>
			<tr>
				<td>HOBBY :-</td>
				<td><input type="checkbox" name="hobby">AA<input type="checkbox" name="hobby">BB<input type="checkbox" name="hobby">CC<input type="checkbox" name="hobby">DD<input type="checkbox" name="hobby">EE<span>enter your hobby</span></td>
			</tr>
			<tr>
				<td>CITY :-</td>
				<td>
					<select>
						<option value="" selected disabled>select city</option>
						<option>Surat</option>
						<option>Rakot</option>
						<option>Mummbai</option>
						<option>navsari</option>
					</select>
					<span>enter your city</span>
				</td>
			</tr>
			<tr>
				<td><input type="submit" name="submit"></td>
			</tr> 
			

		</table>
	</form>
	<script type="text/javascript" src="../jquery-3.7.1.min.js"></script>

	<script>
		$('#frm').submit(function(){
			var name = $('#name').val();
			if(name == ''){
				// alert("please enter name");
				$('#name').next('span').css('display','inline');
				return false;
			}
			var email = $('#email').val();
			var e_pat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/

			if(e_pat.test(email)==false) {
				$('#email').next('span').css('display','inline');	
				return false;
			}
			var pass = $('#password').val();
			var p_pat = /^[a-zA-Z0-9!@#\$%\^\&*_=+-]{8,12}/
			if(p_pat)


		})	



	</script>
</body>
</html>