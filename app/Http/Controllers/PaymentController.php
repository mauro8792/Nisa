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
        $clients = Client::all();
        //return "hola wacho";
        return view ('payments.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Payment $client)
    {
        //dd($client->id);
        $clients = Client::all();
        return view ('payments.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*

        CREO QUE DEBERIAMOS INCLUIR EN LA TABLA DE CUENTAS CORRIENTES 
        EL SALE_ID Y PAYMENT_ID, PARA PODER PONER EN LA VISTA 
        EL NOMBRE DEL PRODUCTO QUE COMPRO Y EN EL PAGO, SI FUE CON EFECTIVO 
        Ó CON CHEQUE.

    */
    public function store(Request $request)
    {
        $pago = new Payment();
        $pago->description =$request->input('description'); 
        $pago->client()->associate($request->input('client_id'));
        $pago->paymentForm = $request->input('paymentForm');
        $pago->payment = $request->input('payment');  
        $pago->save();

        $account = new Account();
        $account = Account::where('client_id', $pago->client_id)->first();
        $account->accountTotal= ($account->accountTotal - $pago->payment);
        $account->save();

        $cuentaCorriente = new CurrentAccount();
        $cuentaCorriente->client_id = $pago->client_id;
        $cuentaCorriente->account_id = $account->id;
        $cuentaCorriente->assets= $pago->payment;
        $cuentaCorriente->total= $account->accountTotal;
        $cuentaCorriente->date = $request->input('date');
        $cuentaCorriente->save();
        return redirect()->route('clients.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($id);
         return view ('payments.show');
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
    public function newPayment($id){
         
        $cliente = Client::where('id', $id)->first();
        $account = Account::where('client_id', $cliente->id)->first();
        
        return view('payments.createPayment', compact('cliente','account'));
    }
}