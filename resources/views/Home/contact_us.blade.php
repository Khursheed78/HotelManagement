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
        <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha384-oPu9QFAl6BUvGHL2DctmN2HoR9Cj+ZmSx4c04v40xkS7QcA5a/6X0Pz7U4PxdKp1" crossorigin="anonymous"></script>

    </div>
    <!-- end loader -->
    <!-- header -->

    <!-- header inner -->
    @include('Home.header')
    <!-- end header inner -->
    <!-- end header -->
    <!-- banner -->

    <!--  contact -->
    @include('home.contact')
    <!-- end contact -->
    <!--  footer -->
    @include('home.footer')
</body>

</html>
