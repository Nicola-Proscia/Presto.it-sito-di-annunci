<x-layout>
    <div>
        {{-- card di tutti gli annunci --}}
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 ">
                    <div class="text-center my-5">
                        <h1 class="display-2">{{__('ui.allAnnouncements')}}</h1>
                    </div>
                </div>
                @foreach ($announcements as $announcement)
                @if($announcement->is_accepted)
                <div class="col-6 col-md-3 my-3 d-flex justify-content-center text-center">
                    <div class="card cardAllAnnouncements " style="width: 18rem;">
                        <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images->first()->getUrl(800, 600) : '/img/default.jpg'}}" class="card-img-top" alt="immagine articolo">
                        <div class="card-body">
                            <h5 class="card-title ">{{$announcement->title}}</h5>
                            <p class="card-text">{{__('ui.Created')}} {{$announcement->created_at->format('d/m/Y')}}</p>
                            <p class="card-text text-sec2 priceCard">{{$announcement->price}} €</p>
                            <Span class="card-text my-2  text-center" >{{__('ui.Category')}} {{$announcement->category->name}}</p>
                                <div class="d-flex justify-content-center ">
                                    <a href="{{route('announcement.show', $announcement->id)}}" class=" btnAllAnnouncement  d-flex justify-content-end"><button class="btnAllAnnouncementHref">{{__('ui.viewCard')}}</button></a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    
                        <div class="mt-5 mb-2">
                            
                        </div>
                    
                </div>
            </div>
        </div>
    </x-layout>
    