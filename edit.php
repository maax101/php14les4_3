<?php 
require_once 'settings.php';
print_r($_POST);
if (isset ($_GET['action']) && $_GET['action'] == 'edit'){
    $edit = 'UPDATE `tasks` SET `description` = :description, WHERE `id` = :id';
    $edit = $tasks -> prepare($edit);
    $edit_st ->execute ([':id' => $_GET['id']], [':description' => $_POST['description']]);
}
?>
<form  method="POST">
    <label for="save">Изменить задачу:</label>
        <input type="text"  name="description" placeholder="Описание задачи" value="" />
        <input type="submit" name="save" value="Добавить" />
    </form>