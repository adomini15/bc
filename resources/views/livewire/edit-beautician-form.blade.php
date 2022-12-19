<div class="card">
    <form wire:submit.prevent="submit">
        <div>
            <div class="card-body">
                <div class="container">
                    <div class="row mb-4">
                        <div class="card-title">Esteticista</div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label for="firstname">Nombre</label>
                            <input value="{{old('firstname', $firstname)}}" wire:model.lazy="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" id="firstname" name="firstname" >
                            <div class="invalid-feedback">
                                @error('firstname')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label for="lastname">Apellido</label>
                            <input value="{{old('lastname', $lastname)}}" wire:model.lazy="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastname" name="lastname" >
                            <div class="invalid-feedback">
                                @error('lastname')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label for="description">Descripción</label>
                            <textarea wire:model.lazy="description" class="form-control @error('description') is-invalid @enderror" id="description" name="description">
                                {{old('description', $description)}}
                            </textarea>
                            <div class="invalid-feedback">
                                @error('description')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">
                    Guardar
                </button>
            </div>
        </div>
    </form>
</div>