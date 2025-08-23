<?php

namespace Database\Seeders;

use App\Models\ServiceCat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServerCatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $servercategury = [
            ['name' => ' الأعمال الإدارية','description'=>"الأعمال الإدارية هي مجال واسع يتضمن العديد من أنواع المناصب الإدارية، من الشركات الكبرى إلى الشركات المستقلة"],
            ['name' => 'الصيانة و التشغيل','description'=>"الصيانة و التشغيل هو مجال يهتم إصلاح الأجهزة الإكترونية و الألات"],
            ['name' => ' المواصلات و التوصيل','description'=>" هي مجال التي تهتم بنقل الأشخاص أو الحيوانات أوالبضائع من كان إالى أخر"],
            ['name' => ' القانون','description'=>"هي مجال متعلقة بأمور القاون و القضاة"],
            ['name' => ' الكتابة و الترجمة','description'=>"هي مجال التي تهتم بالكتاب و المترجمين "],
            ['name' => 'البرمجة و التطوير','description'=>"هي مجال متعلقة بأمور  الأجهزة الحاسوب "],
            ['name' => ' التعليم','description'=>" هي مجال التي تهتم بتنمية العقل و المعرفة     "],
            ['name' => ' الصوتيات','description'=>"هي مجال التي تهتم بالتعليق و الغناء"],
            ['name' => ' الرياضة','description'=>"هي مجال التي تهتم بالياقة البدنية"],
            ['name' => ' البناء','description'=>"هي مجال تهتم بالعمارة بيوت و جسور  "],
            ['name' => ' الصحة','description'=>"هي مجال  تهتم بالمرضى و عناية في مجال الطبي"],
            ['name' => ' الزينة و الديكور','description'=>"هي مجال التي تهتم بالتزيين"],
            ['name' => ' الزراعة','description'=>"هي مجال  التي تهتم بالحدائق و البساتين "],
            ['name' => ' التصميم','description'=>"هي مجال تهتم بالتصاميم فيديوهات و صور وخياطة"],
        ];
        ServiceCat::insert($servercategury);
    }
}
