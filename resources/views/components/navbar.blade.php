<nav class="navbar navbar-expand-lg navcus col-12 fixed-top">
    <div class="container-fluid bg-blackCus">
        
        <a class="nav-link mx-2" aria-current="page" href="/"><img src="/img/logo/logopresto.png" class="logoCus" alt=""></a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
        </button>
        <div class="collapse navbar-collapse bg-blackCus" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li>
                    <a class="nav-link text-whiteCus" href="{{ route('announcement.index') }}">{{__('ui.Announcements')}}</a>
                </li>
                {{-- dropdown categorie --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-whiteCus" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{__('ui.Categories')}}
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                        
                            <li>
                                    <a class="dropdown-item"
                                    href="{{ route('category.show', $category->id) }}">{{ __("ui.$category->name") }}</a>
                            </li>
                            @if(!$loop->last)
                                    <hr class="dropdown-divider">
                            
                            @endif
                        @endforeach
                    </ul>
                </li>
            </ul>

            {{-- Barra di ricerca --}}
            <form class="d-flex" role="search" action="{{ route('search.announcement') }}" method="GET">
                <input id="searched" name="searched" class="form-control me-2" type="search" placeholder={{__('ui.Search')}} aria-label="Search" value="{{ old('searched') }}"><button class="btn border-sec btnSearch"><i
                        class="fa-solid fa-magnifying-glass text-sec"></i></button>
            </form>


            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 navresponsive ">
                
                    {{-- dropdown bandierine lingue --}}
                    <li class="nav-item dropdown mx-2">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-earth-americas fa-2x"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <x-_locale lang="it"/>
                            <x-_locale lang="en"/>
                            <x-_locale lang="ja"/>
                        </ul>
                    </li>

                    {{-- login/registra/logout --}}
                    @if (Auth::user() != null)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            
                            <i class="fa-solid fa-user mx-1"></i>{{ Auth::user()->name }} 
                            @auth 
                            @if (Auth::user()->is_revisor)
                            <span
                            class="translate-middle badge rounded-pill bg-sec text-blackCus">
                            {{ App\Models\Announcement::toBeRevisionedCount() }}
                            <span class="visually-hidden ">
                                {{__('ui.Message unread')}}
                            </span>
                        </span>
                            @endif
                        @endauth
                        </a>

                    </span>
                        <ul class="dropdown-menu">
                            {{-- area revisore --}}
                            @auth<div class="">
                                @if (Auth::user()->is_revisor)
                                    <li class="nav-item">
                                        <a class="nav-link text-sec" href="{{ route('revisor.index') }}">{{__('ui.Revisor Area')}}
                                            <span
                                                class="position-absolute start-75 translate-middle badge mx-2 rounded-pill bg-sec text-blackCus">
                                                {{ App\Models\Announcement::toBeRevisionedCount() }}
                                                <span class="visually-hidden">
                                                    {{__('ui.Message unread')}}
                                                </span>
                                            </span>
        
                                        </a>
                                    </li>
                                @endif
                            @endauth
                            @if (Auth::user()->is_revisor)
                                <li><hr class="dropdown-divider"></li>
                            @endif

                            {{-- area riservata dashboard utente  --}}
                            {{-- <li><a class="nav-link dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li><hr class="dropdown-divider"></li> --}}
                            
                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="nav-link text-whiteCus ">Log Out</button>
                                </form>
                            </li>
                            
                            
                        </ul>
                    </li>
                        {{-- Pulsante aggiungi un annuncio --}}
                        <li class="nav-item">
                            <a class=" nav-link createCus"
                                href="{{ route('announcement.create') }}">{{__('ui.Add Announcement')}}</a>
                        </li>

                        {{-- Registrati/log in --}}
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-whiteCus" href="{{ route('register') }}">{{__('ui.Register')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-whiteCus" href="{{ route('login') }}">Log In</a>
                        </li>
                    @endif
                </div>
                
                
            </ul>

        </div>
    </div>
</nav>
