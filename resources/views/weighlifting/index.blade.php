@extends('layouts.app')

@section('template_title')
    Weighliftings
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Weighliftings-Levantamiento') }}
                            </span>
                            <div class="float-right">
                                <a href="{{ route('weighliftings.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                    {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Mensaje de éxito -->
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <!-- Formulario de búsqueda -->
                    <form method="GET" action="{{ route('weighliftings.index') }}" class="mb-4">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Buscar por: nombre, fecha, peso" value="{{ request()->query('search') }}">
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </div>
                    </form>

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Peso</th>
                                        <th>Repetición máxima</th>
                                        <th>Fecha</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($weighliftings as $weighlifting)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $weighlifting->nombre }}</td>
                                            <td>{{ $weighlifting->descripción }}</td>
                                            <td>{{ $weighlifting->peso }}</td>
                                            <td>{{ $weighlifting->repeticionMaxima }}</td>
                                            <td>{{ $weighlifting->fecha }}</td>
                                            <td>
                                                <form action="{{ route('weighliftings.destroy', $weighlifting->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('weighliftings.show', $weighlifting->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('weighliftings.edit', $weighlifting->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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

                <!-- Paginación -->
                {!! $weighliftings->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection

