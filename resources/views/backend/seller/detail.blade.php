@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.app')

@section('title', __('Seller Information Detail'))

@push('after-styles')
    <style>
        .sales-overview {
            background: linear-gradient(#101429, #121527);
        }

        .orders-overview {
            background: linear-gradient(#101428, #111527);
        }
    </style>
@endpush

@section('content')
   <section >
       <div class="d-flex justify-content-between align-items-center mt-4 pe-3 w-100">
           <div class="d-flex align-items-center">
               <p class="m-0">Filter</p>
               <button class="gray-border text-light bg-transparent rounded px-2 ms-2">
                   <i class="fa-solid fa-ellipsis"></i>
               </button>
           </div>
       </div>
       <div class="d-flex align-items-center mt-4">
           <div class="d-flex flex-fill justify-content-between align-items-center ms-3 pe-3">
               <p style="font-size: 30px; color: #9f9f9f;">Billion Smile</p>
               <p style="font-size: 25px; color: #717173;">Occupation - Seller</p>
               <p style="font-size: 25px; color: #717173;">Status - <span class="text-success">Active</span></p>
           </div>
       </div>
       <section class="management-detail d-flex align-items-start ps-2 pe-2 mt-4">
           <div class="w-50">
               <div class="sales-overview rounded-4 px-2 py-3">
                   <div>
                       <p class="m-0 fw-bold">Sales Overview</p>
                       <p class="m-0 fs-14"><span class="text-success">(+5) more</span> <span class="opacity-75">in
                                2024</span></p>
                   </div>
                   <div class="mt-3" style="width: 100%;">
                       <canvas id="sales-chart"></canvas>
                   </div>
               </div>
{{--               <div class="referral-tracking px-5 py-4 mt-4 rounded-4">--}}
{{--                   <div class="d-flex align-items-center justify-content-between">--}}
{{--                       <p class="m-0 fw-bold">Referral Tracking</p>--}}
{{--                       <button class="border-0 rounded-3" style="background-color: #252a41;">--}}
{{--                           <img src="/icons/more_horiz.png" alt="more icon">--}}
{{--                       </button>--}}
{{--                   </div>--}}

{{--                   <div class="d-flex align-items-start justify-content-between gap-3 mt-4">--}}
{{--                       <div class="mt-3">--}}
{{--                           <div class="ps-4 pt-3 pb-4 rounded-4" style="width: 200px; background-color: #080e2c;">--}}
{{--                               <p class="m-0 fs-14 opacity-75">Invited</p>--}}
{{--                               <p class="m-0 fw-semibold">145 people</p>--}}
{{--                           </div>--}}
{{--                           <div class="ps-4 pt-3 pb-4 mt-4 rounded-4" style="width: 200px; background-color: #080e2c;">--}}
{{--                               <p class="m-0 fs-14 opacity-75">Bonus</p>--}}
{{--                               <p class="m-0 fw-semibold">1450 Bonus Coins</p>--}}
{{--                           </div>--}}
{{--                       </div>--}}
{{--                       <div class="position-relative" style="width: 50%; max-width: 200px;">--}}
{{--                           <canvas id="referral-chart">--}}
{{--                           </canvas>--}}
{{--                           <div class="position-absolute top-50 start-50 translate-middle text-center pb-2">--}}
{{--                               <p class="m-0 fs-14 opacity-75">Reputation Score</p>--}}
{{--                               <p class="m-0 fs-2 fw-bold">99.3</p>--}}
{{--                               <p class="m-0 fs-14 opacity-75">Total Score</p>--}}
{{--                           </div>--}}
{{--                       </div>--}}
{{--                   </div>--}}
{{--               </div>--}}
           </div>
           <div class="orders-overview ms-3 py-4 px-3 rounded-4 w-50">
               <div>
                   <p class="m-0 fw-bold">Orders overview</p>
                   <div class="d-flex align-items-center fs-14">
                       <img src="/icons/circle.png" alt="circle icon">
                       <span class="ms-1 mt-1 opacity-75">+30% this month</span>
                   </div>

                   <div class="orders-overview-items">
                       <div class="d-flex align-items-start fs-14 mt-3">
                           <img class="pt-1" src="/icons/bell.png" alt="bell icon">
                           <div class="d-flex flex-column ms-3">
                               <span>Notifications Received</span>
                               <span class="opacity-75">170 times</span>
                           </div>
                       </div>

                       <div class="d-flex align-items-start fs-14 mt-3">
                           <img class="pt-1" src="/icons/time.png" alt="time icon">
                           <div class="d-flex flex-column ms-3">
                               <span>Average Usage Time</span>
                               <span class="opacity-75">30 minutes</span>
                           </div>
                       </div>

                       <div class="d-flex align-items-start fs-14 mt-3">
                           <img class="pt-1" src="/icons/cart.png" alt="cart icon">
                           <div class="d-flex flex-column ms-3">
                               <span>Average Buying Cost</span>
                               <span class="opacity-75">50,000,000 MMK</span>
                           </div>
                       </div>

                       <div class="d-flex align-items-start fs-14 mt-3">
                           <img class="pt-1" src="/icons/bank-card.png" alt="bank card icon">
                           <div class="d-flex flex-column ms-3">
                               <span>Total Bank Card Added</span>
                               <span class="opacity-75">8</span>
                           </div>
                       </div>

                       <div class="d-flex align-items-start fs-14 mt-3">
                           <img class="pt-1" src="/icons/time.png" alt="time icon">
                           <div class="d-flex flex-column ms-3">
                               <span>Average Use Time Frame</span>
                               <span class="opacity-75">5:00 PM - 7:00 Pm</span>
                           </div>
                       </div>

                       <div class="d-flex align-items-start fs-14 mt-3">
                           <img class="pt-1" src="/icons/net-profit.png" alt="net profit icon">
                           <div class="d-flex flex-column ms-3">
                               <span>Net Profit</span>
                               <span class="opacity-75">20,000,000 MMK</span>
                           </div>
                       </div>
                   </div>

               </div>
           </div>
       </section>
   </section>
   <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
   <script>
       const profit = document.getElementById('profit-pie');

       new Chart(profit, {
           type: 'doughnut',
           data: {
               datasets: [{
                   data: [75, 25],
               }]
           },
           options: {
               backgroundColor: ['#5e5ce6', 'black'],
               borderColor: '#2c2c2e',
               spacing: 0.5,
               cutout: '60%',
               borderRadius: 5
           }
       });


       // const ctx = document.getElementById('referral-chart');
       //
       // new Chart(ctx, {
       //     type: 'doughnut',
       //     data: {
       //         datasets: [{
       //             data: [80, 20],
       //         }]
       //     },
       //     options: {
       //         backgroundColor: ['#05c594', 'transparent'],
       //         borderColor: 'transparent',
       //         spacing: 0.5,
       //         cutout: '85%',
       //         borderRadius: 10,
       //         rotation: 180
       //     }
       // });

       const salesChart = document.getElementById('sales-chart');

       const getGradient = (context, colors) => {
           if (!context.chart.chartArea) {
               return;
           }

           const { ctx, chartArea } = context.chart;
           const gradient = ctx.createLinearGradient(0, chartArea.top, 0, chartArea.bottom);
           gradient.addColorStop(0, colors[0]);
           gradient.addColorStop(1, colors[1]);

           return gradient;
       }

       const labels = ['Jan', 'Feb', 'March', 'April', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec',];

       const colorSet1 = ['rgba(0, 117, 255, 1)', 'rgba(0, 117, 255, 0)'];
       const colorSet2 = ['rgba(44, 217, 255, 0.36)', 'rgba(44, 217, 255, 0)'];

       const data = {
           labels: labels,
           datasets: [
               {
                   data: [200, 220, 240, 355, 370, 460, 380, 310, 350, 250, 340, 430],
                   fill: true,
                   backgroundColor: (context) => getGradient(context, colorSet1),
                   borderColor: 'rgba(0, 117, 255, 100)',
                   tension: 0.5
               },
               {
                   data: [500, 180, 170, 275, 210, 235, 245, 200, 110, 130, 170, 120],
                   fill: true,
                   backgroundColor: (context) => getGradient(context, colorSet2),
                   borderColor: 'rgba(0, 117, 255, 100)',
                   tension: 0.5
               },
           ]
       };

       new Chart(salesChart, {
           type: 'line',
           data: data,
           options: {
               plugins: {
                   legend: {
                       display: false
                   }
               },

               scales: {
                   y: {
                       beginAtZero: true,

                       ticks: {
                           color: "#CBD5E0",
                           font: {
                               size: 10,
                               weight: 600
                           },
                       }
                   },
                   x: {
                       ticks: {
                           color: "#CBD5E0",
                           font: {
                               size: 10,
                               weight: 600
                           },
                           beginAtZero: true
                       }
                   }
               }
           }
       });
   </script>
@endsection


<script>
    $(document).ready(function(){$("img").click(function(){this.requestFullscreen()})});
</script>

