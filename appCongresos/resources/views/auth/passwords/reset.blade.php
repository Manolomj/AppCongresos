
<!--El de laravel con mis estilos-->

@extends('.base')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



{{-- 

<!--El mío-->

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
                    
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        
                        <!--Email-->
                        
                        <div class="input-group-prepend form-group">
                            <span class="input-group-text" style="border-color: #149ddd">
                                <i class="bx bx-envelope" style="color: #149ddd"></i>
                            </span>
                           
                            <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $email ?? old('email') }}" style="border-color: #149ddd" placeholder="{{ __('E-Mail Address') }}" required autocomplete="email" autofocus>
                            
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
                        
                        
                        <!--Password-->
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="border-color: #149ddd"><i class=" bx bxs-key" style="color: #149ddd"></i></span>
                            </div>
                            
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" style="border-color: #149ddd" placeholder="{{ __('Password') }}" name="password" required autocomplete="new-password">
                            
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <br>
                        
                        
                        <!--Confirm Password-->
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="border-color: #149ddd"><i class=" bx bxs-key" style="color: #149ddd"></i></span>
                            </div>
                            
                            <input id="password-confirm" type="password" class="form-control" style="border-color: #149ddd" placeholder="{{ __('Confirm Password') }}" name="password-confirmation" required autocomplete="new-password">
                          
                        </div>
                        
                        <br>
                        
                        <!--Boton-->
                        <div class="form-group">
                            <input type="submit" value="{{ __('Reset Password') }}" class="btn float-right btn-outline-primary  btn-rounded waves-effect">
                        </div>

                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</section>


@endsection


--}}













{{-- 

<!--Original de laravel-->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

--}}