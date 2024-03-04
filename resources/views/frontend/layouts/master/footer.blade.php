<style>
  .w3_agile_facebook,
  .agile_twitter,
  .w3_agile_vimeo,.w3_agile_dribble{
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .address-li-first{
    display: flex;
    align-items: center;
  }
  #w3_agile_youtube:hover {
  background: #ff0000 !important;
  border: 1px solid #ff0000 !important;
}

#w3_agile_amazon:hover {
  background: #FF9900 !important;
  border: 1px solid #FF9900 !important;
}
.connect-region-type{
    color: white;
    text-transform: uppercase;
    font-weight: 700;
    font-size: 17px;
    margin-bottom: 18px;
}
  </style> 
 <!-- //footer -->
 <div class="footer">
    <div class="container">
      <div class="row">
          @foreach($connects as $connect)
        <div class="col-md-3 col-lg-3 w3_footer_grid">
            
          
          <h3>{{$connect->region}}</h3>
          <h5 class="connect-region-type">{{$connect->type}}</h5>

          <ul class="address">
                 @php
                
                $words = explode(",", $connect->address);
                @endphp
                
                @foreach($words as $word)
             <li class="address-li-first">
                <a href="#" onclick="openInGoogleMaps('{{$word}}')">
                  <i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>
                </a>
              
                    {{$word}}
            </li>
            @endforeach
            
            <li>
                <a href="mailto:{{$connect->email}}">
                    <i class="glyphicon glyphicon-envelope" aria-hidden="true"></i> {{$connect->email}}
                </a>
            </li>
            <li>
                <a href="tel:{{$connect->phone_no}}">
                    <i class="glyphicon glyphicon-earphone" aria-hidden="true"></i> {{$connect->phone_no}}
                </a>
            </li>
          </ul>
        </div>
        @endforeach
    
        <div class="clearfix"></div>
      </div>
    </div>

    <div class="footer-copy">
      <div class="container">
        <p>
          {{ date('Y') }} All rights reserved <a href="https://asliiinc.com/">Asliiinc</a> | Designed by
          <a href="https://edenspell.com/">Edenspell</a>
        </p>
      </div>
    </div>
  </div>
  <div class="footer-botm">
    <div class="container footer-container" style="width: fit-content;">
      <div class="w3layouts-foot">
        <ul>
          <li>
            <a href="https://www.facebook.com/profile.php?id=61556916660599&mibextid=rS40aB7S9Ucbxw6v" class="w3_agile_facebook"><i class="fa-brands fa-facebook-f"></i>
            </a>
          </li>
          <li>
            <a href="https://twitter.com/AsliiMall" class="agile_twitter"><i class="fa-brands fa-x-twitter"></i></a>
          </li>
          <li>
            <a href="https://www.instagram.com/asliiincinstapage?igsh=MXdob2tvczhtcjJ2eQ%3D%3D&utm_source=qr" class="w3_agile_dribble"><i class="fa-brands fa-instagram"></i></a>
          </li>
          <li>
            <a href="https://www.linkedin.com/in/aslii-mall-865436232" class="w3_agile_vimeo"><i class="fa-brands fa-linkedin"></i></a>
          </li>
          <li>
            <a href="https://www.youtube.com/" class="w3_agile_vimeo" class="w3_agile_vimeo " id="w3_agile_youtube"><i class="fa-brands fa-youtube"></i></a>
          </li>
          <!--<li>-->
          <!--  <a href="https://www.amazon.com/" class="w3_agile_vimeo" class="w3_agile_vimeo" id="w3_agile_amazon"><i class="fa-brands fa-amazon"></i></a>-->
          <!--</li>-->
        </ul>
      </div>
      {{-- <div class="payment-w3ls">
        <img src="{{ asset('assets/images/card.png') }}" alt=" " class="img-responsive" />
      </div> --}}
      <div class="clearfix"></div>
    </div>
  </div>
  <!-- //footer -->
  <!-- main slider-banner -->

  <script src="{{ asset('assets/js/skdslider.min.js') }}"></script>
  <script type="text/javascript">
    jQuery(document).ready(function() {
      jQuery("#demo1").skdslider({
        delay: 5000,
        animationSpeed: 2000,
        showNextPrev: true,
        showPlayButton: true,
        autoSlide: true,
        animationType: "fading",
      });

    });
    
    function openInGoogleMaps(address) {
    var googleMapsUrl = "https://www.google.com/maps/search/?api=1&query=" + encodeURIComponent(address);
    window.open(googleMapsUrl, '_blank');
}
  </script>

  <script src="{{ asset('assets/images/bootstrap.min.js.download') }}"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script>
  $(document).ready(function() {
    function setMaxHeight() {
      // Check window width
      var windowWidth = $(window).width();
      if (windowWidth > 480) {
        var maxHeight = 0;
        $('.w3_footer_grid').each(function() {

          var currentHeight = $(this).height();
          if (currentHeight > maxHeight) {
            maxHeight = currentHeight;
          }
        });


        $('.w3_footer_grid').height(maxHeight);
      } else {

        $('.w3_footer_grid').css('height', 'auto');
      }
    }
    setMaxHeight();
    $(window).resize(setMaxHeight);
  });
</script>

@yield('script')
