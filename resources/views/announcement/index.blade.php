<x-layout   >
    <div class="text-center my-5">
        <h1 class="display-2">{{__('ui.searchResult')}}</h1>
@if($searched != __('ui.Search'))
        <h3>"{{"$searched"}}"</h3>
@endif
    </div>
    <livewire:index />
</x-layout>
