@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Account Editor') }}</div>

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
                        <form action="{{ route('account-update', $accountlist) }}" method="POST">








                            <label for=" input" class="form-label">name</label>
                            <input type="text" class="form-control" name="name_edit" placeholder="input name"
                                value="{{ $accountlist->name }}">

                            <label for="input" class="form-label">surname</label>
                            <input type="text" class="form-control" name="surname_edit" placeholder="input name"
                                value="{{ $accountlist->surname }}">

                            <label for="input" class="form-label">idnumber</label>
                            <input type="text" class="form-control" name="idnumber_edit" placeholder="input name"
                                value="{{ $accountlist->idnumber }}">

                            <label for="input" class="form-label">email</label>
                            <input type="text" class="form-control" name="email_edit" placeholder="input name"
                                value="{{ $accountlist->email ?? old('email_edit') }}">

                            <label for="input" class="form-label">password</label>
                            <input type="text" class="form-control" name="password_edit" placeholder="input name"
                                value="{{ $accountlist->password }}">









                            <button> submit </button>
                            @csrf
                            @method('put')
                        </form>
                        <a href="{{ route('account-show') }}" style='font-size: 50px;color:green;'>to list</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
