<x-guest-layout>
    
    <form method="post">
    @csrf
    <div class="container">
        <a href="/">
            <img style="width:20%;" src="https://images.ctfassets.net/qx1dg9syx02d/5oUBHKJeQvkrp1ZFH4DnXu/d17b5dd51ef5150c2f6b78fdf6cbb310/yl-logo-color.svg" />
        </a>
        <br>
        @if($message)
        <div class="alert alert-success" role="alert">
            {{ $message }} <br> Submit another request? <a href="/order-form">Click Here</a>
        </div>
        <script>
            setTimeout(function(){
                $("#customer_info").hide();
                $("#table_data").hide();
                $("#payment_method").hide();
                $("#last_four_digit").hide();
                $("#queue_block").hide();
                $("#buttons_block").hide();
                $("h2").hide();
            },500)
            
        </script>  
        @endif
        <h2>Order Form</h2>
        <div id="customer_info" class="row">
            
            <div class="col">
                <div class="mb-3">
                    <label for="member_id" class="form-label">Member ID</label>
                    <input type="text" class="form-control" name="member_id" required>
                </div>
                <div class="mb-3">
                    <label for="member_name" class="form-label">Member Name</label>
                    <input type="text" class="form-control" name="member_name" required>
                </div>
            </div>

            <div class="col">
                <div class="mb-3">
                    <label for="member_pin" class="form-label">Pin</label>
                    <input type="text" class="form-control" name="member_pin" required>
                </div>
                <div class="mb-3">
                    <label for="order_type" class="form-label">Order Type</label>
                    <select id="order_type" class="form-select" name="order_type" required>
                    <option selected value="">Select</option>
                    <option value="QO">QO</option>
                    <option value="ER">ER</option>
                    <option value="Points">Points</option>
                    </select>
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
                            <tr>
                                <td> <input id="product_id_1" class="typeahead form-control" name="product_id[]" type="hidden"> 1</td>
                                <td> <input id="product_name_1" data-no="1" class="typeahead form-control" name="product_name[]" type="text"></td>
                                <td> <input id="product_qty_1" class="form-control" name="product_qty[]" type="number"></td>
                                <td> <input id="product_pv_1"class="form-control" type="text" name="product_pv[]" readonly></td>
                                <td> <input id="product_unit_price_1"class="form-control" type="text" name="product_unit_price[]" readonly></td>
                                <td> <input id="product_sku_1"class="form-control" type="text" name="product_sku[]" readonly></td>
                                <td> <input id="product_total_price_1" class="form-control" name="product_total_price[]"  type="text" readonly></td>
                                <td> <input id="product_total_pv_1" class="form-control" name="product_total_pv[]" type="text" readonly></td>
                            </tr>
                            <tr>
                                <td> <input id="product_id_2" class="typeahead form-control" name="product_id[]" type="hidden"> 2</td>
                                <td> <input id="product_name_2" data-no="2" class="typeahead form-control" name="product_name[]" type="text"></td>
                                <td> <input id="product_qty_2" class="form-control" name="product_qty[]"  type="number"></td>
                                <td> <input id="product_pv_2"class="form-control" type="text" name="product_pv[]" readonly></td>
                                <td> <input id="product_unit_price_2"class="form-control" type="text" name="product_unit_price[]" readonly></td>
                                <td> <input id="product_sku_2"class="form-control" type="text" name="product_sku[]" readonly></td>
                                <td> <input id="product_total_price_2" class="form-control" name="product_total_price[]" type="text" readonly></td>
                                <td> <input id="product_total_pv_2" class="form-control" name="product_total_pv[]" type="text" readonly></td>
                            </tr>
                            <tr>
                                <td> <input id="product_id_3" class="typeahead form-control" name="product_id[]" type="hidden"> 3</td>
                                <td> <input id="product_name_3" data-no="3" class="typeahead form-control" name="product_name[]" type="text"></td>
                                <td> <input id="product_qty_3" class="form-control" name="product_qty[]"  type="number"></td>
                                <td> <input id="product_pv_3"class="form-control" type="text" name="product_pv[]" readonly></td>
                                <td> <input id="product_unit_price_3"class="form-control" type="text" name="product_unit_price[]" readonly></td>
                                <td> <input id="product_sku_3"class="form-control" type="text" name="product_sku[]" readonly></td>
                                <td> <input id="product_total_price_3" class="form-control" name="product_total_price[]" type="text" readonly></td>
                                <td> <input id="product_total_pv_3" class="form-control" type="text" name="product_total_pv[]" readonly></td>
                            </tr>
                            <tr>
                                <td> <input id="product_id_4" class="typeahead form-control" name="product_id[]" type="hidden"> 4</td>
                                <td> <input id="product_name_4" data-no="4" class="typeahead form-control" name="product_name[]" type="text"></td>
                                <td> <input id="product_qty_4" class="form-control" name="product_qty[]"  type="number"></td>
                                <td> <input id="product_pv_4"class="form-control" type="text" name="product_pv[]" readonly></td>
                                <td> <input id="product_unit_price_4"class="form-control" type="text" name="product_unit_price[]" readonly></td>
                                <td> <input id="product_sku_4"class="form-control" type="text" name="product_sku[]" readonly></td>
                                <td> <input id="product_total_price_4" class="form-control" name="product_total_price[]" type="text" readonly></td>
                                <td> <input id="product_total_pv_4" class="form-control" type="text" name="product_total_pv[]" readonly></td>
                            </tr>
                            <tr>
                                <td> <input id="product_id_5" class="typeahead form-control" name="product_id[]" type="hidden"> 5</td>
                                <td> <input id="product_name_5" data-no="5" class="typeahead form-control" name="product_name[]" type="text"></td>
                                <td> <input id="product_qty_5" class="form-control" name="product_qty[]"  type="number"></td>
                                <td> <input id="product_pv_5"class="form-control" type="text" name="product_pv[]" readonly></td>
                                <td> <input id="product_unit_price_5"class="form-control" type="text" name="product_unit_price[]" readonly></td>
                                <td> <input id="product_sku_5"class="form-control" type="text" name="product_sku[]" readonly></td>
                                <td> <input id="product_total_price_5" class="form-control" name="product_total_price[]" type="text" readonly></td>
                                <td> <input id="product_total_pv_5" class="form-control" type="text" name="product_total_pv[]" readonly></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="payment_method" class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="member_pin" class="form-label">Payment Method</label>
                    <select class="form-select payment_method" required name="payment_method">
                        <option value="card_on_file">Card on File</option>
                        <option value="swipe_card">Swipe Card</option>
                        <option value="cash">CASH</option>
                        <option value="account_card">Account Credit</option>
                    </select>
                </div>
            </div>
        </div>
        <div id="last_four_digit" class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="member_pin" class="form-label">Last 4 digit</label>
                    <input type="password" class="form-control" name="last_four_digit">
                </div>
            </div>
        </div>
        <div id="queue_block" style="display:none;" class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="member_pin" class="form-label">Queue Number</label>
                    <input type="text" class="form-control" name="queue_number" required>
                </div>
            </div>
        </div>
        <div id="buttons_block" class="row">
            <div class="col">
                <div class="d-grid gap-2">
                    <button id="btn-back" style="display:none;" class="btn btn-danger btn-block">BACK</button>
                    <button id="btn-complete" class="btn btn-primary btn-block">COMPLETE</button>
                    <button id="btn-submit" style="display:none;" type="submit" class="btn btn-primary btn-block">SUBMIT</button>
                </div>
            </div>
        </div>
        
    </div>
    
    </form>
    <script type="text/javascript">
    var path = "{{ route('autocomplete') }}";
    
    $('input.typeahead').typeahead({
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        },
        updater: function(item) {
            setProduct(item,this);
           
            return item;
        }
    });

    function setProduct(item,val){
        var path = "{{ route('get-product-by-name') }}";
        $.get(path, {item: item}, function(data){
            var ret = data[0];
            var id = val.$element.attr('data-no');
            var qty = ret.product_qty;
            var qty = ret.;
            var product_id = ret.id;
            var price = ret.product_price;
            var pv = ret.pv;
            var sku = ret.product_sku;
            var total_price = qty * price;
            var total_pv = qty * pv


            $("#product_id_"+id).val(product_id)
            $("#product_qty_"+id).val(1)
            $("#product_qty_"+id).attr("max",qty)
            $("#product_qty_"+id).attr("min",1)
            $("#product_total_price_"+id).val(total_price)
            $("#product_total_pv_"+id).val(total_pv)
            $("#product_unit_price_"+id).val(price)
            $("#product_sku_"+id).val(sku)
            $("#product_pv_"+id).val(pv)
          

        });
    }

    $("#order_type").on("change",function(){
        var selected = $("#order_type option:selected").val();

        if(selected == "Points"){
            $("#payment_method").hide();
            $("#last_four_digit").hide();
            $("input[name=last_four_digit]").val("");
            $(".payment_method").removeAttr("required")
        }else{
            $("#payment_method").show();
            $("#last_four_digit").show();
        }
    });

    $("#payment_method").on("change",function(){
        var selected = $("#payment_method option:selected").val();
        console.log(selected)
        if(selected == "card_on_file"){
            $("#last_four_digit").show();
        }else{
            $("#last_four_digit").hide();
            $("input[name=last_four_digit]").val("");
        }
    });

    $("#btn-complete").on("click",function(){

        if($("#member_name").val() == "" || $("#member_pin").val() == "" || $("#member_id").val() == "" || $("#order_type").val() == ""){
            alert("Please fill in the fields")
            return false;
        }

        $("#btn-submit").show();
        $("#btn-back").show();
        $(this).hide();
        $("#customer_info").hide();
        $("#table_data").hide();
        $("#payment_method").hide();
        $("#last_four_digit").hide();
        $("#queue_block").show();
        return false;
    });

    $("#btn-back").on("click",function(){
        $("#btn-submit").hide();
        $(this).hide();
        $("#customer_info").show();
        $("#table_data").show();
        $("#payment_method").show();
        $("#last_four_digit").show();
        $("#queue_block").hide();
        $("#btn-complete").show();
        return false;
    });

   
</script>
</x-guest-layout>
