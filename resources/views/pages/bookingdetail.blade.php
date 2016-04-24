@extends('layouts.app') @section('content')
<div class="container">
    <div class="card">
        <div class="card-header bgm-blue">
            <h2>{{ $data->name }}<small>Customer Name</small></h2>
        </div>

              <div class="card-body card-padding">
               <h4>Package Name : {{ $data->package_id }}</h4>
               <h4>Package Duration : {{ $data->package_duration }}</h4>
               <h4>Departure date : {{ $data->departure_date }}</h4>
               <h4>Customer Name : {{ $data->name }}</h4>
               <h4>Customer email : {{ $data->email }}</h4>
               <h4>No. of adults : {{ $data->no_of_adults }}</h4>
               <h4>No. of childrens : {{ $data->no_of_childrens }}</h4>
               <h4>Payment id : {{ $data->payment_id }}</h4>
               <h4>Phone no. : {{ $data->phone_no }}</h4>
               <h4>Booked at : {{ $data->booked_at }}</h4>
            </div>

    </div>
</div>
@endsection
