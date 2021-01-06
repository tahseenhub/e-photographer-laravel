<!DOCTYPE html>
<html lang="en">
    <head>
        @include('includes.links')
        <link rel="stylesheet" href="/assets/css/p_profile.css">
        <link rel="stylesheet" href="/assets/css/footer.css">
        <title>Photographer</title>
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
  .clearfix img{
      width: 100%;
      height: 300px;
      object-fit: cover;
  }
    </style>
    <body>
        @include('includes.header')
        
        <div class="center">
            <div class="clearfix"> 
                <img src="/assets/images/shoots/{{$shoot->file_name}}" alt="">
                <br><br>
                <h4><span class="fa fa-edit"> Edit Shoot</span></h4>
                <table class="table">
                    <form action="/photographer/editShootSubmit" method="post" enctype="multipart/form-data">
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
                                <input type="hidden" value="{{$shoot->id}}" name="shoot_id">
                                <label for="file_name">Choose your shoot:</label><br>
                                <input type="file" name="file_name" class="myaddImageInput @error('file_name') is-invalid @enderror" required value="{{$shoot->file_name}}">
                                @error('file_name')
                                    <span class="invalid-feedback" role="alert">
                                        <span style="color:red">{{ $message }}</span><br>
                                    </span>
                                @enderror
                                <label for="price">Price</label><br><input type="text" name="price" class="myaddImageInput @error('price') is-invalid @enderror" value="{{$shoot->price}}"><br>
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <span style="color:red">{{ $message }}</span><br>
                                    </span>
                                @enderror
                                <label for="about">About Shoot:</label><br>
                                <textarea name="description" id="" cols="30" rows="3" class="myaddImageInput @error('about') is-invalid @enderror">{{$shoot->description}}</textarea>
                                @error('about')
                                    <span class="invalid-feedback" role="alert">
                                        <span style="color:red">{{ $message }}</span><br>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="edit_caption">Shoot caption:</label><br>
                                <input type="text" name="edit_caption" class="myaddImageInput @error('edit_caption') is-invalid @enderror" value="{{$shoot->caption}}"><br>
                                @error('edit_caption')
                                    <span class="invalid-feedback" role="alert">
                                        <span style="color:red">{{ $message }}</span><br>
                                    </span>
                                @enderror
                                <label for="capture_by">Capture by:</label><br>
                                <input type="text" name="capture_by" class="myaddImageInput @error('capture_by') is-invalid @enderror" placeholder="" value="{{$shoot->capture_by}}"><br>
                                @error('capture_by')
                                    <span class="invalid-feedback" role="alert">
                                        <span style="color:red">{{ $message }}</span><br>
                                    </span>
                                @enderror
                                <label for="lens">Lens:</label><br>
                                <input type="text" name="lens" class="myaddImageInput @error('lens') is-invalid @enderror" value="{{$shoot->lens}}"><br>
                                @error('lens')
                                    <span class="invalid-feedback" role="alert">
                                        <span style="color:red">{{ $message }}</span><br>
                                    </span>
                                @enderror
                                <label for="software">Software used:</label><br>
                                <input type="text" name="software" class="myaddImageInput @error('software') is-invalid @enderror" value="{{$shoot->software}}"><br>
                                @error('software')
                                    <span class="invalid-feedback" role="alert">
                                        <span style="color:red">{{ $message }}</span><br>
                                    </span>
                                @enderror
                                <label for="edit_searchTags">Search tag:</label><br>
                                <input type="text" name="edit_searchTags" class="myaddImageInput @error('edit_searchTags') is-invalid @enderror" value="{{$shoot->search_tags}}"><br>
                                @error('edit_searchTags')
                                    <span class="invalid-feedback" role="alert">
                                        <span style="color:red">{{ $message }}</span><br>
                                    </span>
                                @enderror
                            </div>
                        </div> 
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </table>
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

        
        
        
        @include('includes.footer')
        


        {{-- var ajaxUrl='{{route('photographer.ajaxWeddingShoots', '+','id')}}';
        {{ route('admin.editIndustry', ['id'=>1]) }} --}}

<script>


    
</script>
    </body>
</html>