
@if(Auth::check())    
    @if(Auth::user()->type=="photographer")
        <link rel="stylesheet" href="/assets/css/photographer_header.css">
        <header>
            <div class="header navbar-fixed-top p_header">
            <!-- <h2 class="logo">DarkCode</h2> -->
            <a href="{{route('home.index')}}"><img class="icon-logo" src="/assets/images/icon2.png"></a>
            <a href="{{route('photographer.index')}}"><img class="logo" src="/assets/images/white.png"></a>
            <input type="text" class="mysearchbox input-sm" placeholder="..." onkeyup="ajaxSearchShoots(this.value)">
            

            <input type="checkbox" id="chk">
            <label for="chk" class="show-menu-btn">
                <i class="fa fa-bars"></i>
            </label>
            <ul class="menu">
                <a href="{{route('photographer.profile')}}"><img class="img-circle" src="\assets\images\profile_picture\{{Auth::user()->image}}"><span class="profile-active">{{Auth::user()->name}}</span></a>
                <a href="{{route('photographer.index')}}"><span class="fa fa-home home-active"></span></a>
                <a><img src="/assets/images/add-image-white.png" alt="" width="17px;" data-toggle="modal" data-target="#myaddImageModal"></a>
                <a><span class="fa fa-trophy"></span></a>
                <a><span class="fa fa-cart-plus" data-toggle="modal" data-target="#mycartModal"><span class="notify-number" id="cart-number">&nbsp; {{count($carts)}}</span></span></a>
                <a><span class="fa fa-bell-o" data-toggle="modal" data-target="#myHireReqModal"><span class="notify-number" id="cart-number">&nbsp; {{count($hire_reqs_unseen)}}</span></span></a>
                <a href="{{route('allEvents')}}"><span class="fa fa-briefcase events-active"></span></a>
                {{-- <a href="{{route('photographer.index')}}"><span class="fa fa-bell-o"></span></a> --}}
                <a href="{{route('messenger.index')}}"><span class="fa fa-whatsapp messenger-active"></span></a>
                <a class="" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    <span class="fa fa-sign-out"></span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

                <label for="chk" class="hide-menu-btn">
                <i class="fa fa-bars"></i>
                </label>
            </ul>
            </div>
        </header>
    @elseif(Auth::user()->type=="client")
        <link rel="stylesheet" href="/assets/css/photographer_header.css">
        <header>
            <div class="header navbar-fixed-top">
            <!-- <h2 class="logo">DarkCode</h2> -->
            <a href="{{route('home.index')}}"><img class="icon-logo" src="/assets/images/icon2.png"></a>
            <a href="{{route('client.index')}}"><img class="logo" src="/assets/images/white.png"></a>
            <input type="text" class="mysearchbox input-sm" placeholder="..." onkeyup="ajaxSearchShoots(this.value)">
            <input type="checkbox" id="chk">
            <label for="chk" class="show-menu-btn">
                <i class="fa fa-bars"></i>
            </label>
            <ul class="menu">
                <a href="{{route('client.profile')}}"><img class="img-circle" src="\assets\images\profile_picture\{{Auth::user()->image}}">{{Auth::user()->name}}</a>
                <a href="{{route('client.index')}}"><span class="fa fa-home"></span></a>
                <a href="{{route('client.index')}}"><span class="fa fa-trophy"></span></a>
                <a><span class="fa fa-cart-plus" data-toggle="modal" data-target="#mycartModal"><span class="notify-number" id="cart-number">&nbsp; {{count($carts)}}</span></span></a>
                <a href="{{route('allEvents')}}"><span class="fa fa-briefcase"></span></a>
                <a href="{{route('client.index')}}"><span class="fa fa-bell-o"></span></a>
                <a href="{{route('messenger.index')}}"><span class="fa fa-whatsapp"></span></a>
                <a class="" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    <span class="fa fa-sign-out"></span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <label for="chk" class="hide-menu-btn">
                <i class="fa fa-bars"></i>
                </label>
            </ul>
            </div>
        </header>
    @elseif(Auth::user()->type=="admin")
        <link rel="stylesheet" href="/assets/css/admin_header.css">
        <header>
            <div class="header navbar-fixed-top">
            <!-- <h2 class="logo">DarkCode</h2> -->
            <a href="{{route('admin.index')}}"><img class="logo" src="/assets/images/white.png"></a>
            <input type="checkbox" id="chk">
            <label for="chk" class="show-menu-btn">
                <i class="fa fa-bars"></i>
            </label>
            <ul class="menu">
                <a href=""><img class="img-circle" src="\assets\images\profile_picture\{{Auth::user()->image}}">Admin</a>
                <a href="{{route('admin.index')}}"><span class="fa fa-tachometer dashboard-active"></span></a>
                <a href="{{route('messenger.index')}}"><span class="fa fa-whatsapp messenger-active"></span></a>
                <a href="{{route('admin.exhibition')}}"><span class="fa fa-area-chart exhibition-active"></span></a>
                <a href="{{route('admin.shoots')}}"><span class="fa fa-file-image-o images-active"></span></a>
                <a href="{{route('admin.orders')}}"><span class="fa fa-cart-arrow-down orders-active"></span></a>
                <a href="{{route('admin.contests')}}"><span class="fa fa-trophy"></span></a>
                <a href="{{route('admin.settings')}}"><span class="fa fa-gears settings-active"></span></a>
                <a href="{{route('admin.history')}}"><span class="fa fa-history history-active"></span></a>
                <a class="" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                <span class="fa fa-sign-out"></span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <label for="chk" class="hide-menu-btn">
                <i class="fa fa-bars"></i>
                </label>
            </ul>
            </div>
        </header>
    @endif
