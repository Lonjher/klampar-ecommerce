@extends('layouts.main')

@section('main')
    <div class="container mx-auto mt-10 carousel" style="max-width:1600px;">
        <section class="flex w-full pt-12 mx-auto bg-right bg-cover bg-nordic-gray-light md:pt-0 md:items-center"
            style="max-width:1600px; height: 32rem; background-image: url('https://images.unsplash.com/photo-1422190441165-ec2956dc9ecc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1600&q=80');">

            <div class="container mx-auto">

                <div class="flex flex-col items-start justify-center w-full px-6 tracking-wide lg:w-1/2">
                    <h1 class="my-4 text-2xl text-black">Batik Tulis Original Klampar Proppo Pamekasan</h1>
                    <a class="inline-block text-xl leading-relaxed no-underline border-b border-gray-600 hover:text-black hover:border-black"
                        href="#store">products</a>

                </div>

            </div>

        </section>
    </div>

    <section class="py-8 bg-white">

        <div class="container flex flex-wrap items-center pt-4 pb-12 mx-auto">

            <nav id="store" class="top-0 w-full px-6 py-1 z-1">
                <div class="container flex flex-wrap items-center justify-between w-full px-2 py-3 mx-auto mt-0">

                    <a class="text-xl font-bold tracking-wide text-gray-800 no-underline uppercase hover:no-underline "
                        href="#">
                        Store
                    </a>

                    <div class="flex items-center" id="store-nav-content">

                        <a class="inline-block pl-3 no-underline hover:text-black" href="#">
                            <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24">
                                <path d="M7 11H17V13H7zM4 7H20V9H4zM10 15H14V17H10z" />
                            </svg>
                        </a>

                        <a class="inline-block pl-3 no-underline hover:text-black" href="#">
                            <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24">
                                <path
                                    d="M10,18c1.846,0,3.543-0.635,4.897-1.688l4.396,4.396l1.414-1.414l-4.396-4.396C17.365,13.543,18,11.846,18,10 c0-4.411-3.589-8-8-8s-8,3.589-8,8S5.589,18,10,18z M10,4c3.309,0,6,2.691,6,6s-2.691,6-6,6s-6-2.691-6-6S6.691,4,10,4z" />
                            </svg>
                        </a>

                    </div>
                </div>
            </nav>

            <div class="grid grid-cols-5 gap-3">
                @foreach ($products as $product)
                    <div class="flex flex-col w-56 rounded-lg shadow-md h-96">
                        <div class="flex flex-1 rounded-t-lg"
                            style="background-image: url(storage/{{ $product->product_image }});
                                   background-size: cover;
                                   background-repeat: no-repeat;
                            ">
                        </div>
                        <div class="flex flex-col flex-1 p-2 bg-gray-100">
                            <div class="flex-1 detail">
                                <span class="block font-semibold">{{ $product->product_name }}</span>
                                <span class="text-xl font-bold text-red-500">Rp.
                                    {{ Number::format($product->price_sell) }}</span>
                            </div>
                            <div class="flex-1 more-info">
                                <div class="flex gap-3">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQlbknLAESnOINVAGOyL_utzdTgT6UK7ehEqg&s"
                                        width="25" alt="star">
                                    <span>4.5 10rb+ terjual</span>
                                </div>
                                <span>3-7 hari kab bandung</span>
                                <a href="https://wa.me/6282228462025" target="_blank"
                                    class="inline-flex items-center gap-2 px-3 py-2 mt-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <i class="bi bi-whatsapp"></i>
                                    <span>Chat Penjual</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>

    @include('partial.footer')
@endsection
