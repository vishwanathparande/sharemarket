@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Share Market Videos</div>

                <div class="card-body">
                    <table class="table table-striped table-hover table-responsive striped">
                        <thead>
                            <tr><th>Name</th><th>Description</th>
                                @if (Auth::user()->role == 'user')
                                <th>Valid From</th><th>Valid Till</th>
                                @else
                                <th>File Type</th>
                                @endif
                                <th class="text-center">Action</th></tr>
                        </thead>
                        <tbody>
                            @foreach($result as $data)
                            <tr>
                                <td>{{$data->name}}</td>
                                <td>{{$data->description}}</td>
                                @if (Auth::user()->role == 'user')
                                <td>{{date('M d, Y', strtotime($data->start_date))}}</td>
                                <td>{{date('M d, Y', strtotime($data->end_date))}}</td>
                                <td>
                                    <button type="button" srcVal="{{'/'.$data->path}}" class="btn btn-link view" data-toggle="modal" data-target="#myModal">View</button>
                                </td>
                                @else
                                <td>{{$data->type}}</td>
                                <td>
                                    <button type="button" srcVal="{{'/'.$data->path}}" class="btn btn-link view" data-toggle="modal" data-target="#myModal">View</button>
                                    <!--<button type="button" srcVal="{{'/'.$data->path}}" class="btn btn-link view" data-toggle="modal" data-target="#myModal">Edit</button>-->
                                    <button type="button" deleteVal="{{$data->id}}" class="btn btn-link deleteItem">Delete</button>
                                </td>
                                @endif
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

        $(document).on('click', '.deleteItem', function () {
            if (confirm("Are you sure you want to delete?")) {
                var fileId = $(this).attr('deleteVal');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    async: true,
                    cache: false,
                    data: ({fileId: fileId}),
                    url: '/deletefiles',
                    success: function (response) {
                        $("#loading").hide();
                        var data = jQuery.parseJSON(response);
                        console.log(data);
                        if (data['message'] == 'success') {
                            alert('Video deleted successfully..!!');
                            location.reload();
                        } else {
                            alert(data['message']);
                        }

                    }
                });
            }
            return false;
        });

    });
</script>
@endsection