@else 

    <link rel="stylesheet" href="/assets/css/header.css">
    {{-- <link href="https://www.tagdphoto.com/assets/css/header.css" type="text/css" rel="stylesheet" media="screen" /> --}}
    <header>
        <div class="header navbar-fixed-top c_header">
            <a href="{{route('home.index')}}"><img class="logo" src="/assets/images/black.png"></a>
            <a href="{{route('home.index')}}"><img class="icon-logo" src="/assets/images/icon2.png"></a>
            <input type="text" class="mysearchbox input-sm" placeholder="..." onkeyup="ajaxSearchShoots(this.value)">

            <input type="checkbox" id="chk">
            <label for="chk" class="show-menu-btn">
            <i class="fa fa-bars"></i>
            </label>
                
            <ul class="menu">
            {{-- <span class="" data-toggle="exhibition" data-target="#exhibition"></span>&nbsp;&nbsp;Exhibition --}}
            <a href="#exhibition"><span class="fa fa-image exhibition-active">&nbsp;&nbsp;Exhibition</span></a>
            <a href="{{route('signin.index')}}"><span class="fa fa-user sign-in-active">&nbsp;&nbsp;Sign in</span></a>
            <a href="/signup"><span class="fa fa-user-plus sign-up-active">&nbsp;&nbsp;Sign Up</span></a>
            <a href="{{route('home.popup')}}" class="popup-a">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span class="fa fa-mobile">&nbsp;&nbsp;PopUp Contest</span>
            </a>
            <label for="chk" class="hide-menu-btn">
                <i class="fa fa-bars"></i>
            </label>
            </ul>
        </div>
    </header>
@endif

<script>

function ajaxSearchShoots(str){
    if(str == "")
    {
        $('#search-contents').css("display","none");        
    }else{
        $.ajax({
            type: "GET",
            url: 'ajax_search_shoots/'+str,
            // data: data,
            // cache: true,
            success: function(data){
                //    $("#resultarea").text(data);
                // alert('hello');
                // console.log(data);
        $('#search-contents').css("display","block");        

                    $('#search-contents').html(data);  
                
                
            }
        });
    }
}

</script>