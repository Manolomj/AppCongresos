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
                      <th scope="col">Email</th>
                      <th scope="col">Tipo</th>
                      <th scope="col" style="text-aling:center">Acción</th>
                    </tr>
                </thead>
                
                <tbody style="color:black">
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->type}}</td>
                            <td> 
                                <button type="button" id="eliminar_separador_{{$user->name}}_separador_con_separador_id_separador_{{$user->id}}_separador_{{$user->type}}" class="btn btn-outline-danger" data-toggle="modal" data-target="#ModalEliminate">
                                  Eliminar
                                </button>
                                
                                <button type="button" id="editar_separador_{{$user->name}}_separador_con_separador_id_separador_{{$user->id}}_separador_{{$user->type}}" class="btn btn-outline-info" data-toggle="modal" data-target="#ModalEditate">
                                  Editar
                                </button>
                                
                                
                                
                            </td>
                        </tr>
                        
                        {{--
                        <!-- Modal de Eliminación -->
                        <!--<div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
                        <!--  <div class="modal-dialog" role="document">-->
                        <!--    <div class="modal-content">-->
                        <!--      <div class="modal-header">-->
                        <!--        <h5 class="modal-title" id="exampleModalLabel">¿Estás seguro de querer eliminar este usuario?</h5>-->
                        <!--        <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
                        <!--          <span aria-hidden="true">&times;</span>-->
                        <!--        </button>-->
                        <!--      </div>-->
                        <!--      <div class="modal-body" id="aquivamifrase">Usuario seleccionado: {{$user->name}} , id: {{$user->id}}</div>-->
                        <!--      <div class="modal-footer">-->
                        <!--        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>-->
                        <!--        <form method="POST" action="{{url('/destroyUser/','$user->id')}}" id="form">-->
                        <!--            <input type="text" name="idusu" id="idusu" style="display:none;"/>-->
                        <!--            <a class="btn btn-outline-danger" id="botonEliminar" type="submit">Eliminar</a>-->
                        <!--        </form>-->
                        <!--      </div>-->
                        <!--    </div>-->
                        <!--  </div>-->
                        <!--</div>-->
                        --}}
                        
                    @endforeach
                </tbody>
                </table>
                <div class="container d-flex justify-content-center" style="color: #149ddd">{{$users->links()}}</div>
                
                

<!-- Modal de Eliminación -->
<div class="modal fade" id="ModalEliminate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Estás seguro de querer eliminar este usuario?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="aquivamifrase"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
        <form method="get" action="" id="form">
            <!--<input type="text" name="idusu" id="idusu" style="display:none;"/>-->
            <!--<a class="btn btn-outline-danger" id="botonEliminar" type="submit">Eliminar</a>-->
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
        <h5 class="modal-title" id="exampleModalLabel">Edicion de usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="aquivamifrase2"></div>
      <div class="modal-footer" style="justify-content: center">
        <form method="get" action="" id="formEdit" style="display:flex; flex-direction:column; width:100%; align-items:center;">
          <div style="display:flex; flex-direction: column;  width:300px;">
            <div style="display: none"><input type="number" name="idusuv" id="idusuv"/> </div> <br>
            <div style="display: flex"> <span>Id: </span> <input type="number" name="idusu" id="idusu" style="height: 21px; margin-left: 7px; width: 57px;"/> </div> <br>
            <div style="display: flex"> <span>Nombre: </span> <input type="text" name="nameusu" id="nameusu"  style="height: 21px; margin-left: 7px; width: 100%;"/> </div> <br>
            <!--<div style="display: flex"> <span>Tipo: </span> <input type="text" name="typeusu" id="typeusu" style="height: 21px; margin-left: 7px; width: 100%;"/> </div> <br>-->
            
            <div style="display: flex"> 
              <span>Tipo: </span>
                <select class="custom-select" id="typeusu" name="typeusu" style="height: 24px; margin-left: 7px; width: 109px; padding: 0; padding-left: 8px;">
                  <option selected>Choose...</option>
                  <option value="admin">Admin</option>
                  <option value="comite">Comite</option>
                  <option value="ponente">Ponente</option>
                  <option value="suscriptor">Suscriptor</option>
                </select>
            </div> 
            
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
<div class="modal fade" id="ModalNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro de usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="aquivamifrase3">Añade un nuevo usuario</div>
      <div class="modal-footer" style="justify-content: center">
        
        <form method="get" action="{{url('createUser')}}" id="formNew" style="display:flex; flex-direction:column; width:100%; align-items:center;">
          
          <div style="display:flex; flex-direction: column;  width:300px;">
            <div style="display: flex"> <span>Nombre:     </span> <input type="text" name="nameusu" id=""  style="height: 21px; margin-left: 7px; width: 100%;" required/> </div> <br>
            <div style="display: flex"> <span>Email:      </span> <input type="email" name="emailusu" id=""  style="height: 21px; margin-left: 7px; width: 100%;" required/> </div> <br>
            <div style="display: flex"> <span>Contraseña: </span> <input type="text" name="passusu" id=""  style="height: 21px; margin-left: 7px; width: 100%;"  minlength="8" required/> </div> <br>
            
            <div style="display: flex"> 
              <span>Tipo: </span>
                <select class="custom-select" id="" name="typeusu" style="height: 24px; margin-left: 7px; width: 109px; padding: 0; padding-left: 8px;">
                  <option value="suscriptor">Suscriptor</option>
                  <option value="ponente">Ponente</option>
                  <option value="comite">Comite</option>
                  <option value="admin">Admin</option>
                </select>
            </div> 
            
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


{{--

<!--                                <button type="button" id="{{$user->name}}_separador_con_separador_id_separador_{{$user->id}}" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal">-->
<!--                                  Eliminar-->
<!--                                </button>-->
                

<!-- Modal de Eliminación -->
<!--<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
<!--  <div class="modal-dialog" role="document">-->
<!--    <div class="modal-content">-->
<!--      <div class="modal-header">-->
<!--        <h5 class="modal-title" id="exampleModalLabel">¿Estás seguro de querer eliminar este usuario?</h5>-->
<!--        <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--          <span aria-hidden="true">&times;</span>-->
<!--        </button>-->
<!--      </div>-->
<!--      <div class="modal-body" id="aquivamifrase"></div>-->
<!--      <div class="modal-footer">-->
<!--        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>-->
<!--        <form method="POST" action="" id="form">-->
<!--            <input type="text" name="idusu" id="idusu" style="display:none;"/>-->
<!--            <a class="btn btn-outline-danger" id="botonEliminar" type="submit">Eliminar</a>-->
<!--        </form>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->

--}}







{{--

<button type="button" id="{{$user->name}}_separador_con_separador_id_separador_{{$user->id}}" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal{{$user->id}}">



                        <!-- Modal de Eliminación -->
                        <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">¿Estás seguro de querer eliminar este usuario?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body" id="aquivamifrase">Usuario seleccionado: {{$user->name}} , id: {{$user->id}}</div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                                <form method="POST" action="{{url('/destroyUser','$user->id')}}" id="form">
                                    <input type="text" name="idusu" id="idusu" style="display:none;"/>
                                    <a class="btn btn-outline-danger" id="botonEliminar" type="submit">Eliminar</a>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>



--}}