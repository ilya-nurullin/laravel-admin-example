@extends('admin.layout.base')

@section('base-content')
    <h1>{{ $title }} @if($post?->id ?? false)(ID = {{ $post->id }})@endif</h1>
    <div class="row">
        <div class="col">
            <x-admin.form-errors></x-admin.form-errors>
            {!! Form::model($post, ['url' => $route, 'method' => $method]) !!}
            <div class="mb-3">
                {!! Form::label('user_id', null, ['class' => 'form-label']) !!}
                {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
            </div>
            <div class="mb-3">
                {!! Form::label('text', 'Text', ['class' => 'form-label']) !!}
                {!! Form::textarea('text', null, ['class' => 'form-control']) !!}
            </div>
            <button type="submit" class="btn btn-primary">@if($post?->id ?? false) Update @else Create @endif</button>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
