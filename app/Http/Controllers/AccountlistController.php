<?php

namespace App\Http\Controllers;

use App\Models\Accountlist;
use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class AccountlistController extends Controller
{
    //public function __construct()
    //{
    //    $this->middleware('auth');
    //}
    /** pranasanus@gmail.com poasdasd56
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



        $validator = Validator::make(
            $request->all(),
            [
                'name_post' => 'required|alpha:ascii|min:3|max:30',
                'surname_post' => 'required|alpha:ascii|min:3|max:30',
                //'username_post' => 'unique:accountlists,username',
                'idnumber_post' => 'required|integer|unique:accountlists,idnumber|regex:/^([3-6]{1})([0-9]{2})([0-1]{1})([0-9]{1})([0-3]{1})([0-9]{1})([0-9999]{4})$/',
                'accountid_post' => 'required|unique:accountlists,accountid|min:24|max:24|regex:/^LT([0-9]{2}) 7300 0([0-9]{3}) ([0-9]{4}) ([0-9]{4})$/',
                'email_post' => 'required|unique:accountlists,email|email:rfc,dns',
                'password_post' => 'required|min:8|max:30',
            ],
            [
                'name_post.required' => 'Fill out name field',
                'name_post.alpha' => 'Name field can be enter only alphabetic letters',
                'name_post.min' => 'Name field input too short ',
                'name_post.max' => 'Name field input too long ',
                'surname_post.required' => 'Fill out surname field',
                'surname_post.alpha' => 'Surname field can be enter only alphabetic letters',
                'surname_post.min' => 'Surname field input too short',
                'surname_post.max' => 'Surname field input too long',
                'idnumber_post.required' => 'Fill out Id number field',
                'idnumber_post.integer' => 'Id number input must be an integer.',
                'idnumber_post.unique' => 'This Id number already exsist',
                'idnumber_post.regex' => 'The Id number format is invalid',
                'email_post.required' => 'Fill email field',
                'email_post.email' => 'Must be valid email address',
                'email_post.unique' => 'There is already an email address',
                'accountid_post.required' => 'Can`touch this IBAN',
                'accountid_post.unique' => 'Can`touch this IBAN',
                'accountid_post.min' => 'Can`touch this IBAN',
                'accountid_post.max' => 'Can`touch this IBAN',
                'accountid_post.regex' => 'Don`t touch this IBAN ya bastard',
                'password_post.required' => 'Enter password',
                'password_post.min' => 'Password too short',
                'password_post.max' => 'Password too long'
            ]

        );
        $request->flash();

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

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
        $validator = Validator::make(
            $request->all(),
            [
                'name_edit' => 'required|alpha:ascii|min:3|max:30',
                'surname_edit' => 'required|alpha:ascii|min:3|max:30',
                //'username__edit' => 'unique:accountlists,username',_edit
                'idnumber_edit' => 'required|integer|unique:accountlists,idnumber|regex:/^([3-6]{1})([0-9]{2})([0-1]{1})([0-9]{1})([0-3]{1})([0-9]{1})([0-9999]{4})$/',
                'email_edit' => 'required|unique:accountlists,email|email:rfc,dns',
                'password_edit' => 'required|min:8|max:30',
            ],
            [
                'name_edit.required' => 'Fill out name field',
                'name_edit.alpha' => 'Name field can be enter only alphabetic letters',
                'name_edit.min' => 'Name field input too short ',
                'name_edit.max' => 'Name field input too long ',
                'surname_edit.required' => 'Fill out surname field',
                'surname_edit.alpha' => 'Surname field can be enter only alphabetic letters',
                'surname_edit.min' => 'Surname field input too short',
                'surname_edit.max' => 'Surname field input too long',
                'idnumber_edit.required' => 'Fill out Id number field',
                'idnumber_edit.integer' => 'Id number input must be an integer.',
                'idnumber_edit.unique' => 'This Id number already exsist',
                'idnumber_edit.regex' => 'The Id number format is invalid',
                'email_edit.required' => 'Fill email field',
                'email_edit.email' => 'Must be valid email address',
                'email_edit.unique' => 'There is already an email address',
                'password_edit.required' => 'Enter password',
                'password_edit.min' => 'Password too short',
                'password_edit.max' => 'Password too long'
            ]

        );
        $request->flash();

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
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
        if ($accountlist->balance !== 0) {
            return redirect()->back()->withErrors('Can`t delete account that has money left in it. If you want delete account please remove all money from it');
        }
        $accountlist->delete();
        return redirect()->route('account-show')->with('status', 'Deletion success');
    }
    public function moneycount(Accountlist $accountlist)
    {
        return view('back.plus', ['accountlist' => $accountlist]);
    }
    public function plus(Request $request, Accountlist $accountlist)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'balance_deposit' => 'required|numeric|min_digits:1'

            ],
            [
                'balance_deposit.required' => 'Fill out name field',
                'balance_deposit.numeric' => 'must be a number',
                'balance_deposit.min_digits' => 'cannot input negative number'

            ]

        );
        $request->flash();

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        if ($request->balance_deposit == 0) {
            return redirect()->back()->withErrors('No zero');
        }
        $accountlist->balance = $accountlist->balance + $request->balance_deposit;
        $accountlist->save();
        return redirect()->back()->with('status', 'Deposit success');
    }
    public function moneysubstract(Accountlist $accountlist)
    {
        return view('back.minus', ['accountlist' => $accountlist]);
    }
    public function minus(Request $request, Accountlist $accountlist)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'balance_withdraw' => 'required|numeric|min_digits:1'

            ],
            [
                'balance_withdraw.required' => 'Fill out name field',
                'balance_withdraw.numeric' => 'must be a number',
                'balance_withdraw.min_digits' => 'cannot input negative number'

            ]

        );
        $request->flash();

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        if ($accountlist->balance < $request->balance_withdraw) {
            return redirect()->back()->withErrors('Cannot withdraw more money than your account has');
        }
        if ($request->balance_withdraw == 0) {
            return redirect()->back()->withErrors('No zero');
        }
        $accountlist->balance = $accountlist->balance - $request->balance_withdraw;
        $accountlist->save();
        return redirect()->back()->with('status', 'Withdraw success');
    }
}
