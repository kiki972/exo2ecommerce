<!-- resources/views/products/index.blade.php -->

<x-app-layout>
    {{-- <x-slot name="content"> --}}
        <div class="container mx-auto px-4 py-8">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Liste des produits</h2>
            <p class="text-gray-600 mb-4">Bienvenue, {{ $userName }}</p>
            {{-- @dd(Auth::user()->isAdmin()) --}}

            @if (Auth::check() && Auth::user()->isAdmin())
                <a class="bg-white hover:bg-gray-300 text-black font-bold py-1 px-2 rounded text-sm mr-2"
                    href="{{ route('products.create') }}">Ajouter un nouveau produit</a>
            @endif

            @if ($products->isEmpty())
                <p class="text-gray-600">Aucun produit trouvé.</p>
            @else
                <table class="min-w-full bg-white border rounded-lg shadow-md">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">Nom</th>
                            <th class="py-2 px-4 border-b">Description</th>
                            <th class="py-2 px-4 border-b">Prix</th>
                            <th class="py-2 px-4 border-b">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr class="bg-gray-50 hover:bg-gray-100">
                                <td class="py-2 px-4 border-b">{{ $product->name }}</td>
                                <td class="py-2 px-4 border-b">{{ $product->description }}</td>
                                <td class="py-2 px-4 border-b">{{ $product->price }}</td>
                                <td class="py-2 px-4 border-b">
                                    <a class="bg-white hover:bg-gray-300 text-black font-bold py-1 px-2 rounded text-sm mr-2"
                                        href="{{ route('products.show', $product->id) }}">Détails</a>

                                    @if (Auth::check() && Auth::user()->isAdmin())
                                        <a class="bg-white hover:bg-gray-300 text-black font-bold py-1 px-2 rounded text-sm mr-2"
                                            href="{{ route('products.edit', $product->id) }}">Modifier</a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-white hover:bg-gray-300 text-black font-bold py-1 px-2 rounded text-sm"
                                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">Supprimer</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    {{-- </x-slot> --}}
</x-app-layout>
