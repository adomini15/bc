<div class="card">
    <form wire:submit.prevent="submit">
        <div>
            <div class="card-body">
                <div class="container">
                    <div class="row mb-4">
                        <div class="card-title">Datos Personales</div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="firstname">Nombre</label>
                                <input wire:model.lazy="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" id="firstname" name="firstname" >
                                <div class="invalid-feedback">
                                    @error('firstname')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="lastname">Apellido</label>
                                <input wire:model.lazy="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastname" name="lastname" >
                                <div class="invalid-feedback">
                                    @error('lastname')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email">Correo</label>
                                <input wire:model.lazy="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" >
                                <div class="invalid-feedback">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="phone">Telefono</label>
                                <input wire:model.lazy="phone" type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone">
                                
                                <div class="invalid-feedback">
                                    @error('phone')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="address">Direccion</label>
                                <input wire:model.lazy="address" type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" >
                                <div class="invalid-feedback">
                                    @error('address')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="province">Provincia</label>
                                <input wire:model.lazy="province" type="text" class="form-control @error('province') is-invalid @enderror" id="province" name="province" >
                                <div class="invalid-feedback">
                                    @error('province')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="area">Sector</label>
                                <input wire:model.lazy="area" type="text" class="form-control @error('area') is-invalid @enderror" id="area" name="area">
                                <div class="invalid-feedback">
                                    @error('area')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="comment">Comentario</label>
                                <textarea wire:model.lazy="comment" class="form-control @error('comment') is-invalid @enderror" id="comment" name="comment"></textarea>
                                <div class="invalid-feedback">
                                    @error('comment')
                                        {{ $message }}
                                    @enderror
                                </div>
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
