<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-center text-gray-800">
      {{ __('Užduočių paskyrimas') }}
    </h2>
  </x-slot>
  <div class="py-12">
    <div class="flex items-center justify-center mx-auto max-w-7xl sm:px-6 lg:px-8 ">
      @if ($errors->any())
      <div class="text-red-600">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <form method="POST" action="/list" class="w-full pt-2 mb-2 overflow-hidden text-center bg-white rounded-md shadow-sm">
        @csrf
        <div class="flex flex-wrap items-center justify-center mb-2 -mx-3">
          <div class="flex flex-wrap items-center justify-center w-4/6 px-3">
            <label class="mr-1 text-xs font-bold tracking-wide text-gray-700 uppercase" for="grid-name">
              Naujas mokinys
            </label>
            <input
              class="block w-9/12 px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
              id="grid-name" type="text" placeholder="Vardas Pavardė" name="name">
          </div>
          <button type="submit" class="px-8 py-2 font-semibold text-white bg-indigo-500 rounded-md h-2/6 ">KURTI</button>
        </div>
      </form>
    </div>

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="p-6 text-lg font-semibold text-center bg-white border-b border-gray-200 font">
          <div
            class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
            <table class="w-full border border-collapse border-gray-400 table-auto ">
              <thead>
                <tr>
                  <th
                    class="px-6 py-3 text-base leading-4 tracking-wider text-center text-white uppercase bg-gray-400 border-b border-gray-200 ">
                    Vardas</th>
                  <th
                    class="px-6 py-3 text-base leading-4 tracking-wider text-center text-white uppercase bg-gray-400 border-b border-gray-200 ">
                    Data</th>
                  <th
                    class="px-6 py-3 text-base leading-4 tracking-wider text-center text-white uppercase bg-gray-400 border-b border-gray-200 ">
                    Pagalbininkas</th>
                </tr>
              </thead>
              <tbody class="bg-white">
                @foreach ($students as $student )
                <tr class="{{ $loop->even ? 'bg-gray-50' : ''}}">
                  <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">{{ $student->name }}</td>
                  <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">{{ $student->date }}</td>
                  <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">{{ $student->helper != null ?
                    $students->find($student->helper)->name : 'Nėra' }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>