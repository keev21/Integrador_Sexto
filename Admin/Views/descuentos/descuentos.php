<?php
require_once('../html/head2.php');
require_once "../../Models/model.conexion.php";
?>

<div class="row">
    <div class="card w-100">
        <div class="card-body p-4">
            <h5 class="card-title fw-semibold mb-4">Lista de Productos</h5>
            <div class="table-responsive">
                <button type="button" type="hidden" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_categoria" hidden>
                    Nueva Categoria
                </button>
                <br>
                <br>
                <h5 >Selecciona los productos para aplicar un descuento</h5>
                <br>
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Seleccionar</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">ProductoID</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nombre</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Precio</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Descuento</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Opciones</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tabla_producto">
                            <?php
                            // Realizar la consulta SQL para seleccionar todos los productos
                            $query = "SELECT `ProductoID`, `Nombre`, `Precio` FROM `productos`";
                            $resultado = mysqli_query($conexion, $query);

                            // Verificar si hay resultados
                            if (mysqli_num_rows($resultado) > 0) {
                                // Mostrar los productos en la tabla HTML
                                while ($fila = mysqli_fetch_assoc($resultado)) {
                                    echo "<tr>";
                                    echo '<td> <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                  
                                </label>
                              </div> </td>';
                                    echo "<td>" . $fila['ProductoID'] . " </td>";
                                    echo "<td>" . $fila['Nombre'] . "</td>";
                                    echo "<td>" . $fila['Precio'] . "</td>";
                                    echo "<td> Poner aqui el descuento </td>";
                                    echo '<td><button type="button" class="btn btn-warning">Quitar descuento</button> </td>';
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='3'>No se encontraron productos.</td></tr>";
                            }

                            // Liberar el resultado
                            mysqli_free_result($resultado);
                            ?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="CodigoReferencia">Descuento (%) *</label>
    <input type="text" required class="form-control" id="Descuento" name="Descuento" style="width: 150px;" maxlength="20" pattern="^[0-9.]+$">
</div>
<br>

<button type="button" class="btn btn-primary">Guardar</button>



    <?php require_once('../html/script2.php') ?>