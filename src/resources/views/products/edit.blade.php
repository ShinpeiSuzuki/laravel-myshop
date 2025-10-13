<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          商品を編集
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 bg-white p-6 rounded shadow">
          <form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="mb-4">
                  <label class="block text-sm font-medium text-gray-700">商品名</label>
                  <input type="text" name="name" value="{{ old('name', $product->name) }}" class="w-full border rounded p-2">
              </div>

              <div class="mb-4">
                  <label class="block text-sm font-medium text-gray-700">説明</label>
                  <textarea name="description" class="w-full border rounded p-2" rows="3">{{ old('description', $product->description) }}</textarea>
              </div>

              <div class="mb-4">
                  <label class="block text-sm font-medium text-gray-700">価格</label>
                  <input type="number" name="price" value="{{ old('price', $product->price) }}" class="w-full border rounded p-2">
              </div>

              <div class="mb-4">
                  <label class="block text-sm font-medium text-gray-700">商品画像（変更する場合のみ選択）</label>
                  <input type="file" name="image" class="w-full border p-2">
                  <img src="{{ $product->image_path }}" class="mt-3 w-48 rounded">
              </div>

              <div class="flex justify-end">
                  <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">更新する</button>
              </div>
          </form>
      </div>
  </div>
</x-app-layout>
