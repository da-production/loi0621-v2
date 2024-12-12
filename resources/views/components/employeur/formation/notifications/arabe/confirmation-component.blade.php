
<style>
    .f-19{
        font-size: 1.2rem !important;  
    }
    .cairo-arabic-justify{
        text-align: justify !important;
    }
    .t-c{
    color: #334152 !important;
    font-weight: 500;
}   
</style>

<div class="f-19">
<h3 class="text-center cairo-arabic-center ">الصندوق الوطني للتأمين عن البطالة</h3>
<p class="text-center"><img src="{{ asset('assets/images/logoWithoutTitle.png') }}" width="70px" alt="CNAC LOGO" title="CNAC LOGO"></p>
<h4 class="text-center text-danger">خدمة تسجيل المستخدم عبر الإنترنت</h4>
<br />
<p class="cairo-arabic-right cairo-arabic-justify"><b><u>جهاز :</u></b> تدابير تشجيعية لدعم وترقية التشغيل
إعانة شهرية خاصة بالتشغيل
 </p>
 <p class="cairo-arabic-right cairo-arabic-justify"> " الإعفاء من دفع مستحقات الاشتراك الإجمالي للضمان الاجتماعي كل مستخدم يبادر بنشاطات تكوينية لفائدة عماله أو تحسين مستواهم " </p>
<br />
<h4 class="text-center  cairo-arabic-center">سيدي المستخدم</h4>

<p class="cairo-arabic-right cairo-arabic-justify">نحيطكم علما سيدي أنه تم تسجيلك بنجاح :</p>
<ul class="cairo-arabic-right">
<li class="cairo-arabic-right cairo-arabic-justify" >يوم : <span class="t-c">{{ Carbon\Carbon::parse($demande->date_demande)->year . '/' . Carbon\Carbon::parse($demande->date_demande)->month . '/' .Carbon\Carbon::parse($demande->date_demande)->day }}</li>
<li class="cairo-arabic-right cairo-arabic-justify">تحت الرقم : <span class="t-c">{{ $demande->cod_demande }}</li>
</ul>

<p class="cairo-arabic-right cairo-arabic-justify">كما ندعوك لإكمال طلبك للتسجيل، من خلال إرسال المستندات التالية (بصيغة PDF) عبر هذه المنصة في مساحتك الخاصة:</p>
<ul class="cairo-arabic-right cairo-arabic-justify">
<li>طلب التعويض عن الاشتراك الإجمالي للضمان الاجتماعي ، مملوءة و ممضاة من طرف المستخدم ، (وفقا للنموذج القابل للتحميل عبر هذه المنصة في مساحتك الخاصة في <a href="javascript:void(0)" class="text-primary toDownload" > ركن التحميل</a> )،</li>
<li>قائمة العمال المعنيين بالتكوين ، ممضاة من طرف المستخدم ، (وفقا للنموذج القابل للتحميل عبر هذه المنصة في مساحتك الخاصة في <a href="javascript:void(0)" class="text-primary toDownload" > ركن التحميل</a> )،</li>
<li>نسخة من عقد أو عقود التكوين مصادق عليها من طرف هيئة التكوين؛</li>
<li>نسخة من شهادات التكوين للمعنيين؛</li>
<li>كشف دفع اشتراكات الضمان الاجتماعي للعمال المعنيين مصادق عليها من طرف المستخدم عن فترة الثلاثة أشهر الماضية من تاريخ بدء التكوين.</li>
</ul>

<p class="cairo-arabic-right cairo-arabic-justify "><b><u>مهم:</u></b></p>
<ul class="cairo-arabic-right cairo-arabic-justify">
<li>سيتم إخطارك بوصل الاستلام من قبل الصندوق عبر هذه المنصة في مساحتك الخاصة ، عند استلام جميع المستندات التي تشكل ملفك. الملفات غير المكتملة غير مقبولة.</li>
<li>ستقوم مصالح الصندوق بدراسة طلبك خلال فترة لا تتجاوز شهرًا واحدًا من تاريخ إصدار وصل الاستلام.</li>
<li>إذا تم قبول او رفض طلبك ، فسيتم إشعارك من قبل مصالح الصندوق.  </li>
<li>يتعين على المستخدم عند قبول طلبه ايداع المستندات الأصلية المطلوبة الى مصالح الوكالة الولائية - {{ $employeur->wilaya->des_ar}} - التابعة للصندوق لتسلم القرار بالموافقة، وهي:
    <ul class="cairo-arabic-right cairo-arabic-justify">
        <li>طلب التعويض عن الاشتراك الإجمالي للضمان الاجتماعي ، مملوءة و ممضاة من طرف المستخدم ،</li>
        <li>قائمة العمال المعنيين بالتكوين ، ممضاة من طرف المستخدم ،</li>
        <li>نسخة من عقد أو عقود التكوين مصادق عليها من طرف هيئة التكوين؛</li>
        <li>.نسخة من شهادات التكوين للعمال المعنيين</li>
    </ul>
</li>
</ul>
<br />
<br />

<p class="text-right cairo-arabic-right cairo-arabic-justify">
<span>سلمت من طرف مصالح الوكالة الولائية لـ {{ $employeur->wilaya->des_ar}} </span>
</p>
<p class="text-right cairo-arabic-right">
<span>يوم : {{ Carbon\Carbon::parse($demande->date_demande)->format("Y-m-d") }}</span>
</p>
</div>

<p class="text-right">
    <button type='button' onClick='printFunction()' class="mt-5 btn btn btn-primary dont-print" role='button'>
        {{ (isset($_GET['lang']) && $_GET['lang'] == 'ar') ? 'طباعة' : 'Imprimer'}}
    </button>
    <a 
        href="?lang={{ (isset($_GET['lang']) && $_GET['lang'] == 'ar') ? 'fr' : 'ar' }}" 
        class="mt-5 btn btn btn-primary dont-print " role='button'>
        {{ (isset($_GET['lang']) && $_GET['lang'] == 'ar') ? 'Français' : 'العربية' }}
    </a>
</p>