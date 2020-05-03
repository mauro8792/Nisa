<?php

namespace App\Http\Controllers;
use App\Client;
use App\Sale;
use App\Account;
use App\Payment;
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
            ->orderBy('sales.date', 'desc')
            //->paginate(15);
            ->get();
        //dd($sales);
       //usort($sales, $this->object_sorter('StartDate'));

        
        
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
        $client = Client::find($request->input('client'));
        $numeroDeOrden= $client->numberOfOrder;
        $client->numberOfOrder = ($client["numberOfOrder"] +1);
        $client->save();
        
        
        $sale = new Sale();
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
        $client = Client::where('id', $sale->client_id)->first();
        
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
        if($request->total!=null){
            
            $cuentaCorriente = CurrentAccount::where('sale_id', $request->id)->first();
            
        

            //dd($cuentaCorriente);
            $cuentaCorriente->debit = $request->total;
            $cuentaCorriente->total = $request->total;
            $cuentaCorriente->save();
            //$sale = Sale::where('id', $request->id);
            $sale->total = $request->total;
            $sale->save();

            // sumar todas las ventas y pagos del cliente
            
            $ventaCliente = Sale::where('id', $request->id)
                        ->select('client_id')
                        ->first();
            
            $ventasTotal = Sale::where('client_id', $ventaCliente->client_id)
                    ->select(DB::raw('sum(total) as total'))
                    ->first();
            
            $ventasSenia =Sale::where('client_id', $ventaCliente->client_id)
                    ->select(DB::raw('sum(senia) as senia'))
                    ->first();
            

            $totalPago = Payment::where('client_id', $ventaCliente->client_id)
                    ->select(DB::raw('sum(payment) as pago'))
                    ->first();
            

            $totalAccount = $ventasTotal->total - $ventasSenia->senia - $totalPago->pago;
            //dd($totalAccount);
            //dd($ventaCliente);
            $cuenta = Account::where('client_id',$ventaCliente->client_id)->first();
            //dd($cuenta);
            $cuenta->accountTotal = $totalAccount;
            //dd($cuenta->accountTotal);
            $cuenta->save();
            //return redirect()->route('clients.index');
            return back();

        }else{
            $sale->state = $request->state;
            $sale->save();
            return redirect()->route('sales.index', [$sale])->with('status', 'Sale update');
        }
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //dd($request->sale_id);
        $sale = Sale::where('id', $request->sale_id)->first();
        $client = Client::where('id', $sale->client_id)->first();
        $client->numberOfOrder = $sale->numberOfOrder;
        $client->save();
        $cuentaCorriente= CurrentAccount::where('sale_id', $request->sale_id)->first();
        $account = Account::where('id', $cuentaCorriente->account_id)->first();
        //dd($sale);
        $account->accountTotal =$account->accountTotal - $sale->total;
        $account->save();
        $cuentaCorriente->delete();
        $sale->delete();
        return back();
        //dd($sale);
    }
    public function forOrder($id){
        $sale = Sale::where('id', $id)->first();
        $client = Client::where('id', $sale->client_id)->first();
        return view('sales.show', compact('sale','client'));
    }
}


 //[2020-04-11 13:11:32] production.ERROR: SQLSTATE[22003]: Numeric value out of range: 1264 Out of range value for column 'accountTotal' at row 1 (SQL: update `accounts` set `accountTotal` = 1019848.55, `updated_at` = 2020-04-11 13:11:32 where `id` = 4) {"userId":6,"email":"tapicerianisa@hotmail.com","exception":"[object] (Illuminate\\Database\\QueryException(code: 22003): SQLSTATE[22003]: Numeric value out of range: 1264 Out of range value for column 'accountTotal' at row 1 (SQL: update `accounts` set `accountTotal` = 1019848.55, `updated_at` = 2020-04-11 13:11:32 where `id` = 4) at /home/c1641070/public_html/vendor/laravel/framework/src/Illuminate/Database/Connection.php:664, PDOException(code: 22003): SQLSTATE[22003]: Numeric value out of range: 1264 Out of range value for column 'accountTotal' at row 1 at /home/c1641070/public_html/vendor/laravel/framework/src/Illuminate/Database/Connection.php:483)