<?php
error_reporting(0);
// TODO: Requerimientos

require_once('../models/cliente.model.php');

$Cliente = new clienteModel;

switch ($_GET['op']) {
    case 'todos1':
        $todos = array();
        $datos = $Cliente->todos1();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;

        case 'todos2':
            $clienteID = isset($_GET['clienteID']) ? $_GET['clienteID'] : null;
            $todos = array();
            
            // Puedes usar $clienteID en tu lógica para filtrar la consulta según tus necesidades.
            
            $datos = $Cliente->todos2($clienteID);
            
            while ($fila = mysqli_fetch_assoc($datos)) {
                $todos[] = $fila;
            }
            
            echo json_encode($todos);
            break;

 
        case 'insertar':
                    $correo=$_POST['Correo'];
                    $contrasena=$_POST['Contrasena'];
                    $nombre=$_POST['Nombre'];
                    $ciudad=$_POST['Ciudad'];
                    $pais=$_POST['Pais'];
                    $direccion=$_POST['Direccion'];
                    $telefono=$_POST['Telefono'];
                    
                    
                    
                    $datos = array();


                    
                    // Inserta al cliente en la base de datos
                    $datos = $Cliente->InsertarR($correo, $contrasena, $nombre, $ciudad, $pais, $direccion, $telefono);
                    echo json_encode($datos);
                    
                    break;
}
