@extends('layouts.app')

@section('form')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <h1>POST FORM</h1>
                <h2 class="card-header">Total: {{$sum}}</h2>
                @if (Session::has('status'))
                <h2 class="alert alert-success">{{Session::pull('status')}}</h2>
                @endif
                @if($errors)
                @foreach ($errors->all() as $message)
                <h2 class="alert alert-danger">{{ $message }}</h2>
                @endforeach
                @endif

                <div class="card-body">
                    <div class="mb-3">
                        <form action="{{route('doForm')}}" method="post">

                            <label for="input" class="form-label">un</label>
                            <input type="text" class="form-control" name="sum_o" placeholder="input number" value="{{old('sum_o')}}">


                            <label for="input" class="form-label">do</label>
                            <input type="text" class="form-control" name="sum_t" placeholder="input number" value="{{old('sum_t')}}">

                            <button type="submit" class="btn btn-outline-warning">combo</button>
                            <button type="reset" class="btn btn-outline-warning">reset</button>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
