<!DOCTYPE html>
<html lang="en">
    <head>
        @include('includes.links')
        <link rel="stylesheet" href="/assets/css/header.css">
        <link rel="stylesheet" href="/assets/css/home.css">
        <link rel="stylesheet" href="/assets/css/profile.css">
        <title>{{$user_info->name}}</title>
        <style>
           
        </style>
    </head>i
    <body>
        @include('includes.header')
        <div class="center">
            <div class="clearfix">
                <img src="/assets/images/signinbg.png" alt="" style="width:100%;" class="cover-img">
                <img src="/assets/images/profile_picture/{{$user_info->image}}" alt="" class="profile-picture">
                <div class="text-div">
                    <span><font size="5">{{$user_info->name}}</font></span><br>
                    @if ($user_info->tagline=="")
                        <span>tagline not found</span><br><br>
                    @else
                        <span>{{$user_info->tagline}}</span><br><br>
                    @endif
                    @if ($user_info->address=="")
                        <span class="fa fa-map-marker">&nbsp;&nbsp;&nbsp;not found</span><br>
                    @else
                        <span class="fa fa-map-marker">&nbsp;&nbsp;&nbsp;{{$user_info->address}}</span><br>
                    @endif
                    <span class="fa fa-envelope">&nbsp;&nbsp;&nbsp;{{$user_info->email}}</span><br>
                    @if ($user_info->facebook=="")
                        <span class="fa fa-facebook-square">&nbsp;&nbsp;&nbsp;not found</span><br>
                    @else
                        <span class="fa fa-facebook-square">&nbsp;&nbsp;&nbsp;{{$user_info->facebook}}</span><br>
                    @endif
                    @if ($user_info->instagram=="")
                        <span class="fa fa-instagram">&nbsp;&nbsp;&nbsp;not found</span><br>
                    @else
                         <span class="fa fa-instagram">&nbsp;&nbsp;&nbsp;{{$user_info->instagram}}</span><br>
                    @endif
                    <br>
                    <a class="btn btn-success fa fa-whatsapp" href="/messenger/{{$user_info->id}}">&nbsp;&nbsp;&nbsp;Send message</a>
                    @if (Auth::check())
                        @if (Auth::user()->type=="client")
                            @if ($user_info->hire_status=="active" )
                                @if($chech_p_hire != Null && $chech_p_hire->photographer_id==$user_info->id)
                                    &nbsp;&nbsp;&nbsp;
                                    <button class="btn btn-success fa fa-user-plus">&nbsp;&nbsp;&nbsp;Hire Request Pending</button>
                                @else
                                    &nbsp;&nbsp;&nbsp;
                                    <button class="btn btn-success fa fa-user-plus" data-toggle="modal" data-target="#hireModal">&nbsp;&nbsp;&nbsp;Hire</button>
                                @endif
                            @endif
                        @endif
                    @endif
                    
                    @if ($errors->has('payment') || $errors->has('event_image') || $errors->has('event_name') || $errors->has('event_location') || $errors->has('event_link') || $errors->has('about_event'))
                        <script>
                            $(document).ready(function(){
                                $('#hireModal').modal('show');
                            });
                        </script>
                    @endif
                    
                </div>
                <div class="modal fade" id="hireModal" role="dialog">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                 <h4 class="modal-title">Hire {{$user_info->name}}</h4>
                            </div>
                            <div class="modal-body">
                                <form action="/client/hire_photographer" method="post" enctype="multipart/form-data">
                                    @csrf 
                                    <div class="row">
                                        <input type="hidden" name="photographer_id" id="" value="{{$user_info->id}}">
                                        <div class="col-md-6">
                                            <label for="event_name">Event Name:</label><br>
                                            <input type="text" name="event_name" id="" class="myaddImageInput @error('event_name') is-invalid @enderror" required value="{{old('event_name')}}">
                                            @error('event_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <span style="color:red">{{ $message }}</span><br>
                                                </span>
                                            @enderror<br>
                                            <label for="event_image">Event Cover Image:</label><br>
                                            <input type="file" name="event_image" class="myaddImageInput @error('event_image') is-invalid @enderror" value="{{old('event_image')}}">
                                            @error('event_image')
                                                <span class="invalid-feedback" role="alert">
                                                    <span style="color:red">{{ $message }}</span><br>
                                                </span>
                                            @enderror
                                            
                                            <label for="event_location">Event location:</label><br>
                                            <textarea name="event_location" id="" cols="30" rows="3" class="myaddImageInput @error('event_location') is-invalid @enderror" required></textarea>
                                            @error('event_location')
                                                <span class="invalid-feedback" role="alert">
                                                    <span style="color:red">{{ $message }}</span><br>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="payment">Payment:</label><br><input type="text" name="payment" class="myaddImageInput @error('payment') is-invalid @enderror"><br>
                                            @error('payment')
                                                <span class="invalid-feedback" role="alert">
                                                    <span style="color:red">{{ $message }}</span><br>
                                                </span>
                                            @enderror
                                            <label for="event_link">Event Link(If any):</label><br>
                                            <input type="text" name="event_link" class="myaddImageInput @error('event_link') is-invalid @enderror"><br>
                                            @error('event_link')
                                                <span class="invalid-feedback" role="alert">
                                                    <span style="color:red">{{ $message }}</span><br>
                                                </span>
                                            @enderror
                                            <label for="about_event">About Event:</label><br>
                                            <textarea name="description" id="" cols="30" rows="3" class="myaddImageInput @error('about_event') is-invalid @enderror"></textarea>
                                            @error('about_event')
                                                <span class="invalid-feedback" role="alert">
                                                    <span style="color:red">{{ $message }}</span><br>
                                                </span>
                                            @enderror

                                            
                                            
                                        </div>
                                    </div> 
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='modal  fade in' id="loading" hidden style="position:absolute; min-height:500px">
                    <img style="position: absolute;
                        top: 20%;
                        left: 50%;
                        margin-top: -50px;
                        margin-left: -50px;"
                        alt="" src="/assets/images/loading.gif"
                    />
                </div>
                <br>
                <hr class="hr-10px">
                <span><font size="4">&nbsp; {{ $user_info->name }} Shoot</font></span>
                <hr class="hr-10px-border">
                <div class="grid-row" id="grid-row" style="float:right">
                    <div class="column" id="colum1"></div>
                    <div class="column" id="colum2"></div>
                    <div class="column" id="colum3"></div>
                    <div class="column" id="colum4"></div> 
                </div>
                <div class="modal fade" id="myImageModal" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <img src="/assets/images/archi4.jpg" alt="" class="avatar pull-left">
                                <a href="#" id="owner-name-href"><span id="owner-name"></span></a>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="fa fa-plus-square-o myBtn">&nbsp;&nbsp;Follow</button>
                                <button class="fa fa-cart-plus myBtn pull-right"></button>
                                <button class="fa fa-heart-o myBtn pull-right" id="likes">&nbsp;&nbsp;389 likes</button>
                                <br>
                                <span id="tagline"></span>
                            </div>
                            <div class="modal-body">
                                <img class="modal-img-center" id="modal_main_image" src="/assets/images/cover1.jpg">
                            </div>
                            <div class="text-center">
                                <span class="fa fa-eye eye-btn" id="views">&nbsp;&nbsp;200 views</span>
                                &nbsp;&nbsp;<button class="fa fa-share myBtn">&nbsp;&nbsp;Share</button>
                                {{-- &nbsp;&nbsp;<button class="fa fa-info myBtn">&nbsp;&nbsp;Info</button> --}}
                            </div>
                            <hr class="img-bottom-hr">
                            <div class="row" style="margin:0 0 0 10px;">
                                <div class="col-md-6">
                                    <font size="5"><strong>Comments<hr class="hr-10px"></strong></font>
                                    <div class="comments" id="comments">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <font size="5"><strong>Info<hr class="hr-10px"></strong></font>
                                    <div class="info-div">
                                        <font size="5" id="caption"><strong>Photos Heading<hr class="hr-20px"></strong></font>
                                        <div class="info">
                                            uploaded at: <span id="uploaded_at"></span><br><br>
                                            Camera: <span id="camera"></span><br><br>
                                            Lens: <span id="lens"></span><br><br>
                                            Size: <span id="size"></span><br><br>
                                            Resolution: <span id="resolution"></span><br><br>
                                            Aspect Ration: <span id="aspect_ratio"></span><br><br>
                                            Software: <span id="software"></span>
                                        </div>
                                    </div>
                                </div>
                            
                            
                            <!-- <div class="col-md-6">
                                dfgdfg
                            </div> -->
                            
                            </div>
                            <br><font size="5" style="margin: 0 0 0 10px">Similiar Photos</font><hr style="margin: 0 10px 0 10px" class="hr-10px-border">
                            <div class="similiar-photos">
                                <div class="similiar-column" id="similiar-column1">
                                    
                                </div>
                                <div class="similiar-column" id="similiar-column2">
                                    
                                </div>
                                <div class="similiar-column" id="similiar-column3">
                                    
                                </div>
                            </div>
        
                            <br>
                            <div class="modal-footer" >
                                <button style="position:absolute;bottom:10px;right:20px;" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        <script>
        
            @for($i = 0; $i < count($shoots); $i++)
                $('#colum'+{{$i%4+1}}).append(
                    '<div class="img-details-div">'+
                        '<img class="image" id="" src="/assets/images/shoots/{{$shoots[$i]->file_name}}" style="width:100%;" data-toggle="modal" data-target="#myImageModal" onclick="showDetails({{$shoots[$i],$shoots[$i]->user->name}})">'+
                        '<div class="middle">'+
                            '<div class="text">'+
                                '<span class="pull-left">{{$shoots[$i]->user->name}}</span>'+
                                '<span class="pull-right fa fa-heart-o">&nbsp;{{$shoots[$i]->like}}</span>'+
                                '<span class="pull-right fa fa-cart-plus">&nbsp;&nbsp;&nbsp;</span>'+
                            '</div>'+
                        '</div>'+
                    '</div>'
                );
            @endfor

            function showDetails(shoots,owner)
            {
                // console.log(shoots.category);
                $('#views').html('&nbsp;&nbsp;'+shoots.view);
                $('#owner-name').html('&nbsp;&nbsp;'+shoots.user.name);
                $('#tagline').html('&nbsp;&nbsp;'+shoots.user.tagline);
                $('#owner-name-href').attr("href","/profile/"+shoots.user.id);
                $('#likes').html('&nbsp;&nbsp;'+shoots.like);
                $('#caption').html(shoots.caption);
                $('#modal_main_image').attr('src','/assets/images/shoots'+'/'+shoots.file_name);
                $('#uploaded_at').html(shoots.created_at);
                $('#camera').html(shoots.capture_by);
                $('#lens').html(shoots.lens);
                $('#size').html(shoots.file_size);
                $('#resolution').html(shoots.resolution);
                $('#aspect_ratio').html(shoots.aspect_ratio);
                $('#software').html(shoots.software);
                
                $.ajax({
                    type: "GET",
                    url: '/shoots/'+shoots.id+'/'+shoots.category_id,
                    // data: data,
                    // cache: true,
                    success: function(data){
                        //    $("#resultarea").text(data);
                        // alert('hello');
                        // console.log(data);
                        
                        $('#comments').html(data);
                        $('#clicked-shoot-id').val(shoots.id);

                    }
                });
            }  
            $(document).ajaxStart(function() {
            // alert('Ajax start');
            $('#loading').show(); // show the gif image when ajax starts
            }).ajaxStop(function() {
                    $('#loading').hide(); // hide the gif image when ajax completes
            });
        
        </script>
    </body>
</html>