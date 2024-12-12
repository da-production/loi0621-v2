{{-- 
    Read the document README.md
    route file: web.php
    @Route(
        url: '/'
        name: 'accueil'
    )
    @Controller: use anonymous function (inline)
    @action: use anonymous function (inline)
    @variablies: [
        'pageTitle' => String,
    ]
    @RouteCallingAction: [
        'employeur.profile',
        'register'
    ]
    WARNING
    Add Comment for each changes you made
--}}

@php
    $pagetitle = "Accueil";
@endphp
@extends('layouts.landing')

@section('section-content')
<!-- popular category start -->
<section class="section pt-2 home">
    <div class="container">
        {{-- <div class="row justify-content-center">
            <div class="col-12">
                <div class="text-center " style="font-size: 30px">
                    <h5 class="title title-line">
                        <p class="mb-0"> <b>MESURES D'ENCOURAGEMENT ET D'APPUI A LA PROMOTION DE L'EMPLOI </b></p>
                    </h5>
                </div>
                <div class="section-title text-center">
                    <h5 class="title title-line pb-2">
                        <p class="title title-line pb-5 cairo-arabic-center">تدابير تشجيعية لدعم وترقية التشغيل</p>
                    </h5>
                </div>
            </div>
        </div> --}}
        <div class="row position-relative">
            <div class="col-md-6 mt-4 pt-2">
                <div class="how-it-work-box bg-light p-4 text-center rounded shadow" style="height: 100%;">
                    <div class="how-it-work-img position-relative rounded-pill mb-3">
                        <img src="{{ asset('assets/images/how-it-work/img-2.png') }}" alt="" class="mx-auto d-block" height="50">
                    </div>
                    <div>
                        <h5>Subvention</h5>
                        <br />
                        <p class="cairo-arabic-center text-muted">إعانة شهرية خاصة بالتشغيل</p> 
                        <p class="text-muted">Subvention mensuelle à l’emploi accordée aux employeurs</p>
                        <br />
                        <a href=""  role="button" class="text-primary btn btn-sm btn-primary preventDefault" data-toggle="modal" data-target="#sub"><span class="modalText">Lire plus<i class="mdi mdi-chevron-right"></i></span></a>
                    </div>
                </div>
            </div>

            
            <a href="{{ Auth::check() ? route('employeur.profile') : route('register') }}" class="inscription-absolute"><b>{{ Auth::check() ? 'Profile' : 'Inscription' }}</b></a>

            <div class="col-md-6 mt-4 pt-2">
                <div class="how-it-work-box bg-light p-4 text-center rounded shadow" style="height: 100%;">
                    <div class="how-it-work-img position-relative rounded-pill mb-3">
                        <img src="{{ asset('assets/images/how-it-work/img-3.png') }}" alt="" class="mx-auto d-block" height="50">
                    </div>
                    <div>
                        <h5>Formation</h5>
                        <p class="cairo-arabic-center text-muted">الإعفاء من دفع مستحقات الاشتراك الإجمالي للضمان الاجتماعي كل مستخدم يبادر <br /> بنشاطات تكوينية لفائدة عماله أو تحسين مستواهم</p>
                        <p class="text-muted">Exonération des employeurs de la cotisation de sécurité sociale au titre des travailleurs mis en formation ou en perfectionnement</p>
                        <a href="" role="button"  class="text-primary btn btn-sm btn-primary preventDefault" data-toggle="modal" data-target="#formation"><span class="modalText">Lire plus<i class="mdi mdi-chevron-right"></i></span></a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- popular category end -->

  <!-- Formation -->
  <div class="modal fade" id="formation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl " role="document">
      <div class="modal-content">
        <div class="modal-header text-center flex-column">
          <h6 class="modal-title block-100w cairo-arabic-center  f-22px" id="exampleModalLabel">الإعفاء من دفع مستحقات الاشتراك الإجمالي للضمان الاجتماعي كل مستخدم يبادر بنشاطات تكوينية لفائدة عماله أو تحسين مستواهم</h6>
          <h5 class="modal-title block-100w" id="exampleModalLabel">Exonération des employeurs de la cotisation de sécurité sociale au titre des travailleurs mis en formation ou en perfectionnement</h5>
          {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> --}}
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="item testi-box rounded p-4 mr-3 ml-2 bg-light position-relative text-justify">
                        <ul>
                            <li>
                                <p>L’exonération de la quote  part patronale de la sécurité sociale est accordée aux employeurs au titre des travailleurs mis en formation ou en perfectionnement. </p>
                            </li>
                            <li>
                                <p>Il s’agit du remboursement par la CNAC aux employeurs des  montants qu’ils ont  versé à la CNAS au titre des travailleurs pour lesquels ils ont engagé des actions de formation ou de perfectionnement </p>
                            </li>
                            <li>
                                <p>La durée de cette exonération qui varie entre un (1) et trois(3) mois est   fonction de la durée de la formation ou de la mise en perfectionnement </p>
                                <ul>
                                    <li>
                                        <p>Elle est d’un (1) mois pour les formations ou perfectionnements d’une durée de quinze (15) jours à un (01) mois ;</p>
                                    </li>
                                    <li>
                                        <p>De deux (2) mois pour les formations et perfectionnements d’une durée supérieure à un(1) mois et égale à deux (2) mois ;</p>
                                    </li>
                                    <li>
                                        <p>De trois (3) mois pour les formations ou perfectionnements d’une durée supérieure à  deux (2) mois.</p>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <p>En cas de fractionnement des périodes de mise en  formation ou en perfectionnement durant la même année (il y a lieu de les cumuler), la cotisation globale de sécurité sociale est déterminée en fonction du cumul de ces périodes et suivant les modalités qui ont été indiquées plus haut.</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 cairo-arabic">
                    <div class="item testi-box rounded p-4 mr-3 ml-2 bg-light position-relative f-22px cairo-arabic-justify">
                        <ul>
                            <li>
                                <p>
                                    يـــعــــفى المستخدم مـن دفع مـــســــتـــحـــقـــات الاشتـراك الإجمـالي لـلضـمان الاجـتمـاعي بـعنـوان العـمال المـوضــوعــين في الــتـكــوين أو تحــســين المــسـتــوى, لــفــتـرات تحدد كما يأتي:
                                </p>
                            </li>
                                <ul>
                                    <li>
                                        <p>  شــهـــــر واحــــد عن الـــتــكــويـن أو تحــســين المــسـتــوى لـفــــتــرة تــمــــتـــد من خــــمــســة عـــشـر (15) يـومــا إلى شــهـر واحد.</p>
                                    </li>
                                    <li>
                                        <p> شــــهــــران (2) عن الـــتــــكـــويـن أو تحــســين المــسـتــوى لفترة تفوق شهرا واحدا وتساوي شهرين (2).</p>
                                    </li>
                                </ul>

                            <li>
                                <p>
                                    عـنـدمـا يسـتـفـيـد الـعـامل خلال نـفس الـسـنة مـن عــدة فـــتــرات لـــلــتـــكــويـن أو تحــســين المــسـتــوى يـــحــدد الإعـفـاء من الاشـتـراك الإجـمـالي لـلـضـمـان الاجـتـمـاعي عن هذه الفترات مجتـمعة حسب الكيفيات المنصوص عليها أعلى.
                                </p>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
        </div>
      </div>
    </div>
  </div>

  <!-- subvention -->
  <div class="modal  fade" id="sub" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header flex-column text-center">
          <h6 class="modal-title block-100w cairo-arabic-center f-22px" id="exampleModalLabel">	إعانة شهرية خاصة بالتشغيل</h6>
          <h5 class="modal-title block-100w" id="exampleModalLabel">Subvention mensuelle à l’emploi accordée aux employeurs</h5>
          {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> --}}
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="item testi-box rounded p-4 mr-3 ml-2 bg-light position-relative text-justify">
                        <ul>
                            <li>
                                <p>La subvention mensuelle à l’emploi est accordée à l’employeur qui procède à des recrutements de demandeurs d’emploi, inscrits auprès d’une agence de placement, sur la base d’un contrat à durée indéterminée (CDI).</p>
                            </li>
                            <li>
                                <p>Le montant de cette subvention est de mille dinars (1000,00 DA) par mois pour chaque demandeur d’emploi recruté et ce, pendant une durée de trois (03) années.</p>
                            </li>
                            <li>
                                <p>Elle est versée par la CNAC à la fin de chaque exercice</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="item testi-box rounded p-4 mr-3 ml-2 bg-light position-relative cairo-arabic-justify f-22px">
                        <ul>
                            <li>
                                <p>يسـتفيـد المسـتخـدم من إعانـة شهـرية عن الـتـشغـيل يـقـدر مبـلـغـها بـ 000 1 دج عن كل طـالب عمل تم تشغيله على أساس عقد عمل مبرم لمدة غير محدودة. </p>
                            </li>
                            <li>
                                <p>يــدفـع الــصـنـدوق الوطني للـتأمين عن الـبطالة (ص.و.ت.ب) للـمستخدم مباشرة مبلغ الإعانة في نهاية السنة المالية.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
        </div>
      </div>
    </div>
  </div>
@endsection


@section('script')
<script src="{{ asset('assets/plugins/accessible-modal-modelo/dist/modelo.min.js') }}"></script>
    <script>
        $(function(){
            // $('#modal-subvention').modelo();
            var config = {
                'modal': true
            };

            if(config.modal){
                var link = $('.preventDefault');
                var text = "Lire Plus";
                    $('.modalText').html(`${text}`);
                link.on('click', function(e){
                    e.preventDefault();
                });
            }

            if(!config.modal){
                var link = $('.preventDefault');
                link.attr("role",'');
                link.attr("data-target",'');
                link.attr("data-toggle",'');
            }


            var topnav = $("#topnav").height();
            var banner = $(".banner").height();
            var footerbar = $(".footer-bar").height();
        })
    </script>
@endsection
