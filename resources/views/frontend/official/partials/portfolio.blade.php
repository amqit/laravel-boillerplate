@inject('hasAccess', '\App\Libraries\AppHelpers')
@extends('frontend.official.container.layout')
@section('title', $title)
@section('portfolio')
    <div class="container pb-lg">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="fh5co-heading text-center">
                    <h2 class="fh5co-heading-uppercase">Project Description</h2>
                    <h3 class="fh5co-heading-intro mb-md">Design is the creation of a plan or convention for the construction of an object or a system as in architectural blueprints, engineering drawings, business processes, circuit diagrams and sewing patterns. Design is the creation of a plan or convention for the construction of an object or a system as in architectural blueprints, engineering drawings, business processes, circuit diagrams and sewing patterns. Design is the creation of a plan or convention for the construction of an object or a system as in architectural blueprints.</h3>

                    <h2 class="fh5co-heading-uppercase">Share this project</h2>
                    <ul class="fh5co-social">
                        <li><a href="#"><i class="ti-facebook"></i> Facebook</a></li>
                        <li><a href="#"><i class="ti-twitter-alt"></i> Twitter</a></li>
                        <li><a href="#"><i class="ti-google"></i> GooglePlus</a></li>
                        <li><a href="#"><i class="ti-pinterest"></i> Pinterest</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- END .row -->
        <div class="row">
            <div class="col-md-12 mb-lg">
                <figure>
                    <img src="images/project_detail_1.jpg" class="img-responsive" alt="Project Title here">
                </figure>
            </div>
        </div>
        <!-- END .row -->
        <div class="row">
            <div class="col-md-12 mb-lg">
                <figure>
                    <img src="images/project_detail_2.jpg" class="img-responsive" alt="Project Title here">
                </figure>
            </div>
        </div>
        <!-- END .row -->
        <div class="row">
            <div class="col-md-12 mb-lg">
                <figure>
                    <img src="images/project_detail_3.jpg" class="img-responsive" alt="Project Title here">
                </figure>
            </div>
        </div>
        <!-- END .row -->
        <div class="row mb-md">
            <div class="col-md-12 text-center">
                <p><a href="#" class="fh5co-visit">Visit <span>www.ugmonk.com</span></a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="fh5co-pagination">
                    <a href="#" class="fh5co-pageination-prev" title="Previous Project"><i class="ti-arrow-left"></i></a>
                    <a href="#" class="fh5co-pageination-all" title="View All Projects"><i class="ti-view-grid"></i></a>
                    <a href="#" class="fh5co-pageination-next" title="Next Project"><i class="ti-arrow-right"></i></a>
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