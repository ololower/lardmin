@if(isset($wrappers))
    @foreach($wrappers as $wrapper)
        {!! $wrapper->getCloseTag()  !!}
    @endforeach
@endif
