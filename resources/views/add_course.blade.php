@extends('basiclayout.header')
@section('content')
<style>
    input{
        border:1px solid grey
    }
</style>
<h3 class="m-3 py-2 text-center">Add Course Family</h3>
<hr>
<form action="{{route('InsertCF')}}" method="post">
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
        <strong>Notification</strong><p>{{session('SuccessMessage')}}</p>
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
        <strong>Notification</strong><p>{{session('ErrorMessage')}}</p>
    </div>
    
    <script>
        var alertList = document.querySelectorAll(".alert");
        alertList.forEach(function (alert) {
            new bootstrap.Alert(alert);
        });
    </script>
    
    @endif
    <div class="my-3">
        <b class="">Enter Course Family</b>
        <input type="text" class="w-100 p-1" placeholder="7062 , DM , SC" name="coursefamily">
    </div>
    <div class="my-3">
        <button class="btn btn-dark w-100" type="submit">Add Course Family</button>
    </div>
</div>
</form>
@endsection