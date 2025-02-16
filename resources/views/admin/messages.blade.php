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
            <div class="page-header bg-dark text-white py-3">
                <div class="container">
                    <h1 class="text-center">Messages</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Message</th>
                                <th>Send Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($messages as $message)
                            <tr>

                                <td>{{ $message->name }}</td>
                                {{-- <td>{!! Str::limit($room->description, 50) !!}</td> --}}

                                <td>{{ $message->email  }}</td>
                                <td>{{ $message->phone }}</td>
                                <td>
                                    <textarea class="form-control" rows="3" readonly>{{ $message->message }}</textarea>
                                </td>
                                <td >
                                    <a href="{{route('home.send_message',$message->id)}}" class="fa fa-envelope">

                                    </a>
                                </td>
                                <td>
                                    <!-- Delete Button -->
                                 <form action="{{route('admin.delete_message',$message->id)}}" method="POST" style="display:inline-block;">
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

        @include('admin.footer')
</body>

</html>
