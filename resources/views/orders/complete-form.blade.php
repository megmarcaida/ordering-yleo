<x-guest-layout>
    
    <style>
        input{
            border: none !important;
            background: transparent !important;
        }
    </style>
    <div class="container print">
        <a href="/admin">
            <img style="width:20%;" src="https://images.ctfassets.net/qx1dg9syx02d/5oUBHKJeQvkrp1ZFH4DnXu/d17b5dd51ef5150c2f6b78fdf6cbb310/yl-logo-color.svg" />
        </a>
        <br>
        <div class="alert alert-success message" style="display:none;" role="alert">
            Successfully Completed Order!
        </div>
        <h3>Order Form - Queuebee #{{ $merge[0]['queue_number'] }}
            <a href="#" id="btn-done" data-id="{{ $merge[0]['queue_number'] }}" style="float:right;" class="btn btn-danger">DONE</a>
            <a href="javascript:void(0)" style="float:right;" onclick = "window.print()" class="btn btn-success">PRINT</a></h3>
        <br>
        @foreach($merge as $k => $v)
        <h5>Order {{ $v['current_page'] }} out of {{ $v['total_page'] }}</h5>
        <br>
        <div id="customer_info" class="row">
            
            <div class="col">
                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="text" class="form-control fw-bold" value="{{ $v['date'] }}" name="date" readonly>
                </div>
                <div class="mb-3">
                    <label for="experience_center" class="form-label">Experience Center</label>
                    <input type="text" class="form-control fw-bold" value="{{ ucfirst($v['experience_center']) }}" name="date" readonly>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="member_id" class="form-label">Member ID</label>
                    <input type="text" class="form-control fw-bold" value="{{ $v['customer_member_id'] }}" name="member_id" readonly>
                </div>
                <div class="mb-3">
                    <label for="member_name" class="form-label">Member Name</label>
                    <input type="text" class="form-control fw-bold" value="{{ $v['customer_name'] }}" name="member_name" readonly>
                </div>
            </div>

            <div class="col">
                <div class="mb-3">
                    <label for="member_pin" class="form-label">Pin</label>
                    <input type="text" class="form-control fw-bold" value="{{ $v['customer_pin'] }}" name="member_pin" readonly>
                </div>
                <div class="mb-3">
                    <label for="order_type" class="form-label">Order Type</label>
                    @if($v['order_type'] == "QO")
                    <input type="text" class="form-control fw-bold" value="Quick Orders" name="order_type" readonly>
                    @elseif($v['order_type'] == "ER")
                    <input type="text" class="form-control fw-bold" value="Essential Rewards" name="order_type" readonly>
                    @elseif($v['order_type'] == "Points")
                    <input type="text" class="form-control fw-bold" value="Reward Points" name="order_type" readonly>
                    @endif
                </div>
            </div>

            
            <div class="col">
                <div class="mb-3">
                    <label for="total_pv" class="form-label">Total PV</label>
                    <input type="text" class="form-control fw-bold" value="{{ $v['total_pv'] }}" name="total_pv" readonly>
                </div>
                <div class="mb-3">
                    <label for="total_price" class="form-label">Total Price</label>
                    <input type="text" class="form-control fw-bold" value="{{ $v['total_price'] }}" name="total_price" readonly>
                </div>
            </div>
        </div>
        <div id="table_data" class="row table-responsive">
            
            <div class="col">
                <div class="mb-6">
                    <table class="table order_product">
                        <thead>
                            <tr>
                            <th scope="col">Item</th>
                            <th scope="col">Description</th>
                            <th scope="col">QTY</th>
                            <th scope="col">PV</th>
                            <th scope="col">Unit Price</th>
                            <th scope="col">SKU</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Total PV</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($v['order_details'] as $k => $val)
                            <tr>
                                <td>{{ $k+1 }}</td>
                                <td>{{ $val['product_name'] }}</td>
                                <td>{{ $val['qty_ordered'] }}</td>
                                <td>{{ $val['pv'] }}</td>
                                <td>{{ $val['price'] }}</td>
                                <td>{{ $val['product_sku'] }}</td>
                                <td>{{ $val['total_price'] }}</td>
                                <td>{{ $val['total_pv'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="payment_method" class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="member_pin" class="form-label">Payment Method</label>
                    
                    <?php if( $v['payment_method'] == "card_on_file" ) { ?>
                    <input type="text" class="form-control fw-bold" value="Card on File" name="order_type" readonly>
                    <?php } elseif($v['payment_method'] == "swipe_card") { ?>
                    <input type="text" class="form-control fw-bold" value="Swipe Card" name="order_type" readonly>
                    <?php } elseif($v['payment_method'] == "cash") { ?>
                    <input type="text" class="form-control fw-bold" value="CASH" name="order_type" readonly>
                    <?php } elseif($v['payment_method'] == "account_card") { ?>
                    <input type="text" class="form-control fw-bold" value="Account Credit" name="order_type" readonly>
                    <?php } ?>
                </div>
            </div>
        </div>
        @if($v['payment_method'] == "card_on_file")
        <div id="last_four_digit" class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="last_four_digit" class="form-label">Last 4 digit</label>
                    <input type="text" class="form-control fw-bold" value="{{ $v['last_four_digit'] }}" readonly>
                </div>
            </div>
        </div>
        @endif
        <hr>
        @endforeach
    </div>
    <script>
        $("#btn-done").on('click',function(){
            
            var path = "/update-status/{{ $merge[0]['queue_number'] }}";
            $.get(path, function(data){
                console.log(data)        
                if(JSON.parse(data) =="Updated"){
                    $(".message").attr("style","display:block")
                    setTimeout(function(){
                        $(".message").fadeOut()
                        window.location = "/admin"
                    },2000)
                    
                }
            });
        })
    </script>
</x-guest-layout>
