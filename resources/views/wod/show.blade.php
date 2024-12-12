@extends('layouts.app')

@section('template_title')
    {{ $wod->name ?? __('Show') . " " . __('Wod') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Wod</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('wods.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripción:</strong>
                                    {{ $wod->descripción }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tiempocompletado:</strong>
                                    {{ $wod->tiempoCompletado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecharealizado:</strong>
                                    {{ $wod->fechaRealizado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Pesoutilizado:</strong>
                                    {{ $wod->pesoUtilizado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Rondascompletadas:</strong>
                                    {{ $wod->rondasCompletadas }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
