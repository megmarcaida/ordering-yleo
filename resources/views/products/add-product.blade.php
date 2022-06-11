<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Product') }}
            <a href="/products" class="btn btn-danger" style="float:right;">BACK</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 table-responsive">
                    <div class="container">
                        <div class="row">
                        <form method="post">
                            @csrf
                            @if($message)
                            <div class="alert alert-success" role="alert">
                                {{ $message }} 
                            </div>
                            <script>setTimeout(function() { $(".alert").fadeOut('slow') },5000)</script>
                            @endif
                            <div class="row">
                                
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="product_sku" class="form-label">SKU</label>
                                        <input type="text" class="form-control" name="product_sku" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="product_name" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="product_name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="product_price" class="form-label">Price</label>
                                        <input type="text" class="form-control" name="product_price" required>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="mb-3">
                                        <label for="product_category" class="form-label">Category</label>
                                        <input type="text" class="form-control" name="product_category" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="product_unit" class="form-label">Unit</label>
                                        <input type="text" class="form-control" name="product_unit" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pv" class="form-label">PV</label>
                                        <input type="text" class="form-control" name="pv" required>
                                    </div>
                                </div>

                                
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="product_description" class="form-label">Description</label>
                                        <textarea class="form-control" rows="6" name="product_description"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="er" class="form-label">Essential Reward</label>
                                        <select id="er" class="form-select" name="er" required>
                                            <option value="YES">YES</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="with_limit_qty" class="form-label">With Limit Qty</label>
                                        <input type="text" class="form-control" name="with_limit_qty" required>
                                    </div>
                                </div>

                                
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="qo" class="form-label">Quick Orders</label>
                                        <select id="qo" class="form-select" name="qo" required>
                                            <option value="YES">YES</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="product_qty" class="form-label">Qty</label>
                                        <input type="text" class="form-control" name="product_qty" required>
                                    </div>
                                </div>
                                

                                <div class="col">
                                    <div class="mb-3">
                                        <label for="points" class="form-label">Reward Points</label>
                                        <select id="points" class="form-select" name="points" required>
                                            <option value="YES">YES</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="enabled" class="form-label">Enabled</label>
                                        <select id="enabled" class="form-select" name="enabled" required>
                                            <option value="1">YES</option>
                                            <option value="0">NO</option>
                                        </select>
                                    </div>
                                        
                                </div>
                            </div>
                            
                            <div id="buttons_block" class="row">
                                <div class="col">
                                    <div class="d-grid gap-2">
                                        <button id="btn-submit" type="submit" class="btn btn-primary btn-block">UPDATE</button>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-grid gap-2">
                                        <a href="/products" class="btn btn-danger btn-block">CANCEL</a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
