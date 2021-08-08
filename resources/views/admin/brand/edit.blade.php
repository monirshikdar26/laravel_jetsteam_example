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
                        <div class="card-header">Edit Brand</div>
                        <div class="card-body">
                            <form action="{{ url('brand/update/'.$brand->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="old_image" value="{{ $brand->brand_image }}">
                                <div class="form-group">
                                <label for="exampleInputEmail1">Edit Brand Name</label>
                                <input type="text" name="brand_name" value="{{ $brand->brand_name }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                @error('brand_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Edit Brand Image</label>
                                    <input type="file" name="brand_image" value="{{ $brand->brand_image }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                    @error('brand_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    </div>

                                    <div class="form-group">
                                        <img src="{{ asset($brand->brand_image) }}" style="width:400px; height:200px">
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
