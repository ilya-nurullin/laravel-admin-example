@extends('admin.layout.root')

@section('body')
    @include('admin.layout.components.header')

    <div class="container">
        @yield('base-content')
    </div>
@endsection
