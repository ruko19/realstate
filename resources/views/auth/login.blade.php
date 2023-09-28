{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block w-full mt-1"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="text-indigo-600 border-gray-300 rounded shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<x-front-layout>

            <!--Page Title-->
            <section class="page-title-two bg-color-1 centred">
                <div class="pattern-layer">
                    <div class="pattern-1" style="background-image: url({{asset('frontend/assets/images/shape/shape-9.png')}});"></div>
                    <div class="pattern-2" style="background-image: url({{asset('frontend/assets/images/shape/shape-10.png')}});"></div>
                </div>
                <div class="auto-container">
                    <div class="clearfix content-box">
                        <h1>Sign In</h1>
                        <ul class="clearfix bread-crumb">
                            <li><a href="index.html">Home</a></li>
                            <li>Sign In</li>
                        </ul>
                    </div>
                </div>
            </section>
            <!--End Page Title-->


            <!-- ragister-section -->
            <section class="ragister-section centred sec-pad">
                <div class="auto-container">
                    <div class="clearfix row">
                        <div class="col-xl-8 col-lg-12 col-md-12 offset-xl-2 big-column">
                            <div class="sec-title">
                                <h5>Sign in</h5>
                                <h2>Sign In With Realshed</h2>
                            </div>
                            <div class="tabs-box">
                                <div class="tab-btn-box">
                                    <ul class="clearfix tab-btns tab-buttons centred">
                                        <li class="tab-btn active-btn" data-tab="#tab-1">Login</li>
                                        <li class="tab-btn" data-tab="#tab-2">Register</li>
                                    </ul>
                                </div>



                                <div class="tabs-content">
                                    <div class="tab active-tab" id="tab-1">
                                        <div class="inner-box">
                                            <h4>Sign in</h4>
                                            <form action="{{route('login')}}" method="post" class="default-form">
                                                @csrf

                                                <div class="form-group">
                                                    <label for="email">Email address</label>
                                                    <input type="email" name="email" id="email" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input type="password" name="password" id="password" required="">
                                                </div>
                                                <div class="form-group message-btn">
                                                    <button type="submit" class="theme-btn btn-one">Sign in</button>
                                                </div>
                                            </form>
                                            <div class="othre-text">
                                                <p>Have not any account? <a href="signup.html">Register Now</a></p>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="tab" id="tab-2">
                                        <div class="inner-box">
                                            <h4>Sign in</h4>
                                            <form action="signin.html" method="post" class="default-form">
                                                <div class="form-group">
                                                    <label>User name</label>
                                                    <input type="text" name="name" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label>Email address</label>
                                                    <input type="email" name="email" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" name="name" required="">
                                                </div>
                                                <div class="form-group message-btn">
                                                    <button type="submit" class="theme-btn btn-one">Sign in</button>
                                                </div>
                                            </form>
                                            <div class="othre-text">
                                                <p>Have not any account? <a href="signup.html">Register Now</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ragister-section end -->


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


</x-front-layout>

