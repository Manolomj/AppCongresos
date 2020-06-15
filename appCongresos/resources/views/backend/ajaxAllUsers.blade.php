@extends('backend.baseadmin')


@section('content')


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Usuarios de WebCongress</h1>
            
            <button type="button" id="" class="btn btn-primary" data-toggle="modal" data-target="#ModalNew">
              Nuevo Usuario
            </button>
          </div>


          <div class="alert alert-success mensajes d-none" id="ajaxMensaje" role="alert" style="width:500px !important; text-align:center;">
              
          </div>
          

          <!-- Content Row -->
          <div class="row">
              
              
            
            <table class="table table-striped">
              
                <thead class="thead-dark">
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Email</th>
                      <th scope="col">Tipo</th>
                      <th scope="col" style="text-aling:center">Acción</th>
                    </tr>
                </thead>
                
                <tbody style="color:black" id="ajaxTbody">
                  
                </tbody>
                
            </table>
            
            <div id="ajaxUserLink" class="container d-flex justify-content-center" style="color: #149ddd">
              
            </div>
            
                  
             

<!-- Modal de Eliminación -->
<div class="modal fade" id="ajaxModalDelete" tabindex="-1" role="dialog" aria-labelledby="ajaxModalDelete" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Estás seguro de querer eliminar este usuario?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="ajaxaquivamifrase"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
        <form method="get" action="" id="form">
            <!--<input type="text" name="idusu" id="idusu" style="display:none;"/>-->
            <button class="btn btn-outline-danger" id="ajaxDelete" type="submit">Eliminar</button>
        </form>
      </div>
    </div>
  </div>
</div>


      
                
                
                
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      
@endsection


@section('script')

  <script type="text/javascript" src="{{url('backend/assets/js/ajaxPeticion.js')}}"></script>

@endsection