<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use App\Models\User;
use Illuminate\Http\Request;
use GerbenJacobs\HabboAPI\HabboAPI;
use HabboAPI\HabboParser;
use HabboAPI\Entities\Profile;

class CashoutController extends Controller
{
    

    public function index(User $user, Transactions $transactions, Request $request)
    {
    $search = $request->input('search');
    $users = User::where('credits', '>', 9)
            ->orderBy('username', 'asc')->paginate(10);

            return view('pay.show-cashout', compact('users','search'));
    }

    public function show(User $user, Request $request)
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

                    return view('pay.view-cashout', compact('transactions', 'user', 'search', 'habbo', 'habbo_username'));
            }
            catch(\Exception $e)
            {
                return abort(404);
                
            }
    }

}
