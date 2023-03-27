<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<?php
		function validate_input($data, $conn) {
			$data = trim($data); // Remove unnecessary whitespace
			$data = stripslashes($data); // Remove unnec
			$data = htmlspecialchars($data); // convert special characters to html
			$data = mysqli_real_escape_string($conn, $data);
			return $data;
		}

		$fields = ['firstname', 'surname', 'email', 'password', 'addr1', 'addr2', 'eircode', 'gender'];
		$values = array();


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
		$sql = "
			DROP TABLE details;
			CREATE TABLE IF NOT EXISTS details (
				id INT AUTO_INCREMENT PRIMARY KEY,
				firstname CHAR(50),
				lastname CHAR(50),
				gender ENUM('male', 'female', 'other'),
				email CHAR(255),
				password CHAR(64),
				address_1 VARCHAR(80),
				address_2 VARCHAR(80),
				eircode CHAR(7)
			);
		";
		if (mysqli_query($conn, $sql)) {
			echo "Created table successfully <br/>";
		} else {
			echo "Failed to create the table <br/>". mysqli_error($conn);

		}

		foreach($fields as &$field) {
			if(!empty($_POST[$field])) {
				$values[$field]=validate_input($_POST[$field], $conn);
			} else {
				echo "Didn't find symbol $field ";
				exit();
			}
		}

		$sql = "INSERT INTO details(firstname, lastname, gender, email, password, address_1, address_2, eircode) VALUES('".$values['firstname']."', '".$values['surname']."', '".$values['gender'] ."', '".$values['email']."','".$values['password']."', '".$values['addr1']."', '".$values['addr2']."', '".$values['eircode']."')";
			
		echo $sql;

		if (mysqli_multi_query($conn,$sql)){ 
			echo "Inserted Data Successfully <br/>";
		} else {
			echo "Failed to insert data<br/>". mysqli_error($conn);
		}
		mysqli_close($conn);
		?>
		<a href="./users.php"><button>User List</button></a>

	</body>

</html>
