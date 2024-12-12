@extends('layouts.administrateur')


@section('styles')
@livewireStyles()
@endsection

@section('content')


<div class="element-wrapper">
    <div class="element-box-tp" x-data="{tab:'all'}">
        <h5 class="form-header">
            Stepers
        </h5>
        <div>
            <div class="element-box" x-show="tab === 'all'">
                <livewire:administrateur.steper-wire />
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @livewireScripts()
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
@endsection