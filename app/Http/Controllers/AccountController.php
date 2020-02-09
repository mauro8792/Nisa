<?php

namespace App\Http\Controllers;
use App\Account;
use App\Client;
use App\CurrentAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           // return view('accounts.show');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('accounts.show');
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
    public function show(Account $account)
    {
        /* $client = DB::table('accounts')
            ->join('clients', 'accounts.client_id','=','clients.id')
            ->select('clients.name')
            ->first(); */
        /* $flats =  Flat::where('Fk_Building_Id', '=',$buildingid)
               ->where('Building_Owned_By', '=',Auth::user()->Login_Id)
               ->orderBy('Flat_Name')
               ->get(array('Flat_Id as flatId', 'Flat_Name as flatName'))
               ->toArray() */
        $cliente = Account::where('id','=',$account->id)
            ->select('client_id')
            ->get();
        $client = Client::where('id','=',$cliente[0]->client_id)
            ->first();
            
        //dd($client);
        $cuentaCorriente= CurrentAccount::where('account_id', $account->id)->with(['sale'=>function($query){
            $query->select('id', 'description','numberOfOrder');
        }])
        ->with(['payment' => function($queryPayment){
            $queryPayment->select('id','paymentForm');
        }])
        ->get();

        //dd($cuentaCorriente);
        //dd($client);
        return view('currentaccounts.show')->with(compact('client','cuentaCorriente'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //return view('accounts.show');
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