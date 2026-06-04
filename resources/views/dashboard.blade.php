@extends('layouts.user_type.auth')

@section('content')

<div class="row">

    <!-- Total Paket -->
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-capitalize font-weight-bold">
                                Total Paket
                            </p>

                            <h5 class="font-weight-bolder mb-0">
                                {{ $paket }}
                            </h5>
                        </div>
                    </div>

                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                            <i class="ni ni-box-2 text-lg opacity-10"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Materi -->
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-capitalize font-weight-bold">
                                Total Materi
                            </p>

                            <h5 class="font-weight-bolder mb-0">
                                {{ $materi }}
                            </h5>
                        </div>
                    </div>

                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-success shadow text-center border-radius-md">
                            <i class="ni ni-books text-lg opacity-10"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Kursus -->
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-capitalize font-weight-bold">
                                Total Kursus
                            </p>

                            <h5 class="font-weight-bolder mb-0">
                                {{ $kursus }}
                            </h5>
                        </div>
                    </div>

                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-warning shadow text-center border-radius-md">
                            <i class="ni ni-hat-3 text-lg opacity-10"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Pembayaran -->
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-7">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-capitalize font-weight-bold">
                                Total Bayar
                            </p>

                            <h6 class="font-weight-bolder mb-0">
                                Rp {{ number_format($pembayaran, 0, ',', '.') }}
                            </h6>
                        </div>
                    </div>

                    <div class="col-5 text-end">
                        <div class="icon icon-shape bg-gradient-danger shadow text-center border-radius-md">
                            <i class="ni ni-credit-card text-lg opacity-10"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- CHART & STATISTIK -->
<div class="row mt-4">

    <!-- Grafik Pendapatan -->
    <div class="col-lg-8 mb-lg-0 mb-4">
        <div class="card z-index-2 h-100">
            <div class="card-header pb-0">
                <h6>Grafik Pendapatan</h6>

                <p class="text-sm">
                    <i class="fa fa-arrow-up text-success"></i>

                    <span class="font-weight-bold">
                        Data pembayaran
                    </span>

                    berdasarkan transaksi
                </p>
            </div>

            <div class="card-body p-3">
                <div class="chart">
                    <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistik -->
    <div class="col-lg-4">

        <!-- Card Statistik -->
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Statistik</h6>
            </div>

            <div class="card-body p-3">

                <div class="d-flex justify-content-between mb-3">
                    <span>Total Kursus</span>

                    <span class="font-weight-bold">
                        {{ $kursus }}
                    </span>
                </div>

                <div class="d-flex justify-content-between mb-3">
                    <span>Total Materi</span>

                    <span class="font-weight-bold">
                        {{ $materi }}
                    </span>
                </div>

                <div class="d-flex justify-content-between mb-3">
                    <span>Total Paket</span>

                    <span class="font-weight-bold">
                        {{ $paket }}
                    </span>
                </div>

                <div class="d-flex justify-content-between">
                    <span>Total Pembayaran</span>

                    <span class="font-weight-bold text-success">
                        Rp {{ number_format($pembayaran, 0, ',', '.') }}
                    </span>
                </div>

            </div>
        </div>

        <!-- User Baru -->
        <div class="card">
            <div class="card-header pb-0">
                <h6>Aktivitas Sistem</h6>
            </div>

            <div class="card-body p-3">

                <div class="chart">
                    <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                </div>

            </div>
        </div>

    </div>

</div>

@endsection

@push('dashboard')

<script>

window.onload = function () {

    // =========================
    // BAR CHART
    // =========================

    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {

        type: "bar",

        data: {

            labels: ["Paket", "Materi", "Kursus"],

            datasets: [{

                label: "Data",

                tension: 0.4,

                borderWidth: 0,

                borderRadius: 4,

                borderSkipped: false,

                backgroundColor: [
                    '#5e72e4',
                    '#2dce89',
                    '#fb6340'
                ],

                data: [
                    {{ $paket }},
                    {{ $materi }},
                    {{ $kursus }}
                ],

                maxBarThickness: 30
            }],
        },

        options: {

            responsive: true,
            maintainAspectRatio: false,

            plugins: {
                legend: {
                    display: false,
                }
            },

            scales: {

                y: {
                    beginAtZero: true,

                    grid: {
                        drawBorder: false,
                        color: '#e9ecef',
                    },

                    ticks: {
                        color: '#8392ab',
                    }
                },

                x: {

                    grid: {
                        display: false
                    },

                    ticks: {
                        color: '#8392ab',
                    }
                }
            }
        },
    });


    // =========================
    // LINE CHART
    // =========================

    var ctx2 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');

    new Chart(ctx2, {

        type: "line",

        data: {

            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun"],

            datasets: [{

                label: "Pembayaran",

                tension: 0.4,

                borderWidth: 3,

                pointRadius: 5,

                pointBackgroundColor: "#5e72e4",

                borderColor: "#5e72e4",

                backgroundColor: gradientStroke1,

                fill: true,

                data: [
                    {{ $pembayaran * 0.2 }},
                    {{ $pembayaran * 0.4 }},
                    {{ $pembayaran * 0.3 }},
                    {{ $pembayaran * 0.6 }},
                    {{ $pembayaran * 0.8 }},
                    {{ $pembayaran }}
                ],

                maxBarThickness: 6
            }],
        },

        options: {

            responsive: true,
            maintainAspectRatio: false,

            plugins: {
                legend: {
                    display: false,
                }
            },

            interaction: {
                intersect: false,
                mode: 'index',
            },

            scales: {

                y: {

                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },

                    ticks: {

                        callback: function(value) {
                            return 'Rp ' + value.toLocaleString('id-ID');
                        },

                        display: true,
                        padding: 10,
                        color: '#b2b9bf',

                        font: {
                            size: 11,
                        },
                    }
                },

                x: {

                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                    },

                    ticks: {
                        display: true,
                        color: '#b2b9bf',
                        padding: 20,

                        font: {
                            size: 11,
                        },
                    }
                },
            },
        },
    });

}

</script>

@endpush