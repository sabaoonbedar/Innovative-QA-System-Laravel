<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>FypPoint</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <!-- Favicons -->
  <link href="/assets/img/favicon.png" rel="icon">
  <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: FypPoint - v2.2.2
  ======================================================== -->


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>






</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

     <a href="{{route('home')}}" style="position: absolute; top:1.5rem; left:8%; font-size:18px">Back</a>

      {{-- <h1 class="logo mr-auto"><a href="{{route('home')}}">FypPoint</a></h1> --}}
      <!-- Uncomment below if you prefer to use an image logo -->
     <a href="{{route('home')}}" class="logo mr-auto"><img src="/assets/img/favicon.png" alt="" class="img-fluid"> FypPoint</a>

     <div class="col-sm-7 ">
        <input class="form-control" id="myInput" type="text" placeholder="Search...">
    </div>
{{--
     <select id="catagory" name="catagory" class="form-select form-select-sm" aria-label=".form-select-sm example" style="height:36px;">
        <option selected disabled>Select Catagory</option>
        <option value="Java">Java</option>
        <option value="Python">Python</option>
        <option value="SQL">SQL</option>
        <option value="Project Errors">Project Errors</option>
        <option value="JQuery">JQuery</option>
        <option value="Css">Css</option>
        <option value="Framworks">Framworks</option>
        <option value="General Languages">General Languages</option>
        <option value="Other">Other</option>


      </select> --}}

{{-- <script>


$( document ).ready(function() {

    $("#catagory").change(function () {
    var value = $(this).val();
    $.ajax({
        type: "GET",
        url: "/postcatagory/"+value,

// dataType: 'json',

        async: true,
        // data: {
        //     catagory: value // as you are getting in php $_POST['action1']
        // },
        success: function (msg) {
       window.location.href = "{{route('home')}}";

           console.log(msg)
        }
    });
});


});


    </script> --}}



