

<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="descripción" class="form-label">{{ __('Descripción') }}</label>
            <input type="text" name="descripción" class="form-control @error('descripción') is-invalid @enderror" value="{{ old('descripción', $wod?->descripción) }}" id="descripción" placeholder="Descripción">
            {!! $errors->first('descripción', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tiempo_completado" class="form-label">{{ __('Tiempocompletado') }}</label>
            <input type="text" name="tiempoCompletado" class="form-control @error('tiempoCompletado') is-invalid @enderror" value="{{ old('tiempoCompletado', $wod?->tiempoCompletado) }}" id="tiempo_completado" placeholder="HH:MM:SS">
            {!! $errors->first('tiempoCompletado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <!-- jQuary Máscara para Horas, Minutos y Segundos para manejar un formato más detallado como HH:MM:SS-->
        <script>
            $(document).ready(function(){
                $('#tiempo_completado').mask('00:00:00');
            });
        </script>
        <!-- fin jQuery y jQuery Mask Plugin-->

        <div class="form-group mb-2 mb20">
            <label for="fecha_realizado" class="form-label">{{ __('Fecharealizado') }}</label>
            <input type="date" name="fechaRealizado" class="form-control @error('fechaRealizado') is-invalid @enderror" value="{{ old('fechaRealizado', $wod?->fechaRealizado) }}" id="fecha_realizado" placeholder="Fecharealizado">
            {!! $errors->first('fechaRealizado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="peso_utilizado" class="form-label">{{ __('Pesoutilizado') }}</label>
            <input type="text" name="pesoUtilizado" class="form-control @error('pesoUtilizado') is-invalid @enderror" value="{{ old('pesoUtilizado', $wod?->pesoUtilizado) }}" id="peso_utilizado" placeholder="Pesoutilizado">
            {!! $errors->first('pesoUtilizado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="rondas_completadas" class="form-label">{{ __('Rondascompletadas') }}</label>
            <input type="number" name="rondasCompletadas" class="form-control @error('rondasCompletadas') is-invalid @enderror" value="{{ old('rondasCompletadas', $wod?->rondasCompletadas) }}" id="rondas_completadas" placeholder="Rondascompletadas">
            {!! $errors->first('rondasCompletadas', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <!-- Campo oculto para asignar el user_id -->
      <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
  </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>