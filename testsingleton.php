<?php
require 'Db.class.php';
require 'Conf.class.php';
$bd=Db::getInstance();
$sql='SELECT * FROM trabajador';
$stmt=$bd->ejecutar($sql);
$filas=$bd->obtener_filas($stmt);
foreach ($filas as $fila)
{
echo $fila['nombre'] . "<br>";
}
?>