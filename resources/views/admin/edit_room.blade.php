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

                    <form action="{{ route('admin.update_room',$room->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="roomTitle" class="form-control-label">Room Title</label>
                            <input type="text" id="roomTitle" name="room_title" placeholder="Room Title"
                                class="form-control" value="{{ $room->title }}" >

                            <label for="description" class="form-control-label">Description</label>
                            <textarea id="description" name="description" class="form-control" cols="30" rows="10"
                                placeholder="Enter room description" >{{ $room->description }}</textarea>

                            <label for="price" class="form-control-label">Price</label>
                            <input type="number" id="price" value="{{ $room->price }}" name="price" placeholder="Price" class="form-control"
                                min="0" step="0.01" >

                          
                        <label for="roomType" class="form-control-label">Room Type</label>
                        <select id="roomType" name="room_type" class="form-control">
                            <option value="regular" {{ $room->room_type == 'regular' ? 'selected' : '' }}>Regular</option>
                            <option value="deluxe" {{ $room->room_type == 'deluxe' ? 'selected' : '' }}>Deluxe</option>
                            <option value="luxury" {{ $room->room_type == 'luxury' ? 'selected' : '' }}>Luxury</option>
                        </select>

                            <label for="freeWifi" class="form-control-label">Free Wifi</label>
                            <select id="freeWifi" name="wifi" class="form-control mb-3" >
                                <option value="yes" {{ $room->wifi == 'yes' ? 'selected' : '' }}>Yes</option>
                                <option value="no" {{ $room->wifi == 'no' ? 'selected' : '' }}>No</option>
                            </select>

                         
                        <label for="uploadImage" class="form-control-label">Upload Image</label>
                        <input type="file" id="uploadImage" name="image" class="form-control" accept="image/*">
                        @if ($room->image)
                            <img src="{{ asset('storage/' . $room->image) }}" alt="Room Image" width="100" height="100">
                        @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>

        @include('admin.footer')
    </div>
</body>

</html>
