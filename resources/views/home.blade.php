@extends('layouts.app')

@section('content')
<div class="container">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
<div class="row flex-lg-nowrap">
  <div class="col-12 col-lg-auto mb-3" style="width: 200px;">
    <div class="card p-3">
      <div class="e-navlist e-navlist--active-bg">
        <ul class="nav">
          <li class="nav-item"><a class="nav-link px-2 active" href="./overview.html"><i class="fa fa-fw fa-bar-chart mr-1"></i><span>History Log</span></a></li>
          <li class="nav-item"><a class="nav-link px-2" href="./users.html"><i class="fa fa-fw fa-th mr-1"></i><span>Calendar</span></a></li>
          <li class="nav-item"><a class="nav-link px-2" href="./settings.html"><i class="fa fa-fw fa-cog mr-1"></i><span>Account</span></a></li>
        </ul>
      </div>
    </div>
  </div>

  <div class="col">
    <div class="row">
      <div class="col mb-3">
        <div class="card">
          <div class="card-body">
            <div class="e-profile">
              <div class="row">
                <div class="col-12 col-sm-auto mb-3">
                  <div class="mx-auto" style="width: 150 px;">
                
                    <div class="d-flex justify-content-center align-items-center rounded" >
                    <p><input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;"></p>
                    <p><label for="file" style="cursor: pointer;">Click <u>Here </u> <br> to Upload <br> your Pic <br>  👋( ͡° ͜ʖ ͡°) </label></p>      
                    <p><img id="output" width="120" height="100" class="rounded-circle" /></p>

                                <script>
                                    var loadFile = function(event) {
	                                var image = document.getElementById('output');
	                                image.src = URL.createObjectURL(event.target.files[0]);
                                    };
                                </script>

                    </div>

                    
                  </div>
                </div>
                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                  <div class="text-center text-sm-left mb-2 mb-sm-0">
                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{ Auth::user()->name }}</h4>
                    
                    <div class="text-muted"><small>Welcome to your Home Page!</small></div>
                    <div class="mt-2">


                      <form action="upload.php" method="post" enctype="multipart/form-data">
                      <i class="fa fa-fw fa-camera"></i>
                        <span>Upload Your Photo!</span>

                        </form>

                    </div>
                  </div>
                  <div class="text-center text-sm-right">
                    <span class="badge badge-secondary">EnrichedFoods User</span>
                    <div class="text-muted"><small>Become a Volunteer!</small></div>
                  </div>
                </div>
              </div>
              <ul class="nav nav-tabs">
                <li class="nav-item"><a href="" class="active nav-link">Account</a></li>
              </ul>
              <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token ?? '' }}">

              <div class="tab-content pt-3">
                <div class="tab-pane active">
                  <form class="form" novalidate="">
                    <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Email</label>
                              <input class="form-control" type="text" placeholder="{{ Auth::user()->email }}">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Phone</label>
                              <input class="form-control" type="number" placeholder="{{ Auth::user()->phone }}">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token ?? '' }}">
                    <div class="row">
                      <div class="col-12 col-sm-6 mb-3">
                        <div class="mb-2"><b>Change Password</b></div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label for="password"><span>Current </span>{{ __('Password') }}</label>
                              <input id="password" class="form-control @error('password') is-invalid @enderror" name="password" type="password" placeholder="•••••••">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label for="password"><span>New</span>{{ __('Password') }}</label>
                              <input id="password" class="form-control" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="•••••••">
                              @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label for="password-confirm" class="d-none d-xl-inline"> {{ __('Confirm Password') }}</label>
                              <input id="password-confirm" class="form-control" type="password" placeholder="••••••" name="password_confirmation"></div>
                          </div>
                        </div>
                      </div>

                      <form id="userpreferences" method="POST" >

                      <div class="col-12 col-sm-5 offset-sm-1 mb-3">
                        <div class="row">
                          <div class="col">
                            <label for="communication">Communication Preference(s)</label>
                            <div class="custom-controls-stacked px-2">
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="yes2email" checked="" value="byEmail">
                                <label class="custom-control-label" for="yes2email"> Email</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="yes2text" checked="" value="byText">
                                <label class="custom-control-label" for="yes2text"> Text</label>
                              </div>
                              <label> </label>
                            </div>
                            <label for="availability">Weekend Availability</label>
                            <div class="custom-controls-stacked px-2">

                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="yes2Saturday" checked="" value="onSaturdays">
                                <label class="custom-control-label" for="yes2Saturday"> Saturday</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="yes2Sunday" checked="" value="onSundays">
                                <label class="custom-control-label" for="yes2Sunday"> Sunday</label>
                              </div>
                              <label> </label>
                            </div>
                            <label for="volunteer">Volunteer for the:</label>
                            <div class="custom-controls-stacked px-2">
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="yes2Events" checked="" value="forEvents">
                                <label class="custom-control-label" for="yes2Events"> Events(front-end)</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="yes2Organization" checked="" value="forOrganization">
                                <label class="custom-control-label" for="yes2Organization"> Organization(back-end)</label>
                              </div>
                              <label> </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">

                      <div class="col d-flex justify-content-end">
                      
                        <button class="btn btn-primary" type="submit" value="Register" 
                       
                       
                href="{{ route('password.update') }}"
                onclick="event.preventDefault(); alert('Changes saved. Thank you!')"
               > Save Changes
               


               </button>
                    
                      </div>
                    </div>
                  </form>
                  </form>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-3 mb-3">
        <div class="card mb-3">
          <div class="card-body">
            <div class="px-xl-3">
              <form action="http://127.0.0.1:9000/logout">
               <input type="submit" value="Log Out" class="btn btn-block btn-secondary" 
               
                 href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">

                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                 </form>
              </form>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h6 class="card-title font-weight-bold">Contact Us</h6>
            <p class="card-text">Have Questions?</p>
             <form action="https://enrichedfoods.org">
                <input type="submit" value="Click Here" class="btn btn-primary">
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection




