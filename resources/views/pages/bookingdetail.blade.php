@extends('layouts.app') @section('content')
<div class="container">
    <div class="card">
        <div class="card-header bgm-blue">
            <h4 class="c-white f-20">{{ $data->name }}</h4><small class="c-white">Bookings Details</small>
        </div>


<table class="table i-table m-t-25 m-b-25">

                                       <thead >
                                       <tr>
                                            <td width="40%">
                                                <h4 class="text-capitalize f-400">Customer Name</h4>

                                            </td>

                                            <td><h4 class="text-capitalize f-400">{{ $data->name }}</h4></td>

                                        </tr>
                                         <tr>
                                            <td width="40%">
                                                <h4 class="text-capitalize f-400">Customer email</h4>

                                            </td>

                                            <td><h4 class="f-400">{{ $data->email }}</h4></td>

                                        </tr>
                                        <tr>
                                            <td width="40%">
                                                <h4 class="text-capitalize f-400">Package Id</h4>

                                            </td>

                                            <td><h4 class="text-capitalize f-400">{{ $data->package_id }}</h4></td>

                                        </tr>
                                          <tr>
                                            <td width="40%">
                                                <h4 class="text-capitalize f-400">Package Duration</h4>

                                            </td>

                                            <td><h4 class="text-capitalize f-400">{{ $data->package_duration }}</h4></td>

                                        </tr>
                                         <tr>
                                            <td width="40%">
                                                <h4 class="text-capitalize f-400">Departure date </h4>

                                            </td>

                                            <td><h4 class="text-capitalize f-400">{{ $data->departure_date }}</h4></td>

                                        </tr>

                                         <tr>
                                            <td width="40%">
                                                <h4 class="text-capitalize f-400">No. of adults </h4>

                                            </td>

                                            <td><h4 class="text-capitalize f-400">{{ $data->no_of_adults }}</h4></td>

                                        </tr>
                                         <tr>
                                            <td width="40%">
                                                <h4 class="text-capitalize f-400">No. of childrens </h4>

                                            </td>

                                            <td><h4 class="text-capitalize f-400">{{ $data->no_of_childrens }}</h4></td>

                                        </tr>
                                         <tr>
                                            <td width="40%">
                                                <h4 class="text-capitalize f-400">Payment id</h4>

                                            </td>

                                            <td><h4 class="text-capitalize f-400">{{ $data->payment_id }}</h4></td>

                                        </tr>
                                         <tr>
                                            <td width="40%">
                                                <h4 class="text-capitalize f-400">Phone no.</h4>

                                            </td>

                                            <td><h4 class="text-capitalize f-400">{{ $data->phone_no }}</h4></td>

                                        </tr>
                                         <tr>
                                            <td width="40%">
                                                <h4 class="text-capitalize f-400">Booked at </h4>

                                            </td>

                                            <td><h4 class="text-capitalize f-400">{{ $data->booked_at }}</h4></td>

                                        </tr>


                                    </thead>

                            </table>
                                   </div>

    </div>


@endsection
