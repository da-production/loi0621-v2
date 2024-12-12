<form class="mt-5" wire:submit.prevent="update">
    @if($success)
        <div class="alert alert-success dont-print" wire:loading.remove>
            <b>les information on été mis à jour avec succès</b>
        </div>
    @endif
    <div class="element-info">
        <div class="element-info-with-icon">
            <div class="element-info-icon">
                <div class="os-icon os-icon-user"></div>
            </div>
            <div class="element-info-text">
                <h5 class="element-inner-header">
                    Employeur
                </h5>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="">Email d'entreprise</label>
        <input class="form-control" wire:model="email" required="required" type="email">
        @error('email')
        <div class="help-block text-danger form-text form-control-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="">Mob</label>
                <input class="form-control" wire:model="mob" required="required" type="text">
                @error('mob')
                <div class="help-block text-danger form-text form-control-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="">Tel</label>
                <input class="form-control" wire:model="tel" required="required" type="text">
                @error('tel')
                <div class="help-block text-danger form-text form-control-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-buttons">
        <button class="btn btn-primary" type="submit" wire:offline.attr="disabled"> Modifier</button>
    </div>
</form>
