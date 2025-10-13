<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ $product->name }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 bg-white shadow p-6 rounded">
          <img src="{{ $product->image_path }}" alt="{{ $product->name }}" class="w-full h-64 object-cover mb-4 rounded">
          <h3 class="text-2xl font-bold mb-2">{{ $product->name }}</h3>
          <p class="text-gray-700 mb-4">{{ $product->description }}</p>
          <p class="text-lg font-semibold mb-4">{{ $product->price }}円</p>
          <a href="{{ route('products.index') }}" class="text-blue-600 hover:underline">
              ← 一覧に戻る
          </a>
      </div>
  </div>
</x-app-layout>
