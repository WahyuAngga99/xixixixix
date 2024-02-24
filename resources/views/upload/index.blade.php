@extends('layouts.app')
@section('content')
<div class="px-44 py-20">
    <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
        Upload
    </button>
      <div class="mt-4">
          <a href="{{ url('home') }}" class="inline-flex items-center px-5 py-2.5 text-xs font-semibold tracking-widest text-white uppercase transition bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 mr-2">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
              </svg>
             Kembalii
          </a>
      </div>
</div>
<div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full p-4">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Terms of Service
                </h3>
                <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 space-y-4 md:p-5">
              <form action="{{ route('upload.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="album_id" value="{{ Session('album_id') }}">
                  <div class="mb-4">
                    <label class="block mb-2 text-sm font-bold text-gray-700" for="name">
                      name
                    </label>
                    <textarea class="w-full px-3 py-2 leading-tight text-gray-700 border rounded focus:outline-none focus:shadow-outline" id="name" name="name" placeholder="Masukkan name"></textarea>
                  </div>
                  <div class="mb-4">
                    <label class="block mb-2 text-sm font-bold text-gray-700" for="deskripsi">
                      Deskripsi
                    </label>
                    <textarea class="w-full px-3 py-2 leading-tight text-gray-700 border rounded focus:outline-none focus:shadow-outline" id="deskripsi" name="deskripsi" placeholder="Masukkan deskripsi"></textarea>
                  </div>
                  <div class="mb-4">
                    <label class="block mb-2 text-sm font-bold text-gray-700" for="image">
                      Gambar
                    </label>
                    <input type="file" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded focus:outline-none focus:shadow-outline" id="image" name="image">
                  </div>
                  <div class="flex items-center justify-end">
                    <button type="submit" class="px-4 py-2 mr-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">Simpan</button>
                  </div>
                </form>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 border-t border-gray-200 rounded-b md:p-5 dark:border-gray-600">
                <button data-modal-hide="default-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                <button data-modal-hide="default-modal" type="button" class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
            </div>
        </div>
    </div>
</div>


<div class="flex space-x-6 px-60">
    @foreach ($upload as $upload)
    <article class="mb-4 break-inside p-6 rounded-xl bg-white shadow-xl dark:bg-slate-800 flex flex-col bg-clip-border">
        <div class="flex pb-6 items-center justify-between">
          <div class="flex">
            <a class="inline-block mr-4" href="#">
            @if($upload->user && $upload->user->image)
                <img class="rounded-full max-w-none w-14 h-14"   src="{{ asset('storage/' .$upload->user->image) }}" alt="User Image">
            @else
                <img class="rounded-full max-w-none w-14 h-14"   src="{{ asset('images/foto.png') }}" alt="User Image">
            @endif
            </a>
            <div class="flex flex-col">
              <div class="flex items-center">
                <a class="inline-block text-lg font-bold mr-2" href="#">{{ auth()->user()->name }}</a>
                <span>
                  <svg class="fill-blue-500 dark:fill-slate-50 w-5 h-5" viewBox="0 0 24 24">
                    <path
                      d="M10,17L5,12L6.41,10.58L10,14.17L17.59,6.58L19,8M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z">
                    </path>
                  </svg>
                </span>
              </div>
              <div class="text-slate-500 dark:text-slate-300">
                {{ optional($upload->created_at)->diffForHumans() ?? 'Unknown Date' }}
              </div>
            </div>
          </div>
        </div>
        <h2 class="text-sm font-extrabold">
            {{ $upload->name }}
        </h2>
        <div class="py-4">

            <a class="flex justify-center items-center" href="#">
                <img class="max-w-full h-96 rounded-lg object-cover mx-auto" src="{{ asset('storage/article/' . $upload->image) }}" />
            </a>
        </div>
