@extends('layouts.app')

 
@section('template_title')
    Personas
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Datos personales') }}
                            </span>

                            @if ($personas->count() == 0)<!--condicion para mostrar el boton solo si no se ha creado la persona -->
                             <div class="float-right">
                                <a href="{{ route('personas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                            @endif

                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                       <!-- <th>No</th>  -->
                                        
									<th >Nombre</th>
									<th >Apellido</th>
									<th >Edad</th>
									<th >Peso kl</th>
									<th >Altura cm</th>
									<th >Inicioentrenamiento</th>
                                    <!--campo para identificar el timepo de entrenamiento-->
                                    <th >Tiempo de entrenamiento</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($personas as $persona)
                                    <!--codigo para calcular el timepo de entrenamiento-->
                                 @php
                                    $fechaCreacion = $persona->inicioEntrenamiento;
                                    $fechaActual = \Carbon\Carbon::now();
                                    $diferencia = $fechaActual->diff($fechaCreacion);
                                @endphp
                                <!--codigo para calcular edad-->
                                 @php  
                                    $fechaNacimiento = $persona->edad;
                                    $fechaActual = \Carbon\Carbon::now();
                                    $edadActual = $fechaActual->diff($fechaNacimiento);
                                @endphp
                                        <tr>
                                           <!-- <td>{{ ++$i }}</td>  -->
                                            
										<td >{{ $persona->nombre }}</td>
										<td >{{ $persona->apellido }}</td>
										<td >{{ $edadActual->years }} </td>
										<td >{{ $persona->peso }}</td>
										<td >{{ $persona->altura }}</td>
										<td >{{ $persona->inicioEntrenamiento }}</td>
                                        <!--presentacion del timepo de entrenamiento-->
                                        <td>{{ $diferencia->years }} años, {{ $diferencia->months }} meses, {{ $diferencia->days }} días</td>

                                            <td>
                                                <form action="{{ route('personas.destroy', $persona->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('personas.show', $persona->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('personas.edit', $persona->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    
                                                    @if ($personas->count() == 0)<!--condicion para ocultar el boton de eliminar-->
                                                      @csrf
                                                      @method('DELETE') 
                                                      <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                    @endif
                                                 </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $personas->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
