<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Queuebee Numbers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div id="refresh_div" class="container ">
                        <div class="row row-cols-1 row-cols-md-3 g-4">

                            @foreach($orders as $k => $v)
                            <a href="/complete-form/{{ $v->queue_number }}" style="text-decoration:none">
                                <div class="col">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h1 class="card-title text-primary">{{ $v->queue_number }}</h1>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endforeach

                            @foreach($pickup_orders as $k => $v)
                            <a href="/complete-pickup-form/{{ $v->id }}" style="text-decoration:none">
                                <div class="col">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h1 class="card-title text-warning">{{ $v->queue_number }}</h1>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        setInterval(function(){
            $('#refresh_div').load(location.href+(' #refresh_div'));
        },3000)
         
    </script>
</x-app-layout>
