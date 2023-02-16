@include('EO.layouts.app')

<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>{{$pagetitle}}</h3>
                <ol class="breadcrumb">
                    @foreach ($breadcrumb as $bc)
                    <li class="breadcrumb-item"><a href="{{$bc[1]}}">{{$bc[0]}}</a></li>
                    @endforeach
                </ol>
            </div>
            <div class="col-sm-6">
            </div>
        </div>
    </div>
</div>

@include('EO.layouts.footer')
