<div id="content" class="min-h-screen">
    <div class="flex">
        @if(isset($_children['sidebar']))
            <div class="p-r-4 w-4/6 border-r border-gray-400 border-dashed">
        @else
            <div class="w-full">
        @endif
            @if(isset($_children['main']))
                @foreach($_children['main'] as $child)
                    {{ $child->getElement() }}
                @endforeach
            @endif
        </div>
        @if(isset($_children['sidebar']))
            <div class="w-2/6">
                @foreach($_children['sidebar'] as $child)
                    {{ $child->getElement() }}
                @endforeach
            </div>
        @endif
    </div>
</div>
