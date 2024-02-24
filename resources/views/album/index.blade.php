@extends('layouts.app')
@section('content')
<div class="px-44 py-20">
    <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
        Tambah Album
      </button>
      <div class="mt-4">
          <a href="{{ url('') }}" class="inline-flex items-center px-5 py-2.5 text-xs font-semibold tracking-widest text-white uppercase transition bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 mr-2">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
              </svg>
             Kembalii
          </a>
      </div>
</div>
<div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full"> 
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Terms of Service
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5 space-y-4">
              <form action="{{ route('home.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-4">
                    <label class="block mb-2 text-sm font-bold text-gray-700" for="name">
                      Name
                    </label>
                    <textarea class="w-full px-3 py-2 leading-tight text-gray-700 border rounded focus:outline-none focus:shadow-outline" id="name" name="name" placeholder="Masukkan name"></textarea>
                  </div>

                  <div class="flex items-center justify-end">
                    <button type="submit" class="px-4 py-2 mr-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">Simpan</button>
                  </div>
                </form>
            </div>
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="default-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                <button data-modal-hide="default-modal" type="button" class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
            </div>
        </div>
    </div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 items-center px-20 gap-6">
    @foreach ($album as $album)
    @if(auth()->check() && auth()->user()->id === $album->user_id)
    <div class="flex flex-row p-8 border rounded-lg hover:shadow-lg transition duration-300 ease-in-out">
        <a href="{{ route('home.show', $album->id)}}">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-yellow-500 mr-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4c0-1.104.896-2 2-2h6a2 2 0 0 1 1.414.586L15 6.172l1.293-1.293A2 2 0 0 1 18 4h6a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4z"/>
        </svg>
        </a>
        <div class="flex flex-col flex-grow">
            <p  class="font-bold text-xl hover:underline">{{$album->name}}</p>
            <div class="flex mt-2 mb-2">
                @if(Auth::id() == $album->user_id)                 
                    <button data-modal-target="default-modal1{{$album->id}}" data-modal-toggle="default-modal1{{$album->id}}" class="w-5 h-5 text-blue-500 hover:text-blue-700 focus:outline-none" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-500 hover:text-blue-700 focus:outline-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 3a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h10zm0 0h6M9 21v-6M19 13l-2 2M19 13l-2-2"></path>
                        </svg>
                      </button>

                      <div id="default-modal1{{$album->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-2xl max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Terms of Service
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <div class="p-4 md:p-5 space-y-4">
                                    <form action="{{ route('home.update', $album->id) }}" method="POST">
                                      @csrf
                                  @method('PUT')
                                  <div class="mb-4">
                                      <label class="block mb-2 text-sm font-bold text-gray-700" for="name">
                                          Name
                                      </label>
                                      <input type="text" value="{{ $album->name }}" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded focus:outline-none focus:shadow-outline" id="name" name="name" placeholder="Masukkan nama">
                                  </div>
                                  <button type="submit"class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Update Album</button>
                                </form>
                                </div>
                                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                    <button data-modal-hide="default-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                                    <button data-modal-hide="default-modal" type="button" class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('home.destroy', $album->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700 focus:outline-none"  onclick="confirmDelete()">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                <path fill-rule="evenodd" d="M15 19a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h1V4a3 3 0 013-3h4a3 3 0 013 3v1h1a2 2 0 012 2v10zm-1 0V7a1 1 0 00-1-1H7a1 1 0 00-1 1v12h8zM6 6a1 1 0 00-1 1v11a1 1 0 001 1h8a1 1 0 001-1V7a1 1 0 00-1-1H6z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </form>
                @endif
            </div>
            <p class="mt-auto text-sm dark:text-gray-400">{{ optional($album->created_at)->diffForHumans() ?? 'Unknown Date' }}
                <a rel="noopener noreferrer" href="#" class="block dark:text-blue-400 lg:ml-2 lg:inline hover:underline">  Jumlah Item: {{ $album->upload->count() }}</a>
            </p>
        </div>
    </div>
    @endif
     @endforeach
</div>
<script>
    function confirmDelete() {
        if (confirm("Apakah anda yakin?")) {
            document.getElementById('deleteForm').submit();
        }
    }
</script>
@endsection
