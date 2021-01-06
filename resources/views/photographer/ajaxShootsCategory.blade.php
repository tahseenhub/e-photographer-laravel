@if (count($categoey_shoots)>0)
    <div class="column" id="colum1"></div>
    <div class="column" id="colum2"></div>
    <div class="column" id="colum3"></div>
    <div class="column" id="colum4"></div> 
    <script>
    @for($i = 0; $i < count($categoey_shoots); $i++)
    $('#colum'+{{$i%4+1}}).append(
        '<div class="img-details-div">'+
            '<img class="image" id="" src="/assets/images/shoots/{{$categoey_shoots[$i]->file_name}}" style="width:100%;" data-toggle="modal" data-target="#myImageModal" onclick="showDetails({{$categoey_shoots[$i],$categoey_shoots[$i]->user->name}})">'+
            '<div class="middle">'+
                '<div class="text">'+
                    '<span class="pull-left">{{$categoey_shoots[$i]->user->name}}</span>'+
                    '<span class="pull-right fa fa-heart-o">&nbsp;{{$categoey_shoots[$i]->like}}</span>'+
                    '<span class="pull-right fa fa-cart-plus" id="addtocart" onclick="addToCart({{$categoey_shoots[$i]}})">&nbsp;&nbsp;&nbsp;</span>'+
                '</div>'+
            '</div>'+
        '</div>'
    );
    @endfor
    </script>


@else
    <div class="alert alert-danger" role="alert" style="width:100%;">
        Shoots not available
    </div>
@endif


