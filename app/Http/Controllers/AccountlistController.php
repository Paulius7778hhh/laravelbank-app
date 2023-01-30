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
        $accountlist = Accountlist::all()->sortBy('title');
        return view('back.account.accountlist', ['Accountlist' => $accountlist]);
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
        return redirect()->route('account-accountlist');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Accountlist  $accountlist
     * @return \Illuminate\Http\Response
     */
    public function show(Accountlist $accountlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accountlist  $accountlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Accountlist $accountlist)
    {
        //
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
        //
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
}
