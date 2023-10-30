<x-layout>
    <div class="row m-0">
        <div class="col-12 my-5">
            @if(session()->has('message')) 
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <livewire:create-announcement />
        </div>
    </div>
</x-layout>