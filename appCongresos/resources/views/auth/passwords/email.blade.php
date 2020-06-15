@extends('.base')

@section('contenido')

<section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container">
      <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card" style="border-color: #9BE4FF">
                
                <!--Titulo-->
                <div class="card-header" style="background: #040b14;">
                  <h3 style="color: #149ddd;">{{ __('Reset Password') }}</h3>
                </div>
                
                <!--Formulario-->
                <div class="card-body" style="background: rgb(255, 255, 255)">
                    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="border-color: #149ddd">
                                <i class="bx bx-envelope" style="color: #149ddd"></i>
                            </span>
                           
                            <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" style="border-color: #149ddd" placeholder="{{ __('E-Mail Address') }}" required autocomplete="email" autofocus>
                            
                            <div class="row">
                                <div class="col-12">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> 
                        </div>
                        
                        <br>
                        
                        <div class="form-group">
                            <input type="submit" value="{{ __('Send Password Reset Link') }}" class="btn float-right btn-outline-primary  btn-rounded waves-effect">
                        </div>
                        
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
