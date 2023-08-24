<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use App\Models\User;
use HabboAPI\Entities\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GerbenJacobs\HabboAPI\HabboAPI;
use HabboAPI\HabboParser;
use Illuminate\Support\Str;


class UserController extends Controller
{
  
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, User $user)
    {
        $search = $request->input('search');
       

        $users = User::when($search, function ($query, $search) {
        return $query->where('username', 'like', "%$search%");
        })->orderBy('username', 'asc')->paginate(10);

    
        return view('users.index', compact('users','search') );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {  
        $habboParser = new HabboParser('com');
        $habboApi = new \HabboAPI\HabboAPI($habboParser);
        $habbo_username = $request->username;    

        try 
        {
            $myHabbo = $habboApi->getHabbo($habbo_username);
           
        }

        catch (\Exception $e)
        {
            return redirect()->route('users.index')
                    ->with('error','Oops. Cannot find this Habbo!');
        }

        $request->validate([
            'username' => 'required|string|min:3|unique:users',
        ]);

        User::create([
            'username' => $request->username,
            'role' => 'Payee',
            'remember_token' => Str::random(10),
        ]);

        return redirect()->route('users.index')
        ->with('success','User successfully added.');
                           
        
    }



    /**
     * Display the specified resource.
     */
    public function show()
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
