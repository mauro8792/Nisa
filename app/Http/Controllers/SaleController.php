<?php

namespace App\Http\Controllers;
use App\Client;
use App\Sale;
use App\Account;
use App\CurrentAccount;
use Illuminate\Http\Request;

class SaleController extends Controller
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
        return view ('sales.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sale = new Sale();
        //$sale->client_id = $request->input('client');
        $sale->client()->associate($request->input('client'));
        $sale->description =$request->input('description');
        $sale->senia = $request->input('senia');
        $sale->total= $request->input('total');
        $sale->save();

        $account = new Account();
        $account = Account::where('client_id', $sale->client_id)->first();
        $account->accountTotal= ($account->accountTotal + $sale->total - $sale->senia);
        $account->save();

        $cuentaCorriente = new CurrentAccount();
        $cuentaCorriente->client_id = $sale->client_id;
        $cuentaCorriente->account_id = $account->id;
        if($sale->senia != 0){
            $cuentaCorriente->assets=$sale->senia;
        }
        $cuentaCorriente->debit= $sale->total;
        $cuentaCorriente->date =$request->input('date');
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
