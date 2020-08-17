<?php
namespace App\Containers\Ad\Data\Seeders;

use App\Ship\Parents\Seeders\Seeder;

/**
 * Class SettingsDefaultSettingsSeeder
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */

class AdsTableSeeder_2 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       \DB::table('ads')->insert([
            /*1*/
           [
               'category_id' => 15,
               'sender' => 1,
               'status' => 3,
               'title' => 'Взрослые футболочки',
               'message' => 'Lorem ipsum dolor measure amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3,
               'city'=>'London',
               'active'=>1,'administrative'=>'England',
               'price'=>1000.00
           ],
           /*2*/
           [
               'category_id' => 14,
               'sender' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3,'active'=>1,'city'=>'London','administrative'=>'England',
               'status' => 1,
               'price'=>1000.00
           ],
           /*3*/
           [
               'category_id' => 14,
               'sender' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3,'active'=>1,'city'=>'London','administrative'=>'England',
               'status' => 1,
               'price'=>1000.00
           ],
           /*4*/
           [
               'category_id' => 14,
               'sender' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3,'active'=>1,'city'=>'London','administrative'=>'England','status' => 1,
               'price'=>1000.00
           ],
           /*5*/
           [
               'category_id' => 14,
               'sender' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
              'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3,'active'=>1,'city'=>'London','administrative'=>'England','status' => 1,
               'price'=>1000.00

           ],
           /*6*/
           [
               'category_id' => 14,
               'sender' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3,'active'=>1,'city'=>'London','administrative'=>'England','status' => 1,
               'price'=>1000.00
           ],
           /*7*/
           [
               'category_id' => 14,
               'sender' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3,'active'=>1,'city'=>'London','administrative'=>'England','status' => 1,
               'price'=>1000.00
           ],
           /*8*/
           [
               'category_id' => 14,
               'sender' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3,'active'=>1,'city'=>'London','administrative'=>'England','status' => 1,
               'price'=>1000.00
           ],

           /*9*/
           [
               'category_id' => 14,
               'sender' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3,'active'=>1,'city'=>'London','administrative'=>'England','status' => 1,
               'price'=>1000.00
           ],
           /*10*/
           [
               'category_id' => 14,
               'sender' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3,'active'=>1,'city'=>'London','administrative'=>'England','status' => 1,
               'price'=>1000.00
           ],
           /*11*/
           [
               'category_id' => 14,
               'sender' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3,'active'=>1,'city'=>'London','administrative'=>'England','status' => 1,
               'price'=>1000.00
           ],
           /*12*/
           [
               'category_id' => 14,
               'sender' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3,'active'=>1,'city'=>'London','administrative'=>'England','status' => 1,
               'price'=>1000.00
           ],
           /*13*/
           [
               'category_id' => 14,
               'sender' => 1,
               'title' => 'Женские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::tomorrow('Europe/London'),
               'visibility'=>3,'active'=>1,'city'=>'London','administrative'=>'England','status' => 1,
               'price'=>130.00
           ],
           /*14*/
           [
               'category_id' => 14,
               'sender' => 1,
               'title' => 'Взрослые футболочки',
               'message' => 'Lorem ipsum dolor sit amet, measure adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::yesterday(),
               'visibility'=>3,'active'=>1,'city'=>'London','administrative'=>'England','status' => 1,
               'price'=>1000.00
           ],
           /*15*/
           [
               'category_id' => 15,
               'sender' => 2,
               'title' => 'Детские футболочки',
               'message' => 'Lorem measure dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3,'active'=>1,'city'=>'Manchester','administrative'=>'Scotland','status' => 2,
               'price'=>1000.00
           ],
         /*16*/
         [
           'category_id' => 39,
           'sender' => 1,
           'status' => 3,
           'title' => 'Легковой автомобиль с прицепом',
           'message' => 'Lorem ipsum dolor measure amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
           'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
           'created_at'=>\Carbon\Carbon::now(),
           'visibility'=>3,
           'city'=>'London',
           'active'=>1,'administrative'=>'England',
           'price'=>1000.00
         ],


       ]);


        \DB::table('pictures')->insert([
            /*1*/
            [
                'ads_id' => 1,
                'photo'=>'tshort.jpg'
            ],
            [
                'ads_id' => 2,
                'photo'=>'tshort.jpg'
            ],
            [
                'ads_id' => 3,
                'photo'=>'tshort.jpg'
            ],
            [
                'ads_id' => 4,
                'photo'=>'tshort.jpg'
            ],
            [
                'ads_id' => 5,
                'photo'=>'tshort.jpg'
            ],
            [
                'ads_id' => 6,
                'photo'=>'tshort.jpg'
            ],
            [
                'ads_id' => 7,
                'photo'=>'tshort.jpg'
            ],
            [
                'ads_id' => 8,
                'photo'=>'tshort.jpg'
            ],
            [
                'ads_id' => 9,
                'photo'=>'tshort.jpg'
            ],
            [
                'ads_id' => 10,
                'photo'=>'tshort.jpg'
            ],
            [
                'ads_id' => 11,
                'photo'=>'tshort.jpg'
            ],
            [
                'ads_id' => 12,
                'photo'=>'tshort.jpg'
            ],
            [
                'ads_id' => 13,
                'photo'=>'tshort.jpg'
            ],
            [
                'ads_id' => 14,
                'photo'=>'tshort.jpg'
            ],
            [
                'ads_id' => 15,
                'photo'=>'tshort.jpg'
            ],
            [
                'ads_id' => 2,
                'photo'=>'car1.png'
            ],
            [
                'ads_id' => 2,
                'photo'=>'car2.png'
            ],
            [
                'ads_id' => 2,
                'photo'=>'car3.png'
            ],
            [
                'ads_id' => 2,
                'photo'=>'car4.png'
            ],
            [
                'ads_id' => 2,
                'photo'=>'car5.png'
            ],
            [
                'ads_id' => 2,
                'photo'=>'car6.png'
            ]
        ]);

        \DB::table('ad_statuses')->insert([
            /*1*/
            [
                'name' => 'Опубликовано',

            ],
            /*2*/
            [
                'name' => 'На утверждении',

            ],
            /*3*/
            [
                'name' => 'Черновик',

            ],
            /*4*/
            [
                'name' => 'Отвергнуто',

            ],
            /*5*/
            [
                'name' => 'Просрочено',

            ],



        ]);



        \DB::table('second_messanger_groups')->insert([
            /*1*/
            [
            'group_name'=>'Такси близ Аэропорта Ливерпуль',
            'parrent_category_id'=>32

            ],
            /*2*/
            [
                'group_name'=>'Такси центр Ливерпуль',
                'parrent_category_id'=>32

            ],
            /*3*/
            [
                'group_name'=>'Перевозки микроавтобусом',
                'parrent_category_id'=>33

            ],
            /*4*/
            [
                'group_name'=>'Перевозки групп от 10человек',
                'parrent_category_id'=>33


            ],



        ]);

        \DB::table('second_messanger_group_items')->insert([
            /*1*/
            [
                'group_id'=>1,
                'user_id'=>1

            ],
            /*2*/
            [
                'group_id'=>2,
                'user_id'=>1

            ],
            /*3*/
            [
                'group_id'=>3,
                'user_id'=>2

            ],
            /*4*/
            [
                'group_id'=>4,
                'user_id'=>1


            ],



        ]);

        \DB::table('second_messanger_group_recipient_items')->insert([
            /*1*/
            [
                'group_id'=>1,
                'user_id'=>4

            ],



        ]);



    }
}
