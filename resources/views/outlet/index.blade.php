<x-app-layout>
    <div class="bg-white shadow-md m-5 rounded-lg">
        <div class="px-6 py-1 bg-emerald-600 flex items-center rounded-t-lg">
            <div class="font-bold text-xl text-white py-1">Outlet</div>
        </div>
        <div class="px-6 py-4">
            <div class="flex justify-end">
                <button id="button_modalAdd"
                    class="flex items-center px-4 mb-2 py-2 text-sm font-medium bg-emerald-600 text-white hover:bg-emerald-700 rounded-md ">
                    <i class="fa fa-plus"></i> <span> Tambah Data</span>
                </button>
            </div>
            <table id="myTable" class="w-full border-collapse">
                <thead>
                    <tr>
                        <th class="border-b-2 p-4">No</th>
                        <th class="border-b-2 p-4">Outlet</th>
                        <th class="border-b-2 p-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($outlet as $key)
                        <tr>
                            <td class="border-b p-4">{{ $loop->iteration }}</td>
                            <td class="border-b p-4">{{ $key->name }}</td>
                            <td class="border-b p-4 text-center">
                                <div class="relative inline-block text-left">
                                    <details class="dropdown">
                                        <summary
                                            class="btn btn-xs btn-secondary dropdown-toggle flex items-center justify-center w-8 h-8 bg-emerald-600 hover:bg-emerald-700 text-white rounded cursor-pointer">
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
                                                action="{{ route('outlet.destroy', $key->id) }}" method="POST"
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
    @include('outlet/javascript')
</x-app-layout>
