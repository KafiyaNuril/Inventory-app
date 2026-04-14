<table class="table">
    <thead>
        <tr class="table-active">
            <th scope="col">No</th>
            <th scoper="col">Category</th>
            <th scope="col">Name</th>
            <th scope="col">total</th>
            <th scope="col">Repair</th>
        </tr>
    </thead>
    <tbody>
        @if (count($items) < 1)
            <tr>
                <td colspan="5" class="text-center">Item is Empty</td>
            </tr>
        @else
            @foreach ($items as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->total }}</td>
                    <td>{{ $item->repair }}</td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
