<?php

// If you installed via composer, just use this code to requrie autoloader on the top of your projects.
require 'vendor/autoload.php';
 
// Using Medoo namespace
use Medoo\Medoo;

// Initialize
$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'id5758812_horariostec',
    'server' => 'localhost',
    'username' => 'id5758812_horariostec',
    'password' => 'horariostec'
]);
 
// Enjoy
$database->insert('hello_world', [
    'item' => 'foo'
]);			

?>