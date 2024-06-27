<!-- resources/views/products/show.blade.php -->

<x-app-layout>
    <div class="container">
        <div>
            <strong>Nom:</strong> {{ $product->name }} <br>
            <strong>Description:</strong> {{ $product->description }} <br>
            <strong>Prix:</strong> {{ $product->price }} <br>
        </div>
        <a class="btn btn-secondary mt-3" href="{{ route('products.index') }}">Retour à la liste des produits</a>
    </div>
</x-app-layout>