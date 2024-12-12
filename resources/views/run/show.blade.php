@extends('layouts.app')

@section('template_title')
    {{ $run->name ?? __('Show') . " " . __('Run') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Run</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('runs.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripción:</strong>
                                    {{ $run->descripción }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Distancia:</strong>
                                    {{ $run->distancia }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha:</strong>
                                    {{ $run->fecha }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tiempocompletado:</strong>
                                    {{ $run->tiempoCompletado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Pesoextra:</strong>
                                    {{ $run->pesoExtra }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
