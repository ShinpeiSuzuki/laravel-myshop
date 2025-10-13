<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          商品登録
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 bg-white shadow p-6 rounded">
          <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="mb-4">
                  <label class="block text-gray-700">商品名</label>
                  <input type="text" name="name" value="{{ old('name') }}" class="w-full border rounded p-2" required>
              </div>

              <div class="mb-4">
                  <label class="block text-gray-700">説明</label>
                  <textarea name="description" class="w-full border rounded p-2" required>{{ old('description') }}</textarea>
              </div>

              <div class="mb-4">
                  <label class="block text-gray-700">価格（円）</label>
                  <input type="number" name="price" value="{{ old('price') }}" class="w-full border rounded p-2" required>
              </div>

              <div class="mb-4">
                  <label class="block text-gray-700">画像</label>
                  <input type="file" name="image" class="block">
              </div>

              <div class="flex justify-end">
                  <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                      登録する
                  </button>
              </div>
          </form>
      </div>
  </div>
</x-app-layout>
