<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-gray-200 leading-tight">
            {{ __('Tvoja korpa') }}
        </h2>
    </x-slot>
    <div class="container mx-auto p-8">
        <div class="flex">
            <div class="w-2/3 m-8">

                @if ($cartItems->isEmpty())
                    <p>Tvoja korpa je prazna.</p>
                @else
                    @foreach ($cartItems as $item)
                    <div class="border-b-2 border-gray-200 p-4">

                        <!-- Product Details -->
                        <div class="flex justify-between">
                            <div class="w-2/3">
                                <div class="flex">
                                    <img src="{{ asset($item->options->image) }}" alt="{{ $item->name }}" class="w-24 h-24 object-cover mr-4">
                                    <div class="w-2/3">
                                        <h2 class="text-lg font-semibold">{{ $item->name }}</h2>
                                        <p class="text-sm">{{ $item->options->size  }}</p>

                                        <div class="flex"> 
                                            <form action="{{ route('cart.reduce', ['rowId' => $item->rowId]) }}" method="post">
                                                @csrf
                                                <button class="px-2 py-2 bg-white text-gray-700 border-black rounded-l-2xl focus:outline-none" onclick="decrementCounter(this)">
                                                    <!-- Minus Icon -->
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M20 12H4"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                            <span id="counter" class="bg-white px-2 py-1  text-gray-700">{{ $item->qty }}</span>
                                            <form action="{{ route('cart.increase', ['rowId' => $item->rowId]) }}" method="post">
                                                @csrf
                                                <button class="px-2 py-2 bg-white text-gray-700 border-black rounded-r-2xl focus:outline-none" onclick="incrementCounter(this)">
                                                    <!-- Plus Icon -->
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                            <form action="{{ route('cart.remove', ['rowId' => $item->rowId]) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="px-1 py-2 text-sm" type="submit">Ukloni</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <p class="text-gray-500">{{ $item->price }} RSD</p>
                                <p class="text-red-500 text-xs line-through">{{ $item->options->discounted_price }} RSD</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            <div class="w-1/3">
                <!-- Total Price -->
                <div class="bg-gray-100 p-4">
                    <h2 class="text-l font-semibold mb-2">Tvoja narudžbina</h2>
                    <div class="flex justify-between border-b-2 border-gray-200">
                        <div class="w-1/2">
                            <p class="py-2">Ukupno</p>
                            <p class="py-2">Ušteda</p>
                            <p class="py-2">Isporuka Daily Express*</p>
                        </div>
                        <div class="w-1/2">
                            <p class="text-l text-right py-2">{{ $manualTotal }} RSD</p>
                            <p class="text-right py-2">-</p>
                            <p class="text-xs text-right py-2">Besplatno</p>
                        </div>
                    </div>
                    <div class="flex justify-between pb-9">
                        <div class="w-1/2">
                            <p class="py-2">Ukupno za uplatu</p>
                            <p class="text-xs py-2">Cena je sa uključenim PDV-om</p>
                        </div>
                        <div class="w-1/2">
                            <p class="text-l text-right py-2">{{ $manualTotal }} RSD</p>
                            <p class="text-right py-2"></p>
                        </div>
                    </div>
                    <div class="flex justify-center pb-14">
                        <button class="px-8 py-1 bg-black text-white rounded-full focus:outline-none text-sm">
                            Prijavi se za brže plaćanje
                        </button>
                    <div>
                </div>
            </div>
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