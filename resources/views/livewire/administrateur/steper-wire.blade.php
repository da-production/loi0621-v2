
<div x-sort="$wire.sort($item,$posistion)">
    <style>
        .option-item-wire {
            padding: 10px 15px;
            border-radius: 10px;
            border: 2px dashed #dde2ec;
            margin-bottom: 10px;
            background-color: #fbfbfb;
        }
        .h-full{
            height: 100%;
        }
    </style>
    
    @foreach ($stepers as $steper)
    <form class=" option-item-wire" x-sort:item="{{ $steper->id }}" wire:key="{{ $steper->id }}" >
        <input type="hidden" name="id" value="{{ $steper->id }}">
        <div class="row">
            <div class="col-12 mb-2">
                <label for="for-{{  $steper->name }}"> {{  $steper->name }}</label>
            </div>
            <div class="col-sm-10">
                <div class="form-group d-flex flex-column justify-content-between h-full">
                    <input  type="text" class="form-control mb-2" name="content_fr" value="{{ $steper->content_fr }}" id="for-{{  $steper->name }}">
                    <input  type="text" class="form-control " name="content_ar" value="{{ $steper->content_ar }}" id="for-{{  $steper->name }}">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group h-full">
                    <button class="btn btn-primary w-100 py-2 h-full">{{ ucfirst(__('app.update')) }}</button>
                </div>
            </div>
        </div>
    </form>
    @endforeach

</div>
