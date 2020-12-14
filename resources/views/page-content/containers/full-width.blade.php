<div id="content" class="min-h-screen">
    @foreach($_children as $child)
        {{ $child->getElement() }}
    @endforeach
</div>
