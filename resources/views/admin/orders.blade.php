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
        .orders-active{
            font-weight: bolder;
            color: #3498db;
        }
    </style>
<body>
    @include('includes.header')
    <div class="center">
        <div class="clearfix">
            <div class="btn-group btn-group-justified">
                    <!-- <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            All users&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="caret"></span></button>
                            <ul class="dropdown-menu" role="menu" class="pull-right">
                              <li><a href="#">Block Users</a></li>
                              <li><a href="#">Active Users</a></li>
                            </ul>
                          </div> -->
                <a href="#" class="btn btn-primary">All Orders</a>
                <a href="#" class="btn btn-default">Complete</a>
                <a href="#" class="btn btn-default">Ongoing</a>
                <a href="#" class="btn btn-default">Cancelled</a>
                <a href="#" class="btn btn-default">Comments</a>
            </div>
            <div class="all_users">
                <br><font size="5"><span class="fa fa-users">&nbsp;&nbsp;All Orders</span></font>
                <input type="text" name="" id="" class="pull-right mysearchinput" placeholder="search orders...">
                <br><br>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Serial No</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Owner</th>
                        <th>Price</th>
                        <th>time</th>
                        <th>Remove</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td><img src="/assets/images/wedding3.jpg" alt="" width="100px"></td>
                        <td>Wedding</td>
                        <td><img src="/assets/images/dp2.jpg" alt="" width="100px"></td>
                        <td>1000</td>
                        <td>27-7-2019</td>
                        <td><button class="btn btn-danger fa fa-trash"></button></td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td><img src="/assets/images/wedding3.jpg" alt="" width="100px"></td>
                        <td>Wedding</td>
                        <td><img src="/assets/images/dp2.jpg" alt="" width="100px"></td>
                        <td>1000</td>
                        <td>07-1-2019</td>
                        <td><button class="btn btn-danger fa fa-trash"></button></td>
                    </tr>
                    </tbody>
                </table>
            </div> 
             
        </div>
    </div>
</body>
</html>