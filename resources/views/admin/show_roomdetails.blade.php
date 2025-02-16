<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        @include('admin.sidebar')
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="block margin-bottom-sm">
                                <div class="title"><strong>Basic Table</strong></div>
                                <div class="table-responsive">
                                    <div class="container">
                                        @if (session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif

                                        @if (session('error'))
                                            <div class="alert alert-danger">
                                                {{ session('error') }}
                                            </div>
                                        @endif
                                    <table class="table">
                                        <thead>



                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Price</th>
                                                <th>Wifi</th>
                                                <th>Room Type</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $room)
                                            <tr>
                                                <th scope="row">{{ $room->id }}</th>
                                                <td>{{ $room->room_titile }}</td>
                                                {{-- <td>{!! Str::limit($room->description, 50) !!}</td> --}}

                                                <td>{{ $room->description }}</td>
                                                <td>{{ $room->price }}</td>
                                                <td>{{ $room->wifi }}</td>
                                                <td>{{ $room->room_type }}</td>
                                                <td>
                                                    @if ($room->image)
                                                        <img src="{{ asset('storage/' . $room->image) }}" alt="Room Image" width="100" height="100">
                                                    @else
                                                        No Image
                                                    @endif
                                                </td>
                                                <td>
                                                    <!-- Update Button -->
                                                    <a href="{{ route('admin.edit_room', $room->id) }}" class="btn btn-primary btn-sm" title="Edit Room">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                    <!-- Delete Button -->
                                                    <form action="{{ route('admin.delete_room', $room->id) }}" method="POST" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Are you sure you want to delete this room?');" title="Delete Room">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>


                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.footer')
    </div>
</body>

</html>
