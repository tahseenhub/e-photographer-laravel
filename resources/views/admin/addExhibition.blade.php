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
        .exhibition-active{
            font-weight: bolder;
            color: #3498db;
        }
        
    </style>
<body>
    @include('includes.header')
    <div class="center">
        <div class="clearfix">
            <font size="5"><span class="fa fa-tachometer">&nbsp;&nbsp;Add Exhibition</span></font><hr class="dashboard-hr">
            <br>
            <form action="{{route('admin.addExhibition')}}" method="post">
                @csrf 
                Exhibition Name: <input type="text" name="exhibition_name" id=""><br><br>
                Exhibition Address: <input type="text" name="exhibition_address" id=""><br><br>
                About Exhibition: <input type="text" name="about_exhibition" id=""><br><br>
                <button type="submit">Post</button>
            </form>
            <hr>
            @foreach ($exhibitions as $exhibition)
                <a href="{{route('admin.addExhibitionImagesPage',[$exhibition->id])}}">Add Exhibition Images</a>
                {{ $exhibition->exhibition_name }} <br>
                {{ $exhibition->exhibition_address }} <br>
                {{ $exhibition->about_exhibition }} <hr>
            @endforeach
            
            
            
            
            
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
        
    </script>
</body>
</html>