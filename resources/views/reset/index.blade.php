<x-layout>     
    <x-card class="p-10 m-52 mt-12">
            <form action="{{ route('reset.store') }}" method="POST">
              @csrf
              <div class="w-full max-w-auto">
                <p class="text-center text-gray-200 text-3xl pt-5 pb-4">
                  Reset Password
                </p>
                <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-500">
                <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                  <div class="mb-4">
                    <input name="username" value="{{ request('username') }}"
                    class="py-3 px-4 block w-full bg-transparent
                    border-slate-500 shadow-sm rounded-l-md text-sm focus:z-10
                     focus:border-blue-500 focus:ring-slate-400 dark:bg-transparent
                      dark:border-slate-600 dark:text-slate-200 placeholder:text-slate-500" id="username" type="text" placeholder="Username">
                      @error('username')
                      <div class="mt-2 text-xs text-red-500">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="mb-6">
                    <input name="password" class="py-3 px-4 block w-full bg-transparent
                    border-slate-500 shadow-sm rounded-l-md text-sm focus:z-10
                     focus:border-blue-500 focus:ring-slate-400 dark:bg-transparent
                      dark:border-slate-600 dark:text-slate-200 placeholder:text-slate-500" id="password" type="password" placeholder="New Password">
                      @error('password')
                      <div class="mt-2 text-xs text-red-500">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="mb-6">
                    <input name="password_confirmation" class="py-3 px-4 block w-full bg-transparent
                    border-slate-500 shadow-sm rounded-l-md text-sm focus:z-10
                     focus:border-blue-500 focus:ring-slate-400 dark:bg-transparent
                      dark:border-slate-600 dark:text-slate-200 placeholder:text-slate-500" id="password" type="password" placeholder="Confirm Password">
                      @error('password_confirmation')
                      <div class="mt-2 text-xs text-red-500">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="mb-6 px-2 flex justify-between">
                    <div></div>
                    <div class="text-slate-200">
                      Already have an account?
                      <a class="inline-block align-baseline font-bold text-sm text-slate-500 hover:text-slate-800" href="{{ route('auth.create') }}">
                      Login here
                      </a> 
                    </div>   
                  </div>
                  <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-500">
                  <div class="flex items-center justify-between">
                    <button type="submit" class="w-full bg-slate-800 hover:bg-slate-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                      Reset
                    </button>
                    
                  </div>
                  
                </form>
              </div>
            </x-card>
          </form>   
  </x-layout>