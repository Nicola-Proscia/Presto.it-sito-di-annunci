<x-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 my-5 ">
                <h1 class="text-center display-5">
                    {{ $announcement_to_check ? __('ui.adv1') : __('ui.noAdv') }}
                </h1>

            </div>
        </div>
    </div>

    @if (session()->has('message'))
        <div class="alert alert-success text-center">{{ session('message') }}</div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-12">

                @if ($announcement_to_check)
                    <livewire:show-announcement :announcement="$announcement_to_check" />

                    <div class="col-12 d-flex justify-content-around mb-5">

                        <form
                            action="{{ route('revisor.reject_announcement', ['announcement' => $announcement_to_check]) }}"
                            method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-danger text-blackCus"><i
                                    class="fa-solid fa-x"></i></button>
                        </form>
                        <form
                            action="{{ route('revisor.accept_announcement', ['announcement' => $announcement_to_check]) }}"
                            method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success text-blackCus"><i
                                    class="fa-solid fa-check"></i></button>
                        </form>

                    </div>
                @endif

            </div>

        </div>

    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 ">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('ui.User')}}</th>
                                <th scope="col">{{ __('ui.title')}}</th>
                                <th scope="col">{{ __('ui.Category')}}</th>
                                <th scope="col">{{ __('ui.price')}}</th>
                                <th scope="col">{{ __('ui.Cancel')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($announcements as $announcement)
                                <tr>
                                    <th scope="row">{{ $announcement->user->name }}</th>
                                    <td>{{ $announcement->title }}</td>
                                    <td>{{ $announcement->category->name }}</td>
                                    <td>{{ $announcement->price }}</td>
                                    <td>
                                        <form action="{{ route('revisor.undo_announcement', compact('announcement')) }}"
                                            method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-warning text-blackCus"><i
                                                    class="fa-solid fa-arrow-rotate-left"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>

        </div>
    </div>

</x-layout>
