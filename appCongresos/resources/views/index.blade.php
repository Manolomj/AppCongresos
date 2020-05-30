@extends('base')

@section('contenido')



  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center" style="z-index: 5">
    <div class="hero-container" data-aos="fade-in">
      
      
      
        
      @if(\Request::get('mensaje') !== null)
        <div class="alert alert-success mensajes" role="alert" style="width:500px !important; text-align:center;">
            {{\Request::get('mensaje')}}
        </div>
      @endif 
            
            
      
      
      
      <h1 class="text-light" style="margin: 35px 0px"><strong><span class="azull">Web</span>Congress</strong></h1>
      <p>&nbsp;Comienza y
      
      
      <span class="typed" data-typed-items="aprende!, diviertete!, alcanza tus metas!, no te arrepentirás!"></span></p>
    </div>
  </section>
  <!-- End Hero -->

  


@endsection