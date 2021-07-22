@php /** @var $user \App\Models\User */ @endphp

<tbody class="bg-white">
@foreach($users as $user)
    <tr>
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
            <div class="flex items-center">
                <div class="flex-shrink-0 h-10 w-10">
                    @if($user->photo)
                    <img class="h-10 w-10 rounded-full"
                         src="{{$user->avatarUrl()}}"
                         alt="avatar">
                    @else
                        <svg class="h-10 w-10 text-gray-300 rounded-full" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    @endif
                </div>
                <div class="ml-4">
                    <div class="text-sm leading-5 font-medium text-gray-900">{{$user->name}}</div>
                    <div class="text-sm leading-5 text-gray-500">{{$user->email}}</div>
                </div>
            </div>
        </td>
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
            <div class="text-sm leading-5 text-gray-900">{{$user->title}}</div>
            <div class="text-sm leading-5 text-gray-500">{{$user->department}}</div>
        </td>
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
            @if($user->status)
                <span
                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    Active
                </span>
            @else
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                    Inactive
                </span>
            @endif
        </td>
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
            {{$user->role}}
        </td>
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
            <div class="flex justify-center">
                <a href="{{ $user->applicationUrl() }}" target="_blank">
                    <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z"></path>
                        <path
                            d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z"></path>
                    </svg>
                </a>
            </div>
        </td>
        <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
            <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
        </td>
    </tr>
@endforeach
</tbody>
