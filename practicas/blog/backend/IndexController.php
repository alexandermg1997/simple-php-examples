<?php
require_once '../backend/Connection.php';

class IndexController
{
    function IndexController()
    {
        require "../views/index.view.php";
    }
}

$index = new IndexController();
$index->IndexController();

//$db = Connection::getConnection();