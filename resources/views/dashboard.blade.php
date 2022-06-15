<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard for admin') }}
        </h2>
    </x-slot>

    @if (Auth::user()->hasRole('admin'))

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="row">
            <div class="color col-md-3 card ml-6 ">
                <div class="flex ml-10 text-white">
                <i class="fa fa-shopping-cart "></i>
                <h1  class="ml-3">{{$data}}</h1>
            </div>

                <p>Total</p>
            </div>
            <div class="green col-md-3 card  ml-5">
                <div class="flex ml-10 text-white">
                <i class="fa fa-check-square "></i>
                <h1 class="ml-3">{{$dataa}}</h1>
            </div>
                <p>Resolve</p>
            </div>
            <div class="red col-md-3 card ml-5 ">
                <div class="flex ml-10 text-white">
                <i class="fa fa-minus-square-o"></i>
                <h1  class="ml-3">{{$pending}}</h1>
            </div>
                <p class="ml-3">Pending</p>
            </div>
        </div>
        </div>
    </div>
    @endif
</x-app-layout>


<style>
    .color {
        background-color: #A7BFE8

    }

    .color i {
       font-size: 60px;
    }
    .color p {
       color: gray;
       margin-left: 100px;
    }
    .green {
        background-color: #64f38c;

    }

    .green i {
       font-size: 60px;
    }
    .green p {
       color: gray;
       margin-left: 100px;
    }


    .red {
        background-color: #f85032
    }

    .red i {
       font-size: 60px;
    }
    .red p {
       color: gray;
       margin-left: 100px;
    }
</style>
