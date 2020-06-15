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
              <h3 style="color: #149ddd; text-align:center;">Realizar Pago</h3>
            </div>
                        
        
        
        
     
           <form method="POST" action="{{action('PagoController@uploading')}}"  class="mx-auto w-100 p-3" accept-charset="UTF-8" enctype="multipart/form-data">
                @csrf
                
                
                <input type="text" name="iduser" value="{{Auth::user()->id}}" style="visibility:hidden; height:0px!important">
                
                
                <div class="form-group col-md-12">
                    <label class="text-secondary text-left">PDF-Factura:</label>
                    <!-- Input traducional para la subida de archivos -->
                    <input type="file" name="archivo" id="archivo" accept="application/pdf" required>
                        @error('archivo')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                </div>

                
                <div class="form-group col-md-12" style="display: flex; justify-content: flex-end; padding-top:10px">
                  <input type="submit" value="Pagar" class="btn btn-outline-primary">
                </div>
                
            </form>
            




            </div> 
        </div>  
      </div>
    </div>
  </div>
</section>

@endsection


