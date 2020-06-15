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
              <h3 style="color: #149ddd; text-align:center;">Registrar Ponente</h3>
            </div>
                        
           <form method="POST" action="{{action('UsersController@storePonente2')}}"  class="mx-auto w-100 p-3 text-white " accept-charset="UTF-8" enctype="multipart/form-data">
           {{--             
           <form method="POST" action="{{url('/ponenteCreate')}}"  class="mx-auto w-100 p-3 text-white " accept-charset="UTF-8">
             --}}
                @csrf
                
                
                <div class="form-group col-md-12">
                    <label for="name" class="text-secondary text-left">Nombre:</label>
                    <input id="name" type="text" class="col-md-12 form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Ingresa el nombre" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

             
                <div class="form-group col-md-12">
                    <label for="email" class="text-secondary text-left">E-mail:</label>
                    <input id="email" type="email" class="col-md-12 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Ingresa el email" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                
                
                
                <div class="form-group col-md-12" style="display: flex; justify-content: flex-end; padding-top:10px">
                  <input type="submit" value="Registrar Ponente" class="btn btn-outline-primary">
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
