
@if( Session::has('flash_notification.message') )
    <div class="alert alert-{{Session::get('flash_notification.level')}} alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4>{{Session::get('flash_notification.message') }} </h4>
    </div>
@endif
