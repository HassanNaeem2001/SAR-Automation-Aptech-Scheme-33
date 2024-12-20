@extends('basiclayout.header')
@section('content')
<style>
    input{
        border:1px solid grey
    }
</style>
<h3 class="m-3 py-2 text-center">Add Teacher</h3>
<hr>
<form action="{{route('InsertTeacher')}}" method="post">
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
        <b class="">Enter First Name</b>
        <input type="text" class="w-100 p-1" placeholder="Asad" name="firstname">
    </div>
    <div class="my-3">
        <b class="">Enter Last Name</b>
        <input type="text" class="w-100 p-1"
        placeholder="Khan" name="lastname">
    </div>
    <div class="my-3">
        <b class="">Enter Contact No - Follow the Format <span style="color:red">*</span></b>
        <input type="number" name="contactno" maxlength="13" class="w-100 p-1" placeholder="03331231234">
    </div>
    <div class="my-3">
        <b class="">Select Timings</b>
        <select name="timings" class="w-100 p-1">
            @foreach($st as $s)
            <option value="{{$s->id}}">{{ \Carbon\Carbon::parse($s->from)->format('h:i A') }} to {{ \Carbon\Carbon::parse($s->to)->format('h:i A') }}</option>
            @endforeach
        </select>
    </div>
    <div class="my-3">
        <button class="btn btn-dark w-100" type="submit">Add Teacher</button>
    </div>
</div>
</form>
@endsection