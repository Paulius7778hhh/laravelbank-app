@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('PLUS') }}</div>
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

                    <form action="{{route('account-moneycount',$accountlist)}}" method="post">
                        balance {{$accountlist->balance}}<br>
                        <input type="number" name="balance_deposit">
                        <button type="submit">add</button>
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
