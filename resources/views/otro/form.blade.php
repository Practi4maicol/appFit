<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="descripción" class="form-label">{{ __('Descripción') }}</label>
            <input type="text" name="descripción" class="form-control @error('descripción') is-invalid @enderror" value="{{ old('descripción', $otro?->descripción) }}" id="descripción" placeholder="Descripción">
            {!! $errors->first('descripción', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha" class="form-label">{{ __('Fecha') }}</label>
            <input type="date" name="fecha" class="form-control @error('fecha') is-invalid @enderror" value="{{ old('fecha', $otro?->fecha) }}" id="fecha" placeholder="Fecha">
            {!! $errors->first('fecha', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="datos_finales" class="form-label">{{ __('Datosfinales') }}</label>
            <input type="text" name="datosFinales" class="form-control @error('datosFinales') is-invalid @enderror" value="{{ old('datosFinales', $otro?->datosFinales) }}" id="datos_finales" placeholder="Datosfinales">
            {!! $errors->first('datosFinales', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
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