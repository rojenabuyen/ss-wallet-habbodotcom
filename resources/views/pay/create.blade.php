<x-layout>
    
    
    <x-bread-crumbs :links="['Pay Manager'=>route('pay.index'), 'Add Payment'=> '#']"/>

      <x-card class="p-10 m-52 mt-12">
          <form action="{{ route('pay.store') }}" method="POST">
            @csrf
            <div class="mb-8">
              <h1 class="my-10 text-center text-4xl font-medium text-slate-100">
                Add Payment
              </h1>
              <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-500">
              <div class="mb-2">
              <label for="username"
                class="mb-2 block text-sm font-medium text-slate-100">Employee</label>
              <select name="username" class="py-3 px-4  block w-full bg-transparent
                border-slate-600 shadow-sm rounded-md text-sm focus:z-10
                 focus:border-blue-500 focus:ring-slate-400 dark:bg-transparent
                  dark:border-slate-600 dark:text-slate-200 placeholder:text-slate-500">
                  @foreach ($users as $user)
                      <option name="username" class="bg-gray-600 hover:bg-gray-700" value="{{ $user->id }}">{{ $user->username }}</option>
                  @endforeach
              </select>
              </div>
              <div class="mb-2">
                <label for="amount"
                class="mb-2 block text-sm font-medium text-slate-100">Amount</label>
              <input type="number" name="amount" class="py-3 px-4  block w-full bg-transparent
              border-slate-600 shadow-sm rounded-md text-sm focus:z-10
               focus:border-blue-500 focus:ring-slate-400 dark:bg-transparent
                dark:border-slate-600 dark:text-slate-200 placeholder:text-slate-500"
                placeholder="Enter Amount..."
                />
                @error('amount')
                <div class="mt-2 text-xs text-red-500">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="mb-2">
                <label for="payslot"
                class="mb-2 block text-sm font-medium text-slate-100">Pay Slot(GMT)</label>
                <select name="payslot" class="py-3 px-4  block w-full bg-transparent
                border-slate-600 shadow-sm rounded-md text-sm focus:z-10
                 focus:border-blue-500 focus:ring-slate-400 dark:bg-transparent
                  dark:border-slate-600 dark:text-slate-200 placeholder:text-slate-500">
                  @foreach ($payslots as $payslot)
                      <option name="payslot" class="bg-gray-600 hover:bg-gray-700" value="{{ $payslot }}">{{ $payslot }}</option>
                  @endforeach
              </select>
              </div>
            </div>  
            <button type="submit" class="font-medium rounded-md p-2 hover:bg-slate-700 bg-slate-800 text-sm text-slate-100 w-full">
                Submit
            </button>
          </form>   
      </x-card>
</x-layout>