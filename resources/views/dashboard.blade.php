<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">
                        <div class="row row-cols-1 row-cols-md-3 g-4">

                            @foreach($orders as $k => $v)
                            <div class="col">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h1 class="card-title text-primary">{{ $v->queue_number }}</h1>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
