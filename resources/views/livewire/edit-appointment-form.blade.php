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
                            <div class="form-group">
                                <label for="customer_id">Cliente</label>
                                <select wire:model.lazy="customer_id" name="customer_id" id="customer_id" class="custom-select @error('customer_id') is-invalid @enderror">
                                    <option value="" selected>-- Seleccionar cliente -- </option>    
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}" selected="{{ old('customer_id', $customer_id == $customer->id) }}">{{$customer->firstname}} {{$customer->lastname}} - ID: {{$customer->id}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    @error('customer_id')
                                        {{ $message }}
                                    @enderror
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
