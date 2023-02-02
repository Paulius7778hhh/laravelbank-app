@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Deposit money') }}</div>
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li style="font-size: 30px;">{{ $error }}</li>

                        @endforeach
                    </ul>
                </div>
                @endif
                @if (Session::has('status'))
                <h2 class="alert alert-success" style="font-size: 30px;">{{ Session::pull('status') }}</h2>

                @endif
                <div class="card-body">

                    <form action="{{ route('account-moneycount', $accountlist) }}" method="post">
                        <span style="color:darkgreen; font-size: 30px;">Name/ {{ $accountlist->name }}<br></span>
                        <span style="color:darkgreen; font-size: 30px;">Balance/ {{ $accountlist->balance }}
                            euro<br></span>
                        <span style="color:darkgreen; font-size: 30px;">Account/
                            {{ $accountlist->accountid }}<br></span>

                        <input type="number" name="balance_deposit" value="{{ old('balance_deposit') }}">
                        <button type="submit">add</button>
                        @csrf
                        @method ('PUT')
                    </form>
                    <a href="{{ route('account-show') }}" style='font-size: 50px;color:green;'>to list</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
