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
                $("#btn-add-more").hide();
                $("#select-pages").hide();
                $("h2").hide();
            },500)
            
        </script>  
        @endif
        <h2>Order Form </h2>
            <div id="select-pages">
                    <select id="current_page" name="current_page" required>
                        <option selected value="">Select</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
            out of 

                    <select id="total_page" name="total_page" required>
                        <option selected value="">Select</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
            </div>
        
        <a href="/" style="float:right;" class="btn btn-danger">BACK</a>
        <br><br>
        <div id="customer_info" class="row">
            
            <div class="col">
                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="text" class="form-control" value="{{ $date }}" name="date" readonly required>
                </div>
                <div class="mb-3">
                    <label for="experience_center" class="form-label">Experience Center</label>
                    <select id="experience_center" class="form-select" name="experience_center" required>
                        <option selected value="">Select</option>
                        <option value="manila">Manila</option>
                        <option value="davao">Davao</option>
                    </select>
                </div>
            </div>
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
                        <option value="ER">Essential Rewards</option>
                        <option value="QO">Quick Orders</option>
                        <option value="Points">Reward Points</option>
                    </select>
                </div>
            </div>

            
            <div class="col">
                <div class="mb-3">
                    <label for="member_pin" class="form-label">Total PV</label>
                    <input id="total_pv" type="text" class="form-control input" name="total_pv" readonly>
                </div>
                <div class="mb-3">
                    <label for="member_pin" class="form-label">Total Price</label>
                    <input id="total_price" type="text" class="form-control input" name="total_price" readonly>
                </div>
            </div>
        </div>
        <div id="table_data" class="row">
            
            <div class="col table-responsive">
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
                                <td> <input id="product_id_1" class="typeahead form-control input" name="product_id[]" type="hidden"> <a class="clear_row" href="javascript:void(0)" data-id="1">1</a></td>
                                <td> <input id="product_name_1" data-no="1" class="typeahead form-control input disabled" name="product_name[]" type="text"></td>
                                <td> <input id="product_qty_1" data-no="1" class="form-control input calculate disabled" name="product_qty[]" type="number"></td>
                                <td> <input id="product_pv_1"class="form-control input" type="text" name="product_pv[]" readonly></td>
                                <td> <input id="product_unit_price_1"class="form-control input" type="text" name="product_unit_price[]" readonly></td>
                                <td> <input id="product_sku_1"class="form-control input" type="text" name="product_sku[]" readonly></td>
                                <td> <input id="product_total_price_1" class="form-control input" name="product_total_price[]"  type="text" readonly></td>
                                <td> <input id="product_total_pv_1" class="form-control input" name="product_total_pv[]" type="text" readonly></td>
                            </tr>
                            <tr>
                                <td> <input id="product_id_2" class="typeahead form-control input" name="product_id[]" type="hidden"><a class="clear_row" href="javascript:void(0)" data-id="2"> 2</a></td>
                                <td> <input id="product_name_2" data-no="2" class="typeahead form-control input disabled" name="product_name[]" type="text"></td>
                                <td> <input id="product_qty_2" data-no="2" class="form-control input calculate disabled" name="product_qty[]"  type="number"></td>
                                <td> <input id="product_pv_2"class="form-control input" type="text" name="product_pv[]" readonly></td>
                                <td> <input id="product_unit_price_2"class="form-control input" type="text" name="product_unit_price[]" readonly></td>
                                <td> <input id="product_sku_2"class="form-control input" type="text" name="product_sku[]" readonly></td>
                                <td> <input id="product_total_price_2" class="form-control input" name="product_total_price[]" type="text" readonly></td>
                                <td> <input id="product_total_pv_2" class="form-control input" name="product_total_pv[]" type="text" readonly></td>
                            </tr>
                            <tr>
                                <td> <input id="product_id_3" class="typeahead form-control input" name="product_id[]" type="hidden"> <a class="clear_row" href="javascript:void(0)" data-id="3">3</a></td>
                                <td> <input id="product_name_3" data-no="3" class="typeahead form-control input disabled" name="product_name[]" type="text"></td>
                                <td> <input id="product_qty_3" data-no="3" class="form-control input calculate disabled" name="product_qty[]"  type="number"></td>
                                <td> <input id="product_pv_3"class="form-control input" type="text" name="product_pv[]" readonly></td>
                                <td> <input id="product_unit_price_3"class="form-control input" type="text" name="product_unit_price[]" readonly></td>
                                <td> <input id="product_sku_3"class="form-control input" type="text" name="product_sku[]" readonly></td>
                                <td> <input id="product_total_price_3" class="form-control input" name="product_total_price[]" type="text" readonly></td>
                                <td> <input id="product_total_pv_3" class="form-control input" type="text" name="product_total_pv[]" readonly></td>
                            </tr>
                            <tr>
                                <td> <input id="product_id_4" class="typeahead form-control input" name="product_id[]" type="hidden"> <a class="clear_row" href="javascript:void(0)" data-id="4">4</a> </td>
                                <td> <input id="product_name_4" data-no="4" class="typeahead form-control input disabled" name="product_name[]" type="text"></td>
                                <td> <input id="product_qty_4" data-no="4" class="form-control input calculate disabled" name="product_qty[]"  type="number"></td>
                                <td> <input id="product_pv_4"class="form-control input" type="text" name="product_pv[]" readonly></td>
                                <td> <input id="product_unit_price_4"class="form-control input" type="text" name="product_unit_price[]" readonly></td>
                                <td> <input id="product_sku_4"class="form-control input" type="text" name="product_sku[]" readonly></td>
                                <td> <input id="product_total_price_4" class="form-control input" name="product_total_price[]" type="text" readonly></td>
                                <td> <input id="product_total_pv_4" class="form-control input" type="text" name="product_total_pv[]" readonly></td>
                            </tr>
                            <tr>
                                <td> <input id="product_id_5" class="typeahead form-control input" name="product_id[]" type="hidden"> <a class="clear_row" href="javascript:void(0)" data-id="5">5</a></td>
                                <td> <input id="product_name_5" data-no="5" class="typeahead form-control input disabled" name="product_name[]" type="text"></td>
                                <td> <input id="product_qty_5" data-no="5" class="form-control input calculate disabled" name="product_qty[]"  type="number"></td>
                                <td> <input id="product_pv_5"class="form-control input" type="text" name="product_pv[]" readonly></td>
                                <td> <input id="product_unit_price_5"class="form-control input" type="text" name="product_unit_price[]" readonly></td>
                                <td> <input id="product_sku_5"class="form-control input" type="text" name="product_sku[]" readonly></td>
                                <td> <input id="product_total_price_5" class="form-control input" name="product_total_price[]" type="text" readonly></td>
                                <td> <input id="product_total_pv_5" class="form-control input" type="text" name="product_total_pv[]" readonly></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="buttons_add_row" class="row">
            <div class="col"></div>
            <div class="col-12 col-lg-4">
                <div class="d-grid gap-2">
                    <a id="btn-add-more" class="btn btn-danger btn-block">ADD MORE</a>
                    <br>
                </div>
            </div>
            <div class="col"></div>
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
                    <input type="password" class="form-control input" name="last_four_digit">
                </div>
            </div>
        </div>
        <div id="queue_block" style="display:none;" class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="member_pin" class="form-label">Queue Number</label>
                    <input type="text" class="form-control input" name="queue_number" required>
                </div>
            </div>
        </div>
        <div id="buttons_block" class="row">
            <div class="col">
                <div class="d-grid gap-2">
                    <button id="btn-back" style="display:none;" class="btn btn-danger btn-block">BACK</button>
                    <button id="btn-complete" class="btn btn-primary btn-block">COMPLETE</button>
                    <button id="btn-submit" style="display:none;" type="submit" class="btn btn-primary btn-block">SUBMIT</button>
                    <div id="terms" style="display:none;">
                        <p class="text-center fst-italic fw-bold">By submitting this form, you are aware that all information provided is kept strictly confidential.</p>
                    </div> 
                </div>
            </div>
        </div>
        
    </div>
    
    </form>
    <script type="text/javascript">
    var path = "{{ route('autocomplete') }}";
    var total_price = 0;
    var total_pv = 0;
    var order_type = "";
    $(".disabled").prop('readonly',true)

    function initTypeahead() {
        // Should probably add code here to only grab elements that are not already initialized
        var elements = $('input.typeahead');
        $(elements).typeahead({
            source:  function (query, process) {
            return $.get(path+"?order_type="+order_type, { query: query }, function (data) {
                    return process(data);
                });
            },
            updater: function(item) {
                setProduct(item,this);
                setTimeout(function(){
                    calculateTotal()
                },500)
                
                return item;
            }
        });

    }
    
    initTypeahead();

    function setProduct(item,val){
        var path = "{{ route('get-product-by-name') }}";
        $.get(path, {item: item}, function(data){
            var ret = data[0];
            var id = val.$element.attr('data-no');
            var qty = ret.product_qty;
            var with_limit_qty = ret.with_limit_qty;
            var product_id = ret.id;
            var price = ret.product_price;
            var pv = ret.pv;
            var sku = ret.product_sku;
            var total_price = 1 * price;
            var total_pv = 1 * pv


            $("#product_id_"+id).val(product_id)
            $("#product_qty_"+id).val(1)
            if(with_limit_qty != "NO"){
                $("#product_qty_"+id).attr("max",with_limit_qty)
            }
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
        order_type = selected
        $(".input").val('')
        if(selected != ""){
            $(".disabled").removeAttr("readonly")
        }else{
            $(".disabled").prop('readonly',true)
        }
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

        if($("#member_name").val() == "" || $("#member_pin").val() == "" || $("#member_id").val() == "" || $("#order_type").val() == "" || $("#experience_center option:selected").val() == "" || $("#current_page option:selected").val() == "" || $("#total_page option:selected").val() == ""){
            alert("Please fill in the fields")
            return false;
        }

        $("#btn-submit").show();
        $("#terms").show();
        $("#btn-back").show();
        $(this).hide();
        $("#customer_info").hide();
        $("#table_data").hide();
        $("#payment_method").hide();
        $("#btn-add-more").hide();
        $("#last_four_digit").hide();
        $("#queue_block").show();
        $("#select-pages").hide();
        return false;
    });

    $("#btn-back").on("click",function(){
        $("#btn-submit").hide();
        $("#terms").hide();
        $(this).hide();
        $("#customer_info").show();
        $("#table_data").show();
        $("#payment_method").show();
        $("#btn-add-more").show();
        $("#last_four_digit").show();
        $("#queue_block").hide();
        $("#btn-complete").show();
                $("#select-pages").show();
        return false;
    });

    
    $(".calculate").on("change",function(){
        var qty = $(this).val();
        var id = $(this).attr("data-no")
        var price = $("#product_unit_price_"+id).val();
        var pv = $("#product_pv_"+id).val();

        $("#product_total_price_"+id).val(qty*price)
        $("#product_total_pv_"+id).val(qty*pv)

        calculateTotal()

    })

    function calculateTotal(){
        var totalPv = 0;
        var totalPrice = 0;
        for(var i = 1; i<= 5; i++){
            console.log($("#product_total_pv_"+i).val())
            if($("#product_total_pv_"+i).val() != ""){
                totalPv += parseFloat($("#product_total_pv_"+i).val())
            }

            if($("#product_total_price_"+i).val() != ""){
                totalPrice += parseFloat($("#product_total_price_"+i).val())
            }
        }
        $("#total_pv").val(totalPv)
        $("#total_price").val(totalPrice)
    }

    var current_count = 5
    $("#btn-add-more").on("click",function(){
        var selected = $("#order_type option:selected").val();
        if(selected == ''){
            alert("Please select order type")
            return false;
        }
        var num_to_add = 5;
        for(var i = 1; i <= num_to_add;i++){
            $("table.order_product tbody").append('<tr><td> <input id="product_id_'+(current_count+i)+'" class="typeahead form-control input" name="product_id[]" type="hidden"><a class="clear_row" href="javascript:void(0)" data-id="'+(current_count+i)+'">'+(current_count+i)+'</a></td><td> <input id="product_name_'+(current_count+i)+'" data-no="'+(current_count+i)+'" class="typeahead form-control input disabled" name="product_name[]" type="text"></td><td> <input id="product_qty_'+(current_count+i)+'" data-no="'+(current_count+i)+'" class="form-control input calculate disabled" name="product_qty[]"  type="number"></td><td> <input id="product_pv_'+(current_count+i)+'"class="form-control input" type="text" name="product_pv[]" readonly></td><td> <input id="product_unit_price_'+(current_count+i)+'"class="form-control input" type="text" name="product_unit_price[]" readonly></td><td> <input id="product_sku_'+(current_count+i)+'" class="form-control input" type="text" name="product_sku[]" readonly></td><td> <input id="product_total_price_'+(current_count+i)+'" class="form-control input" name="product_total_price[]" type="text" readonly></td><td> <input id="product_total_pv_'+(current_count+i)+'" class="form-control input" type="text" name="product_total_pv[]" readonly></td></tr>')
            initTypeahead();
        }

        $(".clear_row").on('click',function(){
            if(confirm("Do you want to clear this row?")){
                var id = $(this).attr("data-id")
                $("#product_name_"+id).val('')
                $("#product_qty_"+id).val('')
                $("#product_pv_"+id).val('')
                $("#product_unit_price_"+id).val('')
                $("#product_sku_"+id).val('')
                $("#product_total_price_"+id).val('')
                $("#product_total_pv_"+id).val('')
                calculateTotal()
            }
            
        })
       
        current_count += num_to_add;
    })

    $(".clear_row").on('click',function(){
        if(confirm("Do you want to clear this row?")){
            var id = $(this).attr("data-id")
            $("#product_name_"+id).val('')
            $("#product_qty_"+id).val('')
            $("#product_pv_"+id).val('')
            $("#product_unit_price_"+id).val('')
            $("#product_sku_"+id).val('')
            $("#product_total_price_"+id).val('')
            $("#product_total_pv_"+id).val('')
            calculateTotal()
        }
        
    })

   
</script>
</x-guest-layout>
