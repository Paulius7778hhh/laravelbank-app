@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if($errors)
                @foreach ($errors->all() as $message)
                <div class="col-6">
                    <div class="alert alert-danger m-4" role="alert">
                        {{ $message }}
                    </div>
                </div>
                @endforeach
                @endif

                <div class="card-header">{{ __('Account list') }}</div>
                <div class="card-body">
                    <ul>
                        @forelse($Accountlist as $key => $account)
                        <form action="{{route('account-edit',$account)}}" method="get">




                            <li style="list-style: none;">Name/ {{$account->name}} Surname/ {{$account->surname}} Username/ {{$account->username}} idnumber/ {{$account->idnumber}}
                                Accountid/ {{$account->accountid}} Balance/ {{$account->balance}}</li>


                            <button type="submit">edit</button>

                        </form>
                        <form action="{{route('account-edit',$account)}}" method="get"> <button type="submit">+</button></form>

                        <form action="{{route('account-moneysubstract',$account)}}" method="get"> <button type="submit">-</button></form>








                        <br>
                        @empty
                        <li></li>
                        @endforelse
                    </ul>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
