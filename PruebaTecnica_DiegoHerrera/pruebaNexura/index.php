<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prueba técnica NEXURA</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <div class="container">
        <h1>Lista de empleados</h1>
        <div class="row">
            <div class="col-sm-12">
                <div class="card bg-light mb-3">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <section class="text-right">
                                    <span class="btn btn-primary btn-sm" data-toggle="modal" data-target="#nuevoEmpleado" id="btnNuevo">
                                        <i class="fas fa-user-plus"></i> Crear
                                    </span>
                                </section>
                                <div id="infoBase">
                                    <!-- Información de la base de datos -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <strong>Prueba técnica NEXURA INTERNACIONAL</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Nuevo Empleado -->
    <div class="modal fade" id="nuevoEmpleado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Empleado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmnuevoEmpleado">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="nombre">Nombre completo*</label>
                                <input type="text" name="nombre" id="nombre" class="form-control form-control-sm" require>
                                <label for="correo">Correo electrónico*</label>
                                <input type="text" name="correo" id="correo" class="form-control form-control-sm" require>
                                <label for="sexo">Sexo*</label>
                                <input type="radio" name="sexo" id="sexo" value="m" require> Masculino 
                                <input type="radio" name="sexo" id="sexo" value="f" require> Femenino <br>
                                <label for="area">Área*</label>
                                <select name="area" id="area" class="form-control form-control-sm" require>
                                    <option value="1">Ventas</option>
                                    <option value="2">Calidad</option>
                                    <option value="3">Producción</option>
                                </select>
                                <label for="descripcion">Descripción*</label>
                                <textarea name="descripcion" id="descripcion" cols="40" rows="3" class="form-control form-control-sm" placeholder="Descripción de la experiencia del empleado" require></textarea>
                                <input type="checkbox" name="boletin" id="boletin" require> Deseo recibir boletin informativo <br>
                                <label for="rol">Roles*</label> <br>
                                <input type="radio" name="rol" id="rol" value="1"> Profesional de proyectos - Desarrollador <br>
                                <input type="radio" name="rol" id="rol" value="2"> Gerente estratégico <br>
                                <input type="radio" name="rol" id="rol" value="3"> Auxiliar administrativo <br>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" onclick="nuevoEmpleado();nuevoEmpleado_rol();">Guardar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal actualizar Empleado -->
    <div class="modal fade" id="actualizarEmpleado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Empleado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmactualizarEmpleado">
                        <div class="row">
                            <div class="col-8 col-sm-12">
                                <input type="text" name="act_id" id="act_id" hidden>
                                <label for="act_nombre">Nombre completo*</label>
                                <input type="text" name="act_nombre" id="act_nombre" class="form-control form-control-sm" require>
                                <label for="act_correo">Correo electrónico*</label>
                                <input type="text" name="act_correo" id="act_correo" class="form-control form-control-sm" require>
                                <label for="act_sexo">Sexo*</label>
                                <input type="radio" name="act_sexo" id="act_m" value="m" require> Masculino 
                                <input type="radio" name="act_sexo" id="act_f" value="f" require> Femenino <br>
                                <label for="act_area">Área*</label>
                                <select name="act_area" id="act_area" class="form-control form-control-sm" require>
                                    <option value="ventas">Ventas</option>
                                    <option value="calidad">Calidad</option>
                                    <option value="produccion">Producción</option>
                                </select>
                                <label for="act_descripcion">Descripción*</label>
                                <textarea name="act_descripcion" id="act_descripcion" cols="40" rows="3" class="form-control form-control-sm" placeholder="Descripción de la experiencia del empleado" require></textarea>
                                <input type="checkbox" name="act_boletin" id="act_boletin" require> Deseo recibir boletin informativo <br>
                                <label for="act_rol">Roles*</label> <br>
                                <input type="radio" name="act_rol" id="act_rol1" value="1"> Profesional de proyectos - Desarrollador <br>
                                <input type="radio" name="act_rol" id="act_rol2" value="2"> Gerente estratégico <br>
                                <input type="radio" name="act_rol" id="act_rol3" value="3"> Auxiliar administrativo <br>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" onclick="editarEmpleado()">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>

</body>
<footer>
    <script src="js/jquery-3.4.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://kit.fontawesome.com/6cf008c4c6.js"></script>
    <script src="js/funciones.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            mostrarEmpleado();
        })
    </script>
</footer>

</html>