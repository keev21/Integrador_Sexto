<?php
require_once('cls_conexion.model.php');
class Clase_Productos
{
// *********************************************************************************
    public function todos()
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT productos.ProductoID, productos.CodigoReferencia, productos.Nombre, productos.Precio, productos.Descripcion, productos.Imagen, productos.CategoriaID, productos.FechaIngreso, productos.Stock, productos.Iva, categorias.Nombre as categorias FROM `productos` inner JOIN categorias on categorias.CategoriaID  = productos.CategoriaID";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }

    public function todos1()
{
    try {
        $con = new Clase_Conectar_Base_Datos();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT p.*, c.Nombre AS NombreCategoria, i.porcentaje AS PorcentajeIva
                   FROM categorias c
                   INNER JOIN productos p ON c.CategoriaID = p.CategoriaID
                   INNER JOIN iva i ON p.Iva = i.id_iva;";
        $result = mysqli_query($con, $cadena);
        return $result;
    } catch (Throwable $th) {
        return $th->getMessage();
    } finally {
        $con->close();
    }
}
// *********************************************************************************
// *********************************************************************************
    public function uno($ProductoID)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `productos` WHERE ProductoID=$ProductoID";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
// *********************************************************************************
public function insertar($CodigoReferencia, $Nombre, $Precio, $Descripcion, $Imagen, $CategoriaID, $FechaIngreso, $Stock, $Iva)
{
    try {
        $con = new Clase_Conectar_Base_Datos();
        $con = $con->ProcedimientoConectar();
        
        // Consulta para obtener el porcentaje de IVA correspondiente al ID proporcionado
        $consulta_iva = "SELECT porcentaje FROM iva WHERE id_iva = $Iva";
        $resultado_iva = mysqli_query($con, $consulta_iva);

        if (!$resultado_iva) {
            throw new Exception("Error al obtener el porcentaje de IVA");
        }

        $fila_iva = mysqli_fetch_assoc($resultado_iva);
        $porcentajeObtenido = $fila_iva['porcentaje'];

        // Cálculo del precio con IVA
        $Precio_Iva = $Precio * ($porcentajeObtenido / 100);
        $Precio_Total = $Precio + $Precio_Iva;

        // Consulta para insertar el producto con el precio total calculado
        $cadena = "INSERT INTO `productos`(`CodigoReferencia`, `Nombre`, `Precio`, `Descripcion`, `Imagen`, `CategoriaID`, `FechaIngreso`, `Stock`, `Iva`) VALUES ('$CodigoReferencia','$Nombre','$Precio_Total','$Descripcion','$Imagen','$CategoriaID','$FechaIngreso','$Stock','$Iva')";
        $result = mysqli_query($con, $cadena);

        if (!$result) {
            throw new Exception("Error al insertar el producto: " . mysqli_error($con));
        }

        return 'ok';
    } catch (Throwable $th) {
        return $th->getMessage();
    } finally {
        // Cierra la conexión
        $con->close();
    }
}
// *********************************************************************************
    public function actualizar($ProductoID, $CodigoReferencia, $Nombre, $Precio, $Descripcion, $Imagen, $CategoriaID, $FechaIngreso, $Stock, $Iva)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            // $cadena = "UPDATE `productos` SET `cedula`='$cedula',`nombre`='$nombre',`apellido`='$apellido',`cargo`='$cargo',`salario`='$salario',`fecha_contratacion`='$fecha_contratacion',`imagen`='$imagen' WHERE ProductoID=$ProductoID";
            $cadena = "UPDATE `productos` SET `CodigoReferencia`='$CodigoReferencia', `Nombre`='$Nombre',`Precio`='$Precio',`Descripcion`='$Descripcion',`Imagen`='$Imagen',`CategoriaID`='$CategoriaID',`FechaIngreso`='$FechaIngreso',`Stock`='$Stock',`Iva`='$Iva'  WHERE `ProductoID`='$ProductoID'";
            $result = mysqli_query($con, $cadena);
            return 'ok';
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
// *********************************************************************************
    public function eliminar($ProductoID)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "DELETE FROM `productos` WHERE ProductoID=$ProductoID";
            $result = mysqli_query($con, $cadena);
            return 'ok';
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }


}