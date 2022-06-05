<x-guest-layout>
    
    <form method="post" action="#">
    @csrf
    <div class="container">
        <a href="/">
            <img style="width:20%;" src="https://images.ctfassets.net/qx1dg9syx02d/5oUBHKJeQvkrp1ZFH4DnXu/d17b5dd51ef5150c2f6b78fdf6cbb310/yl-logo-color.svg" />
        </a>
        <br>
        <div class="row">
            
            <h2>Order Form</h2>
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
                    <select class="form-select" required>
                    <option selected value="">Select</option>
                    <option value="QO">QO</option>
                    <option value="ER">ER</option>
                    <option value="Points">Points</option>
                    </select>
                </div>
                
                
            </div>
        </div>
        <div class="row">
            
            <div class="col">
                <div class="mb-3">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Customer Pin</th>
                            <th scope="col">Order Type</th>
                            <th scope="col">Payment Method</th>
                            <th scope="col">Total Qty</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="member_pin" class="form-label">Payment Method</label>
                    <select class="form-select" required name="payment_method">
                        <option selected value="">Select</option>
                        <option value="card_on_file">Card on File</option>
                        <option value="swipe_card">Swipe Card</option>
                        <option value="cash">CASH</option>
                        <option value="account_card">Account Credit</option>
                    </select>
                    <label for="member_pin" class="form-label">Queue Number</label>
                    <input type="text" class="form-control" name="queue_number" required>
                </div>
            </div>
            <div class="col"></div>
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
