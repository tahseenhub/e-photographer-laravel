<span class="category-span category-span-active trend-span">Search Result</span>
{{-- <hr class="hr-10px"> --}}
@if (count($shoots)>0)
    <div class="grid-row" id="grid-row" style="float:right">
        <div class="column" id="colum1"></div>
        <div class="column" id="colum2"></div>
        <div class="column" id="colum3"></div>
        <div class="column" id="colum4"></div> 
    </div>
@else
    <hr class="hr-10px">
    <div class="text-center" id="danger-message" style="background:rgba(207, 0, 15, 1); color:#fff; padding:20px;">
        Results not found
    </div>    
@endif

<script>
    @for($i = 0; $i < count($shoots); $i++)
        $('#colum'+{{$i%4+1}}).append(
            '<div class="img-details-div">'+
                '<img class="image" id="myImg" src="/assets/images/shoots/{{$shoots[$i]->file_name}}" style="width:100%;" data-toggle="modal" data-target="#myImageModal" onclick="showDetails({{$shoots[$i],$shoots[$i]->user->name}})">'+
                '<div class="middle">'+
                    '<div class="text">'+
                        '<span class="pull-left">{{$shoots[$i]->user->name}}</span>'+
                        '<span class="pull-right fa fa-heart-o">&nbsp;{{$shoots[$i]->like}}</span>'+
                        '<span class="pull-right fa fa-cart-plus" id="addtocart" onclick="addToCart({{$shoots[$i]}})">&nbsp;&nbsp;&nbsp;</span>'+
                    '</div>'+
                '</div>'+
            '</div>'
        );
    @endfor


</script>