<x-app-layout>
    @if (Auth::user()->hasRole('csr'))
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard for csr') }}
        </h2>
    </x-slot>
    @endif

    @if (Auth::user()->hasRole(['user','csr']))
        <div class="px-30">
            <div class="p-6 bg-white border-b border-gray-200">
                {{ Auth::user()->name }}<br>
            </div>
        </div>
    @endif
    @if (Auth::user()->hasRole('admin'))
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="row">
                    <div class="color col-md-3 card ml-5 my-2 p-3 ">
                        <div class="flex  text-white">
                            <p class="col-sm-4 font-bold mt-2 ">Total</p>
                            <div class="flex col-sm-2">

                                <i class="fa fa-shopping-cart "></i>
                                <h1 class="ml-3">{{ $data }}</h1>
                            </div>
                        </div>

                    </div>
                    <div class="green col-md-3 card my-2 ml-5 p-3">
                        <div class="row text-white">
                            <p class="col-sm-4 font-bold mt-2">Resolve</p>
                            <div class="flex col-sm-2">
                                <i class="fa fa-check-square"></i>
                                <h1 class="ml-3">{{ $dataa }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="red col-md-3 card ml-5 my-2 p-3 ">
                        <div class="flex  text-white">
                            <p class="col-sm-5 font-bold mt-2">Pending</p>
                            <div class="flex col-sm-2">
                                <i class="fa fa-minus-square-o"></i>
                                <h1 class="ml-3">{{ $pending }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
             <div class="flex">
                <div class="mt-4 col-md-6">
                    <canvas id="myChart" style="width:100%;max-width:800px"></canvas>
                </div>
                  <div class="mt-4 col-md-6">
                    <canvas id="myChartt" style="width:100%;max-width:800px"></canvas>
                </div>
            </div>
            </div>
        </div>
    @endif
</x-app-layout>

<style>
    .color {
        background-color: #2b5797
    }

    .color i {
        font-size: 60px;
    }

    .green {
        background-color: #64f38c;
        width: 100%;
    }

    .green i {
        font-size: 60px;
    }

    .red {
        background-color: #f85032
    }

    .red i {
        font-size: 60px;
    }
</style>

<script>
    var xValues = ["Total", "Resolve", "Pending"];
    var yValues = [{{ $data }}, {{ $dataa }}, {{ $pending }}];
    var barColors = [
        "#f5f832",
        "#64f38c",
        "#f85032",
    ];

    new Chart("myChart", {
        type: "pie",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            title: {
                display: true,
                text: "Complaints 2022"
            }
        }
    });

    var xValues = ["DT", "Bootcamp", "incubator","Elite", "csr", "digitalmarketing","vbc","meetups","teachers","services"];
    var yValues = [{{ $dt }}, {{ $Bootcamp}}, 7, {{ $Elite}}, {{ $csr}}, {{ $digitalmarketing}}, {{$vbc}}, {{$meetups}}, {{$teachers}}, {{$services}}];
    var barColors = [
        "#f5f832",
        "#64f38c",
        "#f85032",
        "#f5f832",
        "#64f38c",
        "#f85032",
        "#f5f832",
        "#64f38c",
        "#f85032",
        "#f85032",
    ];

    new Chart("myChartt", {
        type: "pie",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            title: {
                display: true,
                text: "Departments"
            }
        }
    });
</script>
