<div>
    @if ($canMakeNewRequest)
<div class="alert alert-info">
    <h3>Bienvenue sur votre espace</h3>
    <p><b></b></p>
</div>
<div class="alert alert-warning">
    <h5 class="d-flex align-items-center ">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="none"><path fill="currentColor" fill-opacity=".16" d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2"/><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5" d="M12 16h.008M12 8v5m10-1c0-5.523-4.477-10-10-10S2 6.477 2 12s4.477 10 10 10s10-4.477 10-10"/></g></svg>
        <strong class="ml-1">Note</strong></h5>
        @if (!is_null($note))
            <p>{{ $note }}</p>
        @endif
</div>
<div class="element-wrapper mb-0 pb-0">
    <div class="element-box mw" data-step="2" data-intro="Dans cet onglet, vous pouvez créer une demande de subvention ou de formation. Vous ne pouvez pas créer une deuxième demande tant que votre précédente demande n'a pas été traitée.">
        <div class="element-info">
            <div class="element-info-with-icon">
                <div class="element-info-icon">
                    <div class="os-icon os-icon-plus-circle"></div>
                </div>
                <div class="element-info-text">
                    <h5 class="element-inner-header">
                        Créer une demande
                    </h5>
                </div>
            </div>
        </div>
        <form wire:submit.prevent="store" class="mt-5">
            <div class="row">
                <div class="form-group app-label col-md-6">
                    <div class="form-group">
                        <select class="form-control" wire:model="type" id="type">
                            <option>Type de mesure</option>
                            @if (is_null($subvention) || !is_null($subAnnuler))
                            <option value="1">Subvention</option>
                            @endif
                            @if (is_null($formation) || !is_null($formAnnuler))
                            <option value="2">Formation</option>
                            @endif
                        </select>
                        @error('type')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input class="form-control" wire:model=""
                            required="required" type="number" id="nbr_t" placeholder="Nbr travailleurs">
                        @error('nbr_travailleurs')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group app-label">
                        <label class="text-muted-2" for="date_exercice">Date exercice <span class="text-muted">(Année de
                                recrutement)</span> </label>
                        <input wire:model="date_exercice"
                            type="text"
                            class="form-control resume"
                            placeholder="aaaa-mm-jj" autocomplete="off" id="date_exercice">

                        @error('date_exercice')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group app-label">
                        <label class="text-muted-2" for="date_demande"></label>
                        <input value="{{ Date('Y-m-d') }}" data-toggle="datepicker" type="text"
                            class="form-control datepicker resume"
                            placeholder="YYYY-DD-MM" autocomplete="off" id="date_demande" disabled readonly>
                    </div>
                </div>
            </div>
            <div class="form-buttons-w">
                <button class="btn btn-primary" type="submit"> Ajouter</button>
            </div>
        </form>
    </div>
</div>
@else
<div class="alert alert-info">
    <h3>Bienvenue sur votre espace</h3>
    <br>
    <p><b>Pour votre information, vous ne pouvez pas effectuer de nouvelle Demande tant que votre dernière demande na
            pas encore été traitée et clôturée.</b></p>
</div>

@endif

</div>