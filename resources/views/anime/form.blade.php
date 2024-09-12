<div class="form-group">
    <label for="Nombre">Nombre</label>
    <input type="text" name="Nombre" class="form-control" value="{{ isset($anime->Nombre) ? $anime->Nombre : old('Nombre') }}" id="Nombre">
</div>

<div class="form-group">
    <label for="Alias">Alias</label>
    <input type="text" name="Alias" class="form-control" value="{{ isset($anime->Alias) ? $anime->Alias : old('Alias') }}" id="Alias">
</div>

<div class="form-group">
    <label for="Edad">Edad</label>
    <input type="number" name="Edad" class="form-control" value="{{ isset($anime->Edad) ? $anime->Edad : old('Edad') }}" id="Edad">
</div>

<div class="form-group">
    <label for="Genero">Género</label>
    <input type="text" name="Genero" class="form-control" value="{{ isset($anime->Genero) ? $anime->Genero : old('Genero') }}" id="Genero">
</div>

<div class="form-group">
    <label for="Meta">Meta</label>
    <textarea name="Meta" class="form-control" id="Meta">{{ isset($anime->Meta) ? $anime->Meta : old('Meta') }}</textarea>
</div>

<div class="form-group">
    <label for="Foto">Foto</label>
    @if(isset($anime->Foto))
        <img src="{{ asset('storage/'.$anime->Foto) }}" alt="Anime Foto" width="100">
    @endif
    <input type="file" name="Foto" class="form-control" id="Foto">
</div>

<input type="submit" value="{{ $modo }} Anime" class="btn btn-success">
<a href="{{ url('anime') }}" class="btn btn-secondary">Regresar</a>
