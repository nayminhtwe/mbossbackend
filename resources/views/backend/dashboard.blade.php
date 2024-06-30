@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')
    {{-- <x-backend.card>
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/home">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">My Dashboard</li>
            </ol>

            <div class="row">
                <div class="col-xl-4 col-sm-8 mb-4">
                    <div class="card text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-wallet float-right" style="font-size: 50px"></i>
                            </div>
                            <div class="mr-5">Buyer</div>
                            <span style="font-size: 30px;color: yellow">{{ $buyer_count }}
                                <sup style="font-size: 15px">Buyer</sup>
                            </span>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="backend.buyer-kyc.index">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-8 mb-4">
                    <div class="card text-white bg-warning o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-money-check-alt float-right" style="font-size: 50px"></i>
                            </div>
                            <div class="mr-5">Seller</div>
                            <span style="font-size: 30px;color: blue">{{ $seller_count }}
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="backend.kyc.index">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-8 mb-4">
                    <div class="card text-white bg-success o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-user-md float-right" style="font-size: 50px"></i>
                            </div>
                            <div class="mr-5">Invoice</div>
                            <span style="font-size: 30px;color: green">{{ $invoice_count }}
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="backend.invoice.index">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </x-backend.card> --}}

    <div class="container">
        {{-- <h2>Approved</h2> --}}
        <div class="row">
            <div class="col-sm-12 col-lg-3">
                <div class="card mb-3 text-white bg-primary">
                    <div class="card-body d-flex justify-content-between">
                        <div class="p2">
                            <div class="h1">{{$buyer_count}}</div>
                            <div class="h5">Buyers</div>
                            <div>
                                <a class="text-white clearfix small z-1" href="/admin/buyer-kyc">
                                    <span>
                                        View Details <strong>>></strong>
                                        {{-- <span class="float-right">
                                            <i class="fa fa-angle-right"></i>
                                        </span> --}}
                                    </span>
                                </a>
                            </div>
                        </div>

                        <div class="icon p2">
                            <i class="fa fa-id-badge fa-6x" style="color:rgba(0, 0, 0, 0.15)"></i>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.col-->
            <div class="col-sm-12 col-lg-3">
                <div class="card mb-3 text-white bg-success">
                    <div class="card-body d-flex justify-content-between">
                        <div class="p2">
                            <div class="h1">{{$seller_count}}</div>
                            <div class="h5">Sellers</div>
                            <div>
                                <a class="text-white clearfix small z-1" href="/admin/personal-info">
                                    <span>
                                        View Details <strong>>></strong>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="icon p2">
                            <i class="fa fa-address-book fa-6x" style="color:rgba(0, 0, 0, 0.15)"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-->
            <div class="col-sm-12 col-lg-3">
                <div class="card mb-3 text-white bg-info">
                    <div class="card-body d-flex justify-content-between">
                        <div class="p2">
                            <div class="h1">{{$invoice_count}}</div>
                            <div class="h5">Invoices</div>
                            <div>
                                <a class="text-white clearfix small z-1" href="/admin/finished">
                                    <span>
                                        View Details <strong>>></strong>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="icon p2">
                            <i class="fa fa-file fa-6x" style="color:rgba(0, 0, 0, 0.15)"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-->
            <div class="col-sm-12 col-lg-3">
                <div class="card mb-3 text-white bg-warning">
                    <div class="card-body d-flex justify-content-between">
                        <div class="p2">
                            <div class="h1">{{$invoice_request_count}}</div>
                            <div class="h5">Request Invoices</div>
                            <div>
                                <a class="text-white clearfix small z-1" href="/admin/invoice">
                                    <span>
                                        View Details <strong>>></strong>
                                    </span>

                                </a>
                            </div>
                        </div>
                        <div class="icon p2">
                            <i class="fa fa-hourglass-half fa-6x" style="color:rgba(0, 0, 0, 0.15)"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-->
        </div>

    </div>
@endsection

@section('scripts')

<script src="https://code.highcharts.com/highcharts.js"></script>

@endsection
