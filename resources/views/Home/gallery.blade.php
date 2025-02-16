  <div class="gallery">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <div class="titlepage">
                      <h2>gallery</h2>
                  </div>
              </div>
          </div>
          {{-- @auth
            <div class="row">
                @foreach ($images as $image)
                    <div class="col-md-3 col-sm-6 mb-4"> <!-- 4 items per row -->
                        <div class="card text-center shadow-sm">
                            <div class="gallery_img">
                                @if ($image)
                                    <figure>
                                        <img src="{{ asset('storage/' . $image->image) }}" alt="#" class="img-fluid" style="max-height: 150px; object-fit: cover;"/>
                                    </figure>
                                @else
                                    <div class="text-center py-4">No Image</div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info text-center mt-4">
                Please <a href="{{ route('login') }}" class="text-primary">log in</a> or <a href="{{ route('register') }}" class="text-primary">register</a> to view the gallery.
            </div>
        @endauth --}}


          <div class="row">
              @foreach ($images as $image)
                  <div class="col-md-3 col-sm-6 ">
                      <div class="gallery_img">
                          @if ($image)
                              <figure>
                                  <img src="{{ asset('storage/' . $image->image) }}" alt="#" class="img-fluid"
                                      style="max-height: 150px; object-fit: cover;" />
                              </figure>
                          @else
                              <div class="text-center py-4">No Image</div>
                          @endif
                      </div>

                  </div>
              @endforeach
          </div>

      </div>
  </div>
