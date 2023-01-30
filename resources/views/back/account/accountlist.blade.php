@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Account list') }}</div>

                <div class="card-body">
                    <ul>
                        @forelse($Accountlist as $key => $value)
                        {{$value}}


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
