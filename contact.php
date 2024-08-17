<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="description" content="" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Title -->
  <title>Contact</title>

  <!-- Favicon -->
  <link rel="icon" href="./img/core-img/favicon.png" />

  <!-- Stylesheet -->
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <!-- Preloader -->
  <div id="preloader">
    <div class="loader"></div>
  </div>
  <!-- /Preloader -->

  <!-- Top Search Form Area -->
  <div class="top-search-area">
    <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <!-- Close -->
            <button type="button" class="btn close-btn" data-dismiss="modal">
              <i class="ti-close"></i>
            </button>
            <!-- Form -->
            <form action="index.html" method="post">
              <input type="search" name="top-search-bar" class="form-control" placeholder="Search and hit enter..." />
              <button type="submit">Search</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Header Area Start -->
  <header class="header-area">
    <!-- Main Header Start -->
    <div class="main-header-area">
      <div class="classy-nav-container breakpoint-off">
        <div class="container">
          <!-- Classy Menu -->
          <nav class="classy-navbar justify-content-between" id="alimeNav">
            <!-- Logo -->
            <a class="nav-brand" href="./index.html"><img src="./img/core-img/logo.png" alt="" style="max-width: 100px; height: auto; margin-right: 10px" /></a>

            <!-- Navbar Toggler -->
            <div class="classy-navbar-toggler">
              <span class="navbarToggler"><span></span><span></span><span></span></span>
            </div>

            <!-- Menu -->
            <div class="classy-menu">
              <!-- Menu Close Button -->
              <div class="classycloseIcon">
                <div class="cross-wrap">
                  <span class="top"></span><span class="bottom"></span>
                </div>
              </div>
              <!-- Nav Start -->
              <div class="classynav">
                <ul id="nav">
                  <li><a href="./index.html">Home</a></li>
                  <li><a href="./about.php">About</a></li>
                  <li><a href="./gallery.html">Gallery</a></li>
                  <li class="active"><a href="./contact.php">Contact</a></li>
                </ul>
              </div>
              <!-- Nav End -->
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- Header Area End -->

  <!-- Breadcrumb Area Start -->
  <section class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(img/bg-img/38.jpg)">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12">
          <div class="breadcrumb-content text-center">
            <h2 class="page-title">Contact</h2>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item">
                  <a href="index.html"><i class="icon_house_alt"></i> Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Contact
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Breadcrumb Area End -->

  <!-- Contact Area Start -->
  <div class="contact-area section-padding-80-50">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-6">
          <h2 class="contact-title mb-30">Let’s Work <br />Together</h2>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <!-- Contact Info -->
          <div class="contact-info mb-30">
            <p>Email</p>
            <a href="malcolm.lismore@gmail.com">malcolm.lismore@gmail.com</a>
          </div>
          <!-- Contact Info -->
          <div class="contact-info mb-30">
            <p>Call Me</p>
            <a href="#">+6511.188.888</a>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <!-- Contact Info -->
          <div class="contact-info mb-30">
            <p>Visit Me</p>
            <a href="#">60-49 Road 11378 New York</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Contact Area End -->

  <!-- Booking Enquiry Form Start -->
  <div class="booking-enquiry-area section-padding-80">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="contact-title mb-30">Make an Enquiry</h2>
          <form id="booking-enquiry-form" class="booking-enquiry-form mb-50" action="process_enquiry.php" method="POST">
            <div class="row">
              <div class="col-12 col-md-6">
                <input type="text" name="name" class="form-control mb-30" placeholder="Your Name" required />
              </div>
              <div class="col-12 col-md-6">
                <input type="email" name="email" class="form-control mb-30" placeholder="Your Email" required />
              </div>
              <div class="col-12 col-md-6">
                <input type="tel" name="phone" class="form-control mb-30" placeholder="Your Phone" />
              </div>
              <div class="col-12 col-md-6">
                <input type="date" name="event_date" class="form-control mb-30" required />
              </div>
              <div class="col-12">
                <input type="text" name="event_location" class="form-control mb-30" placeholder="Event Location" required />
              </div>
              <div class="col-12">
                <select name="event_type" class="form-control mb-30" required>
                  <option value="">Select Event Type</option>
                  <option value="wedding">Wedding</option>
                  <option value="engagement">Engagement</option>
                  <option value="portrait">Wildlife</option>
                  <option value="portrait">Landscapes</option>
                  <option value="other">Other</option>
                </select>
              </div>
              <div class="col-12">
                <textarea name="message" class="form-control mb-30" rows="5" placeholder="Additional Details"></textarea>
              </div>
              <div class="col-12">
                <button type="submit" class="btn alime-btn btn-2 mt-15">
                  Send Enquiry
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Booking Enquiry Form End -->

  <!-- Map Area Start -->
  <div class="map-area section-padding-0-80">
    <div class="container">
      <div id="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12309.440717226664!2d24.094896788114085!3d56.9484200464499!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46eecfb0e5073ded%3A0x400cfcd68f2fe30!2sRiga%2C+Latvia!5e0!3m2!1sen!2sbd!4v1550835159592" allowfullscreen></iframe>
      </div>
    </div>
  </div>
  <!-- Map Area End -->

  <!-- Follow Area Start -->
  <div class="follow-area clearfix">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section-heading text-center">
            <h2>Follow Instagram</h2>
            <p>@Malcolm_photographer</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Instagram Feed Area -->
    <div class="instragram-feed-area owl-carousel">
      <!-- Single Instagram Item -->
      <div class="single-instagram-item">
        <img src="img/bg-img/11.jpg" alt="" />
        <div class="instagram-hover-content text-center d-flex align-items-center justify-content-center">
          <a href="#">
            <i class="ti-instagram" aria-hidden="true"></i>
            <span>@Malcolm_photographer</span>
          </a>
        </div>
      </div>
      <!-- Single Instagram Item -->
      <div class="single-instagram-item">
        <img src="img/bg-img/12.jpg" alt="" />
        <div class="instagram-hover-content text-center d-flex align-items-center justify-content-center">
          <a href="#">
            <i class="ti-instagram" aria-hidden="true"></i>
            <span>@Malcolm_photographerr</span>
          </a>
        </div>
      </div>
      <!-- Single Instagram Item -->
      <div class="single-instagram-item">
        <img src="img/bg-img/13.jpg" alt="" />
        <div class="instagram-hover-content text-center d-flex align-items-center justify-content-center">
          <a href="#">
            <i class="ti-instagram" aria-hidden="true"></i>
            <span>@Malcolm_photographer</span>
          </a>
        </div>
      </div>
      <!-- Single Instagram Item -->
      <div class="single-instagram-item">
        <img src="img/bg-img/14.jpg" alt="" />
        <div class="instagram-hover-content text-center d-flex align-items-center justify-content-center">
          <a href="#">
            <i class="ti-instagram" aria-hidden="true"></i>
            <span>@Malcolm_photographer</span>
          </a>
        </div>
      </div>
      <!-- Single Instagram Item -->
      <div class="single-instagram-item">
        <img src="img/bg-img/15.jpg" alt="" />
        <div class="instagram-hover-content text-center d-flex align-items-center justify-content-center">
          <a href="#">
            <i class="ti-instagram" aria-hidden="true"></i>
            <span>@Malcolm_photographer</span>
          </a>
        </div>
      </div>
      <!-- Single Instagram Item -->
      <div class="single-instagram-item">
        <img src="img/bg-img/16.jpg" alt="" />
        <div class="instagram-hover-content text-center d-flex align-items-center justify-content-center">
          <a href="#">
            <i class="ti-instagram" aria-hidden="true"></i>
            <span>@Malcolm_photographer</span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <!-- Follow Area End -->

  <!-- **** All JS Files ***** -->
  <!-- jQuery 2.2.4 -->
  <script src="js/jquery.min.js"></script>
  <!-- Popper -->
  <script src="js/popper.min.js"></script>
  <!-- Bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- All Plugins -->
  <script src="js/alime.bundle.js"></script>
  <!-- Active -->
  <script src="js/default-assets/active.js"></script>

  <!-- Custom JS for Form Validation -->
  <script>
    document.getElementById('booking-enquiry-form').addEventListener('submit', function(event) {
      var name = document.querySelector('input[name="name"]').value;
      var email = document.querySelector('input[name="email"]').value;
      var phone = document.querySelector('input[name="phone"]').value;
      var event_date = document.querySelector('input[name="event_date"]').value;
      var event_location = document.querySelector('input[name="event_location"]').value;
      var event_type = document.querySelector('select[name="event_type"]').value;
      var message = document.querySelector('textarea[name="message"]').value;

      // Basic validation
      if (name === '' || email === '' || event_date === '' || event_location === '' || event_type === '') {
        alert('Please fill in all required fields.');
        event.preventDefault();
        return;
      }

      // Email validation
      var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
      if (!emailPattern.test(email)) {
        alert('Please enter a valid email address.');
        event.preventDefault();
        return;
      }

      // Phone validation (optional)
      if (phone !== '' && isNaN(phone)) {
        alert('Please enter a valid phone number.');
        event.preventDefault();
        return;
      }
    });
  </script>
</body>

</html>