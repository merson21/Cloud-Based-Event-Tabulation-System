@extends('layouts.homenav')
@section('content')

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-end align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade" data-ride="carousel">

        @foreach ($homepages as $key=>$homepage)
            @if ($key == 0)

                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInDown">{{$homepage->title}}</span></h2>
                    <p class="animate__animated fanimate__adeInUp">

                        @if(!(empty($homepage->content))) {!! $homepage->content !!} @endif

                    </p>
                    </div>
                </div>

            @else

                <div class="carousel-item">
                    <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInDown">{{$homepage->title}}</h2>
                    <p class="animate__animated animate__fadeInUp">
                        @if(!(empty($homepage->content))) {{$homepage->content}} @endif
                    </p>
                    </div>
                </div>

            @endif
        @endforeach


      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>

    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
      <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
      </defs>
      <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
      </g>
      <g class="wave2">
        <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
      </g>
      <g class="wave3">
        <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
      </g>
    </svg>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>About</h2>
          <p>The Project</p>
        </div>

        <div class="row content" data-aos="fade-up">
          <div class="col-lg-6">
              @if(!(empty($aboutpage->content))) {!! $aboutpage->content !!} @endif
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <a href="#" class="btn-learn-more">Learn More</a>
          </div>
        </div>
      </div>

    </section><!-- End About Section -->

    <!-- ======= Goals Features Section ======= -->
    <section id="features" class="services">
      <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>FEATURES</h2>
          <p>WHAT WE ARE WORKING ON</p>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="icon-box" data-aos="zoom-in-left">
              <div class="icon"><i class="fas fa-user-lock"" style="color: #1422a1;"></i></div>
              <h4 class="title"><a href="">SECURITY</a></h4>
              <p class="description ">The quality or state of being secure, free from danger, freedom from fear or anxiety.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt-5 mt-md-0">
            <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="100">
              <div class="icon"><i class="fas fa-copy" style="color: #be9d0a;"></i></div>
              <h4 class="title"><a href="">ACCURACY</a></h4>
              <p class="description">The quality or state of being correct or precise.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-5 mt-lg-0 ">
            <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="200">
              <div class="icon"><i class="las la-file-alt" style="color: #3aafa9;"></i></div>
              <h4 class="title"><a href="">RELIABILITY</a></h4>
              <p class="description">The consistently good in quality or performance and able to be trusted.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt-5">
            <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="300">
              <div class="icon"><i class="fas fa-users-cog" style="color:#33a724;"></i></div>
              <h4 class="title"><a href="">USABILITY</a></h4>
              <p class="description">To provide a condition for its users to perform the tasks safely, effectively, and efficiently.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt-5">
            <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="400">
              <div class="icon"><i class="fas fa-desktop" style="color: #94b115;"></i></div>
              <h4 class="title"><a href="">FLEXIBILITY</a></h4>
              <p class="description">The ability to be easily modified and willingness to change or compromise. </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt-5">
            <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="500">
              <div class="icon"><i class="fas fa-chalkboard-teacher" style="color: #4680ff;"></i></div>
              <h4 class="title"><a href="">USER-FRIENDLY</a></h4>
              <p class="description">Easy to learn, use, understand, or deal with user.</p>
            </div>
          </div>
        </div>

        </div>
    </section><!-- End Services Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="testimonials ">
      <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>OFFERED</h2>
          <p>OUR SERVICES</p>
        </div>

        <div class="owl-carousel testimonials-carousel" data-aos="fade-up">
            @foreach ($services as $service)
                <div class="testimonial-item">
                    <h3>{{ $service->title }}</h3>
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        {{ $service->content }}
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                </div>
            @endforeach
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>PRICING</h2>
          <p>OUR COMPETING PRICES</p>
        </div>

        <div class="row d-flex justify-content-center">

            @foreach ($prices as $price)
                <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
                    <div class="box featured" data-aos="zoom-in" data-aos-delay="100">
                    <h3>{{ $price->title }}</h3>

                        {!! $price->content !!}
                    {{-- <h4><sup>P</sup>19<span> / month</span></h4>
                    <ul>
                        <li>Aida dere</li>
                        <li>Nec feugiat nisl</li>
                        <li>Nulla at volutpat dola</li>
                        <li>Pharetra massa</li>
                        <li class="na">Massa ultricies mi</li>
                    </ul> --}}
                    <div class="btn-wrap">
                        <a href="#" class="btn-buy">Buy Now</a>
                    </div>
                    </div>
                </div>
            @endforeach




        </div>

      </div>
    </section><!-- End Pricing Section -->

    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq">
      <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>F.A.Q</h2>
          <p>Frequently Asked Questions</p>
        </div>

        <ul class="faq-list">
            @foreach ($faqs as $key=>$faq)
                @if ($key == 0)
                    <li data-aos="fade-up" data-aos-delay="{{$key}}00">
                        <a data-toggle="collapse" class="" href="#faq{{$key}}">{{$faq->question}}<i class="icofont-simple-up"></i></a>
                        <div id="faq{{$key}}" class="collapse show" data-parent=".faq-list">
                        <p>
                            {{ $faq->answer }}
                        </p>
                        </div>
                    </li>
                @else
                    <li data-aos="fade-up" data-aos-delay="{{$key}}00">
                        <a data-toggle="collapse" href="#faq{{$key}}" class="collapsed">{{$faq->question}}<i class="icofont-simple-up"></i></a>
                        <div id="faq{{$key}}" class="collapse" data-parent=".faq-list">
                        <p>
                            {{ $faq->answer }}
                        </p>
                        </div>
                    </li>
                @endif
            @endforeach
        </ul>

      </div>
    </section><!-- End F.A.Q Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>Team</h2>
          <p>Our Hardworking Team</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up">
              <div class="member-img">
                <img src="{{asset('assets')}}/img/team/team-1.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Merson L. Taguiam</h4>
                <span>Project Manager</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="{{asset('assets')}}/img/team/team-2.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Angeline S. Acutillar</h4>
                <span>Technical Writer</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="200">
              <div class="member-img">
                <img src="{{asset('assets')}}/img/team/team-3.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Aljune S. Aguilar</h4>
                <span>System Analyst</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="300">
              <div class="member-img">
                <img src="{{asset('assets')}}/img/team/team-4.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Ronell M. Picaña</h4>
                <span>Q.A. Tester</span>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </div>

        <div class="row mt-5">

          <div class="col-lg-4" data-aos="fade-right">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Location:</h4>
                <p>Burgos Avenue, Cabanatuan City, 3100 Nueva Ecija</p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>events.tabulation@gmail.com</p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Call:</h4>
                <p>+63 976 0117 130</p>
                <p>+63 976 0117 129</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left">

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

  </main><!-- End #main -->

@endsection
