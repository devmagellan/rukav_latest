<?php

namespace App\Containers\Settings\Data\Seeders;

use App\Ship\Parents\Seeders\Seeder;
class PlacesUkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \DB::table('places_uk')->insert([
            /*1*/
            [
                'name' => 'England',
                'parent_id'=>0,

            ],
            /*2*/
            [
                'name' => 'Scotland',
                'parent_id'=>0,

            ],
            /*3*/
            [
                'name' => 'Wales',
                'parent_id'=>0,

            ],
            /*4*/
            [
                'name' => 'Nothern Irland',
                'parent_id'=>0,

            ],
            /*5*/
            [
                'name' => 'Bedfordshire',
                'parent_id'=>1,

            ],
            /*6*/
            [
                'name' => 'Arlesey, Bedfordshire',
                'parent_id'=>5,

            ],
            /*7*/
            [
                'name' => 'Bedford, Bedfordshire',
                'parent_id'=>5,

            ],
            /*8*/
            [
                'name' => 'Biggleswade, Bedfordshire',
                'parent_id'=>5,

            ],
            /*9*/
            [
                'name' => 'Dunstable, Bedfordshire',
                'parent_id'=>5,

            ],
            /*10*/
            [
                'name' => 'Henlow, Bedfordshire',
                'parent_id'=>5,

            ],
            /*11*/
            [
                'name' => 'Leighton Buzzard, Bedfordshire',
                'parent_id'=>5,

            ],
            /*12*/
            [
                'name' => 'Luton, Bedfordshire',
                'parent_id'=>5,

            ],
            /*13*/
            [
                'name' => 'Sandy, Bedfordshire',
                'parent_id'=>5,

            ],
            /*14*/
            [
                'name' => 'Shefford, Bedfordshire',
                'parent_id'=>5,

            ],
            /*15*/
            [
                'name' => 'Ampthill, Bedfordshire',
                'parent_id'=>7,

            ],
            /*16*/
            [
                'name' => 'Barton-le-Clay, Bedfordshire',
                'parent_id'=>7,

            ],
            /*17*/
            [
                'name' => 'Bromham, Bedfordshire',
                'parent_id'=>7,

            ],
            /*18*/
            [
                'name' => 'Clapham, Bedfordshire',
                'parent_id'=>7,

            ],
            /*19*/
            [
                'name' => 'Cranfield, Bedfordshire',
                'parent_id'=>7,

            ],
            /*20*/
            [
                'name' => 'Flitwick, Bedfordshire',
                'parent_id'=>7,

            ],
            /*21*/
            [
                'name' => 'Kempston, Bedfordshire',
                'parent_id'=>7,

            ],
            /*22*/
            [
                'name' => 'Marston Moretaine, Bedfordshire',
                'parent_id'=>7,

            ],
            /*23*/
            [
                'name' => 'Wootton, Bedfordshire',
                'parent_id'=>7,

            ],
            /*24*/
            [
                'name' => 'Houghton Regis, Bedfordshire',
                'parent_id'=>9,

            ],
            /*25*/
            [
                'name' => 'Toddington, Bedfordshire',
                'parent_id'=>9,

            ],
            /*26*/
            [
                'name' => 'Gamlingay, Bedfordshire',
                'parent_id'=>13,

            ],
            /*26*/
            [
                'name' => 'Potton, Bedfordshire',
                'parent_id'=>13,

            ],
            /*27*/
            [
                'name' => 'Berkshire',
                'parent_id'=>1,

            ],

            /*28*/
            [
                'name' => 'Ascot, Berkshire',
                'parent_id'=>27,

            ],

            /*29*/
            [
                'name' => 'Bracknell, Berkshire',
                'parent_id'=>27,

            ],

            /*30*/
            [
                'name' => 'Crowthorne, Berkshire',
                'parent_id'=>27,

            ],

            /*31*/
            [
                'name' => 'Hungerford, Berkshire',
                'parent_id'=>27,

            ],

            /*32*/
            [
                'name' => 'Maidenhead, Berkshire',
                'parent_id'=>27,

            ],

            /*33*/
            [
                'name' => 'Newbury, Berkshire',
                'parent_id'=>27,

            ],

            /*34*/
            [
                'name' => 'Reading, Berkshire',
                'parent_id'=>27,

            ],

            /*35*/
            [
                'name' => 'Sandhurst, Berkshire',
                'parent_id'=>27,

            ],

            /*36*/
            [
                'name' => 'Slough, Berkshire',
                'parent_id'=>27,

            ],

            /*37*/
            [
                'name' => 'Thatcham, Berkshire',
                'parent_id'=>27,

            ],

            /*38*/
            [
                'name' => 'Windsor, Berkshire',
                'parent_id'=>27,

            ],

            /*39*/
            [
                'name' => 'Wokingham, Berkshire',
                'parent_id'=>27,

            ],

            /*40*/
            [
                'name' => 'Binfield, Berkshire',
                'parent_id'=>29,

            ],

            /*41*/
            [
                'name' => 'Warfield, Berkshire',
                'parent_id'=>29,

            ],

            /*42*/
            [
                'name' => 'Lambourn, Berkshire',
                'parent_id'=>31,

            ],

            /*43*/
            [
                'name' => 'Cookham, Berkshire',
                'parent_id'=>32,

            ],

            /*44*/
            [
                'name' => 'Taplow, Berkshire',
                'parent_id'=>32,

            ],

            /*45*/
            [
                'name' => 'Kingsclere, Berkshire',
                'parent_id'=>33,

            ],

            /*46*/
            [
                'name' => 'Burghfield Common, Berkshire',
                'parent_id'=>34,

            ],

            /*47*/
            [
                'name' => 'Calcot, Berkshire',
                'parent_id'=>34,

            ],

            /*48*/
            [
                'name' => 'Caversham, Berkshire',
                'parent_id'=>34,

            ],

            /*49*/
            [
                'name' => 'Earley, Berkshire',
                'parent_id'=>34,

            ],

            /*50*/
            [
                'name' => 'Emmer Green, Berkshire',
                'parent_id'=>34,

            ],

            /*51*/
            [
                'name' => 'Goring, Berkshire',
                'parent_id'=>34,

            ],

            /*52*/
            [
                'name' => 'Lower Earley, Berkshire',
                'parent_id'=>34,

            ],

            /*53*/
            [
                'name' => 'Pangbourne, Berkshire',
                'parent_id'=>34,

            ],

            /*54*/
            [
                'name' => 'Shinfield, Berkshire',
                'parent_id'=>34,

            ],

            /*55*/
            [
                'name' => 'Spencers Wood, Berkshire',
                'parent_id'=>34,

            ],

            /*56*/
            [
                'name' => 'Theale, Berkshire',
                'parent_id'=>34,

            ],

            /*57*/
            [
                'name' => 'Tilehurst, Berkshire',
                'parent_id'=>34,

            ],

            /*58*/
            [
                'name' => 'Twyford, Berkshire',
                'parent_id'=>34,

            ],

            /*59*/
            [
                'name' => 'Wargrave, Berkshire',
                'parent_id'=>34,

            ],

            /*60*/
            [
                'name' => 'Woodley, Berkshire',
                'parent_id'=>34,

            ],

            /*61*/
            [
                'name' => 'College Town, Berkshire',
                'parent_id'=>35,

            ],

            /*62*/
            [
                'name' => 'Owlsmoor, Berkshire',
                'parent_id'=>35,

            ],

            /*63*/
            [
                'name' => 'Burnham, Berkshire',
                'parent_id'=>36,

            ],

            /*64*/
            [
                'name' => 'Colnbrook, Berkshire',
                'parent_id'=>36,

            ],

            /*65*/
            [
                'name' => 'Datchet, Berkshire',
                'parent_id'=>36,

            ],

            /*66*/
            [
                'name' => 'Farnham Common, Berkshire',
                'parent_id'=>36,

            ],

            /*67*/
            [
                'name' => 'Stoke Poges, Berkshire',
                'parent_id'=>36,

            ],

            /*68*/
            [
                'name' => 'Hermitage, Berkshire',
                'parent_id'=>37,

            ],

            /*69*/
            [
                'name' => 'Old Windsor, Berkshire',
                'parent_id'=>38,

            ],

            /*70*/
            [
                'name' => 'Winkfield, Berkshire',
                'parent_id'=>38,

            ],

            /*71*/
            [
                'name' => 'Finchampstead, Berkshire',
                'parent_id'=>39,

            ],

            /*72*/
            [
                'name' => 'Winnersh, Berkshire',
                'parent_id'=>39,

            ],

            /*73*/
            [
                'name' => 'Bristol',
                'parent_id'=>1,

            ],

            /*74*/
            [
                'name' => 'Almondsbury, Bristol',
                'parent_id'=>73,

            ],

            /*75*/
            [
                'name' => 'Ashley Down, Bristol',
                'parent_id'=>73,

            ],

            /*76*/
            [
                'name' => 'Ashton, Bristol',
                'parent_id'=>73,

            ],

            /*77*/
            [
                'name' => 'Backwell, Bristol',
                'parent_id'=>73,

            ],

            /*78*/
            [
                'name' => 'Barton Hill, Bristol',
                'parent_id'=>73,

            ],

            /*79*/
            [
                'name' => 'Bedminster Down, Bristol',
                'parent_id'=>73,

            ],

            /*80*/
            [
                'name' => 'Bedminster, Bristol',
                'parent_id'=>73,

            ],

            /*81*/
            [
                'name' => 'Bishopston, Bristol',
                'parent_id'=>73,

            ],

            /*82*/
            [
                'name' => 'Bishopsworth, Bristol',
                'parent_id'=>73,

            ],

            /*83*/
            [
                'name' => 'Bradley Stoke, Bristol',
                'parent_id'=>73,

            ],

            /*84*/
            [
                'name' => 'Brentry, Bristol',
                'parent_id'=>73,

            ],

            /*85*/
            [
                'name' => 'Brislington, Bristol',
                'parent_id'=>73,

            ],

            /*86*/
            [
                'name' => 'Bristol City Centre, Bristol',
                'parent_id'=>73,

            ],

            /*87*/
            [
                'name' => 'Broadmead, Bristol',
                'parent_id'=>73,

            ],

            /*88*/
            [
                'name' => 'Chipping Sodbury, Bristol',
                'parent_id'=>73,

            ],

            /*89*/
            [
                'name' => 'Clifton Village, Bristol',
                'parent_id'=>73,

            ],

            /*90*/
            [
                'name' => 'Clifton, Bristol',
                'parent_id'=>73,

            ],

            /*91*/
            [
                'name' => 'Cliftonwood, Bristol',
                'parent_id'=>73,

            ],

            /*92*/
            [
                'name' => 'Coalpit Heath, Bristol',
                'parent_id'=>73,

            ],

            /*93*/
            [
                'name' => 'Congresbury, Bristol',
                'parent_id'=>73,

            ],

            /*94*/
            [
                'name' => 'Coombe Dingle, Bristol',
                'parent_id'=>73,

            ],

            /*95*/
            [
                'name' => 'Cotham, Bristol',
                'parent_id'=>73,

            ],

            /*96*/
            [
                'name' => 'Downend, Bristol',
                'parent_id'=>73,

            ],

            /*97*/
            [
                'name' => 'Easton, Bristol',
                'parent_id'=>73,

            ],

            /*98*/
            [
                'name' => 'Eastville, Bristol',
                'parent_id'=>73,

            ],

            /*99*/
            [
                'name' => 'Emersons Green, Bristol',
                'parent_id'=>73,

            ],

            /*100*/
            [
                'name' => 'Filton, Bristol',
                'parent_id'=>73,

            ],

            /*101*/
            [
                'name' => 'Fishponds, Bristol',
                'parent_id'=>73,

            ],

            /*102*/
            [
                'name' => 'Frampton Cotterell, Bristol',
                'parent_id'=>73,

            ],

            /*103*/
            [
                'name' => 'Frenchay, Bristol',
                'parent_id'=>73,

            ],

            /*104*/
            [
                'name' => 'Gloucester Road, Bristol',
                'parent_id'=>73,

            ],

            /*105*/
            [
                'name' => 'Greenbank, Bristol',
                'parent_id'=>73,

            ],

            /*106*/
            [
                'name' => 'Hanham, Bristol',
                'parent_id'=>73,

            ],

            /*107*/
            [
                'name' => 'Harbourside, Bristol',
                'parent_id'=>73,

            ],

            /*108*/
            [
                'name' => 'Hartcliffe, Bristol',
                'parent_id'=>73,

            ],

            /*109*/
            [
                'name' => 'Headley Park, Bristol',
                'parent_id'=>73,

            ],

            /*110*/
            [
                'name' => 'Henbury, Bristol',
                'parent_id'=>73,

            ],

            /*111*/
            [
                'name' => 'Hengrove, Bristol',
                'parent_id'=>73,

            ],

            /*112*/
            [
                'name' => 'Henleaze, Bristol',
                'parent_id'=>73,

            ],

            /*113*/
            [
                'name' => 'Horfield, Bristol',
                'parent_id'=>73,

            ],

            /*114*/
            [
                'name' => 'Hotwells, Bristol',
                'parent_id'=>73,

            ],

            /*115*/
            [
                'name' => 'Keynsham, Bristol',
                'parent_id'=>73,

            ],

            /*116*/
            [
                'name' => 'Kingsdown, Bristol',
                'parent_id'=>73,

            ],

            /*117*/
            [
                'name' => 'Kingswood, Bristol',
                'parent_id'=>73,

            ],

            /*118*/
            [
                'name' => 'Knowle Park, Bristol',
                'parent_id'=>73,

            ],

            /*119*/
            [
                'name' => 'Knowle, Bristol',
                'parent_id'=>73,

            ],

            /*120*/
            [
                'name' => 'Lawrence Hill, Bristol',
                'parent_id'=>73,

            ],

            /*121*/
            [
                'name' => 'Lawrence Weston, Bristol',
                'parent_id'=>73,

            ],

            /*122*/
            [
                'name' => 'Little Stoke, Bristol',
                'parent_id'=>73,

            ],

            /*123*/
            [
                'name' => 'Lockleaze, Bristol',
                'parent_id'=>73,

            ],

            /*124*/
            [
                'name' => 'Long Ashton, Bristol',
                'parent_id'=>73,

            ],

            /*125*/
            [
                'name' => 'Longwell Green, Bristol',
                'parent_id'=>73,

            ],

            /*126*/
            [
                'name' => 'Mangotsfield, Bristol',
                'parent_id'=>73,

            ],

            /*127*/
            [
                'name' => 'Montpelier, Bristol',
                'parent_id'=>73,

            ],

            /*128*/
            [
                'name' => 'Nailsea, Bristol',
                'parent_id'=>73,

            ],

            /*129*/
            [
                'name' => 'Old Market, Bristol',
                'parent_id'=>73,

            ],

            /*130*/
            [
                'name' => 'Patchway, Bristol',
                'parent_id'=>73,

            ],

            /*131*/
            [
                'name' => 'Paulton, Bristol',
                'parent_id'=>73,

            ],

            /*132*/
            [
                'name' => 'Pill, Bristol',
                'parent_id'=>73,

            ],

            /*133*/
            [
                'name' => 'Portishead, Bristol',
                'parent_id'=>73,

            ],

            /*134*/
            [
                'name' => 'Redcliffe, Bristol',
                'parent_id'=>73,

            ],

            /*135*/
            [
                'name' => 'Redfield, Bristol',
                'parent_id'=>73,

            ],

            /*136*/
            [
                'name' => 'Redland, Bristol',
                'parent_id'=>73,

            ],

            /*137*/
            [
                'name' => 'Saltford, Bristol',
                'parent_id'=>73,

            ],

            /*138*/
            [
                'name' => 'Sea Mills, Bristol',
                'parent_id'=>73,

            ],

            /*139*/
            [
                'name' => 'Shirehampton, Bristol',
                'parent_id'=>73,

            ],

            /*140*/
            [
                'name' => 'Sneyd Park, Bristol',
                'parent_id'=>73,

            ],

            /*141*/
            [
                'name' => 'Southmead, Bristol',
                'parent_id'=>73,

            ],

            /*142*/
            [
                'name' => 'Southville, Bristol',
                'parent_id'=>73,

            ],

            /*143*/
            [
                'name' => 'Speedwell, Bristol',
                'parent_id'=>73,

            ],

            /*144*/
            [
                'name' => 'St Agnes, Bristol',
                'parent_id'=>73,

            ],

            /*145*/
            [
                'name' => 'St Andrews, Bristol',
                'parent_id'=>73,

            ],

            /*146*/
            [
                'name' => 'St Annes, Bristol',
                'parent_id'=>73,

            ],

            /*147*/
            [
                'name' => 'St George, Bristol',
                'parent_id'=>73,

            ],

            /*148*/
            [
                'name' => 'St Pauls, Bristol',
                'parent_id'=>73,

            ],

            /*149*/
            [
                'name' => 'St Werburghs, Bristol',
                'parent_id'=>73,

            ],

            /*150*/
            [
                'name' => 'Staple Hill, Bristol',
                'parent_id'=>73,

            ],

            /*151*/
            [
                'name' => 'Stapleton, Bristol',
                'parent_id'=>73,

            ],

            /*152*/
            [
                'name' => 'Stockwood, Bristol',
                'parent_id'=>73,

            ],

            /*153*/
            [
                'name' => 'Stoke Bishop, Bristol',
                'parent_id'=>73,

            ],

            /*154*/
            [
                'name' => 'Stoke Gifford, Bristol',
                'parent_id'=>73,

            ],

            /*155*/
            [
                'name' => 'Stoke Park, Bristol',
                'parent_id'=>73,

            ],

            /*156*/
            [
                'name' => 'Stokes Croft, Bristol',
                'parent_id'=>73,

            ],

            /*157*/
            [
                'name' => 'Temple Meads, Bristol',
                'parent_id'=>73,

            ],

            /*158*/
            [
                'name' => 'Thornbury, Bristol',
                'parent_id'=>73,

            ],

            /*159*/
            [
                'name' => 'Totterdown, Bristol',
                'parent_id'=>73,

            ],

            /*160*/
            [
                'name' => 'Upper Knowle, Bristol',
                'parent_id'=>73,

            ],

            /*161*/
            [
                'name' => 'Victoria Park, Bristol',
                'parent_id'=>73,

            ],

            /*162*/
            [
                'name' => 'Warmley, Bristol',
                'parent_id'=>73,

            ],

            /*163*/
            [
                'name' => 'Wells Road, Bristol',
                'parent_id'=>73,

            ],

            /*164*/
            [
                'name' => 'Westbury On Trym, Bristol',
                'parent_id'=>73,

            ],

            /*165*/
            [
                'name' => 'Westbury Park, Bristol',
                'parent_id'=>73,

            ],

            /*166*/
            [
                'name' => 'Whitchurch, Bristol',
                'parent_id'=>73,

            ],

            /*167*/
            [
                'name' => 'Whitehall, Bristol',
                'parent_id'=>73,

            ],

            /*168*/
            [
                'name' => 'Whiteladies Road, Bristol',
                'parent_id'=>73,

            ],

            /*169*/
            [
                'name' => 'Windmill Hill, Bristol',
                'parent_id'=>73,

            ],

            /*170*/
            [
                'name' => 'Winterbourne, Bristol',
                'parent_id'=>73,

            ],

            /*171*/
            [
                'name' => 'Withywood, Bristol',
                'parent_id'=>73,

            ],

            /*172*/
            [
                'name' => 'Wrington, Bristol',
                'parent_id'=>73,

            ],

            /*173*/
            [
                'name' => 'Yate, Bristol',
                'parent_id'=>73,

            ],

            /*174*/
            [
                'name' => 'Yatton, Bristol',
                'parent_id'=>73,

            ],

            /*175*/
            [
                'name' => 'Buckinghamshire',
                'parent_id'=>1,

            ],





        ]);



    }
}
