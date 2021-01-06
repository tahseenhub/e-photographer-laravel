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

           
            <form action="{{route('admin.editImage')}}" method="post" enctype="multipart/form-data">
                @csrf 
                Image Caption :<input type="text" name="image_caption" value="{{ $image->image_caption }}"><br>
                Image 1: <input type="file" name="newimage" id="" value="{{ $image->image_name }}"><br>
                <input type="hidden" name="oldImage" id="" value="{{ $image->image_name }}">
                <input type="hidden" name="id" id="" value="{{ $image->id }}">
                About Images: <textarea name="about_image" id="" cols="30" rows="10">{{ $image->about_image }}</textarea><br><br>
                <button type="submit">Post</button>
            </form>
            <hr>
            
        </div>
    </div>



</body>
</html>