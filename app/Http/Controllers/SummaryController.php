<?php

namespace App\Http\Controllers;
use App\Client;
use App\Sale;
use App\Account;
use App\Payment;
use App\Expense;
use App\CurrentAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SummaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mesActual= date('m');
        $sumaVentas= Sale::whereMonth('date','=',$mesActual)->sum('total');
        $sumaGastos= Expense::whereMonth('created_at','=',$mesActual)->sum('totalPayment');
        $sumaSenia = Sale::whereMonth('date','=',$mesActual)->sum('senia');
        $sumaPagos= Payment::whereMonth('date','=',$mesActual)->sum('payment');
        $efectivoRecibido = $sumaSenia+ $sumaPagos;
        
        return view("summaries.index", compact("sumaVentas","sumaGastos",'efectivoRecibido'));
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

    public function searchForDate(Request $request){
       
        $sumaVentas = Sale::whereBetween('date',[$request->init, $request->fin])
                    ->sum('total');       
        //Suma de Gastos
        $sumaGastos = Expense::whereBetween('created_at',[$request->init, $request->fin])
                ->sum('totalPayment');
        //Suma de senia
        $sumaSenia = Sale::whereBetween('date',[$request->init, $request->fin])
                ->sum('senia');
        //Suma de pagos
        $sumaPagos = Payment::whereBetween('date',[$request->init, $request->fin])->sum('payment');

        $efectivoRecibido = $sumaSenia+ $sumaPagos;
       
        return view("summaries.index", compact("sumaVentas","sumaGastos",'efectivoRecibido'));
    }

    public function searchForMonth(Request $request){
        $sumaVentas= Sale::whereYear('date','=',$request->age)->whereMonth('date','=',$request->month)->sum('total');
        $sumaGastos= Expense::whereYear('created_at','=',$request->age)->whereMonth('created_at','=',$request->month)->sum('totalPayment');
        $sumaSenia = Sale::whereYear('date','=',$request->age)->whereMonth('date','=',$request->month)->sum('senia');
        $sumaPagos= Payment::whereYear('date','=',$request->age)->whereMonth('date','=',$request->month)->sum('payment');
        $efectivoRecibido = $sumaSenia + $sumaPagos;
       
        return view("summaries.index", compact("sumaVentas","sumaGastos",'efectivoRecibido'));
    }
}
