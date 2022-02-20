<table class="table">
    <thead>
    <tr>
        @foreach($headers as $header)
            <th>{{ $header }}</th>
        @endforeach
    </tr>
    </thead>
    @foreach($collection as $element)
        <tr>
            @foreach($headers as $header)
                <td>{{ $element->{$header} }}</td>
            @endforeach
            <td>
                <a href="{{ $element->getEditLink() }}" class="btn btn-sm btn-primary" tabindex="-1" role="button" aria-disabled="true">
                    <x-admin.icon icon="pencil-square"></x-admin.icon>
                </a>
                <form action="{{ $element->getRemoveLink() }}" method="post" class="d-inline">
                    @csrf
                    @method('DELETE')
                <button class="btn btn-sm btn-danger" tabindex="-1" role="button" aria-disabled="true">
                    <x-admin.icon icon="dash"></x-admin.icon>
                </button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
