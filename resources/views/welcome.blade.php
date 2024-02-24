<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        @vite('resources/css/app.css')
        <link rel="preconnect" href="https://fonts.bunny.net">
    </head>
    <body class="antialiased">
        <header class="absolute top-0 left-0 z-10 flex items-center w-full bg-transparant">
            <div class="container">
                <div class="relative flex items-center justify-between">
                    <div class="px-4">
                        <a href="#home" class="block py-4 ">
                            <img src="{{asset('img/upload.png')}}" alt="" width="40" class="float-left mr-4 md:w-16"><span class="text-xl font-extrabold dark:text-white">
                              Galeryku
                            </span>
                        </a>
                    </div>
                    <div class="flex items-center px-4">
                        <button id="humburger" name="humburger" type="button" class="absolute block right-5 lg:hidden">
                            <span class="transition duration-300 ease-in-out origin-top-left humburger-line"></span>
                            <span class="transition duration-300 ease-in-out humburger-line"></span>
                            <span class="transition duration-300 ease-in-out origin-bottom-left humburger-line"></span>
                        </button>
                        <nav id="nav-menu" class="hidden absolute py-5 bg-white shadow-lg
                        rounded-lg max-w-[250px] w-full right-4 top-full lg:block lg:static lg:bg-transparent
                        lg:max-w-full lg:shadow-none lg:rounded-none dark:bg-black dark:shadow-slate-700 lg:dark:bg-transparent">
                        @if (Route::has('login'))
                    <ul class="block lg:flex">
                        @auth
                        <li class="group ">
                            <a href="{{ url('/home') }}" class="flex py-2 mx-8 text-base text-dark group-hover:text-orange-500 dark:text-white">Home</a>
                        </li>
                        @else
                        <li class="group ">
                            <a href="{{ url('/login') }}" class="flex py-2 mx-8 text-base text-dark group-hover:text-orange-500 dark:text-white">Login</a>
                        </li>

                        @if (Route::has('register'))
                        <li class="group ">
                            <a href="{{ url('/register') }}" class="flex py-2 mx-8 text-base text-dark group-hover:text-orange-500 dark:text-white">regristar</a>
                        </li>
                    @endif
                @endauth
            </ul>
            @endif
                </nav>
                    </div>
                </div>
            </div>
        </header>
        <div class="p-20">
         <div class="container max-w-md px-6 mx-auto font-inter sm:max-w-xl md:max-w-5xl lg:flex lg:max-w-full lg:px-0" id="home">
            <div class="lg:p-12 lg:flex-1">
              <h1 class="text-4xl font-bold text-sky-800 dark:text-blue-500 sm:text-5xl md:text-6xl">Galery <span class="text-slate-800 dark:text-white">Kuy</span></h1>
                <img src="https:/source.unsplash.com/600x400?laptop" alt="laptop" class="mt-4 shadow-xl rounded-xl sm:mt-6 sm:h-64 sm:w-full sm:object-cover sm:object-center lg:hidden brightness-2000">
                     <h2 class="mt-6 text-2xl font-semibold text-slate-800 sm:mt-8 sm:text-4xl dark:text-slate-200">Mari simpan fotomu digalerimu</h2>
                         <p class="mt-2 text-slate-600 sm:mt-4 dark:text-white">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga nulla alias quisquam. Nihil saepe officia aperiam. Necessitatibus rem sapiente, voluptates officiis recusandae blanditiis at accusantium excepturi illum nobis, doloremque sed ipsa rerum optio doloribus tenetur nesciunt consectetur numquam aliquam error? Voluptatem veritatis culpa tempora necessitatibus aliquam consequatur, facilis perspiciatis consectetur.
                         </p>
                         <div class="mt-4 sm:mt-6">
                            <a href="#terus" class="inline-block px-5 py-4 text-sm font-semibold tracking-wider text-white uppercase bg-red-600 rounded-lg shadow-lg"> Selengkapnya</a>
                        </div>
                    </div>
                    <div class="hidden lg:flex lg:w-1/2 brightness-2000">
                        <img src="https:/source.unsplash.com/600x400?laptop" alt="laptop" class="object-cover w-full rounded-l-full">
                    </div>
                </div>
            </div>
            <h2 class="mt-24 mb-10 text-3xl font-bold text-center text-slate-700 dark:text-white">MY GALERY</h2>
            @if (Route::has('login'))
            <div class="flex space-x-6 justify-center px-60 mb-10">
                @auth
                @foreach ($upload as $upload)
                @if ($upload->user_id != auth()->id())
                <article class="mb-4 break-inside p-6 rounded-xl bg-white  shadow-xl dark:bg-slate-800 flex flex-col bg-clip-border">
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
                            <a class="inline-block text-lg font-bold mr-2" href="#">{{ $upload->user->name }}</a>
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
                    <div class="py-4">
                        <a class="flex justify-center items-center" href="#">
                            <img class="max-w-full h-96 rounded-lg object-cover mx-auto" src="{{ asset('storage/article/' . $upload->image) }}" />
                        </a>
                    </div>
                    <p>
                        {{ $upload->deskripsi }}
                    </p>
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
                    <div class="relative">
                        <form action="{{ route('store') }}" method="POST">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="user_id" value="{{ $upload->user->id}}">
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
                                  <a class="inline-block text-base font-bold mr-2" href="#">{{ $comment->user->name }}:</a>
                                  <span class="text-slate-500 dark:text-slate-300">{{ optional($comment->created_at)->diffForHumans() ?? 'Unknown Date' }}</span>
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
                @endif
                @endforeach
                @endauth
            </div>
            @endif
            <div id="terus" class="container px-6 mx-auto font-inter sm:flex sm:flex-wrap sm:gap-6 sm:justify-evenly ">
              <div class="mb-10 overflow-hidden duration-1000 bg-white rounded shadow-lg hover:scale-90 sm:w-64 sm:mb-0 md:w-80 lg:w-72">
                <img src="https:/source.unsplash.com/600x400?people" alt="Image Caption"
                class="w-80">
                <div class="px-6 py-4">
                  <div class="mb-2 text-xl font-bold text-slate-700">Image title</div>
                  <p class="text-sm text-slate-600">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum, deleniti?
                  </p>
                </div>
              </div>
              </div>
            <footer class="pb-12 bg-black">
                <svg  data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none" ><path  d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill" fill="#FFFFFF" fill-opacity="1"></path></svg>

                 <div class="container">
                        <div class="flex flex-wrap">
                            <div class="w-full px-4 pt-10 mb-12 font-medium text-slate-300 md:w-1/3">
                                <h3 class="mb-2 text-2xl font-bold">Hubungi kami</h3>
                                <p class="">087986756536475</p>
                                <p class="">rekayaperngakatlunak@gmail.com</p>
                                <p class="">JL.ruwet.kab-ruwet.kec-ruwet</p>
                                <p class="">Jember</p>
                            </div>
                            <div class="w-full px-4 pt-16 mb-12 lg:w-1/3">
                                <h3 class="mb-5 text-xl font-semibold text-white">About GaLERYKUY</h3>
                                 <p class="font-semibold text-slate-300">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt fuga error aut itaque dolore quam rerum ipsa corrupti reiciendis nam.
                                 </p>
                            </div>
                        <div class="w-full px-4 pt-16 mb-12 lg:w-1/3">
                            <h3 class="mb-5 text-xl font-semibold text-white">Quick Links</h3>
                                <ul class=" text-slate-300">
                                    <li>
                                        <a href="#home" class="inline-block mb-3 text-base hover:text-orange-500">Login</a>
                                    </li>
                                    <li>
                                        <a href="#about" class="inline-block mb-3 text-base hover:text-orange-500">regristar</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="w-full pt-10 border-t border-slate-700">
                            <div class="flex items-center justify-center mb-5">
                                <a class="flex items-center justify-center mr-3 border rounded-full w-9 h-9 text-slate-300 border-slate-300 hover:bg-orange-500 hover:border-orange-500 hover:text-white" href="https://youtube.com" target="_blank">
                                    <svg class="fill-current" role="img" width="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>YouTube</title><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                                </a>
                                <a class="flex items-center justify-center mr-3 border rounded-full w-9 h-9 text-slate-300 border-slate-300 hover:bg-orange-500 hover:border-orange-500 hover:text-white" href="https://instagram.com/bodacius_warerpiel" target="_blank">
                                <svg class="fill-current" role="img" width="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Instagram</title><path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/></svg>
                                </a>
                                <a class="flex items-center justify-center mr-3 border rounded-full w-9 h-9 text-slate-300 border-slate-300 hover:bg-orange-500 hover:border-orange-500 hover:text-white" href="https://WhatsApp.com" target="_blank">
                                <svg class="fill-current" role="img" width="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>WhatsApp</title><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                                </a>
                                <a class="flex items-center justify-center mr-3 border rounded-full w-9 h-9 text-slate-300 border-slate-300 hover:bg-orange-500 hover:border-orange-500 hover:text-white" href="https://twitter.com" target="_blank">
                                <svg class="fill-current" width="20" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Twitter</title><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                                </a>
                                <a class="flex items-center justify-center mr-3 border rounded-full w-9 h-9 text-slate-300 border-slate-300 hover:bg-orange-500 hover:border-orange-500 hover:text-white" href="https://tiktok.com/@ayongoding99" target="_blank">
                                <svg class="fill-current" role="img" width="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>TikTok</title><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>
                                </a>
                            </div>
                            <p class="text-xs font-medium text-center text-slate-500">Dibuat dengan <span class="text-pink-500">❤</span> Oleh <a href="https://tiktok.com/@ayongoding99" target="_blank" class="font-bold text-orange-500">ANZZ</a>, Menggunakan <a href="https://tailwindcss.com" target="_blank" class="font-bold text-sky-500">TailwindCss</a></p>
                        </div>
                    </div>
                </footer>
                <a href="#home" class="fixed hidden justify-center items-center x-[9999] bottom-4 right-4 h-14 w-14 bg-orange-500 rounded-full p-4 hover:animate-pulse" id="top">
            <span class="block w-5 h-5 mt-2 rotate-45 border-t-2 border-l-2"></span></a>
            @vite('resources/js/js.js')
    </body>
</html>

