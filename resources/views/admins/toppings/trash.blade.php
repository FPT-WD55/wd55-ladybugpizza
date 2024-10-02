@extends('layouts.admin')
@section('title', 'Thùng rác')

@section('content')
    <div class="mt-5 bg-white relative shadow sm:rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
            <div class="flex justify-end gap-4">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <div class="mb-4 flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end md:space-y-0 md:space-x-3">
                <a href="{{route('toppings.index')}}" class="flex items-center justify-center px-4 py-2 text-sm text-white rounded-lg bg-green-700 hover:bg-green-800 focus:ring-0">Quay lại</a>
            </div>
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-4 py-3">Tên</th>
                        <th scope="col" class="px-4 py-3">Ảnh</th>
                        <th scope="col" class="px-4 py-3">Giá</th>
                        <th scope="col" class="px-4 py-3">Danh mục</th>
                        <th scope="col" class="px-4 py-3">
                            <span class="sr-only">Actions</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listToppings as $listTp)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-4 py-2 text-gray-900 whitespace-nowrap ">{{ $listTp->name }}</td>
                            <td class="px-4 py-2 text-gray-900 whitespace-nowrap ">
                                <img src="{{ asset('/storage/' . $listTp->image) }}" class="img-sm" alt="">
                            </td>
                            <td class="px-4 py-2 text-gray-900 whitespace-nowrap ">{{ $listTp->price }}</td>
                            <td class="px-4 py-2 text-gray-900 whitespace-nowrap">
                                @foreach ($categories as $cateName)
                                    <span>
                                        @if ($cateName->id == $listTp->category_id)
                                            {{ $cateName->name }}
                                        @endif
                                    </span>
                                @endforeach
                            </td>
                            <td class="px-4 py-3 flex items-center justify-end">
                                <button id="{{ $listTp->name }}" data-dropdown-toggle="{{ $listTp->name }}-dropdown"
                                    class="inline-flex items-center p-0.5 text-sm text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none"
                                    type="button">
                                    @svg('tabler-dots', 'w-5 h-5')
                                </button>
                                <div id="{{ $listTp->name }}-dropdown"
                                    class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow">
                                    <ul class="py-1 text-sm text-gray-700" aria-labelledby="{{ $listTp->name }}">
                                        <li>
                                            <a href="{{ route('resTopping', $listTp->id) }}"
                                                class="block py-2 px-4 hover:bg-gray-100">Khôi Phục</a>
                                        </li>
                                    </ul>
                                    <div class="py-1">
                                        <form action="{{ route('forceDelete-Toppings', $listTp->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Bạn chắc chắn muốn xóa vĩnh viễn chứ?')"
                                                data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                                class="cursor-pointer block py-2 px-4 text-sm text-red-500 hover:bg-gray-100">Xóa</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="p-4">
                {{ $listToppings->links() }}
            </div>
        </div>
    </div>
@endsection