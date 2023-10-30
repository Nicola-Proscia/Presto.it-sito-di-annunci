<div>

    {{-- card ultimi annunci --}}
    <div class="container-fluid">
        <div class="row">
            @foreach ($announcements as $announcement)
            <div class="col-6 col-md-3 my-3 d-flex justify-content-center text-center">
                <div class="card cardAllAnnouncements" style="width: 18rem;">
                    <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images->first()->getUrl(800, 600) : '/img/default.jpg'}}" class="card-img-top" alt="immagine articolo">
                    <div class="card-body">
                        <h5 class="card-title">{{$announcement->title}}</h5>
                        <p class="card-text">{{__('ui.Created')}} {{$announcement->created_at->format('d/m/Y')}}</p>
                        <p class="card-text text-sec2 priceCard">{{$announcement->price}} €</p>
                        <p class="card-text my-2">{{__('ui.Category')}} {{$announcement->category->name}}</p>
                        <div class="d-flex justify-content-center ">
                            <a href="{{route('announcement.show', $announcement->id)}}" class="btnAllAnnouncement"><button class="btnAllAnnouncementHref">{{__('ui.viewCard')}}</button></a>
                        </div>
                        
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
