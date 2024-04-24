@extends('layouts.login')
@section('content')
    <!-- ========== signin-section start ========== -->
  <section class="signin-section">
    <div class="container">
      <div class="title mb-30 mt-20 text-center"> <img src="{{ asset('images/logo/logo.png') }}" alt=""/> </div>
      <div class="row g-0 auth-row">
        <div class="col-lg-6">
          <div class="auth-cover-wrapper loginbg">
            <div class="auth-cover">
              <div class="title text-center">
                <h1 class="text-primary mb-10">Welcome Back</h1>
                <p class="text-medium"> Sign in to your existing account to continue </p>
              </div>
              <div class="cover-image"> <img src="{{ asset('images/auth/loginimg.svg') }} " alt="" /> </div>
            </div>
          </div>
        </div>
        <!-- end col -->
        <div class="col-lg-6">
          <div class="signin-wrapper">
            <div class="form-wrapper">
               @if($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      @foreach ($errors->all() as $error)
                      {{ $error }}.
                     @endforeach 
                    </div>
                @endif
              <div class="title mb-30">
                <h2>Sign in</h2>
              </div>
              <form method="POST" action="{{ route('login') }}">
                 @csrf
                <div class="row">
                  <div class="col-12">
                    <div class="input-style-1">
                      <label>Username</label>
                      <input type="text" placeholder="Username" name="email" required/>
                    </div>
                  </div>
                  <!-- end col -->
                  <div class="col-12">
                    <div class="input-style-1">
                      <label>Password</label>
                      <input type="password" placeholder="Password" id="password" name="password" required/>
                    </div>
                  </div>
                  <!-- end col -->
                  <div class="col-xxl-6 col-lg-12 col-md-6">
                    <div class=" text-start text-md-end text-lg-start text-xxl-end mb-30"> <a href="forgot_password.html" class="hover-underline">Forgot Password?</a> </div>
                  </div>
                  <!-- end col -->
                  <div class="col-12">
                    <div class="button-group d-flex justify-content-center flex-wrap">
                      <button class="main-btn primary-btn btn-hover w-100 text-center btnlink" type='submit'>Sign in</button>
                            
                    </div>
                  </div>
                </div>
                <!-- end row -->
              </form>
            </div>
          </div>
        </div>
        <!-- end col --> 
      </div>
      <!-- end row --> 
    </div>
  </section>
  <!-- ========== signin-section end ========== --> 
@endsection