@extends('basiclayout.header')
@section('content')
<style>
    input{
        border:1px solid grey
    }
</style>
<h3 class="m-3 py-2 text-center">Add Batch</h3>
<hr>
<form action="{{route('AddBatch')}}" method="post">
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
        <b class="">Enter Batch Code</b>
        <input type="text" class="w-100 p-1" placeholder="2024-07-A" name="batchname">
    </div>
    <div class="my-3">
        <b>Select Teacher</b>
        <br>
        <select name="teacherlist" class="p-1 w-100" id="">
        @foreach($rec1 as $r1)
        <option value="{{$r1->id}}">{{$r1->firstname}} {{$r1->lastname}}</option>
        @endforeach
        </select>
    </div>
    <div class="my-3">
    <b>Select Timings</b>
        <br>
        <select name="timinglist" class="p-1 w-100" id="">
        <option value="9-11">9-11</option>
        <option value="11-1">11-1</option>
        <option value="1-3">1-3</option>
        <option value="3-5">3-5</option>
        <option value="5-7">5-7</option>
        <option value="7-9">7-9</option>
        </select>
    </div>
    <div class="my-3">
    <b>Select Category</b>
    <br>
       <select name="courselist" class="p-1 w-100" id="">
       @foreach($rec3 as $r3)
        <option value="{{$r3->id}}">{{$r3->Course_Name}}</option>
        @endforeach
       </select>
    </div>
    <div class="my-3">
    <b>Select Current Skill</b>
    <br>
       <select name="courselist" class="p-1 w-100" id="">
       @foreach($rec4 as $r4)
        <option value="{{$r4->id}}">{{$r4->SkillName}}</option>
        @endforeach
       </select>
    </div>
    <div class="my-3">
        <button class="btn btn-dark w-100" type="submit">Add Batch</button>
    </div>
</div>
</form>
@endsection