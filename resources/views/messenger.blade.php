<!DOCTYPE html>
<html>
<head>
	<title>Messenger</title>
    <meta charset="utf-8">
    @include('includes.links')
    <link rel="stylesheet" href="/assets/css/header.css">
    <link rel="stylesheet" href="/assets/css/home.css">
    <link rel="stylesheet" href="/assets/css/messenger.css">
</head>
<style>
    .messenger-active{
            font-weight: bolder;
            color: #3498db;
        }
</style>
<body>
    @include('includes.header')
    <br><br><br><br><br>
    
    
        <table border="0" cellspacing="0" align="center" width="100%">
            <tr height="50px" width="100%" align="center">
                <td>
                    <b>Select To Send Message</b>
                </td>
                <td>
                    @if($selected_id[0] == null)
                    <b>No ID Selected</b>
                    @else
                    <b>Selected ID : {{$selected_id[0]}}</b>
                    @endif
                    <button onClick="auto()">Refresh Message</button>
                </td>
            </tr>
            <tr height="300px">
                <td width="50%">
                    <div class="friends">
                        <div class="chatlogs">
                            <table border="1" cellspacing="0" width="100%" align="center">
                                    <tr height="50px" align="center" width="100%">
                                        <td width="20%">
                                            <b>ID</b>
                                        </td>
                                        <td width="80%">
                                            <b>USER NAME</b>
                                        </td>
                                    </tr>
                                @foreach($users as $user)
                                    <tr height="50px" align="center" width="100%">
                                        <td width="20%">
                                            {{$user->id}}
                                        </td>
                                        <td width="80%">
                                            <b><a href="/messenger/{{$user->id}}">{{$user->name}}</a></b>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </td>
                <td width="50%">
                    <div class="chatbox">
                        <div class="chatlogs">
                            @foreach($chats as $chat)
                                    @if($chat->sender_id == $currentUser[0])
                                        <div class="chat self">
                                            @foreach($users as $user)
                                            @if($chat->sender_id == $user->id)
                                            <div class="user-photo"><img src="/assets/images/profile_picture/{{$user->image}}"></div>
                                            @endif
                                            @endforeach
                                            <p class="chat-message">{{$chat->message}}</p>
                                        </div>
                                    @else
                                        <div class="chat friend">
                                            @foreach($users as $user)
                                            @if($chat->sender_id == $user->id)
                                            <div class="user-photo"><img src="/assets/images/profile_picture/{{$user->image}}"></div>
                                            @endif
                                            @endforeach
                                            <p class="chat-message">{{$chat->message}}</p>
                                        </div>
                                    @endif
                            @endforeach
                        </div>
                        <div class="chat-form">
                                <form method="POST" action="/messenger/{{$selected_id[0]}}" enctype="multipart/form-data">
    
                                    @csrf
                            <textarea name="message" class="colorAdd"></textarea>
                            <button type="submit">Send</button>
                        </form>

                        </div>
                    
                    </div>
                </td>
            </tr>
    
        </table>
    <br><br><br>
    <script>
        function auto(){
            var check = "{{$selected_id[0]}}";
            if(check != null){
                window.setTimeout(function(){
                window.location.href = "/messenger/{{$selected_id[0]}}";
                }, 10000); 
            }
        }
        //auto();
    </script>
</body>
</html>