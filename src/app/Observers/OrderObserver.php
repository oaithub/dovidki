<?php

namespace App\Observers;

use App\Order;
use Auth;

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
        //TODO: Send mail
    }

    /**
     * Handle the order "creating" event
     *
     * @param Order $order
     * @return void
     */
    public function creating(Order $order)
    {
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
        //
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
