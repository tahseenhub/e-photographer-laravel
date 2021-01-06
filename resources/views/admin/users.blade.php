<!DOCTYPE html>
<html lang="en">
    <head>
            @include('includes.links')
            <link rel="stylesheet" href="/assets/css/admin_header.css">
            <link rel="stylesheet" href="/assets/css/admin_home.css">
            <link rel="stylesheet" href="/assets/css/footer.css">
            <title>Admin</title>
    </head>
    <style>
        .users-active{
            font-weight: bolder;
            color: #3498db;
        }
    </style>
<body>
    @include('includes.header')
    <div class="center">
        <div class="clearfix">
            <div class="btn-group btn-group-justified">
                <span id="all_tab" class="btn btn-primary" onclick="ajaxUsersStatus('all')">All Users</span>
                <span id="active_tab" class="btn btn-default" onclick="ajaxUsersStatus('active')">Active Users</span>
                <span id="block_tab" class="btn btn-default" onclick="ajaxUsersStatus('block')">Block Users</span>
                <span id="photographer_tab" class="btn btn-default" onclick="ajaxUsersType('photographer')">Photographer</span>
                <span id="client_tab" class="btn btn-default" onclick="ajaxUsersType('client')">Client</span>
            </div>
            <div class="all_users">
                <br><font size="5"><span class="fa fa-users">&nbsp;&nbsp;All users</span></font>
                <input type="text" name="" id="" onkeyup="searchUsers(this.value)" class="pull-right mysearchinput" placeholder="search user...">
                <br><br>
                <table class="table" id="table">
                    <td style="display:none" colspan="11" id="hide-td" >
                        <div class="text-center" id="danger-message" style="background:rgba(207, 0, 15, 1); color:#fff; padding:20px;">
                            user not available
                        </div>
                    </td>
                    <thead>
                    <tr>
                        <th>Serial No</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Details</th>
                        <th>Add</th>
                        <th>Block</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td></td>
                                <td><img src="/assets/images/profile_picture/{{$user->image}}" alt="" width="100px"></td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->type}}</td>
                                <td>{{$user->status}}</td>
                                <td><a href="{{route('profile.index',[$user->id])}}" target="_blank"><button class="btn btn-default fa fa-info"></button></a></td>
                                @if ($user->status=='active')
                                   <td>-</td>
                                @else
                                    <td><a href="{{route('admin.usersAdd',$user->id)}}"><button class="btn btn-success fa fa-check"></button></a></td>
                                @endif
                                @if ($user->status=='block')
                                   <td>-</td>                                    
                                @else
                                    <td><a href="{{route('admin.usersBlock',$user->id)}}"><button class="btn btn-danger fa fa-times"></button></a></td>                                    
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> 
             
        </div>
    </div>


    <script>
    
        function searchUsers(str){
            $.ajax({
                type: "GET",
                url: '/admin/search_users/'+str,
                // data: data,
                // cache: true,
                success: function(data){
                    console.log(data);
                    if (str=="") {
                        $('$hide-td').show();
                    } else {
                        $('#table').html(data);
                    }
                    
                   
                }
            });
        }
        function ajaxUsersStatus(str){
            $.ajax({
                type: "GET",
                url: '/admin/ajax_users_status/'+str,
                // data: data,
                // cache: true,
                success: function(data){
                    if(str=="active")
                    {
                        $('#active_tab').addClass('btn btn-primary');
                        $('#all_tab').removeClass('btn btn-primary');
                        $('#all_tab').addClass('btn btn-default');
                        $('#photographer_tab').removeClass('btn btn-primary');
                        $('#photographer_tab').addClass('btn btn-default');
                        $('#block_tab').removeClass('btn btn-primary');
                        $('#block_tab').addClass('btn btn-default');
                        $('#client_tab').removeClass('btn btn-primary');
                        $('#client_tab').addClass('btn btn-default');
                    }else if(str=="block"){
                        $('#block_tab').addClass('btn btn-primary');
                        $('#all_tab').removeClass('btn btn-primary');
                        $('#all_tab').addClass('btn btn-default');
                        $('#active_tab').removeClass('btn btn-primary');
                        $('#active_tab').addClass('btn btn-default');
                        $('#client_tab').removeClass('btn btn-primary');
                        $('#client_tab').addClass('btn btn-default');
                        $('#photographer_tab').removeClass('btn btn-primary');
                        $('#photographer_tab').addClass('btn btn-default');
                    }else if(str=="all"){
                        $('#all_tab').addClass('btn btn-primary');
                        $('#block_tab').removeClass('btn btn-primary');
                        $('#block_tab').addClass('btn btn-default');
                        $('#active_tab').removeClass('btn btn-primary');
                        $('#active_tab').addClass('btn btn-default');
                        $('#client_tab').removeClass('btn btn-primary');
                        $('#client_tab').addClass('btn btn-default');
                        $('#photographer_tab').removeClass('btn btn-primary');
                        $('#photographer_tab').addClass('btn btn-default');
                    }
                    $('#table').html(data);
                   
                }
            });
        }
        function ajaxUsersType(str){
            $.ajax({
                type: "GET",
                url: '/admin/ajax_users_type/'+str,
                // data: data,
                // cache: true,
                
                success: function(data){
                    if(str=="photographer")
                    {
                        $('#photographer_tab').addClass('btn btn-primary');
                        $('#all_tab').removeClass('btn btn-primary');
                        $('#all_tab').addClass('btn btn-default');
                        $('#active_tab').removeClass('btn btn-primary');
                        $('#active_tab').addClass('btn btn-default');
                        $('#block_tab').removeClass('btn btn-primary');
                        $('#block_tab').addClass('btn btn-default');
                        $('#client_tab').removeClass('btn btn-primary');
                        $('#client_tab').addClass('btn btn-default');
                    }else if(str=="client"){
                        $('#client_tab').addClass('btn btn-primary');
                        $('#all_tab').removeClass('btn btn-primary');
                        $('#all_tab').addClass('btn btn-default');
                        $('#active_tab').removeClass('btn btn-primary');
                        $('#active_tab').addClass('btn btn-default');
                        $('#block_tab').removeClass('btn btn-primary');
                        $('#block_tab').addClass('btn btn-default');
                        $('#photographer_tab').removeClass('btn btn-primary');
                        $('#photographer_tab').addClass('btn btn-default');
                    }
                    $('#table').html(data);
                   
                }
            });
        }
    
    </script>
</body>
</html>