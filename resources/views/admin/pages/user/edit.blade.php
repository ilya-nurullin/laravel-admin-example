@extends('admin.layout.base')

@section('base-content')
    <h1>{{ $title }} @if($user?->id ?? false)(ID = {{ $user->id }})@endif</h1>
    <div class="row">
        <div class="col">
            <x-admin.form-errors></x-admin.form-errors>
            {!! Form::model($user, ['url' => $route, 'method' => $method]) !!}
            <div class="mb-3">
                {!! Form::label('name', null, ['class' => 'form-label']) !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            <div class="mb-3">
                {!! Form::label('password', 'New password', ['class' => 'form-label']) !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>
            <div class="mb-3">
                {!! Form::label('email', null, ['class' => 'form-label']) !!}
                {!! Form::text('email', null, ['class' => 'form-control']) !!}
            </div>
            <button type="submit" class="btn btn-primary">@if($user?->id ?? false) Update @else Create @endif</button>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
