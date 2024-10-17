@extends('template.navbar')


@section('content-dinamis')
{{-- <div class="container">
    <h1>Create</h1>
</div> --}}

<form action="{{ route('bucket_list.ubah.proses', $bucketLists['id'])}}" method="POST" class="card p-5" method="POST">
    @csrf
    @method('PATCH')
 
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Bucket List: </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" value="{{ $bucketLists['name'] }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="type" class="col-sm-2 col-form-label">Goal: </label>
        <div class="col-sm-10">
            <select class="form-select" name="type" id="type">
                <option selected disabled hidden>Pick</option>
                <option value="top 1 goal" {{ $bucketLists['type'] == "top 1 goal" ? 'selected' : '' }}>Top 1 Goal</option>
                <option value="top 2 goal" {{ $bucketLists['type'] == "top 2 goal" ? 'selected' : '' }}>Top 2 Goal</option>
                <option value="top 3 goal" {{ $bucketLists['type'] == "top 3 goal" ? 'selected' : '' }}>Top 3 Goal</option>
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="price" class="col-sm-2 col-form-label">Price: </label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="price" name="price" value="{{ $bucketLists['price'] }}">
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Confirm</button>
</form>
@endsection
