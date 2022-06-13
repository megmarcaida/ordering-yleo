<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 table-responsive">
                    <div class="container-fluid">
                        <div class="row">
                            <form method="get">
                                <input type="search" name="q" class="form-control typeahead" value="" placeholder="input queuebee number and press enter...">
                            </form>
                            <div id="refresh_div" class="col">
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">Queue #</th>
                                        <th scope="col">Customer Name</th>
                                        <th scope="col">Customer Pin</th>
                                        <th scope="col">Customer Member ID</th>
                                        <th scope="col">Order Type</th>
                                        <th scope="col">Payment Method</th>
                                        <th scope="col">Total Qty</th>
                                        <th scope="col">Total Price</th>
                                        <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $k => $value)
                                        <tr>
                                            <td><a href="/complete-form/{{ $value->queue_number }}">{{  $value->queue_number }}</a></td>
                                            <td>{{  $value->customer_name }}</td>
                                            <td>{{  $value->customer_pin }}</td>
                                            <td>{{  $value->customer_member_id }}</td>
                                            <td>{{  $value->order_type }}</td>
                                            <td>@if($value->payment_method == "card_on_file")
                                                Card on File
                                                @elseif($value->payment_method == "swipe_card")
                                                Swipe Card
                                                @elseif($value->payment_method == "cash")
                                                CASH
                                                @elseif($value->payment_method == "account_card")
                                                Account Credit
                                                @endif
                                            </td>
                                            <td>{{  $value->total_qty }}</td>
                                            <td>{{  $value->total_price }}</td>
                                            <td>@if( $value->status == 1)
                                                    <p class="text-danger">Pending</p>
                                                @else
                                                    <p class="text-success">Completed</p>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $orders->appends(['q' => request()->get('q')])->links() }}
                            </div>
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
