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
        <h2>Pick up Form 
            <a href="#" id="btn-done" data-id="{{$pickup_orders->id}}" style="float:right;" class="btn btn-danger">DONE</a>
            <a href="javascript:void(0)" style="float:right;" onclick = "window.print()" class="btn btn-success">PRINT</a></h2>
        <br>
        <div id="customer_info" class="row">
            
            <div class="col">
                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="text" class="form-control fw-bold" value="{{ $pickup_orders->date }}" name="date" readonly>
                </div>
                <div class="mb-3">
                    <label for="experience_center" class="form-label">Experience Center</label>
                    <input type="text" class="form-control fw-bold" value="{{ ucfirst($pickup_orders->experience_center) }}" name="date" readonly>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="member_id" class="form-label">Member ID</label>
                    <input type="text" class="form-control fw-bold" value="{{ $pickup_orders->customer_member_id }}" name="member_id" readonly>
                </div>
                <div class="mb-3">
                    <label for="member_name" class="form-label">Member Name</label>
                    <input type="text" class="form-control fw-bold" value="{{ $pickup_orders->customer_name }}" name="member_name" readonly>
                </div>
            </div>

            
        </div>
        <div id="table_data" class="row table-responsive">
            
            <div class="col">
                <div class="mb-6">
                    <table class="table order_product">
                        <thead>
                            <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">Pin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pickup_order_details as $k => $v)
                            <tr>
                                <td>{{ $v['order_id'] }}</td>
                                <td>{{ $v['pin'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
    <script>
        $("#btn-done").on('click',function(){
            
            var path = "/update-status-pickup/{{ $pickup_orders->id }}";
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
