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
                <h4>Sign Up - Created New Account</h4>
              </div>
              <form method="POST" action="{{ route('register') }}">
                 @csrf
                <div class="row">
                  <div class="col-12">
                    <div class="input-style-1">
                      <label>Full name</label>
                      <input type="text" placeholder="Full name" name="name" required/>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="input-style-1">
                      <label>Email</label>
                      <input type="email" placeholder="Email" id="email" name="email" required/>
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
                  <div class="col-12">
                    <div class="button-group d-flex justify-content-center flex-wrap">
                      <button class="main-btn primary-btn btn-hover w-100 text-center btnlink" type='submit'>Sign Up</button>
                            
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