@extends('layout.root')

@section('root_head')
    <link rel="stylesheet" href="{{ mix('css/admin.css') }}">
    @yield('head')
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="col">
                {{ config('app.name') }}
            </div>
        </div>

        @yield('content')
    </div>
@endsection

@section('under_body')
    © {{ config('app.name') }}
@endsection
