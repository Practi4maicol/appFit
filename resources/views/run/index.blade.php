@extends('layouts.app')

@section('template_title')
    Runs
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Runs') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('runs.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                      <form method="GET" action="{{ route('runs.index') }}" class="mb-4">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Buscar por: descripción, distacia o fecha" value="{{ request()->query('search') }}">
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </div>
                    </form>                     

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
									<th >Descripción</th>
									<th >Distancia</th>
									<th >Fecha</th>
									<th >Tiempocompletado</th>
									<th >Pesoextra</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($runs as $run)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $run->descripción }}</td>
										<td >{{ $run->distancia }}</td>
										<td >{{ $run->fecha }}</td>
										<td >{{ $run->tiempoCompletado }}</td>
										<td >{{ $run->pesoExtra }}</td>

                                            <td>
                                                <form action="{{ route('runs.destroy', $run->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('runs.show', $run->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('runs.edit', $run->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $runs->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
