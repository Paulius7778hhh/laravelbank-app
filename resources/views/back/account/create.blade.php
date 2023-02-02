@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Create Account</h1>
                    </div>
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
                        <div class="mb-3">
                            <form action="{{ route('account-store') }}" method="post">





                                <label for="input" class="form-label">name</label>
                                <input type="text" class="form-control" name="name_post" placeholder="input name"
                                    value="{{ old('name_post') }}">



                                <label for="input" class="form-label">surname</label>
                                <input type="text" class="form-control" name="surname_post" placeholder="input surname"
                                    value="{{ old('surname_post') }}">


                                <label for="input" class="form-label">idnumber</label>
                                <input type="text" class="form-control" name="idnumber_post" placeholder="input idnumber"
                                    value="{{ old('idnumber_post') }}">


                                <label for="input" class="form-label">IBAN</label>
                                <input type="text" class="form-control" name="accountid_post" readonly
                                    value="{{ $acountt }}">



                                <label for="input" class="form-label">email</label>
                                <input type="email" class="form-control" name="email_post" placeholder="input email"
                                    value="{{ old('email_post') }}">


                                <label for="input" class="form-label">password</label>
                                <input type="password" class="form-control" name="password_post"
                                    placeholder="input password" value="{{ old('password_post') }}">








                                <button type="submit" class="btn btn-outline-warning">a bag of combos</button>
                                @csrf
                            </form>
                            <a href="{{ route('account-index') }}" style='font-size: 50px;color:green;'>to menu</a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
