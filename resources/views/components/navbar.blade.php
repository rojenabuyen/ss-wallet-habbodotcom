<nav class="bg-[#363D46] fixed w-full z-20 top-0 left-0">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="{{ route('users.index') }}" class="flex items-center">
        <img src="https://habboss.org/wp-content/uploads/2020/05/cropped-ss-logo.png" class="h-8 mr-3" alt="Flowbite Logo" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap text-slate-100 dark:text-white">Wallet</span>
    </a>
    @auth 
    <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex  items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-dropdown" aria-expanded="false">
      
      <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
           
    </button>


    <div class="hidden w-full md:block md:w-auto h-10">
      <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 rounded-lg bg-[#363D46] md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="bg-[#363D46] flex items-center justify-between w-full py-2 pl-3 pr-4 text-gray-900 rounded md:border-0  md:p-2 md:w-auto h-10">
              <div class="">
                  <img  class="rounded-full" style="height: 65px; width: 55px" src="https://www.habbo.com/habbo-imaging/avatarimage?user={{ auth()->user()->username }}&direction=2&head_direction=3&action=&gesture=sml&headonly=1"
                        alt="' . {{ auth()->user()->username }} . '" title="' . {{ auth()->user()->username }} . '">
              </div>
              <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                  <path class="stroke-slate-50" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
          </button>
          
            <!-- Dropdown menu -->
            <div id="dropdownNavbar" class="shadow-md darborder-slate-50 z-10 hidden font-normal divide-y divide-gray-100 rounded-lg w-44 dark:bg-[#363D46] dark:divide-gray-600">
                <ul class="py-2 text-sm text-gray-100 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                  <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-600 dark:hover:bg-gray-600 dark:hover:text-white">{{ auth()->user()->username ?? 'Anynomus' }}</a>
                  </li>
                  
                  @if(auth()->user()->role === 'logger')
                  <li>
                    <a href="{{ route('cashout.index') }}" class="block px-4 py-2 hover:bg-gray-600 dark:hover:bg-gray-600 dark:hover:text-white">Cashout List</a>
                  </li>
                  @endif

                  @if(auth()->user()->role === 'payer')
                  <li>
                    <a href="{{ route('cashout.index') }}" class="block px-4 py-2 hover:bg-gray-600 dark:hover:bg-gray-600 dark:hover:text-white">Cashout List</a>
                  </li>
                  <li>
                    <a href="{{ route('pay.index') }}" class="block px-4 py-2 hover:bg-gray-600 dark:hover:bg-gray-600 dark:hover:text-white">Pay Manager</a>
                  </li>
                  
                  @endif
                 
                  @if(auth()->user()->role === 'admin')
                  <li>
                    <a href="{{ route('users.index') }}" class="block px-4 py-2 hover:bg-gray-600 dark:hover:bg-gray-600 dark:hover:text-white">Manage Users</a>
                  </li>
                  <li>
                    <a href="{{ route('cashout.index') }}" class="block px-4 py-2 hover:bg-gray-600 dark:hover:bg-gray-600 dark:hover:text-white">Cashout List</a>
                  </li>
                  <li>
                    <a href="{{ route('pay.index') }}" class="block px-4 py-2 hover:bg-gray-600 dark:hover:bg-gray-600 dark:hover:text-white">Pay Manager</a>
                  </li>
                  @endif
                </ul>
                <div class="py-1">
                  <form action="{{ route('auth.destroy') }}" method="POST">
                      @csrf
                      @method('DELETE')
                             <button class="w-full px-4 py-2 text-slate-300 text-sm text-left hover:bg-slate-600 dark:hover:text-white">
                              Logout
                             </button>
                  </form>
                </div>
            </div>
        </li>
      </ul>
    </div>



    <div class="lg:hidden hidden w-full" id="navbar-dropdown">
      <ul class="flex flex-col font-medium text-slate-100 bg-[#363D46] p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:flex-row md:space-x-8 md:mt-0 md:border-0 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
          <a href="{{ route('users.index') }}" class="block py-2 pl-3 pr-4 text-gray-100 rounded hover:bg-slate-600 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent" aria-current="page">Home</a>
        </li>
        <li>
          <a href="#" class="block py-2 pl-3 pr-4 text-gray-100 rounded hover:bg-slate-600  dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">{{ auth()->user()->username ?? 'Anynomus' }}</a>
        </li>

        @if(auth()->user()->role === 'payee')
          {{ redirect('auth.create' )}}
        @endif 

        @if(auth()->user()->role === 'logger')
        <li>
          <a href="{{ route('cashout.index') }}" class="block py-2 pl-3 pr-4 text-gray-100 rounded hover:bg-slate-600  md:p-0 dark:text-white  dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Cashout List</a>
        </li>
        @endif

        @if(auth()->user()->role === 'payer')
        <li>
          <a href="{{ route('cashout.index') }}" class="block py-2 pl-3 pr-4 text-gray-100 rounded hover:bg-slate-600  md:p-0 dark:text-white  dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Cashout List</a>
        </li>
        <li>
          <a href="{{ route('pay.index') }}" class="block py-2 pl-3 pr-4 text-gray-100 rounded hover:bg-slate-600 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pay Manager</a>
        </li>
        @endif

        @if(auth()->user()->role === 'admin')
        <li>
          <a href="{{ route('users.index') }}" class="block py-2 pl-3 pr-4 text-gray-100 rounded hover:bg-slate-600  md:p-0 dark:text-white  dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Manage Users</a>
        </li>
        <li>
          <a href="{{ route('cashout.index') }}" class="block py-2 pl-3 pr-4 text-gray-100 rounded hover:bg-slate-600  md:p-0 dark:text-white  dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Cashout List</a>
        </li>
        <li>
          <a href="{{ route('pay.index') }}" class="block py-2 pl-3 pr-4 text-gray-100 rounded hover:bg-slate-600 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pay Manager</a>
        </li>
        @endif     
        <li>
          <form action="{{ route('auth.destroy') }}" method="POST">
              @csrf
              @method('DELETE')
                     <a href="{{ route('auth.create') }}" class="w-full block py-2 pl-3 pr-4 text-slate-300 text-sm text-left hover:bg-slate-600 dark:hover:text-white">
                      Logout
                     </a>
          </form>   
          </li>
      </ul>
    </div>

    @else
    <ul>
      <li>
          <a class="flex items-center justify-between w-full py-2 pl-3 pr-4 text-slate-100 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-slate-500 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent" href="{{ route('auth.create') }}">Sign in</a>
      </li>
  </ul>

    @endauth
  </div>
</nav>








  