<!DOCTYPE html>
<html lang="en">

@include("admins.includes.head")

<body>
    <div class="container-scroller">
        @include("admins.includes.sidebar")
        <div class="container-fluid page-body-wrapper">
            @include("admins.includes.navbar")
            @yield("content")
        </div>
    </div>
    @include("admins.includes.script")
</body>

</html>