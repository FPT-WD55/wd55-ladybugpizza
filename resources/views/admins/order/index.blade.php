@extends('layouts.admin')
@section('title', 'Danh sách mã giảm giá')

@section('content')
    <div class="mt-5 bg-white relative shadow sm:rounded-lg overflow-hidden">
        <div class="overflow-x-auto ">
            <div
                class="mr-4 my-4 flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end md:space-y-0 md:space-x-3">
                @if (session('message'))
                    <div class="button bg-green-400">
                        {{ session('message') }}
                    </div>
                @endif
                {{-- <a href="{{ route('admin.orders.create') }}" class="button-blue">
                    @svg('tabler-plus', 'w-5 h-5 mr-2')
                    Thêm mới mã giảm giá
                </a> --}}
            </div>
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-4 py-3">STT</th>
                        <th scope="col" class="px-4 py-3">Tên người dùng</th>
                        <th scope="col" class="px-4 py-3">Mã giảm giá</th>
                        <th scope="col" class="px-4 py-3">Địa chỉ</th>
                        <th scope="col" class="px-4 py-3">Tổng số tiền</th>
                        <th scope="col" class="px-4 py-3">
                            <span class="sr-only">Hành động</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr class="border-b hover:bg-gray-100">
                            <!-- Tính toán STT dựa trên trang hiện tại -->
                            <td class="px-4 py-2 text-gray-900 whitespace-nowrap">
                                {{ ($orders->currentPage() - 1) * $orders->perPage() + $loop->iteration }}</td>
                            </td>
                            <td class="px-4 py-2 text-gray-900 whitespace-nowrap">{{ $order->user->fullname }}</td>
                            <td class="px-4 py-2 text-gray-900 whitespace-nowrap">
                                @isset($order->promotion->code)
                                    {{ $order->promotion->code }}
                                @else
                                    Không
                                @endisset
                            </td>
                            <td class="px-4 py-2 text-gray-900 whitespace-nowrap">{{ $order->address->detail_address }}</td>
                            <td class="px-4 py-2 text-gray-900 whitespace-nowrap">{{ $order->amount }}</td>
                            <td class="px-4 py-3 flex items-center justify-end">
                                <button id="{{ $order->id }}" data-dropdown-toggle="{{ $order->id }}-dropdown"
                                    class="inline-flex items-center p-0.5 text-sm text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none"
                                    type="button">
                                    @svg('tabler-dots', 'w-5 h-5')
                                </button>
                                <div id="{{ $order->id }}-dropdown"
                                    class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow">
                                    <ul class="py-1 text-sm text-gray-700" aria-labelledby="{{ $order->id }}">
                                        <li>
                                            <a href="#" class="block py-2 px-4 hover:bg-gray-100"
                                                data-modal-target="order-modal-{{ $order->id }}"
                                                data-modal-toggle="order-modal-{{ $order->id }}">Chi tiết </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        {{-- order modal --}}
                        <div id="order-modal-{{ $order->id }}" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                            <div class="relative p-4 w-full max-w-2xl h-auto">
                                <div
                                    class="relative p-4 bg-white rounded-lg shadow sm:p-5 h-[480px] overflow-y-auto no-scrollbar">
                                    <button type="button"
                                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                        data-modal-hide="order-modal-{{ $order->id }}">
                                        @svg('tabler-x', 'w-4 h-4')
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="p-4 md:p-5 text-center">
                                        <h3 class="mb-5 text-2xl font-semibold">Chi tiết hóa đơn</h3>
                                        <div class="space-y-4 text-">
                                            {{-- user_id --}}
                                            <div class="flex justify-between bg-gray-100 p-4 rounded-lg shadow-sm">
                                                <label class="font-semibold">Tên người dùng</label>
                                                <span class="text-gray-800">{{ $order->user->fullname }}</span>
                                            </div>
                                            {{-- mÃ giảm giá --}}
                                            <div class="flex justify-between bg-gray-100 p-4 rounded-lg shadow-sm">
                                                <label class="font-semibold">Mô tả:</label>
                                                <span class="text-gray-800">
                                                    @isset($orders->promotion->code)
                                                        {{ $orders->promotion->code }}
                                                    @else
                                                        Không
                                                    @endisset
                                                </span>
                                            </div>
                                            {{-- Tổng số tiền --}}
                                            <div class="flex justify-between bg-gray-100 p-4 rounded-lg shadow-sm">
                                                <label class="font-semibold">Tổng số tiền</label>
                                                <span class="text-gray-800">{{ $order->amount }}</span>
                                            </div>
                                            {{-- Địa chỉ --}}
                                            <div class="flex justify-between bg-gray-100 p-4 rounded-lg shadow-sm">
                                                <label class="font-semibold">Địa chỉ</label>
                                                <span class="text-gray-800">{{ $order->address->detail_address }}</span>
                                            </div>
                                            {{-- Giá tri giảm giá --}}
                                            <div class="flex justify-between bg-gray-100 p-4 rounded-lg shadow-sm">
                                                <label class="font-semibold">Giá trị giảm giá</label>
                                                <span class="text-gray-800">{{ $order->discount_amount }}</span>
                                            </div>
                                            {{-- phí giao hàng --}}
                                            <div class="flex justify-between bg-gray-100 p-4 rounded-lg shadow-sm">
                                                <label class="font-semibold">Phí giao hàng</label>
                                                <span class="text-gray-800">{{ $order->shipping_fee }}</span>
                                            </div>
                                            {{-- hoàn thành --}}
                                            <div class="flex justify-between bg-gray-100 p-4 rounded-lg shadow-sm">
                                                <label class="font-semibold">Hoàn thành</label>
                                                <span class="text-gray-800">{{ $order->completed_at }}</span>
                                            </div>
                                            {{-- ghi chú --}}
                                            <div class="flex justify-between bg-gray-100 p-4 rounded-lg shadow-sm">
                                                <label class="font-semibold">Ghi chú</label>
                                                <span class="text-gray-800">{{ $order->notes }}</span>
                                            </div>
                                            {{-- hình thức thanh toán --}}
                                            <div class="flex justify-between bg-gray-100 p-4 rounded-lg shadow-sm">
                                                <label class="font-semibold">Hình thức thanh toán</label>
                                                <span class="text-gray-800">{{ $order->paymentMethod->name }}</span>
                                            </div>
                                            {{-- Trạng thái đơn hàng --}}
                                            <div class="flex justify-between bg-gray-100 p-4 rounded-lg shadow-sm">
                                                <label class="font-semibold">Trạng thái đơn hàng </label>
                                                <span class="text-gray-800">{{ $order->orderStatus->name }}</span>
                                            </div>
                                            {{-- Lí do hủy bỏ --}}
                                            <div class="flex justify-between bg-gray-100 p-4 rounded-lg shadow-sm">
                                                <label class="font-semibold">Lí do hủy bỏ</label>
                                                <span class="text-gray-800">
                                                    @isset($order->canceled_reason)
                                                        {{ $order->canceled_reason }}
                                                    @else
                                                    @endisset
                                                </span>
                                            </div>
                                            {{-- Thời gian hủy bỏ --}}
                                            <div class="flex justify-between bg-gray-100 p-4 rounded-lg shadow-sm">
                                                <label class="font-semibold">Thời gian hủy bỏ</label>
                                                <span class="text-gray-800">{{ $order->canceled_at }}</span>
                                            </div>
                                            {{-- Thời gian đặt hàng --}}
                                            <div class="flex justify-between bg-gray-100 p-4 rounded-lg shadow-sm">
                                                <label class="font-semibold">Thời gian đặt hàng</label>
                                                <span class="text-gray-800">{{ $order->created_at }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end order modal --}}
                    @empty
                        <td colspan="6" class="text-center py-4 text-base">
                            <div class="flex flex-col items-center justify-center p-6 rounded-lg bg-white w-full h-80">
                                @svg('tabler-folder-cancel', 'w-20 h-20 text-gray-400')
                                <p class="mt-4 text-gray-500 text-sm">Dữ liệu trống</p>
                            </div>
                        </td>
                    @endforelse
                </tbody>
            </table>
            <div class="p-4">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
@endsection
