{{-- card visualizzazione revisore e non --}}


<div>

    <div class="container cardCus my-5 mx-2">
        <div class="row d-flex align-items-center">
            <div class="col-12 col-md-6">
                <div id="carouselExample" class="carousel slide carouselcus">
                    @if (count($announcement_to_check->images))
                        <div class="carousel-inner my-5 rounded-5">
                            @foreach ($announcement_to_check->images as $image)
                                <div class="carousel-item active">
                                    <img src= "{{ $image->getUrl(800, 600) }}" class="d-block w-100 rounded-5"
                                        alt="immagine annuncio">
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div>
                            <img src="/img/default.jpg" class="d-block w-100" alt="immagine default">
                        </div>

                    @endif
                    {{-- bottoni --}}
                    <button class="carousel-control-prev text-whiteCus" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next text-whiteCus" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    {{-- fine bottoni --}}
                </div>
            </div>

         {{-- informazioni prodotto --}}
            <div class="col-12 col-md-5 infoprod">
                <h2 class="mt-3 fw-bold display-4 ">{{ $announcement_to_check->title }}</h2>
                <p class="">{{ __('ui.Category') }} {{ $announcement_to_check->category->name }}</p>
                <p class=" priceCus">{{ $announcement_to_check->price }}€</p>
                <p class="min-30vh">{{ __('ui.description') }} {{ $announcement_to_check->body }}</p>
                <p class="">{{ __('ui.insert') }} {{ $announcement_to_check->created_at->format('d/m/Y') }}
                </p>
                <p class="">{{ __('ui.by') }} {{ $announcement_to_check->user->name }}</p>
            </div>

        </div>

        @auth
            @if (Auth::user()->is_revisor && count($announcement_to_check->images))
                <div class="row d-flex justify-content-center">
                    <div class="col-6">
                        {{--  tags immagini google ia --}}
                        <h5 class="mt-3">Tags</h5>
                        <div class="p-2">
                            @if ($image->labels)
                                @foreach ($image->labels as $label)
                                    <p class="d-inline">{{ $label }} - </p>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="col-6">
                        {{-- revisione immagini google ia --}}
                        <h5 class="">{{ __('ui.ContentEvaluation') }}</h5>
                        <div class="row">
                            <div class="col-6">
                                <p>{{ __('ui.Adult') }}: <span class="{{ $image->adult }}"></span></p>
                                <p>{{ __('ui.Violence') }}: <span class="{{ $image->violence }}"></span></p>
                                <p>{{ __('ui.Spoof') }}: <span class="{{ $image->spoof }}"></span></p>
                            </div>
            
                        <div class="col-6">
                            <p>{{ __('ui.medical') }}: <span class="{{ $image->medical }}"></span></p>
                            <p>{{ __('ui.racy') }}: <span class="{{ $image->racy }}"></span></p>
                        </div>

                    </div>
                    </div>
                </div>
        </div>
        @endif
    @endauth

</div>
