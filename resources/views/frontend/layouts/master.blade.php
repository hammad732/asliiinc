<!DOCTYPE html>

<html>

@include('frontend.layouts.master.head')

<body>

  @php
    
    $PressServices = App\Models\Service::where('type', 'Press Room')->get();
        $CareerServices =  App\Models\Service::where('type', 'Careers')->get();
        $InverstorServices =  App\Models\Service::where('type', 'Investors')->get();
        // $connects = App\Models\Connect::get();
        $connects = App\Models\Connect::get();
        // dd($connects);
        // dd($InverstorServices);
  @endphp

 @include('frontend.layouts.master.header')


 @include('frontend.layouts.master.slider')

@yield('content')
 
  @include('frontend.layouts.master.footer')
</body>

</html>

