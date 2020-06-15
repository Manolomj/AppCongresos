@extends('backend.baseadmin')


@section('content')


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Panel de Ponencias</h1>
            
            <button type="button" id="" class="btn btn-primary" data-toggle="modal" data-target="#ModalNewPonencia">
              Nueva Ponencia
            </button>
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
                      <th scope="col">Id Creador</th>
                      <th scope="col">Titulo</th>
                      <th scope="col">URL</th>
                      <th scope="col">Fecha</th>
                      <th scope="col" style="text-aling:center">Acción</th>
                    </tr>
                </thead>
                
                <tbody style="color:black">
                    @foreach($ponencias as $ponencia)
                        <tr>
                            <td>{{$ponencia->id}}</td>
                            <td>{{$ponencia->iduser}}</td>
                            <td>{{$ponencia->titulo}}</td>
                            <td>{{$ponencia->video}}</td>
                            <td>{{$ponencia->fecha}}</td>
                            <td> 
                                <button type="button" id="ponencia_separador_eliminarPonencia_separador_{{$ponencia->id}}_separador_{{$ponencia->iduser}}_separador_{{$ponencia->titulo}}_separador_{{$ponencia->video}}_separador_{{$ponencia->fecha}}" class="btn btn-outline-danger" data-toggle="modal" data-target="#ModalEliminate">
                                  Eliminar
                                </button>
                                
                                <button type="button" id="ponencia_separador_editarPonencia_separador_{{$ponencia->id}}_separador_{{$ponencia->iduser}}_separador_{{$ponencia->titulo}}_separador_{{$ponencia->video}}_separador_{{$ponencia->fecha}}" class="btn btn-outline-info" data-toggle="modal" data-target="#ModalEditate">
                                  Editar
                                </button>
                                
                                
                                
                            </td>
                        </tr>
                        
                        
                        
                    @endforeach
                </tbody>
                </table>
                <div class="container d-flex justify-content-center" style="color: #149ddd">{{$ponencias->links()}}</div>
                

<!-- Modal de Eliminación -->
<div class="modal fade" id="ModalEliminate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Estás seguro de querer eliminar esta ponencia?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="aquivamifrasePEliminate"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
        <form method="get" action="" id="formPonenciasEliminate">
            <button class="btn btn-outline-danger" id="botonEliminar" type="submit">Eliminar</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal Edicion -->
<div class="modal fade" id="ModalEditate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edición de ponencia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer" style="justify-content: center">
        <form method="get" action="" id="formPonenciasEditate" style="display:flex; flex-direction:column; width:100%; align-items:center;">
          <div style="display:flex; flex-direction: column;  width:300px;">
            <div style="display: none"> <input type="number" name="idponv" id="idponv"/> </div> <br>
            <div style="display: flex"> <span>Id Ponencia: </span> <input type="number" name="idpon" id="idpon" style="height: 21px; margin-left: 7px; width: 57px;"/> </div> <br>
            <div style="display: flex"> <span>Id Creador: </span> <input type="number" name="idponusu" id="idponusu" style="height: 21px; margin-left: 7px; width: 57px;"/> </div> <br>
            <div style="display: flex"> <span>Titulo: </span> <input type="text" name="namepon" id="namepon"  style="height: 21px; margin-left: 7px; width: 100%;"/> </div> <br>
            <div style="display: flex"> <span>URL: </span> <input type="text" name="urlpon" id="urlpon" style="height: 21px; margin-left: 7px; width: 100%;"/> </div> <br>
            <div style="display: flex"> <span>Fecha: </span> <input type="date" name="fechapon" id="fechapon" style="height: 21px; margin-left: 7px; width: 150px;"/> </div> <br>
            
            <br>
            
            <div style="display:flex; justify-content:space-between; width:100%">
              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
              <button class="btn btn-outline-info" id="botonEliminar" type="submit">Editar</button>
            </div>
            
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal Añadir -->
<div class="modal fade" id="ModalNewPonencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Ponencia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">Añade una nueva ponencia</div>
      <div class="modal-footer" style="justify-content: center">
        
        <form method="get" action="{{url('/createPonencia')}}" id="formNewPonencia" style="display:flex; flex-direction:column; width:100%; align-items:center;">
          @csrf
          
          <div style="display:flex; flex-direction: column;  width:300px;">
            <div style="display: flex"> <span>Id Ponencia: </span> <input type="number" name="idpon" id="idpon" style="height: 21px; margin-left: 7px; width: 57px;" min="1" required/> </div> <br>
            <div style="display: flex"> <span>Id Creador: </span> <input type="number" name="idponusu" id="idponusu" style="height: 21px; margin-left: 7px; width: 57px;" min="1" required/> </div> <br>
            <div style="display: flex"> <span>Titulo: </span> <input type="text" name="namepon" id="namepon"  style="height: 21px; margin-left: 7px; width: 100%;"  required/> </div> <br>
            <!--<div style="display: flex"> <span>URL: </span> <input type="url" name="urlpon" id="urlpon" style="height: 21px; margin-left: 7px; width: 100%;" pattern="(?:https?:\/\/)?(?:www\.)?youtu\.?be(?:\.com)?\/?.*(?:watch|embed)?(?:.*v=|v\/|\/)([\w\-_]+)\&?" required/> </div> <br>-->
            <div style="display: flex"> <span>URL: </span> <input type="url" name="urlpon" id="urlpon" style="height: 21px; margin-left: 7px; width: 100%;"  pattern="https?://.+" required/> </div> <br>
            <div style="display: flex"> <span>Fecha: </span> <input type="date" name="fechapon" id="fechapon" style="height: 21px; margin-left: 7px; width: 150px;"  required/> </div> <br>
            
            
            <br>
            
            <div style="display:flex; justify-content:space-between; width:100%">
              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
              <button class="btn btn-outline-info" id="botonEliminar" type="submit">Crear</button>
            </div>
            
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