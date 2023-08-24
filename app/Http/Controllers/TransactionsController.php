<?php

namespace App\Http\Controllers;


use App\Models\Transactions;
use App\Models\User;
use HabboAPI\Entities\Profile;
use Illuminate\Http\Request;
use GerbenJacobs\HabboAPI\HabboAPI;
use HabboAPI\HabboParser;
use PHPUnit\Event\Code\Throwable;


class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user, Request $request)
    {
         

        $search = $request->input('search');

        $transactions = $user->transactions()
            ->orderBy('created_at','DESC')->get();

            $habboParser = new HabboParser('com');
            $habboApi = new \HabboAPI\HabboAPI($habboParser);
            $habbo_username = $user->username;
 
            try{
                $myHabbo = $habboApi->getHabbo($habbo_username);

                if (!$myHabbo->hasProfile()) {
                    // Collect all the profile info
                    $myProfile = $habboApi->getProfile($myHabbo->getId());
                } else {
                    // This Habbo has a closed home, only show their Habbo object
                    $myProfile = new Profile();
                    $myProfile->setHabbo($myHabbo);
                }
                
    
                    $habbo = $myProfile->getHabbo();

                    return view('transactions.index', compact('transactions', 'user', 'search', 'habbo', 'habbo_username'));
            }
            catch(\Exception $e)
            {
                return abort(404);
                
            }
            

            

            

       
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transactions $transactions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transactions $transactions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transactions $transactions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transactions $transactions)
    {
        //
    }
}
