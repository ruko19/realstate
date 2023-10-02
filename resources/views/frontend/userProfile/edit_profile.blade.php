<x-front-layout>

     <!--Page Title-->
     <section class="page-title centred" style="background-image: url({{asset('frontend/assets/images/background/page-title-5.jpg')}});">
        <div class="auto-container">
            <div class="clearfix content-box">
                <h1>User Profile </h1>
                <ul class="clearfix bread-crumb">
                    <li><a href="index.html">Home</a></li>
                    <li>User Profile </li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->


    <!-- sidebar-page-container -->
    <section class="sidebar-page-container blog-details sec-pad-2">
        <div class="auto-container">
            <div class="clearfix row">

                @php
                    $id = Auth::user()->id;
                    $userData = App\Models\User::find($id);
                @endphp

                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="blog-sidebar">
                        <div class="sidebar-widget post-widget">
                            <div class="widget-title">
                                <h4>User Profile </h4>
                            </div>
                            <div class="post-inner">
                                <div class="post">
                                    <figure class="post-thumb"><a href="blog-details.html">
                                        <img src="{{(!empty($userData->photo)) ? url('upload/user_images/'.$userData->photo): url('upload/no_image.jpg')}}" alt=""></a>
                                    </figure>
                                    <h5><a href="blog-details.html">{{$userData->name}}</a></h5>
                                    <p>{{$userData->email}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="sidebar-widget category-widget">
                             <div class="widget-title">
                                <h4>Category</h4>
                            </div>

                            <x-userProfile.dashboard-sidebar />

                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="blog-details-content">
                        <div class="news-block-one">
                            <div class="inner-box">

                                <div class="lower-content">



                                    <form action="{{route('user.profile.store')}}" method="post" class="default-form" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                         <input type="text" name="name" id="name" value="{{$userData->name}}" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="username">User Name</label>
                                         <input type="text" name="username" id="username" value="{{$userData->username}}" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email </label>
                                            <input type="email" name="email" id="email" value="{{$userData->email}}" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" name="phone"  id="phone" value="{{$userData->phone}}" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                         <input type="text" name="address" id="address" value="{{$userData->address}}" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="formFile" class="form-label">Default file input example</label>
                                            <input class="form-control" id="image" name="photo" type="file" id="formFile">
                                        </div>
                                        <div class="form-group">
                                            <label for="formFile" class="form-label"></label>
                                            <img id="showImage" src="{{(!empty($userData->photo)) ? url('upload/user_images/'.$userData->photo): url('upload/no_image.jpg')}}" alt="" style="width: 100px; heigth:100px"></a>

                                        <div class="form-group message-btn">
                                            <button type="submit" class="theme-btn btn-one">Save Changes </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- sidebar-page-container -->

    <!-- subscribe-section -->
    <section class="subscribe-section bg-color-3">
        <div class="pattern-layer" style="background-image: url({{asset('frontend/assets/images/shape/shape-2.png')}});"></div>
        <div class="auto-container">
            <div class="clearfix row">
                <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                    <div class="text">
                        <span>Subscribe</span>
                        <h2>Sign Up To Our Newsletter To Get The Latest News And Offers.</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-column">
                    <div class="form-inner">
                        <form action="contact.html" method="post" class="subscribe-form">
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Enter your email" required="">
                                <button type="submit">Subscribe Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- subscribe-section end -->


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

</x-front-layout>
