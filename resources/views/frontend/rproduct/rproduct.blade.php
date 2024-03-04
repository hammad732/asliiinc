@extends('frontend.layouts.master')

@section('style')
<style>
          .rproducts  h1, h2, h3{
        background: #F35901!important;
        width: 305px!important;
        padding: 10px!important;
        color: white!important;
        margin-bottom: 5px!important;
        margin-top: 15px!important;
        border-radius: .25rem;
        text-align: center;
         font-size: 32px;
    }
    .back{
         background: #F35901!important;
        width: 160px!important;
        padding: 10px!important;
        color: white!important;
        margin-bottom: 5px!important;
        margin-top: 15px!important;
        font-size: 32px !important;
    }
        .rproducts{
        /*height: 74vh;*/
    }
    
           h4 {
    color: #F35901!important;
} 
h5 {
    color: #F35901!important;
}
p {
    color: #F35901!important;
}
.titel{
    height:60px;
}

@media only screen and (max-width: 576px){
       .rproducts h1, h2, h3 {
    background: #F35901!important;
    width: 305px!important;
    padding: 10px!important;
    color: white!important;
    margin-bottom: 5px!important;
    margin-top: 15px!important;
    margin: auto;
    text-align: center;
          
      }
      .back-btn{
          text-align:center;
      }
      .home-heading{
        width: 58% !important;

}
}
/*@media only screen and (min-width: 430px) and (max-width: 767px)*/
/*{*/
/*    .title{*/
/*     height: 80px;*/
/*    }*/
   
  
/*}*/
</style>
@endsection
    
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper py-5">
        <!-- Main content -->
        <section class="content">

            {{-- RProducts section --}}
            <div class="rproducts">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="back-btn">
                            <a href="{{ url()->previous() }}" class="btn btn-default back"><i class="fas fa-arrow-alt-circle-left"></i> Back</a></div>
                              <h3>{{$main_cat}}</h3>
                        </div>
                       
                    </div>
                    <div class="row">
                        @foreach ($rproducts as $prod)
                         <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="card">
                                    @if($prod->pic != null)
                                    <img class="card-img-top" src="{{asset('docs/pics/'.$prod->pic)}}" alt="">
                                    @else
                                    <img class="card-img-top" src="{{asset('docs/pics/no-image-png-5-Transparent-Images.png')}}" alt="">
                                    @endif
                                    <div class="card-body text-center">
                                        <h4 class=" text-center titel">{{$prod->name}}</h4>
                                        <p class=" text-center">${{$prod->r_price}} / {{$prod->r_weight}}</p>

                                        {{-- <button class="btn btn-outline-primary" value="{{ $prod->id }}" type="submit">Add to Cart</button> --}}
                                      @if($prod->out_of_stock == 1)
                                      <button class="btn btn-outline-primary ">Out of stock</button>
                                      @else
                                      <button class="btn btn-outline-primary add-to-cart" value="{{ $prod->id }}">Add to cart</button>
                                      @endif
                                        
                                    </div>
                                </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>

    <!-- The Modal -->
<div class="modal" id="myModal2">
    <div class="modal-dialog">
        <div class="modal-content-transparent">


            <!-- Modal body -->
            <div class="modal-body text-center">
                <img src="{{ asset('images/gif-load.gif') }}" alt="" class="gif-size" style="width:100px">
                <h4 class="product-add-text d-none text-white"><strong>Product Added Successfully!</strong></h4>
            </div>


        </div>
    </div>
</div>

    <!-- /.content-wrapper -->
@endsection

<!-- jQuery library -->
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

@section('script')
    <script>
    $(document).ready(function()
    {

    });
</script>
@endsection
