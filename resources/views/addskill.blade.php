@extends('basiclayout.header')
@section('content')
<h3 class="m-3 py-2 text-center">Add Skill</h3>
<hr>
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
        <p>{{session('SuccessMessage')}}</p>
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
<form action="{{route('InsertSkill')}}" method="POST">
    @csrf
    <div class="group mt-1">
    <b>Enter Skill Name</b>
    <input type="text" class="w-100 p-1" placeholder="Programming With JS" name="skillname">
    </div>
    <div class="group mt-1">
    <b>Select Course Family</b>
    <select name="skillfamily" class="w-100 p-1" id="">
       @foreach($course as $c)
       <option value="{{$c->id}}">{{$c->Course_Name}}</option>
       @endforeach
    </select>
    </div>
    <div class="group mt-1">
        <b>Select Semester</b>
        <select name="semester" class="w-100 p-1" id="">
            <option value="Semester 1">Semester 1</option>
            <option value="Semester 2">Semester 2</option>
            <option value="Semester 3">Semester 3</option>
            <option value="Semester 4">Semester 4</option>
            <option value="Semester 5">Semester 5</option>
            <option value="Semester 6">Semester 6</option>
            <option value="Other / Short Course">Other</option>
        </select>
    </div>
   <div class="group mt-4">
   <button type="submit" class="btn btn-dark w-100">Add Skilll</button>
   </div>
</form>
</div>
@endsection