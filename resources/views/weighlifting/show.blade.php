@extends('layouts.app')

@section('template_title')
    {{ $weighlifting->name ?? __('Show') . " " . __('Weighlifting') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Weighlifting</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('weighliftings.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $weighlifting->nombre }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripción:</strong>
                                    {{ $weighlifting->descripción }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Peso:</strong>
                                    {{ $weighlifting->peso }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Repeticionmaxima:</strong>
                                    {{ $weighlifting->repeticionMaxima }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha:</strong>
                                    {{ $weighlifting->fecha }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
