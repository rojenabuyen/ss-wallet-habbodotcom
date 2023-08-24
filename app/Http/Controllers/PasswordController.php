<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use GerbenJacobs\HabboAPI\HabboAPI;
use HabboAPI\HabboParser;
use HabboAPI\Entities\Profile;
use Illuminate\Support\Facades\Hash;
class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('reset.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
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
            'username' => 'required|string|min:3',
            'password' => 'required|min:8|confirmed'
        ]);

        User::where('username', $request->input('username'))
        ->update(['password' => Hash::make($request->password)]);

        return redirect()->route('auth.create')
            ->with('success', 'Password successfully updated.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {

        
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
