<x-app-layout>


    <div class="py-12">
        <div class="container-fluid">
            @if (session('Success'))
            <div class="alert alert-success alert-dismissible face show" role="alert">
                <strong>{{ session('Success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">All Catagory</div>
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

                                @foreach ($category as $item)
                                <tr>
                                    <th scope="row">{{ $category->firstItem()+$loop->index }}</th>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->category_name }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ url('category/edit/'.$item->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ url('category/delete/'.$item->id) }}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                            {{ $category->links() }}
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">Add Category</div>
                        <div class="card-body">
                            <form action="{{ route('store.category') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                <label for="exampleInputEmail1">Category Name</label>
                                <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                @error('category_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                </div>

                                <button type="submit" class="btn btn-primary">Add Category</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
