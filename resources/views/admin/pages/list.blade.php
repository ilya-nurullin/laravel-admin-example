@extends('admin.layout.base')

@section('base-content')
    <h1>{{ $title }}</h1>
    <div class="row">
        <div class="col" style="text-align: right">
            @can('create', $collection->first())
            <a href="{{ $addUrl ?? '#not-implemented' }}" class="btn btn-primary" tabindex="-1" role="button" aria-disabled="true">
                <x-admin.icon icon="plus-lg"></x-admin.icon>
                Add
            </a>
            @endcan
        </div>
    </div>
    <x-admin.table :collection="$collection" ></x-admin.table>
@endsection
