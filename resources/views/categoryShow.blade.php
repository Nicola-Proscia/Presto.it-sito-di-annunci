<x-layout>
    <div>
        {{-- card dentro tutte le categorie singole --}}

        <div class="container-fluid">
            <div class="row">
                <h1 class="text-center display-1 my-3 ">{{ __('ui.announcement by') }} "{{ __("ui.$category->name") }}"</h1>
                @forelse ($category->announcements->sortByDesc('created_at') as $announcement)
                    @if ($announcement->is_accepted)
                        <div class="col-6 col-md-3 my-5 d-flex justify-content-center text-center">
                            <div class="card cardAllAnnouncements" style="width: 18rem;">
                                <img src="{{ !$announcement->images()->get()->isEmpty()? $announcement->images->first()->getUrl(800, 600): '/img/default.jpg' }}"
                                    class="card-img-top" alt="immagine articolo">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $announcement->title }}</h5>
                                    <p class="card-text">{{ __('ui.Created') }}
                                        {{ $announcement->created_at->format('d/m/Y') }}</p>
                                    <p class="card-text text-sec2 priceCard">{{ $announcement->price }} €</p>
                                    <p class="card-text my-2">{{ __('ui.Category') }}
                                        {{ __("ui.$category->name") }}</p>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('announcement.show', $announcement->id) }}"
                                            class="btnAllAnnouncement "><button
                                                class="btnAllAnnouncementHref">{{ __('ui.viewCard') }}</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @empty
                    <div class="col-12 d-flex flex-column  align-items-center">
                        <h4 class="my-5 display-5">{{ __('ui.no announcements') }}</h4>
                        <p class="h2 py-5">{{ __('ui.public') }} <a href="{{ route('announcement.create') }}"
                                class="btn btn-sec text-black">{{ __('ui.newAnnouncement') }}</a></p>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
</x-layout>
