<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Starlight Responsive Bootstrap 4 Admin Template</title>

    <!-- vendor css -->
    <link href="{{ asset('assets/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('assets') }}/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="{{ asset('assets/lib/highlightjs/github.css') }}" rel="stylesheet">
    <link href="{{ asset('assets') }}/lib/rickshaw/rickshaw.min.css" rel="stylesheet">
    <link href="{{asset('assets/css/toastify.min.css')}}" rel="stylesheet" />

    <!-- summernote css -->
    <link href="{{ asset('assets/lib/medium-editor/medium-editor.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/medium-editor/default.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/summernote/summernote-bs4.css') }}" rel="stylesheet">

  <!-- Datatable css -->
  <link href="{{ asset('assets/lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/lib/select2/css/select2.min.css') }}" rel="stylesheet">
   <link href="{{ asset('assets') }}/lib/spectrum/spectrum.css" rel="stylesheet">

    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/starlight.css">
    <script src="{{asset('assets/js/toastify-js.js')}}"></script>
    <script src="{{asset('assets/js/axios.min.js')}}"></script>
    <script src="{{asset('assets/js/config.js')}}"></script>
    <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</head>

<body>
    
    <div id="loader" class="d-none"></div>

    <!-- ########## START: LEFT PANEL ########## -->
    <div class="sl-logo"><a href=""><i class="icon ion-android-star-outline"></i> starlight</a></div>
    <div class="sl-sideleft">
        <div class="input-group input-group-search">
            <input type="search" name="search" class="form-control" placeholder="Search">
            <span class="input-group-btn">
                <button class="btn"><i class="fa fa-search"></i></button>
            </span><!-- input-group-btn -->
        </div><!-- input-group -->

        <label class="sidebar-label"></label>
        <div class="sl-sideleft-menu">
            <a href="{{ route('admin.dashboard') }}" class="sl-menu-link active">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                    <span class="menu-item-label">Dashboard</span>
                </div>
            </a>


            <a href="{{url("/admin/servicePage")}}" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="icon ion-ios-person-outline tx-22"></i>
                    <span class="menu-item-label">Service List</span>
                </div>
            </a>

            <a href="{{url("/admin/schedulePage")}}" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="icon ion-ios-person-outline tx-22"></i>
                    <span class="menu-item-label">Schedule List</span>
                </div>
            </a>

            <a href="{{ route('staff.all') }}" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="icon ion-ios-person-outline tx-22"></i>
                    <span class="menu-item-label">Staff</span>
                </div>
            </a>

            <a href="{{ route('user.all') }}" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="icon ion-ios-person-outline tx-22"></i>
                    <span class="menu-item-label">Users</span>
                </div>
            </a>

            <a href="{{url('/admin/appointmentPage')}}" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="icon ion-ios-person-outline tx-22"></i>
                    <span class="menu-item-label">Appointment List</span>
                </div>
            </a>

            <a href="{{route('admin.logout')}}" class="sl-menu-link">
              <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-power tx-22"></i>
                <span class="menu-item-label">Logout</span>
              </div>
            </a>

        </div>

        <br>
    </div>
    <!-- ########## END: LEFT PANEL ########## -->