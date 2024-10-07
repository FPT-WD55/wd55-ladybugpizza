@extends('layouts.admin')
@section('content')
    <div class="mt-5 bg-white relative shadow sm:rounded-lg overflow-hidden">


        <div class="flex flex-col md:flex-row items-center justify-end space-y-3 md:space-y-0 md:space-x-4 px-4">

            <div
                class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">

                <div class="flex items-center space-x-3 w-full md:w-auto">

                    <a href="{{ route('admin.categories.index') }}">
                        <button type="button" class="rounded-lg button-blue">Trở Lại</button>
                    </a>

                </div>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-4 py-3">STT</th>
                        <th scope="col" class="px-4 py-3">Ảnh banner</th>
                        <th scope="col" class="px-4 py-3">Local page</th>
                        <th scope="col" class="px-4 py-3">Trạng thái</th>
                        <th scope="col" class="px-4 py-3 ">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- item Category --}}

                   
                        <tr class="border-b">
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap ">
                             
                            </th>
                            <td class="px-4 py-3"></td>
                            <td class="px-4 py-3"></td>

                            <td class="px-4 py-3">
                                
                            </td>
                            <td class="pt-4 py-3 px-4 flex items-center mt-0 ">
                                <a href="#" data-modal-target="restore-modal-"
                                    data-modal-toggle="restore-modal-"
                                    class="cursor-pointer block px-1 text-sm  text-gray-500 hover:text-green-500 "
                                    title="Restore">

                                    @svg('tabler-restore')
                                </a>


                                <a href="#" data-modal-target="delete-modal-"
                                    data-modal-toggle="delete-modal-"
                                    class="cursor-pointer block px-1 text-sm  text-gray-500 hover:text-red-500 "
                                    title="Delete">
                                    @svg('tabler-trash-x-filled')
                                </a>


                            </td>
                        </tr>
                       
                      
                  
                </tbody>
            </table>
            <div class="p-4">
               
            </div>
        </div>
    </div>
@endsection