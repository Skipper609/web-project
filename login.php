<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login to continue</title>
    <link rel="stylesheet" href="css/signin.css">
    <link rel="stylesheet" href="css/common.css">
</head>
<body>
<div class="login">
	<h4>Admin login</h4>
	<form action="authenticate.php" method="get">
		<input type="text" name="uname" placeholder="Username" required>
		<br>
		<input type="Password" name="pword" placeholder="Password" required>
        <br>
        <?php
            if(isset($_SESSION["login_err"])){
                echo "<p class='err'>Username or Password is Wrong</p>";
            }
        ?>
		<button>Submit</button>
    </form>	
    <a href="signup.html">Dont have an account?</a>
</div>
</body>
</html>