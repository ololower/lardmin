<div class="align-middle inline-block min-w-full sm:px-6 lg:px-8">
    @if($rows->isEmpty())
        <div class="text-center text-5xl font-black	text-gray-300 p-24">
            {{ $empty_text }}
        </div>
    @else
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    @foreach($heading_row as $heading_row_item)
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ $heading_row_item }}
                    </th>
                    @endforeach
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">

                @foreach($rows as $row)
                    <tr>
                        @foreach($row as $cell)
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $cell }}</div>
                            </td>
                        @endforeach
                    </tr>
                @endforeach
                <!-- More rows... -->
                </tbody>
            </table>
        </div>

        @if($pagination)
        <div class="pagination pt-4">
            {!! $pagination !!}
        </div>
        @endif
    @endif


</div>
