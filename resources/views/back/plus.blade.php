@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('PLUS') }}</div>

                <div class="card-body">

                    <form action="" method="post">
                        <input type="number" name="balance_deposit">
                        <button type="submit">add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection