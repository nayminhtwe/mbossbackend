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
                        <div class="h1">{{$admin}}</div>
                        <div class="h5">Admins List</div>
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
                        <div class="h1">{{$users}}</div>
                        <div class="h5">AppUsers List</div>
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
    <div class="row">
        <div class="col-sm-12 col-lg-4">
            <div class="card bg-dark">
                <div class="card-header text-white">
                    <div class="h5">Admin & Users List</div>
                </div>
                <div class="card-body">
                    <div>
                        <canvas id="myDoughnutChart" style="width:200px;height:200px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-lg-4">
            <div class="card bg-dark">
                <div class="card-header text-white">
                    <div class="h5">Buyers & Sellers List</div>
                </div>
                <div class="card-body">
                    <div>
                        <canvas id="buyerSellerDoughnutChart" style="width:200px;height:200px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-lg-4">
            <div class="card bg-dark">
                <div class="card-header text-white">
                    <div class="h5">Invoice List</div>
                </div>
                <div class="card-body">
                    <div>
                        <canvas id="informDoughnutChart" style="width:200px;height:200px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-lg-6">
            <div class="card bg-dark" style="height:300px;">
                <div class="card-header">
                    <div class="h5 text-white">Monthly Report of Invoice List</div>
                </div>
                <div class="card-body">
                    <canvas id="invoiceBarChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-lg-6">
            <div class="card bg-dark" style="height:300px;">
                <div class="card-header">
                    <div class="h5 text-white">Purchased Invoice & Finished Invoice</div>
                </div>
                <div class="card-body">
                    <canvas id="purchaseInvoiceBarChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card bg-dark">
                <div class="card-header">
                    <div class="h5">Total Service Feess of Selling Invoice</div>
                </div>
                <div class="card-body">
                    <canvas id="serviceFeeBarChart"></canvas>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const adminctx = document.getElementById('myDoughnutChart').getContext('2d');

    const adminCount = @json($admin);
    const appUserCount = @json($users);

    const myDoughnutChart = new Chart(adminctx, {
        type: 'doughnut',
        data: {
            labels: ['Admin ({{$admin}})', 'App Users ({{$users}})'],
            datasets: [{
                label: 'User Overview',
                data: [adminCount, appUserCount],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 206, 86, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            aspectRatio: 1,
            plugins: {
                legend: {
                    labels: {
                        color: "white"
                    },
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function (tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw;
                        }
                    }
                }
            }
        }
    });

    const buysellctx = document.getElementById('buyerSellerDoughnutChart').getContext('2d');

    const buyer = @json($buyer_count);
    const seller = @json($seller_count);

    const buyersellerDoughnutChart = new Chart(buysellctx, {
        type: 'doughnut',
        data: {
            labels: ['Buyers ({{$buyer_count}})', 'Sellers ({{$seller_count}})'],
            datasets: [{
                label: 'User Overview',
                data: [buyer, seller],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                ],
                borderColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            aspectRatio: 1,
            plugins: {
                legend: {
                    labels: {
                        color: "white"
                    },
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function (tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw;
                        }
                    }
                }
            }
        }
    });


    const ctx = document.getElementById('informDoughnutChart').getContext('2d');
    const invoice = @json($invoice_count);
    const invoiceRequest = @json($invoice_request_count);


    const informDoughnutChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Invoice ({{$invoice_count}})', 'Invoice Request ({{$invoice_request_count}})'], // Labels for the chart
            datasets: [{
                label: 'User Overview',
                data: [invoice, invoiceRequest],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 206, 86, 0.2)',

                ],
                borderColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            aspectRatio: 1,
            plugins: {
                legend: {
                    labels: {
                        color: "white"
                    },
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function (tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw;
                        }
                    }
                }
            }
        }
    });

    const barctx = document.getElementById('invoiceBarChart').getContext('2d');

    const invoiceData = @json($invoice_report);
    const months = invoiceData.map(data => data.month);
    const invoiceCounts = invoiceData.map(data => data.count);

    const invoiceBarChart = new Chart(barctx, {
        type: 'bar',
        data: {
            labels: months,
            datasets: [{
                label: 'Invoices per Month',
                data: invoiceCounts,
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                x: {
                    ticks: {
                        color: 'red',
                        font: {
                            size: 14
                        }
                    }
                },
                y: {
                    ticks: {
                        color: 'blue',
                        font: {
                            size: 14
                        }
                    },
                    beginAtZero: true
                }
            },
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

    const purchaseinvoicectx = document.getElementById('purchaseInvoiceBarChart').getContext('2d');

    const purchaseData = @json($purchaseData);
    const finishedData = @json($finishedData);

    const purchaseInvoiceBarChart = new Chart(purchaseinvoicectx, {
        type: 'bar',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [
                {
                    label: 'Purchase Invoices',
                    data: purchaseData,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Finished Invoices',
                    data: finishedData,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    labels: {
                        color: 'black'
                    },
                    position: 'top'
                },
                tooltip: {
                    callbacks: {
                        label: function (tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw;
                        }
                    }
                }
            },
            scales: {
                x: {
                    ticks: {
                        color: 'red'
                    }
                },
                y: {
                    ticks: {
                        color: 'blue'
                    },
                    beginAtZero: true
                }
            }
        }
    });
    const servicectx = document.getElementById('serviceFeeBarChart').getContext('2d');

        const serviceFeeData = @json($serviceFeeData);

        const serviceFeeBarChart = new Chart(servicectx, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                datasets: [
                    {
                        label: 'Total Service Fee',
                        data: serviceFeeData,
                        backgroundColor: 'rgba(255, 159, 64, 0.2)', 
                        borderColor: 'rgba(255, 159, 64, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        labels: {
                            color: 'black'
                        },
                        position: 'top'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return 'Total Service Fee: ' + tooltipItem.raw;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        ticks: {
                            color: 'red' ,
                        }
                    },
                    y: {
                        ticks: {
                            color: 'blue',
                            beginAtZero: true
                        }
                    }
                }
            }
        });
</script>
@endsection

@section('scripts')
<script src="https://code.highcharts.com/highcharts.js"></script>
@endsection