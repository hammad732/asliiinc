@extends('frontend.layouts.master')


@section('style')
<style>
    .prod-row{
        /*height:80vh;*/
    }
    
          .rproducts  h1, h2, h3{
        background: #F35901!important;
        width: 280px!important;
        padding: 10px!important;
        color: white!important;
        margin-bottom: 5px!important;
        margin-top: 15px!important;
         
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

</style>
@endsection

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">

            {{-- dproducts section --}}
            <div class="rproducts">
                <div class="container prod-row">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <h3>Distributor Products:</h3>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($dproducts as $prod)
                        <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                <div class="card">
                                    <img class="card-img-top" src="{{asset('docs/pics/'.$prod->pic)}}" alt="">
                                    <div class="card-body text-center">
                                        <h4 class=" text-center">{{$prod->name}}</h4>
                                        <p class=" text-center">${{$prod->d_price}} / Case <br>
                                        {{$prod->d_weight}}oz / Unit
                                        </p>
                                        <a href="{{route('view.dproduct', [ 'id' => $prod->id])}}" type="button" class="btn btn-outline-warning">view</a>
                                        {{-- <button class="btn btn-outline-primary" value="{{ $prod->id }}" type="submit">Add to Cart</button> --}}
                                        <button class="btn btn-outline-primary d-add-to-cart" value="{{ $prod->id }}">Add to cart</button>
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
