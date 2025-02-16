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
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('admin.add_room') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="room_titile" class="form-control-label">Room Title</label>
                            <input type="text" id="room_titile" name="room_titile" placeholder="Room Title"
                                class="form-control" >

                            <label for="description" class="form-control-label">Description</label>
                            <textarea id="description" name="description" class="form-control" cols="30" rows="10"
                                placeholder="Enter room description" ></textarea>

                            <label for="price" class="form-control-label">Price</label>
                            <input type="number" id="price" name="price" placeholder="Price" class="form-control"
                                min="0" step="0.01" >

                            <label for="roomType" class="form-control-label">Room Type</label>
                            <select id="roomType" name="room_type" class="form-control mb-3" >
                                <option value="regular" selected>Regular</option>
                                <option value="deluxe">Deluxe</option>
                                <option value="luxury">Luxury</option>
                            </select>

                            <label for="freeWifi" class="form-control-label">Free Wifi</label>
                            <select id="freeWifi" name="wifi" class="form-control mb-3" >
                                <option value="yes" selected>Yes</option>
                                <option value="no">No</option>
                            </select>

                            <label for="uploadImage" class="form-control-label">Upload Image</label>
                            <input type="file" id="uploadImage" name="image" class="form-control" accept="image/*">
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>

        @include('admin.footer')
    </div>
</body>

</html>
