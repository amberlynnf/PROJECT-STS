@extends('template.navbar')

@section('content')
<div class="container mt-5">
    <h1 class="text-center text-dark mb-4">Dashboard Bucket List</h1>
    
    <div class="card bg-light mb-4 ">
        <div class="card-header bg-dark text-white">
            <h5>Welcome, Lister's!</h5>
        </div>
        <div class="card-body">
            <p class="card-text text-dark">As a lister, you have full access to manage and monitor all activities related to your own bucket list's. Stay alert to updated data and ensure systems run efficiently to support user needs and company operations.</p>
            <p>The main task you can do is create a bucket list and enter the data</p>
            <p><b>Good job, and thanks for keeping the system running smoothly!</b></p>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
        </div>
        <div class="card-body">
            <p class="card-text">Lets get Started!</p>
            <div class="d-flex justify-content">
                <a href="" class="btn btn-light">Bucket</a>
                <a href="" class="btn btn-light">List</a>           
            </div>
        </div>
    </div>
</div>
@endsection