@if (count($users)>0)
        <thead>
        <tr>
            <th>Serial No</th>
            <th>Image</th>
            <th>Name</th>
            <th>Type</th>
            <th>Status</th>
            <th>Details</th>
            <th>Add</th>
            <th>Block</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td></td>
                    <td><img src="/assets/images/profile_picture/{{$user->image}}" alt="" width="100px"></td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->type}}</td>
                    <td>{{$user->status}}</td>
                    <td><a href=""><button class="btn btn-default fa fa-info"></button></a></td>
                    @if ($user->status=='active')
                       <td>-</td>
                    @else
                        <td><a href="{{route('admin.usersAdd',$user->id)}}"><button class="btn btn-success fa fa-check"></button></a></td>
                    @endif
                    @if ($user->status=='block')
                       <td>-</td>                                    
                    @else
                        <td><a href="{{route('admin.usersBlock',$user->id)}}"><button class="btn btn-danger fa fa-times"></button></a></td>                                    
                    @endif
                </tr>
            @endforeach
        </tbody>
@else
        <thead>
        <tr>
            <th>Serial No</th>
            <th>Image</th>
            <th>Name</th>
            <th>Type</th>
            <th>Status</th>
            <th>Details</th>
            <th>Add</th>
            <th>Block</th>
        </tr>
        </thead>
        <tbody>
            <td colspan="11">
                <div class="text-center" id="danger-message" style="background:rgba(207, 0, 15, 1); color:#fff; padding:20px;">
                user not available
                </div>
            </td>
        </tbody>
@endif
        
