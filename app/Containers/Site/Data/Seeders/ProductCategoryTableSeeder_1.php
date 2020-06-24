<?php
namespace App\Containers\Site\Data\Seeders;

use App\Ship\Parents\Seeders\Seeder;

/**
 * Class SettingsDefaultSettingsSeeder
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */

class ProductCategoryTableSeeder_1 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        \DB::table('product_categories')->insert([
            /*1*/
            [
                'parent_id' => 0,
                'name' => 'Детский мир',
                'link'=> '/child_world',
                'icon'=>'fa-globe',
                'position'=>1,
                'photo'=>'https://images.ua.prom.st/181552823_w230_h230_detskie-elektromobili-benzomobili.jpg'

            ],
            /*2*/
            [
                'parent_id' => 0,
                'name' => 'Недвижимость',
                'link'=> '/advertising',
                'icon'=>'fa-globe',
                'position'=>2,
                'photo'=>'https://images.ua.prom.st/197731655_w230_h230_operatsii-s-nedvizhimostyu.jpg'
            ],
            /*3*/
            [
                'parent_id' => 0,
                'name' => 'Транспорт',
                'link'=> '/contact_with_admin',
                'icon'=>'fa-globe',
                'position'=>3,
                'photo'=>'https://images.ua.prom.st/306573079_w230_h230_logisticheskie-i-skladskie.jpg'

            ],
            /*4*/
            [
                'parent_id' => 0,
                'name' => 'Запчасти для транспорта',
                'link'=> '/portal_information',
                'icon'=>'fa-home',
                'position'=>4,
                'photo'=>'https://images.ua.prom.st/178467292_w230_h230_dvigateli-i-detali.jpg'

            ],
            /*5*/
            [
                'parent_id' => 0,
                'name' => 'Работа',
                'link'=> '/private_cabinet',
                'icon'=>'fa-home',
                'position'=>5,
                'photo'=>'https://images.ua.prom.st/319555510_w230_h230_informatsionno-kommunikatsionnye-uslugi.jpg'

            ],
            /*6*/
            [
                'parent_id' => 0,
                'name' => 'Животные',
                'link'=> '/private_cabinet',
                'icon'=>'fa-home',
                'position'=>6,
                'photo'=>'https://images.ua.prom.st/185429417_w230_h230_domashnie-zhivotnye-i.jpg'

            ],
            /*7*/
            [
                'parent_id' => 0,
                'name' => 'Дом и Сад',
                'link'=> '/private_cabinet',
                'icon'=>'fa-home',
                'position'=>7,
                'photo'=>'https://images.ua.prom.st/167677418_w230_h230_sad.jpg'

            ],
            /*8*/
            [
                'parent_id' => 0,
                'name' => 'Электроника',
                'link'=> '/private_cabinet',
                'icon'=>'fa-home',
                'position'=>8,
                'photo'=>'https://images.ua.prom.st/184039079_w230_h230_tv-i-videotehnika.jpg'

            ],
            /*9*/
            [
                'parent_id' => 0,
                'name' => 'Бизнес и услуги',
                'link'=> '/private_cabinet',
                'icon'=>'fa-home',
                'position'=>9,
                'photo'=>'https://images.ua.prom.st/323740502_w230_h230_konsaltingovye-uslugi.jpg'

            ],
            /*10*/
            [
                'parent_id' => 0,
                'name' => 'Мода и стиль',
                'link'=> '/private_cabinet',
                'icon'=>'fa-home',
                'position'=>10,
                'photo'=>'https://images.ua.prom.st/1080513521_w230_h230_vesennyaya-odezhda-i.jpg'

            ],
            /*11*/
            [
                'parent_id' => 0,
                'name' => 'Хобби отдых и спорт',
                'link'=> '/private_cabinet',
                'icon'=>'fa-home',
                'position'=>11,
                'photo'=>'https://images.ua.prom.st/191919532_w230_h230_tovary-dlya-turizma.jpg'

            ],
            /*12*/
            [
                'parent_id' => 0,
                'name' => 'Отдам бесплатно',
                'link'=> '/private_cabinet',
                'icon'=>'fa-home',
                'position'=>12,
                'photo'=>'https://images.ua.prom.st/191919525_w230_h230_tovary-dlya-sporta.jpg'

            ],
            /*13*/
            [
                'parent_id' => 0,
                'name' => 'Обмен',
                'link'=> '/private_cabinet',
                'icon'=>'fa-home',
                'position'=>13,
                'photo'=>'https://images.ua.prom.st/171462971_w230_h230_numizmatika-bonistika.jpg'

            ],
            /*14*/
            [
                'parent_id' => 1,
                'name' => 'Детская одежда',
                'link'=> '/private_cabinet',
                'icon'=>'fa-home',
                'position'=>2,
                'photo'=>'first_category.png'

            ],
            /*15*/
            [
                'parent_id' => 1,
                'name' => 'Детская обувь',
                'link'=> '/private_cabinet',
                'icon'=>'fa-home',
                'position'=>1,
                'photo'=>'first_category.png'

            ],
            /*16*/
            [
                'parent_id' => 1,
                'name' => 'Детские коляски',
                'link'=> '/private_cabinet',
                'icon'=>'fa-home',
                'position'=>3,
                'photo'=>'first_category.png'

            ],
            /*17*/
            [
                'parent_id' => 1,
                'name' => 'Детские автокресла',
                'link'=> '/private_cabinet',
                'icon'=>'fa-home',
                'position'=>4,
                'photo'=>'first_category.png'

            ],
            /*18*/
            [
                'parent_id' => 1,
                'name' => 'Детская мебель',
                'link'=> '/private_cabinet',
                'icon'=>'fa-home',
                'position'=>5,
                'photo'=>'first_category.png'

            ],
            /*19*/
            [
                'parent_id' => 1,
                'name' => 'Игрушки',
                'link'=> '/private_cabinet',
                'icon'=>'fa-home',
                'position'=>6,
                'photo'=>'first_category.png'

            ],
            /*20*/
            [
                'parent_id' => 1,
                'name' => 'Детский транспорт',
                'link'=> '/private_cabinet',
                'icon'=>'fa-home',
                'position'=>7,
                'photo'=>'first_category.png'

            ],
            /*21*/
            [
                'parent_id' => 1,
                'name' => 'Питание',
                'link'=> '/private_cabinet',
                'icon'=>'fa-home',
                'position'=>8,
                'photo'=>'first_category.png'

            ],
            /*22*/
            [
                'parent_id' => 1,
                'name' => 'Товары для школьников',
                'link'=> '/private_cabinet',
                'icon'=>'fa-home',
                'position'=>9,
                'photo'=>'first_category.png'

            ],
            /*23*/
            [
                'parent_id' => 1,
                'name' => 'Другие детские товары',
                'link'=> '/private_cabinet',
                'icon'=>'fa-home',
                'position'=>10,
                'photo'=>'first_category.png'

            ],
            /*24*/
            [
                'parent_id' => 2,
                'name' => 'Квартиры и комнаты',
                'link'=> '/private_cabinet',
                'icon'=>'fa-home',
                'position'=>1,
                'photo'=>'first_category.png'

            ],
            /*25*/
            [
                'parent_id' => 2,
                'name' => 'Дома',
                'link'=> '/private_cabinet',
                'icon'=>'fa-home',
                'position'=>2,
                'photo'=>'first_category.png'

            ],
            /*26*/
            [
                'parent_id' => 2,
                'name' => 'Земля',
                'link'=> '/private_cabinet',
                'icon'=>'fa-home',
                'position'=>3,
                'photo'=>'first_category.png'

            ],
            /*27*/
            [
                'parent_id' => 2,
                'name' => 'Коммерческая недвижимость',
                'link'=> '/private_cabinet',
                'icon'=>'fa-home',
                'position'=>4,
                'photo'=>'first_category.png'

            ],
            /*28*/
            [
                'parent_id' => 2,
                'name' => 'Гаражи парковки',
                'link'=> '/private_cabinet',
                'icon'=>'fa-home',
                'position'=>5,
                'photo'=>'first_category.png'

            ],
            /*29*/
            [
                'parent_id' => 2,
                'name' => 'Посуточная аренда жилья',
                'link'=> '/private_cabinet',
                'icon'=>'fa-home',
                'position'=>6,
                'photo'=>'first_category.png'

            ],
            /*30*/
            [
                'parent_id' => 2,
                'name' => 'Предложения от застройщиков',
                'link'=> '/private_cabinet',
                'icon'=>'fa-home',
                'position'=>7,
                'photo'=>'first_category.png'

            ],
            /*31*/
            [
                'parent_id' => 2,
                'name' => 'Недвижимость за границей',
                'link'=> '/private_cabinet',
                'icon'=>'fa-home',
                'position'=>8,
                'photo'=>'first_category.png'

            ],
            /*32*/
            [
                'parent_id' => 3,
                'name' => 'Такси',
                'link'=> '/private_cabinet',
                'icon'=>'fa-home',
                'position'=>1,
                'photo'=>'first_category.png'

            ],
            /*33*/
            [
                'parent_id' => 3,
                'name' => 'Пасажирские перевозки',
                'link'=> '/private_cabinet',
                'icon'=>'fa-home',
                'position'=>2,
                'photo'=>'first_category.png'

            ],


        ]);
    }
}
