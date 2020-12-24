<div class="lg:flex justify-between items-center mb-6">
    <p class="text-2xl font-semibold mb-2 lg:mb-0">
        {{ $heading }}
    </p>
    <div>

        @foreach($actions as $action)

            @if($action['type'] === 'submit')
                <button
                    type="submit"
                    form="{{ $action['form'] }}"
                    class="bg-blue-500 hover:bg-blue-600 focus:outline-none rounded-lg px-6 py-2 text-white font-semibold shadow">
                    {{ $action['text'] }}
                </button>
            @elseif($action['type'] === 'link')
                <a href="{{ $action['url'] }}" class="bg-{{ $action['color'] }}-500 hover:bg-{{ $action['color'] }}-600 focus:outline-none rounded-lg px-6 py-2 text-white font-semibold shadow">
                    {{ $action['text'] }}
                </a>
            @endif
        @endforeach


    </div>

</div>
