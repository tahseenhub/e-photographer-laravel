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
            <form action="{{route('admin.addContest')}}" method="post" enctype="multipart/form-data">
                @csrf 
                Contest Title: <input type="text" name="title" id=""><br><br>
                Contest image: <input type="file" name="image" id=""><br><br>
                Contest Description: <textarea type="text" name="description" id=""></textarea><br><br>
                Registration Deadline: <input type="date" data-date-format="DD MMMM YYYY" name="reg_deadline" id=""><br><br>
                Contest From: <input type="date" name="contest_from" id=""><br><br>
                Contest To: <input type="date" name="contest_to" id=""><br><br>
                Entry Fee: <input type="text" name="entry_fee" id=""><br><br>
                {{-- Entry Fee: <input type="text" name="entry_fee" id=""><br><br> --}}
                <button type="submit">Post</button>
            </form>
            <hr>
            @foreach ($contests as $contest)
                {{-- <a href="{{route('admin.addExhibitionImagesPage',[$exhibition->id])}}">Add Exhibition Images</a> --}}
                {{ $contest->title }} <br>
                {{-- {{ $contest->exhibition_address }} <br> --}}
                <img src="/assets/images/contests/{{ $contest->image  }}" alt="sd" width="200px"><br>
                {{ $contest->description }} <br> 
                reg_deadline:   {{ $contest->reg_deadline }} <br> 
                contest_from:   {{ $contest->contest_from }} <br> 
                contest_to:     {{ $contest->contest_to }} <br>
                {{ $contest->entry_fee }} <br>
                {{ $contest->status }} <br>
                <hr>
            @endforeach
            
            
            
            
            
            
        </div>
    </div>


    <script>
        
    </script>
</body>
</html>