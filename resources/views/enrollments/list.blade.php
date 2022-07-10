<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Enrolled User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 table-responsive">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div id="message"></div>
                                <form method="get">
                                    <input type="search" name="q" class="form-control typeahead" value="" placeholder="User search...">
                                </form>
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone Number</th>
                                        <th scope="col">Enroller</th>
                                        <th scope="col">Sponsor</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Order Type</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($enrollments as $k => $value)
                                        <tr>
                                            <td>{{  $value->firstname }} {{  $value->middlename }} {{  $value->lastname }}</td>
                                            <td>{{  $value->email }}</td>
                                            <td>{{  $value->phonenumber }}</td>
                                            <td>{{  $value->member_id_enroller }}</td>
                                            <td>{{  $value->member_id_sponsor }}</td>
                                            <td>{{  $value->username }}</td>
                                            <td>{{  $value->order_type }}</td>
                                            <td>@if( $value->enabled == 1)
                                                    <p class="text-success">Enabled</p>
                                                @else
                                                    <p class="text-danger">Disabled</p>
                                                @endif
                                            </td>
                                            <td><a data-id="{{ $value->id }}" class="btn btn-danger btn-delete">Delete</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $enrollments->appends(['q' => request()->get('q')])->links() }}
                                
                            </div>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(".btn-delete").on('click',function(){

            if(confirm("Are you sure you want to delete this user permanently?")){
                var id = $(this).attr('data-id')
                
                var path = "{{ route('delete-enrollments') }}";
                $.get(path, {id: id}, function(data){
                    $("#message").html("<div class='alert alert-success'>"+ data + "</div>")
                    window.location = '/enrollments'
                });
            }

        })
        var path = "{{ route('autocomplete') }}";
        function initTypeahead() {
            // Should probably add code here to only grab elements that are not already initialized
            var elements = $('input.typeahead');
            $(elements).typeahead({
                source:  function (query, process) {
                return $.get(path+"?order_type=", { query: query }, function (data) {
                        return process(data);
                    });
                }
            });
        }
        
        initTypeahead();
    </script>
</x-app-layout>
