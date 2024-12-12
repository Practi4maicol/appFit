<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="descripción" class="form-label">{{ __('Descripción') }}</label>
            <input type="text" name="descripción" class="form-control @error('descripción') is-invalid @enderror" value="{{ old('descripción', $run?->descripción) }}" id="descripción" placeholder="Descripción">
            {!! $errors->first('descripción', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="distancia" class="form-label">{{ __('Distancia') }}</label>
            <input type="text" name="distancia" class="form-control @error('distancia') is-invalid @enderror" value="{{ old('distancia', $run?->distancia) }}" id="distancia" placeholder="Distancia">
            {!! $errors->first('distancia', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha" class="form-label">{{ __('Fecha') }}</label>
            <input type="date" name="fecha" class="form-control @error('fecha') is-invalid @enderror" value="{{ old('fecha', $run?->fecha) }}" id="fecha" placeholder="Fecha">
            {!! $errors->first('fecha', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tiempo_completado" class="form-label">{{ __('Tiempocompletado') }}</label>
            <input type="text" name="tiempoCompletado" class="form-control @error('tiempoCompletado') is-invalid @enderror" value="{{ old('tiempoCompletado', $run?->tiempoCompletado) }}" id="tiempo_completado" placeholder="HH:MM:SS">
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
            <label for="peso_extra" class="form-label">{{ __('Pesoextra') }}</label>
            <input type="number" name="pesoExtra" class="form-control @error('pesoExtra') is-invalid @enderror" value="{{ old('pesoExtra', $run?->pesoExtra) }}" id="peso_extra" placeholder="Pesoextra">
            {!! $errors->first('pesoExtra', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
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