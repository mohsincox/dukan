<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	</head>
	<body>
	<form>
		First name:<br>
	 	<input type="number" name="firstname" id="first" oninput="myFunc()"  value="5"><br>
		Last name:<br>
		<input type="number" name="lastname" id="last" oninput="myFunc()" ><br>
		Result:<br>
		<input type="number" name="r" id="result">
	</form>
	</body>
	<script>
		function myFunc()
		{
			var a = Number($('#first').val());
			var b = Number($('#last').val());
			var c = a*b;
			//console.log(a);
			$('#result').val(c);
		}
	</script>
</html>
