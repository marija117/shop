<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-gray-200 leading-tight">
            {{ __('Svi proizvodi') }}
            <span class="text-gray-400 text-sm font-normal">
                {{ $products->count() }}{{ __(' proizvoda') }}
            </span>
        </h2>
    </x-slot>

        <div class="container mx-auto p-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($products as $product)
                <div class="max-w-sm overflow-hidden">
                    <div class="relative">
                        <img class="object-cover w-full" src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                        <button class="absolute bottom-2 left-2 px-2 py-2 bg-white text-gray-700 rounded-l-2xl focus:outline-none" onclick="decrementCounter(this)">
                            <!-- Minus Icon -->
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 12H4"></path>
                            </svg>
                        </button>
                        <span id="counter" class="absolute bottom-2 left-10 bg-white px-2 py-1  text-gray-700">1</span>
                        <button class="absolute bottom-2 left-14 px-2 py-2 bg-white text-gray-700 rounded-r-2xl focus:outline-none" onclick="incrementCounter(this)">
                            <!-- Plus Icon -->
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </button>
                        <form action="{{ route('cart.add', ['product' => $product->id]) }}" method="post">
                            @csrf
                            <button type="submit" class="absolute bottom-3 left-24 p-1 bg-black text-white rounded-full">
                                <img src="{{ asset('storage/cart.png') }}" alt="cart">
                            </button>
                        </form>

                    </div>
                    <div class="px-6 py-4">
                        <div class="font-bold text-l mb-2">{{ $product->name }}</div>
                        <p class="font-semibold text-xl">{{ $product->price }} RSD</p>
                    </div>
                </div>
            @endforeach
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

        </div>
    </div>

</x-app-layout>
<script>
    function incrementCounter(button) {
        var counterElement = button.parentNode.querySelector("#counter");
        counterElement.textContent = parseInt(counterElement.textContent) + 1;
    }

    function decrementCounter(button) {
        var counterElement = button.parentNode.querySelector("#counter");
        var currentCount = parseInt(counterElement.textContent);
        if (currentCount > 1) {
            counterElement.textContent = currentCount - 1;
        }
    }
</script>