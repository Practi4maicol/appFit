@extends('layouts.app')

@section('template_title')
    {{ $otro->name ?? __('Show') . " " . __('Otro') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Otro</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('otros.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripción:</strong>
                                    {{ $otro->descripción }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha:</strong>
                                    {{ $otro->fecha }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Datosfinales:</strong>
                                    {{ $otro->datosFinales }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
