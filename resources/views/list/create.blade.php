<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Sąrašas') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="flex flex-col items-center justify-center p-6 text-lg font-semibold text-center bg-white border-b border-gray-200">
          @if ($errors->any())
              <div class="text-red-600">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          <form method="POST" action="/list" class="w-full max-w-lg text-center">
            @csrf
            <div class="flex flex-wrap mb-6 -mx-3">
              <div class="w-full px-3">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="grid-name">
                  Mokinys
                </label>
                <input class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500" id="grid-name" type="text" placeholder="Vardas Pavardė" name="name">
              </div>
            </div>
            {{-- <div class="flex flex-wrap mb-6 -mx-3">
              <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="grid-date">
                  Data
                </label>
                <input class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500" id="grid-date" type="date" placeholder="" name="date">
                <p class="text-xs italic text-gray-500">Nebūtina</p>
              </div>
              <div class="w-full px-3 md:w-1/2">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="grid-last-name">
                  Pagalbininkas
                </label>
                <input class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Paskutinis pagalbininkas">
              </div>
            </div> --}}
            <button type="submit" class="px-6 py-2 font-semibold text-white bg-indigo-500 rounded-md">KURTI</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>