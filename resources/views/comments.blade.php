<?php
/**
 * @var \App\Models\Comment[] $comments
 * @var \App\Models\User $user
 */
?>

@extends('layout.base')

@section('title', 'My comments')

@section('content')
    <h1>
        {{ __('general.hello', ['user' => $user->name]) }},
        у тебя {{ trans_choice('general.apple', $user->id, ['value' => $user->id]) }}
    </h1>
    <ul>
        <button @class([
        'btn',
        'btn-warning' => $btnType === 'warn',
        'btn-danger' => $btnType === 'error',
        'btn-xl',
])>asdfdsfgdsfg</button>
    </ul>
    <h1>Comments for user {{ $user->name }}</h1>
    @forelse($comments as $comment)
        <p>{{ $comment->text }}</p>
    @empty
        <p>no comments so far</p>
    @endforelse
@endsection
