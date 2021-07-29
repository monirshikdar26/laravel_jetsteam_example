<x-app-layout>


    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden alert alert-primary sm:rounded-lg" role="alert">
                Hi, <b>{{ Auth::user()->name }}</b>
                <b class="float-right"> Total Users
                    <span class="badge badge-danger">{{ count($users) }}</span>
                </b>
            </div>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">SL no</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Created At</th>
                  </tr>
                </thead>
                <tbody>
                    @php($i = 1)
                    @foreach ($users as $data)
                  <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->created_at }}</td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
        </div>
    </div>
</x-app-layout>
