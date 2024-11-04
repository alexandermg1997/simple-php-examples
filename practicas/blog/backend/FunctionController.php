<?php

class FunctionController
{

    public function limpiarDatos($texto): string
    {
        return htmlspecialchars(strip_tags(trim($texto)), ENT_QUOTES);
    }

    
}