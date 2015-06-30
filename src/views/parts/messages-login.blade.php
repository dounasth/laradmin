@if (is_array($messages))
    @foreach ($messages as $message)
        {{$message->type}}::{{$message->message}}
    @endforeach
@elseif (is_object($messages))
    {{$messages->type}}::{{$messages->message}}
@endif