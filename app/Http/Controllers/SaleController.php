<?php

namespace App\Http\Controllers;
use App\Client;
use App\Sale;
use App\Account;
use App\CurrentAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreSaleRequest;
class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       

        $sales = DB::table('sales')
            ->join('clients', 'sales.client_id','=','clients.id')
            ->select('sales.*', 'clients.name')
            ->get();
    
        
        return view ('sales.index', compact('sales'));
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
    public function store(StoreSaleRequest $request)
    {   
       // $users = DB::table('users')->select('name', 'email as user_email')->get();
        $client = Client::find($request->input('client'));
        $numeroDeOrden= $client->numberOfOrder;
        $client->numberOfOrder = ($client["numberOfOrder"] +1);
        $client->save();
        
        
        $sale = new Sale();
        //$sale->client_id = $request->input('client');
        $sale->client()->associate($request->input('client'));
        $sale->description =$request->input('description');
        $sale->senia = $request->input('senia');
        $sale->total= $request->input('total');
        $sale->date = $request->input('date');
        $sale->shortDescription = $request->input('shortDescription');
        $sale->state = "Solicitado";
        $sale->numberOfOrder = $numeroDeOrden;
        $sale->save();

        $account = new Account();
        $account = Account::where('client_id', $sale->client_id)->first();
        $account->accountTotal= ($account->accountTotal + $sale->total - $sale->senia);
        $account->save();

        $cuentaCorriente = new CurrentAccount();
        $cuentaCorriente->client_id = $sale->client_id;
        $cuentaCorriente->account_id = $account->id;
        $cuentaCorriente->sale()->associate($sale->id);
        if($sale->senia != 0){
            $cuentaCorriente->assets=$sale->senia;
        }
        $cuentaCorriente->debit= $sale->total;
        $cuentaCorriente->total= $account->accountTotal;
        $cuentaCorriente->date =$request->input('date');
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
        return "hola bebe";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sale = Sale::where('id', $id)->first();
        //dd($sale->client_id);
        $client = Client::where('id', $sale->client_id)->first();
        //dd($client->name);
      /*  $sale = DB::table('sales')
            ->join('clients', 'sales.client_id','=','clients.id')
            ->where('sales.numberOfOrder','=',$forOrder)
            ->get();*/
        //dd($sale);
        return view('sales.edit', compact('sale','client'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        $sale->state = $request->state;
        $sale->save();
        return redirect()->route('sales.index', [$sale])->with('status', 'Sale update');
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
    public function forOrder($id){
        $sale = Sale::where('id', $id)->first();
        //dd($sale->client_id);
        $client = Client::where('id', $sale->client_id)->first();
        //dd($client->name);
      /*  $sale = DB::table('sales')
            ->join('clients', 'sales.client_id','=','clients.id')
            ->where('sales.numberOfOrder','=',$forOrder)
            ->get();*/
        //dd($sale);
        return view('sales.show', compact('sale','client'));
    }
}
