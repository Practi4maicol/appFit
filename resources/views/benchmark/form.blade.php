<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $benchmark?->nombre) }}" id="nombre" placeholder="Nombre">
            {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="descripción" class="form-label">{{ __('Descripción') }}</label>
            <input type="text" name="descripción" class="form-control @error('descripción') is-invalid @enderror" value="{{ old('descripción', $benchmark?->descripción) }}" id="descripción" placeholder="Descripción">
            {!! $errors->first('descripción', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tiempo_completado" class="form-label">{{ __('Tiempo completado') }}</label>
            <input type="text" name="tiempoCompletado" class="form-control @error('tiempoCompletado') is-invalid @enderror" value="{{ old('tiempoCompletado', $benchmark?->tiempoCompletado) }}" id="tiempo_completado" placeholder="HH:MM:SS">
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
            <input type="date" name="fechaRealizado" class="form-control @error('fechaRealizado') is-invalid @enderror" value="{{ old('fechaRealizado', $benchmark?->fechaRealizado) }}" id="fecha_realizado" placeholder="Fecharealizado">
            {!! $errors->first('fechaRealizado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="rondas_completadas" class="form-label">{{ __('Rondascompletadas') }}</label>
            <input type="text" name="rondasCompletadas" class="form-control @error('rondasCompletadas') is-invalid @enderror" value="{{ old('rondasCompletadas', $benchmark?->rondasCompletadas) }}" id="rondas_completadas" placeholder="Rondascompletadas">
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