<!-- resources/views/divelogs/index.blade.php -->

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Divelog Lists') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          @foreach ($divelogs as $divelog)
          <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-700 rounded-lg">
            <p class="text-gray-800 dark:text-gray-300">{{ $divelog->divelog }}</p>
            <p class="text-gray-600 dark:text-gray-400 text-sm">User: {{ $divelog->user->name }}</p>
            <a href="{{ route('divelogs.show', $divelog) }}" class="text-blue-500 hover:text-blue-700">Details</a>

            {{-- 🔽 追加 --}}
            <div class="flex">
              @if ($divelog->liked->contains(auth()->id()))
              <form action="{{ route('divelogs.dislike', $divelog) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500 hover:text-red-700">dislike {{$divelog->liked->count()}}</button>
              </form>
              @else
              <form action="{{ route('divelogs.like', $divelog) }}" method="POST">
                @csrf
                <button type="submit" class="text-blue-500 hover:text-blue-700">like {{$divelog->liked->count()}}</button>
              </form>
              @endif
            </div>
            {{-- 🔼 ここまで --}}
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>

</x-app-layout>

