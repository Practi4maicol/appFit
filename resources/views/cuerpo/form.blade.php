<div class="row padding-1 p-1">
    <div class="col-md-12">
        <!-- Campo oculto de user_id  
        <div class="form-group mb-2 mb20">
            <label for="user_id" class="form-label">{{ __('User Id') }}</label>
            <input type="text" name="user_id" class="form-control @error('user_id') is-invalid @enderror" value="{{ old('user_id', $cuerpo?->user_id) }}" id="user_id" placeholder="User Id">
            {!! $errors->first('user_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
                   -->
        <div class="form-group mb-2 mb20">
            <label for="bicep_der" class="form-label">{{ __('Bicepder') }}</label>
            <input type="text" name="bicepDer" class="form-control @error('bicepDer') is-invalid @enderror" value="{{ old('bicepDer', $cuerpo?->bicepDer) }}" id="bicep_der" placeholder="Bicepder">
            {!! $errors->first('bicepDer', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="bicep_izq" class="form-label">{{ __('Bicepizq') }}</label>
            <input type="text" name="bicepIzq" class="form-control @error('bicepIzq') is-invalid @enderror" value="{{ old('bicepIzq', $cuerpo?->bicepIzq) }}" id="bicep_izq" placeholder="Bicepizq">
            {!! $errors->first('bicepIzq', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="pecho" class="form-label">{{ __('Pecho') }}</label>
            <input type="text" name="pecho" class="form-control @error('pecho') is-invalid @enderror" value="{{ old('pecho', $cuerpo?->pecho) }}" id="pecho" placeholder="Pecho">
            {!! $errors->first('pecho', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="abdomen" class="form-label">{{ __('Abdomen') }}</label>
            <input type="text" name="abdomen" class="form-control @error('abdomen') is-invalid @enderror" value="{{ old('abdomen', $cuerpo?->abdomen) }}" id="abdomen" placeholder="Abdomen">
            {!! $errors->first('abdomen', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="pierna_der" class="form-label">{{ __('Piernader') }}</label>
            <input type="text" name="piernaDer" class="form-control @error('piernaDer') is-invalid @enderror" value="{{ old('piernaDer', $cuerpo?->piernaDer) }}" id="pierna_der" placeholder="Piernader">
            {!! $errors->first('piernaDer', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="pierna_izq" class="form-label">{{ __('Piernaizq') }}</label>
            <input type="text" name="piernaIzq" class="form-control @error('piernaIzq') is-invalid @enderror" value="{{ old('piernaIzq', $cuerpo?->piernaIzq) }}" id="pierna_izq" placeholder="Piernaizq">
            {!! $errors->first('piernaIzq', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nalgas" class="form-label">{{ __('Nalgas') }}</label>
            <input type="text" name="nalgas" class="form-control @error('nalgas') is-invalid @enderror" value="{{ old('nalgas', $cuerpo?->nalgas) }}" id="nalgas" placeholder="Nalgas">
            {!! $errors->first('nalgas', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="pantorrillas" class="form-label">{{ __('Pantorrillas') }}</label>
            <input type="text" name="pantorrillas" class="form-control @error('pantorrillas') is-invalid @enderror" value="{{ old('pantorrillas', $cuerpo?->pantorrillas) }}" id="pantorrillas" placeholder="Pantorrillas">
            {!! $errors->first('pantorrillas', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha" class="form-label">{{ __('Fecha') }}</label>
            <input type="date" name="fecha" class="form-control @error('fecha') is-invalid @enderror" value="{{ old('fecha', $cuerpo?->fecha) }}" id="fecha" placeholder="Fecha">
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