@extends("admins.layouts.admintable")
@section("table")
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Slideshows </h3>
            <a href="{{ route('admins.components.form') }}" class="btn btn-success rounded-3">Insert Product</a>
        </div>
        <div style="clear:both"></div>
        <!-- alert in bs4-->
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>
                {{session('success')}}
            </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @if(session('fail'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>
                {{session('fail')}}
            </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @if($slideshow->count() > 0 )
        <div class="col-lg-12 grid-margin stretch-card p-0">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Information</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Image </th>
                                    <th> Tittle </th>
                                    <th> Subtitle </th>
                                    <th> Text </th>
                                    <th> Link </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($slideshow as $item)
                                <tr>
                                    <td> {{ ($slideshow->currentPage() - 1) * $slideshow->perPage() + $loop->iteration }} </td>
                                    <td>
                                        <img src="{{ asset('imgs/slideshows/thumbnail/' . $item->img) }}" alt="..." />
                                    </td>
                                    <td> {{$item['title']}} </td>
                                    <td> {{$item['subtitle']}} </td>
                                    <td> {{$item['text']}} </td>
                                    <td> {{$item['link']}} </td>
                                    <td style="width: 120px;">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <a href="{{ route('admins.components.clickeye', ['id'=>$item->ssid, 'action'=>$item->enable]) }}">
                                                    @if($item['enable'])
                                                    <i class="fa-solid fa-eye"></i>
                                                    @else
                                                    <i class="fa-solid fa-eye-slash"></i>
                                                    @endif
                                                </a>
                                            </div>
                                            <a href="{{ route('admins.components.moveud', ['id'=>$item->ssid, 'action'=>'1']) }}">
                                                <i class="fa-solid fa-arrow-up"></i>
                                            </a>
                                            <a href="{{ route('admins.components.moveud', ['id'=>$item->ssid, 'action'=>'0']) }}">
                                                <i class="fa-solid fa-arrow-down"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#deleteModal{{$item->ssid}}">
                                                <i class=" fa-solid fa-trash-can"></i>
                                            </a>
                                            <a href="{{ route('admins.components.edit', ['id'=>$item->ssid])}}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Modal -->
                        @foreach($slideshow as $item)
                        <div class="modal fade" id="deleteModal{{$item->ssid}}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header d-flex align-items-center p-3 m-1">
                                        <h5 class="modal-title" id="deleteModalLabel">Confirmation</h5>
                                        <button type="button" class="text-white pl-1 close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body p-3 m-1">
                                        Are you want to delete this slideshow?
                                    </div>
                                    <div class="modal-footer">
                                        <a href="{{ route('admins.components.deleteid', ['id'=>$item->ssid]) }}" class="btn btn-danger ">Yes</a>
                                        <a class="btn btn-success" data-dismiss="modal">No</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- end modal -->

                        @if($slideshow->lastPage()>1)
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="{{$slideshow->previousPageUrl()}}">Previous</a></li>
                                    @for($i=1;$i<=$slideshow->lastPage();$i++)
                                        <li class="page-item {{$slideshow->currentPage()==$i ? 'active' : ''}}"><a class="page-link" href="{{$slideshow->url($i)}}">{{$i}}</a></li>
                                        @endfor
                                        <li class="page-item"><a class="page-link" href="{{$slideshow->NextPageUrl()}}">Next</a></li>
                                </ul>
                            </ul>
                        </nav>
                        @endif
                        @else
                        <div class="d-flex justify-content-center">No Slideshows</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include("admins.includes.footer")

</div>
@endsection