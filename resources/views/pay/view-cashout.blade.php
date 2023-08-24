<x-layout>
    <x-bread-crumbs :links="['Cashout List' => route('cashout.index'), $user->username => '#']"/>
        
    <div class="grid grid-cols-2 md:grid-cols-8 gap-6 py-4">
        <!-- Left column with 2 units width -->
        <div class="col-span-2 md:col-span-2">
            <!-- component -->
            <div class="flex items-center h-auto w-full justify-center">
                <div class="max-w-xs">
                    <div class="dark:bg-slate-700 shadow-lg rounded-lg py-3">
                        <div class="photo-wrapper p-2">
                            <img class="bg-neutral-500 w-44 h-44 border border-neutral-900 object-scale-down p-2 rounded-full mx-auto" src="http://www.habbo.com/habbo-imaging/avatarimage?figure=' . {{$habbo->getFigureString()}} . 'direction=2&head_direction=3&action=wav&gesture=sml&size=l"
                            alt="' . {{$habbo->getHabboName()}} . '" title="' . {{$habbo->getHabboName()}} . '">
                        </div>
                        <div class="p-6">
                            <h3 class="text-center text-xl text-gray-900 font-medium leading-8">
                                @if ($user->credits >= 10)
                                            <span class="text-yellow-400 text-4xl font-bold glow">{{ $user->credits }}</span>
                                        @else
                                            <span class="text-red-300 font-bold" style="font-size: 30px">{{ $user->credits }}</span>
                                        @endif
                            </h3>
                            <div class="text-center text-gray-400 text-xs font-semibold">
                                <p>Credits</p>
                            </div>
                            <table class="text-xs my-3 ">
                                <tbody>
                                <tr>
                                    <td class="px-2 py-2 text-neutral-500 font-semibold">Username</td>
                                    <td class="px-2 py-2 text-gray-300">{{ $user->username }}</td>
                                </tr>
                                <tr>
                                    <td class="px-2 py-2 text-neutral-500 font-semibold">Last Transaction </td>
                                    <td class="px-2 py-2 text-gray-300">{{ $user->updated_at->diffForHumans()}}</td>
                                </tr>
                                <tr>
                                    <td class="px-2 py-2 text-neutral-500 font-semibold">Cashout</td>
                                    <td class="px-2 py-2 ">
                                        @if ($user->credits >= 10)
                                            <span class="text-green-400">Yes</span>
                                        @else
                                            <span class="text-red-400">No</span>
                                        @endif 
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-2 py-2 text-neutral-500 font-semibold">Status</td>
                                    <td class="px-2 py-2">
                                    
                                            @if ($habbo->isOnline())
                                                <span class="text-green-400">Online</span>
                                            @else
                                                <span class="text-slate-500">Offline</span>
                                            @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>   
                        </div>
                    </div>
                    <div class="inline-flex w-auto rounded-md shadow-sm pt-4 " role="group">
                        <button type="button" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-neutral-400 dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:text-white dark:hover:bg-neutral-700 dark:focus:ring-neutral-400 dark:focus:text-white">
                          Edit
                        </button>
                        <button type="button" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-r-md hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-neutral-400  dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:text-white dark:hover:bg-neutral-700 dark:focus:ring-neutral-400 dark:focus:text-white">
                          Disable
                        </button>
                      </div>
                      
                </div>
                
                </div>
            </div>
            
        
        <!-- Right column with 6 units width -->
        <div class="col-span-6 md:col-span-6 row-span-2 ">  
                        <div class="relative overflow-x-auto shadow-lg sm:rounded-lg h-[600px] bg-slate-700 ">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
                                <thead class="text-xs sticky top-0 text-neutral-200 uppercase bg-gray-50 dark:bg-slate-800 dark:text-neutral-200 text-center">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            ID
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Pay Slot
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Amount
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Time Stamp
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Payer
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="w-full h-[50px] overflow-y-auto ">                                                                                                      
                                    @forelse ($transactions as $transaction)    
                                    <tr class="bg-white border-b  dark:bg-slate-700 dark:border-neutral-600 hover:bg-neutral-900 dark:hover:bg-slate-900 text-center">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-neutral-200">
                                            {{ $transaction->transaction_id }}
                                        </th>
                                        <td class="px-6 py-4 dark:text-neutral-400">
                                            {{ $transaction->pay_slot }}
                                        </td>
                                       
                                        @if ($transaction->amount > 0)
                                            <td class="px-6 py-4 text-green-400 font-medium">
                                                {{ $transaction->amount}}c
                                            </td>
                                        @else
                                            <td class="px-6 py-4 text-red-400 font-medium">
                                                {{ $transaction->amount}}c
                                            </td>
                                        @endif
                                           

                                        <td class="px-6 py-4 text-sm dark:text-neutral-400">
                                            {{ date('m/d/Y h:i A ', strtotime($transaction->created_at)) }}
                                        </td>
                                        <td class="px-2 py-0 flex pr-0">
                                            <img class="h-14 w-12"src="https://www.habbo.com/habbo-imaging/avatarimage?user={{$transaction->payer_id}}&direction=2&head_direction=3&action=&gesture=sml&headonly=1"
                                                    alt="' . {{ $transaction->payer_id }} . '" title="' . {{ $transaction->payer_id }} . '">
                                            <h5 class="pt-5">{{ $transaction->payer_id }}</h5>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="px-6 py-4 text-slate-200">
                                            No results.
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>               
        </div>
      </div>
   
   
             
</div>
</x-layout>