<div id="content" class="min-h-screen">
    <div class="flex space-x-4">
        @if(isset($_children['sidebar']))
            <div class="w-4/6 bg-white p-4 br-4 rounded-lg">
        @else
            <div class="w-full bg-white p-4 br-4 rounded-lg">
        @endif
            @if(isset($_children['main']))
                @foreach($_children['main'] as $child)
                    {{ $child->getElement() }}
                @endforeach
            @endif
        </div>
        @if(isset($_children['sidebar']))
            <div class="w-2/6 bg-white p-4 br-4 rounded-lg">
                @foreach($_children['sidebar'] as $child)
                    {{ $child->getElement() }}
                @endforeach
            </div>
        @endif
    </div>
</div>
