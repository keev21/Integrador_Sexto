<?php
//TODO: archivos requeridos
require_once('../config/config.php');

//require_once('../models/empleadosroles.model.php');

class clienteModel
{
    public function todos1()
    {
        $con = new ClaseConexion();
        $con=$con->ProcedimientoConectar();
        $cadena = "SELECT * FROM clientes";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    public function todos2($clienteID = null)
    {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();

        // Ajusta la consulta para filtrar por clienteID si se proporciona.
        $filtroClienteID = ($clienteID !== null) ? " WHERE clienteID != $clienteID" : "";
        $cadena = "SELECT * FROM clientes" . $filtroClienteID;

        $datos = mysqli_query($con, $cadena);
        return $datos;
    }

    
   
   
  

public function InsertarR($Correo, $Contrasena, $Nombre, $Ciudad, $Pais, $Direccion, $Telefono) {
    $con = new ClaseConexion();
    $con = $con->ProcedimientoConectar();

     // Encriptar la contraseña utilizando password_hash()
     $contrasenaEncriptada = password_hash($Contrasena, PASSWORD_DEFAULT);

    $cadena = "INSERT INTO `clientes`(`Correo`, `Contrasena`, `Nombre`, `Ciudad`, `Pais`, `Direccion`, `Telefono`) VALUES ('$Correo','$contrasenaEncriptada', '$Nombre', '$Ciudad', '$Pais', '$Direccion', '$Telefono')";
    if (mysqli_query($con, $cadena)) {
        return 'ok';
    } else {
        return mysqli_error($con);
    }
}
 


}