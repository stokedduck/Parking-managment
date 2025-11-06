<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_email = $_POST['email'];
		$user_password = $_POST['pass'];

		if(!empty($user_email) && !empty($user_password))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Log In</title>
	<style type="text/css">
		body{
			/*margin: 0;
			padding: 0;*/
			display: flex;
			justify-content: center;
			align-items: center;
			min-height: 100vh;
			font-family: sans-serif;
			background-color: white;
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
			height: 360px;
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
			border-radius:510px;
			transition: .2s ease-in;
			cursor: pointer;
			box-shadow: 5px 20px 60px black;
		}
		button:hover{
			background: rgb(20, 57, 105);
		}
		label{
			color: darkgrey;
			font-size: 35px;
			justify-content: center;
			display: flex;
			margin: 30px;
			font-weight: bold;
			margin-bottom: 10px;
		}


	</style>
</head>
<body>
	<div class="login_form">
	<form name="myform" method="post">
		<label>Log In</label>
		<input type="email" name="email" placeholder="Email" required>
		<input type="password" name="pass" placeholder="Password" required>
		<button onclick="return validate();">Log In</button>
		<label><p>Don't have an account?<a href="sign_up.php"> Sign Up</a></p></label>
	</form>
	</div>
	<script type="text/javascript">
		function validate(){
		var abc = document.myform.email.value;
		var a2 = document.myform.pass.value;
		
		var eregx = /^\w+([\.-]?)/;
		if (a1.length()<8) {
			alert ("too short");
		}
	};
	</script>
</body>
</html>