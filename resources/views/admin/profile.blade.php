<x-admin.adminLayout>

	<div class="page-content">


        <div class="row profile-body">
          <!-- left wrapper start -->
          <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
            <div class="rounded card">
              <div class="card-body">
                <div class="mb-2 d-flex align-items-center justify-content-between">


                  <div>
                    <img class="wd-100 rounded-circle" src="{{(!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo): url('upload/no_image.jpg')}}" alt="profile">
                    <span class="h4 ms-3 ">{{$profileData->name}}</span>
                  </div>


                </div>

                <div class="mt-3">
                  <label class="mb-0 tx-11 fw-bolder text-uppercase">User Name:</label>
                  <p class="text-muted">{{$profileData->username}}</p>
                </div>
                <div class="mt-3">
                  <label class="mb-0 tx-11 fw-bolder text-uppercase">Email:</label>
                  <p class="text-muted">{{$profileData->email}}</p>
                </div>
                <div class="mt-3">
                  <label class="mb-0 tx-11 fw-bolder text-uppercase">Phone:</label>
                  <p class="text-muted">{{$profileData->phone}}</p>
                </div>
                <div class="mt-3">
                  <label class="mb-0 tx-11 fw-bolder text-uppercase">Address:</label>
                  <p class="text-muted">{{$profileData->address}}</p>
                </div>
                <div class="mt-3 d-flex social-links">
                  <a href="javascript:;" class="border btn btn-icon btn-xs me-2">
                    <i data-feather="github"></i>
                  </a>
                  <a href="javascript:;" class="border btn btn-icon btn-xs me-2">
                    <i data-feather="twitter"></i>
                  </a>
                  <a href="javascript:;" class="border btn btn-icon btn-xs me-2">
                    <i data-feather="instagram"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <!-- left wrapper end -->
          <!-- middle wrapper start -->
          <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">

                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Update Admin Profile</h6>

                            <form method="POST" action="{{route('admin.profile.store')}}" class="forms-sample" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="unsername" class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control" id="username" autocomplete="off" value="{{$profileData->username}}">
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="name" autocomplete="off" value="{{$profileData->name}}">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email </label>
                                    <input type="email" name="email" class="form-control" id="email" autocomplete="off" value="{{$profileData->email}}">
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone </label>
                                    <input type="text" name="phone" class="form-control" id="phone" autocomplete="off" value="{{$profileData->phone}}">
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address </label>
                                    <input type="text" name="address" class="form-control" id="address" autocomplete="off" value="{{$profileData->address}}">
                                </div>
                                <div class="mb-3">
                                    <label for="photo" class="form-label">Photo </label>
                                    <input type="file" name="photo" class="form-control" id="image" autocomplete="off" >
                                </div>
                                <div class="mb-3">
                                    <label for="photo" class="form-label"> </label>
                                    <img id="showImage" class="wd-100 rounded-circle" src="{{(!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo): url('upload/no_image.jpg')}}" alt="profile">
                                </div>




                                <button type="submit" class="btn btn-primary me-2">Save Changes</button>

                            </form>

                    </div>
                  </div>


            </div>
          </div>
          <!-- middle wrapper end -->
          <!-- right wrapper start -->

          <!-- right wrapper end -->
        </div>

			</div>


            <script type="text/javascript">


                document.addEventListener('DOMContentLoaded', function() {
                    const imageInput = document.getElementById('image');
                    const showImage = document.getElementById('showImage');

                    imageInput.addEventListener('change', function(e) {
                        const file = e.target.files[0];
                        const reader = new FileReader();

                        reader.onload = function(event) {
                            showImage.src = event.target.result;
                        };

                        reader.readAsDataURL(file);
                    });
                });
            </script>

</x-admin.adminLayout>
