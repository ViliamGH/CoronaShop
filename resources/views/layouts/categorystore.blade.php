<!DOCTYPE html>
<html lang="en">

<!-- these what you using with " blade " -->
@include("includes.header")

<body>

    <!-- these what you using with " blade " -->
    @include("includes.navbar")

    <section class="container">
        
        @yield("products")
        @yield("productdetail")
        @yield("productcheckout")
        @yield("productconfirm")
        @yield("productcart")

    </section>

    @include("includes.footer")

</body>

</html>