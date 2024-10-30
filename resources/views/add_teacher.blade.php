@extends('basiclayout.header')
@section('content')
<style>
    input{
        border:1px solid grey
    }
</style>
<h3 class="m-3 py-2 text-center">Add Teacher</h3>
<hr>
<form action="" method="post">
    @csrf
<div class="container">
    <div class="my-3">
        <b class="">Enter First Name</b>
        <input type="text" class="w-100 p-1" placeholder="Asad">
    </div>
    <div class="my-3">
        <b class="">Enter Last Name</b>
        <input type="text" class="w-100 p-1"
        placeholder="Khan">
    </div>
    <div class="my-3">
        <b class="">Enter Contact No</b>
        <input type="number" maxlength="13" class="w-100 p-1" placeholder="03331231234">
    </div>
    <div class="my-3">
        <b class="">Select Timings</b>
        <select name="" class="w-100 p-1">
            @foreach($st as $s)
            <option value="">{{ \Carbon\Carbon::parse($s->from)->format('h:i A') }} to {{ \Carbon\Carbon::parse($s->to)->format('h:i A') }}</option>
            @endforeach
        </select>
    </div>
    <div class="my-3">
        <button class="btn btn-dark w-100">Add Teacher</button>
    </div>
</div>
</form>
@endsection