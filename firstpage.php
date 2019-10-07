<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,700">
</head>

<style type="text/css">
.navBar ul {
	list-style-type: none;
	margin:0;
	padding:0;
	overflow: hidden;
	background-color: black ;
}
.navBar li{
	display: inline;
	float: left;
	position: relative;
}

.navBar li a{
	color:white;
	display: block;
	text-align: center;
	padding: 14px 20px;
	text-decoration: none;
}

.navBar li a:hover {
	background-color: gray;
}

.selector{
	opacity: 2;
	font-size: 30px;
}

.selector label{
	border: 3px solid white;
	background-color: black;/*#dc50fb*/;
	color: white;
	padding: 10px 15px;
}

.selector table{
	border-spacing: 30px;
}

.selector button{
	font-size: 25px;
	padding: 10px 15px;
	background-color: black; /* Green */
    border: none;
    color: white;
}
.selector select{
	/*border-color: blue;*/
	border-width: 5px;
	font-size: 20px;
	padding: 10px;
}

</style>

<body style="background-image: url(startup-1920.jpg);font-family: 'Raleway'">
	<h1 style="text-align: center;color: white;">Laptop Finder</h1>
<div class="navBar">	
	<ul>
		<li><a href="firstpage.php">Home</a></li>
		<li><a href="adv.php">Advanced Search</a></li>
		<li><a href="about.html">About</a></li>
		<li style="float: right;">
			<a href="adminlogin.html">Admin login</a>
		</li>
		<li style="float: right;padding: 12px 16px;">
			<form action="search.php" method="get">
				<input type="text" name="Search" placeholder="Search">
				<button>Submit</button>
			</form>
		</li>
	</ul>
</div>

<br>
<br>

<div class="selector">
	<table align="center">
		<tr>
			<form class="formc" action="compPros.php" method="get">
				<td>
					<label>Browse By Company</label>
				</td>
				<td class="tabdrp">
						<?php 
						require_once('mysql_connect.php');
						$sql = 'SELECT * from company order by(c_name)';
						$result = mysqli_query($dbc,$sql) or die("bad SQL:$sql");
						 $opt="<select name='comp'>";
						 $opt.="<option selected='' selected disabled hidden>------------Choose here------------</option>";
						while($row=mysqli_fetch_assoc($result))
						 {
						 	$opt.="<option value='{$row['c_name']}'>{$row['c_name']}</option>";
						 }
						$opt.="</select>";
						echo $opt;
					
					 ?>	
				</td>

				<td>
					<button>Search</button>
				</td>
			</form>
		</tr>
		<tr>
			<form action="procProc.php" method="get">
				<td>
					<label>Browse By Processor</label>
				</td>
				<td>
						<?php 
						require_once('mysql_connect.php');
					$sql = 'SELECT p_name FROM processor order by(p_name)';
					$result = mysqli_query($dbc,$sql) or die("bad SQL:$sql");
					 $opt="<select name='proc'>";
					 $opt.="<option selected='' selected disabled hidden>------------Choose here------------</option>";
					while($row=mysqli_fetch_assoc($result))
					 {
					 	$opt.="<option value='{$row['p_name']}'>{$row['p_name']}</option>";
					 }
					$opt.="</select>";
					echo $opt;
					 ?>	
				</td>

				<td>
					<button>Search</button>
				</td>
			</form>	
		</tr>
		<tr>
			<form action="graphProc.php" method="get">
				<td>
					<label>Browse By Graphics</label>
				</td>
				<td>
					<?php 
						require_once('mysql_connect.php');
					$sql = 'SELECT g_name FROM graphicscard order by(g_name)';
					$result = mysqli_query($dbc,$sql) or die("bad SQL:$sql");
					 $opt="<select name='graph'>";
					 $opt.="<option selected='' selected disabled hidden>------------Choose here------------</option>";
					while($row=mysqli_fetch_assoc($result))
					 {
					 	$opt.="<option value='{$row['g_name']}'>{$row['g_name']}</option>";
					 }
					$opt.="</select>";
					echo $opt;
					$dbc->close();
					 ?>		
				</td>
				<td>
					<button>Search</button>
				</td>
			</form>
		</tr>
	</table>
</div>
</body>
</html>