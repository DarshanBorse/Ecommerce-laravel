<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold  text-gray-800 leading-tight">
            {{ __('Color') }}
        </h2>
    </x-slot>
    <x-slot name="anchor">
        <h6 class="font-semibold  text-gray-800 leading-tight">
            <a href="{{ route('colors.create') }}">{{ __('Add Color') }}</a>
        </h6>
    </x-slot>
    <div class="py-8">
        <div class="max-w-7xl mx-auto  sm:px-6 lg:px-8">
            <div class="flex flex-col">
                {{-- Error --}}
                @if (session('color'))
                    <div class="mb-6 time">
                        <div class=" max-w-sm mx-auto  rounded-lg shadow-lg flex items-center space-x-4 "
                            style="background-color: #5bc0de; padding: 10px">
                            <div class="mx-auto">
                                <div class="text-center font-bold">{{ session('color') }}</div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <table class="min-w-full divide-y divide-gray-200 mx-auto">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-bolder  uppercase tracking-wider">
                                        ID
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-bolder  uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            @forelse ($colors as $color)
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="ml-0">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $key++ }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 text-center">{{ $color->color }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium ">
                                        <span class=" py-2 px-4 rounded">
                                            <a href="{{ route('colors.edit', $color->id) }}"
                                                class="text-indigo-600 hover:text-indigo-900 ">{{ __('Edit') }}</a>
                                            <button type="button"
                                                class="text-indigo-600 hover:text-indigo-900 font-600 px-2 font-semibold"
                                                value="{{ $color->id }}" id="color_delete">Delete</button>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                            @empty
                                <tbody>
                                    <tr class="bg-white">
                                        <td class="px-6 py-4 whitespace-nowrap" colspan="3">
                                            <div class="text-gray-900 text-center text-lg font-bold">Color not found..</div>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforelse 
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
