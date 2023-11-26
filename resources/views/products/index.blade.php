<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-gray-200 leading-tight">
            {{ __('Svi proizvodi') }}
        </h2>
    </x-slot>

        <div class="container mx-auto p-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($products as $product)
                <div class="max-w-sm rounded overflow-hidden shadow-lg bg-gray-100">
                    <img class="w-full" src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">{{ $product->name }}</div>
                        <p class="text-gray-700 text-base">{{ $product->description }}</p>
                        <p class="text-gray-900 text-base">{{ $product->price }} RSD</p>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">
                            Add to Cart
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</x-app-layout>
