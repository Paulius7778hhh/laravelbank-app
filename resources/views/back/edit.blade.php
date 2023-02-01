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
                    <form action="{{route('account-update',$accountlist)}}" method="POST">








                        <label for=" input" class="form-label">name</label>
                        <input type="text" class="form-control" name="name_edit" placeholder="input name" value="{{$accountlist->name}}">

                        <label for="input" class="form-label">bame</label>
                        <input type="text" class="form-control" name="surname_edit" placeholder="input name" value="{{$accountlist->surname}}">

                        <label for="input" class="form-label">lame</label>
                        <input type="text" class="form-control" name="idnumber_edit" placeholder="input name" value="{{$accountlist->idnumber}}">

                        <label for="input" class="form-label">dame</label>
                        <input type="text" class="form-control" name="email_edit" placeholder="input name" value="{{$accountlist->email}}">

                        <label for="input" class="form-label">pame</label>
                        <input type="text" class="form-control" name="password_edit" placeholder="input name" value="{{$accountlist->password}}">









                        <button> submit </button>
                        @csrf
                        @method('put')
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
