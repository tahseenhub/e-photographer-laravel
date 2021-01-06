<!DOCTYPE html>
<html lang="en">
    <head>
        @include('includes.links')
        <link rel="stylesheet" href="/assets/css/photographer_header.css">
        <link rel="stylesheet" href="/assets/css/p_profile.css">
        <link rel="stylesheet" href="/assets/css/footer.css">
        <title>Client</title>
    </head>
    <body>
        @include('includes.header')
        <img src="/assets/images/signinbg.png" alt="" style="width:100%;" class="cover-img">
        <div class="top-left">
            <form action="" method="post">
                <input type="file" name="update_cover" id="" class="file-input" accept="image/*">
                <label for="file" class="file-content"><span class="fa fa-upload"></span>&nbsp; upload cover photo</label>
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

                
            </div>
        </div>

        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Update Profile</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/client/profile/update">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name">Name:</label><br>
                                    <input type="text" name="name" id="" value="{{old('name', Auth::user()->name)}}" class="myeditprofileInput @error('name') is-invalid @enderror"><br>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="email">Email:</label><br>
                                    <input type="text" name="email" id="" value="{{old('email', Auth::user()->email)}}" class="myeditprofileInput" readonly><br>
                                    <label for="tagline">Address:</label><br>
                                    <input type="text" name="address" id="" value="{{old('address', Auth::user()->address)}}" class="myeditprofileInput @error('address') is-invalid @enderror" placeholder="Enter your address"><br>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="tagline">Tagline:</label><br>
                                    <input type="text" name="tagline" id="" value="{{old('tagline', Auth::user()->tagline)}}" class="myeditprofileInput @error('tagline') is-invalid @enderror" placeholder="Enter your tagline"><br>
                                    @error('tagline')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="facebook">Facebook:</label><br>
                                    <input type="text" name="facebook" id="" value="{{old('facebook', Auth::user()->facebook)}}" class="myeditprofileInput @error('facebook') is-invalid @enderror" placeholder="Enter your facebook"><br>
                                    @error('facebook')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="instagram">Instagram:</label><br>
                                    <input type="text" name="instagram" id="" value="{{old('instagram', Auth::user()->instagram)}}" class="myeditprofileInput @error('instagram') is-invalid @enderror" placeholder="Enter your instagram"><br>
                                    @error('instagram')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input type="submit" value="Update" class="myupdatebutton">
                                </div>
                            </div>
                            
                            
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
                                    <td><a href="{{ route('order.orderPage',[$cart->id]) }}"></a><button class="btn btn-success fa fa-long-arrow-right"></button></a></td>
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
        
        
        @include('includes.footer')
        




        
        <script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = captionText.value();
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
    </body>
</html>