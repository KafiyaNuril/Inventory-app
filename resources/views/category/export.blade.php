<table class="table">
        <thead>
            <tr class="table-active">
                <th>No</th>
                <th>Name</th>
                <th>Division Pj</th>
                <th>Total Items</th>
            </tr>
        </thead>
        <tbody>
            @if (count($categories) < 1)
                <tr>
                    <td colspan="4" class="text-center">Category is Empty</td>
                </tr>
            @else
                @foreach ($categories as $index => $category)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->division_pj }}</td>
                        <td>{{ $category->items_count }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
