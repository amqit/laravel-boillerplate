@inject('hasAccess', '\App\Libraries\AppHelpers')
@extends('frontend.official.container.home')
@section('title', $title)
@section('content')
    <div class="container pb-lg">
        <div class="row">
            <div class="col-md-12">
                <div class="fh5co-heading text-center">
                    <h2 class="fh5co-heading-title">Our Services <span class="border"></span></h2>
                    <!-- <h3 class="fh5co-heading-intro">Design is the creation of a plan or convention for the construction of an object or a system as in architectural blueprints, engineering drawings, business processes, circuit diagrams and sewing patterns.</h3> -->
                </div>
            </div>
            <div class="col-md-4">
                <div class="fh5co-main-service">
                    <a href="#" class="fh5co-block-links text-center">
                        <div class="icon-circle">
                            <i class="ti-settings"></i>
                        </div>
                        <h2>Technical Development</h2>
                        <p>Design is the creation of a plan or convention for the construction of an object or a system.</p>
                        <p><span class="learn-more">Learn more</span></p>
                    </a>
                </div>
            </div>
            <div class="col-md-4">

                <div class="fh5co-main-service">
                    <a href="#" class="fh5co-block-links text-center">
                        <div class="icon-circle">
                            <i class="ti-ruler-pencil"></i>
                        </div>
                        <h2>User Interface Design</h2>
                        <p>Design is the creation of a plan or convention for the construction of an object or a system.</p>
                        <p><span class="learn-more">Learn more</span></p>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="fh5co-main-service">
                    <a href="#" class="fh5co-block-links text-center">
                        <div class="icon-circle">
                            <i class="ti-mobile"></i>
                        </div>
                        <h2>Mobile Apps Development</h2>
                        <p>Design is the creation of a plan or convention for the construction of an object or a system.</p>
                        <p><span class="learn-more">Learn more</span></p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="fh5co-projects">
                    <div class="fh5co-heading text-center">
                        <h2 class="fh5co-heading-title">Our Projects <span class="border"></span></h2>
                        <!-- <h3 class="fh5co-heading-intro">Design is the creation of a plan or convention for the construction of an object or a system as in architectural blueprints, engineering drawings, business processes, circuit diagrams and sewing patterns.</h3> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fh5co-projects-wrap">
        <div class="effects">
            <div class="owl-carousel">
                <div class="item">
                    <div class="hover-img">
                        <figure>
                            <img src="{{asset('themes/official/images/project_1.jpg')}}" alt="Project Title here">
                        </figure>
                        <div class="fh5co-projects-overlay">
                            <h3 class="from-top">Project Name Here <span class="category">Identity, Web</span></h3>
                            <div class="fh5co-projects-action from-bottom">
                                <a href="{{asset('themes/official/images/project_1.jpg')}}" class="goto-preview image-popup"><i class="ti-zoom-in"></i></a>
                                <a href="#" class="goto-details"><i class="ti-share"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="hover-img">
                        <figure>
                            <img src="{{asset('themes/official/images/project_2.jpg')}}" alt="Project Title here">
                        </figure>
                        <div class="fh5co-projects-overlay">
                            <h3 class="from-top">Project Name Here <span class="category">Identity</span></h3>
                            <div class="fh5co-projects-action from-bottom">
                                <a href="{{asset('themes/official/images/project_2.jpg')}}" class="goto-preview image-popup"><i class="ti-zoom-in"></i></a>
                                <a href="#" class="goto-details"><i class="ti-share"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="item">

                    <div class="hover-img">
                        <figure>
                            <img src="{{asset('themes/official/images/project_3.jpg')}}" alt="Project Title here">
                        </figure>
                        <div class="fh5co-projects-overlay">
                            <h3 class="from-top">Project Name Here <span class="category">Identity</span></h3>
                            <div class="fh5co-projects-action from-bottom">
                                <a href="{{asset('themes/official/images/project_3.jpg')}}" class="goto-preview image-popup"><i class="ti-zoom-in"></i></a>
                                <a href="#" class="goto-details"><i class="ti-share"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="hover-img">
                        <figure>
                            <img src="{{asset('themes/official/images/project_4.jpg')}}" alt="Project Title here">
                        </figure>
                        <div class="fh5co-projects-overlay">
                            <h3 class="from-top">Project Name Here <span class="category">Identity</span></h3>
                            <div class="fh5co-projects-action from-bottom">
                                <a href="{{asset('themes/official/images/project_4.jpg')}}" class="goto-preview image-popup"><i class="ti-zoom-in"></i></a>
                                <a href="#" class="goto-details"><i class="ti-share"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="item">

                    <div class="hover-img">
                        <figure>
                            <img src="{{asset('themes/official/images/project_5.jpg')}}" alt="Project Title here">
                        </figure>
                        <div class="fh5co-projects-overlay">
                            <h3 class="from-top">Project Name Here <span class="category">Illustration</span></h3>
                            <div class="fh5co-projects-action from-bottom">
                                <a href="{{asset('themes/official/images/project_5.jpg')}}" class="goto-preview image-popup"><i class="ti-zoom-in"></i></a>
                                <a href="#" class="goto-details"><i class="ti-share"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="hover-img">
                        <figure>
                            <img src="{{asset('themes/official/images/project_6.jpg')}}" alt="Project Title here">
                        </figure>
                        <div class="fh5co-projects-overlay">
                            <h3 class="from-top">Project Name Here <span class="category">Illustration</span></h3>
                            <div class="fh5co-projects-action from-bottom">
                                <a href="{{asset('themes/official/images/project_6.jpg')}}" class="goto-preview image-popup"><i class="ti-zoom-in"></i></a>
                                <a href="#" class="goto-details"><i class="ti-share"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="item">

                    <div class="hover-img">
                        <figure>
                            <img src="{{asset('themes/official/images/project_7.jpg')}}" alt="Project Title here">
                        </figure>
                        <div class="fh5co-projects-overlay">
                            <h3 class="from-top">Project Name Here <span class="category">Web</span></h3>
                            <div class="fh5co-projects-action from-bottom">
                                <a href="{{asset('themes/official/images/project_7.jpg')}}" class="goto-preview image-popup"><i class="ti-zoom-in"></i></a>
                                <a href="#" class="goto-details"><i class="ti-share"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="hover-img">
                        <figure>
                            <img src="{{asset('themes/official/images/project_8.jpg')}}" alt="Project Title here">
                        </figure>
                        <div class="fh5co-projects-overlay">
                            <h3 class="from-top">Project Name Here <span class="category">Identitty</span></h3>
                            <div class="fh5co-projects-action from-bottom">
                                <a href="{{asset('themes/official/images/project_8.jpg')}}" class="goto-preview image-popup"><i class="ti-zoom-in"></i></a>
                                <a href="#" class="goto-details"><i class="ti-share"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="item">
                    <div class="hover-img">
                        <figure>
                            <img src="{{asset('themes/official/images/project_9.jpg')}}" alt="Project Title here">
                        </figure>
                        <div class="fh5co-projects-overlay">
                            <h3 class="from-top">Project Name Here <span class="category">Illustration, Web</span></h3>
                            <div class="fh5co-projects-action from-bottom">
                                <a href="{{asset('themes/official/images/project_9.jpg')}}" class="goto-preview image-popup"><i class="ti-zoom-in"></i></a>
                                <a href="#" class="goto-details"><i class="ti-share"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="hover-img">
                        <figure>
                            <img src="{{asset('themes/official/images/project_10.jpg')}}" alt="Project Title here">
                        </figure>
                        <div class="fh5co-projects-overlay">
                            <h3 class="from-top">Project Name Here <span class="category">Identitty</span></h3>
                            <div class="fh5co-projects-action from-bottom">
                                <a href="{{asset('themes/official/images/project_10.jpg')}}" class="goto-preview image-popup"><i class="ti-zoom-in"></i></a>
                                <a href="#" class="goto-details"><i class="ti-share"></i></a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <section class="fh5co-section" id="fh5co-workwithus">
        <div class="container">
            <div class="fh5co-workwithus-intro">
                <h2>Like what you see?  Let’s talk.</h2>
                <h3 class="has-btn-after">This is a section where you can set an image background. Fixed background if you want. :-)</h3>
                <p><a href="#" class="btn btn-primary btn-lg btn-uppercase btn-effect">Get in touch <i class="ti-angle-right"></i></a></p>
            </div>
        </div>
    </section>
    <div class="container" id="fh5co-journal">
        <div class="row">
            <div class="col-md-12">
                <div class="fh5co-heading text-center">
                    <h2 class="fh5co-heading-title">Our Journal <span class="border"></span></h2>
                    <h3 class="fh5co-heading-intro">Design is the creation of a plan or convention for the construction of an object or a system as in architectural blueprints, engineering drawings, business processes, circuit diagrams and sewing patterns.</h3>
                </div>
            </div>
        </div>
        <!-- END .row -->

        <div class="row">
            <div class="owl-carousel-posts">
                <div class="item">
                    <div class="fh5co-image-text">
                        <a href="#" class="fh5co-block-links hover-img">
                            <figure>
                                <img src="{{asset('themes/official/images/project_2.jpg')}}" alt="Post Title" class="img-responsive">
                                <div class="dark-overlay"></div>
                            </figure>
                            <h2 class="meta-after">My New Minimal Workspace </h2>
                            <span class="meta text-after">Dec. 1, 2014</span>
                            <p>Design is the creation of a plan or convention for the construction of an object or a system as in architectural blueprints</p>
                            <p><span class="learn-more">Read more</span></p>
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="fh5co-image-text">
                        <a href="#" class="fh5co-block-links hover-img">
                            <figure>
                                <img src="{{asset('themes/official/images/project_3.jpg')}}" alt="Post Title" class="img-responsive">
                                <div class="dark-overlay"></div>
                            </figure>
                            <h2 class="meta-after">Camera Lenses!</h2>
                            <span class="meta text-after">Nov. 24, 2014</span>
                            <p>Design is the creation of a plan or convention for the construction of an object or a system as in architectural blueprints</p>
                            <p><span class="learn-more">Read more</span></p>
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="fh5co-image-text">
                        <a href="#" class="fh5co-block-links hover-img">
                            <figure>
                                <img src="{{asset('themes/official/images/project_1.jpg')}}" alt="Post Title" class="img-responsive">
                                <div class="dark-overlay"></div>
                            </figure>
                            <h2 class="meta-after">Best Clothes this Season</h2>
                            <span class="meta text-after">Dec. 4, 2014</span>
                            <p>Design is the creation of a plan or convention for the construction of an object or a system as in architectural blueprints</p>
                            <p><span class="learn-more">Read more</span></p>
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="fh5co-image-text">
                        <a href="#" class="fh5co-block-links hover-img">
                            <figure>
                                <img src="{{asset('themes/official/images/project_2.jpg')}}" alt="Post Title" class="img-responsive">
                                <div class="dark-overlay"></div>
                            </figure>
                            <h2 class="meta-after">My New Minimal Workspace </h2>
                            <span class="meta text-after">Dec. 1, 2014</span>
                            <p>Design is the creation of a plan or convention for the construction of an object or a system as in architectural blueprints</p>
                            <p><span class="learn-more">Read more</span></p>
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="fh5co-image-text">
                        <a href="#" class="fh5co-block-links hover-img">
                            <figure>
                                <img src="{{asset('themes/official/images/project_3.jpg')}}" alt="Post Title" class="img-responsive">
                                <div class="dark-overlay"></div>
                            </figure>
                            <h2 class="meta-after">Camera Lenses!</h2>
                            <span class="meta text-after">Nov. 24, 2014</span>
                            <p>Design is the creation of a plan or convention for the construction of an object or a system as in architectural blueprints</p>
                            <p><span class="learn-more">Read more</span></p>
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="fh5co-image-text">
                        <a href="#" class="fh5co-block-links hover-img">
                            <figure>
                                <img src="{{asset('themes/official/images/project_1.jpg')}}" alt="Post Title" class="img-responsive">
                                <div class="dark-overlay"></div>
                            </figure>
                            <h2 class="meta-after">Best Clothes this Season</h2>
                            <span class="meta text-after">Dec. 4, 2014</span>
                            <p>Design is the creation of a plan or convention for the construction of an object or a system as in architectural blueprints</p>
                            <p><span class="learn-more">Read more</span></p>
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="fh5co-image-text">
                        <a href="#" class="fh5co-block-links hover-img">
                            <figure>
                                <img src="{{asset('themes/official/images/project_2.jpg')}}" alt="Post Title" class="img-responsive">
                                <div class="dark-overlay"></div>
                            </figure>
                            <h2 class="meta-after">My New Minimal Workspace </h2>
                            <span class="meta text-after">Dec. 1, 2014</span>
                            <p>Design is the creation of a plan or convention for the construction of an object or a system as in architectural blueprints</p>
                            <p><span class="learn-more">Read more</span></p>
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="fh5co-image-text">
                        <a href="#" class="fh5co-block-links hover-img">
                            <figure>
                                <img src="{{asset('themes/official/images/project_3.jpg')}}" alt="Post Title" class="img-responsive">
                                <div class="dark-overlay"></div>
                            </figure>
                            <h2 class="meta-after">Camera Lenses!</h2>
                            <span class="meta text-after">Nov. 24, 2014</span>
                            <p>Design is the creation of a plan or convention for the construction of an object or a system as in architectural blueprints</p>
                            <p><span class="learn-more">Read more</span></p>
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="fh5co-image-text">
                        <a href="#" class="fh5co-block-links hover-img">
                            <figure>
                                <img src="{{asset('themes/official/images/project_1.jpg')}}" alt="Post Title" class="img-responsive">
                                <div class="dark-overlay"></div>
                            </figure>
                            <h2 class="meta-after">Best Clothes this Season</h2>
                            <span class="meta text-after">Dec. 4, 2014</span>
                            <p>Design is the creation of a plan or convention for the construction of an object or a system as in architectural blueprints</p>
                            <p><span class="learn-more">Read more</span></p>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <section class="fh5co-section" id="fh5co-testimonial">
        <i class="ti-quote-left quote-icon"></i>
        <div class="container">
            <div class="owl-carousel-fullwidth">
                <div class="item">
                    <p class="text-center quote">Design must be functional and functionality must be translated into visual aesthetics, without any reliance on gimmicks that have to be explained. <cite class="author">&mdash; Ferdinand A. Porsche</cite></p>
                </div>
                <div class="item">
                    <p class="text-center quote">Creativity is just connecting things. When you ask creative people how they did something, they feel a little guilty because they didn’t really do it, they just saw something. It seemed obvious to them after a while. <cite class="author">&mdash; Steve Jobs</cite></p>
                </div>
                <div class="item">
                    <p class="text-center quote">I think design would be better if designers were much more skeptical about its applications. If you believe in the potency of your craft, where you choose to dole it out is not something to take lightly.<cite class="author">&mdash; Frank Chimero</cite></p>
                </div>
            </div>
        </div>
    </section>
@stop
