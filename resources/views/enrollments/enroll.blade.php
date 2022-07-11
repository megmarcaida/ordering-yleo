<x-guest-layout>
    
    <form method="post" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <a href="/">
            <img style="width:20%;" src="https://images.ctfassets.net/qx1dg9syx02d/5oUBHKJeQvkrp1ZFH4DnXu/d17b5dd51ef5150c2f6b78fdf6cbb310/yl-logo-color.svg" />
        </a>
        <br>
        @if($message)
        <div class="alert alert-success" role="alert">
            {{ $message }} <br> Submit another request? <a href="/enrollment-form">Click Here</a>
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
        <h2>Manual Enrollment Request <a href="/" style="float:right;" class="btn btn-danger">BACK</a></h2>
        <br>
        <p>Declaration		</p>
        <p>1. I acknowledge Young Living Philippines to perform my enrollment on my behalf.</p>		
        <p>2. I acknowledge that I have checked the latest OOS listing before placing my enrollment.</p>
        <p>3. I have read and agree to be bound by the terms and conditions of the Agreement (which includes this Member Agreement, the Policies and Procedures, Privacy Policy, and the Compensation Plan). I certify that I am 18 years old and legally able to enter into the Agreement. I understand that I have the right to terminate my Young Living Member Agreement at any time, with or without reason, by sending written notice to the Company at the above-listed address. I understand that I must purchase one of the enrollment options in order to qualify as a member and receive wholesale pricing.</p>
                
        <p><a href="https://static.youngliving.com/en-PH/2020/YLPHPoliciesProcedures.pdf" target="_blank">Policies and Procedures</a></p>
        <p><a href="https://static.youngliving.com/en-PH/PDFS/YL_PH_Enrollment_Form.pdf" target="_blank">Member </a></p>
        <p><a href="https://static.youngliving.com/en-PH/2021/PH_CompensationPlan.pdf" target="_blank">Compensation Plan</a></p>
        <p><a href="https://static.youngliving.com/en-PH/PDFS/PRIVACY_POLICY_FORM.pdf" target="_blank">Privacy Plan</a></p>
        <div id="customer_info" class="row">
        
            <div class="col">
                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="text" class="form-control" value="{{ $date }}" name="date" readonly required>
                </div>
                <div class="mb-3">
                    <label for="experience_center" class="form-label">Experience Center <code>*</code></label>
                    <select id="experience_center" class="form-select" name="experience_center" required>
                        <option selected value="">Select</option>
                        <option value="manila">Manila</option>
                        <option value="davao">Davao</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="firstname" class="form-label">First Name <code>*</code></label>
                    <input id="firstname" type="text" class="form-control"  name="firstname" required>
                </div>
                <div class="mb-3">
                    <label for="middlename" class="form-label">Middle Name</label>
                    <input id="middlename" type="text" class="form-control"  name="middlename" required>
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Last Name <code>*</code></label>
                    <input id="lastname" type="text" class="form-control"  name="lastname" required>
                </div>
                
                <div class="mb-3">
                    <label for="address" class="form-label">Address <code>*</code></label>
                    <textarea class="form-control" rows="6" name="address"></textarea>
                </div>
                
                <div class="mb-3">
                    <label for="province" class="form-label">Province <code>*</code></label>
                    <select id="province" class="form-select" name="province" required>
                        <option selected value="">Select</option>
                        @foreach($provinces as $province)
                        <option value="{{ $province->province }}">{{ $province->province }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="city" class="form-label">City <code>*</code></label>
                    <select id="city" class="form-select" name="city" required>
                        <option selected value="">Select</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="zipcode" class="form-label">Zip Code <code>*</code></label>
                    <select id="zipcode" class="form-select" name="zipcode" required>
                        <option selected value="">Select</option>
                    </select>
                </div>
            </div>
            <div class="col">

                <div class="mb-3">
                    <label for="phonenumber" class="form-label">Phone number <code>*</code></label>
                    <input id="phonenumber" type="text" class="form-control check_number" placeholder="09...." pattern="^(09|\+639)\d{9}$" name="phonenumber" required>
                    <label class="phonenumber text-danger" style="display:none" for="text2">Please enter correct PH phone number</label>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address <code>*</code></label>
                    <input id="email" type="email" class="form-control" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="member_id_enroller" class="form-label">Member ID Enroller <code>*</code></label>
                    <input id="member_id_enroller" type="text" class="form-control"  name="member_id_enroller" required>
                </div>
                <div class="mb-3">
                    <label for="member_id_sponsor" class="form-label">Member ID Sponsor <code>*</code></label>
                    <input id="member_id_sponsor" type="text" class="form-control"  name="member_id_sponsor" required>
                </div>
                
                <div class="mb-3">
                    <label for="username" class="form-label">Username <code>*</code></label>
                    <input id="username" type="text" class="form-control"  name="username" required>
                </div>  

                <div class="mb-3">
                    <label for="digit_pin" class="form-label">4-Digit Pin <code>*</code></label>
                    <input id="digit_pin" type="text" class="form-control" min="4" max="4" name="digit_pin" required>
                </div>  

                <div class="mb-3">
                    <label for="tin" class="form-label">Tin</label>
                    <input id="tin" type="text" class="form-control"  name="tin">
                </div>  

                <div class="mb-3">
                    <label for="order_type" class="form-label">Order Type <code>*</code></label>
                    <select id="order_type" class="form-select" name="order_type" required>
                        <option selected value="">Select</option>
                        <option value="Quick Order">Quick Order</option>
                        <option value="Essential Rewards">Essential Rewards</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="enrollment_kit" class="form-label">Please select your preferred enrollment kit ? <code>*</code></label>
                    <input id="enrollment_kit" type="text" class="form-control"  name="enrollment_kit">
                </div>  

                <div class="mb-3">
                    <label for="other_info" class="form-label">Other items you wanted to include in this order.</label>
                    <textarea class="form-control" rows="6" name="other_info"></textarea>
                </div>

                <div class="mb-3">
                    <label for="payment_method" class="form-label">Payment Method <code>*</code></label>
                    <select id="payment_method" class="form-select" name="payment_method" required>
                        <option selected value="">Select</option>
                        <option value="Swiped Card">Swiped Card</option>
                        <option value="Cash">Cash</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="valid_id" class="form-label">Copy of valid/government ID </label>
                    <input id="valid_id" type="file" class="form-control" name="valid_id[]" accept="image/*" >
                </div>


            </div>
        </div>
       
        
        <div id="queue_block"  style="display:none;" class="row">
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
        <hr>    
    </div>
    
    </form>
    <script type="text/javascript">
    $("#btn-complete").on("click",function(){

        if( $("#firstname").val() == "" || 
            //$("#middlename").val() == "" || 
            $("#lastname").val() == "" || 
            $("#experience_center option:selected").val() == "" ||
            $("#province option:selected").val() == "" ||
            $("#city option:selected").val() == "" ||
            $("#zipcode option:selected").val() == "" ||
            $("#phonenumber").val() == "" || 
            $("#email").val() == "" || 
            $("#member_id_enroller").val() == "" || 
            $("#member_id_sponsor").val() == "" || 
            $("#username").val() == "" || 
            $("#digit_pin").val() == "" || 
            //$("#tin").val() == "" || 
            $("#order_type option:selected").val() == "" || 
            $("#enrollment_kit option:selected").val() == "" ||
            $("#payment_method option:selected").val() == ""
        ){
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

   
   $('#province').on('change',function(){
        var province = $(this).val();
        $.get("/get-cities", {province: province}, function(data){
            $("#city").html('');
            $("#zipcode").html('');
            $("#city").append('<option value="">Select</option>')
            $("#zipcode").append('<option value="">Select</option>')
            $.each(data, function(n, val){
                $("#city").append("<option value='"+val.city+"'>"+val.city+"</option>"    )
            });
        });
   })

   $('#city').on('change',function(){
        var city = $(this).val();
        $.get("/get-zipcode", {city: city}, function(data){
            $("#zipcode").html('');
            $("#zipcode").append('<option value="">Select</option>')
            $.each(data, function(n, val){
                $("#zipcode").append("<option value='"+val.zipcode+"'>"+val.zipcode+"</option>")
            });
        });
   })

    $('.check_number').on('input', function() {
        re = new RegExp(this.pattern);
        str = $(this).val();
        console.log(re.test(str))
        $('label.phonenumber').toggle(!re.test(str));
    });
   
</script>
</x-guest-layout>
