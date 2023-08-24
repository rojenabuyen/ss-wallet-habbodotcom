<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use App\Models\User;
use Illuminate\Http\Request;

class PayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user, Transactions $transactions, Request $request)
    {
        $transactionList = $transactions::with('user')
        ->latest()->paginate(10);

        return view('pay.index', compact('transactionList'));

        // $search = $request->input('search');
            
        // $users = User::when($search, function ($query, $search) {
        //         return $query->where('username', 'like', "%$search%", 'AND', 'credits','>=', '10');
        //         })->orderBy('username', 'asc')->paginate(20);

        // return view('pay.show-cashout', compact('user','search'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user, Transactions $transactions)
    {
        $users = $user::get();
        $payslots = $transactions::$payslot;
        return view('pay.create', compact('users','payslots'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Transactions $transactions, User $user)
    {
        $request->validate([
            'amount' => 'required|numeric',
        ]);

        Transactions::create([
            'pay_slot' => $request->input('payslot'),
            'amount' => $request->amount,
            'user_id' => $request->input('username'),
            'payer_id' => auth()->user()->username
        ]);


        $amount = $user->credits += $request->amount;

        User::where('id', $request->input('username'))
      ->update(['credits' => $amount]);

        return redirect()->route('pay.index')
        ->with('success','Pay successfully added.');

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
