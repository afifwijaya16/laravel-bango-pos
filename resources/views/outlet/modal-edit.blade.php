<div id="modal-edit" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow-lg max-w-md w-full max-h-[calc(100vh-5rem)] overflow-y-auto">
        <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200">
            <h5 class="text-lg font-semibold flex items-center gap-2">
                <i class="fa fa-edit"></i> Edit Outlet
            </h5>
            <button type="button" class="text-gray-400 hover:text-gray-600" aria-label="Close"
                onclick="closeModal('modal-edit')">
                <span aria-hidden="true" class="text-2xl">&times;</span>
            </button>
        </div>

        <form action="{{ route('outlet.update', $data->id) }}" method="POST" class="px-4 py-4">
            @csrf
            @method('patch')
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Outlet Name</label>
                    <input type="text" name="name" required placeholder="Entry Outlet Name"
                        value="{{ $data->name }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-sm text-sm focus:outline-none focus:ring-2 focus:ring-green-500" />
                </div>
            </div>

            <div class="flex justify-end gap-2 mt-6 border-t border-gray-200 pt-3">
                <button type="submit"
                    class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-white bg-green-600 rounded hover:bg-green-700">
                    <i class="fa fa-save"></i> Save
                </button>
                <button type="button"
                    class="px-4 py-2 text-sm font-semibold text-gray-700 bg-gray-200 rounded hover:bg-gray-300"
                    onclick="closeModal('modal-edit')">
                    Close
                </button>
            </div>
        </form>
    </div>
</div>
