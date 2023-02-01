@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('MINUS') }}</div>
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="card-body">

                    balance {{$accountlist->balance}}<br>

                    <form action="{{route('account-withdraw',$accountlist)}}" method="post">



                        <input type="number" name="balance_withdraw">
                        <button type="submit">withdraw</button>
                        @csrf
                        @method ('PUT')

                    </form>

                    <a href="{{route('account-show')}}" style='font-size: 100px;color:green;'>to list</a>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
