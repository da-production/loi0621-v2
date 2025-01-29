@extends('layouts.administrateur')


@section('styles')
@livewireStyles()
@endsection

@section('content')


<div class="element-wrapper">
    <div class="element-box-tp" x-data="{tab:'Option'}">
        <h5 class="form-header">
            Options
        </h5>
        <div class="element-box-tp">
            <div class="os-tabs-w mx-4">
                <div class="os-tabs-controls">
                    <ul class="nav nav-tabs upper">
                        <li class="nav-item">
                            <a aria-expanded="false" class="nav-link active show" data-toggle="tab"
                                href="javascript:void(0)" @click="tab='Option'"> App</a>
                        </li>
                        <li class="nav-item">
                            <a aria-expanded="false" class="nav-link" data-toggle="tab" href="javascript:void(0)" @click="tab='Administrateur'">
                                Administrateur</a>
                        </li>
                        <li class="nav-item">
                            <a aria-expanded="false" class="nav-link" data-toggle="tab" href="javascript:void(0)" @click="tab='User'">
                                Employeur</a>
                        </li>
                    </ul>
                    </ul>
                </div>
            </div>
        </div>
        <div>
            <div class="element-box" x-show="tab === 'Option'">
                @foreach ($options as $option)
                    @if ($option->instance == 'Option')
                        <livewire:option-item-wire  :option='$option' />
                    @endif
                @endforeach
            </div>

            <div class="element-box" x-show="tab === 'Administrateur'">
                @foreach ($options as $option)
                    @if ($option->instance == 'Administrateur')
                        <livewire:option-item-wire  :option='$option' />
                    @endif
                @endforeach
            </div>

            <div class="element-box" x-show="tab === 'User'">
                @foreach ($options as $option)
                    @if ($option->instance == 'User')
                        <livewire:option-item-wire  :option='$option' />
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @livewireScripts()
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
@endsection