@extends('layouts.user')

@section('title')
    Home
@endsection

@section('content')
    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 align-self-center">
                            <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                                <h6>Welcome to Legal Access JNE</h6>
                                <h2>
                                    We <em>Connecting</em> Your
                                    <span>Happiness</span>
                                </h2>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Incidunt accusamus inventore fugiat illo corporis
                                    consequatur cupiditate tenetur tempore corrupti. Facilis
                                    fugiat nulla ut quia eum asperiores, iusto natus pariatur
                                    deleniti!
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                                <img src="/images/banner-right-image.png" alt="team meeting" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="about" class="about-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="left-image wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                        <img src="/images/about-left-image.png" alt="person graphic" />
                    </div>
                </div>
                <div class="col-lg-8 align-self-center">
                    <div class="services">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <div class="icon">
                                        <img src="/images/service-icon-01.png" alt="reporting" />
                                    </div>
                                    <div class="right-text">
                                        <h4>Drafting Case</h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, ctetur aoi adipiscing eliter
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
                                    <div class="icon">
                                        <img src="/images/service-icon-02.png" alt="" />
                                    </div>
                                    <div class="right-text">
                                        <h4>Litigation Case</h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, ctetur aoi adipiscing eliter
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.9s">
                                    <div class="icon">
                                        <img src="/images/service-icon-03.png" alt="" />
                                    </div>
                                    <div class="right-text">
                                        <h4>Permit Case</h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, ctetur aoi adipiscing eliter
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="1.1s">
                                    <div class="icon">
                                        <img src="/images/service-icon-04.png" alt="" />
                                    </div>
                                    <div class="right-text">
                                        <h4>Lease Case</h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, ctetur aoi adipiscing eliter
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="services" class="our-services section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
                    <div class="left-image">
                        <img src="/images/services-left-image.png" alt="" />
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s">
                    <div class="section-heading">
                        <h2>
                            Track your <em>case</em> &amp; <span>Document</span> Realtime
                        </h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint,
                            aut? Adipisci accusamus, cum ipsa atque, eius, mollitia
                            architecto culpa placeat dolorum vitae repudiandae voluptas.
                            Distinctio et alias accusantium odit itaque.
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="first-bar progress-skill-bar">
                                <h4>Total Pengajuan</h4>
                                <span>84 Pengajuan</span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="first-bar progress-skill-bar">
                                <h4>Pengajuan Drafting</h4>
                                <span>84 Pengajuan</span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="first-bar progress-skill-bar">
                                <h4>Pengajuan Litigasi</h4>
                                <span>84 Pengajuan</span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="first-bar progress-skill-bar">
                                <h4>Pengajuan Permit</h4>
                                <span>84 Pengajuan</span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="first-bar progress-skill-bar">
                                <h4>Pengajuan Lease</h4>
                                <span>84 Pengajuan</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="portfolio" class="our-portfolio section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
                        <h2>
                            See What Our Company <em>Offers</em> &amp; What We
                            <span>Provide</span>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <a href="#">
                        <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                            <div class="hidden-content">
                                <h4>Drafting Case</h4>
                                <p>Lorem ipsum dolor sit ameti ctetur aoi adipiscing eto.</p>
                            </div>
                            <div class="showed-content">
                                <img src="/images/portfolio-image.png" alt="" />
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a href="#">
                        <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.4s">
                            <div class="hidden-content">
                                <h4>Litigation Case</h4>
                                <p>Lorem ipsum dolor sit ameti ctetur aoi adipiscing eto.</p>
                            </div>
                            <div class="showed-content">
                                <img src="/images/portfolio-image.png" alt="" />
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a href="#">
                        <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                            <div class="hidden-content">
                                <h4>Permit Case</h4>
                                <p>Lorem ipsum dolor sit ameti ctetur aoi adipiscing eto.</p>
                            </div>
                            <div class="showed-content">
                                <img src="/images/portfolio-image.png" alt="" />
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a href="#">
                        <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.6s">
                            <div class="hidden-content">
                                <h4>Lease Case</h4>
                                <p>Lorem ipsum dolor sit ameti ctetur aoi adipiscing eto.</p>
                            </div>
                            <div class="showed-content">
                                <img src="/images/portfolio-image.png" alt="" />
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div id="contact" class="contact-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
                    <div class="section-heading">
                        <h2>Feel Free To Send Us a Message About Your Website Needs</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                            doer ket eismod tempor incididunt ut labore et dolores
                        </p>
                        <div class="phone-info">
                            <h4>
                                For any enquiry, Call Us:
                                <span><em class="fa fa-phone"></em>
                                    <a href="#">010-020-0340</a></span>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
                    <form id="contact" action="" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <legend>
                                    <input type="name" name="name" id="name" placeholder="Name" autocomplete="on"
                                        required />
                                </legend>
                            </div>
                            <div class="col-lg-6">
                                <legend>
                                    <input type="surname" name="surname" id="surname" placeholder="Surname"
                                        autocomplete="on" required />
                                </legend>
                            </div>
                            <div class="col-lg-12">
                                <legend>
                                    <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*"
                                        placeholder="Your Email" required="" />
                                </legend>
                            </div>
                            <div class="col-lg-12">
                                <legend>
                                    <textarea name="message" type="text" class="form-control" id="message" placeholder="Message" required=""></textarea>
                                </legend>
                            </div>
                            <div class="col-lg-12">
                                <legend>
                                    <button type="submit" id="form-submit" class="main-button">
                                        Send Message
                                    </button>
                                </legend>
                            </div>
                        </div>
                        <div class="contact-dec">
                            <img src="/images/contact-decoration.png" alt="" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
