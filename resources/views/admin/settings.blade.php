<!DOCTYPE html>
<html lang="en">
    <head>
            @include('includes.links')
            <link rel="stylesheet" href="/assets/css/admin_header.css">
            <link rel="stylesheet" href="/assets/css/admin_home.css">
            <link rel="stylesheet" href="/assets/css/footer.css">
            <title>Admin</title>
    </head>
    <style>
        .settings-active{
            font-weight: bolder;
            color: #3498db;
        }
    </style>
<body>
    @include('includes.header')
    <div class="center">
        <div class="clearfix">
            
            <div class="slider-image">
                <font size="5"><span class="fa fa-refresh">&nbsp;&nbsp;Slider Image Update</span></font><hr class="dashboard-hr">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Serial No</th>
                            <th>Old Image</th>
                            <th>new Image</th>
                            <th>Save</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><img src="/assets/images/cover1.jpg" alt="" width="100px"></td>
                            <form action="">
                                <td><input type="file" name="slider1" class="mysliderinput"></td>
                                <td><button class="btn btn-success fa fa-check"></button></td>
                            </form>  
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><img src="/assets/images/cover2.jpg" alt="" width="100px"></td>
                            <form action="">
                                <td><input type="file" name="slider2" class="mysliderinput"></td>
                                <td><button class="btn btn-success fa fa-check"></button></td>
                            </form>  
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><img src="/assets/images/cover3.jpg" alt="" width="100px"></td>
                            <form action="">
                                <td><input type="file" name="slider3" class="mysliderinput"></td>
                                <td><button class="btn btn-success fa fa-check"></button></td>
                            </form>  
                        </tr>
                    </tbody>
                </table>
            </div> 
            <div class="password">
                    <br><br><font size="5"><span class="fa fa-refresh">&nbsp;&nbsp;Update Password</span></font><hr class="dashboard-hr">
                    <form action="">
                        <br>
                        <label for="old_password">Old Password:</label><br>
                        <input type="password" name="old_password" value="1234" class="mysliderinput"><br>
                        <label for="new_password">Old Password:</label><br>
                        <input type="password" name="new_password" value="1234" class="mysliderinput"><br>
                        <label for="confirm_password">Old Password:</label><br>
                        <input type="password" name="confirm_password" value="1234" class="mysliderinput"><br><br>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div> 
            
        </div>
    </div>
</body>
</html>