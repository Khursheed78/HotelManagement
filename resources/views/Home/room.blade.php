<div  class="our_room">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Our Room</h2>
                     <p>Lorem Ipsum available, but the majority have suffered </p>
                  </div>
               </div>
            </div>
            <div class="row">

               @foreach ($data as $room)
               <div class="col-md-4 col-sm-6">
                   <div id="serv_hover" class="room">
                       <div class="room_img">
                           <figure>
                               @if ($room->image)
                                   <img class="img-fluid" src="{{ asset('storage/' . $room->image) }}" alt="Room Image">
                               @else
                                   No Image
                               @endif
                           </figure>
                       </div>
                       <div class="bed_room" style="overflow: hidden;">
                           <h3>{{ $room->room_title }}</h3>
                           <p>{{ $room->description }}</p>

                           <a href="{{route('home.room_details',$room->id)}}" class="btn btn-primary">Room Details</a>

                       </div>
                   </div>
               </div>
           @endforeach


            </div>
         </div>
      </div>
