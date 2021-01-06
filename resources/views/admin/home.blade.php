<!DOCTYPE html>
<html lang="en">
    <head>
            @include('includes.links')
            <link rel="stylesheet" href="/assets/css/admin_home.css">
            <link rel="stylesheet" href="/assets/css/home.css">
            <link rel="stylesheet" href="/assets/css/footer.css">
            <title>Admin</title>
    </head>
    <style>
        .dashboard-active{
            font-weight: bolder;
            color: #3498db;
        }
        
    </style>
<body>
    @include('includes.header')
    <div class="center">
        <div class="clearfix">
            <font size="5"><span class="fa fa-tachometer">&nbsp;&nbsp;Admin dashboard</span></font><hr class="dashboard-hr">
            <br>
            <div class="row">
                <div class="col-md-3">
                    <div class="dashboard-div">
                        <a href="{{route('admin.users')}}"><span class="fa fa-users"></span><font size="6">&nbsp;&nbsp;{{count($users)}}&nbsp;&nbsp;</font><span>Users</span></a>
                    </div>
                </div>
                <div class="col-md-3" >
                    <div class="dashboard-div">
                        <a href="{{route('admin.shoots')}}"><span class="fa fa-file-image-o"></span><font size="6">&nbsp;&nbsp;{{count($shoots)}}&nbsp;&nbsp;</font><span>Shoots</span></a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dashboard-div">
                        <span class="fa fa-cart-arrow-down"></span><font size="6">&nbsp;&nbsp;{{count($carts)}}&nbsp;&nbsp;</font><span>Orders</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dashboard-div">
                        <span class="fa fa-comments"></span><font size="6">&nbsp;&nbsp;{{count($feedbacks)}}&nbsp;&nbsp;</font><span>Feedback</span>
                    </div>
                </div>
            </div>
            <div class="new_users">
                <br><br><font size="5"><span class="fa fa-users">&nbsp;&nbsp;New users</span></font><hr class="dashboard-hr">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Serial No</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Details</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($users2 as $user)
                            <tr>
                                <td>1</td>
                                <td><img src="/assets/images/profile_picture/{{$user->image}}" alt="" width="100px"></td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->type}}</td>
                                <td>
                                    <a href="{{route('profile.index',[$user->id])}}" target="_blank"><button class="btn btn-default fa fa-info"></button></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{route('admin.users')}}"><button class="btn btn-default">See All users</button></a>
            </div> 
            <div class="recent_shoots">
                <br><br><font size="5"><span class="fa fa-file-image-o">&nbsp;&nbsp;Recent Shoots</span></font><hr class="dashboard-hr">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Serial No</th>
                        <th>Shoot</th>
                        <th>Category</th>
                        <th>Owner</th>
                        <th>Price</th>
                        <th>like</th>
                        <th>Comments</th>
                        <th>Details</th>
                        <th>Remove</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($shoots2 as $shoot)
                            <tr>
                                <td>1</td>
                                <td><img src="/assets/images/shoots/{{$shoot->file_name}}" alt="" width="100px"></td>
                                {{-- <td>sdf</td> --}}
                                <td>{{$shoot->categories->category}}</td>
                                <td><img src="/assets/images/profile_picture/{{$shoot->user->image}}" alt="" width="100px"></td>
                                <td>{{$shoot->price}}</td>
                                <td>{{$shoot->like}}</td>
                                <td>{{count($shoot->comments)}}</td>
                                <td><button data-toggle="modal" data-target="#myImageModal" onclick="showDetails({{$shoot,$shoot->user->name}})" class="btn btn-default fa fa-info"></button></td>
                                <td><button class="btn btn-danger fa fa-trash"></button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{route('admin.shoots')}}"><button class="btn btn-default">See All Shoots</button></a>
            </div> 
            <div class="recent_orders">
                <br><br><font size="5"><span class="fa fa-shopping-cart">&nbsp;&nbsp;Recent Orders</span></font><hr class="dashboard-hr">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Serial No</th>
                        <th>Image</th>
                        <th>Client</th>
                        <th>Shoot</th>
                        <th>Price</th>
                        <th>Details</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td><img src="/assets/images/dp1.jpg" alt="" width="100px"></td>
                        <td>Ismail Hsoen</td>
                        <td><img src="/assets/images/wedding1.jpg" alt="" width="100px"></td>
                        <td>1000</td>
                        <td><button class="btn btn-default fa fa-info"></button></td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td><img src="/assets/images/dp1.jpg" alt="" width="100px"></td>
                        <td>Ismail Hsoen</td>
                        <td><img src="/assets/images/wedding1.jpg" alt="" width="100px"></td>
                        <td>1000</td>
                        <td><button class="btn btn-default fa fa-info"></button></td>
                    </tr>
                    </tbody>
                </table>
                <button class="btn btn-default">See All Orders</button>
            </div> 
            <div class="recent_feedback">
                <br><br><font size="5"><span class="fa fa-users">&nbsp;&nbsp;Recent Feedbacks</span></font><hr class="dashboard-hr">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Serial No</th>
                        <th>email</th>
                        <th>Feedback</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($feedbacks2 as $feedback)
                            <tr>
                                <td>1</td>
                                <td>{{$feedback->email}}</td>
                                <td>{{$feedback->feedback}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button class="btn btn-default">See All Feedback</button>
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
                            <span id="tagline">{{Auth::user()->tagline}}</span>
                        </div>
                        <div class="modal-body">
                            <img class="modal-img-center" id="modal_main_image" src="/assets/images/cover1.jpg">
                        </div>
                        <div class="text-center">
                            <span class="fa fa-eye eye-btn" id="views">&nbsp;&nbsp;207670 views</span>
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
                        <hr style="border:none;">
                        <div class="modal-footer" >
                            <button style="position:absolute;bottom:10px;right:20px;" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        function showDetails(shoots,owner)
        {
            // console.log(shoots.category);
            $('#views').html('&nbsp;&nbsp;'+shoots.view);
            $('#owner-name').html('&nbsp;&nbsp;'+shoots.user.name);
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
                    $('#comments').html(data);
                }
            });
            
        }
    </script>
</body>
</html>