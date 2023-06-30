<?php
include_once('../../config/sesiones.php');
if (isset($_SESSION["ID_guia"])) {
    $_SESSION["ruta"] = "ID_guia";
?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
    <?php require_once('../html/head.php')  ?>
    </head>
    <body id="page-top">
        <div id="wrapper">
            <!-- Sidebar -->
            <?php require_once('../html/menu.php')  ?>
            <!-- End of Sidebar -->
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <!-- Topbar -->
                 
                    <!-- End of Topbar -->

                    <div class="container-fluid">

                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 mb-4">

                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Lista de Guias</h6>
                                        
                                        <button onclick="cargaSelectRoles()" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalUsuarios"> Nuevo Usuario</button>
                                    
                                    </div>
                                    <div class="card-body">
                                        <table width="100%" cellspacing="0" class="table table-bordered table-striped table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nombres</th>

                                                </tr>
                                            </thead>
                                            <tbody id='TablaGuias'></tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Ventanas Modales -->
                <div class="modal fade" id="modalGuias" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="titulModalGuias">Ingresar Guias</h5>
                                <button type="button" onclick="limpiar()" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                            </div>
                            <form id="usuarios_form">
                                <div class="modal-body">
                                    <input type="hidden" name="ID_guia" id="ID_guia">
                                    <div class="form-group">
                                        <label for="Nombres" class="control-label">Nombres</label>
                                        <input type="text" name="Nombre" id="Nombre" class="form-control" required>
                                    </div>
                                    

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    <button type="button" class="btn btn-secondary" onclick="limpiar()" data-dismiss="modal">Cerrar</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>





                <!-- Footer -->
                <?php require_once('../html/footer.php')  ?>
                <!-- End of Footer -->
            </div>
        </div>
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
        <!--scripts-->
        <?php require_once('../html/scripts.php')  ?>
        <script src="./usuarios.js"></script>
    </body>

    </html>


<?php
} else {
    header('Location:../../index.php');
}
?>