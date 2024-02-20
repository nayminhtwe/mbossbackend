@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@push('after-styles')
    <style>
        body {
            overflow-x: hidden;
        }

        .bar1 {
            background-color: #5655cd;
        }

        .bar2 {
            background-color: #a3a3a3;
        }
    </style>
@endpush

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

    <div>
        <!-- div content goes here -->
        <div>
            <p class="text-primary">Dashboard</p>
            <div class="d-flex">
                <div>
                    <img src="{{ asset('/img/brand/mboss.png') }}" alt="" />
                </div>

                <div class="ms-3 fs-3">
                    <p>M BOSS</p>
                </div>

                <a href="" style="font-size: larger; margin-top: 2px;">
                    <i class="fa fa-plus ms-3 mt-2" style="color: gray;"></i>
                </a>

            </div>
            <div class="d-flex">
                <div class="col-5">
                    <h4>Total Visits <i class="fa-solid fa-circle-exclamation" style="color: gray;font-size: 15px"></i></h4>

                </div>
            </div>
            <h4 class="mt-4 ms-3">Perpetual <i class="fa-solid fa-circle-exclamation"
                    style="color: gray;font-size: 15px"></i></h4>
            <div class="row mt-5">
                <div class="col-3">
                    <canvas id="dashboard-pie"></canvas>
                    <div class="ms-4 mt-3">
                        <span class="mt-3" style="margin-left: 32px">Total - 824,213</span>
                    </div>
                </div>
                <div class="col-5" style="padding-left: 100px;">
                    <div class="d-flex">
                        <hr style="width: 50px; border: 3px solid rgba(94, 92, 230, 0.200000003);">
                        <span class="ms-4 mt-2" style="font-size: 12px;color: gray;">Google.com.inc</span>
                    </div>
                    <span style="margin-left: 75px;font-size: 12px;">424,213 users</span>
                    <div class="d-flex mt-5">
                        <hr style="width: 50px; border: 3px solid rgba(255, 182, 0, 0.5);">
                        <span class="ms-4 mt-2" style="font-size: 12px;color: gray;">Google.com.inc</span>
                    </div>
                    <span style="margin-left: 75px;font-size: 12px;">424,213 users</span>
                    <div class="d-flex mt-5">
                        <hr style="width: 50px; border: 3px solid#34a0a4;">
                        <span class="ms-4 mt-2" style="font-size: 12px;color: gray;">Google.com.inc</span>
                    </div>
                    <span style="margin-left: 75px;font-size: 12px;">424,213 users</span>
                </div>
                <div class="col-4">
                    <h4>Active Percentage <i class="fa-solid fa-circle-exclamation" style="color: gray;font-size: 15px"></i>
                    </h4>
                    <div class="d-flex mt-5">
                        <h3>594</h3><span class="mt-2 ms-3" style="color: gray;">Total</span>
                    </div>
                    <div class="progress mt-4" style="width: 320px; height: 10px;">
                        <div class="progress-bar bar1" role="progressbar" style="width: 25%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100"></div>
                        <div class="progress-bar bar2" role="progressbar" style="width: 75%" aria-valuenow="30"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="d-flex mt-4">
                                <hr style="width: 50px; border: 3px solid #5655cd;">
                                <span class="mt-2 ms-3" style="font-size: 12px;color: gray;">Online</span>
                            </div>
                            <span style="font-size: 12px;">179 users</span>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-4">
                            <div class="d-flex mt-4">
                                <hr style="width: 50px; border: 3px solid #a3a3a3;">
                                <span class="mt-2 ms-3" style="font-size: 12px;color: gray;">Offline</span>
                            </div>
                            <span style="font-size: 12px;">180 users</span>
                        </div>
                    </div>

                </div>
            </div>
            <div class="d-flex mt-5">
                <div class="col-4">
                    <canvas id="bar-chart1"></canvas>
                </div>
                <div class="col-4">
                    <canvas id="bar-chart2"></canvas>
                </div>
                <div class="col-4">
                    <canvas id="bar-chart3"></canvas>
                </div>


            </div>
            <div class="d-flex mt-5">
                <div class="col-4">
                    <canvas id="bar-chart4"></canvas>
                </div>
                <div class="col-4">
                    <canvas id="bar-chart5"></canvas>
                </div>
                <div class="col-4">
                    <canvas id="bar-chart6"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    <script>
        const ctx = document.getElementById("profit-pie");

        new Chart(ctx, {
            type: "doughnut",
            data: {
                datasets: [{
                    data: [75, 25],
                }, ],
            },
            options: {
                backgroundColor: ["#5e5ce6", "black"],
                borderColor: "#2c2c2e",
                spacing: 0.5,
                cutout: "60%",
                borderRadius: 5,
            },
        });
        const ctx2 = document.getElementById("dashboard-pie");

        new Chart(ctx2, {
            type: "doughnut",
            data: {
                datasets: [{
                    label: "My First Dataset",
                    data: [300, 50, 100],
                    backgroundColor: [
                        "rgba(94, 92, 230, 0.200000003)",
                        "rgba(255, 182, 0, 0.5)",
                        "#34a0a4",
                    ],
                    hoverOffset: 4,
                }, ],
            },
            options: {
                borderWidth: 2,
            },
        });

        const barchart1 = document.getElementById('bar-chart1')
        const label1 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27,
            28, 29, 30, 30
        ];
        new Chart(barchart1, {
            type: "bar",
            data: {
                labels: label1,
                datasets: [{
                    label: 'Buyers',
                    data: [65, 59, 80, 81, 56, 55, 40, 35, 60, 90, 76, 65, 65, 59, 80, 81, 56, 55, 40, 35,
                        60, 90, 76, 65, 55, 40, 35, 60, 90, 76
                    ],
                    backgroundColor: [
                        'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white',
                        'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white',
                        'white', 'white', 'white', 'white', 'white', 'white', 'white',
                        'rgba(255, 159, 64)',
                        'white', 'white', 'white', 'white',
                    ],
                    borderColor: [
                        'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white',
                        'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white',
                        'white', 'white', 'white', 'white', 'white', 'white', 'white',
                        'rgb(255, 159, 64)', 'white', 'white', 'white', 'white',

                    ],
                    borderWidth: 1,
                    borderRadius: 25,
                    barThickness: 7,
                    minBarLength: 4,
                }]
            },
            options: {
                scales: {
                    x: {
                        grid: {
                            drawOnChartArea: false
                        }
                    },
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            font: {
                                size: 15, // Adjust font size as needed
                                family: 'Arial', // Font family
                                weight: 'bold', // Font weight
                            }
                        }
                    }
                },
                responsive: true,
                maintainAspectRatio: false, // Add this line to allow the chart to adjust its size
            },
        });

        const barchart2 = document.getElementById('bar-chart2')
        const label2 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27,
            28, 29, 30, 30
        ];
        new Chart(barchart2, {
            type: "bar",
            data: {
                labels: label2,
                datasets: [{
                    label: 'Sellers',
                    data: [65, 59, 80, 81, 56, 55, 40, 35, 60, 90, 76, 65, 65, 59, 80, 81, 56, 55, 40, 35,
                        60, 90, 76, 65, 55, 40, 35, 60, 90, 76
                    ],
                    backgroundColor: [
                        'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white',
                        'white', 'white', 'white', 'white', 'white', 'rgba(255, 80, 64)', 'white',
                        'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white',
                        'white',

                        'white', 'white', 'white', 'white',
                    ],
                    borderColor: [
                        'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white',
                        'white', 'white', 'white', 'white', 'white', 'rgba(255, 80, 64)', 'white',
                        'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white',
                        'white',
                        'white', 'white', 'white', 'white',

                    ],
                    borderWidth: 1,
                    borderRadius: 25,
                    barThickness: 7,
                    minBarLength: 4,
                }]
            },
            options: {
                scales: {
                    x: {
                        grid: {
                            drawOnChartArea: false
                        }
                    },
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            font: {
                                size: 15, // Adjust font size as needed
                                family: 'Arial', // Font family
                                weight: 'bold', // Font weight
                            }
                        }
                    }
                },
                responsive: true,
                maintainAspectRatio: false, // Add this line to allow the chart to adjust its size
            },
        });

        const barchart3 = document.getElementById('bar-chart3')
        const label3 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27,
            28, 29, 30, 30
        ];
        new Chart(barchart3, {
            type: "bar",
            data: {
                labels: label3,
                datasets: [{
                    label: 'Invoices',
                    data: [65, 59, 80, 81, 56, 55, 40, 35, 60, 90, 76, 65, 65, 59, 80, 81, 56, 55, 40, 35,
                        60, 90, 76, 65, 55, 40, 35, 60, 90, 76
                    ],
                    backgroundColor: [
                        'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white',
                        'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white',
                        'white', 'white', 'white', 'white', 'white', 'white', 'white',
                        'rgba(255, 159, 169)',
                        'white', 'white', 'white', 'white',
                    ],
                    borderColor: [
                        'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white',
                        'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white',
                        'white', 'white', 'white', 'white', 'white', 'white', 'white',
                        'rgb(255, 159, 169)', 'white', 'white', 'white', 'white',

                    ],
                    borderWidth: 1,
                    borderRadius: 25,
                    barThickness: 7,
                    minBarLength: 4,
                }]
            },
            options: {
                scales: {
                    x: {
                        grid: {
                            drawOnChartArea: false
                        }
                    },
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            font: {
                                size: 15, // Adjust font size as needed
                                family: 'Arial', // Font family
                                weight: 'bold', // Font weight
                            }
                        }
                    }
                },
                responsive: true,
                maintainAspectRatio: false, // Add this line to allow the chart to adjust its size
            },
        });

        const barchart4 = document.getElementById('bar-chart4')
        const label4 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27,
            28, 29, 30, 30
        ];
        new Chart(barchart4, {
            type: "bar",
            data: {
                labels: label4,
                datasets: [{
                    label: 'Request Invoices',
                    data: [65, 59, 80, 81, 56, 55, 40, 35, 60, 90, 76, 65, 65, 59, 80, 81, 56, 55, 40, 35,
                        60, 90, 76, 65, 55, 40, 35, 60, 90, 76
                    ],
                    backgroundColor: [
                        'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white',
                        'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white',
                        'white', 'white', 'white', 'white', 'white', 'white', 'white',
                        'rgba(156, 159, 64)',
                        'white', 'white', 'white', 'white',
                    ],
                    borderColor: [
                        'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white',
                        'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white',
                        'white', 'white', 'white', 'white', 'white', 'white', 'white',
                        'rgb(156, 159, 64)', 'white', 'white', 'white', 'white',

                    ],
                    borderWidth: 1,
                    borderRadius: 25,
                    barThickness: 7,
                    minBarLength: 4,
                }]
            },
            options: {
                scales: {
                    x: {
                        grid: {
                            drawOnChartArea: false
                        }
                    },
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            font: {
                                size: 15, // Adjust font size as needed
                                family: 'Arial', // Font family
                                weight: 'bold', // Font weight
                            }
                        }
                    }
                },
                responsive: true,
                maintainAspectRatio: false, // Add this line to allow the chart to adjust its size
            },
        });

        const barchart5 = document.getElementById('bar-chart5')
        const label5 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27,
            28, 29, 30, 30
        ];
        new Chart(barchart5, {
            type: "bar",
            data: {
                labels: label5,
                datasets: [{
                    label: 'Visits',
                    data: [65, 59, 80, 81, 56, 55, 40, 35, 60, 90, 76, 65, 65, 59, 80, 81, 56, 55, 40, 35,
                        60, 90, 76, 65, 55, 40, 35, 60, 90, 76
                    ],
                    backgroundColor: [
                        'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white',
                        'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white',
                        'white', 'white', 'white', 'white', 'white', 'white', 'white',
                        'rgba(200, 30, 64)',
                        'white', 'white', 'white', 'white',
                    ],
                    borderColor: [
                        'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white',
                        'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white',
                        'white', 'white', 'white', 'white', 'white', 'white', 'white',
                        'rgb(200, 30, 64)', 'white', 'white', 'white', 'white',

                    ],
                    borderWidth: 1,
                    borderRadius: 25,
                    barThickness: 7,
                    minBarLength: 4,
                }]
            },
            options: {
                scales: {
                    x: {
                        grid: {
                            drawOnChartArea: false
                        }
                    },
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            font: {
                                size: 15, // Adjust font size as needed
                                family: 'Arial', // Font family
                                weight: 'bold', // Font weight
                            }
                        }
                    }
                },
                responsive: true,
                maintainAspectRatio: false, // Add this line to allow the chart to adjust its size
            },
        });

        const barchart6 = document.getElementById('bar-chart6')
        const label6 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27,
            28, 29, 30, 30
        ];
        new Chart(barchart6, {
            type: "bar",
            data: {
                labels: label6,
                datasets: [{
                    label: 'Users Visit Time',
                    data: [65, 59, 80, 81, 56, 55, 40, 35, 60, 90, 76, 65, 65, 59, 80, 81, 56, 55, 40, 35,
                        60, 90, 76, 65, 55, 40, 35, 60, 90, 76
                    ],
                    backgroundColor: [
                        'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white',
                        'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white',
                        'white', 'white', 'white', 'white', 'white', 'white', 'white',
                        'rgba(20, 234, 80)',
                        'white', 'white', 'white', 'white',
                    ],
                    borderColor: [
                        'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white',
                        'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white', 'white',
                        'white', 'white', 'white', 'white', 'white', 'white', 'white',
                        'rgb(20, 234, 80)', 'white', 'white', 'white', 'white',

                    ],
                    borderWidth: 1,
                    borderRadius: 25,
                    barThickness: 7,
                    minBarLength: 4,
                }]
            },
            options: {
                scales: {
                    x: {
                        grid: {
                            drawOnChartArea: false
                        }
                    },
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            font: {
                                size: 15, // Adjust font size as needed
                                family: 'Arial', // Font family
                                weight: 'bold', // Font weight
                            }
                        }
                    }
                },
                responsive: true,
                maintainAspectRatio: false, // Add this line to allow the chart to adjust its size
            },
        });
    </script>
@endsection

@section('scripts')

    <script src="https://code.highcharts.com/highcharts.js"></script>

@endsection
