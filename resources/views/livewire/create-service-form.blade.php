<div class="card">
    <form wire:submit.prevent="submit">
        <div>
            <div class="card-body">
                <div class="container">
                    <div class="row mb-4">
                        <div class="card-title">Servicio</div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label for="title">Título</label>
                            <input wire:model.lazy="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" >
                            <div class="invalid-feedback">
                                @error('title')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label for="description">Descripción</label>
                            <textarea wire:model.lazy="description" class="form-control @error('description') is-invalid @enderror" id="description" name="description"></textarea>
                            <div class="invalid-feedback">
                                @error('description')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label for="price">Precio</label>
                            <input wire:model.lazy="price" type="number" step=".01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" >
                            <div class="invalid-feedback">
                                @error('price')
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
