<x-layout>
    <div class="container-fluid ">
        <div class="row text-center">
            <div class="col-12">
                <div>
                    
                    @if(session()->has('message')) 
                    <div class="alert alert-success">{{ session('message') }}</div>
                    @else 
                    <h2 class="text-warning">{{ session(__('ui.insertnot')) }}</h2>
                    @endif
                    
                    @if(session()->has('accessDenied')) 
                    <div class="alert alert-danger">{{ session('accessDenied') }}</div>
                    @endif 
                    
                </div>
                <x-header />
            </div>
        </div>
    </div>
    
    <section class="container-fluid">
        
        <div class="row d-flex justify-content-center align-items-center text-center my-5">
            <div class="col-12">
                <h2 class="h2cus" id="numeriIntersection"> "{{__('ui.slogan')}}!"</h2>
            </div>
            
            
        </div>
        
        <div class="row d-flex p-5 align-items-center text-center my-5 numberCus">
            
            <div class="col-12 col-md-4">
                <p class="lead">
                    <span class="spanCus">+</span>
                    <span id="firstSpan" class="increments-numbers">
                        0
                    </span>
                    <span class="textCus">{{__('ui.clients')}}</span>
                </p>
            </div>
            
            <div class="col-12 col-md-4">
                <p class="lead"> 
                    <span class="spanCus">+</span>
                    <span id="secondSpan" class="increments-numbers">
                        0
                    </span>
                    <span class="textCus">% {{__('ui.satisfaction')}}</span>
                </p>
            </div>
            
            <div class="col-12 col-md-4">
                <p class="lead">
                    <span class="spanCus">+</span>
                    <span id="thirdSpan" class="increments-numbers">
                        0
                    </span>
                    <span class="textCus">{{__('ui.expedition')}}</span>
                </p>
            </div>
            
        </div>
    </section>

    {{-- Ultimi annunci --}}
    <div class="container-fluid my-4">
        <div class="row text-center">
            <div class="col-12">
                <h2 class="display-4">{{__('ui.LastAnn')}}</h2>
            </div>
        </div>
    </div>
    
    <livewire:announcement-card />
    
</x-layout>