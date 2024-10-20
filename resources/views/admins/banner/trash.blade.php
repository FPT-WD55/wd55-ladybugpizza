@extends('layouts.admin')
@section('title', 'Banner | Thùng rác')
@section('content')
    {{ Breadcrumbs::render('admin.trash.listBanner') }}
    <div class="mt-5 bg-white relative shadow sm:rounded-lg overflow-hidden">
        <div
            class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
            <div class="flex items-center flex-1 space-x-4">
                <h2 class="font-medium text-gray-700 text-base">
                    Thùng rác
                </h2>
            </div>
            <div
                class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end md:space-y-0 md:space-x-3">
                <a href="{{ route('admin.banners.index') }}">
                    <button type="button" class="rounded-lg button-blue">Trở Lại</button>
                </a>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-3">
            @forelse ($deleteBanner as $item)
                {{-- star item --}}
                <div class="card h-auto">
                    <ul
                        class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
                        <li class="">
                            @if ($item->is_local_page == 1)
                                <span
                                    class="text-xs inline-block p-2 border border-gray-300 text-blue-600 rounded-ss-lg bg-blue-100 ">
                                    Trang cục bộ
                                </span>
                            @else
                                <span
                                    class="text-xs inline-block p-2 text-red-600 border border-gray-300 rounded-ss-lg bg-red-100 ">
                                    trang bên ngoài
                                </span>
                            @endif
                        </li>
                        <li class="">
                            @if ($item->status == 1)
                                <span class="text-xs inline-block p-2 border border-gray-300 text-green-600  bg-green-100 ">
                                    Hoạt động
                                </span>
                            @else
                                <span class="text-xs inline-block p-2 border border-gray-300 text-red-600  bg-red-100 ">
                                    Khóa
                                </span>
                            @endif
                        </li>
                    </ul>
                    <div class="h-auto">
                        <div class="grid grid-cols-2 ">
                            <div class="overflow-hidden">
                                <a class="shrink-0" data-fslightbox="gallery" href="{{ asset('storage/uploads/banners/' . $item->image) }}">
                                    <img loading="lazy" src="{{ asset('storage/uploads/banners/' . $item->image) }}"
                                        class="md:w-52 md:h-20 lg:w-80 lg:h-[170px] rounded-b-lg object-cover hover:scale-125 transition">
                                </a>
                            </div>
                            <div class="m-1">
                                <div class="">
                                    <span
                                        class="md:text-sm break-all badge-default hover:underline hover:text-blue-500 hover:scale-105 hover:bg-gray-100 transition">{{ $item->url }}
                                    </span>
                                </div>
                                <div class="flex float-right mt-11 mr-2">
                                    <a href="#" data-modal-target="restore-modal-{{ $item->id }}"
                                        data-modal-toggle="restore-modal-{{ $item->id }}"
                                        class="cursor-pointer block px-1 text-sm  text-gray-500 hover:text-green-500 "
                                        title="Restore">

                                        @svg('tabler-restore', 'w-7 h-7')
                                    </a>


                                    <a href="#" data-modal-target="delete-modal-{{ $item->id }}"
                                        data-modal-toggle="delete-modal-{{ $item->id }}"
                                        class="cursor-pointer block px-1 text-sm  text-gray-500 hover:text-red-500 "
                                        title="Delete">
                                        @svg('tabler-trash-x-filled', 'w-7 h-7 text-red-500')
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- start modal restore --}}
                <div id="restore-modal-{{ $item->id }}" tabindex="-1"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow">
                            <button type="button"
                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                data-modal-hide="restore-modal-{{ $item->id }}">
                                @svg('tabler-x', 'w-4 h-4')
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="p-4 md:p-5 text-center">
                                <div class="flex justify-center">
                                    @svg('tabler-arrow-back-up-double', 'w-12 h-12 text-green-600 text-center mb-2 ')
                                </div>
                                <h3 class="mb-5 font-normal">Bạn có muốn khôi phục Banner này không?</h3>
                                <div class=" flex justify-center ">

                                    <form action="{{ route('admin.trash.bannerRestore', $item->id) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                            Có
                                        </button>
                                    </form>

                                    <button data-modal-hide="restore-modal-{{ $item->id }}" type="button"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-0">Không,
                                        trở lại</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end modal restore --}}
                {{-- start modal delete --}}
                <div id="delete-modal-{{ $item->id }}" tabindex="-1"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow">
                            <button type="button"
                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                data-modal-hide="delete-modal-{{ $item->id }}">
                                @svg('tabler-x', 'w-4 h-4')
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="p-4 md:p-5 text-center">
                                <div class="flex justify-center">
                                    @svg('tabler-trash', 'w-12 h-12 text-red-600 text-center mb-2')
                                </div>
                                <h3 class="mb-5 font-normal">Bạn có muốn xóa vĩnh viễn Banner này không?</h3>
                                <div class=" flex justify-center">

                                    <form action="{{ route('admin.trash.bannerDelete', $item->id) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-0 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                            Xóa
                                        </button>
                                    </form>
                                    <button data-modal-hide="delete-modal-{{ $item->id }}" type="button"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-0">Không,
                                        trở lại</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end modal delete --}}
                {{-- end item --}}
            @empty
                <div class="col-span-2 flex flex-col  items-center justify-center  p-6 rounded-lg bg-white w-full h-96">
                    @svg('tabler-folder-cancel', 'w-20 h-20 text-gray-400')
                    <p class="mt-4 text-gray-500 text-sm">Dữ liệu trống</p>
                </div>
            @endforelse
        </div>
        <div class="p-4">
            {{ $deleteBanner->onEachSide(1)->links() }}
        </div>
    </div>
@endsection
