<?php

class FunctionController
{
    public function limpiarDatos(string $texto): string
    {
        return htmlspecialchars(strip_tags(trim($texto)), ENT_QUOTES);
    }
}