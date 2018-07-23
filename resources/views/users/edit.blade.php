@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-13">
            <div class="card">
                <div class="card-header">Share Market Videos - Assign to <b>{{ucfirst(trans($result['user'][0]->first_name))}}&nbsp;{{ucfirst(trans($result['user'][0]->last_name))}}</b></div>

                <div class="card-body">
                    <input id="userid" type="hidden" value="{{$result['user'][0]->id}}">
                    <table class="table table-striped table-hover table-responsive striped">
                        <thead>
                            <tr><th>Name</th><th>Description</th><th>File Type</th><th>Valid From</th><th>Valid Till</th><th style="width:25%;" class="text-center">Action</th></tr>
                        </thead>
                        <tbody>
                            @foreach($result['files'] as $data)
                            <tr>
                                <td>{{$data->name}}</td>
                                <td>{{$data->description}}</td>
                                <td>{{$data->type}}</td>
                                @if($data->start_date)
                                <td><input type='text' class="form-control input-circle datepicker" value='{{date('Y-m-d', strtotime($data->start_date))}}' id='startDate_{{$data->id}}' autocomplete="off" readonly></td>
                                @else
                                <td><input type='text' class="form-control input-circle datepicker" id='startDate_{{$data->id}}' autocomplete="off" readonly/></td>
                                @endif
                                @if($data->end_date)
                                <td><input type='text' class="form-control input-circle datepicker" value='{{date('Y-m-d', strtotime($data->end_date))}}' id='endDate_{{$data->id}}' autocomplete="off" readonly/></td>
                                @else
                                <td><input type='text' class="form-control input-circle datepicker" id='endDate_{{$data->id}}' autocomplete="off" readonly/></td>
                                @endif
                                <td>
                                    <button type="button" userFileVal="{{$data->ufId}}" fileVal="{{$data->id}}" class="btn btn-link assignItem">Assign</button>
                                    <button type="button" srcVal="{{'/'.$data->path}}" class="btn btn-link view" data-toggle="modal" data-target="#myModal">View</button>
                                    <button type="button" deleteVal="{{$data->ufId}}" class="btn btn-link deleteItem">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });

        $(document).on('click', '.view', function () {
            var src = $(this).attr('srcVal');
            var video = $('.videoBody video')[0];
            video.src = src;
            video.load();
            video.play();
        });

        $(document).on('click', '.videoClose', function () {
            var video = $('.videoBody video')[0];
            video.pause();
        });


        $(document).on('click', '.assignItem', function () {
            if (confirm("Are you sure you want to assign?")) {
                var userfileId = $(this).attr('userFileVal');
                var fileId = $(this).attr('fileVal');
                var userId = $('#userid').val();
                var startDate = $('#startDate_' + fileId).val();
                var endDate = $('#endDate_' + fileId).val();
                if (startDate && endDate) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'POST',
                        async: true,
                        cache: false,
                        data: ({userfileId: userfileId, fileId: fileId, userId: userId, startDate: startDate, endDate: endDate}),
                        url: '/assignfiles',
                        success: function (response) {
                            $("#loading").hide();
                            var data = jQuery.parseJSON(response);
                            console.log(data);
                            if (data == 'success') {
                                alert('Video Assign successfully..!!');
                                location.reload();
                            } else {
                                alert('Something went wrong..!!');
                            }

                        }
                    });
                } else {
                    alert('Please select Start Date & End Date.');
                }
            }
            return false;
        });

        $(document).on('click', '.deleteItem', function () {
            if (confirm("Are you sure you want to delete")) {
                var userfileId = $(this).attr('deleteVal');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    async: true,
                    cache: false,
                    data: ({userfileId: userfileId}),
                    url: '/unassignfiles',
                    success: function (response) {
                        $("#loading").hide();
                        var data = jQuery.parseJSON(response);
                        console.log(data);
                        if (data == 'success') {
                            alert('Video unassigned successfully..!!');
                            location.reload();
                        } else {
                            alert('Something went wrong..!!');
                        }

                    }
                });
            }
            return false;
        });
        //if(new Date(start_date) >= new Date(end_date))
        //{
        //    alert('End date should be greater than Start date');
        //}
    });
</script>
@endsection
