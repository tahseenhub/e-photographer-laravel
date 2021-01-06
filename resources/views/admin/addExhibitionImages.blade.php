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
            <font size="5"><span class="fa fa-tachometer">&nbsp;&nbsp;Add Exhibition Images</span></font><hr class="dashboard-hr">
            <br>
            {{-- {{ $exhibition->exhibition_name }} <br> --}}
            @foreach ($exhibition as $exhibition)
                {{-- <a href="{{route('admin.addExhibitionImagesPage',[$exhibition->id])}}">Add Exhibition Images</a> --}}
                {{ $exhibition->exhibition_name }} <br>
                {{ $exhibition->exhibition_address }} <br>
                {{ $exhibition->about_exhibition }} <br> <a href="{{route('admin.editMainExhibition',[$exhibition->id])}}">edit</a> <hr>
            @endforeach
            @foreach ($exbImages as $exbImage)
            {{-- <a href="{{route('admin.addExhibitionImagesPage',[$exhibition->id])}}">Add Exhibition Images</a> --}}
            <img src="\assets\images\exhibition_images\{{$exbImage->image_name}}" alt="sfdfg" width="100px"><br><a href="{{route('admin.editExhibitionImages',[$exbImage->id])}}">edit</a> <hr>
            
            
        @endforeach
            <form action="{{route('admin.addExhibitionImages')}}" method="post" enctype="multipart/form-data">
                @csrf 
                Image Caption :<input type="text" name="image_caption"><br>
                Image 1: <input type="file" name="image" id=""><br>
                About Images: <textarea name="about_image" id="" cols="30" rows="10"></textarea><br><br>
                <button type="submit">Post</button>
            </form>
            <hr>
            
            
            
            
            
            
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