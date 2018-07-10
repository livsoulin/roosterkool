<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
   <link href="{{asset('css/libs.css')}}" rel="stylesheet">
    
    @yield('styles')

</head>

<body id="admin-page">

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            
            <a class="navbar-brand" href="/">Home</a>
        </div>
         <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    
                    <li>
                        <a href="/admin/booking"><i class="glyphicon glyphicon-home"></i> Dashboard</a>
                    </li>

                    <li>
                        <a href="{{route('user.index')}}"><i class="glyphicon glyphicon-user"></i>  USER</a>
                        <ul class="nav nav-second-level">
                            
                            <li>
                                <a href="{{route('user.create')}}"><i class="glyphicon glyphicon-plus"></i>  Create-User</a>
                            </li>

                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                    <li>
                        <a href="{{route('video.index')}}"><i class="glyphicon glyphicon-film"></i>  VIDEOS</a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('video.create')}}"><i class="glyphicon glyphicon-plus"></i>  Create-Video</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="{{route('album.index')}}"><i class="glyphicon glyphicon-film"></i>  Albums</a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('album.create')}}"><i class="glyphicon glyphicon-plus"></i>  Create-Album</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                    <li>
                        <a href="{{route('category.index')}}"><i class="glyphicon glyphicon-th-large"></i>  CATEGORY</a>
                        <ul class="nav nav-second-level"></ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="{{route('logo.index')}}"><i class="glyphicon glyphicon-picture"></i>   LOGO</a>
                        <ul class="nav nav-second-level"></ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="{{route('covertop.index')}}"><i class="glyphicon glyphicon-picture"></i>  CoverTop</a>
                        <ul class="nav nav-second-level"></ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="{{route('coverbottom.index')}}"><i class="glyphicon glyphicon-picture"></i>   CoverBottom</a>
                        <ul class="nav nav-second-level"></ul>
                        <!-- /.nav-second-level -->
                    </li>
                     <li>
                        <a href="{{route('slider.index')}}"><i class="glyphicon glyphicon-th"></i>   Slider</a>
                        <ul class="nav nav-second-level"></ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="{{route('magazine.index')}}"><i class="glyphicon glyphicon-film"></i>  Magazine</a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('magazine.create')}}"><i class="glyphicon glyphicon-plus"></i>  Create-Magazine</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>
</div>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
<!--                <h1 class="page-header"></h1>-->

                @yield('content')
                
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="{{asset('js/libs.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

@yield('scripts')
@yield('footer')





</body>

</html>
