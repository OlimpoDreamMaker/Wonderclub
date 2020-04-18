<?php

  require_once("datosBD.php");
  require_once("conexion.php");
    $conexion = mysqli_connect('localhost', 'root', '', 'wonderclub');

    $idCliente = $_GET['id'];

    $sqlDeleteCliente = "DELETE FROM clientes WHERE id_cliente='$idCliente'";

    mysqli_query($conexion, $sqlDeleteCliente);

    $desconectar = mysqli_close($conexion) or die("Ocurrio un error");
    header("Location: ../pages/clientes.php");

?>