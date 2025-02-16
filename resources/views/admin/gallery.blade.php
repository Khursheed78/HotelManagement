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
                    <h1 class="text-center">Gallery</h1>
                </div>
            </div>

             <!-- Gallery Section -->
    <div class="container mt-5">

        <div class="row g-4"> <!-- Use g-4 for gap -->
            @foreach($images as $image)
                <div class="col-md-3">
                    <div class="card shadow-sm">
                        @if ($image)
                            <img src="{{ asset('storage/' . $image->image) }}" alt="Room Image" class="card-img-top" width="300" height="300">
                        @else
                            <div class="text-center py-4">No Image</div>
                        @endif
                        <div class="card-body text-center ">



                        <form action="{{ route('admin.delete_image', $image->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this room?');" title="Delete Room">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>


            <div class="container mt-4">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Upload Your Image</h3>
                        <form action="{{route('admin.uploadimage')}}" method="POST" enctype="multipart/form-data" class="text-center">
                            @csrf
                            <div class="mb-3">
                                <label for="image" class="form-label">Choose Image</label>
                                <input type="file" name="image" id="image" class="form-control w-50 mx-auto"
                                    accept="image/*">
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.footer')
</body>

</html>
