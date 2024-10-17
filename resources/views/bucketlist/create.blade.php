@extends('template.navbar')


@section('content-dinamis')
{{-- <div class="container">
    <h1>Create</h1>
</div> --}}

<form action="{{ route('bucket_list.TambahProses')}}" class="card p-5" method="POST">
    @csrf
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (Session::get('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif
    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Bucket List: </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name')}}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="place" class="col-sm-2 col-form-label">Place: </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="place" name="place" value="{{ old('place')}}">
        </div>
        <div class="mb-3 row">
            <label for="price" class="col-sm-2 col-form-label">Price: </label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="price" name="price">
            </div>
    </div>
    <div class="mb-3 row">
        <label for="type" class="col-sm-2 col-form-label">Goals: </label>
        <div class="col-sm-10">
            <select class="form-select" name="type" id="type">
                <option selected disabled hidden>Select Your Goal</option>
                <option value="first">Chasing it First!</option>
                <option value="second">Chasing it Soon</option>
                <option value="third">Chasing it Last . . </option>
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Confirm</button>
</form>
@endsection
