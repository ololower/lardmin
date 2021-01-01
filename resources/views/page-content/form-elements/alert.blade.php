<div class="flex
            justify-center
            items-center
            mb-5
            font-medium
            py-1 px-2
            bg-white
            rounded-md
            text-black
            bg-{{ $alert_color }}-200
            border
            border-{{ $alert_color }}-300">
    <div class="font-black text-base font-normal  max-w-full flex-initial">
        <div class="py-2">{{ $heading }}
            <code class="block font-normal text-xs font-base">{{ $message }}</code>
        </div>
    </div>
</div>

