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
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Multiple Image</div>
                             <div class="card-body">
                                @foreach ($multipic as $item)
                                    <div class="row">
                                        <div class="col-md-2">
                                        {{ $item->image }}
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Multiple Image</div>
                        <div class="card-body">
                            <form action="{{ route('store.multipic') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Multiple Image</label>
                                    <input type="file" name="image[]" class="form-control"
                                    id="exampleInputEmail1"
                                    aria-describedby="emailHelp"
                                    multiple="">

                                    @error('brand_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>


                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
