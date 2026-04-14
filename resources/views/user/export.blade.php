<table class="table">
    <thead>
        <tr class="table-active">
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
        </tr>
    </thead>
    <tbody>
        @if (count($users) < 1)
            <tr>
                <td colspan="4" class="text-center">User is Empty</td>
            </tr>
        @else
            @foreach ($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->password_plain == null ? 'Password has been edited' : $user->password_plain }}</td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
