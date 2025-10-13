<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // ← これが重要！

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where('name', 'like', "%{$keyword}%")
                ->orWhere('description', 'like', "%{$keyword}%");
        }

        $products = $query->orderBy('created_at', 'desc')->get();

        return view('products.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|integer|min:0',
            'image' => 'nullable|image|max:2048',
        ]);

        // 古い画像を削除して新しい画像をS3にアップロード
        if ($request->hasFile('image')) {
            if ($product->image_path && !str_contains($product->image_path, 'placehold.jp')) {
                $oldPath = ltrim(parse_url($product->image_path, PHP_URL_PATH), '/');
                \Illuminate\Support\Facades\Storage::disk('s3')->delete($oldPath);
            }

            $path = $request->file('image')->store('products', 's3');
            $product->image_path = \Illuminate\Support\Facades\Storage::disk('s3')->url($path);
        }

        // 他の項目を更新
        $product->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'image_path' => $product->image_path,
        ]);

        return redirect()->route('products.index')->with('success', '商品を更新しました！');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|integer|min:0',
            'image' => 'nullable|image|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            // S3にアップロード
            $path = $request->file('image')->store('products', 's3');

            // 公開URLを取得
            $path = Storage::disk('s3')->url($path);
        }

        Product::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'image_path' => $path ?? 'https://placehold.jp/300x300.png',
        ]);

        return redirect()->route('products.index')->with('success', '商品を登録しました！');
    }

    public function destroy(Product $product)
    {
    // S3に保存された画像のパスを取得
    if ($product->image_path && !str_contains($product->image_path, 'placehold.jp')) {
        // URL全体からS3上の相対パスを抽出
        $path = parse_url($product->image_path, PHP_URL_PATH);

        // "/products/xxxx.jpg" のような形なので先頭の "/" を除去
        $path = ltrim($path, '/');

        // S3から削除（例: products/xxxx.jpg）
        \Illuminate\Support\Facades\Storage::disk('s3')->delete($path);
    }

    // DB上の商品を削除
    $product->delete();

    return redirect()->route('products.index')->with('success', '商品を削除しました！（S3の画像も削除済み）');
    }
}
