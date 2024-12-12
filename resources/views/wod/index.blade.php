@extends('layouts.app')

@section('template_title')
    Wods
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Wods') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('wods.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                     <form method="GET" action="{{ route('wods.index') }}" class="mb-4">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Buscar por: desccripción, tiempo o fecha" value="{{ request()->query('search') }}">
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
									<th >Tiempocompletado</th>
									<th >Fecharealizado</th>
									<th >Pesoutilizado</th>
									<th >Rondascompletadas</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($wods as $wod)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $wod->descripción }}</td>
										<td >{{ $wod->tiempoCompletado }}</td>
										<td >{{ $wod->fechaRealizado }}</td>
										<td >{{ $wod->pesoUtilizado }}</td>
										<td >{{ $wod->rondasCompletadas }}</td>

                                            <td>
                                                <form action="{{ route('wods.destroy', $wod->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('wods.show', $wod->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('wods.edit', $wod->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $wods->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
