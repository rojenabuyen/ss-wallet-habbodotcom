
<x-layout>
    
    <x-bread-crumbs :links="['Cashout List' => '#']"/>
       

        <form x-ref="filters" id="filtering-form" action="{{ route('cashout.index') }}" method="GET">
            <div class="mb-2 grid grid-cols-2 gap-2">
                <div>
                    <div class="relative flex rounded-md shadow-sm">
                      <input name="search" type="text" id="hs-trailing-button-add-on-with-icon-and-button"
                      value="{{ request('search')}}"
                      placeholder="Enter username..."
                      class="py-3 px-4 pl-11 block w-full bg-transparent
                       border-slate-700 shadow-sm rounded-l-md text-sm focus:z-10
                        focus:border-blue-500 focus:ring-slate-400 dark:bg-transparent
                         dark:border-slate-700 dark:text-slate-200 placeholder:text-slate-500">
                      <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none z-20 pl-4">
                        <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                      </div>
                     
                      <button type="submit"  class=" rounded-r-md -ml-px py-3 px-4 inline-flex justify-center items-center gap-2 border font-medium bg-white text-slate-200 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-slate-400 transition-all text-sm dark:bg-slate-800 dark:hover:bg-slate-700 dark:border-slate-700 dark:text-slate-200 dark:hover:text-white">
                        Search
                      </button>
                    </div>
                  </div>
            
                </div>
        </form>

 

  



    
<div class="relative overflow-x-auto shadow-2xl sm:rounded-lg border border-black">
    <table class="w-full text-sm text-gray-500 dark:text-gray-400 text-center">
        <thead class="text-xs text-slate-400 uppercase bg-gray-50 dark:bg-slate-900 dark:text-slate-200">
            <tr>
                <th scope="col" class="px-6 py-3 text-left">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Credits
                </th>
                <th scope="col" class="px-6 py-3">
                    Last Transaction
                </th>
                <th scope="col" class="px-6 py-3">
                    Cashout?
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">View</span>
                </th>
            </tr>
        </thead>
        <tbody>
        @forelse($users as $user)            
                <tr class="bg-white border-b dark:bg-slate-800 dark:border-slate-600 hover:bg-slate-900 dark:hover:bg-slate-900">
                    <td class="px-2 py-0 flex pr-0 ">
                        <img class="h-14 w-12"src="https://www.habbo.com/habbo-imaging/avatarimage?user={{ $user->username }}&direction=2&head_direction=3&action=&gesture=sml&headonly=1"
                                alt="' . {{ $user->username }} . '" title="' . {{ $user->username }} . '">
                        <h5 class="pt-5">{{ $user->username }}</h5>
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
                        <a href="{{ route('pay.view-cashout', $user) }}" class="font-medium text-slate-200 rounded-md p-2 hover:bg-slate-800 bg-slate-700">View</a>
                    </td>
                </tr>
        @empty
            <tr>
                <td class="px-6 py-4 text-slate-100">No results.</td>
            </tr> 
        @endforelse  
        </tbody>
    </table>
    
</div>
 
<div class="pt-4 pb-4">
    {{ $users->links()}}
</div>

   
   
</x-layout>