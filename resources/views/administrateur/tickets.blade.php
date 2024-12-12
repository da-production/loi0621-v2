@extends('layouts.administrateur')

@section('content')
@section('styles')
    @livewireStyles()
@endsection
<div class="support-index">
            
    <livewire:administrateur.ticket-liste-wire />
    <div class="support-ticket-content-w">
        <div class="support-ticket-content">
            <div class="support-ticket-content-header">
                <h3 class="ticket-header">
                    Messages
                </h3>
            </div>
            <livewire:administrateur.ticket-thread-wire />
        </div>
        <livewire:administrateur.ticket-infor-wire />
    </div>
</div>
@endsection

@section('scripts')
    @livewireScripts()
@endsection