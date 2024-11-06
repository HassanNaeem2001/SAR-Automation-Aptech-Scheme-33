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
<h3 class="m-3 py-2 text-center">Currently Active Batches</h3>
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
                    <th scope="col">B.Id</th>
                    <th scope="col">Batch Name</th>
                    <th scope="col">Batch Timings</th>
                
                    <th scope="col">Batch Faculty</th>
                    <th scope="col" colspan="2">Operations</th>
                </tr>
            </thead>
            <tbody>
           @foreach($batch as $b)
           <tr class="">
                    <td scope="row">{{$loop->iteration}}</td>
                    <td scope="row">{{$b->BatchName}}</td>
                    <td scope="row">{{$b->BatchTimings}}</td>
                    @if($b->status == 0)
                    <td scope="row">Assigned to Deactivated teacher</td>
                    @else
                    <td scope="row">{{$b->firstname}}</td>
                    @endif
                    <td scope="row">
                        <i class="fa fa-trash" id="btndeletebatch" data-id="{{$loop->iteration}}" style="color:red"></i>
                        <i class="fa fa-edit" style="color:blue"></i>
                        <i class="fa fa-eye" id="btndetails" data-batchname="{{$b->BatchName}}"
                        data-batchtimings="{{$b->BatchTimings}}"
                        data-firstname="{{$b->firstname}}"
                        data-lastname="{{$b->lastname}}"
                        data-coursefamily="{{$b->Course_Name}}"
                        data-batchstart="{{$b->batch_start}}"
                        data-currentskill=""
                        style="color:black"></i>
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
    $('#btndeletebatch').click(function(){
        var id = $(this).attr('data-id')
        $.ajax({
            url:"DeleteBatch",
            type:"POST",
            data:{
                "id":id,
                "_token":"{{ csrf_token() }}"
            },
            success:function(data)
            {
              location.reload()
            }
        })
    })
    $('#btndetails').click(function(){
    // Capture the data attributes from the clicked button
    var batchname = $(this).data('batchname');
    var firstname = $(this).data('firstname');
    var lastname = $(this).data('lastname');
    var batchtimings = $(this).data('batchtimings');
    var coursefamily = $(this).data('coursefamily');
    var batchstart = new Date($(this).data('batchstart'));
   
    // Display the captured values (for testing or use as required)
    console.log(batchname, firstname, lastname, batchtimings, coursefamily, batchstart);

    // Optionally, you can use these values to display them in a modal or elsewhere
    Swal.fire({
    title: "Batch Details",
    html: `
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="border-bottom: 1px solid #ddd; padding: 8px;"><b>Batch Name:</b></td>
                <td style="border-bottom: 1px solid #ddd; padding: 8px;">${batchname}</td>
            </tr>
            <tr>
                <td style="border-bottom: 1px solid #ddd; padding: 8px;"><b>Teacher Name:</b></td>
                <td style="border-bottom: 1px solid #ddd; padding: 8px;">${firstname} ${lastname}</td>
            </tr>
            <tr>
                <td style="border-bottom: 1px solid #ddd; padding: 8px;"><b>Batch Timings:</b></td>
                <td style="border-bottom: 1px solid #ddd; padding: 8px;">${batchtimings}</td>
            </tr>
            <tr>
                <td style="border-bottom: 1px solid #ddd; padding: 8px;"><b>Course Family:</b></td>
                <td style="border-bottom: 1px solid #ddd; padding: 8px;">${coursefamily}</td>
            </tr>
            <tr>
                <td style="border-bottom: 1px solid #ddd; padding: 8px;"><b>Batch Start:</b></td>
                <td style="border-bottom: 1px solid #ddd; padding: 8px;">${batchstart.toLocaleDateString()}</td>
            </tr>
        </table>
    `,
    icon: 'info',
    confirmButtonText: 'Close'
});
});

</script>
@endsection