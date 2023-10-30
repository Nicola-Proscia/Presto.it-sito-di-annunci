<x-layout>
    
    
    <div class="container py-5 my-5">
        <div class="row">
            <div class="col-4 col-md-4 text-center">
                <div class="card" style="width: 18rem;">
                    <img class="userImg mx-5 my-3  " src="/img/userdefaultimg.png" class="card-img-top" alt="immagine">
                    <div class="card-body">
                        
                        <h5 class="card-title my-4">{{$user->name}}</h5>
                        @if(Auth::user()->is_revisor)
                        <h5>Revisore</h5>
                        <p class="card-text my-4 ">informazioni generiche tipo indirizzo di casa</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-7 d-flex flex-column border">
                <p class="margin my-3">{{__('ui.name')}}  {{$user->name}}</p>
                <p class="margin my-3">E-mail: {{$user->email}}</p> 
                <p class="margin my-3">IBAN:{{$user->iban}}</p>
                <p class="margin my-3">{{__('ui.description')}} {{$user->descrizione}}</p>
                @if(Auth::user()->is_revisor)
                <p>
                    
                    <i class="fa-solid fa-pen-to-square"></i><a class="btnAllAnnouncement" href="{{route ('revisor.index')}}"> Gestisci articoli</a> 
                    
                    
                    <span
                    class="translate-middle badge rounded-pill bg-sec text-blackCus mx-3 my-3">
                    {{ App\Models\Announcement::toBeRevisionedCount() }}
                    <span class="visually-hidden">
                        {{__('ui.Message unread')}}
                    </span>
                </span>
                
                
                
                
            </p>
            @endif
            
            
        </div>
        
    </div>

    @if(Auth::user()->user_id)
    <div class="col-12 text-center mt-4">
        <h2>{{__('ui.LastAnn')}}</h2>
        
        <livewire:announcement-card />
        
        
    </div>
    @endif
</div>
</div>











</x-layout>
