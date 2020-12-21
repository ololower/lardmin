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
                    @if(!empty($rows[0]['actions']))
                        @foreach($rows[0]['actions'] as $action_th)
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                        @endforeach
                    @endif
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">

                @foreach($rows as $row)
                    <tr>
                        @foreach($row as $cell_key => $cell)
                            @if($cell_key === 'actions')
                                @foreach($cell as $action_cell)
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ $action_cell['url'] }}"
                                       class="text-{{ $action_cell['color'] }}-600 hover:text-{{ $action_cell['color'] }}-900">{{ $action_cell['text'] }}</a>
                                </td>
                                @endforeach
                            @else
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $cell }}</div>
                                </td>
                            @endif
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
