<!DOCTYPE html>
<html lang="en">
    <head>
        @include('includes.links')
        <link rel="stylesheet" href="/assets/css/home.css">
        <link rel="stylesheet" href="/assets/css/footer.css">
        <title>Exhibition</title>
    </head>
    <style>
        .exhibition-active{
            font-weight: bolder;
            color: #3498db;
        }
    </style>
    <body>
        @include('includes.header')
        <div class="exhibition" id="exhibition" role="" style="margin: 69px 0 0px 0;">
            <div class="container">
                    {{-- <hr> --}}
                    <span class="exhibition-name"><a href="{{route('home.exhibition',$exhibition->id)}}" style="text-decoration:none;">{{ $exhibition->exhibition_name }}</a></span><br>
                    <font color="#4d4d4d"><span class="fa fa-map-marker"></span>&nbsp; {{ $exhibition->exhibition_address  }}</font><br><br>
                        <div class="row">
                            @for ($i = 0; $i < count($exhibition->exb_images); $i++)
                                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
                                    <span class="exhibition-img">
                                            {{-- {{count($exhibition)}} --}}
                                        <img src="/assets/images/exhibition_images/{{ $exhibition->exb_images[$i]->image_name }}" alt="hello" data-toggle="modal" data-target="#myExhibitionImageModal" onclick="showExhibitionImage({{$exhibition->exb_images[$i]}})" style="margin: 0 0 25px 0;">               
                                    </span>
                                </div>                                
                            @endfor
                        </div>
                    <p>{{ $exhibition->about_exhibition }} </p>
                
            </div>
        </div>
        <div class="modal fade" id="myExhibitionImageModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" id="image_caption">Your cart details</h4>
                    </div>
                    <div class="modal-body">
                        <img class="modal-img-center" id="exhibition_image" src="/assets/images/archi3.jpg"><br>
                        <p id="about_image"></p>                   
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        @include('includes.footer')
        <script>
            function showExhibitionImage(ImageDetails)
            {
                if (ImageDetails.image_caption==null) {
                    $('#image_caption').hide();
                } else {
                    $('#image_caption').show();
                    $('#image_caption').html('&nbsp;&nbsp;'+ImageDetails.image_caption);
                }
                $('#exhibition_image').attr('src','/assets/images/exhibition_images'+'/'+ImageDetails.image_name);
                if (ImageDetails.image_caption==null) {
                    $('#about_image').hide();
                } else {
                    $('#about_image').show();
                    $('#about_image').html(ImageDetails.about_image);
                }
                // $('#about_image').html('&nbsp;&nbsp;'+ImageDetails.about_image);
            }
        </script>

    </body>
</html>