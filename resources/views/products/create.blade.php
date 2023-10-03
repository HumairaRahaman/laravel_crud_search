@extends('layouts.app')
@section('main')

    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1>Create products</h1>
        </div>
    </header>
    <main>
        @if( $message = Session::get('success'))
            <div class=" bg-green-300 text-dark">
                <strong>{{ $message }}</strong>
            </div>
        @elseif($message = Session::get('error'))
            <div class=" bg-red-300 text-dark">
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <form action="{{ route('products.store')}}" method="post">
                @csrf
                <div class="space-y-12">
                    <div class=" border-gray-900/10 pb-12">

                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-4">
                                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Product
                                    name</label>
                                <div class="mt-2">
                                    <div
                                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                        <input type="text" name="name" id="name" autocomplete="name"
                                               value="{{ old('name') }}"
                                               class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                               placeholder="">
                                    </div>
                                </div>
                                @if($errors->has('name'))
                                    <span
                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-red-900  sm:text-sm sm:leading-6">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="sm:col-span-4">
                                <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                                <div class="mt-2">
                                        <textarea id="description" name="description" rows="3"
                                                  value="{{ old('description') }}"
                                                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                                </div>
                                @if($errors->has('description'))
                                    <span
                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-red-900  sm:text-sm sm:leading-6">{{ $errors->first('description') }}</span>
                                @endif
                                <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about
                                    Product.</p>
                            </div>
                            <div class="mt-6 sm:col-span-4 flex items-center justify-end gap-x-6">
                                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel
                                </button>
                                <button type="submit"
                                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                    Save
                                </button>
                            </div>
                        </div>

                    </div>

                </div>


            </form>

        </div>
    </main>
@endsection
