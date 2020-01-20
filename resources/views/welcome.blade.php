<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            img {
                border-radius: 50%;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            /* Image slideshow */
            .dot {
                height: 0px;
                width: 0px;
                margin: 0 2px;
                background-color: white;
                border-radius: 50%;
                display: inline-block;
                transition: background-color 0.6s ease;
                }

            .active {
                background-color: #717171;
                }

                /* Fading animation */
            .fade {
                -webkit-animation-name: fade;
                -webkit-animation-duration: 1s;
                animation-name: fade;
                animation-duration: 1s;
                }

            @-webkit-keyframes fade {
                from {opacity: .6} 
                to {opacity: 1}
                }

            @keyframes fade {
                from {opacity: .6} 
                to {opacity: 1}
                }

                /* On smaller screens, decrease text size */
            @media only screen and (max-width: 300px) {
                .text {font-size: 11px}
                }
        </style>
    </head>
    <body>
        
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        

            
            <div class="content">
{{--  --}}
                <div class="slideshow-container">
                    <div class="mySlides fade">
                      <img src="/storage/page_images/pg1.jpg" height="500px" width="900px">
                    </div>
                    
                    <div class="mySlides fade">
                      <img src="/storage/page_images/pg2.jpg" height="500px" width="900px">
                    </div>
                    
                    <div class="mySlides fade">
                      <img src="/storage/page_images/pg3.jpg" height="500px" width="900px">
                    </div>

                    <div class="mySlides fade">
                      <img src="/storage/page_images/pg4.jpg" height="500px" width="900px">
                    </div>

                
                </div>
                    <br>
                    
                    <div style="text-align:center">
                      <span class="dot"></span> 
                      <span class="dot"></span> 
                      <span class="dot"></span> 
                      <span class="dot"></span> 
                    </div>
                    
                    
{{--  --}}
                <div class="title m-b-md">
                    Playground Booking System
                </div>

            

                <div class="links">
                    <a href="{{ route('playgrounds.index') }}">Playgrounds</a>
                    <a href="{{ route('customers.index') }}">Customers</a>
                    <a href="{{ route('bookings.index') }}">Bookings</a>
                </div>
            </div>
        </div>
        <script>
            var slideIndex = 0;
            showSlides();
            
            function showSlides() {
              var i;
              var slides = document.getElementsByClassName("mySlides");
              var dots = document.getElementsByClassName("dot");
              for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
              }
              slideIndex++;
              if (slideIndex > slides.length) {slideIndex = 1}    
              for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
              }
              slides[slideIndex-1].style.display = "block";  
              dots[slideIndex-1].className += " active";
              setTimeout(showSlides, 4000); // Change image every 2 seconds
            }
            </script>
    </body>
</html>
