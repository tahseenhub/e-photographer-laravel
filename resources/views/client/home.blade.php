<!DOCTYPE html>
<html lang="en">
    <head>
        @include('includes.links')
        <link rel="stylesheet" href="/assets/css/home.css">
        <link rel="stylesheet" href="/assets/css/footer.css">
        <title>Photographer</title>
        <style>
        
            .myaddImageInput{
                border: 1px solid rgba(0, 153, 51,.5);
                padding: 7px;
                border-radius: 2px;
                transition: 0.3s;
                margin: 3px 0 10px 0;
                width: 100%;
            }
            .myaddImageInput:hover{
                border: 1px solid rgba(0, 153, 51,1);
            }
        
        </style>
    </head>
    <body>
        @include('includes.header')
        <slider>
            <div class="slider">
                <div class="container-fluids">
                    <div class=" slider-index">
                        <div class="slideshow-container">
                            <div class="myslides slider-fade">
                                <div class="numbertext">1/3</div>
                                <img class="img-responsive" src="/assets/images/cover1.jpg" style="width:4000px">
                                <!-- <div class="text">
                                    <a href=""><button class="mybtn">Work as a freelancer</button></a><br>
                                    Caption One
                                </div> -->
                            </div>
                            <div class="myslides slider-fade">
                                <div class="numbertext">2/3</div>
                                <img class="img-responsive" src="/assets/images/cover2.jpg" style="width:100%">
                                <!-- <div class="text">
                                    <a href=""><button class="mybtn">Work as a Freelancer</button>&nbsp;&nbsp;&nbsp;&nbsp;<a href=""><button class="mybtn">Want to Hire</button></a></a><br>
                                    Caption One
                                </div> -->
                            </div>
                            <div class="myslides slider-fade">
                                <div class="numbertext">3/3</div>
                                <img class="img-responsive" src="/assets/images/cover3.jpg" style="width:100%">
                                <!-- <div class="text">
                                    <a href=""><button class="mybtn">Work as a freelancer</button></a><br>
                                    Caption One
                                </div> -->
                            </div>
                        </div><br>
                        <div style="text-align: center">
                            <span class="dot" onclick="currenslide(1)"></span>
                            <span class="dot" onclick="currenslide(2)"></span>
                            <span class="dot" onclick="currenslide(3)"></span>
                        </div>
                    </div>
                </div>
            </div>
        </slider>
        <div class="stock-photos">
            <div class='modal  fade in' id="loading" hidden style="position:absolute; min-height:500px">
                <img style="position: absolute;
                    top: 20%;
                    left: 50%;
                    margin-top: -50px;
                    margin-left: -50px;"
                    alt="" src="/assets/images/loading.gif"
                />
            </div>
            <div class="text-center" id="message">
                 
            </div>
            <div class="container" id="search-contents"></div>
            <div class="container" id="main-contents">
                <!-- <font size="4"><strong>How to hire a Freelancer</strong></font><hr class="how-to-hr"> -->
                <hr class="hr-20px">
                <span class="category-span category-span-active" id="trend" onclick="fetchData('trend')">Trend</span>
                <span class="category-span" id="wedding" onclick="fetchData('wedding')">Wedding</span>                          
                <span class="category-span" id="wild_life" onclick="fetchData('wild_life')">Wild-Life</span>
                <span class="category-span" id="fashion" onclick="fetchData('fashion')">Fashion</span>
                <span class="category-span" id="sports" onclick="fetchData('sports')">Sports</span>
                <span class="category-span" id="architecture" onclick="fetchData('architecture')">Architecture</span>
                <span class="category-span" id="historic" onclick="fetchData('historic')">Historic</span>
                <hr class="hr-10px">
                <div class="grid-row" id="grid-row" style="float:right">
                    <div class="column" id="colum1"></div>
                    <div class="column" id="colum2"></div>
                    <div class="column" id="colum3"></div>
                    <div class="column" id="colum4"></div> 
                </div>
            </div>
        </div>
        <!-- @if ($errors->any())
            <script>
                $(document).ready(function(){
                    $('#myaddImageModal').modal('show');
                });
            </script>
        @endif -->
        @if ($errors->has('file_name') || $errors->has('price') || $errors->has('caption') || $errors->has('about') || $errors->has('capture_by') || $errors->has('lens') || $errors->has('software'))
            <script>
                $(document).ready(function(){
                    $('#myaddImageModal').modal('show');
                });
            </script>
        @endif
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
                                <th>Order</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            @foreach ($carts as $cart)
                                <tr>
                                    <td><img src="/assets/images/shoots/{{ $cart->shoot->file_name }}" alt="" width="100px"></td>
                                    <td>{{ $cart->user->name }}</td>
                                    <td>{{ $cart->shoot->price }}</td>
                                    <td><a href="{{ route('photographer.orderDetails', [$cart->shoot->id,$cart->user->id]) }}"><button class="btn btn-default fa fa-info"></button></td>
                                    <td><a href="{{ route('order.orderPage',[$cart->id]) }}"><button class="btn btn-success fa fa-long-arrow-right"></button></a></td>
                                    <td>
                                        <a href="{{ route('cart.cartDelete', [$cart->id]) }}"><button class="btn btn-danger fa fa-trash-o"></button></a>
                                    </td>
                                </tr>
                            @endforeach
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
        @include('includes.footer')





        <script>
            var slideIndex=0;
		showSlides();
		function currenslide(n)
		{
			showSlides(slideIndex=n);
		}
		
		function showSlides()
		{
			var i;
			var slides=document.getElementsByClassName("myslides");
			var dots=document.getElementsByClassName("dot");
			for(i=0;i<slides.length;i++)
			{
				slides[i].style.display="none";
			}
			slideIndex++;
			if(slideIndex>slides.length)
			{
				slideIndex=1;
			}
			for(i=0;i<dots.length;i++)
			{
				dots[i].className=dots[i].className.replace(" active", "");
			}
			slides[slideIndex-1].style.display="block";
			dots[slideIndex-1].className +=" active";
			setTimeout(showSlides,2000);
			// setInterval(showSlides,2000);
		}

        </script>
        <script>
