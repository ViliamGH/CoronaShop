<!DOCTYPE html>
<html lang="en">

@include("admins.includes.head")

<style>
    .small {
        margin-top: 18px;
        font-size: 13px;
        font-weight: bold;
    }

    .pagination .page-link {
        margin-top: 18px;
        font-size: 13px;
        font-weight: bold;
        background-color: white;
        color: #6c7293;
        border-color: #dee2e6;
    }

    .pagination .page-link:hover {
        margin-top: 18px;
        font-size: 13px;
        font-weight: bold;
        background-color: #e9ecef;
        color: #6c7293;
        border-color: #dee2e6;
    }
</style>

<body>
    <div class="container-scroller">
        @include("admins.includes.sidebar")
        <div class="container-fluid page-body-wrapper">
            @include("admins.includes.navbar")
            @yield("table")
        </div>
    </div>
    @include("admins.includes.script")
</body>

</html>