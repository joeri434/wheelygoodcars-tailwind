<table class="table">
    <thead>
        <tr>
            <th>Kenteken</th>
            <th>Merk</th>
            <th>Model</th>
            <th>Prijs</th>
            <th>Status</th>
            <th>Acties</th>
        </tr>
    </thead>
    <tbody>
        @foreach($autos as $auto)
            <tr>
                <td>{{ $auto->kenteken }}</td>
                <td>{{ $auto->merk }}</td>
                <td>{{ $auto->model }}</td>
                <td colspan="2">
                    @livewire('car-status-updater', ['car' => $auto], key($auto->id))
                </td>
                <td>
                    <form method="POST" action="{{ route('autos.destroy', $auto) }}">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">Verwijder</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
