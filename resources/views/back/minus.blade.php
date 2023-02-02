@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Withdraw money') }}</div>
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
                        <h2 class="alert alert-success">{{ Session::pull('status') }}</h2>
                    @endif
                    <div class="card-body">

                        <span style="color:darkgreen; font-size: 30px;">Name/ {{ $accountlist->name }}<br></span>
                        <span style="color:darkgreen; font-size: 30px;">Balance/ {{ $accountlist->balance }} euro<br></span>
                        <span style="color:darkgreen; font-size: 30px;">Account/ {{ $accountlist->accountid }}
                            <br></span>


                        <form action="{{ route('account-withdraw', $accountlist) }}" method="post">



                            <input type="number" name="balance_withdraw" value="{{ old('balance_withdraw') }}">
                            <button type="submit">withdraw</button>
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
