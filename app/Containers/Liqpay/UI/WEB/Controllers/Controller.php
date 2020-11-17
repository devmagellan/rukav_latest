<?php

namespace App\Containers\Liqpay\UI\WEB\Controllers;

use App\Containers\Liqpay\UI\WEB\Requests\CreateLiqpayRequest;
use App\Containers\Liqpay\UI\WEB\Requests\DeleteLiqpayRequest;
use App\Containers\Liqpay\UI\WEB\Requests\GetAllLiqpaysRequest;
use App\Containers\Liqpay\UI\WEB\Requests\FindLiqpayByIdRequest;
use App\Containers\Liqpay\UI\WEB\Requests\UpdateLiqpayRequest;
use App\Containers\Liqpay\UI\WEB\Requests\StoreLiqpayRequest;
use App\Containers\Liqpay\UI\WEB\Requests\EditLiqpayRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Liqpay\Classes\LiqPay;

/**
 * Class Controller
 *
 * @package App\Containers\Liqpay\UI\WEB\Controllers
 */
class Controller extends WebController
{
    /**
     * Show all entities
     *
     * @param GetAllLiqpaysRequest $request
     */
    public function index(GetAllLiqpaysRequest $request)
    {
      $result=[];
      return view('liqpay::index', $result);
    }

    /**
     * Show one entity
     *
     * @param FindLiqpayByIdRequest $request
     */
    public function show(FindLiqpayByIdRequest $request)
    {
        $liqpay = Apiato::call('Liqpay@FindLiqpayByIdAction', [$request]);

        // ..
    }

    /**
     * Create entity (show UI)
     *
     * @param CreateLiqpayRequest $request
     */
    public function create(CreateLiqpayRequest $request)
    {


     // $request = json_decode(file_get_contents("php://input"));
      if (isset($request)) {
     /*   if (empty($request->ordered)) {
          echo 'http://' . $_SERVER['HTTP_HOST'];
          die;
        }*/
        $amount = $request->totalPrice;
        \DB::beginTransaction();
        try {
          /*          $db = new Database();
                    $db->beginTransaction();*/
          //$response = $db->insertClient($request->textMessage, $request->phoneNumber, $amount, json_encode($request));
          $response['state']=1;
          $response['id']=1111;
          if (!$response['state']) {
            die('Server error. Please contact to administrator.');
          }
          if ($request->paymentMethod == 'onlinePayment') {
            // online paid
            $publicKey = env('LIQPAY_PUBLIC_KEY');
            $privateKey = env('LIQPAY_PRIVATE_KEY');
            $lp = new LiqPay($publicKey, $privateKey);
            return $lp->cnb_form(array('action'=> 'pay','version' => '3','amount' => $amount, 'currency' => 'UAH', 'description' => 'payment for order ' . $response['id'] . ' for burgerjoint.com.ua', 'server_url' => "http://{$_SERVER['HTTP_HOST']}/scripts/server.php", 'result_url' => "http://{$_SERVER['HTTP_HOST']}/scripts/result.php?id={$response['id']}", 'order_id' => $response['id']));
          } else {
            //$sms = new SmsClient($params['SmsUkraine']['login'], $params['SmsUkraine']['password']);
            /*    $email = new Email();
                if ($email->sendEmail($request, true, $response['id'])) {
                  $db->setAsPaid($response['id']);
                  $sms->sendSMS('BurgerJoint', $params['adminNumber'], 'Нове замовлення ' . $response['id']);
                  $url = 'http://' . $_SERVER['HTTP_HOST'] . '/index.html#/success';
                } else {
                  $url = 'http://' . $_SERVER['HTTP_HOST'] . '/index.html#/failure';
                }*/
          }
          \DB::commit();
          //echo $url;
          die;
        } catch (Exception $e) {
          //$email->sendEmail('Сталася помилка - ' . $e->getMessage(), false, $response['id']);
          \Log::info('Сталася помилка - ' . $e->getMessage(), false, $response['id']);
          \DB::rollback();
          echo 'index.html#/failure';
          die;
        }
      } else {
        throw new InvalidArgumentException('Data not isset');
      }
    }

    /**
     * Add a new entity
     *
     * @param StoreLiqpayRequest $request
     */
    public function store(StoreLiqpayRequest $request)
    {
        $liqpay = Apiato::call('Liqpay@CreateLiqpayAction', [$request]);

        // ..
    }

    /**
     * Edit entity (show UI)
     *
     * @param EditLiqpayRequest $request
     */
    public function edit(EditLiqpayRequest $request)
    {
        $liqpay = Apiato::call('Liqpay@GetLiqpayByIdAction', [$request]);

        // ..
    }

    /**
     * Update a given entity
     *
     * @param UpdateLiqpayRequest $request
     */
    public function update(UpdateLiqpayRequest $request)
    {
        $liqpay = Apiato::call('Liqpay@UpdateLiqpayAction', [$request]);

        // ..
    }

    /**
     * Delete a given entity
     *
     * @param DeleteLiqpayRequest $request
     */
    public function delete(DeleteLiqpayRequest $request)
    {
         $result = Apiato::call('Liqpay@DeleteLiqpayAction', [$request]);

         // ..
    }
}
