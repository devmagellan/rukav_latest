<?php

namespace App\Listeners\Order;

use App\Channels\TwilioSmsChannel;
use App\Events\Order\OrderCreated;
use App\Models\Invoice;
use App\Models\Order\Order;
use App\Models\Order\OrderProduct;
use App\Notifications\InvoiceSentNotification;
use App\Services\Invoice\InvoiceService;
use App\Services\Invoice\LiqPayInvoiceService;
use Notification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Shortener\Facades\Shortener;

class SendInvoice implements ShouldQueue
{
    /**
     * @var InvoiceService
     */
    protected $invoiceService;

    /**
     * Create the event listener.
     * @param LiqPayInvoiceService $invoiceService
     */
    public function __construct(LiqPayInvoiceService $invoiceService)
    {
        $this->invoiceService = $invoiceService;
    }

    /**
     * Handle the event.
     *
     * @param OrderCreated $event
     * @return void
     */
    public function handle(OrderCreated $event)
    {
        $response = $this->invoiceService->create($event->order);

        $this->createInvoice($event->order, $response);

        if(config('app.send_sms')) {
            Notification::route(TwilioSmsChannel::class, $event->order->customer->phone)
                ->notify(new InvoiceSentNotification($event->order, $response));
        }
    }

    /**
     * @param Order $order
     * @param InvoiceService $invoiceService
     */
    public function createInvoice(Order $order, InvoiceService $invoiceService)
    {
        Invoice::create([
            'order_id' => $order->id,
            'transaction_id' => $invoiceService->getToken(),
            'currency' => $invoiceService->getCurrency(),
            'data' => $invoiceService->getPayload()
        ]);
    }
}
