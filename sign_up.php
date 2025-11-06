<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_email = $_POST['email'];
		$user_name = $_POST['user'];
		$user_password = $_POST['pass'];

		if(!empty($user_email) && !empty($user_name) && !empty($user_password))
		{

			//save to database
			// $user_id = random_num(20);
			$query = "insert into users (Email,Username,Password) values ('$user_email','$user_name','$user_password')";

			mysqli_query($con, $query);

			header("Location: post-login_index.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign Up</title>
	<style type="text/css">
		body{
			/*margin: 0;
			padding: 0;*/
			display: flex;
			justify-content: center;
			align-items: center;
			min-height: 100vh;
			font-family: sans-serif;
			background: white;
		}
		input{
			width: 60%;
			height: 20px;
			background: white;
			justify-content: center;
			display: flex;
			margin: 18px auto;
			padding: 10px;
			border: none;
			outline: none;
			border-radius: 50px;
		}

		.login_form{
			height: 420px;
			background: #eed;
			border-radius: 20px;
			margin: 00px;
			text-align: center;
		}
		button{
			width: 60%;
			height: 40px;
			margin: 10px auto;
			justify-content: center;
			display: block;
			color: white;
			background: rgb(43, 83, 194);
			font-size: 20px;
			font-weight: bold;
			margin-top: 18px;
			outline: none;
			border: none;
			border-radius: 50px;
			transition: .2s ease-in;
			cursor: pointer;
			box-shadow: 5px 20px 60px black;
		}
		button:hover{
			background: rgb(20, 57, 105);
		}
		label{
			color: darkgray;
			font-size: 35px;
			justify-content: center;
			display: flex;
			margin: 30px;
			font-weight: bold;
			margin-bottom: 10px;
	</style>
</head>
<body>
	<div class="login_form">
	<form name="myform" method="post">
		<label>Sign Up</label>
		<input type="email" name="email" placeholder="Email" required>
		<input type="text" name="user" placeholder="Username" required>
		<input type="password" name="pass" placeholder="Password" required>
		<button onclick="return validate();">Sign Up</button>
		<label><p>Already have an account?<a href="login.php"> Log In</a></p></label>
	</form>
	</div>
	<script type="text/javascript">
		function validate(){
			var usr= document.myform.user.value;
			var psw= document.myform.pass.value;
			if(user.length()<8){
			alert("Type some more");
			}
			var pregx = /^[A-Za-z]\w{7,14}$/;
			if (pregx.test(psw)) {
			alert("invalid");
			}
		}
	</script>
</body>
</html>