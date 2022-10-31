<div>

    {{-- header --}}
    <form action="#" method="GET" class="lg:block">
        <div class="mt-2 relative flex lg:w-full gap-2 justify-between items-center">
    
            <div class="flex gap-2 w-1/2">
                  
                <select id="shift" wire:model.debounce.100ms = "type"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/2 p-2"
                    >
                    <option selected value="1">Admin</option>
                    <option value="2">Teacher</option>
                    <option value="3">User</option>
                </select>
    
            </div>
          
            
            <a class="hover:bg-gray-400 cursor-pointer text-sm px-4 py-2 rounded bg-indigo-600 text-white">Add New</a>
        </div>
        <div class="mt-2 relative lg:w-64">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <input wire:model.debounce.300ms="search" type="text" name="email" id="topbar-search"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                placeholder="Search Student">
        </div>
    </form>
    
    {{-- table --}}
    
    <div class=" my-6 rounded-lg border z-10 overflow-hidden">
        <table class="min-w-max w-full table-auto">
            <thead>
                <tr class="bg-gray-200 overflow-hidden text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Name</th>
                    <th class="py-3 px-6 text-left">Email</th>
                    <th class="py-3 px-6 text-left">Role</th>
                    <th class="py-3 px-6 text-left">Created at</th>
                    <th class="py-3 px-6 text-left">Updated at</th>
                    <th class="py-3 px-6 text-left">Action</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach ($users as $user)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="font-medium">{{ $user->name }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center">
                                <span class="font-medium ">{{ $user->email }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center">
                                <span class="font-medium ">{{ $user->usertype->type->name }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center">
                                <span class="font-medium">{{ $user->created_at }} <strong>({{ $user->created_at->diffForHumans() }})</strong</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center">
                                <span class="font-medium ">{{ $user->updated_at }} <strong>({{ $user->updated_at->diffForHumans() }})</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.users.show', $user) }}" class="bg-blue-400 px-4 py-1 text-white cursor-pointer font-medium ">View</a>
                                <a href="{{ route('admin.users.edit', $user) }}" class="bg-indigo-800 px-4 py-1 text-white cursor-pointer font-medium ">Edit</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    
    
    </div>
    
    </div>