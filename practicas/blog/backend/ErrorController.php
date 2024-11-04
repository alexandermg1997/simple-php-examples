<?php
require_once '../backend/Connection.php';

class ErrorController
{
    function ErrorView(): void
    {
        require "../views/error.view.php";
    }
}

$error = new ErrorController();

$error->ErrorView();