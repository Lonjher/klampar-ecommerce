@extends('layouts.main')

@section('main')
    <div class="container relative mx-auto carousel" style="max-width:1600px;">
        @include('partial.navbar')
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

            <nav id="store" class="top-0 z-30 w-full px-6 py-1">
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
                    <div
                        class="bg-white border border-gray-200 rounded-lg shadow w-50 max-h-sm dark:bg-gray-800 dark:border-gray-700">
                        <div class="p-3 h-1/1">
                            <a href="#">
                                <img class="object-cover w-full rounded-lg" src="storage/{{ $product->product_image }}"
                                    alt="" />
                            </a>
                        </div>
                        <div class="p-3 h-1/1">
                            <div class="flex flex-col gap-0">
                                <span>
                                    <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">
                                        {{ $product->product_name }}</h5>
                                </span>
                                <span class="text-sm">Rp. {{ Number::format($product->price_sell) }}</span>
                            </div>
                            <p class="mb-3 text-sm font-normal text-gray-700 dark:text-gray-400">{{ $product->description }}
                            </p>
                            <a href="https://wa.me/6285156752475" target="_blank"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Chat Penjual
                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>

    @include('partial.footer')
@endsection
