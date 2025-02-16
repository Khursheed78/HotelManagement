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

                    <center>
                        <h1 style="font-size: 30px" >Mail send to {{$contact->name}}</h1>
                    </center>
                    <form action="{{route('home.mail',$contact->id)}}" method="POST" >
                        @csrf
                        <div class="form-group">
                            <label for="room_titgreetingile" class="form-control-label">Greeting </label>
                            <input type="text" id="greeting" name="greeting" placeholder="Room Title"
                                class="form-control" >

                            <label for="mailbody" class="form-control-label">Mail Boyd</label>
                            <textarea id="mailbody" name="mailbody" class="form-control" cols="30" rows="10"
                                placeholder="Enter room description" ></textarea>

                            <label for="actiontext" class="form-control-label">Action Text</label>
                            <input type="text" id="actiontext" name="actiontext" placeholder="Price" class="form-control"
                                min="0" step="0.01" >

                            <label for="actionurl" class="form-control-label">Action Url Type</label>
                            <input type="text" id="actionurl" name="actionurl" placeholder="Price" class="form-control"
                            min="0" step="0.01" >
                            <label for="endline" class="form-control-label">End Line    </label>
                            <input type="text" id="endline" name="endline" placeholder="Price" class="form-control"
                            min="0" step="0.01" >




                        </div>

                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>

        @include('admin.footer')
</body>

</html>
