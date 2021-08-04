<x-app-layout>


    <div class="py-12">
        <div class="container">
            @if (session('Success'))
            <div class="alert alert-success alert-dismissible face show" role="alert">
                <strong>{{ session('Success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Trash List</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">SL no</th>
                                    <th scope="col">User Id</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($trashCat as $item)
                                <tr>
                                    <th scope="row">{{ $trashCat->firstItem()+$loop->index }}</th>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->category_name }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>

                                        <a href="{{ url('/category/restore/'.$item->id) }}" class="btn btn-info">Restore</a>
                                        <a href="{{ url('/category/delete/'.$item->id) }}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                            {{ $trashCat->links() }}
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</x-app-layout>
