@extends('BackOffice::layouts.app')
@section('body_class','backoffice dashboard')
@section('content')
    <div class="dashboard">
        <div class="container">
            <div class="row header">
                <div class="col">
                    <h3>Dashboard</h3>
                    <div class="user">
                        Welcome! <strong>{{auth()->user()->name ?? 'Marker Name'}}</strong> - My mall Manager: <strong>Mall Name</strong>

                    </div>
                </div>
                <div class="col text-right">
                    <div class="period">
                        <!-- Basic dropdown -->
                        <span>Period</span>
                        <div class="btn-group year">
                            <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">2016</span>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">2016</a>
                                <a class="dropdown-item" href="#">2017</a>
                                <a class="dropdown-item" href="#">2018</a>
                                <a class="dropdown-item" href="#">2019</a>

                            </div>
                        </div>
                        <!-- Basic dropdown -->
                        <div class="btn-group month">
                            <span class="dropdown-toggle"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Oct</span>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Oct</a>
                                <a class="dropdown-item" href="#">Nov</a>
                                <a class="dropdown-item" href="#">Dec</a>
                            </div>
                        </div>
                    </div>
                    <div class="actions">
                        <a class="btn btn-gradient-blue" href="#">New Contract</a>
                    </div>
                </div>
            </div>
            <div class="row row-dashboard-record">
                <div class="col-md-4">

                </div>
                <div class="col-md-4">

                </div>
                <div class="col-md-4">

                </div>
            </div>
            <div class="red-recent-contract">

            </div>
        </div>
    </div>
    {{--@include('BackOffice::partials.dashboard.walk-through')--}}
@endsection
