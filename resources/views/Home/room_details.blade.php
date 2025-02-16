<!DOCTYPE html>
<html lang="en">


<head>
    @include('Home.css')
</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->

    <!-- header inner -->
    @include('Home.header')
    <!-- end header inner -->


    <div class="our_room">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Our Room</h2>
                        <p>Lorem Ipsum available, but the majority have suffered </p>
                    </div>
                </div>
            </div>
            <div class="row g-4">

                <!-- Room Card -->
                <div class="col-md-8 col-sm-6">
                    <div class="card shadow-lg border-0" style="background-color: #1c1c1c; color: #ffffff;">

                        <div class="room_img">

                            <figure class="m-0">
                                @if ($data->image)
                                    <img src="{{ asset('storage/' . $data->image) }}" class="card-img-top"
                                        alt="Room Image" style="height: 200px; object-fit: cover;">
                                @else
                                    <div class="d-flex justify-content-center align-items-center"
                                        style="height: 200px; background-color: #ff4d4d;">
                                        <span class="text-white">No Image</span>
                                    </div>
                                @endif
                            </figure>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title text-center text-danger">{{ $data->room_titile }}</h3>
                            <p class="card-text">{{ $data->description }}</p>
                            <ul class="list-unstyled">
                                <li><strong>Free Wifi:</strong> {{ $data->wifi }}</li>
                                <li><strong>Room Type:</strong> {{ $data->room_type }}</li>
                            </ul>
                            <h4 class="text-center " style="color: white">Price: {{ $data->price }}</h4>
                        </div>
                    </div>
                </div>

                <!-- Booking Form -->
                <div class="col-md-4 col-sm-6">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="card shadow-lg p-4" style="background-color: #212529; color: #ffffff;">
                        <h4 class="text-center mb-4 text-danger">Book a Room</h4>
                        <form action="{{ route('home.add_booking', $data->id) }}" method="POST">
                            @csrf
                            @if (Auth::check())
                                <div class="mb-3">
                                    <label for="name" class="form-label text-light">Name</label>
                                    <input type="text" id="name" name="name"
                                        value="{{ Auth::user()->name }}" class="form-control bg-dark text-white"
                                        placeholder="Enter your name">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label text-light">Email</label>
                                    <input type="email" id="email" name="email"
                                        value="{{ Auth::user()->email }}" class="form-control bg-dark text-white"
                                        placeholder="Enter your email">
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label text-light">Phone</label>
                                    <input type="number" id="phone" name="phone"
                                        value="{{ Auth::user()->phone }}" class="form-control bg-dark text-white"
                                        placeholder="Enter your phone number">
                                </div>
                            @else
                                <p class="text-light">Please <a href="{{ route('login') }}"
                                        class="text-warning">login</a> to fill out this form.</p>
                            @endif

                            {{-- <div class="mb-3">
                            <label for="name" class="form-label text-light">Name</label>
                            <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" class="form-control bg-dark text-white" placeholder="Enter your name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label text-light">Email</label>
                            <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" class="form-control bg-dark text-white" placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label text-light">Phone</label>
                            <input type="number" id="phone" name="phone" value="{{ Auth::user()->phone }}" class="form-control bg-dark text-white" placeholder="Enter your phone number">
                        </div> --}}
                            <div class="mb-3">
                                <label for="start_date" class="form-label text-light">Start Date</label>
                                <input type="date" id="start_date" name="start_date"
                                    class="form-control bg-dark text-white">
                            </div>
                            <div class="mb-3">
                                <label for="end_date" class="form-label text-light">End Date</label>
                                <input type="date" id="end_date" name="end_date"
                                    class="form-control bg-dark text-white">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-danger w-100">Submit</button>
                            </div>
                        </form>


                        {{-- <form id="bookingForm" action="{{ route('home.add_booking', $data->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label text-light">Name</label>
                            <input type="text" id="name" name="name" class="form-control bg-dark text-white" placeholder="Enter your name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label text-light">Email</label>
                            <input type="email" id="email" name="email" class="form-control bg-dark text-white" placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label text-light">Phone</label>
                            <input type="number" id="phone" name="phone" class="form-control bg-dark text-white" placeholder="Enter your phone number">
                        </div>
                        <div class="mb-3">
                            <label for="startdate" class="form-label text-light">Start Date</label>
                            <input type="date" id="start_date" name="start_date" class="form-control bg-dark text-white">
                        </div>
                        <div class="mb-3">
                            <label for="endDate" class="form-label text-light">End Date</label>
                            <input type="date" id="end_date" name="end_date" class="form-control bg-dark text-white">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-danger w-100">Submit</button>
                        </div>
                    </form>
                    <div id="responseMessage" class="mt-3"></div> --}}

                    </div>
                </div>
            </div>


        </div>
    </div>

    <!--  footer -->
    @include('home.footer')

    <script type="text/javascript">
        $(function() {
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;

            var day = dtToday.getDate();

            var year = dtToday.getFullYear();

            if (month < 10)
                month = '0' + month.toString();

            if (day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;
            $('#startDate').attr('min', maxDate);
            $('#endDate').attr('min', maxDate);

        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script>
    $(document).ready(function () {
        $('#bookingForm').on('submit', function (e) {
            e.preventDefault(); // Prevent default form submission

            let formData = $(this).serialize(); // Get form data
            let url = $(this).attr('action');
            let url = "{{ route('home.add_booking', $data->id) }}"; // Use Laravel Blade to generate the route


            $.ajax({
                url: url: "{{ route('home.add_booking', $data->id) }}", // Hardcoded URL, // Form action URL
                method: 'POST',
                data: formData,
                success: function (response) {
                    // Display success message
                    $('#responseMessage').html(
                        `<div class="alert alert-success">${response.message}</div>`
                    );
                    $('#bookingForm')[0].reset(); // Reset the form
                },
                error: function (xhr) {
                    // Display validation errors
                    if (xhr.status === 422) { // Laravel validation error status
                        let errors = xhr.responseJSON.errors;
                        let errorMessage = '<div class="alert alert-danger"><ul>';
                        $.each(errors, function (key, value) {
                            errorMessage += `<li>${value}</li>`;
                        });
                        errorMessage += '</ul></div>';
                        $('#responseMessage').html(errorMessage);
                    }
                },
            });
        });
    });
</script> --}}

</body>

</html>
