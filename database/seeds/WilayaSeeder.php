<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WilayaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $wilayas = [
            [ 'cod_wilaya'=> '01','des_fr'=>'ADRAR' ,'des_ar'=>'أدرار'],
            [ 'cod_wilaya'=> '02','des_fr'=>'CHLEF','des_ar'=>'الشلف'],
            [ 'cod_wilaya'=> '03','des_fr'=>'LAGHOUAT','des_ar'=>'الأغواط'],
            [ 'cod_wilaya'=> '04','des_fr'=>'OUM EL BOUAGHI','des_ar'=>'أم البواقي	'],
            [ 'cod_wilaya'=> '05','des_fr'=>'BATNA','des_ar'=>'باتنة'],
            [ 'cod_wilaya'=> '06','des_fr'=>'BEJAIA','des_ar'=>'بجاية'],
            [ 'cod_wilaya'=> '07','des_fr'=>'BISKRA','des_ar'=>'بسكرة'],
            [ 'cod_wilaya'=> '08','des_fr'=>'BECHAR','des_ar'=>'بشار'],
            [ 'cod_wilaya'=> '09','des_fr'=>'BLIDA','des_ar'=>'البليدة'],
            [ 'cod_wilaya'=> '10','des_fr'=>'BOUIRA','des_ar'=>'البويرة'],	
            [ 'cod_wilaya'=> '11','des_fr'=>'TAMANRASSET','des_ar'=>'تامنغست'],
            [ 'cod_wilaya'=> '12','des_fr'=>'TEBESSA','des_ar'=>'تبسة'],
            [ 'cod_wilaya'=> '13','des_fr'=>'TLEMCEN','des_ar'=>'تلمسان'],
            [ 'cod_wilaya'=> '14','des_fr'=>'TIARET','des_ar'=>'تيارت'],
            [ 'cod_wilaya'=> '15','des_fr'=>'TIZI-OUZOU','des_ar'=>'تيزى وزو'],
            [ 'cod_wilaya'=> '16','des_fr'=>'ALGER','des_ar'=>'الجزائر'],
            [ 'cod_wilaya'=> '17','des_fr'=>'DJELFA','des_ar'=>'الجلفة'],
            [ 'cod_wilaya'=> '18','des_fr'=>'JIJEL','des_ar'=>'جيجل'],
            [ 'cod_wilaya'=> '19','des_fr'=>'SETIF','des_ar'=>'سطيف'],
            [ 'cod_wilaya'=> '20','des_fr'=>'SAIDA','des_ar'=>'سعيدة'],
            [ 'cod_wilaya'=> '21','des_fr'=>'SKIKDA','des_ar'=>'سكيكدة	'],
            [ 'cod_wilaya'=> '22','des_fr'=>'SIDI BEL ABBES','des_ar'=>'سيدي بلعباس'],
            [ 'cod_wilaya'=> '23','des_fr'=>'ANNABA','des_ar'=>'عنابة'],
            [ 'cod_wilaya'=> '24','des_fr'=>'GUELMA','des_ar'=>'قالمة	'],
            [ 'cod_wilaya'=> '25','des_fr'=>'CONSTANTINE','des_ar'=>'قسنطينة'],
            [ 'cod_wilaya'=> '26','des_fr'=>'MEDEA','des_ar'=>'المدية'],
            [ 'cod_wilaya'=> '27','des_fr'=>'MOSTAGANEM','des_ar'=>'مستغانم'],
            [ 'cod_wilaya'=> '28','des_fr'=>'MSILA','des_ar'=>'المسيلة'],
            [ 'cod_wilaya'=> '29','des_fr'=>'MASCARA','des_ar'=>'معسكر	'],
            [ 'cod_wilaya'=> '30','des_fr'=>'OUARGLA','des_ar'=>'ورقلة'],
            [ 'cod_wilaya'=> '31','des_fr'=>'ORAN','des_ar'=>'وهران'],
            [ 'cod_wilaya'=> '32','des_fr'=>'EL BAYADH','des_ar'=>'البيض'],
            [ 'cod_wilaya'=> '33','des_fr'=>'ILLIZI','des_ar'=>'ايليزى'],
            [ 'cod_wilaya'=> '34','des_fr'=>'BORDJ BOUARRERIDJ','des_ar'=>'برج بوعريرج	'],
            [ 'cod_wilaya'=> '35','des_fr'=>'BOUMERDES','des_ar'=>'بومرداس	'],
            [ 'cod_wilaya'=> '36','des_fr'=>'EL TARF','des_ar'=>'الطارف'],
            [ 'cod_wilaya'=> '37','des_fr'=>'TINDOUF','des_ar'=>'تندوف'],
            [ 'cod_wilaya'=> '38','des_fr'=>'TISSEMSILT','des_ar'=>'تيسمسيلت'],
            [ 'cod_wilaya'=> '39','des_fr'=>'EL OUED','des_ar'=>'الوادى'],
            [ 'cod_wilaya'=> '40','des_fr'=>'KHENCHLA','des_ar'=>'خنشلة'],
            [ 'cod_wilaya'=> '41','des_fr'=>'SOUK AHRAS','des_ar'=>'سوق أهراس'],
            [ 'cod_wilaya'=> '42','des_fr'=>'TIPAZA','des_ar'=>'تيبازة'],
            [ 'cod_wilaya'=> '43','des_fr'=>'MILA','des_ar'=>'ميلة'],
            [ 'cod_wilaya'=> '44','des_fr'=>'AIN DEFLA','des_ar'=>'عين الدفلى	'],
            [ 'cod_wilaya'=> '45','des_fr'=>'NAAMA','des_ar'=>'النعامة	'],
            [ 'cod_wilaya'=> '46','des_fr'=>'AIN TEMOUCHENT','des_ar'=>'عين تموشنت'],
            [ 'cod_wilaya'=> '47','des_fr'=>'GHARDAIA','des_ar'=>'غرداية'],
            [ 'cod_wilaya'=> '48','des_fr'=>'RELIZANE','des_ar'=>'غليزان'],
        ];

        DB::table('wilayas')->insert($wilayas);
    }
}