<script>
    $(document).ready(function(){
      $("#catagory").on("change", function() {
        var value = $(this).val().toLowerCase();
        $("#myList li").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
    </script>

{{-- <script>
    $(document).ready(function(){
      $("#catagory").on("change", function() {
$('.catagorystyle').css({"font-size": "100%","color":'rgba(52, 73, 94, 1)'});
      });
    });
    </script> --}}



      <nav class="nav-menu d-none d-lg-block">
        <ul>
          {{-- <li class="active"><a href="">SearchQuestions</a></li> --}}








          {{-- <li><a href="#about">About</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#portfolio">Portfolio</a></li>
          <li><a href="#team">Team</a></li>
          <li><a href="#pricing">Pricing</a></li>
          <li class="drop-down"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="drop-down"><a href="#">Deep Drop Down</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          <li><a href="#contact">Contact</a></li> --}}

        </ul>
      </nav><!-- .nav-menu -->

      <a href="{{ route('posts.create') }}" class="get-started-btn scrollto">Ask Question</a>




        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
        </a>

        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>




    </div>
  </header><!-- End Header -->



  <main id="main">



    <!-- ======= Frequently Asked Questions Section ======= -->


    <section id="faq" class="faq section-bg">

        @if(session()->get('message'))
        <div class="alert alert-success" style="text-align:center">
          {{ session()->get('message') }}
        </div>
      @endif






        <div class="col-sm-12">


      <div data-aos="fade-up">
        <div class="section-title">



          <h2> Students Guide </h2>

          <p>Collection of different informative sites which will help the students to learn different important information </p>
        </div>

        <div class="faq-list">

          <ul id="myList" >



            {{-- <li data-aos="fade-up">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" class="collapse" href="#faq-list-1">{{$post->title}} ? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-parent=".faq-list">
                <p>
                    {{$post->body}}
                </p>
              </div>
            </li> --}}



            <li data-aos="fade-up" data-aos-delay="100">



              <i class="bx bx-info-circle icon-help"></i>

    <a  href="https://www.upgrad.com/blog/software-development-project-ideas-topics-for-beginners/" class="collapsed" style="font-size:18px" target="_blank">
        20 Exciting Software Development Project Ideas & Topics for Beginners [2021]
    </a>



            </li>


            <li data-aos="fade-up" data-aos-delay="100">



                <i class="bx bx-info-circle icon-help"></i>

      <a  href="https://www.theengineeringprojects.com/2018/12/final-year-project-the-ultimate-guide-for-beginners.html" class="collapsed" style="font-size:18px" target="_blank">
        Final year project: the ultimate guide for beginners
      </a>



              </li>




              <li data-aos="fade-up" data-aos-delay="100">



                <i class="bx bx-info-circle icon-help"></i>

      <a  href="https://www.w3schools.com/html/" class="collapsed" style="font-size:18px" target="_blank">
        HTML Tutorials
      </a>



              </li>

              <li data-aos="fade-up" data-aos-delay="100">



                <i class="bx bx-info-circle icon-help"></i>

      <a  href="https://www.w3schools.com/css/default.asp" class="collapsed" style="font-size:18px" target="_blank">
        CSS Tutorials
      </a>



              </li>



              <li data-aos="fade-up" data-aos-delay="100">



                <i class="bx bx-info-circle icon-help"></i>

      <a  href="https://www.w3schools.com/js/default.asp" class="collapsed" style="font-size:18px" target="_blank">
        JavaScript Tutorials
      </a>



              </li>



              <li data-aos="fade-up" data-aos-delay="100">



                <i class="bx bx-info-circle icon-help"></i>

      <a  href="https://www.upgrad.com/blog/java-project-ideas-topics-for-beginners/" class="collapsed" style="font-size:18px" target="_blank">
        17 Interesting Java Project Ideas & Topics For Beginners [2021]
      </a>



              </li>




              <li data-aos="fade-up" data-aos-delay="100">



                <i class="bx bx-info-circle icon-help"></i>

      <a  href="https://www.upgrad.com/blog/php-project-ideas-topics-for-beginners/" class="collapsed" style="font-size:18px" target="_blank">
        15 Exciting PHP Project Ideas & Topics For Beginners [2021]
      </a>



              </li>


              <li data-aos="fade-up" data-aos-delay="100">



                <i class="bx bx-info-circle icon-help"></i>

      <a  href="https://www.dataquest.io/blog/python-projects-for-beginners/" class="collapsed" style="font-size:18px" target="_blank">
        45 Fun (and Unique) Python Project Ideas for Easy Learning
      </a>



              </li>



              <li data-aos="fade-up" data-aos-delay="100">



                <i class="bx bx-info-circle icon-help"></i>

      <a  href="https://www.topuniversities.com/blog/4-steps-successful-student-project" class="collapsed" style="font-size:18px" target="_blank">
        Four Steps For A Successful Student Project
      </a>



              </li>


              <li data-aos="fade-up" data-aos-delay="100">



                <i class="bx bx-info-circle icon-help"></i>

      <a  href="https://www.upgrad.com/blog/top-artificial-intelligence-project-ideas-topics-for-beginners/" class="collapsed" style="font-size:18px" target="_blank">
        Top 16 Artificial Intelligence Project Ideas & Topics for Beginners [2021]
      </a>



              </li>



              <li data-aos="fade-up" data-aos-delay="100">



                <i class="bx bx-info-circle icon-help"></i>

      <a  href="https://www.upgrad.com/blog/computer-science-project-ideas-topics-beginners/" class="collapsed" style="font-size:18px" target="_blank">
        12 Interesting Computer Science Project Ideas & Topics For Beginners [2021]
      </a>



              </li>



              <li data-aos="fade-up" data-aos-delay="100">



                <i class="bx bx-info-circle icon-help"></i>

      <a  href="https://sites.google.com/a/ciitlahore.edu.pk/cs-fyp/home/ideas-for-students" class="collapsed" style="font-size:18px" target="_blank">
        Ideas for Students
      </a>



              </li>




              <li data-aos="fade-up" data-aos-delay="100">



                <i class="bx bx-info-circle icon-help"></i>

      <a  href="https://www.quora.com/What-are-some-cool-mini-project-ideas-for-CS-students" class="collapsed" style="font-size:18px" target="_blank">
        What are some cool mini project ideas for CS students?
      </a>



              </li>




              <li data-aos="fade-up" data-aos-delay="100">



                <i class="bx bx-info-circle icon-help"></i>

      <a  href="https://www.bestmastersdegrees.com/lists/five-great-computer-science-websites-for-students" class="collapsed" style="font-size:18px" target="_blank">
        Five Great Computer Science Websites for Students
      </a>



              </li>



              <li data-aos="fade-up" data-aos-delay="100">



                <i class="bx bx-info-circle icon-help"></i>

      <a  href="https://www.coursera.org/courses?query=java&page=1 " class="collapsed" style="font-size:18px" target="_blank">
        Java Courses
      </a>



              </li>


              <li data-aos="fade-up" data-aos-delay="100">



                <i class="bx bx-info-circle icon-help"></i>

      <a  href="https://boolean.co.uk/?utm_source=google&utm_medium=cpc&utm_content=course&gclid=EAIaIQobChMIp4CiidCv7wIVTAIGAB0Dlw2LEAAYAiAAEgI3TPD_BwE" class="collapsed" style="font-size:18px" target="_blank">
        Take our course, become a software engineer, and find a job.
      </a>




              </li>
          </ul>

        </div>

      </div>
      <script>
        $(document).ready(function(){
          $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myList li").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
        </script>
    </section><!-- End Frequently Asked Questions Section -->

    {{-- <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div>
          <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Location:</h4>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>info@example.com</p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Call:</h4>
                <p>+1 5589 55488 55s</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main --> --}}

  <!-- ======= Footer ======= -->
  <footer id="footer" >

    <div class="footer-top">
      <div class="container">
        <div class="row">

          {{-- <div class="col-lg-3 col-md-6 footer-contact">
            <h3>FypPoint</h3>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div> --}}

    <div class="container d-md-flex py-4">

      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          &copy; Copyright <strong><span>FypPoint</span></strong>. All Rights Reserved
        </div>
        <div class="credits">

          Designed by FypPoint</a>
        </div>
      </div>
      {{-- <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div> --}}
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="/assets/vendor/jquery/jquery.min.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>
  <script src="/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="/assets/vendor/counterup/counterup.min.js"></script>
  <script src="/assets/vendor/venobox/venobox.min.js"></script>
  <script src="/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>

</body>

</html>
