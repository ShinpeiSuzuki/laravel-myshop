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

              <div class="space-y-6">

            <!-- 商品名 -->
            <div>
              <label class="block font-semibold mb-2 text-gray-700">商品名</label>
              <input type="text" name="name" value="{{ old('name', $product->name) }}"
                     class="w-full border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                     placeholder="例）iPhone 15 Pro">
              @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>

            <!-- 商品説明 -->
            <div>
              <label class="block font-semibold mb-2 text-gray-700">商品説明</label>
              <textarea name="description" rows="4"
                        class="w-full border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                        placeholder="商品の特徴や仕様などを記入">{{ old('description', $product->description) }}</textarea>
              @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>

            <!-- 価格 -->
            <div>
              <label class="block font-semibold mb-2 text-gray-700">価格（円）</label>
              <input type="number" name="price" value="{{ old('price', $product->price) }}"
                     class="w-full border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                     placeholder="例）198000">
              @error('price')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>

            <!-- 現在の画像 -->
            @if ($product->image_path)
              <div>
                <p class="font-semibold mb-2 text-gray-700">現在の画像</p>
                <img src="{{ $product->image_path }}" alt="{{ $product->name }}"
                     class="w-40 h-40 object-cover rounded-lg border">
              </div>
            @endif

            <!-- 新しい画像 -->
            <div>
              <label class="block font-semibold mb-2 text-gray-700">商品画像（変更する場合のみ選択）</label>
              <input type="file" name="image"
                     class="w-full text-gray-700 border-gray-300 rounded-lg p-2 bg-gray-50">
              @error('image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>

          </div>

	          <!-- ボタン -->
	      <div class="mt-8 flex justify-end gap-3">
	        <a href="{{ route('products.index') }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400 transition"> 戻る
	            </a>
	        <button type="submit"
                 class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
	              更新する
	       </button>
	      </div>
          </form>
      </div>
  </div>
</x-app-layout>
