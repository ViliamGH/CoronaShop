<!DOCTYPE html>
<html lang="en">

<!-- these what you using with " blade " -->
@include("includes.header")

<body>

  <!-- these what you using with " blade " -->
  @include("includes.navbar")

  <section class="site-main">
    @yield("content")

    @include("includes.slideshow")
    @include("includes.slideshow2")

  </section>

  @include("includes.footer")

</body>

</html>