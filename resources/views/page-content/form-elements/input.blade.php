<div class='w-full md:w-full pr-3 mb-6'>
    <label class='block uppercase tracking-wide text-gray-500 text-xs font-bold mb-2' for='{{ $id }}'>{{ $label }}</label>
    <input class='bg-white h-12 w-full px-3 rounded border shadow-inner text-sm focus:outline-none focus:border-gray-400'
           id='{{ $id }}'
           type='{{ $type }}'
           name="{{ $name }}"
           placeholder='{{ $placeholder }}'
           value="{{ $value }}"
           @if ($readonly) readonly="true" disabled @endif
           >
</div>
