<?php
require_once 'settings.php';
if (!auth()) {
	header('Location: login.php');	
}

$user = $_SESSION['user'];
echo "HI, $user !";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>TODO</title>
</head>
<body>
	<style>
    table { 
        border-spacing: 0;
        border-collapse: collapse;
    }

    table td, table th {
        border: 1px solid #ccc;
        padding: 5px;
    }
    
    table th {
        background: #eee;
    }
</style>

<h1>Список дел на сегодня</h1>
<div style="float: left">
    <form  method="POST">
    <label for="save">Новая задача:</label>
        <input type="text"  name="description" placeholder="Описание задачи" value="" />
        <input type="submit" name="save" value="Добавить" />
    </form>
</div>
<div style="float: left; margin-left: 20px;">
    <form method="POST">
        <label for="sort">Сортировать по:</label>
        <select name="sort_by">
            <option value="date_added">Дате добавления</option>
            <option value="is_done">Статусу</option>
            <option value="description">Описанию</option>
        </select>
        <input type="submit" name="sort" value="Отсортировать" />
    </form>
</div>
<div style="clear: both"></div>
<br>
<table>
    <tr>
        <th>Описание задачи</th>
        <th>Дата добавления</th>
        <th>Статус</th>
        <th></th>
    </tr>
    <?php  show_data($task,$sql)?>


</table>
</body>
</html>