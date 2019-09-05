<?php

namespace App\Http\Controllers;
use App\Account;
use App\Clients;
use App\CurrentAccount;
use Illuminate\Http\Request;

class CurrentAccountController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CurrentAccount $currentaccount)
    {
        //dd($currentaccount->id);
        $account = new Account();
        $account = Account::where('client_id', $currentaccount->client_id);
        //dd($currentaccount);
        //dd($account);
        $cuentaCorriente = CurrentAccount::where('account_id', $currentaccount->account_id)->get();
        //dd($cuentaCorriente);
        //var_dump($request->id);
        //dd($account);
        return view('currentaccounts.show',  compact('cuentaCorriente','account'));

        
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
