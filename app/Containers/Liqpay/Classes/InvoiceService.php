<?php

namespace App\Services\Invoice;


use App\Models\Order\Order;
use App\Models\Product;

abstract class InvoiceService
{
    /**
     * @var array
     */
    protected $payload;

    /**
     * @var
     */
    protected $invoice;

    /**
     * @param Order $order
     * @return mixed
     */
    abstract public function create(Order $order);

    /**
     * @return mixed
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * @return mixed
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * @return mixed
     */
    abstract public function getUrl();

    /**
     * @return mixed
     */
    abstract public function getToken();

    /**
     * @return mixed
     */
    abstract public function getCurrency();

    /**
     * @param Order $order
     * @param $amount
     * @param $partner
     * @return mixed
     */
    abstract public function paymentRequest(Order $order, $amount, $partner);

    /**
     * @param Order $order
     * @param $amount
     * @return mixed
     */
    abstract public function refund(Order $order, $amount);

}