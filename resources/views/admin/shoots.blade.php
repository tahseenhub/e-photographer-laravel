<!DOCTYPE html>
<html lang="en">
    <head>
            @include('includes.links')
            <link rel="stylesheet" href="/assets/css/admin_header.css">
            <link rel="stylesheet" href="/assets/css/admin_home.css">
            <link rel="stylesheet" href="/assets/css/home.css">
            <link rel="stylesheet" href="/assets/css/footer.css">
            <title>Admin</title>
    </head>
    <style>
        .images-active{
            font-weight: bolder;
            color: #3498db;
        }
    </style>
<body>
    @include('includes.header')
    <div class="center">
        <div class="clearfix">
            <div class="btn-group btn-group-justified">
                    <!-- <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            All users&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="caret"></span></button>
                            <ul class="dropdown-menu" role="menu" class="pull-right">
                              <li><a href="#">Block Users</a></li>
                              <li><a href="#">Active Users</a></li>
                            </ul>
                          </div> -->
                <span id="all_shoots" class="btn btn-primary" onclick="ajaxFreeShoots('all')">All Shoots</span>
                <span id="free_shoots" class="btn btn-default" onclick="ajaxFreeShoots('free')">Free</span>
                <span id="premium_shoots" class="btn btn-default" onclick="ajaxFreeShoots('premium')">Premium</span>
                <span id="all_shoots" class="btn btn-default">Likes</span>
                <span id="all_shoots" class="btn btn-default">Comments</span>
                <span id="all_shoots" class="btn btn-default">Sold Out</span>
            </div>
            <div class="all_Shoots">
                <br><font size="5"><span class="fa fa-users">&nbsp;&nbsp;All Shoots</span></font>
                <input type="text" name="" id="" class="pull-right mysearchinput" placeholder="search images...">
                <br><br>
                <table class="table" id="table">
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
                        @foreach ($shoots as $shoot)
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
                                <td><a href="{{route('admin.shootDelete',$shoot->id)}}"><button class="btn btn-danger fa fa-trash"></button></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal fade" id="myImageModal" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <img src="/assets/images/archi4.jpg" alt="" class="avatar pull-left">
                            <a href="" target="_blank" id="owner-name-href"><span id="owner-name"></span></a>
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
        function showDetails(shoots,owner){
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



        function ajaxFreeShoots(str){
            $.ajax({
                type: "GET",
                url: '/admin/ajax_free_shoots/'+str,
                // data: data,
                // cache: true,
                
                success: function(data){
                    if(str=="free")
                    {
                        $('#free_shoots').addClass('btn btn-primary');
                        $('#all_shoots').removeClass('btn btn-primary');
                        $('#all_shoots').addClass('btn btn-default');
                        $('#premium_shoots').removeClass('btn btn-primary');
                        $('#premium_shoots').addClass('btn btn-default');
                        
                    }else if(str=="all"){
                        $('#all_shoots').addClass('btn btn-primary');
                        $('#free_shoots').removeClass('btn btn-primary');
                        $('#free_shoots').addClass('btn btn-default');
                        $('#premium_shoots').removeClass('btn btn-primary');
                        $('#premium_shoots').addClass('btn btn-default');

                    }else if(str=="premium"){
                        $('#premium_shoots').addClass('btn btn-primary');
                        $('#free_shoots').removeClass('btn btn-primary');
                        $('#free_shoots').addClass('btn btn-default');
                        $('#all_shoots').removeClass('btn btn-primary');
                        $('#all_shoots').addClass('btn btn-default');
                    }
                    $('#table').html(data);
                   
                }
            });
        }
    </script>
</body>
</html>