<div class="main-pd-wrapper" style="width: 1000px; margin: auto;">
    <div style="display: table-header-group">
        <h4 style="text-align: center; margin: 0">
            <b>Fiche Technique</b>
        </h4>

        <table style="width: 100%; table-layout: fixed">
            <tr>
                <td style="border-left: 1px solid #ddd; border-right: 1px solid #ddd">
                    <div style="
                text-align: center;
                margin: auto;
                line-height: 1.5;
                font-size: 14px;
                color: #4a4a4a;
              ">
                        <img src="{{ asset('assets/images/logoWithoutTitle.png') }}" width="150px" alt="">
                        <br />
                        <p style="font-weight: bold; margin-top: 15px">
                            CNAC | Loi0621
                        </p>
                        <p style="font-weight: bold">
                            ID :
                            <a href="tel:018001236477" style="color: #00bb07">{{ $employeur->id }}</a>
                        </p>
                    </div>
                </td>
                <td align="right" style="
              text-align: right;
              padding-left: 50px;
              line-height: 1.5;
              color: #323232;
            ">
                    <div>
                        <h4 style="margin-top: 5px; margin-bottom: 5px">
                            Compte Utilisateur
                        </h4>
                        <p style="font-size: 14px">
                            Email: <a href="tel:01241234568" style="color: #00bb07">{{ $employeur->user->email }}</a>
                        </p>
                        <p style="font-size: 14px">
                            Nom: <a href="tel:01241234568" style="color: #00bb07">{{ $employeur->user->nom }}</a>
                        </p>
                        <p style="font-size: 14px">
                            Prenom: <a href="tel:01241234568" style="color: #00bb07">{{ $employeur->user->prenom }}</a>
                        </p>
                        <p style="font-size: 14px">
                            Wilaya: <a href="tel:01241234568" style="color: #00bb07">{{ $employeur->user->wilaya->des_fr}}</a>
                        </p>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <br />
    <br />
    <h4>Information Compte Employeur</h4>
    <table class="hm-p table-bordered" style="width: 100%; margin-top: 10px">
        <tr>
            <th style="width: 400px">
                Raison Social
                <span style="font-size: 14px; font-weight: 300; color: rgb(87, 87, 87)"></span>
            </th>
            <td style="vertical-align: top; color: #000">
                <b>{{ $employeur->raison_social }}</b>
                <br />
                <b>{{ $employeur->raison_social_Ar }}</b>
            </td>
        </tr>
        <tr>
            <th style="width: 400px">
                Sigle
                <span style="font-size: 14px; font-weight: 300; color: rgb(87, 87, 87)"></span>
            </th>
            <td style="vertical-align: top; color: #000">
                <b>{{ $employeur->sigle }}</b>
            </td>
        </tr>
        <tr>
            <th style="vertical-align: top">Representant</th>
            <td style="vertical-align: top; color: #000">
                <b>{{ $employeur->representant }}</b>
                <br />
                <b>{{ $employeur->representantAr }}</b>
            </td>
        </tr>
        <tr>
            <th style="vertical-align: top">Qualite</th>
            <td style="vertical-align: top; color: #000">
                <b>{{ $employeur->qualite }}</b>
            </td>
        </tr>

        <tr>
            <th style="vertical-align: top">RIB</th>
            <td style="vertical-align: top; color: #000">
                <b>{{ $employeur->RIB }}</b>
            </td>
        </tr>
        <tr>
            <th style="vertical-align: top">NIF</th>
            <td style="vertical-align: top; color: #000">
                <b>{{ $employeur->NIF }}</b>
            </td>
        </tr>
        <tr>
            <th style="vertical-align: top">NIS</th>
            <td style="vertical-align: top; color: #000">
                <b>{{ $employeur->NIS }}</b>
            </td>
        </tr>
        <tr>
            <th style="vertical-align: top">RC</th>
            <td style="vertical-align: top; color: #000">
                <b>{{ $employeur->RC }}</b>
            </td>
        </tr>
        <tr>
            <th style="vertical-align: top">Nbr Travailleurs</th>
            <td style="vertical-align: top; color: #000">
                <b>{{ $employeur->nbr_travailleurs }}</b>
            </td>
        </tr>
    </table>

    <br />
    <h4>Contact</h4>
    <table class="hm-p table-bordered" style="width: 100%; margin-top: 10px">
    
        <tr>
            <th style="vertical-align: top">Tel:</th>
            <td style="vertical-align: top; color: #000">
                <b>{{ $employeur->tel }}</b>
            </td>
        </tr>

        <tr>
            <th style="vertical-align: top">Mob:</th>
            <td style="vertical-align: top; color: #000">
                <b>{{ $employeur->mob }}</b>
            </td>
        </tr>

        <tr>
            <th style="vertical-align: top">Email Entreprise:</th>
            <td style="vertical-align: top; color: #000">
                <b>{{ $employeur->email_entreprise }}</b>
            </td>
        </tr>
    </table>
    <br />
    <h4>Demandes</h4>
    <table class="hm-p table-bordered" style="width: 100%; margin-top: 10px">
    
        <tr>
            <th style="vertical-align: top">Subventions:</th>
            <td style="vertical-align: top; color: #000">
                <b>{{ $employeur->subventions->count() }}</b>
            </td>
        </tr>

        <tr>
            <th style="vertical-align: top">Formations:</th>
            <td style="vertical-align: top; color: #000">
                <b>{{ $employeur->formations->count() }}</b>
            </td>
        </tr>
    </table>

    <table style="width: 100%" cellspacing="0" cellspadding="0" border="0">
        <tr>
            <td>
                <h4 style="margin: 10px 0">
                    
                </h4>
                <p>
                    {{ auth()->user()->wilaya->des_fr }} le {{ Date('Y-m-d') }}
                </p>
            </td>
            <td>
                <h4 style="margin: 0; text-align: right">
                    
                </h4>
            </td>
        </tr>
    </table>
</div>
