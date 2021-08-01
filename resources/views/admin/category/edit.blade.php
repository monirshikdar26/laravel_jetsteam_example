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
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">Edit Category</div>
                        <div class="card-body">
                            <form action="{{ url('category/update/'.$category->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                <label for="exampleInputEmail1">Edit Category Name</label>
                                <input type="text" name="category_name" value="{{ $category->category_name }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                @error('category_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
