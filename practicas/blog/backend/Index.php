<?php
require_once '../backend/Connection.php';

class Index
{
    function index()
    {
        require "../views/index.view.php";
    }
}

$index = new Index();
$index->index();

//$db = Connection::getConnection();