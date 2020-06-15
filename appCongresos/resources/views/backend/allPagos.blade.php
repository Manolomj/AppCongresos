@extends('backend.baseadmin')


@section('content')


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pagos WebCongress</h1>
          </div>



        @if(\Request::get('mensaje') !== null)
          <div class="alert alert-success mensajes" role="alert" style="width:500px !important; text-align:center;">
              {{\Request::get('mensaje')}}
          </div>
        @endif 

          <!-- Content Row -->
          <div class="row">
              
              
            
            <table class="table table-striped">
                  <!--<thead class="thead-light">-->
                <thead class="thead-dark">
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Tipo</th>
                      <th scope="col">Pago</th>
                      <th scope="col" style="text-aling:center">Acción</th>
                    </tr>
                </thead>
                
                <tbody style="color:black">
                    @foreach($users as $user)
                        @if($user->type == 'suscriptor')
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->type}}</td>
                                <td>{{$user->pago}}</td>
                                <td> 
                                    <button type="button" id="pago_separador_{{$user->name}}_separador_{{$user->id}}_separador_{{$user->type}}_separador_{{$user->pago}}" class="btn btn-outline-info" data-toggle="modal" data-target="#ModalPago">
                                      Modificar pago
                                    </button>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
                </table>
                <div class="container d-flex justify-content-center" style="color: #149ddd">{{$users->links()}}</div>
                
                

<!-- Modal de Pagos -->
<div class="modal fade" id="ModalPago" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificación de pago</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="aquivamifrasePago"></div>
      <div class="modal-footer">
        <form method="get" action="{{ url('/editPago') }}" id="formPago" style="display: flex; flex-direction: column; justify-content: space-between; width: 100%; align-items: center;">
            <input type="text" name="idusu" id="idusu" style="display:none;"/>
            <div style="display: flex; margin-right: 82px;"> <span>Pago:</span> <input type="number" name="pagousu" id="pagousu" style="height: 21px; margin-left: 7px; width: 57px;" min="0" max="1"/> </div> <br>
            <div style="display: flex; justify-content: space-between; width: 100%;">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-outline-info" id="botonEditar" type="submit">Modificar Pago</button>
            </div>
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