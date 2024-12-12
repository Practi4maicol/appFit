
<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $weighlifting?->nombre) }}" id="nombre" placeholder="Nombre">
            {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="descripción" class="form-label">{{ __('Descripción') }}</label>
            <input type="text" name="descripción" class="form-control @error('descripción') is-invalid @enderror" value="{{ old('descripción', $weighlifting?->descripción) }}" id="descripción" placeholder="Descripción">
            {!! $errors->first('descripción', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="peso" class="form-label">{{ __('Peso') }}</label>
            <input type="text" name="peso" class="form-control @error('peso') is-invalid @enderror" value="{{ old('peso', $weighlifting?->peso) }}" id="peso" placeholder="Peso">
            {!! $errors->first('peso', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="repeticion_maxima" class="form-label">{{ __('Repeticionmaxima') }}</label>
            <input type="number" name="repeticionMaxima" class="form-control @error('repeticionMaxima') is-invalid @enderror" value="{{ old('repeticionMaxima', $weighlifting?->repeticionMaxima) }}" id="repeticion_maxima" placeholder="Repeticionmaxima">
            {!! $errors->first('repeticionMaxima', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha" class="form-label">{{ __('Fecha') }}</label>
            <input type="date" name="fecha" class="form-control @error('fecha') is-invalid @enderror" value="{{ old('fecha', $weighlifting?->fecha) }}" id="fecha" placeholder="Fecha">
            {!! $errors->first('fecha', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
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