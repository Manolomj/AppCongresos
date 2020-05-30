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

  

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container">

        <div class="section-title">
            <h2>Contact</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat
                sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row" data-aos="fade-in">

            <div class="col-lg-5 d-flex align-items-stretch">
                <div class="info">
                    <div class="address">
                        <i class="icofont-google-map"></i>
                        <h4>Location:</h4>
                        <p>A108 Adam Street, New York, NY 535022</p>
                    </div>

                    <div class="email">
                        <i class="icofont-envelope"></i>
                        <h4>Email:</h4>
                        <p>info@example.com</p>
                    </div>

                    <div class="phone">
                        <i class="icofont-phone"></i>
                        <h4>Call:</h4>
                        <p>+1 5589 55488 55s</p>
                    </div>

                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                        frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                </div>

            </div>



            
            <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" >

                <form method="POST" action="{{ url('/contacto') }}">
                    @csrf
                    <input type="text" name="subject">
                    <input type="text" name="message">
                    <input type="submit">
                </form>
                
                <form method="POST" action="{{ url('/contacto') }}" role="form" class="php-email-form" >
                  @csrf
                  
                    <div class="form-group">
                        <label for="name">Subject</label>
                        <input type="text" class="form-control" name="subject" id="subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject"/>
                        <!--<div class="validate"></div>-->
                    </div>
                    <div class="form-group">
                        <label for="name">Message</label>
                        <textarea class="form-control" name="message" rows="10" data-rule="required" data-msg="Please write something for us"></textarea>
                        <!--<input type="text"  class="form-control" name="mensaje" id="mensaje"  data-rule="required" rows="10" size="20" data-msg="Please write something for us" value="Cara Congreso" />-->
                        <!--<div class="validate"></div>-->
                    </div>
                    <!--<div class="mb-8">-->
                    <!--    <div class="loading">Loading</div>-->
                        <!--<div class="error-message"></div>-->
                    <!--    <div class="sent-message">Tu mensaje ha sido enviado. Gracias!</div>-->
                    <!--</div>-->
                    
                    @auth 
                        @if(Auth::user()->email_verified_at != null)
                            <div class="text-center"><input type="submit" class="submit"></div>
                        @endif
                    @endauth
                    
                    @auth 
                        @if(Auth::user()->email_verified_at == null)
                            <div class="text-center"><a href="{{ url('login') }}" class="submit">Inicia sesion</button></a>
                        @endif
                    @endauth
                    
                    @guest
                        <div class="text-center"><a href="{{ url('login') }}" class="submit">Inicia sesion</button></a>
                    @endguest
                    
                </form>
            </div>

        </div>

    </div>
</section><!-- End Contact Section -->

</main><!-- End #main -->


@endsection