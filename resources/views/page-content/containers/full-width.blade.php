<div id="content" class="min-h-screen">
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            @foreach($_children as $child)
                {{ $child->getElement() }}
            @endforeach
        </div>
    </div>
</div>
