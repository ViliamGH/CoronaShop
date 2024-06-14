@extends("admins.layouts.admintable")
@section("table")

<div class="main-panel">
    <div class="content-wrapper">
        <form action="{{ route('admins.components.update') }}" method="post" enctype="multipart/form-data">
            @if(!isset($slideshow))
            <div class="page-header">
                <h3 class="page-title"> Add Slideshow </h3>
            </div>
            @else
            <div class="page-header">
                <h3 class="page-title"> Edit Slideshow </h3>
                <input type="hidden" name="txtssid" id="txtssid" value="{{$slideshow['ssid']}}">
            </div>
            @endif
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Information</h3>
                            @csrf
                            <div class="form-group">
                                <label for="txtTitle">Title</label>
                                <input type="text" class="form-control" value="{{isset($slideshow)?$slideshow['title']:''}}" name="txtTitle" id="txtTitle">
                                @error('txtTitle')
                                <div class="text-danger">Title is required!</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="txtSubtitle">Subtitle</label>
                                <input type="text" class="form-control" ​​​​​​​​​​ value="{{isset($slideshow)?$slideshow['subtitle']:''}}" name="txtSubtitle" id="txtSubtitle">
                            </div>
                            <div class="form-group">
                                <label for="txtText">Text</label>
                                <textarea class="form-control" ​​​​​​​​​​ name="txtText" id="txtText" rows="3">{{isset($slideshow)?$slideshow['text']:''}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="txtLink">Link</label>
                                <input type="text" class="form-control" ​​​​​​​​​​ value="{{isset($slideshow)?$slideshow['link']:''}}" name="txtLink" id="txtLink">
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" role="switch" name="txtEnable" id="txtEnable" {{isset($slideshow)?($slideshow['enable']=='1'?'checked':''):'checkdate'}}>
                                <label class="custom-control-label" for="txtEnable">Enable</label>
                            </div>
                            <div class="mt-3">
                                <label for="txtFile" class="form-label">Choose file</label>
                                <input class="form-control" type="file" name="txtFile" id="txtFile">
                            </div>
                            @if(isset($slideshow))
                            <div class="mt-3">
                                <img class="img-thumbnail" src="{{ asset('imgs/slideshows/thumbnail/' . $slideshow->img) }}" alt="...">
                                <p class="mt-3">{{$slideshow['img']}}</p>
                            </div>
                            @endif
                            <div class="mt-3 d-flex justify-content-between align-items-center">
                                <input type="submit" class="btn btn-success" value="{{isset($slideshow)?'Update Slideshow':'Add Slideshow'}}">
                                <a href="{{ route('admins.components') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @include("admins.includes.footer")
</div>

@endsection