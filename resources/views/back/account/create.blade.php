@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Create</h1>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <form action="{{route('doForm')}}" method="post">

                            <label for="input" class="form-label">name</label>
                            <input type="text" class="form-control" name="name" placeholder="input name" value="{{old('name')}}">

                            <label for="input" class="form-label">surname</label>
                            <input type="text" class="form-control" name="surname" placeholder="input surname" value="{{old('surname')}}">

                            <label for="input" class="form-label">idnumba</label>
                            <input type="text" class="form-control" name="idnumba" placeholder="input idnumba" value="{{old('surname')}}">

                            <label for="input" class="form-label">accountid</label>
                            <input type="text" class="form-control" name="accountid" placeholder="input accountid" value="{{old('surname')}}">

                            <label for="input" class="form-label">email</label>
                            <input type="text" class="form-control" name="email" placeholder="input email" value="{{old('surname')}}">

                            <label for="input" class="form-label">password</label>
                            <input type="text" class="form-control" name="password" placeholder="input password" value="{{old('surname')}}">

                            <button type="submit" class="btn btn-outline-warning">a bag of combos</button>
                            @csrf
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
