
@if (count($results['shoot_comments'])>0)
    <font color=#0000FF><strong>see previous comments.....</strong></font><br>
    @foreach ($results['shoot_comments'] as $shoot_comment)
        <hr class="comment-hr">
        <div class="comment-1">
            <img src="/assets/images/profile_picture/{{$shoot_comment->user_info->image}}" width="70px" height="60px" class="pull-left">
            <font><strong>&nbsp;&nbsp;&nbsp;</strong>{{$shoot_comment->user_info->name}}</font><br>
            <font class="greyfont">&nbsp;&nbsp;&nbsp;{{$shoot_comment->user_info->tagline}}</font><br>
            <font>&nbsp;&nbsp;&nbsp;... {{$shoot_comment->comment}}</font><br>
        </div>
        <hr class="comment-hr">
    @endforeach
    
@else
    <font color=red>comments not available</font><br>    
@endif
@if (Auth::check())
    @if (Auth::user()->type!='admin')
        <form action="{{route('photographer.addComment')}}" method="post">
            @csrf
            <hr class="comment-hr">
            <input type="hidden" name="shoot_id" id="clicked-shoot-id">
            <textarea name="comment" cols="30" rows="3" class="myaddImageInput"></textarea>
            <input type="submit" value="Submit" class="btn btn-success">
        </form>
    @endif
@endif
    @if (count($results['similar_shoots'])>0)
        <script>
            var similar_shoots={!! json_encode($results['similar_shoots']) !!};
            $('#similiar-column1').html('');
            $('#similiar-column2').html('');
            $('#similiar-column3').html('');
            $('ready',function () {
                similar_shoots.forEach((similar_shoot,i )=> {
                    $('#similiar-column'+(i%3+1)).append(
                        '<div class="img-details-div">'+
                            '<img class="image" id="" src="/assets/images/shoots/'+similar_shoot.file_name+'" style="width:100%;" data-toggle="modal" data-target="#myImageModal" >'+
                            '<div class="middle">'+
                                '<div class="text">'+
                                    '<span class="pull-left">hello</span>'+
                                    '<span class="pull-right fa fa-heart-o"></span>'+
                                    '<span class="pull-right fa fa-cart-plus">&nbsp;&nbsp;&nbsp;</span>'+
                                '</div>'+
                            '</div>'+
                        '</div>'
                    );
                 });
                 
            });
        </script>
    @else
        <font color=red>comments not available</font><br> 
        
    @endif
    