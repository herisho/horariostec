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
    if (isset($_POST['id'])) {   
        $db->update('registros', ['llego'=>'1'], ["id" => $_POST['id']]);
        $db->update('cambios', ['timestamp'=>time()], ["tipo" => "llego"]);
    }
}

?>