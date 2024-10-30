@extends('basiclayout.header')
@section('content')


<h3 class="m-3 py-2 text-center">Staff Timings</h3>

<hr>
<form action="{{route('insert_staff_timings')}}" method="post">
    @csrf
<div class="container">
    @if(@session('SuccessMessage'))
    <div
        class="alert alert-success alert-dismissible fade show"
        role="alert"
    >
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        ></button>
        <strong>Notification</strong>
        <p>Timings Added Successfully</p>
    </div>
    
    <script>
        var alertList = document.querySelectorAll(".alert");
        alertList.forEach(function (alert) {
            new bootstrap.Alert(alert);
        });
    </script>
    @endif
    @if(@session('ErrorMessage'))
    <div
        class="alert alert-danger alert-dismissible fade show"
        role="alert"
    >
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        ></button>
        <strong>Notification</strong>
        <p>{{session('ErrorMessage')}}</p>
    </div>
    
    <script>
        var alertList = document.querySelectorAll(".alert");
        alertList.forEach(function (alert) {
            new bootstrap.Alert(alert);
        });
    </script>
    @endif

    
    <div class="my-3">
        <b>From</b>
       <input type="time" class="form-control" name="starttime">
    </div>
    <div class="my-3">
        <b class="">Till</b>
        <input type="time" class="form-control" name="endtime">
    </div>
    <div class="my-3">
        <button type="submit" class="btn btn-dark w-100">Add Staff Timings</button>
    </div>
</div>
</form>
@endsection