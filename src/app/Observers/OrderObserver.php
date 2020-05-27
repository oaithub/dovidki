<?php

namespace App\Observers;

use App\Mail\OrderCreated;
use App\Mail\OrderStateUpdated;
use App\Order;
use Auth;
use Illuminate\Support\Facades\Mail;

class OrderObserver
{
    /**
     * Handle the order "created" event.
     *
     * @param \App\Order $order
     * @return void
     */
    public function created(Order $order)
    {
        Mail::to($order->user->email)
            ->send(new OrderCreated($order));
    }

    /**
     * Handle the order "creating" event
     *
     * @param Order $order
     * @return void
     */
    public function creating(Order $order)
    {
        $this->setDefaultState($order);
        $this->setGroup($order);
        $this->setUserId($order);
    }

    /**
     * Handle the order "updated" event.
     *
     * @param \App\Order $order
     * @return void
     */
    public function updated(Order $order)
    {
        Mail::to($order->user->email)
            ->send(new OrderStateUpdated($order));
    }

    protected function setDefaultState(Order $order)
    {
        $order->state = Order::getDefaultState();
    }

    /**
     * @param Order $order
     */
    protected function setGroup(Order $order)
    {
        $userGroupList = Auth::user()->groups();    //Receive current user group list
        $order->group = json_encode($userGroupList->get($order->group));
    }

    /**
     * Set the user id
     *
     * @param Order $order
     */
    protected function setUserId(Order $order)
    {
        $order->user_id = Auth::id();
    }

    /**
     * Handle the order "deleted" event.
     *
     * @param  \App\Order  $order
     * @return void
     */
    public function deleted(Order $order)
    {
        //
    }

    /**
     * Handle the order "restored" event.
     *
     * @param  \App\Order  $order
     * @return void
     */
    public function restored(Order $order)
    {
        //
    }

    /**
     * Handle the order "force deleted" event.
     *
     * @param  \App\Order  $order
     * @return void
     */
    public function forceDeleted(Order $order)
    {
        //
    }
}
