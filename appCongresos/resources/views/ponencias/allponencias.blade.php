@extends('base')

@section('head-links')

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

@endsection



@section('contenido')




  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
      
      
        
        @if(\Request::get('mensaje') !== null)
          <div class="alert alert-success mensajes" role="alert" style="width:500px !important; text-align:center;">
              {{\Request::get('mensaje')}}
          </div>
        @endif 
            
      
      {{--
        @if( (Auth::user()->type == 'suscriptor') | (Auth::user()->type == 'admin') )
          @if(Auth::user()->email_verified_at == null)
            <div class="alert alert-warning mensajes" role="alert" style="width:600px !important; text-align:center;">
              Para poder ver las ponencias debes verificar tu correo.
            </div>
          @endif
        @endif
      --}}
        
        
      <h1 class="text-light" style="margin: 35px 0px"><strong>Todas nuestras <span class="azull">Ponencias</span></strong></h1>
      <p><span class="typed" data-typed-items="Attend, Opposite, Is your moment!"></span></p>
    </div>
  </section>
  <!-- End Hero -->
  
  
  
<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container">

        <div class="section-title">
            <h2>Ponencias</h2>
            <p>Únete a nosotros y disfruta de todas nuestras ventajas! <br>En WebCongress trabajamos para tí!</p>
        </div>

        <div class="row" style="justify-content:center">

            
            @foreach($ponencias as $ponencia)
            
            
            
            
              <!--Plantilla visualizacion ponencia-->
              <!--=======================================================-->
              
              <div class="col-lg-7 d-flex align-items-stretch">
                  <div class="info">
                    
                    <div class="card-header" style="background: #040b14;">
                      <h3 style="color: #149ddd; text-align:center; margin:0;">{{ $ponencia->titulo }}</h3>
                    </div>
                    
                    <div class="row" style="padding-left:30px; padding-top:15px">
                      <h6 style="padding:0; margin:0; display: flex; align-items: flex-end;">Ponente: </h6> 
                      <p style="padding:0; margin:0; display: flex; align-items: flex-end; padding-left:5px">{{$ponencia->user->name}} </p>
                    </div>
                    
                    <div class="row" style="padding-left:30px; padding-top:15px">
                      <h6 style="padding:0; margin:0; display: flex; align-items: flex-end;" >Email: </h6>
                      <p style="padding:0; margin:0; display: flex; align-items: flex-end; padding-left:5px">{{$ponencia->user->email}} </p>
                    </div>
                    
                    <div class="row" style="padding-left:30px; padding-top:15px">
                      <h6 style="padding:0; margin:0; display: flex; align-items: flex-end;" >Fecha de ponencia: </h6>
                      <p style="padding:0; margin:0; display: flex; align-items: flex-end; padding-left:5px"> {{$ponencia->fecha}}</p>
                    </div>
                    
                    
                    @auth
                    
                        @if(Auth::user()->type == 'suscriptor' | Auth::user()->type == 'admin')
                        
                            @if(Auth::user()->email_verified_at != null)
            
            
                                  @if(Auth::user()->type == 'suscriptor')
                                  
                                    @if(Auth::user()->pago == 1)
                                    <div class="form-group col-md-12" style="display: flex; justify-content: center; margin-top:30px; color: #149ddd;">
                                      <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal" id="{{$ponencia->video}}">
                                          Visualizar
                                      </button>
                                    </div>
                                    
                                      
                                    @else
                                    
                                      <div class="alert alert-warning" role="alert" style=" text-align:center; margin:15px 15px; padding:10px 0px">
                                          Para poder acceder a las ponencias debes de pagar primero.
                                      </div>
                                      <div class="form-group col-md-12" style="display: flex; justify-content: center; margin-top:30px; color: #149ddd;">
                                        <a href="{{ action('PagoController@create') }}" class="btn btn-outline-primary">Pagar €</a>
                                      </div>
                                      
                                    @endif
                                    
                                  @endif
                                  
                                  
                                  
                                  
                                  @if(Auth::user()->type == 'admin')
                                    <div class="form-group col-md-12" style="display: flex; justify-content: center; margin-top:30px; color: #149ddd;">
                                      <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal" id="{{$ponencia->video}}">
                                          Visualizar
                                      </button>
                                    </div>
                                  @endif
                                  
                            
                            @else
                            
                                <div class="alert alert-warning" role="alert" style=" text-align:center; margin:15px 15px; padding:10px 0px">
                                  Para poder ver esta ponencia debes verificar tu correo.
                                </div>
                            
                                <div class="form-group col-md-12" style="display: flex; justify-content: center; margin-top:30px; color: #149ddd;">
                                  <!--<input type="button" value="Reenviar correo de verificacion." class="btn btn-outline-primary">-->
                                  <div class="text-center">
                                    <a href="{{ action('PonenciaController@verificacion') }}" class="btn btn-outline-primary">Reenviar correo de verificacion</a>
                                  </div>
                                </div>
                          
                            @endif
                          
                        @endif
                        
                    @endauth
                      
                  </div>
  
              </div>
              
              
              <div class="col-lg-7"  style="height:35px">&nbsp;</div>

            @endforeach


            <div class="container d-flex justify-content-center" style="color: #149ddd">{{$ponencias->links()}}</div>
            
            
        </div>

    </div>
</section><!-- End Contact Section -->

</main><!-- End #main -->

                                                              
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content" style="z-index:999 !impo;">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">                    
                <div class="embed-responsive embed-responsive-4by3">
                    <iframe class="embed-responsive-item" src="" id="iframeVideo"></iframe>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
                                      
  
  
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript">
  // Obtenemos el id de boton (la url del video)
  // $(function() {
   $(document).on('click', 'button[type="button"]', function(event) {
      let id = this.id;
      
      
      let  regex = 'watch?v=';
        
      let url = id.replace(regex, 'embed/');
      
      $('#iframeVideo').attr('src', url);
      
    	console.log("Se presionó el Boton con Id :"+ url);
    // var videoSrc= id;
    });
  // });

  



  //Url del video a reproducir
  // var videoSrc='https://www.youtube.com/embed/lXY0pGYJdaw';
  var videoSrc=$('#iframeVideo').attr('src'); 
  console.log('este es mi video wtf:' + videoSrc);


  //Al abrir la ventana modal, le agregué autoplay igual a 1, para que se reproduzca
  //automáticamente, en caso de que no se requiera la autoreproducción, se quita 
  //esa parte "?autoplay=1".
  $('#exampleModal').on('show.bs.modal', function () {  
    var iframe=$('#iframeVideo');
    iframe.attr("src", videoSrc+"?autoplay=1");
  });

  //Al cerrar la ventana modal, solamente reasignamos el video al atributo del iframe
  //y eso ocasiona que se detenga la reproducción del archivo,
  //aunque también podríamos haber dejado el valor src en null. :)
  $('#exampleModal').on('hidden.bs.modal', function (e) {
    
    var iframe=$('#iframeVideo');
    iframe.attr("src", videoSrc);

  });
</script>

@endsection

