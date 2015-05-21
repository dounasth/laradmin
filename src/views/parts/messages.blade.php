<div class="notifications-container">
@if (is_array($messages))
    @foreach ($messages as $message)
        @if ($message->type == AlertMessage::TYPE_ERROR)
            <div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i>
        @elseif ($message->type == AlertMessage::TYPE_WARNING)
            <div class="alert alert-warning alert-dismissable"><i class="fa fa-warning"></i>
        @elseif ($message->type == AlertMessage::TYPE_INFO)
            <div class="alert alert-info alert-dismissable"><i class="fa fa-info"></i>
        @elseif ($message->type == AlertMessage::TYPE_SUCCESS)
            <div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i>
        @endif
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <b>{{$message->type}}!</b> {{$message->message}}
        </div>
    @endforeach
@elseif (is_object($messages))
    @if ($messages->type == AlertMessage::TYPE_ERROR)
        <div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i>
    @elseif ($messages->type == AlertMessage::TYPE_WARNING)
        <div class="alert alert-warning alert-dismissable"><i class="fa fa-warning"></i>
    @elseif ($messages->type == AlertMessage::TYPE_INFO)
        <div class="alert alert-info alert-dismissable"><i class="fa fa-info"></i>
    @elseif ($messages->type == AlertMessage::TYPE_SUCCESS)
        <div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i>
    @endif
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <b>{{$messages->type}}!</b> {{$messages->message}}
    </div>
@endif
</div>