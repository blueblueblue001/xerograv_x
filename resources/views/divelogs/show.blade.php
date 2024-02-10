<!-- resources/views/divelogs/show.blade.php -->

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Divelogs') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <a href="{{ route('divelogs.index') }}" class="text-blue-500 hover:text-blue-700 mr-2">Back to Divelog Lists</a>
          <p class="text-gray-800 dark:text-gray-300 text-lg">{{ $divelog->divelog }}</p>
          <p class="text-gray-600 dark:text-gray-400 text-sm">User: {{ $divelog->user->name }}</p>
          <div class="text-gray-600 dark:text-gray-400 text-sm">
          <p>Post Date: {{ $divelog->created_at->format('Y-m-d H:i') }}</p>
          <p>Update Date: {{ $divelog->updated_at->format('Y-m-d H:i') }}</p>
          </div>
          @if (auth()->id() == $divelog->user_id)
          <div class="flex mt-4">
            <a href="{{ route('divelogs.edit', $divelog) }}" class="text-blue-500 hover:text-blue-700 mr-2">Edit</a>
            <form action="{{ route('divelogs.destroy', $divelog) }}" method="POST" onsubmit="return confirm('Do you want to delete?');">
              @csrf
              @method('DELETE')
              <button type="submit" class="text-red-500 hover:text-red-700"> Delete</button>
            </form>
          </div>
          @endif
          {{-- 🔽 追加 --}}
          <div class="flex mt-4">
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
      </div>
    </div>
  </div>
</x-app-layout>
