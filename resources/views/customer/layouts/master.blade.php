
<!DOCTYPE html>
<html lang="en">
<head>

    @include('customer.layouts.head-tag')
    @yield('head-tag')

</head>

<body class="common-home res layout-5">
    
    <div id="wrapper" class="wrapper-fluid banners-effect-5">
    

    @include('customer.layouts.header')


    
   
<!-- Main Container  -->
<div class="main-container">
    <div id="content">

        {{-- @include('customer.layouts.slider') --}}

        @yield('content')
        
    </div>
</div>

<!-- //Main Container -->
   
    @include('customer.layouts.footer')
    </div>

<!-- End Color Scheme
============================================ -->


@include('customer.layouts.script')

<section class="toast-wrapper flex-row-reverse">

    
</section>

@yield('script')



</body>
</html>