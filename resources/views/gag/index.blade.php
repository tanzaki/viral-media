@extends('layouts.app')
@section('content')
    {{dd(App\Gag::all())}}
@endsection
