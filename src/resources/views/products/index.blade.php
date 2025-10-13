<x-app-layout>
  <x-slot name="header">
      @auth
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                商品一覧
            </h2>
            <a href="{{ route('products.create') }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                ＋ 新規登録
            </a>
        </div>
      @else
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品一覧
        </h2>
      @endauth
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

          <!-- 検索フォーム -->
          <form method="GET" action="{{ route('products.index') }}" class="mb-6 flex">
              <input type="text" name="keyword" value="{{ request('keyword') }}"
                  placeholder="商品名で検索..."
                  class="w-full border rounded-l p-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
              <button type="submit" class="px-4 bg-indigo-600 text-white rounded-r hover:bg-indigo-700">
                  検索
              </button>
          </form>

          <!-- 商品一覧（カードグリッド） -->
          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
              @forelse ($products as $product)
                  <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                      <img src="{{ $product->image_path }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                      <div class="p-4">
                          <h3 class="font-bold text-lg truncate">{{ $product->name }}</h3>
                          <p class="text-gray-600 text-sm mb-2 truncate">{{ $product->description }}</p>
                          <p class="font-semibold text-indigo-600 mb-2">{{ number_format($product->price) }} 円</p>

                          <div class="flex justify-between items-center">
                              <a href="{{ route('products.show', $product) }}" class="text-blue-600 hover:underline">詳細</a>
                              @auth
                                  <div class="flex gap-2">
                                      <a href="{{ route('products.edit', $product) }}" class="text-green-600 hover:underline">編集</a>
                                      <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('削除しますか？');">
                                          @csrf
                                          @method('DELETE')
                                          <button class="text-red-600 hover:underline">削除</button>
                                      </form>
                                  </div>
                              @endauth
                          </div>
                      </div>
                  </div>
              @empty
                  <p class="text-gray-500">商品が登録されていません。</p>
              @endforelse
          </div>
      </div>
  </div>
</x-app-layout>
