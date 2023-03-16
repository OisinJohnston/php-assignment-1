<!DOCTYPE html>

<html>
	<head>
		<style>
			table, td, th {
				border: solid;
				
			}
		</style>
	</head>
	<body>
		<table>
			<tr>
				<th>id</th>
				<th>firstname</th>
				<th>lastname</th>
				<th>gender</th>
				<th>email</th>
				<th>password</th>
				<th>address 1</th>
				<th>address 2</th>
				<th>eircode</th>
			</tr>
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
				}
				$sql = "SELECT * FROM details;";				
				$result = mysqli_query($conn,$sql);
				while ($row = mysqli_fetch_row($result)) {
					echo "<tr>";
					foreach ($row as $value) {
						echo "<td>".$value."</td>";
					}
					
					echo "</tr>";
				}
				mysqli_close($conn);
			?>
		</table>
	</body>
</html>
