<!DOCTYPE html>
<html lang="en">

@include("admins.includes.head")

<body>
    <div class="container-scroller">
        @include("admins.includes.sidebar")
        <div class="container-fluid page-body-wrapper">
            @include("admins.includes.navbar")
            @yield("chart")
        </div>
    </div>
    @include("admins.includes.script")
</body>

</html>