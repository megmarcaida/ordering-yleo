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
                                    <input type="search" name="q" class="form-control typeahead" value="" placeholder="Queuebee no. search...">
                                    <input type="hidden"value="{{ isset($_GET['location']) ? $_GET['location'] : '' }}" name="location">
                                </form>
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">Queuebee No.</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone Number</th>
                                        <th scope="col">Enroller</th>
                                        <th scope="col">Sponsor</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Order Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($enrollments as $k => $value)
                                        <tr>
                                            <td><a href="/complete-enrollment/{{  $value->queue_number }}/{{  $value->experience_center }}">{{  $value->queue_number }}</a></td>
                                            <td>{{  $value->firstname }} {{  $value->middlename }} {{  $value->lastname }}</td>
                                            <td>{{  $value->email }}</td>
                                            <td>{{  $value->phonenumber }}</td>
                                            <td>{{  $value->member_id_enroller }}</td>
                                            <td>{{  $value->member_id_sponsor }}</td>
                                            <td>{{  $value->username }}</td>
                                            <td>{{  $value->order_type }}</td>
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
</x-app-layout>
