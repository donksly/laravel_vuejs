@extends('layouts.app')

@section('content')
    <div class="body_content">
        <div class="panel-heading"><h1>Employees Addresses <i class="fa fa-home"></i></h1></div>
            <div class="panel-body table-responsive">

                <router-view name="addressIndex"></router-view>
                <router-view></router-view>
            </div>
        </div>
    </div>
@endsection