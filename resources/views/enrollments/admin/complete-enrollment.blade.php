<x-guest-layout>
    
    <style>
        input, textarea{
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
            Successfully Completed Enrollment!
        </div>
        <h3>Enrollment Form - Queuebee #{{ $enrollments[0]['queue_number'] }}
            <a href="#" id="btn-done" data-id="{{ $enrollments[0]['queue_number'] }}" style="float:right;" class="btn btn-danger">DONE</a>
            <a href="javascript:void(0)" style="float:right;" onclick = "window.print()" class="btn btn-success">PRINT</a></h3>
        <br>
        @foreach($enrollments as $k => $v)
        <br>
        <div id="customer_info" class="row">
        
            <div class="col">
                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="text" class="form-control" value="{{ $v->date }}" name="date" readonly>
                </div>
                <div class="mb-3">
                    <label for="experience_center" class="form-label">Experience Center </label>
                    <input type="text" class="form-control" value="{{ ucfirst($v->experience_center) }}" name="experience_center" readonly>
                </div>

                <div class="mb-3">
                    <label for="firstname" class="form-label">First Name </label>
                    <input type="text" class="form-control" value="{{ $v->firstname }}" name="firstname" readonly>
                </div>
                <div class="mb-3">
                    <label for="middlename" class="form-label">Middle Name</label>
                    <input type="text" class="form-control" value="{{ $v->middlename }}" name="middlename" readonly>
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Last Name </label>
                    <input type="text" class="form-control" value="{{ $v->lastname }}" name="lastname" readonly>
                </div>
                
                <div class="mb-3">
                    <label for="address" class="form-label">Address </label>
                    <textarea class="form-control" rows="6" name="address">{{ $v->address }}</textarea>
                </div>
                
                <div class="mb-3">
                    <label for="province" class="form-label">Province </label>
                    <input type="text" class="form-control" value="{{ $v->province }}" name="province" readonly>
                </div>

                <div class="mb-3">
                    <label for="city" class="form-label">City </label>
                    <input type="text" class="form-control" value="{{ $v->city }}" name="city" readonly>
                </div>

                <div class="mb-3">
                    <label for="zipcode" class="form-label">Zip Code </label>
                    <input type="text" class="form-control" value="{{ $v->zipcode }}" name="zipcode" readonly>
                </div>
            </div>
            <div class="col">

                <div class="mb-3">
                    <label for="phonenumber" class="form-label">Phone number </label>
                    <input type="text" class="form-control" value="{{ $v->phonenumber }}" name="phonenumber" readonly>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address </label>
                    <input type="text" class="form-control" value="{{ $v->email }}" name="email" readonly>
                </div>

                <div class="mb-3">
                    <label for="member_id_enroller" class="form-label">Member ID Enroller </label>
                    <input type="text" class="form-control" value="{{ $v->member_id_enroller }}" name="member_id_enroller" readonly>
                </div>
                <div class="mb-3">
                    <label for="member_id_sponsor" class="form-label">Member ID Sponsor </label>
                    <input type="text" class="form-control" value="{{ $v->member_id_sponsor }}" name="member_id_sponsor" readonly>
                </div>
                
                <div class="mb-3">
                    <label for="username" class="form-label">Username </label>
                    <input type="text" class="form-control" value="{{ $v->username }}" name="username" readonly>
                </div>  

                <div class="mb-3">
                    <label for="digit_pin" class="form-label">4-Digit Pin </label>
                    <input type="text" class="form-control" value="{{ $v->digit_pin }}" name="digit_pin" readonly>
                </div>  

                <div class="mb-3">
                    <label for="tin" class="form-label">Tin</label>
                    <input type="text" class="form-control" value="{{ $v->tin }}" name="tin" readonly>
                </div>  

                <div class="mb-3">
                    <label for="order_type" class="form-label">Order Type </label>
                    <input type="text" class="form-control" value="{{ $v->order_type }}" name="order_type" readonly>
                </div>

                <div class="mb-3">
                    <label for="enrollment_kit" class="form-label">Please select your preferred enrollment kit ? </label>
                    <input type="text" class="form-control" value="{{ $v->enrollment_kit }}" name="enrollment_kit" readonly>
                </div>  

                <div class="mb-3">
                    <label for="other_info" class="form-label">Other items you wanted to include in this order.</label>
                    <textarea class="form-control" rows="6" name="other_info">{{ $v->other_info }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="payment_method" class="form-label">Payment Method </label>
                    <input type="text" class="form-control" value="{{ $v->payment_method }}" name="payment_method" readonly>
                </div>

                <div class="mb-3">
                    <label for="valid_id" class="form-label">Copy of valid/government ID </label>
                    @if($v->valid_id)
                    <img style="width:400px;" src="{{ asset('storage/'. $v->valid_id ) }}">
                    @endif
                </div>


            </div>
        </div>
       
       
        <hr>
        @endforeach
    </div>
    <script>
        $("#btn-done").on('click',function(){
            
            var path = "/update-status-enrollment/{{ $enrollments[0]['queue_number'] }}";
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
