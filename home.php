<?php 
	session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Cadastrar Vários Registros</title>
</head>
<body>
	<h1>Cadastrar</h1>
	<?php 
		if(isset($_SESSION['msg'])) {
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		} else {
			echo "sem seseinon";
		}
	?>

	<form action="process.php" method="post">
		<div id="form">
			<div class="form__group">
				<label>Nome:</label>
				<input type="text" name="nome[]" id="nome" placeholder="nome">

				<label>Email:</label>
				<input type="email" name="email[]" id="email" placeholder="email">

				<button type="button" onclick="addCampo()"> + </button>
			</div>
		</div>
		<div class="form__group">
			<input type="submit" name="cadUser" value="Register">
		</div>	
		
	</form>

	<script src="./script.js"></script>
</body>
</html>