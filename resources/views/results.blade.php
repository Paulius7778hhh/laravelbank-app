@extends('layouts.app')
@section('title','feverbeaver')
@section('results')
<h1>{{$feverbeaver}}</h1>
@if($number == 1)
<h1>beaver</h1>
@elseif($number == 2)
<h1>rooster</h1>
@elseif($number == 3)
<h1>chicken</h1>
@else
<h1>brick</h1>
@endif

@foreach($lot as $cars)
<li>{{$cars}}</li>


@endforeach
@forelse($wha as $whas)

<li>{{$whas}}</li>



@empty
<h1>theresnolimit<h1>
        @endforelse
        @endsection
