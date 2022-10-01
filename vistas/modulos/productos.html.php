 <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Administrar Productos
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Administrar Productos</li>
      </ol>
    </section>

    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">
            Agregar Producto
          </button>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped tablas dt-responsive">
            <thead>
              <tr>
                <th style="width:10px">#</th>
                <th>Imágen</th>
                <th>Código</th>
                <th>Descripción</th>
                <th>Categoría</th>
                <th>Stock</th>
                <th>Precio de Compra</th>
                <th>Precio de Venta</th>
                <th>Agregado</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td><img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail" width="40px"></td>
                <td>0001</td>
                <td>Lorem ipsum dolor site amet </td>
                <td>Lorem ipsum</td>
                <td>20</td>
                <td>5.00</td>
                <td>10.00</td>
                <td>2020-06-06 12:05:32</td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>

  <!-- Modal agregar Producto -->
  <div class="modal fade" id="modalAgregarProducto" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">

        <form role="form" method="post" enctype="multipart/form-data">

          <div class="modal-header" style="background:#3c8dbc; color: white">
            <h4 class="modal-title">Agregar Producto</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <div class="box-body">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-code"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevoCodigo" placeholder="Ingresar Codigo" required>
                </div>
              </div>
               <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevaDescripcion" placeholder="Ingresar Descripción" required>
                </div>
              </div>
               <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i></span>
                  <select class="form-control input-lg" name="nuevaCategoria" id="">
                    <option value="">Seleccionar Categoría</option>
                    <option value="Taladros">Taladros</option>
                    <option value="Andamios">Andamios</option>
                    <option value="Equipos">Equipos</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-check"></i></span>
                  <input type="number" class="form-control input-lg" name="nuevoStock" min="0" placeholder="Ingresar Stock" required>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-xs-6">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                    <input type="text" class="form-control input-lg" name="nuevoPrecioCompra" placeholder="Precio de Compra" required>
                  </div>
                </div>
              
                <div class="col-xs-6">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>
                    <input type="text" class="form-control input-lg" name="nuevoPrecioVenta" placeholder="Precio de Venta" required>
                  </div>
                  <br>
                  <!-- Checkbox para Porcentaje -->
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>
                        <input type="checkbox" class="minimal porcentaje" checked>
                        Utilizar Porcentaje
                      </label>
                    </div>
                  </div>
                  <!-- Entrada para Porcentaje -->
                  <div class="col-xs-6" style="padding: 0">
                    <div class="input-group">
                      <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>
                      <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="panel">Subir Imágen</div>
                <input type="file" class="nuevaImagen">
                <p class="help-block">Peso máximo de la imágen 2MB</p>
                <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail" width="100px">
              </div>
            </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary">Guardar Producto</button>
          </div>
       </form>

      </div>
    </div>
  </div>