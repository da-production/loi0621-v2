@extends('layouts.administrateur')

@section('content')

@section('styles')
@livewireStyles()
@endsection


<div class="element-wrapper">
  <livewire:administrateur.demande-datatable entity="subvention"   />
</div>
@endsection

@section('scripts')
    @livewireScripts()
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
@endsection