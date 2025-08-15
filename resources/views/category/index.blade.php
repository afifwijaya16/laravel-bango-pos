<x-app-layout>
    <div class="bg-white shadow-md m-5">
        <div class="px-6 py-1 bg-orange-400 flex items-center">
            <div class="font-bold text-xl text-white">Category</div>
        </div>
        <div class="px-6 py-4">
            <div class="flex justify-end">
                <button id="button_modalAdd"
                    class="flex items-center px-4 mb-2 py-2 text-sm font-medium bg-blue-500 text-white hover:bg-blue-600 rounded-md ">
                    <i class="fa fa-plus"></i> <span> Tambah Data</span>
                </button>
            </div>
            <table id="example" class="my-table">
                <thead class="bg-white text-gray-700 font-semibold">
                    <tr>
                        <th width="5%" class="border border-gray-300 p-2 bg-white text-black text-center">No</th>
                        <th class="border border-gray-300 p-2 bg-white text-black">Category</th>
                        <th width="10%" class="border border-gray-300 p-2 bg-white text-black text-center">Action
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white text-gray-800">
                    @foreach ($category as $key)
                        <tr class="border-t border-gray-200 bg-white">
                            <td class="border border-gray-300 p-2 bg-white text-black text-center">
                                {{ $loop->iteration }}</td>
                            <td class="border border-gray-300 p-2 bg-white text-black">{{ $key->name }}</td>
                            <td class="border border-gray-300 p-2 bg-white text-black text-center">
                                <div class="relative inline-block text-left">
                                    <details class="dropdown">
                                        <summary
                                            class="btn btn-xs btn-secondary dropdown-toggle flex items-center justify-center w-8 h-8 bg-orange-400 text-white rounded cursor-pointer">
                                            <i class="fa fa-list"></i>
                                        </summary>
                                        <div class="dropdown-menu absolute right-0 mt-1 w-40 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 z-10"
                                            style="min-width: max-content;">
                                            <a href="javascript:;" title="Perbarui Data"
                                                onclick="editFunctionData({{ $key->id }})"
                                                class="dropdown-item w-full flex items-center px-3 py-2 text-gray-700 hover:bg-gray-200 space-x-2">
                                                <i class="fa fa-edit text-yellow-500"></i>
                                                <span>Perbarui</span>
                                            </a>
                                            <form id="form-delete-{{ $key->id }}"
                                                action="{{ route('category.destroy', $key->id) }}" method="POST"
                                                onsubmit="return deleteFunction({{ $key->id }}, event)">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" title="Hapus Data"
                                                    class="dropdown-item w-full flex items-center px-3 py-2 text-gray-700 hover:bg-gray-200 space-x-2">
                                                    <i class="fa fa-trash text-red-500"></i>
                                                    <span>Hapus</span>
                                                </button>
                                            </form>
                                        </div>
                                    </details>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div id="place-modal"></div>
    @include('category/javascript')
</x-app-layout>
