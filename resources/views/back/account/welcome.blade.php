@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>welcome</h1>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{route('menu',1)}}" style='font-size: 100px;color:green;'>beaver</a>
                        <a href="{{route('menu',2)}}" style='font-size: 100px;color:green;'>rooster</a>
                        <a href="{{route('menu',3)}}" style='font-size: 100px;color:green;'>chicken</a>

                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
