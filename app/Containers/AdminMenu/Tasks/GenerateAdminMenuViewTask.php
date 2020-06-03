<?php

namespace App\Containers\AdminMenu\Tasks;

use App\Containers\AdminMenu\Data\Repositories\AdminMenuRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class GenerateAdminMenuViewTask extends Task
{

    protected $repository;
    public $level;
    public $lang = 'en';

    public function __construct(AdminMenuRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
                if (!$data) {
                    return NULL;
                }
                $arr_cat = array();
                if (count($data) != 0) {

                    //В цикле формируем массив

                    foreach ($data as $key => $row) {
                        //Формируем массив где ключами являются адишники на родительские категории
                        if (empty($arr_cat[$row['parent_id']])) {
                            $arr_cat[$row['parent_id']] = array();
                        }
                        $arr_cat[$row['parent_id']][] = $row;
                    }


                    //возвращаем массив
                    return $this->view_cat($arr_cat,0,0);


                }





    }

    //вывод каталогa с помощью рекурсии
    public function view_cat($arr, $parent_id = 0, $level, $parents_approved=[] ) {

        //Условия выхода из рекурсии
        if (empty($arr[$parent_id])) {
            return;
        }
        if($parent_id !== 0) {
            echo '<ul >';
        }
        //перебираем в цикле массив и выводим на экран
        for ($i = 0; $i < count($arr[$parent_id]); $i++) {
            //Если пермишен присутствуют у текущего юзера выводить нулевой уровень
dump(auth()->user()->hasPermissionTo('view_customer_interface','admin'));
dd(\Auth::guard('web')->check(),\Auth::guard('admin')->check());
            dump($arr[$parent_id][$i]['permission'],\Auth::guard('admin')->user(),\Auth::guard('admin')->user()->can($arr[$parent_id][$i]['permission']));
     /*      if(($arr[$parent_id][$i]['permission']!=null && \Auth::user()->can($arr[$parent_id][$i]['permission'])) ||
                ($arr[$parent_id][$i]['permission']==null && in_array($arr[$parent_id][$i]['parent_id'],$parents_approved))){

                if($arr[$parent_id][$i]['permission']!=null && \Auth::user()->can($arr[$parent_id][$i]['permission'])){
                    $parents_approved[]=$arr[$parent_id][$i]->id;
                }*/
                if($arr[$parent_id][$i]['type'] == 'not_linked' ){
                    echo '<li><a>';
                }
                else{
                    if($arr[$parent_id][$i]['link']=='/admin/profile'){

                        $token=\Auth::user()['rememberToken'];
                    }else{$token='';}

                    echo '
                              <li>
                            <a href="'.$arr[$parent_id][$i]['link'].'/'.$token.'  ">';




                }
                if($parent_id == 0){
                    echo '<i class="fa '.$arr[$parent_id][$i]['icon'].'"></i>';
                }

                echo '
                    <span class="nav-link-text">' . $arr[$parent_id][$i]['name'] . '</span>
                    <i class="arrow"></i>
                                </a>';
                //рекурсия - проверяем нет ли дочерних категорий
                $this->view_cat($arr, $arr[$parent_id][$i]['id'], 1,$parents_approved);
                echo '</li> ';

           /* }*/

        }
        if($parent_id !== 0) {
            echo '</ul>';
        }
    }
}
