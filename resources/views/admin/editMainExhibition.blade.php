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
            <form action="{{route('admin.postEditMainExhibition')}}" method="post" enctype="multipart/form-data">
                @csrf 
                <input type="hidden" name="exhibition_id" value="{{$exhibition->id}}">
                Exhibition Name: <input type="text" name="exhibition_name" id="" value="{{$exhibition->exhibition_name}}"><br><br>
                Exhibition Address: <input type="text" name="exhibition_address" id="" value="{{$exhibition->exhibition_address}}"><br><br>
                About Exhibition: <input type="text" name="about_exhibition" id="" value="{{$exhibition->about_exhibition}}"><br><br>
                <button type="submit">Post</button>
            </form>
            <hr>
            
        </div>
    </div>



</body>
</html>