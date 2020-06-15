@extends('.base')

@section('contenido')

 <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container">
      <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card" style="border-color: #9BE4FF">
            <div class="card-header" style="background: #040b14;">
              <h3 style="color: #149ddd;">{{ __('Sign In') }}</h3>
            </div>
            
            <div class="card-body" style="background: rgb(255, 255, 255)">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                        
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="border-color: #149ddd"><i class="bx bx-user" style="color: #149ddd"></i></span>
                        </div>
                        
                        <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" style="border-color: #149ddd" value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}" required autocomplete="email" autofocus>
                     
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
                    
                    
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="border-color: #149ddd"><i class=" bx bxs-key" style="color: #149ddd"></i></span>
                        </div>
                        
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" style="border-color: #149ddd" placeholder="{{ __('Password') }}" name="password" required autocomplete="current-password">
                      
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="row align-items-center remember">
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="checkbox" style="color: #149ddd" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="f orm-check-label" for="remember">&nbsp;
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                                
                    
                    <div class="form-group">
                        <input type="submit" value="{{ __('Login') }}" class="btn float-right btn-outline-primary  btn-rounded waves-effect">
                    </div>
                </form>
            </div>
            
            <div class="card-footer" style="background: #040b14;">
              <div class="d-flex justify-content-center links" style="color: white;">
                Don't have an account?&nbsp;&nbsp;<a href="{{ url('register') }}"> {{ __('Sing up') }}</a>
              </div>
              <div class="d-flex justify-content-center">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                    @endif
              </div>
            </div>
          </div>
        </div>
      </div>
            
    </div>
  </section>
  
@endsection
