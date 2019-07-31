<?php

namespace App\Http\Controllers;
use App\Client;
use App\Account;
use App\Payment;
use App\CurrentAccount;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $clients = Client::all();
        return view ('payments.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pago = new Payment();
        $pago->description =$request->input('description'); 
        $pago->client_id =$request->input('client');
        $pago->payment = $request->input('payment');  
        $pago->date= $request->input('date');
        $pago->save();

        $account = new Account();
        $account = Account::where('client_id', $pago->client_id)->first();
        $account->accountTotal= ($account->accountTotal - $pago->payment);
        $account->save();

        $cuentaCorriente = new CurrentAccount();
        $cuentaCorriente->client_id = $pago->client_id;
        $cuentaCorriente->account_id = $account->id;
        $cuentaCorriente->assets= $pago->payment;
        $cuentaCorriente->date = $pago->date;
        $cuentaCorriente->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
