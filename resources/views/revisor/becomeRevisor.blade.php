<x-layout>
    @if(session()->has('message')) 
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif 
    <div class="container-fluid form-container d-flex justify-content-center align-items-center my-5">
        <div class="row">
            <div class="col-12">
                
                <h1>{{__('ui.Work')}}</h1>
                <form method="POST" action="{{ route('revisor.update', ['user' => Auth::user()]) }}">
                    @method('PUT')
                    @csrf
                    <p>{{__('ui.revisor-question')}}</p>
                    <div class="form-control-cus">
                        <input type="string" class="form-control" id="surname" name="surname" required>
                        <label for="surname"class="form-label @error('surname') is-invalid @enderror text-whiteCus">{{__('ui.surname')}}</label>
                        @error('surname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-control-cus">
                        <input type="sring" class="form-control @error('iban') is-invalid @enderror"
                        id="iban" name="iban" required>
                        <label for="iban" class="form-label text-whiteCus">IBAN:</label>
                        @error('iban')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-control-cus">
                        <label for="descrizione" class="form-label"></label>
                        <textarea placeholder='{{__('ui.about-you')}}' type="text" class="bg-transparent form-control" id="descrizione" name="descrizione" wire:model.live="descrizione" required></textarea>
                        @error('descrizione')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                        <button  type="submit" class="login-btn btn my-3">{{__('ui.send')}}</button>
                </form>
                
            </div>
        </div>
        
    </div>
</x-layout>