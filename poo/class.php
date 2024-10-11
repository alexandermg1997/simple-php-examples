<?php

abstract class Persona
{
    private $nombre;
    private $apellido;
    private $edad;
    private $sexo;
    private $pais;

    function __construct($nombre, $apellido, $edad, $sexo, $pais)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->edad = $edad;
        $this->sexo = $sexo;
        $this->pais = $pais;
    }

    function mostrarNombre()
    {
        return $this->nombre . ' ' . $this->apellido . '<br>';
    }
}

class Estudiante extends Persona
{
    private $carrera;

    function __construct($nombre, $apellido, $edad, $sexo, $pais, $carrera)
    {
        parent::__construct($nombre, $apellido, $edad, $sexo, $pais);
        $this->carrera = $carrera;
    }

    function mostrarCarrera()
    {
        return $this->carrera . '<br>';
    }
}

class Trabajador extends Persona
{
    private $empresa;

    function __construct($nombre, $apellido, $edad, $sexo, $pais, $empresa)
    {
        parent::__construct($nombre, $apellido, $edad, $sexo, $pais);
        $this->empresa = $empresa;
    }

    function mostrarEmpresa()
    {
        return $this->empresa . '<br>';
    }
}

class Fecha
{
    const meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    private $dia;
    private $mes;
    private $anio;

    function __construct($dia, $mes, $anio)
    {
        $this->dia = $dia;
        $this->mes = $mes;
        $this->anio = $anio;
    }

    function mostrar()
    {
        return $this->dia . '/' . $this->mes . '/' . $this->anio . '<br>';
    }
}

# Al agregar abstract, no se puede instanciar
//$alumno = new Persona('Juan', 'Perez', 25, 'M', 'España');
//$alumno1 = new Persona('Alberto', 'Martinez', 27, 'M', 'Cuba');

$estudiante = new Estudiante('Erasmo', 'Marín', 27, 'M', 'México', 'Ingeniería');
$trabajador = new Trabajador('Erasmo', 'Marín', 27, 'M', 'México', 'Lacsa');

//echo $alumno->mostrarNombre();
//echo $alumno1->mostrarNombre();

echo $estudiante->mostrarNombre();
echo $estudiante->mostrarCarrera();

echo $trabajador->mostrarNombre();
echo $trabajador->mostrarEmpresa();

echo Fecha::meses[1] . '<br>';

$fecha = new Fecha(1, 1, 2022);
echo $fecha->mostrar();
?>

