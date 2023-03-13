<!DOCTYPE html>

<html>
	<head>
	</head>
	<body>
		<table>
			<?php
				$host = "localhost";
				$username = "OJ";
				$password = "password";
				$database = "oj_database";
				$port = 3307;
				$conn = mysqli_connect($host, $username, $password, $database, $port);
				if (mysqli_connect_errno()) {
					echo "Failed to connect to database: ".mysqli_connect_error()."<br/>";
					exit();
				} else {
					echo "Connected Successfully <br/>";
				}
				$sql = "SELECT * FROM details;";
				$result = mysqli_query($conn,$sql);
				print_r($result);
				while ($row = mysqli_fetch_row($result)) {
					echo "<tr>";
				}
				mysqli_close($conn);
			?>
		</table>
	</body>
</html>
