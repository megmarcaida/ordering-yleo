<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
            <a href="/add-product" class="btn btn-primary" style="float:right;">ADD PRODUCT</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 table-responsive">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div id="message"></div>
                                <form method="get">
                                    <input type="search" name="q" class="form-control typeahead" value="" placeholder="Product search...">
                                </form>
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">SKU</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">PV</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Unit</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $k => $value)
                                        <tr>
                                            <td><a href="/product-info/{{ $value->id }}">{{  $value->product_sku }}</a></td>
                                            <td>{{  $value->product_name }}</td>
                                            <td>{{  $value->product_category }}</td>
                                            <td>{{  $value->product_price }}</td>
                                            <td>{{  $value->product_pv }}</td>
                                            <td>{{  $value->product_qty }}</td>
                                            <td>{{  $value->product_unit }}</td>
                                            <td>@if( $value->enabled == 1)
                                                    <p class="text-success">Enabled</p>
                                                @else
                                                    <p class="text-danger">Disabled</p>
                                                @endif
                                            </td>
                                            <td><a data-id="{{ $value->id }}" class="btn btn-danger btn-delete">Delete</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $products->appends(['q' => request()->get('q')])->links() }}
                                
                            </div>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(".btn-delete").on('click',function(){

            if(confirm("Are you sure you want to delete this product permanently?")){
                var id = $(this).attr('data-id')
                
                var path = "{{ route('delete-product') }}";
                $.get(path, {id: id}, function(data){
                    $("#message").html("<div class='alert alert-success'>"+ data + "</div>")
                    window.location = '/products'
                });
            }

        })
        var path = "{{ route('autocomplete') }}";
        function initTypeahead() {
            // Should probably add code here to only grab elements that are not already initialized
            var elements = $('input.typeahead');
            $(elements).typeahead({
                source:  function (query, process) {
                return $.get(path+"?order_type=", { query: query }, function (data) {
                        return process(data);
                    });
                }
            });
        }
        
        initTypeahead();
    </script>
</x-app-layout>
