<div class="p-4 ">
    <!-- Items per page selection -->
    <h4 class="text-xl font-bold text-center mb-4">Opportunities</h4>
    <div class="mb-4 flex gap-4">
        <div>
            <label for="perPage" class="block text-sm font-medium text-gray-700 mb-2 ">Items per page:</label>
            <select wire:model.live="perPage" id="perPage"
                class="block mt-1 border rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-[100px] px-4 py-2">
                @foreach($options as $option)
                    <option value="{{ $option }}">{{ $option }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="perPage" class="block text-sm font-medium text-gray-700 mb-2 ">Search an item:</label>
            <div class="flex gap-2">
                <input type="text" placeholder="Item 1" id="search" wire:model.live.defer="search"
                    class="block border rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-[300px] px-4 py-2">
            </div>
        </div>
        <div>
            <label for="sort" class="block text-sm font-medium text-gray-700 mb-2">Sort by:</label>
            <select wire:model.live="sortField" id="sortField"
                class="block mt-1 border rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-[150px] px-4 py-2">
                <option value="name">Name</option>
                <option value="created_at">Date Created</option>
                <!-- Add more fields as needed -->
            </select>
        </div>
        <div>
            <label for="sort" class="block text-sm font-medium text-gray-700 mb-2">Order:</label>
            <select wire:model.live="sortDirection" id="sortDirection"
                class="block mt-1 border rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-[178px] px-4 py-2">
                <option value="asc">Ascending (A-Z)</option>
                <option value="desc">Descending (Z-A)</option>
                <!-- Add more fields as needed -->
            </select>
        </div>
    </div>
    <!-- Items list -->
    <div class="space-y-2 overflow-auto h-[300px]">
        @foreach($items as $item)
            <div class="p-4 bg-white shadow rounded-lg">{{ $item->name }}</div>
        @endforeach
    </div>
    <!-- Pagination links -->
    <div class="mt-4">
        {{ $items->links() }}
    </div>
</div>