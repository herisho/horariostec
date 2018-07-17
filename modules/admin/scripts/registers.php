<?php

// If you installed via composer, just use this code to requrie autoloader on the top of your projects.
require('../../../vendor/autoload.php');
 
// Using Medoo namespace
use Medoo\Medoo;

// Initialize
$db = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'id5758812_horariostec',
    'server' => 'localhost',
    'username' => 'id5758812_horariostec',
    'password' => 'horariostec'
]);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['IdEdit'];
    // var_dump($id);
    $_POST['paso'] = (isset($_POST['paso']))? '1':'0';
    $_POST['llego'] = (isset($_POST['llego']))? '1':'0';

    if (isset($_POST['isNew']) && $_POST['isNew'] == 'true') {   
        unset($_POST['IdEdit']);
        unset($_POST['isNew']);
        $_POST['turno'] = substr($_POST['turno'], 0, 10) . ' ' . substr($_POST['turno'], 11, 16) . ':00';
        // var_dump($_POST);
        $db->insert('registros', $_POST);
        $id = $db->select('registros', 'id', ['matricula' => $_POST['matricula']]);
        $_POST['id'] = $id[0];
        $ret = json_encode($_POST);
        echo($ret);

    } else if (isset($_POST['isNew']) && $_POST['isNew'] == 'false') { 
        unset($_POST['IdEdit']);
        unset($_POST['isNew']);
        $_POST['turno'] = substr($_POST['turno'], 0, 10) . ' ' . substr($_POST['turno'], 11, 16) . ':00';
        // var_dump($_POST);
        $db->update('registros', $_POST, ["id" => $id]);
        $_POST['id'] = $id;
        $ret = json_encode($_POST);
        echo($ret);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id']) && $_GET['id'] != '') {
        $registro = $db->get('registros', '*', ["id" => $_GET['id']]);
        $reg = json_encode($registro);
        echo($reg);
    }
}

?>