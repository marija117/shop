<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Svi proizvodi') }}
        </h2>
    </x-slot>
    <div class="container">
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->size }}</p>
                            <p class="card-text">${{ $product->price }}</p>
                            @if($product->discounted_price)
                                <p class="card-text">Discounted Price: ${{ $product->discounted_price }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