// Get the modal
</script>
<script>
        @for($i = 0; $i < count($shoots); $i++)
            $('#colum'+{{$i%4+1}}).append(
                '<div class="img-details-div">'+
                    '<img class="image" id="myImg" src="/assets/images/shoots/{{$shoots[$i]->file_name}}" style="width:100%;" data-toggle="modal" data-target="#myImageModal" onclick="showDetails({{$shoots[$i],$shoots[$i]->user->name}})">'+
                    '<div class="middle">'+
                        '<div class="text">'+
                            '<span class="pull-left">{{$shoots[$i]->user->name}}</span>'+
                            '<span class="pull-right fa fa-heart-o" onclick="addlikes({{$shoots[$i]}})">&nbsp;{{$shoots[$i]->like}}</span>'+
                            '<span class="pull-right fa fa-cart-plus" id="addtocart" onclick="addToCart({{$shoots[$i]}})">&nbsp;&nbsp;&nbsp;</span>'+
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
        function addToCart(shoot)
        {
            // alert({{Auth::user()->id}});
            $.ajax({
                type: "GET",
                url: 'add_to_cart/'+shoot.id+'/'+{{Auth::user()->id}},
                // data: data,
                // cache: true,
                success: function(data){
                    //    $("#resultarea").text(data);
                    // alert('hello');
                    // console.log(data.carts);
                    $("#message").html(data);
                    $("#message").show().delay(3000).queue(function(n) 
                    {
                        $(this).hide(); n();
                    });
                   
                }
            });
        }
        function addlikes(shoot)
        {
            // alert(shoot.id);
            $.ajax({
                type: "GET",
                url: 'photographer/add_like/'+shoot.id,
                // data: data,
                // cache: true,
                success: function(data){
                    //    $("#resultarea").text(data);
                    console.log(data);
                    // console.log(data.carts);
                    // $("#message").html(data);
                    // $("#message").show().delay(3000).queue(function(n) 
                    // {
                    //     $(this).hide(); n();
                    // });
                   
                }
            });
        }

</script>

<script>
    function fetchData(category)
    {
        $.ajax({
            type: "GET",
            url: 'client/shoots_category/'+category,
            // data: data,
            // cache: true,
            success: function(data){
                //    $("#resultarea").text(data);
                // alert('hello');
                // console.log(data);
                if(category=="wedding")
                {
                    $('#wedding').addClass('category-span-active');
                    $("#trend,#wild_life,#fashion,#sports,#architecture,#historic").removeClass('category-span-active');
                }else if(category=="trend")
                {
                    $('#trend').addClass('category-span-active');
                    $("#wedding,#wild_life,#fashion,#sports,#architecture,#historic").removeClass('category-span-active');
                }else if(category=="wild_life")
                {
                    $('#wild_life').addClass('category-span-active');
                    $("#trend,#wedding,#fashion,#sports,#architecture,#historic").removeClass('category-span-active');
                }else if(category=="fashion")
                {
                    $('#fashion').addClass('category-span-active');
                    $("#trend,#wedding,#wild_life,#sports,#architecture,#historic").removeClass('category-span-active');
                }else if(category=="sports")
                {
                    $('#sports').addClass('category-span-active');
                    $("#trend,#wedding,#wild_life,#fashion,#architecture,#historic").removeClass('category-span-active');
                }else if(category=="architecture")
                {
                    $('#architecture').addClass('category-span-active');
                    $("#trend,#wedding,#wild_life,#sports,#fashion,#historic").removeClass('category-span-active');
                }else if(category=="historic")
                {
                    $('#historic').addClass('category-span-active');
                    $("#trend,#wedding,#wild_life,#sports,#architecture,#fashion").removeClass('category-span-active');
                }
                
                $('#grid-row').html(data);
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