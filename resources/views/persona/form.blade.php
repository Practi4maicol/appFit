<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $persona?->nombre) }}" id="nombre" placeholder="Nombre">
            {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="apellido" class="form-label">{{ __('Apellido') }}</label>
            <input type="text" name="apellido" class="form-control @error('apellido') is-invalid @enderror" value="{{ old('apellido', $persona?->apellido) }}" id="apellido" placeholder="Apellido.">
            {!! $errors->first('apellido', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="edad" class="form-label">{{ __('Ingrese fecha de nacimiento') }}</label><!--Para cambiar etiqueta del casillero-->
            <input type="date" name="edad" class="form-control @error('edad') is-invalid @enderror" value="{{ old('edad', $persona?->edad) }}" id="edad" placeholder="Edad"><!--Para cambiar inf del casillero-->
            {!! $errors->first('edad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="peso" class="form-label">{{ __('Peso') }}</label>
            <input type="text" name="peso" class="form-control @error('peso') is-invalid @enderror" value="{{ old('peso', $persona?->peso) }}" id="peso" placeholder="Peso">
            {!! $errors->first('peso', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="altura" class="form-label">{{ __('Altura') }}</label>
            <input type="text" name="altura" class="form-control @error('altura') is-invalid @enderror" value="{{ old('altura', $persona?->altura) }}" id="altura" placeholder="Altura">
            {!! $errors->first('altura', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="inicio_entrenamiento" class="form-label">{{ __('Inicioentrenamiento') }}</label>
            <input type="date" name="inicioEntrenamiento" class="form-control @error('inicioEntrenamiento') is-invalid @enderror" value="{{ old('inicioEntrenamiento', $persona?->inicioEntrenamiento) }}" id="inicio_entrenamiento" placeholder="Inicioentrenamiento">
            {!! $errors->first('inicioEntrenamiento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
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