<?php 
require_once 'settings.php'; 
if (!empty($_POST['login']) && !empty($_POST['password1']) && $_POST['password1'] == $_POST['password2']) {	
	
	$ins_user = 'INSERT INTO `user` (`login`, `password`) VALUES (:login, :password)';
	$add_user = $task -> prepare ($ins_user);
	$add_user -> execute ([':login' => $_POST['login'], ':password' => $_POST['password2']]);
	
	$_SESSION ['user'] = $_POST['login'];
	header('Location: index.php');
	
}
	



?>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<form action="" method="post">
		<br><input type="text" name="login" placeholder="Логин"><br>
		<br><input type="password" name="password1" placeholder="Пароль"><br>
		<br><input type="password" name="password2" placeholder="Пароль еще раз"><br>
		<br><input type="submit" name="" value="Зарегистрироваться">
	</form>
	
</body>
</html>
