<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Catering;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCateringRequest;

class CateringController extends Controller
{

    protected $catering;

    public function __construct(Catering $catering)
    {
        $this->$catering = $catering;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCateringRequest $request)
    {
        $validated = $request->validated();

        $user = (new User())->createByEmail($validated);

        unset($validated['email']);
        unset($validated['first_name']);
        unset($validated['last_name']);

        if ( $catering = $user->caterings()->create($validated) ) {
            return sendJson([
                'catering' => $catering
            ], 'Catering created', 201);
        }

        return abortJson();
    }

}
