<!DOCTYPE html>
<html lang="en">
    <head>
        @include('includes.links')
        <link rel="stylesheet" href="/assets/css/p_profile.css">
        <link rel="stylesheet" href="/assets/css/footer.css">
        <title>Photographer</title>
    </head>
    <style>
        .profile-active{
            font-weight: bolder;
            color: #3498db;
        }
    </style>
    <body>
        @include('includes.header')
        <img src="/assets/images/signinbg.png" alt="" style="width:100%;" class="cover-img">
        <div class="top-left">
            <form action="" method="post">
                @csrf
                <label for="update_cover" class="file-content"><span class="fa fa-upload"></span>&nbsp; upload cover photo</label>
                <input type="file" name="update_cover" id="" class="file-input" accept="image/*">
            </form>
        </div>
        <img src="\assets\images\profile_picture\{{Auth::user()->image}}" alt="" class="profile-picture">
        <div class="text-div">
            <span><font size="5">{{Auth::user()->name}}</font></span><br>
            @if(Auth::user()->tagline!="")
                 <span>{{Auth::user()->tagline}}</span><br><br>
            @else
                <span data-toggle="modal" data-target="#myModal" style="cursor:pointer;color:#000066;">click to add your tagline</span><br><br>
            @endif
            @if(Auth::user()->address!="")
                 <span class="fa fa-map-marker">&nbsp;&nbsp;&nbsp; {{Auth::user()->address}}</span><br>
            @else
            <span data-toggle="modal" data-target="#myModal" style="cursor:pointer;color:#000066;" class="fa fa-map-marker">&nbsp;&nbsp;&nbsp; click to add your address</span><br>
            @endif
            <span class="fa fa-envelope">&nbsp;&nbsp;&nbsp;{{Auth::user()->email}}</span><br>
            @if(Auth::user()->faceebook!="")
                <a href="{{Auth::user()->faceebook}}" target="_blank"><span class="fa fa-facebook-square">&nbsp;&nbsp;&nbsp; {{Auth::user()->faceebook}}</span></a><br>
            @else
            <span data-toggle="modal" data-target="#myModal" style="cursor:pointer;color:#000066;" class="fa fa-facebook-square">&nbsp;&nbsp;&nbsp; click to add your faceebook</span><br>
            @endif
            @if(Auth::user()->instagram!="")
                 <a href="{{Auth::user()->instagram}}" target="_blank"><span class="fa fa-instagram">&nbsp;&nbsp;&nbsp; {{Auth::user()->instagram}}</span></a><br>
            @else
            <span data-toggle="modal" data-target="#myModal" style="cursor:pointer;color:#000066;" class="fa fa-instagram">&nbsp;&nbsp;&nbsp; click to add your instagram</span><br>
            @endif
        </div>
        <!-- <img src="/assets/images/dp1.jpg" alt="" class="profile-picture"> -->
        <span class="fa fa-edit bottom-right edit-icon-text" data-toggle="modal" data-target="#myModal">&nbsp; Update profile</span>  
        <span class="fa fa-edit bottom-right edit-icon" data-toggle="modal" data-target="#myModal"></span>  

        <div class="stock-photos">
            <div class='modal  fade in' id="loading" hidden style="position:absolute; min-height:500px">
                <img style="position: absolute;
                    top: 20%;
                    left: 50%;
                    margin-top: -50px;
                    margin-left: -50px;"
                    alt="" src="images/loading.gif"
                />
            </div>
            <div class="container" id="main-contents">
                    <!-- <font size="4"><strong>How to hire a Freelancer</strong></font><hr class="how-to-hr"> -->
                    <hr class="hr-20px">
                    <button class="gallery-div">Own Shoot</button>
                    <!-- <hr class="recommend-hr">                         -->
                    <button class="gallery-div btn-active">Events</button>                          
                    <button class="gallery-div btn-active">Overview</button>
                    
                    <hr class="hr-10px">
                    <br>

                <div class="grid-row grid-row-margin" style="float:right">
                    <div class="column" id="colum1">
                        <div class="img-details-div">
                            <span style="cursor:pointer"><img class="image" id="" src="/assets/images/add_image.png" style="width:100%;" data-toggle="modal" data-target="#myaddImageModal"></span>
                            <div class="middle">
                                <div class="text">
                                    <span class="pull-left">Add Image</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column" id="colum2"></div>
                    <div class="column" id="colum3"></div>
                    <div class="column" id="colum4"></div>     
                </div>
            </div>
        </div>
        
        @if ($errors->has('name') || $errors->has('address') || $errors->has('tagline') || $errors->has('facebook') || $errors->has('instagram') )
            <script>
                $(document).ready(function(){
                    $('#myModal').modal('show');
                });
            </script>
        @endif
        
        @if ($errors->has('file_name') || $errors->has('price') || $errors->has('caption') || $errors->has('about') || $errors->has('capture_by') || $errors->has('lens') || $errors->has('software') || $errors->has('searchTags'))
            <script>
                $(document).ready(function(){
                    $('#myaddImageModal').modal('show');
                });
            </script>
        @endif
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Update Profile</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/photographer/profile/update" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name">Name:</label><br>
                                    <input type="text" name="name" id="" value="{{old('name', Auth::user()->name)}}" class="myeditprofileInput @error('name') is-invalid @enderror"><br>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <span style="color:red">{{ $message }}</span><br>
                                        </span>
                                    @enderror
                                    <label for="email">Email:</label><br>
                                    <input type="text" name="email" id="" value="{{old('email', Auth::user()->email)}}" class="myeditprofileInput" readonly><br>
                                    <label for="tagline">Address:</label><br>
                                    <input type="text" name="address" id="" value="{{old('address', Auth::user()->address)}}" class="myeditprofileInput @error('address') is-invalid @enderror" placeholder="Enter your address"><br>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <span style="color:red">{{ $message }}</span><br>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="tagline">Tagline:</label><br>
                                    <input type="text" name="tagline" id="" value="{{old('tagline', Auth::user()->tagline)}}" class="myeditprofileInput @error('tagline') is-invalid @enderror" placeholder="Enter your tagline"><br>
                                    @error('tagline')
                                        <span class="invalid-feedback" role="alert">
                                            <span style="color:red">{{ $message }}</span><br>
                                        </span>
                                    @enderror
                                    <label for="facebook">Facebook:</label><br>
                                    <input type="text" name="facebook" id="" value="{{old('facebook', Auth::user()->facebook)}}" class="myeditprofileInput @error('facebook') is-invalid @enderror" placeholder="Enter your facebook"><br>
                                    @error('facebook')
                                        <span class="invalid-feedback" role="alert">
                                            <span style="color:red">{{ $message }}</span><br>
                                        </span>
                                    @enderror
                                    <label for="instagram">Instagram:</label><br>
                                    <input type="text" name="instagram" id="" value="{{old('instagram', Auth::user()->instagram)}}" class="myeditprofileInput @error('instagram') is-invalid @enderror" placeholder="Enter your instagram"><br>
                                    @error('instagram')
                                        <span class="invalid-feedback" role="alert">
                                            <span style="color:red">{{ $message }}</span><br>
                                        </span>
                                    @enderror
                                </div>
                                
                                
                            </div>
                            <input type="submit" value="Update" class="myupdatebutton">

                            
                            
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="mycartModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Your cart details</h4>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Shoot</th>
                                <th>Owner</th>
                                <th>price</th>
                                <th>Details</th>
                                <th>Edit</th>
                                <th>Order</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><img src="/assets/images/dp1.jpg" alt="" width="100px"></td>
                                <td>Ismail Hsoen</td>
                                <td>1000</td>
                                <td><button class="btn btn-default fa fa-info"></button></td>
                                <td><button class="btn btn-default fa fa-edit"></button></td>
                                <td><button class="btn btn-success fa fa-check"></button></td>
                                <td><button class="btn btn-danger fa fa-trash-o"></button></td>
                            </tr>
                            <tr>
                                <td><img src="/assets/images/wedding6.jpeg" alt="" width="100px"></td>
                                <td>Ismail Hsoen</td>
                                <td>1000</td>
                                <td><button class="btn btn-default fa fa-info"></button></td>
                                <td><button class="btn btn-default fa fa-edit"></button></td>
                                <td><button class="btn btn-success fa fa-check"></button></td>
                                <td><button class="btn btn-danger fa fa-trash-o"></button></td>
                            </tr>
                            <tr>
                                <td><img src="/assets/images/dp2.jpg" alt="" width="100px"></td>
                                <td>Ismail Hsoen</td>
                                <td>1000</td>
                                <td><button class="btn btn-default fa fa-info"></button></td>
                                <td><button class="btn btn-default fa fa-edit"></button></td>
                                <td><button class="btn btn-success fa fa-check"></button></td>
                                <td><button class="btn btn-danger fa fa-trash-o"></button></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="myaddImageModal" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Shoot</h4>
                    </div>
                    <div class="modal-body">
                        <form action="/photographer/addshoot" method="post" enctype="multipart/form-data">
                            @csrf 
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="category">Choose category:</label><br>
                                    <select name="category" id="" class="myaddImageInput">
                                        <option value="wedding">Wedding</option>
                                        <option value="wild_life">Wild-Life</option>
                                        <option value="fashion">Fashion</option>
                                        <option value="sports">Sports</option>
                                        <option value="architecture">Architecture</option>                                     
                                        <option value="historic">Historic</option>                                   
                                    </select><br>
                                    <label for="file_name">Choose your shoot:</label><br>
                                    <input type="file" name="file_name" class="myaddImageInput @error('file_name') is-invalid @enderror" required value="{{old('file_name')}}">
                                    @error('file_name')
                                        <span class="invalid-feedback" role="alert">
                                            <span style="color:red">{{ $message }}</span><br>
                                        </span>
                                    @enderror
                                    <label for="price">Price</label><br><input type="text" name="price" class="myaddImageInput @error('price') is-invalid @enderror"><br>
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <span style="color:red">{{ $message }}</span><br>
                                        </span>
                                    @enderror
                                    <label for="about">About Shoot:</label><br>
                                    <textarea name="description" id="" cols="30" rows="3" class="myaddImageInput @error('about') is-invalid @enderror"></textarea>
                                    @error('about')
                                        <span class="invalid-feedback" role="alert">
                                            <span style="color:red">{{ $message }}</span><br>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="caption">Shoot caption:</label><br>
                                    <input type="text" name="caption" class="myaddImageInput @error('caption') is-invalid @enderror"><br>
                                    @error('caption')
                                        <span class="invalid-feedback" role="alert">
                                            <span style="color:red">{{ $message }}</span><br>
                                        </span>
                                    @enderror
                                    <label for="capture_by">Capture by:</label><br>
                                    <input type="text" name="capture_by" class="myaddImageInput @error('capture_by') is-invalid @enderror" placeholder=""><br>
                                    @error('capture_by')
                                        <span class="invalid-feedback" role="alert">
                                            <span style="color:red">{{ $message }}</span><br>
                                        </span>
                                    @enderror
                                    <label for="lens">Lens:</label><br>
                                    <input type="text" name="lens" class="myaddImageInput @error('lens') is-invalid @enderror"><br>
                                    @error('lens')
                                        <span class="invalid-feedback" role="alert">
                                            <span style="color:red">{{ $message }}</span><br>
                                        </span>
                                    @enderror
                                    <label for="software">Software used:</label><br>
                                    <input type="text" name="software" class="myaddImageInput @error('software') is-invalid @enderror"><br>
                                    @error('software')
                                        <span class="invalid-feedback" role="alert">
                                            <span style="color:red">{{ $message }}</span><br>
                                        </span>
                                    @enderror
                                    <label for="searchTags">Search tag:</label><br>
                                    <input type="text" name="searchTags" class="myaddImageInput @error('searchTags') is-invalid @enderror"><br>
                                    @error('searchTags')
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
        <div class="modal fade" id="myImageModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <img src="/assets/images/archi4.jpg" alt="" class="avatar pull-left">
                        <span>{{Auth::user()->name}}</span>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="fa fa-plus-square-o myBtn">&nbsp;&nbsp;Follow</button>
                        <button class="fa fa-cart-plus myBtn pull-right"></button>
                        <button class="fa fa-heart-o myBtn pull-right" id="likes">&nbsp;&nbsp;389 likes</button>
                        <a href="" id="editShoot" target="_blank"><button class="fa fa-edit myBtn pull-right" >&nbsp;&nbsp;Edit Shoot</button></a>
                        <br>
                        <span id="tagline">{{Auth::user()->tagline}}</span>
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
        
        
        
        @include('includes.footer')
        


        {{-- var ajaxUrl='{{route('photographer.ajaxWeddingShoots', '+','id')}}';
        {{ route('admin.editIndustry', ['id'=>1]) }} --}}

