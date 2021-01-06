<thead>
    <tr>
        <th>Serial No</th>
        <th>Shoot</th>
        <th>Category</th>
        <th>Owner</th>
        <th>Price</th>
        <th>like</th>
        <th>Comments</th>
        <th>Details</th>
        <th>Remove</th>
    </tr>
</thead>
<tbody>
        @foreach ($shoots as $shoot)
            <tr>
                <td>1</td>
                <td><img src="/assets/images/shoots/{{$shoot->file_name}}" alt="" width="100px"></td>
                {{-- <td>sdf</td> --}}
                <td>{{$shoot->categories->category}}</td>
                <td><img src="/assets/images/profile_picture/{{$shoot->user->image}}" alt="" width="100px"></td>
                <td>{{$shoot->price}}</td>
                <td>{{$shoot->like}}</td>
                <td>{{count($shoot->comments)}}</td>
                <td><button data-toggle="modal" data-target="#myImageModal" onclick="showDetails({{$shoot,$shoot->user->name}})" class="btn btn-default fa fa-info"></button></td>
                <td><a href="{{route('admin.shootDelete',$shoot->id)}}"><button class="btn btn-danger fa fa-trash"></button></a></td>
            </tr>
        @endforeach
    </tbody>