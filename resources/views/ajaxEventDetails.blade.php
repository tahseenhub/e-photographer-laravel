@if ($event_info->event_image=="")
    <img class="modal-img-center" id="modal_main_image" src="/assets/images/image_not_given.png">
@else
    <img class="modal-img-center" id="modal_main_image" src="/assets/images/{{ $event_info->event_image }}"> 
@endif
<hr>
<div class="text-center">
    <table class="table">
        <tbody>
            <tr>
                <td>Event Owner:</td>
                <td>{{ $event_info->owner->name }}</td>
            </tr>
            <tr>
                <td>Event Employeer:</td>
                <td>{{ $event_info->employeer->name }}</td>
            </tr>
            <tr>
                <td>Event Name:</td>
                <td>{{ $event_info->event_name }}</td>
            </tr>
            <tr>
                <td>Payment:</td>
                <td>{{ $event_info->payment }}</td>
            </tr>
            <tr>
                <td>Event location:</td>
                <td>{{ $event_info->event_location }}</td>
            </tr>
            <tr>
                <td>Event link:</td>
                <td>{{ $event_info->event_link }}</td>
            </tr>
            <tr>
                <td>Event description:</td>
                <td>{{ $event_info->event_description}}</td>
            </tr>
            <tr>
                <td>Event status:</td>
                <td>{{ $event_info->status}}</td>
            </tr>
        </tbody>
    </table>
</div>
