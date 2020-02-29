<?php

namespace App\Http\Controllers;
use App\Client;
use App\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


//domweb host
class ClientController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        
        //$request->user()->authorizeRoles(['admin']);
        
        $clients = DB::table('clients')
            ->join('accounts', 'clients.id', '=', 'accounts.client_id')
            ->get();
        //return response()->json($clients,200);    
        return view('summaries.probando', compact('clients'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        if (!Client::where('name','=',$request->input('name'))->exists()) {
            $client = new Client();
            $client->name = $request->input('name');
            $client->lastname = $request->input('lastname');
            $client->telephone =$request->input('telephone');
            $client->email = $request->input('email');
            $client->slug = $request->input('name');
            $client->numberOfOrder=1;
            $client->save();
            //Creamos la cuenta y se la asignamos al cliente
            $account = new Account();
            $account->client_id= $client->id;
            $account->client()->associate($client->id);
            $account->save();
            return redirect()->route('clients.index');
        }
        else{
            $request->session()->flash('alert-success', 'El cliente con ese nombre ya existe!');
            return redirect()->route('clients.create');
            
        }
      
    }
  

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        return view('clients.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        if (!Client::where('name','=',$request->input('name'))->exists()) {
            $client->fill($request->all());
            $client->slug= $client->name;
            $client->save();
            return redirect()->route('clients.index');
        }
        else{
            $request->session()->flash('alert-success', 'El cliente con ese nombre ya existe!');
            return redirect()->route('clients.index');
        }
        
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
