<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
      <div class="avatar"><img src="img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
      <div class="title">
        <h1 class="h5">Mark Stephen</h1>
        <p>Web Designer</p>
      </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
            <li class="active"><a href="index.html"> <i class="icon-home"></i>Home </a></li>

            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Hotel Rooms </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="{{route('admin/create_room')}}">Create Room</a></li>
                <li><a href="{{route('admin.show_roomdetails')}}">View Rooms</a></li>
                <li><a href="#">Page</a></li>
              </ul>
            </li>
            <li><a href="{{route('admin.bookings')}}"><i class="icon-home"></i>Bookings</a></li>
            <li><a href="{{route('admin.gallery')}}"><i class="icon-home"></i>Gallery</a></li>
            <li><a href="{{route('admin.show_messages')}}"><i class="icon-home"></i>Messages</a></li>
    </ul>
  </nav>
