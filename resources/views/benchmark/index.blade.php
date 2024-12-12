@extends('layouts.app')

@section('template_title')
    Benchmarks
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Benchmarks') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('benchmarks.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif


                     <!-- Search Form -->
                     <form method="GET" action="{{ route('benchmarks.index') }}" class="mb-4">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Buscar por: nombre, descripción o fecha" value="{{ request()->query('search') }}">
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </div>
                    </form>                       

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
									<th >Nombre</th>
									<th >Descripción</th>
									<th >Tiempocompletado</th>
									<th >Fecharealizado</th>
									<th >Rondascompletadas</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($benchmarks as $benchmark)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $benchmark->nombre }}</td>
										<td >{{ $benchmark->descripción }}</td>
										<td >{{ $benchmark->tiempoCompletado }}</td>
										<td >{{ $benchmark->fechaRealizado }}</td>
										<td >{{ $benchmark->rondasCompletadas }}</td>

                                            <td>
                                                <form action="{{ route('benchmarks.destroy', $benchmark->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('benchmarks.show', $benchmark->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('benchmarks.edit', $benchmark->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $benchmarks->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
