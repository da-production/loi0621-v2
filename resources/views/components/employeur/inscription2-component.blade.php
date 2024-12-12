
<style>
    .text-muted-2{
        color: #161c2d;
    }
</style>
{{-- <form method="post" action="{{ $type == 'subvention' ? route('employeur.subvention.inscription.store') : route('employeur.formation.inscription.store') }}" name="contact-form" id="contact-form3"> --}}
    <form method="post" action="{{ route('employeur.inscription.store') }}" name="contact-form" id="contact-form3">
    @csrf
    <div class="col-md-12 alert alert-info">
        <h6 class="mb-0 text-center"> <i class="fa fa-info-circle"></i> L'inscription se fait en deux étapes</h6>
    </div>
    <div class="mx-3 mb-3 steps-container row d-flex justify-content-between">
        
        <div>
            <div class="steps step-1 start success">1</div>
            <div class="text-center mt-1">
            </div>
        </div>
        <div class="sizedBox sizedbox "></div>
        <div>
            <div class="steps step-1 end active">2</div>
            <div class="text-center mt-1">
            </div>
        </div>
    </div>
    <h4 class="text-dark mb-3 row">
        <div class="col-md-9">
            Inscription :
        </div>
        {{-- <div class="col-md-3">
            <div class="form-group app-label">
                <div class="form-button">
                    <select class="nice-select rounded" name="statut_juridique_id">
                        <option data-display="Selectionnez">Selectionnez</option>
                        <option value="1">Subvention</option>
                        <option value="2">Formation</option>
                    </select>
                </div>
            </div>
        </div> --}}
    </h4>

    <div class="row">
        {{-- <div class="col-md-12">
            <div class="alert alert-warning">
                Page en maintenance
            </div>
        </div> --}}
        <div class="col-md-6">
            <div class="form-group app-label mt-2">
                <label class="text-muted-2" for="raison_social">Raison Sociale</label>
                <input id="raison_social" readonly value="{{ old('raison_social') }}" name="raison_social" type="text" class="form-control resume input-success-readonly @error('raison_social') is-invalid @enderror" placeholder="" required>
                @error('raison_social')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="col-md-6 direction-rtl">
            <div class="form-group app-label mt-2">
                <label class="text-muted-2 display-block text-right" for="raison_social_Ar">التسمية الاجتماعية</label>
                <input id="raison_social_Ar" value="{{ old('raison_social_Ar') }}" name="raison_social_Ar" type="text" class="form-control resume keyboardInput @error('raison_social_Ar') is-invalid @enderror" dir="rtl"  placeholder="" required >
                @error('raison_social_Ar')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group app-label mt-2">
                <label class="text-muted-2" for="code_employeur">Code Employeur (N° Adhérent)</label>
                <input id="code_employeur_cnas" readonly value="{{ auth()->user()->code_employeur }}" name="code_employeur" type="text" class="form-control resume input-success-readonly " placeholder="" required >
                @error('code_employeur_cnas')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group app-label mt-2">
                <label class="text-muted-2" for="sigle">Sigle</label>
                <input value="{{ old('sigle') }}" name="sigle" type="text" class="form-control resume @error('sigle') is-invalid @enderror" placeholder="" required >
                @error('sigle')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-4">
            <div class="form-group app-label mt-2">
                <label class="text-muted-2">Statut Juridique</label>
                <div class="form-button">
                    <select class="nice-select" name="cod_stat">
                        @foreach ($status as $statu)
                            <option value="{{$statu->cod_stat}}" >{{ $statu->des_fr }}</option>
                        @endforeach
                    </select>
                    @error('cod_stat')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group app-label mt-2">
                <label class="text-muted-2">Branche d'activité</label>
                <div class="form-button">
                    <select class="nice-select " name="cod_branche" >
                        @foreach ($branches as $branche)
                            <option value="{{$branche->cod_branche}}" required> {{ $branche->des_fr }}</option>
                        @endforeach
                    </select>
                    @error('cod_branche')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group app-label mt-2">
                <label class="text-muted-2" for="date_debut_activite" >Date debut d'activité</label>
                <input value="{{ old('date_debut_activite') }}" data-toggle="datepicker" name="date_debut_activite" type="text" class="form-control datepicker resume input-success-readonly @error('date_debut_activite') is-invalid @enderror" placeholder="YYYY-DD-MM" autocomplete="off" readonly="true" id="installationDate">
                @error('date_debut_activite')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group app-label mt-2">
                <label class="text-muted-2" for="NIF">NIF</label>
                <input id="NIF" value="{{ old('NIF') }}" name="NIF" type="text" class="form-control resume  @error('NIF') is-invalid @enderror" placeholder="" required >
                @error('NIF')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group app-label mt-2">
                <label class="text-muted-2" for="NIS">NIS</label>
                <input id="NIS" value="{{ old('NIS') }}" name="NIS" type="text" class="form-control resume  @error('NIS') is-invalid @enderror" placeholder="" required >
                @error('NIS')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group app-label mt-2">
                <label class="text-muted-2">N° Compte Bancaire (RIB) </label>
                <input id="RIB" value="{{ old('RIB') }}" name="RIB" type="text" class="form-control resume @error('RIB') is-invalid @enderror" placeholder="" required >
                @error('RIB')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group app-label mt-2">
                <label class="text-muted-2" for="RC">N° Registre de commerce Ou Carte d'Artisant</label>
                <input id="RC" value="" name="RC" type="text" class="form-control resume @error('RC') is-invalid @enderror" placeholder="" required >
                @error('RC')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        {{-- <div class="col-md-8">
            <label class="text-muted-2"><b>N° Registre de commerce Ou Carte d'Artisant</b></label>
            <div class="row">
                <div class="col-md-12">
                    <input type="text" class="form-control" name="RC[]" value="{{ old('RC[]') }}">
                </div>
                <div class="col-md-1 px-0 mx-1">
                    <div class="form-group app-label mt-2">
                        <input id="RC[]" value="{{ old('RC') }}" name="RC[]" type="text" class="form-control resume @error('RC') is-invalid @enderror" placeholder="00" maxlength="2" minlength="2" required >
                    </div>
                </div>
                <div class="col-md-2 px-0 mx-1">
                    <div class="form-group app-label mt-2">
                        <div class="form-button">
                            <select class="form-control" name="RC[]" >
                                <option value='A'> أ</option>
                                <option value="A"> د</option>
                                <option value="A"> و1</option>
                                <option value="B"> ب</option>
                                <option value="B"> و2</option>
                                <option value="B"> س</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 px-0 mx-1">
                    <div class="form-group app-label mt-2">
                        <input id="RC[]" value="{{ old('RC') }}" name="RC[]" type="text" class="form-control resume @error('RC') is-invalid @enderror" placeholder="0000000" maxlength="7" minlength="7" required >
                    </div>
                </div>
                <div class="col-md-1 px-1 mx-1">
                    <div class="form-group app-label mt-2">
                        <input value="-" readonly type="text" name="RC[]" class="form-control resume bg-light" minlength="2" maxlength="2" required >
                    </div>
                </div>
                <div class="col-md-1 px-0 mx-1">
                    <div class="form-group app-label mt-2">
                        <input id="RC[]" value="{{ old('RC') }}" name="RC[]" type="text" class="form-control resume @error('RC') is-invalid @enderror" placeholder="00" minlength="2" maxlength="2" required >
                    </div>
                </div>
                <div class="col-md-1 px-1 mx-1">
                    <div class="form-group app-label mt-2">
                        <input value="/" readonly type="text" name="RC[]" class="form-control resume bg-light" required >
                    </div>
                </div>
                <div class="col-md-2 px-0 mx-1">
                    <div class="form-group app-label mt-2">
                        <div class="form-button">
                            <select class="form-control" id="wilaya-fr" name="RC[]" >
                                @for ($i = 1; $i <= 58; $i++)
                                    @if (strlen($i) == 1)
                                        <option value="0{{ $i }}">0{{ $i }}</option>
                                    @else
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endif
                                @endfor
                            </select>
                        </div>
                    </div>
                </div> 
            </div>
        </div> --}}
    </div>

    <div class="row">
        <div class="col-md-9">
            <div class="form-group app-label mt-2">
                <label class="text-muted-2" for="adresse">Adresse du siege sociale </label>
                <input id="adresse" value="{{ old('adresse') }}" name="adresse" type="text" class="form-control resume  @error('adresse') is-invalid @enderror" placeholder="" required >
                @error('adresse')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group app-label mt-2">
                <label class="text-muted-2">Wilaya</label>
                <div class="form-button">
                    <select class="form-control" id="wilaya-fr" name="cod_wilaya">
                        <option value="{{ $wilaya->cod_wilaya }}">{{ $wilaya->des_fr }}</option>
                        {{-- <option value="">{{ auth()->user()->cod_wilaya }}</option>
                        <option data-display="Selectionnez"></option>
                        @foreach ($wilayas as $wilaya)
                            <option value="{{$wilaya->cod_wilaya}}">{{ $wilaya->des_fr }}</option>
                        @endforeach --}}
                    </select>
                    @error('cod_wilaya')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-3 direction-rtl ">
            <div class="form-group app-label mt-2">
                <label class="text-muted-2 display-block text-right">الولاية</label>
                <div class="form-button">
                    <select class="form-control" id="wilaya-ar" readonly name="cod_wilaya" required>
                        <option value="{{ $wilaya->cod_wilaya }}">{{ $wilaya->des_ar }}</option>
                       
                    </select>
                    @error('cod_wilaya')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col-md-9 direction-rtl">
            <div class="form-group app-label mt-2">
                <label class="text-muted-2 display-block text-right">عنوان المقر</label>
                <input id="adresseAr" value="{{ old('adresseAr') }}" name="adresseAr" type="text" class="form-control resume keyboardInput  @error('adresseAr') is-invalid @enderror" dir="rtl" placeholder="" required >
                @error('adresseAr')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
    <div class="col-md-4">
            <div class="form-group app-label mt-2">
                <label class="text-muted-2" for="email-e">Email d'Entreprise</label>
                <input id="email-e" value="{{ old('email_entreprise') }}" name="email_entreprise" type="mail" class="form-control resume @error('email_entreprise') is-invalid @enderror" placeholder="" required >
                @error('email_entreprise')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group app-label mt-2">
                <label class="text-muted-2" for="tel">N° Tél</label>
                <input id="tel" value="{{ old('tel') }}" name="tel" type="tel" class="form-control resume @error('tel') is-invalid @enderror" placeholder="" required data-phonemask="+213 __________">
                @error('tel')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group app-label mt-2">
                <label class="text-muted-2" for="mob">N° Mob</label>
                <input id="mob" value="{{ old('mob') }}" name="mob" type="tel" class="form-control resume @error('mob') is-invalid @enderror" placeholder="" required data-phonemask="+213 ________">
                @error('mob')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-5">
            <div class="form-group app-label mt-2">
                <label class="text-muted-2">Représenté par</label>
                <input id="representant" value="{{ old('representant') }}" name="representant" type="text" class="form-control resume @error('representant') is-invalid @enderror" placeholder="" required >
                @error('representant')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group app-label mt-2">
                <label class="text-muted-2">Qualite</label>
                <input id="qualite" value="{{ old('qualite') }}" name="qualite" type="text" class="form-control resume @error('qualite') is-invalid @enderror" placeholder="" required >
                @error('qualite')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group app-label mt-2">
                <label class="text-muted-2">Nbre de Travailleurs</label>
                <input id="company-name" value="{{ old('nbr_travailleurs') }}" name="nbr_travailleurs" type="number" class="form-control resume @error('nbr_travailleurs') is-invalid @enderror" placeholder="" required >
                @error('nbr_travailleurs')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 direction-rtl">
            <div class="form-group app-label mt-2">
                <label class="text-muted-2 display-block text-right">الصفة</label>
                <input id="qualiteAr" value="{{ old('qualiteAr') }}" name="qualiteAr" type="text" class="form-control resume keyboardInput @error('qualiteAr') is-invalid @enderror" dir="rtl" placeholder="" required >
                @error('qualitear')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="col-md-8 direction-rtl">
            <div class="form-group app-label mt-2">
                <label class="text-muted-2 display-block text-right">الممثل من طرف </label>
                <input id="representantAr" value="{{ old('representantAr') }}" name="representantAr" type="text" class="form-control resume keyboardInput @error('representantAr') is-invalid @enderror" dir="rtl" placeholder="" required >
                @error('representantAr')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="col-md-1">
            <div class="form-group mt-2">
                <input name="condition_accepte" style="height: 25px; margin-top: 15px;" type="checkbox" id="condition_accepte" class="form-control" placeholder="" value="1" required >
                @error('condition_accepte')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="col-md-11 pl-0">
            <div class="form-group mt-2 ">
                <label class="text-muted-2 display-block text-left" style="font-size:15px;" for="condition_accepte">
                    J'atteste par ailleurs que je n'ai bénéficié d'aucun avantage en matière de cotisation de sécurité sociale accordé par la législation en vigueur.
                </label>
                @error('condition_accepte')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 mt-2 text-right">
            <button type="submit" role="button" class="btn btn-primary">Valider</button>
            {{-- <button type="button" role="button" class="btn btn-info" id="check">Véréfier</button>
            <button type="reset" role="button" class="btn btn-danger">Annuler</button> --}}
        </div>
    </div>
</form>
