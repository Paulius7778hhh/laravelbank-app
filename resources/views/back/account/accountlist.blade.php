@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <a href="{{ route('account-index') }}" style='font-size: 50px;color:green;'>back to menu</a>


                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if (Session::has('status'))
                <h2 class="alert alert-success" style="font-size: 30px;">{{ Session::pull('status') }}</h2>

                @endif

                <div class="card-header">{{ __('Account list') }}</div>
                <div class="card-body">
                    <ul>
                        @forelse($Accountlist as $key => $account)
                        <form action="{{ route('account-edit', $account) }}" method="get">




                            <li style="list-style: none;font-size: 15px;color:green;"><span style="color:darkgreen; font-size: 30px;">Name/</span> {{ $account->name }}
                                <span style="color:red; font-size: 30px;">Surname/</span>{{ $account->surname }}
                                <span style="color:yellow; font-size: 30px;">Username/</span>
                                {{ $account->username }}
                                <span style="color:aqua; font-size: 30px;">idnumber/</span>
                                {{ $account->idnumber }}
                                <span style="color:orange; font-size: 30px;">Accountid/</span>
                                {{ $account->accountid }} <span style="color:purple; font-size: 30px;">Balance/</span>
                                {{ $account->balance }} <span style="color:purple; font-size: 15px;">euro</span>
                                <span style="color:brown; font-size: 30px;">Id:</span>
                                {{ $account->id }} <span style="color:teal; font-size: 30px;">Email:</span>
                                {{ $account->email }}
                            </li>



                            <button type="submit">edit</button>

                        </form>
                        <form action="{{ route('account-moneycount', $account) }}" method="get"> <button type="submit">+</button></form>


                        <form action="{{ route('account-account-balance', $account) }}" method="get"> <button type="submit">-</button></form>


                        <form action="{{ route('account-delete', $account) }}" method="POST">

                            <button type="submit">delete</button>
                            @csrf
                            @method('DELETE')
                        </form>












                        <br>
                        @empty
                        <li style="list-style: none;"></li>
                        @endforelse
                    </ul>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
