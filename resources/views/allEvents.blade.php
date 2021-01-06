<!DOCTYPE html>
<html lang="en">
    <head>
            @include('includes.links')
            <link rel="stylesheet" href="/assets/css/home.css">
            
            <link rel="stylesheet" href="/assets/css/footer.css">
            <title>{{Auth::user()->type}}</title>
    </head>
    <style>
        .center {
            margin: 70px auto;
            width: 65%;
            padding: 20px;
            /* border: 3px solid #73AD21; */
            /* padding: 20px; */
            -moz-box-shadow:    inset 0 0 10px rgba(0,0,0,.5);
            -webkit-box-shadow: inset 0 0 10px rgba(0,0,0,.5);
            box-shadow:         inset 0 0 10px rgba(0,0,0,.5);
            /* height: 10%; */
            }
        .clearfix{
            overflow:hidden;
        }
        
        .events-active{
            font-weight: bolder;
            color: #3498db;
        }
    
    </style>
<body>
    @include('includes.header')
    <div class="center">
        <div class="clearfix">
            <div class="btn-group btn-group-justified">
                <span id="all_tab" class="btn btn-primary" onclick="ajaxUsersStatus('all')">All Events</span>
                <span id="active_tab" class="btn btn-default" onclick="ajaxUsersStatus('active')">Accepted Events</span>
                <span id="block_tab" class="btn btn-default" onclick="ajaxUsersStatus('block')">Rejected Events</span>
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
                        <th>Owner</th>
                        <th>Event Name</th>
                        <th>Payment</th>
                        <th>Event location</th>
                        <th>Status</th>
                        <th>Contact</th>
                        <th>Details</th>
                        @if (Auth::user()->type=="photographer")
                            <th>Accpet</th>                            
                        @endif
                        @if (Auth::user()->type=="client")
                            <th>Delete</th>                            
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($myEvents as $myEvent)
                            <tr>
                                <td><img src="/assets/images/profile_picture/{{ $myEvent->owner->image }}" alt="" width="100px"></td>
                                <td>{{ $myEvent->event_name }}</td>
                                <td>{{ $myEvent->payment }}</td>
                                <td>{{ $myEvent->event_location }}</td>
                                <td>{{ $myEvent->status }}</td>
                                @if (Auth::user()->type=="photographer")
                                     <td><a href="{{ route('messenger.selectUser', [$myEvent->client_id]) }}"><button class="btn btn-success fa fa-whatsapp"></button></a></td>
                                @endif
                                @if (Auth::user()->type=="client")
                                    <td><a href="{{ route('messenger.selectUser', [$myEvent->photographer_id]) }}"><button class="btn btn-success fa fa-whatsapp"></button></a></td>
                                @endif
                                {{-- <td><a href="{{ route('event.eventDetails',[$myEvent->id]) }}"><button class="btn btn-default fa fa-info"></button></a></td> --}}
                                <td><button class="btn btn-default fa fa-info" onclick="showEventDetails({{$myEvent->id}})"></button></td>
                                @if (Auth::user()->type=="photographer")
                                    @if ($myEvent->status=="block")
                                        <td>
                                            <a href="{{ route('acceptHireReq',[$myEvent->id]) }}"><button class="fa fa-check btn btn-success"></button></a>
                                        </td>
                                    @else
                                        <td>-</td>
                                    @endif                           
                                @endif
                                @if (Auth::user()->type=="client")
                                    <td>
                                         <a href="{{ route('deleteEvent',[$myEvent->id]) }}"><button class="fa fa-trash btn btn-danger"></button></a>                                                           
                                    </td>
                                @endif
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> 
             
        </div>
    </div>
    <div class="modal fade" id="myeventModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Event Details</h4>
                </div>
                <div class="modal-body" id="main-contents">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script>
    
        function showEventDetails(id){
            // alert(id);
            $.ajax({
                type: "GET",
                url: '/eventDetails/'+id,
                // data: data,
                // cache: true,
                success: function(data){
                   
                    $('#myeventModal').modal('show');
                    $('#main-contents').html(data);
                }
            });
        }
        // function ajaxUsersStatus(str){
        //     $.ajax({
        //         type: "GET",
        //         url: '/admin/ajax_users_status/'+str,
        //         // data: data,
        //         // cache: true,
        //         success: function(data){
        //             if(str=="active")
        //             {
        //                 $('#active_tab').addClass('btn btn-primary');
        //                 $('#all_tab').removeClass('btn btn-primary');
        //                 $('#all_tab').addClass('btn btn-default');
        //                 $('#photographer_tab').removeClass('btn btn-primary');
        //                 $('#photographer_tab').addClass('btn btn-default');
        //                 $('#block_tab').removeClass('btn btn-primary');
        //                 $('#block_tab').addClass('btn btn-default');
        //                 $('#client_tab').removeClass('btn btn-primary');
        //                 $('#client_tab').addClass('btn btn-default');
        //             }else if(str=="block"){
        //                 $('#block_tab').addClass('btn btn-primary');
        //                 $('#all_tab').removeClass('btn btn-primary');
        //                 $('#all_tab').addClass('btn btn-default');
        //                 $('#active_tab').removeClass('btn btn-primary');
        //                 $('#active_tab').addClass('btn btn-default');
        //                 $('#client_tab').removeClass('btn btn-primary');
        //                 $('#client_tab').addClass('btn btn-default');
        //                 $('#photographer_tab').removeClass('btn btn-primary');
        //                 $('#photographer_tab').addClass('btn btn-default');
        //             }else if(str=="all"){
        //                 $('#all_tab').addClass('btn btn-primary');
        //                 $('#block_tab').removeClass('btn btn-primary');
        //                 $('#block_tab').addClass('btn btn-default');
        //                 $('#active_tab').removeClass('btn btn-primary');
        //                 $('#active_tab').addClass('btn btn-default');
        //                 $('#client_tab').removeClass('btn btn-primary');
        //                 $('#client_tab').addClass('btn btn-default');
        //                 $('#photographer_tab').removeClass('btn btn-primary');
        //                 $('#photographer_tab').addClass('btn btn-default');
        //             }
        //             $('#table').html(data);
                   
        //         }
        //     });
        // }
        // function ajaxUsersType(str){
        //     $.ajax({
        //         type: "GET",
        //         url: '/admin/ajax_users_type/'+str,
        //         // data: data,
        //         // cache: true,
                
        //         success: function(data){
        //             if(str=="photographer")
        //             {
        //                 $('#photographer_tab').addClass('btn btn-primary');
        //                 $('#all_tab').removeClass('btn btn-primary');
        //                 $('#all_tab').addClass('btn btn-default');
        //                 $('#active_tab').removeClass('btn btn-primary');
        //                 $('#active_tab').addClass('btn btn-default');
        //                 $('#block_tab').removeClass('btn btn-primary');
        //                 $('#block_tab').addClass('btn btn-default');
        //                 $('#client_tab').removeClass('btn btn-primary');
        //                 $('#client_tab').addClass('btn btn-default');
        //             }else if(str=="client"){
        //                 $('#client_tab').addClass('btn btn-primary');
        //                 $('#all_tab').removeClass('btn btn-primary');
        //                 $('#all_tab').addClass('btn btn-default');
        //                 $('#active_tab').removeClass('btn btn-primary');
        //                 $('#active_tab').addClass('btn btn-default');
        //                 $('#block_tab').removeClass('btn btn-primary');
        //                 $('#block_tab').addClass('btn btn-default');
        //                 $('#photographer_tab').removeClass('btn btn-primary');
        //                 $('#photographer_tab').addClass('btn btn-default');
        //             }
        //             $('#table').html(data);
                   
        //         }
        //     });
        // }
    
    </script>
</body>
</html>