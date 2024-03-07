@extends('frontend.layouts.master')


<style>
    .section_all {
        position: relative;
        padding-top: 60px;
        padding-bottom: 60px;
        /*min-height: 100vh;*/
    }
    

    .section-title {
        font-weight: 700;
        text-transform: capitalize;
        letter-spacing: 1px;
    }

    .about-icon-heading,
    .about-icon-para {
        margin-bottom: 1rem;
    }

    .section-subtitle {
        letter-spacing: 0.4px;
        line-height: 28px;
        max-width: 550px;
    }

    .section-title-border {
        background-color: #000;
        height: 1 3px;
        width: 44px;
    }

    .section-title-border-white {
        background-color: #fff;
        height: 2px;
        width: 100px;
    }

    .text_custom {
        color: #00bd2a;
    }

    .about_icon i {
        font-size: 22px;
        height: 65px;
        width: 65px;
        line-height: 65px;
        display: inline-block;
        background: #fff;
        border-radius: 35px;
        color: #fe9126;
        box-shadow: 0 8px 20px -2px rgba(158, 152, 153, 0.5);
        margin-bottom: 15px;
    }

    .about_header_main {
        margin-top: 1rem;
        margin-bottom: 1rem;
         /*text-align: justify;*/
         text-align: center
    }
    

    .about_header_main .about_heading {

        font-size: 24px;
        margin-bottom: 10px;
        margin-top: 10px;
        line-height: 30px;
    }

    .about_icon span {
        position: relative;
        top: -10px;
    }

    .about_content_box_all {
        padding: 28px;
    }

    .d-block1 {
        width: 100% !important;
        max-height: 100% !important;
        border-radius: 10px
    }

    .vertical_content_manage {
        margin-bottom: 50px;
        display: flex;

    }
    .about_heading{
        color: #F35901;
    }
    
    .paragragh-about{
            text-align: center;
        }

    @media(max-width:1200px) {
        .img_about {
            margin-top: 30px font-size: 16px
        }
    }

    @media(max-width:991px) {
        .vertical_content_manage {
            flex-direction: column !important;
        }
         .about_header_main{
         text-align: center !important; 
        }
        .section_all {
        padding-top: 30px;
         padding-bottom: 30px;
    }
    .vertical_content_manage {
        margin-bottom: 20px;
        
     }
    }
    @media(min-width:991px){
      
    }

    .vertical_content_manage:nth-child(even) {
        flex-direction: row-reverse;
    }

    @media(max-width:414px) {

        .footer-copy p {
            margin: auto;
            font-size: 10px;
        }
    }

    @media(max-width:436px) {

        .footer-copy p {
            margin: auto;
            font-size: 10px;
        }
    }
    
    /*.mission-text-div{*/
    /*    text-align:center;*/
    /*}*/
    
    .carousel-inner>.item>img{
    /*   max-height: 350px;*/
    /*width: 100%;*/
    object-fit: cover;
    }
  
</style>

@section('content')
    {{-- @dd($content); --}}
    @php
        $service = App\Models\Service::first();
    @endphp

    {{-- <div class="construction-services-banner">
        <div class="container-fluid">
            <div class="row">
                <img src="{{ asset('/docs/pics/' . $aboutus->banner_image) }}" alt="">
                <div class="construction-services-banner-text mx-2">
                    <h1>{{ $aboutus->banner_title }}</h1>
                </div>
            </div>
        </div>
    </div> --}}

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          @foreach ($marquees as $index => $marquee)
            <li data-target="#myCarousel" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
          @endforeach
        </ol>
      
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          @foreach ($marquees as $index => $marquee)
            <div class="item {{ $index == 0 ? 'active' : '' }}">
              <img src="{{ asset('docs/pics/'.$marquee->pic) }}" alt="Slide {{ $index + 1 }}" />
            </div>
          @endforeach
        </div>
      </div>

    <!-- end of single-service-banner -->



    <!-- About  Section -->
    <section class="section_all bg-light" id="about">
        <div class="container">

            @foreach ($contents as $content)
                <div class="row vertical_content_manage mt-5">
                    <div class="col-12 mission-text-div">
                        <div class="about_header_main mt-3">
                            <h4 class="about_heading text-capitalize font-weight-bold mt-4">{{ $content->heading }}</h4>

                            <p class="text-muted mt-3 paragragh-about"> {!! $content->text !!}</p>
                        </div>
                    </div>
                    <!--<div class="col-md-6 text-center">-->
                    <!--    <div class="img_about mt-3">-->
                    <!--        <img src="{{ asset('/docs/pics/' . $content->image) }}" alt=""-->
                    <!--            class="img-fluid mx-auto d-block1">-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
            @endforeach


            {{-- <div class="row mt-3">
            <div class="col-lg-4">
                <div class="about_content_box_all mt-3">
                    <div class="about_detail text-center">
                        <div class="about_icon">
                            <i class="fas fa-pencil-alt"></i>
                        </div>
                        <h5 class="text-dark text-capitalize mt-3 about-icon-heading font-weight-bold">Creative Design</h5>
                        <p class="edu_desc mt-3 about-icon-para  mb-0 text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="about_content_box_all mt-3">
                    <div class="about_detail text-center">
                        <div class="about_icon">
                            <i class="fab fa-angellist"></i>
                        </div>
                        <h5 class="text-dark text-capitalize mt-3 about-icon-heading font-weight-bold">We make Best Result</h5>
                        <p class="edu_desc mb-0 mt-3 about-icon-para text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="about_content_box_all mt-3">
                    <div class="about_detail text-center">
                        <div class="about_icon">
                            <i class="fas fa-paper-plane"></i>
                        </div>
                        <h5 class="text-dark text-capitalize about-icon-heading mt-3 font-weight-bold">best platform </h5>
                        <p class="edu_desc mb-0 mt-3 about-icon-para text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                    </div>
                </div>
            </div>
        </div> --}}
        </div>
    </section>
@endsection
