<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrderRequest;

class OrderController extends Controller
{

    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $validated = $request->validated();


        $user = (new User())->createByEmail($validated);

        unset($validated['email']);
        unset($validated['first_name']);
        unset($validated['last_name']);

        if ( $order = $user->orders()->create($validated) ) {
            return sendJson([
                'order' => $order
            ], 'Order created', 201);
        }

        return abortJson();
    }

}
