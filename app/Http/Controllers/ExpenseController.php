<?php

namespace App\Http\Controllers;
use App\Category;
use App\Expense;
use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $mesActual= date('m');
        //$expenses= Expense::whereMonth('created_at','=',$mesActual);
        
        $expenses = Expense::select('expenses.*', 'categories.name')
            ->join('categories', 'expenses.category_id','=','categories.id')
            ->select('expenses.*','categories.name')
            ->whereMonth('expenses.created_at','=', $mesActual)
            ->get();
        //dd($expenses);
        return view("expenses.index", compact('expenses','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('expenses.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $expense=Expense::create($request->all());
        return redirect()->route('expenses.index');
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
    public function searchForCategory(Request $request){
        $categories = Category::all();
        $expenses = Expense::select('expenses.*', 'categories.name')
            ->join('categories', 'expenses.category_id','=','categories.id')
            ->where('categories.id','=',$request->category)
            ->get();
        return view("expenses.index", compact('expenses','categories'));
    }

     public function searchForDate(Request $request){
        
        $categories = Category::all();
        if($request->init == $request->fin){
            $expenses = Expense::whereDate('expenses.created_at',$request->fin)
                ->select('expenses.*', 'categories.name')
                ->join('categories', 'expenses.category_id','=','categories.id')    
                ->get();
            return view("expenses.index", compact('expenses','categories'));
        }else{      
            $expenses = Expense::whereBetween('expenses.created_at',[$request->init, $request->fin])
                ->select('expenses.*', 'categories.name')
                ->join('categories', 'expenses.category_id','=','categories.id')    
                ->get();
            return view("expenses.index", compact('expenses','categories'));
        }
    }
}
