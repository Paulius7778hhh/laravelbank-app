@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <a href="{{route('account-index')}}" style='font-size: 100px;color:green;'>back to menu</a>


                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif



                <div class="card-header">{{ __('Account list') }}</div>
                <div class="card-body">
                    <ul>
                        @forelse($Accountlist as $key => $account)
                        <form action="{{route('account-edit',$account)}}" method="get">




                            <li style="list-style: none;">Name/ {{$account->name}} Surname/ {{$account->surname}} Username/ {{$account->username}} idnumber/ {{$account->idnumber}}
                                Accountid/ {{$account->accountid}} Balance/ {{$account->balance}} id: {{$account->id}}</li>



                            <button type="submit">edit</button>

                        </form>
                        <form action="{{route('account-moneycount',$account)}}" method="get"> <button type="submit">+</button></form>


                        <form action="{{route('account-account-balance',$account)}}" method="get"> <button type="submit">-</button></form>


                        <form action="{{route('account-delete',$account)}}" method="POST">

                            <button type="submit">delete</button>
                            @csrf
                            @method('DELETE')</form>












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
