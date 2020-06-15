@extends('base')

@section('contenido')



<section id="hero" class="d-flex flex-column justify-content-center align-items-center" style="z-index: 5">
  <div class="hero-container">
    <div class="container">
      
      @if(\Request::get('mensaje') !== null)
        <div class="alert alert-success mensajes" role="alert" style="width:500px !important; text-align:center;">
            {{\Request::get('mensaje')}}
        </div>
      @endif 
      <div class="d-flex justify-content-center h-100">
        
        <div class="card" style="border-color: #9BE4FF; min-width:400px">
          
            <div class="card-header" style="background: #040b14;">
              <h3 style="color: #149ddd; text-align:center;">Crear Ponencia</h3>
            </div>
                        
                        
           <form method="POST" action="{{action('PonenciaController@store')}}"  class="mx-auto w-100 p-3 text-white " accept-charset="UTF-8" enctype="multipart/form-data">
                @csrf
                
                
                <input type="text" name="iduser" value="{{Auth::user()->id}}" style="visibility:hidden; height:0px!important">
                
                
                <div class="form-group col-md-12">
                    <label class="text-secondary text-left">Titulo:</label>
                    <input type="text"  class="form-control col-md-12" name="titulo" placeholder="Ingresa el titulo" />
                    @error('titulo')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                </div>

             
                <div class="form-group col-md-12">
                    <label class="text-secondary text-left">Video:</label>
                    <input type="text"  class="form-control" name="video" placeholder="Ingresa la URL del Video" />
                </div>
                
                  <div class="form-group col-md-12">
                    <label class="text-secondary text-left">Fecha de la ponencia:</label>
                    <input type="date"  class="form-control" name="fecha" />
                </div>
                
                
                <div class="form-group col-md-12" style="display: flex; justify-content: flex-end; padding-top:10px">
                  <input type="submit" value="Crear" class="btn btn-outline-primary">
                </div>
                
            </form>
            




            </div> 
        </div>  
      </div>
    </div>
  </div>
</section>



{{--
  <!-- ======= Hero Section ======= -->
  <!--<section id="hero" class="d-flex flex-column justify-content-center align-items-center" style="z-index: 5">-->
  <!--  <div class="hero-container" data-aos="fade-in">-->
      
  <!--    <h1 class="text-light" style="margin: 35px 0px"><strong><span class="azull">Create</span> Ponencias</strong></h1>-->
  <!--    <p>&nbsp;<span class="typed" data-typed-items="Crea, Une, Enseña, No pares!"></span></p>-->
  <!--  </div>-->
  <!--</section>-->
  <!-- End Hero -->
--}}
	



@endsection
