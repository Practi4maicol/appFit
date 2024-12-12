@extends('layouts.app')

@section('template_title')
    {{ $cuerpo->name ?? __('Show') . " " . __('Cuerpo') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Cuerpo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('cuerpos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>User Id:</strong>
                                    {{ $cuerpo->user_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Bicepder:</strong>
                                    {{ $cuerpo->bicepDer }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Bicepizq:</strong>
                                    {{ $cuerpo->bicepIzq }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Pecho:</strong>
                                    {{ $cuerpo->pecho }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Abdomen:</strong>
                                    {{ $cuerpo->abdomen }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Piernader:</strong>
                                    {{ $cuerpo->piernaDer }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Piernaizq:</strong>
                                    {{ $cuerpo->piernaIzq }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nalgas:</strong>
                                    {{ $cuerpo->nalgas }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Pantorrillas:</strong>
                                    {{ $cuerpo->pantorrillas }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha:</strong>
                                    {{ $cuerpo->fecha }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