<br>
<br>
        <p>
            {{ $upload->deskripsi }}
        </p>
        <br>
        <br>
        <div class="flex items-center space-x-4">
            <button data-modal-target="default-modal2{{$upload->id}}" data-modal-toggle="default-modal2{{$upload->id}}" class="w-5 h-5 text-blue-500 hover:text-blue-700 focus:outline-none" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-500 hover:text-blue-700 focus:outline-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 3a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h10zm0 0h6M9 21v-6M19 13l-2 2M19 13l-2-2"></path>
                </svg>
              </button>

              <div id="default-modal2{{$upload->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
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
                        <!-- Modal body -->
                        <div class="p-4 md:p-5 space-y-4">

                            <form action="{{ route('upload.update', $upload->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-6">
                                  <label for="fullName" class="block text-xs text-dark"
                                    >Name</label
                                  >
                                  <input
                                    type="text"
                                    value="{{($upload->name)}}"
                                    name="name"
                                    placeholder="Your Name"
                                    class="
                                      w-full
                                      border-0 border-b border-[#f1f1f1] focus:border-orange-500 focus:outline-none py-4"/>
                                </div>
                                <div class="mb-6">
                                  <label for="fullName" class="block text-xs text-dark"
                                    >deskripsi </label
                                  >
                                  <input
                                    type="text"
                                    value="{{($upload->deskripsi)}}"
                                    name="deskripsi"
                                    placeholder="Your Name"
                                    class="
                                      w-full
                                      border-0 border-b border-[#f1f1f1] focus:border-orange-500 focus:outline-none py-4"/>
                                </div>
                                <div class="mb-6">
                                    <label for="phone" class="block text-xs text-dark">Bukti Foto</label>
                                    <input type="file" name="image" placeholder="Masukan Foto" class="w-full  border-0 border-b border-[#f1f1f1] focus:border-orange-500 focus:outline-none py-4"/>

                                  </div>
                                <div class="mb-0">
                                  <button type="submit" class="inline-flex items-center justify-center px-6 py-4 text-base font-medium text-white transition duration-300 ease-in-out bg-orange-500 rounded hover:bg-orange-800">
                                    Kirim
                                  </button>
                                </div>
                            </form>
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button data-modal-hide="default-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                            <button data-modal-hide="default-modal" type="button" class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                        </div>
                    </div>
                </div>
            </div>

            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('upload.destroy', $upload->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 focus:outline-none focus:ring focus:border-red-400">
                    Hapus
                </button>
            </form>
        </div>
        <div class="flex flex-wrap px-4 py-4 items-center">

            <form action="{{ route('like.store') }}" method="POST" class="mr-4">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <input type="hidden" name="album_id" value="{{ $upload->album_id }}">
                <input type="hidden" name="upload_id" value="{{ $upload->id }}">
                <button type="submit" class="flex items-center text-base font-semibold transition duration-300 ease-in-out focus:outline-none">
                    <i class="fa fa-thumbs-up" aria-hidden="true">
                        {{ $upload->likes_count }}</i>
                </button>
            </form>
            
        </div>
        <div class="relative">
            <form action="{{ route('comments.store') }}" method="POST">
                @csrf
                @method('POST')

                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="album_id" value="{{ $album_id}}">
                <input type="hidden" name="upload_id" value="{{ $upload->id }}">


                <div class="relative flex items-center">
                    <input
                        class="flex-grow pt-2 pb-2 pl-3 bg-slate-100 dark:bg-slate-600 rounded-lg placeholder:text-slate-600 dark:placeholder:text-slate-300 font-medium pr-20 focus:outline-none focus:ring focus:border-blue-400"
                        type="text" placeholder="Write a comment" name="content" />
                    <button type="submit" class="p-2 ml-2 text-white bg-blue-500 rounded-lg">
                        kirim
                    </button>
                </div>
        </form>
        </div>
        <div class="pt-6">
          @foreach ($upload->comments as $comment)
          <div class="media flex pb-4">
              <a class="mr-4" href="#">
                  <img class="rounded-full max-w-none w-12 h-12" src="https://randomuser.me/api/portraits/men/83.jpg" />
                </a>
                <div class="media-body">
                    <div>
                        @auth
                        <a class="inline-block text-base font-bold mr-2" href="#">{{ $comment->user->name }}:</a>
                        @endauth
                <span class="text-slate-500 dark:text-slate-300"> {{ optional($comment->created_at)->diffForHumans() ?? 'Unknown Date' }}</span>
              </div>
              <p>
                  {{ $comment->content }}
            </p>
            @if(auth()->check() && $comment->user_id == auth()->user()->id)
                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-700">Delete Comment</button>
                </form>
            @endif
            <div class="mt-2 flex items-center">
              </div>
            </div>
        </div>
        @endforeach
          <div class="w-full">
            <a href="#"
              class="py-3 px-4 w-full block bg-slate-100 dark:bg-slate-700 text-center rounded-lg font-medium hover:bg-slate-200 dark:hover:bg-slate-600 transition ease-in-out delay-75">Show
              more comments</a>
          </div>
        </div>
    </article>
@endforeach
    </div>
@endsection
