<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
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

                                                    <th>Room ID</th>
                                                    <th>Customer Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Arrival Date</th>
                                                    <th>Leaving Date</th>
                                                    <th>Status</th>
                                                    <th>Image</th>
                                                    <th>Action</th>
                                                    <th>Status Update</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Assuming $data is a collection -->
                                                <tr>
                                                    @foreach ($data as $room)
                                                        <th scope="row">{{ $room->id }}</th>
                                                        <td>{{ $room->name }}</td>
                                                        <td>{{ $room->email }}</td>
                                                        <td>{{ $room->phone }}</td>
                                                        <td>{{ $room->start_date }}</td>
                                                        <td>{{ $room->end_date }}</td>
                                                        <td>
                                                        @if ($room->status == 'approve')
                                                        <span style="color: skyblue;">Approved</span>
                                                        @endif
                                                        @if ($room->status == 'rejected')
                                                        <span style="color: red;">Rejected</span>
                                                        @endif
                                                        @if ($room->status == 'waiting')
                                                        <span style="color: yellow;">Waiting</span>
                                                        @endif
                                                    </td>
                                                        <td>
                                                            @if ($room->image)
                                                                <img src="{{ asset('storage/' . $room->image) }}"
                                                                    alt="Room Image" width="100" height="100">
                                                            @else
                                                                No Image
                                                            @endif
                                                        </td>
                                                        <td>

                                                            <!-- Delete Button -->
                                                            <form
                                                                action="{{ route('admin.delete_booking', $room->id) }}"
                                                                method="POST" style="display:inline-block;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm"
                                                                    onclick="return confirm('Are you sure you want to delete this room?');"
                                                                    title="Delete Room">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <div class="mb-1">
                                                                <a class="btn btn-success" href="{{route('admin.approve_booking',$room->id)}}"> <i class="fa fa-check"></i></a>

                                                            </div>
                                                            <a class="btn btn-danger" href="{{route('admin.reject_booking',$room->id)}}"> <i class="fa fa-close"></i></a>
                                                        </td>
                                                </tr>

                                            </tbody>
                                            @endforeach
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.footer')
</body>

</html>
