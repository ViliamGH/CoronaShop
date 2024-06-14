@extends("admins.layouts.adminchart")
@section("chart")

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Charts </h3>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Area chart</h4>
                        <canvas id="areaChart" style="height:250px"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Doughnut chart</h4>
                        <canvas id="doughnutChart" style="height:250px"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @include("admins.includes.footer")
</div>

@endsection