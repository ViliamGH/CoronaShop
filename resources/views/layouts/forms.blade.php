<!DOCTYPE html>
<html lang="en">

<!-- these what you using with " blade " -->
@include("includes.header")

<body>

    <!-- these what you using with " blade " -->
    @include("includes.navbar")

    <section class="container">

        <!-- @yield("content") merge in home.blade.php to set as a default content to show when oepn website -->
        @yield("signin");
        @yield("registers");

    </section>

    @include("includes.footer")

</body>

</html>