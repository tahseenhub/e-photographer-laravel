<!DOCTYPE html>
<html lang="en">
    <head>
        @include('includes.links')
        <link rel="stylesheet" href="/assets/css/home.css">
        <link rel="stylesheet" href="/assets/css/footer.css">
        <title>Orders</title>
        <style>
        
        </style>
    </head>
    <body>
        @include('includes.header')
        <div class="container">
            <div class="row">
                <form action="{{ route('order.orderConfirmation') }}" method="post">
                    @csrf
                    <div class="col-md-6">
                        <div class="order-identity">
                            <div class="row">
                                <input type="text" class="form-control  @error('cart_id') is-invalid @enderror" name="cart_id" id="" value="{{$cart->id}}">

                                @error('cart_id')
                                <span class="invalid-feedback" role="alert">
                                    <span style="color:red">{{ $message }}</span><br>
                                </span>
                                @enderror
                                <div class="col-md-6">
                                    <label for="name">Name:</label><input type="text" name="name" id="" readonly class="myOrderInput" value="{{Auth::user()->name}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="email">Email:</label><input type="text" name="email" id="" readonly class="myOrderInput" value="{{Auth::user()->email}}">
                                </div>
                                <div class="col-md-12">
                                    <label for="address">Address:</label><textarea name="address" id="" class="myOrderInput @error('address') is-invalid @enderror" placeholder="Enter Your Flat no-House no-Road no"></textarea>
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <span style="color:red">{{ $message }}</span><br>
                                    </span>
                                    @enderror
                                </div>
                                {{-- <input type="text" name="" id="" value="{{Auth::}}"> --}}
                            </div>    
                        </div> 
                    </div>
                    <div class="col-md-6">
                        <div class="order-payment">
                            <div class="btn-group btn-group-justified">
                                <span id="all_tab" class="btn btn-primary fa fa-mobile">&nbsp; Mobile Payment <br>bkash/rocket</span>
                                <span id="active_tab" class="btn btn-default fa fa-credit-card-alt">&nbsp; Credit-Card</span>
                                <span id="block_tab" class="btn btn-default">Cash on delivery</span>
                            </div>
                            <div class="row text-center">
                                <div class="col-md-12">
                                    
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="col-md-12">
                        <div class="order-details">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="shoot-details">
                                        <div class="text-center"><h4>Order Details</h4></div>
                                        <div class="text-center">
                                            <img src="/assets/images/shoots/{{$cart->shoot->file_name}}" alt="hello" class="final-order-shoot">
                                        </div>
                                        <br>
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>Caption:</td>
                                                    <td>{{$cart->shoot->caption}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Description:</td>
                                                    <td>{{$cart->shoot->description}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Capture by:</td>
                                                    <td>{{$cart->shoot->capture_by}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Lens:</td>
                                                    <td>{{$cart->shoot->lens}}</td>
                                                </tr>
                                                <tr>
                                                    <td>File size:</td>
                                                    <td>{{$cart->shoot->file_size}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Resolution:</td>
                                                    <td>{{$cart->shoot->resolution}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Software:</td>
                                                    <td>{{$cart->shoot->software}}</td>
                                                </tr>
                                                <tr>
                                                    <td>View:</td>
                                                    <td>{{$cart->shoot->view}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Likes:</td>
                                                    <td>{{$cart->shoot->like}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Uploaded at:</td>
                                                    <td>{{$cart->shoot->created_at}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="confirm-order">
                                        <div class="text-center"><h4>Order Confirmation</h4></div>
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>Quantity : </td>
                                                    <td>1</td>
                                                </tr>
                                                <tr>
                                                    <td>Price: </td>
                                                    <td>{{$cart->shoot->price}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Shipping Cost: </td>
                                                    <td>none</td>
                                                </tr>
                                                <tr>
                                                    <td>Confirm Order: </td>
                                                    <td><button type="submit" class="btn btn-success">Order</button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>