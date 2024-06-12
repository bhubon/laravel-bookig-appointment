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
              <p>Enter your email and we'll send you instructions to reset your password</p>
            </div>

            @if (Session::has('message'))
            <div class="alert alert-success" role="alert">
              {{ Session::get('message') }}
            </div>
            @endif

            <form method="POST" action="{{ route('admin.forget.password.post') }}">
              @csrf

              <div class="form-group">
                <label>Email Address: <span class="text-danger">*</span></label>
                <input type="email" class="form-control" name="email" placeholder="Enter your email">
                @error('email') 
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <button type="submit" class="w-100" style="display: inline-block; text-align: center; padding: 20px; background-color: #DA0B4E; color: #FFFFFF; border: none; border-radius: 4px; text-decoration: none;">Send Reset Link</button>
              </div>
            </form>

            <div class="form-group text-center mb-0 mt-3">
              Back to Login? <a href="{{ route('admin.login') }}" class="theme-cl">LogIn</a>
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>
</div>