<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use App\Http\Requests\StoreNewsletterRequest;

class NewsletterController extends Controller
{

    protected $newsletter;

    public function __construct(Newsletter $newsletter)
    {
        $this->newsletter = $newsletter;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $newsletters = $this->newsletter::latest()
                            ->paginate($request->per_page ?? 5);

        return sendJson([
            'newsletters'   => $newsletters
        ], 'Newsletter received');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsletterRequest $request)
    {
        if ( $this->newsletter->create($request->validated()) ) {
            return sendJson([], 'Yay! Email successfully subscribed', 201);
        }

        return abortJson();
    }

}
