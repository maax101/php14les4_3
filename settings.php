<?php
session_start();
function auth(){
    if (isset($_SESSION['user'])) {
        return true;
    }
}

try {
    $task = new PDO("mysql:host = localhost;dbname=belous", "belous", "neto1253", array(PDO::ATTR_PERSISTENT => true));
} catch (PDOException $e) {
    $e -> getMessage();
}








$utf = $task->query("SET NAMES 'utf8';");
$sql = 'SELECT *FROM task';

if (isset($_POST['save']) && !empty($_POST['description'])){
	$insert = 'INSERT INTO `task` (`user_id`, `description`, `is_done`, `date_added`)
	VALUES (:user_id, :description, 0, now())';
	$insert_st = $task -> prepare($insert);
	$insert_st -> execute (
        [':description' => $_POST['description'],
        ':user_id' => $_SESSION['user']]);
    unset($_POST['description']);
}

if (isset($_POST['sort']) && !empty($_POST['sort_by'])){
	$sql .= ' ORDER BY '.$_POST['sort_by'].' ';
}

if (isset ($_GET['action']) && $_GET['action'] == 'delete'){
	$del = 'DELETE FROM `task` WHERE id = :id';
	$del_st = $task -> prepare($del);
	$del_st ->execute ([':id' => $_GET['id']]);
}
function show_data ($task,$sql){
foreach ($task->query($sql) as $row) {    
echo 
'<tr>
    <td>' . $row['description'] . '</td>
    <td>' . $row['date_added'] . '</td>
    <td>' . $row['is_done'] . '</td>
    <td> 
        <a href="edit.php?id='.$row['id'].'&action=edit">Изменить</a>
        <a href=?id='.$row['id'].'&action=done>Выполнить</a>
        <a href=?id='.$row['id'].'&action=delete>Удалить</a>
    </td>
</tr>';
}
}

// if (isset ($_GET['action']) && $_GET['action'] == 'edit'){
//     $edit = 'UPDATE `tasks` SET `description` = :description, WHERE `id` = :id';
//     $edit = $tasks -> prepare($edit);
//     $edit_st ->execute ([':id' => $_GET['id']], [':description' => $_POST['description']]);
// }
?>
