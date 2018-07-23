@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Users List</div>

                <div class="card-body">
                    <table class="table table-striped table-hover table-responsive striped">
                        <thead>
                            <tr><th>Name</th><th>Mobile</th><th>Email</th><th>Role</th><th>Status</th><th>Created At</th><th class="text-center">Action</th></tr>
                        </thead>
                        <tbody>
                            @foreach($result as $data)
                            <tr>
                                <td>{{ucfirst(trans($data->first_name))}} &nbsp;{{ucfirst(trans($data->last_name))}}</td>
                                <td>{{$data->mobile}}</td>
                                <td>{{$data->email}}</td>
                                <td>{{ucfirst(trans($data->role))}}</td>
                                <td>{{ucfirst(trans($data->status))}}</td>
                                <td>{{date('M d, Y', strtotime($data->created_at))}}</td>
                                <td>
                                    <a href="/users/{{$data->id}}/edit">Assign Video</a>
                                    <!--<button type="button" deleteVal="{{$data->id}}" class="btn btn-link deleteItem">Delete</button>-->
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
        $(document).on('click', '.deleteItem', function () {
            if (confirm("Are you sure you want to delete?")) {
                var id = $(this).attr('deleteVal');
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
                        if (data['message'] == 'success') {
                            alert('User deleted successfully..!!');
                            location.reload();
                        }else{
                            alert('User deleted successfully..!!');
                        }
                    }
                });
            }
            return false;
        });

    });
</script>
@endsection
