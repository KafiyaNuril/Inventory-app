<table class="table mt-3">
    <thead>
        <tr class="text-center">
            <th>No</th>
            <th>Item</th>
            <th>Total</th>
            <th>Name</th>
            <th>Ket</th>
            <th>Date</th>
            <th>Returned</th>
            <th>Edited By</th>
        </tr>
    </thead>
    <tbody>
        @if (count($lendings) < 1)
            <tr>
                <td colspan='8' class="text-center">Data Lendings is empty</td>
            </tr>
        @else
            @foreach ($lendings as $index => $lending)
                <tr class="text-center">
                    <td>{{ $index + 1 }}</td>
                    <td>
                        {{ $lending->detailLendings->pluck('item.name')->implode(', ') ?? '-' }}
                    </td>
                    <td>{{ $lending->total_qty ?? 0 }}</td>
                    <td>{{ $lending->name }}</td>
                    <td>{{ $lending->notes }}</td>
                    <td>{{ $lending->borrow_date->timezone('Asia/Jakarta')->format('j F Y | h:i') }}</td>
                    <td>{{ ($lending->return_date == null ? 'Not Returned' : $lending->return_date->timezone('Asia/Jakarta')->format('j F Y | h:i')) }}</td>
                    <td class="fw-bolder">
                        {{ $lending->user->name }}
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
