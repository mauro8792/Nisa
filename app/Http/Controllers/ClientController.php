<?php

namespace App\Http\Controllers;
use App\Client;
use App\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$clients = Client::all();
         /* $clients = Client::with(['account'=>function($query){
            $query->select('id', 'accountTotal')
        ->where('id','=',$clients->id);
        }])->get();
        dd($clients);
*/
        $clients = DB::table('clients')
            ->join('accounts', 'clients.id', '=', 'accounts.client_id')
            //->select('users.id', 'contacts.phone', 'orders.price')
            ->get();
            //dd($clients);
        return view('summaries.probando', compact('clients'));
        //return view('clients.index', compact('clients'));

        
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
