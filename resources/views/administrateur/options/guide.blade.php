@extends('layouts.administrateur')


@section('styles')
<link href="{{ asset('assets/admin/bower_components/dragula.js/dist/dragula.min.css') }}" rel="stylesheet">
<link href="https://unpkg.com/video.js/dist/video-js.css" rel="stylesheet">
@livewireStyles
@endsection

@section('content')

<livewire:video-player-wire />

@endsection


@section('scripts')

@livewireScripts
@endsection
