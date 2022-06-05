<x-guest-layout>
    
    <form method="post" action="#">
    @csrf
    <div class="container">
        <a href="/">
            <img style="width:20%;" src="https://images.ctfassets.net/qx1dg9syx02d/5oUBHKJeQvkrp1ZFH4DnXu/d17b5dd51ef5150c2f6b78fdf6cbb310/yl-logo-color.svg" />
        </a>
        <br>
        <div class="row">
            
            <h2>Pick Up Form</h2>
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
                    <label for="order_type" class="form-label">Order Number</label>
                    <input type="text" class="form-control" name="order_number" required>
                </div>
                
                
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-block">SUBMIT</button>
                </div>
            </div>
        </div>
        
    </div>
    
    </form>
</x-guest-layout>
