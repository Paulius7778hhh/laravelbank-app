<?php

namespace App\Http\Controllers;

use App\Models\Accountlist;
use Illuminate\Http\Request;
use App\Http\Controllers\PostController;


class AccountlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.account.welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $iban = PostController::account_nr();
        return view('back.account.create', [
            'acountt' => $iban
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAccountlistRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $accountlist = new Accountlist;
        $accountlist->name = $request->name_post;
        $accountlist->surname = $request->surname_post;
        $accountlist->username = $request->name_post . $request->surname_post;
        $accountlist->idnumber = $request->idnumber_post;
        $accountlist->email = $request->email_post;
        $accountlist->password = $request->password_post;
        $accountlist->accountid = $request->accountid_post;
        $accountlist->balance = 0;
        $accountlist->save();
        return redirect()->route('account-show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Accountlist  $accountlist
     * @return \Illuminate\Http\Response
     */
    public function show(Accountlist $accountlist)
    {
        $name = $accountlist->name;
        $accountlist = Accountlist::all()->sortBy('title');
        return view('back.account.accountlist', [
            'Accountlist' => $accountlist
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accountlist  $accountlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Accountlist $accountlist)
    {

        return view('back.edit', ['accountlist' => $accountlist]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAccountlistRequest  $request
     * @param  \App\Models\Accountlist  $accountlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Accountlist $accountlist)
    {
        $accountlist->name = $request->name_edit;
        $accountlist->surname = $request->surname_edit;
        $accountlist->idnumber = $request->idnumber_edit;
        $accountlist->email = $request->email_edit;
        $accountlist->password = $request->password_edit;
        $accountlist->username = $request->name_edit . $request->surname_edit;
        $accountlist->save();
        return redirect()->route('account-show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accountlist  $accountlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accountlist $accountlist)
    {
        //
    }
    public function moneycount(Accountlist $accountlist)
    {
        return view('back.plus', ['accountlist' => $accountlist]);
    }
    public function plus(Request $request, Accountlist $accountlist)
    {
        $accountlist->balance += $request->balance_deposit;
        return redirect()->route('account-show');
    }
    public function moneysubstract(Accountlist $accountlist)
    {
        return view('back.minus', ['accountlist' => $accountlist]);
    }
    public function minus(Request $request, Accountlist $accountlist)
    {
        $accountlist->balance -= $request->balance_withdraw;
        return redirect()->route('account-show');
    }
}
