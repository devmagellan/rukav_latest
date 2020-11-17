<?php

namespace App\Services\Invoice;

use App\Models\Order\Order;
use LiqPay;

class LiqPayInvoiceService extends InvoiceService
{
    const ACTION_INVOICE_SEND = 'invoice_send';
    const VERSION = '3';

    protected $action = 'invoice_send';

    /**
     * @var LiqPay
     */
    protected $liqPay;

    /**
     * LiqPayInvoiceService constructor.
     * @param LiqPay $liqPay
     */
    public function __construct(LiqPay $liqPay)
    {
        $this->liqPay = $liqPay;
    }

    /**
     * @param Order $order
     * @return mixed
     * @throws \Exception
     */
    public function create(Order $order)
    {
        $products = [];

        foreach ($order->products as $product) {
            $products[] = [
                'amount' => $product->price,
                'count'  => $product->qty,
                'unit'   => 'шт.',
                'name'   => $product->name
            ];
        }
        $payload = [
            'action'    => self::ACTION_INVOICE_SEND,
            'version'   => self::VERSION,
            'public_key' => config('liqpay.public_key'),
            'email'     => 'soroka.arsen.soroka@gmail.com',
            'amount'    => $order->total,
            'result_url' => config('app.domain'),
            'server_url' => route('payment.callback'),
            'currency'  => 'UAH',
            'order_id'  => $order->id,
            'sandbox'  => config('liqpay.sandbox'),
            'goods'     => $products,
            'description' => 'Оплата согласно заказу #' . $order->id
        ];

        $this->invoice = $this->liqPay->api("request", $payload);

        if($this->invoice->status == 'error') {
            throw new \Exception($this->invoice->err_description);
        }

        $this->payload = $payload;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->invoice->href;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->invoice->token;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->invoice->currency;
    }

    /**
     * @param Order $order
     * @param $amount
     * @param $partner
     * @return string
     * @throws \Exception
     */
    public function paymentRequest(Order $order, $amount, $partner)
    {
        $response = $this->liqPay->api("request", [
            'action'         => 'p2pcredit',
            'version'        => '3',
            'amount'         => $amount,
            'currency'       => 'UAH',
            'description'    => 'Предоплата за товар.',
            'order_id'       => $order->id,
            'receiver_account'  => $partner['account'],
            'receiver_mfo'  => $partner['mfo'],
            'receiver_okpo'  => $partner['okpo'],
            'receiver_company'  => $partner['company']
        ]);

        if($response->status !== 'success') {
            throw new \Exception($response->err_description);
        }

        return $response;
    }

    /**
     * @param Order $order
     * @param $amount
     * @return string
     * @throws \Exception
     */
    public function refund(Order $order, $amount)
    {
        $response = $this->liqPay->api("request", [
            'action'         => 'refund',
            'version'        => '3',
            'amount'         => $amount,
            'currency'       => 'UAH',
            'order_id'       => $order->id,
        ]);

        if($response->status !== 'success') {
            throw new \Exception($response->err_description);
        }

        return $response;

    }
}