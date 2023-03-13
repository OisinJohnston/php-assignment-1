<!DOCTYPE html>
<html>
	<head>
		<script>
			function validate() {
				var requiredElements = ["firstname", "surname", "email", "password", "passwordConfirm", "addr1", "addr2", "eircode"]
				var success = true

				requiredElements.forEach((a) => {
					if (document.getElementById(a).value == "") {
						success = false	
					}
				})

				if (!success) {
					alert("Some input fields are unfilled")
					return false
				}

				
				if (document.querySelector('input[name="gender"]:checked')===null) {
					alert("Select a gender")
					return false
				}

				if (document.getElementById("password").value !== document.getElementById("passwordConfirm").value) {
					alert("Passwords don't match")
					return false
				}
				
				document.getElementById('userform').addEventListener('formdata', (e) => {
					var formData = e.formData;
					formData.delete('gender');	
					formData.set('gender', document.querySelector('input[name="gender"]:checked').id);
				});

				return true
			}
		</script>
	</head>
	<body>
		<form action="submit.php" method="post" onsubmit="return validate()" id="userform">
			<label for="firstname">First Name</label><br/>
			<input type="text" id="firstname" maxlength="50" name="firstname"><br/>
			
			<label for="surname">Second Name</label><br/>
			<input type="text" id="surname" maxlength="50" name="surname"><br/>
			
			<label for="email">Email</label><br/>
			<input type="text" id="email" maxlength="320" name="email"><br/>
			
			<label for="password">Password:</label><br/>
			<input type="password" id="password" maxlength="64" name="password"><br/>
			
			<label for="passwordConfirm">Confirm Password:</label><br/>
			<input type="password" id="passwordConfirm"><br/>

			<fieldset>
				<legend>Gender:</legend>
				<input type="radio" id="male" name="gender">
				<label for="male">Male</label>
				
				<input type="radio" id="female" name="gender">
				<label for="female">Female</label>

				<input type="radio" id="other" name="gender">
				<label for="other">Other</label>
			</fieldset>
			<label for="addr1">Address Line 1:</label><br/>
			<input type="text" id="addr1" name="addr1"><br/>
			<label for="addr2">Address Line 2:</label><br/>
			<input type="text" id="addr2" name="addr2"><br/>
			<label for="eircode">Eircode:</label><br/>
			<input type="text" id="eircode" maxlength="7" name="eircode"><br/>
			<button type="submit">Submit</button><br/>
		</form>	
	</body>
</html>