<script>
    @for($i = 0; $i < count($shoots); $i++)
        $('#colum'+{{$i%4+1}}).append(
            '<div class="img-details-div">'+
                '<img class="image" id="" src="/assets/images/shoots/{{$shoots[$i]->file_name}}" style="width:100%;" data-toggle="modal" data-target="#myImageModal" onclick="showDetails({{$shoots[$i]}})">'+
                '<div class="middle">'+
                    '<div class="text">'+
                        '<span class="pull-left">{{$shoots[$i]->user->name}}</span>'+
                        '<span class="pull-right fa fa-heart-o">&nbsp;{{$shoots[$i]->like}}</span>'+
                    '</div>'+
                '</div>'+
            '</div>'
        );
    @endfor

    function showDetails(shoots)
    {
        // console.log(shoots.category);
        $('#views').html('&nbsp;&nbsp;'+shoots.view);
        $('#likes').html('&nbsp;&nbsp;'+shoots.like);
        $('#caption').html(shoots.caption);
        $('#modal_main_image').attr('src','/assets/images/shoots'+'/'+shoots.file_name);
        $('#editShoot').attr("href","/photographer/edit_shoot/"+shoots.id);
        $('#uploaded_at').html(shoots.created_at);
        $('#camera').html(shoots.capture_by);
        $('#lens').html(shoots.lens);
        $('#size').html(shoots.file_size);
        $('#resolution').html(shoots.resolution);
        $('#aspect_ratio').html(shoots.aspect_ratio);
        $('#software').html(shoots.software);
        
        $.ajax({
            type: "GET",
            url: '/photographer/shoots/'+shoots.id+'/'+shoots.category_id,
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

    
</script>
    </body>
</html>