@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('MINUS') }}</div>

                <div class="card-body">

                    balance {{$accountlist->balance}}
                    <form action="" method="post">
                        <input type="number" name="balance_withdraw">
                        <button type="submit">withdraw</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
