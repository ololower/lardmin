@extends('lardmin::layout')
@section('content')

    <div class="flex ...">
        <div class="p-r-4 w-4/6 border-r border-gray-400 border-dashed">

            <form action="">

                <div class='flex flex-wrap'>
                    <div class='w-full md:w-full pr-3 mb-6'>
                        <label class='block uppercase tracking-wide text-gray-500 text-xs font-bold mb-2' for='grid-text-1'>email address</label>
                        <input class='bg-white h-12 w-full px-3 rounded border shadow-inner text-sm focus:outline-none focus:border-gray-400' id='grid-text-1' type='text' placeholder='Enter email'  required>
                    </div>

                    <div class='w-full md:w-full pr-3 mb-6'>
                        <label class='block uppercase tracking-wide text-gray-500 text-xs font-bold mb-2' for='grid-text-1'>email address</label>
                        <textarea class='bg-white h-36 w-full p-3 rounded border shadow-inner text-sm focus:outline-none focus:border-gray-400' id='grid-text-1'></textarea>
                    </div>
                </div>

            </form>
        </div>
        <div class="w-2/6">w-2/6</div>
    </div>

    @foreach($elements as $element)
        {{ $element->getElement() }}
    @endforeach


@endsection
