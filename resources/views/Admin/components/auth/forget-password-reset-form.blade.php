<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-11 col-md-11">

      <div class="row no-gutters position-relative log_rads">
        <div class="col-lg-6 col-md-5 bg-cover" style="background:#1f2431 url({{ asset('frontend/assets/img/log.png') }}) no-repeat;">
          <div class="lui_9okt6">
            <div class="_loh_revu97">
              <div id="reviews-login">

                <!-- Single Reviews -->
                <div class="_loh_r96">
                  <div class="_bloi_quote"><i class="fa fa-quote-left"></i></div>
                  <div class="_loh_r92">
                    <h4>Good Services</h4>
                  </div>
                  <div class="_loh_r93">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>  
                  </div>  
                  <div class="_loh_foot_r93">
                    <h4>Shilpa D. Setty</h4>
                    <span>Team Leader</span>
                  </div>                        
                </div>

                <!-- Single Reviews -->
                <div class="_loh_r96">
                  <div class="_bloi_quote"><i class="fa fa-quote-left"></i></div>
                  <div class="_loh_r92">
                    <h4>Good Services</h4>
                  </div>
                  <div class="_loh_r93">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>  
                  </div>  
                  <div class="_loh_foot_r93">
                    <h4>Adam Wilsom</h4>
                    <span>Mak Founder</span>
                  </div>                        
                </div>

                <!-- Single Reviews -->
                <div class="_loh_r96">
                  <div class="_bloi_quote"><i class="fa fa-quote-left"></i></div>
                  <div class="_loh_r92">
                    <h4>Customer Support</h4>
                  </div>
                  <div class="_loh_r93">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>  
                  </div>  
                  <div class="_loh_foot_r93">
                    <h4>Kunal M. Wilsom</h4>
                    <span>CEO & Founder</span>
                  </div>                        
                </div>

                <!-- Single Reviews -->
                <div class="_loh_r96">
                  <div class="_bloi_quote"><i class="fa fa-quote-left"></i></div>
                  <div class="_loh_r92">
                    <h4>Ultimate Services</h4>
                  </div>
                  <div class="_loh_r93">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>  
                  </div>  
                  <div class="_loh_foot_r93">
                    <h4>Mark Jugermark</h4>
                    <span>MCL Founder</span>
                  </div>                        
                </div>
                <!-- Single Reviews -->
                <div class="_loh_r96">
                  <div class="_bloi_quote"><i class="fa fa-quote-left"></i></div>
                  <div class="_loh_r92">
                    <h4>Item Support</h4>
                  </div>
                  <div class="_loh_r93">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>  
                  </div>  
                  <div class="_loh_foot_r93">
                    <h4>Kirti Washinton</h4>
                    <span>Web Designer</span>
                  </div>                        
                </div>

              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6 col-md-7 position-static p-4">
          <div class="log_wraps">
            <a href="index.html" class="log-logo_head"><img src="{{asset('frontend/assets/img/logo.png')}}" class="img-fluid" width="80" alt="" /></a>
            <div class="log__heads">
              <h4 class="mt-0 logs_title">Reset Your <span class="theme-cl">Password</span></h4>
            </div>

            @if(session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger">
              {{ session('error') }}
            </div>
            @endif

            <form method="POST" action="{{ route('admin.reset.password.post') }}">
              @csrf
              <input type="hidden" name="token" value="{{ $token }}">

              <div class="form-group">
                <label>Email Address: <span class="text-danger">*</span></label>
                <input type="email" class="form-control" name="email" placeholder="Enter your email">
                @error('email') 
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <label>New Password: <span class="text-danger">*</span></label>
                <input type="password" class="form-control" name="password" placeholder="Enter your password">
                @error('password') 
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <label>Confirm Password: <span class="text-danger">*</span></label>
                <input type="password" class="form-control" name="password_confirmation" placeholder="Enter confirm password">
                @error('password_confirmation') 
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <button type="submit" class="w-100" style="display: inline-block; text-align: center; padding: 20px; background-color: #DA0B4E; color: #FFFFFF; border: none; border-radius: 4px; text-decoration: none;">Reset Password</button>
              </div>
            </form>

          </div>
        </div>
      </div>

    </div>
  </div>
</div>