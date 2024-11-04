@extends('basiclayout.header')
@section('content')
<style>
    i{
        padding:5px
    }
    tr,td{
        border-bottom:1px solid black
    }
</style>
<h3 class="m-3 py-2 text-center">Currently Active Teachers</h3>
<hr>
<div class="container">
    <div
        class="table-responsive"
    >
        <table
            class="table table-striped"
        >
            <thead>
                <tr>
                    <th scope="col">T.Id</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Teacher Contact</th>
                    <th scope="col" colspan="2">Operations</th>
                </tr>
            </thead>
            <tbody>
           @foreach($teacher as $t)
           <tr class="">
                    <td scope="row">{{$t->id}}</td>
                    <td scope="row">{{$t->firstname}}</td>
                    <td scope="row">{{$t->lastname}}</td>
                    <td scope="row">{{$t->contactno}}</td>
                    <td scope="row">
                       <i class="fa fa-trash" style="color:red"></i>
                       <i class="fa fa-edit" style="color:blue"></i>
                       <i class="fa fa-eye" data-id="{{$t->id}}" data-name="{{$t->firstname}}" data-lastname="{{$t->lastname}}" data-contact="{{$t->contactno}}" data-timings="{{$t->timings}}" data-joined="{{$t->created_at}}" data-batches="{{$t->BatchName}}" id="btndetails"></i>
                    </td>
                    
                </tr>
           @endforeach
                
            </tbody>
        </table>
    </div>
  
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $('#btndetails').click(function(){
        var id = $(this).attr('data-id')
        var name = $(this).attr('data-name')
        var lastname = $(this).attr('data-lastname')
        var contactno = $(this).attr('data-contact')
        var timings = $(this).attr('data-timings')
        var joined = new Date($(this).attr('data-joined'))
        var batches = $(this).attr('data-batches')
        
        Swal.fire({
            title: "Details",
            html:' <center><table class="w-100"><tr>'+
'<td><b>Faculty Id</b></td>'+
            '<td>'+id+'</td>'+
        '</tr>'+
        '<tr>'+
          '  <td><b>Faculty First Name</b></td>'+
           ' <td>'+name+'</td>'+
        '</tr>'+
        '<tr>'+
           ' <td><b>Faculty Last Name</b></td>'+
            '<td>'+lastname+'</td>'+
        '</tr>'
        +
       ' <tr>'+
            '<td><b>Faculty Contact Number</b></td>'+
           ' <td>'+contactno+'</td>'+
        '</tr>'
        +
        '<tr>'+
            '<td><b>Faculty Joining Date</b></td>'+
            '<td>'+joined.toLocaleDateString('en-GB')+'</td>'+
        '</tr>'+

        '<tr>'+
           ' <td><b>Batch Names</b></td>'+
            '<td>'+batches+'</td>'+
       ' </tr>'+
    '</table>'+
   '</center>',
            icon: 'info',
            confirmButtonText: 'Close'
            })
        // alert(id)
    })
</script>
@endsection