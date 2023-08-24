<x-layout>
    
    
    <x-bread-crumbs :links="['Users'=>route('users.index'),'Create user'=>'#']"/>

      <x-card class="p-10 m-52 mt-12">
          <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="mb-8">
              <h1 class="my-10 text-center text-4xl font-medium text-slate-100">
                Add New Member
              </h1>
              <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-500">
              <label for="username"
                class="mb-2 block text-sm font-medium text-slate-100">Username</label>
              <input type="text" name="username" class="py-3 px-4  block w-full bg-transparent
              border-slate-600 shadow-sm rounded-md text-sm focus:z-10
               focus:border-blue-500 focus:ring-slate-400 dark:bg-transparent
                dark:border-slate-600 dark:text-slate-200 placeholder:text-slate-500"
                value="{{ old('username')}}"
                />
                @error('username')
                <div class="mt-2 text-xs text-red-500">
                    {{ $message }}
                </div>
                @enderror
            </div>  
            <button type="submit" class="font-medium rounded-md p-2 hover:bg-slate-700 bg-slate-800 text-sm text-slate-100 w-full">
                Add
            </button>
          </form>   
      </x-card>
</x-layout>