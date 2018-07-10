<!DOCTYPE html>

<html lang="en">

    <head>
        <title>RooSterKooL</title>
        <meta name="viewpoint" content="width=device-width, initial-scale=1.0">

        <!--css style and script-->
        <!--<link href="assets/css/bootstrap.min.css" rel="stylesheet"/>-->
        
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet"/>
        
        <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/font-awesome.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src ="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src ="{{asset('assets/js/bootstrap.js')}}"></script>
        
      

    </head>
    <body>
        
        <!--Heder-->

        <div class ="navbar navbar-inverse ">


            <div class = "container">

                <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--image top-->
                <div class="box">
                   
                    <a><img src="{{$covertop ? $covertop->photo->file : '/images/imgplaceholder.jpg'}}" width="1000px" class="img-responsive"></a>
                    
                </div>
                <!--logo sign-->
                <div class="navbar-brand">
                    <div class="row">
                        <div class="col-md-3 " >
                            <a><img src="{{$logo ? $logo->photo->file : '/images/imgplaceholder.jpg'}}" width="100px"></a>
                        </div>
                    </div>
                </div>


                <div class="collapse navbar-collapse navHeaderCollapse">
                    <ul class="nav navbar-nav navbar-right">

                        <li class="active"><a href="{{route('/')}}">Home</a></li>
                        <li class="dropdown">
                            <button class="dropbtn">Photo</button>
                            <div class="dropdown-content">
                                @if($categories)
                                @foreach($categories as $category) 
                                <a href="{{route('photo',$category->id)}}">{{$category->name}}</a>
                                @endforeach
                                @endif
                            </div>
                        </li>
                        <li class="active"><a href="{{route('/video')}}">Video</a></li>              
                        <li class="active"><a href="{{route('/magazine')}}">Magazine</a></li> 
                        
                        <li class="active"><a href="{{route('/contact')}}">Contact Us</a></li>
                        <li class="active"><a href="{{route('/reserve')}}">Booking</a></li>
                        
                        <li class="active"><a href="#"> Login </a></li>
                        <li class="active"><a href="#">  </a></li>
                        <li class="active"><a href="#">  </a></li>
                        <li class="active"><a href="#">  </a></li>
                    </ul>
                </div>
                <!--bottom image-->
                <div class="box">
                    <a><img src="{{$coverbottom ? $coverbottom->photo->file : '/images/imgplaceholder.jpg'}}" width="1000px" class="img-responsive"</a>
                </div>
            </div>

        </div>

        <!--content-->

        @yield('content')

        <div class="navbar">
            <div class="navbar-default" style="background: #1a1a1a">
                <div class="container">
                    <div class="row">

                        <div class="col-md-2">
                            <h4><a href="#">About Us</a></h4>
                            <p><a href="#">RooSterKooL Magazine</a></p>
                        </div>
                        <div class="col-md-2">
                            <h4><a href="{{route('/contact')}}">Contact US</a></h4>
                            <p><a href="{{route('/contact')}}">Contact</a></p>
                        </div>
                        <div class="col-md-4">
                            <h4><a href="#">Find Us</a></h4>
                            <li><a href="https://www.facebook.com/RooSterKOOL.Magazine/?fref=ts"><i class="fa fa-facebook-f" style="font-size:24px"></i></a></li>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="navbar">
            <div class="nav navbar-inverse">

                <p class="text-center">Copyright &copy;2014 ROOSTERKOOL Magazine. All Rights Reserved.</p>


            </div>
        </div>

        @yield('scripts')
        
    </body>
</html>