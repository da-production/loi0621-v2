
<div class="option-item-wire">
    <style>
        .option-item-wire {
            padding: 10px 15px;
        border-radius: 10px;
        border: 2px dashed #dde2ec;
        margin-bottom: 10px;
        background-color: #fbfbfb;
        }
    </style>
    <form class="mb-1  p-0" wire:submit.prevent="update">
        <div class="row">
            <div class="col-sm-10">
                <div class="form-group">
                    <label for="for-{{ $option->id }}"> {{ ucfirst(__('app.'.$option->name)) }} </label>
                    @if ($option->type = 'text')
                        <input  type="{{ $option->widget }}" class="form-control {{ $option->class }}" wire:model="value"  id="for-{{ $option->id }}">
                    @endif
                    <input type="hidden" name="instance" value="{{ $option->instance }}">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group mt-4 pt-1">
                    <button class="btn btn-primary w-100 py-2">{{ ucfirst(__('app.update')) }}</button>
                </div>
            </div>
        </div>
    </form>
</div>
