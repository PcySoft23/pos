 <?php 
  if($_SESSION["perfil"]== "Especial" || $_SESSION["perfil"]== "Vendedor"){
    echo '<script>
            window.location="inicio";
          </script>'; 
    return;
  }
 ?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Administrar Usuarios
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Administrar Usuarios</li>
      </ol>
    </section>

    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
            Agregar Usuario
          </button>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped tablas dt-responsive" width="100%">
            <thead>
              <tr>
                <th style="width:10px">#</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Foto</th>
                <th>Perfil</th>
                <th>Estado</th>
                <th>Ultimo login</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $item=null;
                $valor=null;
                $usuarios=ControladorUsuarios::ctrMostrarUsuarios($item,$valor);
                foreach ($usuarios as $key => $value) {
                  echo '<tr>
                          <td>'.($key+1).'</td>
                          <td>'.$value["nombre"].'</td>
                          <td>'.$value["usuario"].'</td>';

                          if($value["foto"]!=""){
                            echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';
                          }else{
                            echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';
                          }
                          
                          echo '<td>'.$value["perfil"].'</td>';

                          if($value["estado"]!=0){
                            echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button></td>';
                          }else{
                            echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">Desactivado</button></td>';
                          }
                                                  
                          echo '<td>'.$value["ultimo_login"].'</td>
                          <td>
                            <div class="btn-group">
                              <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-danger"><i class="fa fa-times btnEliminarUsuario" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'" Usuario="'.$value["usuario"].'"></i></button>
                            </div>
                          </td>
                        </tr>';
                }
               ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>

  <!--------------------------------------------------------
    MODAL AGREGAR USUARIO
    ========================================================-->
  <div class="modal fade" id="modalAgregarUsuario" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">

        <form role="form" method="post" enctype="multipart/form-data">

          <div class="modal-header" style="background:#3c8dbc; color: white">
            <h4 class="modal-title">Agregar Usuario</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <div class="box-body">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar Nombre" required>
                </div>
              </div>
               <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-key"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevoUsuario" id="nuevoUsuario" placeholder="Ingresar Usuario" required>
                </div>
              </div>
               <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                  <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar Contraseña" required>
                </div>
              </div>
               <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-users"></i></span>
                  <select class="form-control input-lg" name="nuevoPerfil" id="">
                    <option value="">Seleccionar Perfil</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Especial">Especial</option>
                    <option value="Vendedor">Vendedor</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="panel">Subir Foto</div>
                <input type="file" class="nuevaFoto" name="nuevaFoto">
                <p class="help-block">Peso máximo de la foto 2MB</p>
                <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
              </div>
            </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary">Guardar Usuario</button>
          </div>

          <?php 
            $crearUsuario=new ControladorUsuarios();
            $crearUsuario->ctrCrearUsuario();
           ?>
       </form>

      </div>
    </div>
  </div>

  <!--------------------------------------------------------
    MODAL EDITAR USUARIO
    ========================================================-->
  <div class="modal fade" id="modalEditarUsuario" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">

        <form role="form" method="post" enctype="multipart/form-data">

          <div class="modal-header" style="background:#3c8dbc; color: white">
            <h4 class="modal-title">Editar Usuario</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <div class="box-body">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control input-lg" name="editarNombre" id="editarNombre" value="" required>
                </div>
              </div>
               <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-key"></i></span>
                  <input type="text" class="form-control input-lg" name="editarUsuario" id="editarUsuario" value="" readonly>
                </div>
              </div>
               <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                  <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Escriba nueva Contraseña">

                  <input type="hidden" id="passwordActual" name="passwordActual">
                </div>
              </div>
               <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-users"></i></span>
                  <select class="form-control input-lg" name="editarPerfil" id="">
                    <option value="" id="editarPerfil"></option>
                    <option value="Administrador">Administrador</option>
                    <option value="Especial">Especial</option>
                    <option value="Vendedor">Vendedor</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="panel">Subir Foto</div>
                <input type="file" class="nuevaFoto" name="editarFoto">
                <p class="help-block">Peso máximo de la foto 2MB</p>
                <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
                <input type="hidden" name="fotoActual" id="fotoActual">
              </div>
            </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary">Modificar Usuario</button>
          </div>

          <?php 
            $editarUsuario=new ControladorUsuarios();
            $editarUsuario->ctrEditarUsuario();
           ?> 
       </form>

      </div>
    </div>
  </div>
  <?php 
    $borrarUsuario=new ControladorUsuarios();
    $borrarUsuario->ctrBorrarUsuario();
  ?> 
