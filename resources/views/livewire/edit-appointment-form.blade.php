<div class="card">
    <form wire:submit.prevent="submit">
        <div>
            <div class="card-body">
                <div class="container">
                    <div class="row mb-4">
                        <div class="card-title">{{ $pages[$currentPage]['heading'] }}</div>
                    </div>

                    <div class="row">
                     
                        @if ($currentPage == 1)
                            <div class="col">
                                <div class="form-group">
                                    <label for="firstname">Nombre</label>
                                    <input wire:model.lazy="firstname" value="{{old('firstname', $firstname)}}" type="text" class="form-control @error('firstname') is-invalid @enderror" id="firstname" name="firstname" >
                                    <div class="invalid-feedback">
                                        @error('firstname')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="lastname">Apellido</label>
                                    <input wire:model.lazy="lastname" value="{{old('lastname', $lastname)}}" type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastname" name="lastname" >
                                    <div class="invalid-feedback">
                                        @error('lastname')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email">Correo</label>
                                    <input wire:model.lazy="email" value="{{old('email', $email)}}" type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" >
                                    <div class="invalid-feedback">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="phone">Telefono</label>
                                    <input wire:model.lazy="phone" value="{{old('phone', $phone)}}" type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone">
                                   
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
                                    <input wire:model.lazy="address" value="{{old('address', $address)}}" type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" >
                                    <div class="invalid-feedback">
                                        @error('address')
                                            {{ $message }}
                                        @enderror
                                   </div>
                                </div>

                                <div class="form-group">
                                    <label for="province">Provincia</label>
                                    <input wire:model.lazy="province" value="{{old('province', $province)}}" type="text" class="form-control @error('province') is-invalid @enderror" id="province" name="province" >
                                    <div class="invalid-feedback">
                                        @error('province')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="area">Sector</label>
                                    <input wire:model.lazy="area" value="{{old('area', $area)}}" type="text" class="form-control @error('area') is-invalid @enderror" id="area" name="area">
                                    <div class="invalid-feedback">
                                        @error('area')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="comment">Comentario</label>
                                    <textarea wire:model.lazy="comment"  class="form-control @error('comment') is-invalid @enderror" id="comment" name="comment">
                                        {{ old('comment', $comment) }}
                                    </textarea>
                                    <div class="invalid-feedback">
                                        @error('comment')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            
                            </div>
                    
                        @elseif ($currentPage == 2)
                            <div class="col">
                                <div class="form-group">
                                    <label for="service_id">Servicio</label>
                                    <select wire:model.lazy="service_id" name="service_id" id="service_id" class="custom-select @error('service_id') is-invalid @enderror">
                                        <option value="" selected>-- Seleccionar servicio -- </option>
                                        @foreach ($services as $service)
                                            <option value="{{ $service->id }}" selected="{{ old('service_id', $service_id == $service->id) }}">{{$service->title}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('service_id')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                  
                                </div>

                                <div class="form-group">
                                    <label for="beautician_id">Esteticista</label>
                                    <select wire:model.lazy="beautician_id" name="beautician_id" id="beautician_id" class="custom-select @error('beautician_id') is-invalid @enderror">
                                        <option value="" selected>-- Seleccionar esteticista -- </option>    
                                        @foreach ($beauticians as $beautician)
                                            <option value="{{ $beautician->id }}" selected="{{ old('beautician_id', $beautician_id == $beautician->id) }}">{{$beautician->firstname}} {{$beautician->lastname}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('beautician_id')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                 
                                </div>
                            </div>

                        
                        @elseif ($currentPage == 3)
                            <div class="col">
                                <div class="form-group">
                                    <label for="taken_date">Horario</label>
                                    <input wire:model.lazy="taken_date" value="{{old('taken_date', $taken_date)}}"type="date" class="form-control @error('taken_date') is-invalid @enderror" name="taken_date"/>
                                    
                                    <div class="invalid-feedback">
                                        @error('taken_date')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
            <div class="card-footer d-flex">

            
        
                <div class="flex-grow-1">
                    @if ($currentPage == 1)
                        <div></div>
                    @else
                        <button wire:click="goToPreviousPage()" type="button" class="btn btn-secondary">
                            Atras
                        </button> 
                    @endif
                </div>


                <div>
                    @if ($currentPage == count($pages))
                        <button type="submit" class="btn btn-success">
                            Guardar
                        </button>
                    @else
                        <button wire:click="goToNextPage()" type="button" class="btn btn-primary">
                            Continuar
                        </button> 
                    @endif
                </div>
            </div>
        </div>
    </form>
</div>
