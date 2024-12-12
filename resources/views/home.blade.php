@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Vamos a ingresar nuestros avances!!') }}</div>
                <!--parte interna del contenedor div-->
                <div> 
                     <img src="img/lion.jpg" alt=" " style="width: 100%; justify-content: space-between; align-items: center;" >
                </div>

                <div class="card-body">

                   

                   <!--parte final del contenedor div--> 
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('Bienvenido!!!...estas activo') }}


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
