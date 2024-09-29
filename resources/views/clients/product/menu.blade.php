@extends('layouts.client')

@section('title', 'Thực đơn')

@section('content')
    <div class="md:mx-24 lg:mx-32 min-h-screen p-4 md:p-8 transition">
        <div class="grid grid-cols-3 md:gap-8">
            {{-- Bộ lọc --}}
            <div class="col-span-3 lg:col-span-1 card p-4 mb-8">
                <p class="font-semibold uppercase flex items-center gap-2 mb-4">
                    @svg('tabler-filter', 'icon-md')
                    Bộ lọc
                </p>

                {{-- Tìm kiếm --}}
                <form class="mb-4">
                    <input type="text" placeholder="Tìm kiếm..." class="input mb-4" />
                    <button class="button-red w-full">Tìm kiếm</button>
                </form>

                <hr class="hr-default" />

                {{-- Danh mục --}}
                <div class="mb-4 md:flex md:items-start">
                    <div class="md:flex-1">
                        <h3 class="font-semibold mb-2 uppercase">Danh mục</h3>
                        <div class="space-y-2">
                            <label class="flex items-center gap-2">
                                <input type="checkbox" class="input-checkbox" />
                                Pizza
                            </label>
                            <label class="flex items-center gap-2">
                                <input type="checkbox" class="input-checkbox" />
                                Mỳ Ý
                            </label>
                            <label class="flex items-center gap-2">
                                <input type="checkbox" class="input-checkbox" />
                                Salat
                            </label>
                            <label class="flex items-center gap-2">
                                <input type="checkbox" class="input-checkbox" />
                                Đồ uống
                            </label>
                            <label class="flex items-center gap-2">
                                <input type="checkbox" class="input-checkbox" />
                                Gà rán
                            </label>
                        </div>
                    </div>
                </div>

                <hr class="hr-default" />

                {{-- Đánh giá --}}
                <div class="mb-4 ">
                    <h3 class="font-semibold mb-2 uppercase">Đánh giá</h3>
                    <div>
                        <div class="space-y-2">
                            <label class="flex items-center">
                                <input type="checkbox" class="input-checkbox mr-2" /> 5 sao
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="input-checkbox mr-2" /> Từ 4 sao
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="input-checkbox mr-2" /> Từ 3 sao
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="input-checkbox mr-2" /> Từ 2 sao
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="input-checkbox mr-2" /> Từ 1 sao
                            </label>
                        </div>
                    </div>
                </div>

                <hr class="hr-default" />

                {{-- Giá --}}
                <div class="mb-4">
                    <h3 class="font-semibold mb-2 uppercase">Giá</h3>
                    <div class="flex items-center justify-between gap-8">
                        <input type="text" class="input text-sm" placeholder="Tối thiểu">
                        <span>-</span>
                        <input type="text" class="input text-sm" placeholder="Tối đa">
                    </div>

                </div>
                <button class="text-white rounded px-4 py-2 mt-4 w-full button-red ">Áp dụng</button>
            </div>

            {{-- Sản phẩm --}}
            <div class="col-span-3 lg:col-span-2">
                {{-- combo --}}
                <div class="mb-8">
                    <p class="font-semibold uppercase mb-4">Combo</p>
                    <a href="" class="product-card flex overflow-hidden relative">
                        <img src="http://127.0.0.1:8000/storage/uploads/products/pizza/pizza_4_ormaggi.webp"
                            class="flex-shrink-0 h-60 w-1/2 object-cover" alt="">
                        <div class="p-4">
                            <p class="font-semibold mb-2 text-sm md:text-base">Combo 2 Pizza + Pepsi - Ăn thả ga - Giá siêu
                                rẻ</p>
                            <ul class="ps-4 text-xs md:text-sm space-y-1 list-disc">
                                <li>Pizza xúc xích phô mai size S</li>
                                <li>Pizza xúc xích phô mai size M</li>
                                <li>2 Pepsi lon 450ml</li>
                            </ul>
                            <div class="absolute bottom-4 flex gap-3 items-center">
                                <p class="line-through text-sm text-gray-500">190,000đ</p>
                                <p class="text-lg font-semibold">190,000đ</p>
                            </div>
                        </div>
                    </a>
                </div>

                {{-- products --}}
                @foreach ($products as $categoryName => $items)
                    <div class="mb-8">
                        <p class="font-semibold uppercase mb-4">{{ ucfirst($categoryName) }}</p>
                        <div class="grid grid-cols-2 lg:grid-cols-2 gap-4 mb-4">
                            @foreach ($items as $product)
                                <a href="{{ route('client.product.show', $product->slug) }}"
                                    class="product-card md:flex overflow-hidden">
                                    <img src="http://127.0.0.1:8000/storage/uploads/products/pizza/pizza_4_ormaggi.webp"
                                        class="flex-shrink-0 h-48 w-full md:w-1/3 md:h-full object-cover" alt="">
                                    <div class="p-2 text-sm">
                                        <p class="font-semibold mb-2 ">{{ $product->name }}</p>
                                        <div class="flex items-center gap-1 mb-2">
                                            <p>{{ $product->avg_rating }}</p>
                                            <div class="flex items-center gap-1">
                                                @for ($i = 0; $i < 5; $i++)
                                                    @if ($i < $product->avg_rating)
                                                        @svg('tabler-star-filled', 'icon-sm text-red-500')
                                                    @else
                                                        @svg('tabler-star', 'icon-sm text-red-500')
                                                    @endif
                                                @endfor
                                            </div>
                                            <p>({{ $product->avg_rating }})</p>
                                        </div>
                                        <p class="mb-4 line-clamp-3 h-12">{{ $product->description }}</p>
                                        <div class="bottom-4 flex gap-3 items-center">
                                            <p class="line-through text-xs text-gray-500">
                                                {{ number_format($product->price) }}đ
                                            </p>
                                            <p class="font-semibold">{{ number_format($product->discount_price) }}đ</p>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        {{ $items->links() }}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection