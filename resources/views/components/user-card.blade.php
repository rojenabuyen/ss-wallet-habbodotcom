
    <tr class="bg-white border-b dark:bg-slate-800 dark:border-slate-600 hover:bg-slate-900 dark:hover:bg-slate-900 text-center">
        <td class="px-2 py-0 flex pr-0 content-center">
            <img class="h-14 w-12"src="https://www.habbo.com/habbo-imaging/avatarimage?user={{ $user->username }}&direction=2&head_direction=3&action=&gesture=sml&headonly=1"
            alt="' . {{ $user->username }} . '" title="' . {{ $user->username }} . '">
            <h5 class="pt-5 text-right">{{ $user->username }}</h5>
        </td>
        <td class="px-6 py-4 text-yellow-400 font-medium">
            {{ $user->credits }}c
        </td>
        <td class="px-6 py-4 dark:text-slate-400">
            {{ $user->updated_at->diffForHumans()}}
        </td>
        
            @if ($user->credits > 10)
            <td class="px-6 py-4 text-green-500">
                ✅
            </td>
            @else
            <td class="px-6 py-4 text-red-500">
                ❌
            </td>
            @endif

        <td class="px-6 py-4 text-right">
            <a href="{{ route('transactions.index', $user) }}" class="font-medium text-slate-200 rounded-md p-2 hover:bg-slate-800 bg-slate-700">View</a>
        </td>
    </tr>