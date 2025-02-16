<style>
    .alert {
        padding: 10px;
        margin: 10px 0;
        border: 1px solid transparent;
        border-radius: 4px;
    }

    .alert-success {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
    }

    .alert-danger {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
    }
</style>
<div class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>Contact Us</h2>
                </div>
            </div>
        </div>
        <!-- Display success message -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Display error messages -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            <div class="col-md-6">
                <form id="contactForm" class="main_form">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <input class="contactus" placeholder="Name" type="text" name="name" required>
                        </div>
                        <div class="col-md-12">
                            <input class="contactus" placeholder="Email" type="email" name="email" required>
                        </div>
                        <div class="col-md-12">
                            <input class="contactus" placeholder="Phone Number" type="number" name="phone" required>
                        </div>
                        <div class="col-md-12">
                            <textarea class="textarea" placeholder="Message" name="message"></textarea>
                        </div>
                        <div class="col-md-12">
                            <button class="send_btn" type="submit">Send</button>
                        </div>
                    </div>
                </form>
                <div id="form-message" style="display: none; margin-top: 10px;"></div>
            </div>
            <div class="col-md-6">
                <div class="map_main">
                    <div class="map-responsive">
                        <iframe
                            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Eiffel+Tower+Paris+France"
                            width="600" height="400" frameborder="0" style="border:0; width: 100%;"
                            allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            $('.alert').fadeOut('slow', function() {
                $(this).remove(); // Remove the alert from the DOM
            });
        }, 15000); // 5000 milliseconds = 5 seconds
    });
</script>


<script>
    // Auto-close alert messages after 5 seconds
    setTimeout(function() {
        $('.alert').fadeOut('slow', function() {
            $(this).remove(); // Remove the alert from the DOM
        });
    }, 5000); // 5000 milliseconds = 5 seconds



    $(document).ready(function() {
        $('#contactForm').on('submit', function(e) {
            e.preventDefault(); // Prevent the form from submitting traditionally

            // Clear previous messages
            $('#form-message').hide().removeClass('alert-success alert-danger').text('');

            // Get the form data
            var formData = $(this).serialize();

            // Send an AJAX request
            $.ajax({
                url: "{{ route('home.add_message') }}",
                type: "POST",
                data: formData,
                success: function(response) {
                    if (response.success) {
                        $('#form-message').addClass('alert alert-success').text(response
                            .message).show();
                        $('#contactForm')[0].reset(); // Clear the form
                    } else {
                        var errors = response.errors;
                        var errorMessages = Object.values(errors).map(error => error.join(
                            ' ')).join('<br>');
                        $('#form-message').addClass('alert alert-danger').html(
                            errorMessages).show();
                    }
                },
                error: function(xhr) {
                    $('#form-message').addClass('alert alert-danger').text(
                        'An error occurred while sending the message.').show();
                }
            });
        });
    });
</script>
