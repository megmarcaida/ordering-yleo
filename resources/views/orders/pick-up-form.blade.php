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
            {{ $message }} <br> Submit another request? <a href="/pick-up-form">Click Here</a>
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
                $("h2").hide();
            },500)
            
        </script>  
        @endif
        <h2>Pick Up Form <a href="/" style="float:right;" class="btn btn-danger">BACK</a></h2>
        <br>
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
        </div>
        <div id="table_data" class="row">
            
            <div class="col table-responsive">
                <div class="mb-6">
                    <table class="table order_product">
                        <thead>
                            <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">PIN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> <input id="order_id_1" data-no="1" class="form-control input" name="order_id[]" type="text"></td>
                                <td> <input id="pin_1" data-no="1" class="form-control input calculate" name="pin[]" type="number"></td>
                            </tr>
                            <tr>
                                <td> <input id="order_id_2" class="form-control input" name="order_id[]" type="text"></td>
                                <td> <input id="pin_2" data-no="2" class="form-control input" name="pin[]" type="text"></td>
                            </tr>
                            <tr>
                                <td> <input id="order_id_3" class="form-control input" name="order_id[]" type="text"></td>
                                <td> <input id="pin_3" data-no="3" class="form-control input" name="pin[]" type="text"></td>
                            </tr>
                            <tr>
                                <td> <input id="order_id_4" class="form-control input" name="order_id[]" type="text"></td>
                                <td> <input id="pin_4" data-no="4" class="form-control input" name="pin[]" type="text"></td>
                            </tr>
                            <tr>
                                <td> <input id="order_id_5" class="form-control input" name="order_id[]" type="text"></td>
                                <td> <input id="pin_5" data-no="5" class="form-control input" name="pin[]" type="text"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="buttons_add_row" class="row">
            <div class="col">
                <div class="d-grid gap-2">
                    <a id="btn-add-more" class="btn btn-danger btn-block">ADD MORE</a>
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
                    <br>
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
  $("#btn-complete").on("click",function(){

        if($("#member_name").val() == "" || $("#member_id").val() == "" || $("#experience_center option:selected").val() == ""){
            alert("Please fill in the fields")
            return false;
        }

        $("#btn-submit").show();
        $("#terms").show();
        $("#btn-back").show();
        $(this).hide();
        $("#customer_info").hide();
        $("#table_data").hide();
        $("#btn-add-more").hide();
        $("#queue_block").show();
        return false;
    });

    $("#btn-back").on("click",function(){
        $("#btn-submit").hide();
        $("#terms").hide();
        $(this).hide();
        $("#customer_info").show();
        $("#table_data").show();
        $("#btn-add-more").show();
        $("#queue_block").hide();
        $("#btn-complete").show();
        return false;
    });


    var current_count = 5
    $("#btn-add-more").on("click",function(){
        var num_to_add = 5;
        for(var i = 1; i <= num_to_add;i++){
            $("table.order_product tbody").append('<tr><td> <input id="order_id_'+(current_count+i)+'" class="form-control input" name="order_id[]" type="text"></td><td> <input id="pin_'+(current_count+i)+'" data-no="'+(current_count+i)+'" class="form-control input" name="pin[]" type="text"></td></tr>')
        }
        current_count += num_to_add;
    })

   
</script>
</x-guest-layout>
