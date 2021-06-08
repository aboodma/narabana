<?php

namespace App\Http\Controllers;

use App\PayoutRequest;
use Illuminate\Http\Request;

class PayoutRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function provider_payouts()
    {
        $payouts = auth()->user()->payouts;
        return view('website.provider.payout',compact('payouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function provider_payouts_request(Request $request)
    {
    //    return $request->all();
        $payout = new PayoutRequest();
        $payout->user_id = auth()->user()->id;
        $payout->amount = $request->amount;
        $payout->status = 0;
        $payout->admin_msg = "";
        $payout->details = "IBAN : ". $request->iban . " Account Owner Name : " .$request->account_name;
        if ($payout->save()) {
            return redirect()->route('provider.payouts');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PayoutRequest  $payoutRequest
     * @return \Illuminate\Http\Response
     */
    public function show(PayoutRequest $payoutRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PayoutRequest  $payoutRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(PayoutRequest $payoutRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PayoutRequest  $payoutRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PayoutRequest $payoutRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PayoutRequest  $payoutRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(PayoutRequest $payoutRequest)
    {
        //
    }
}
