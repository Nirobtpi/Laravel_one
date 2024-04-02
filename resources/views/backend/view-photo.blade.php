
<div
    class="table-responsive"
>
    <table
        class="table table-primary"
    >
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Column 2</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($all as $a)
                <tr class="">
                <td scope="row">{{ $a->name }}</td>
                <td><img src=" {{ asset('/storage/'.$a->photo_name) }}" style="width: 50px; height:50px" alt=""></td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>
