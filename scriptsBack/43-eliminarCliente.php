<?php

    require_once("conexion.php");
    $conexion = conectarBD();

    $idCliente = $_GET['id'];

    $sqlDeleteCliente = "DELETE FROM clientes WHERE id_cliente='$idCliente'";

    mysqli_query($conexion, $sqlDeleteCliente);

    $desconectar = desconectarBD($conexion);
    header("Location: ../pages/clientes.php");

?>