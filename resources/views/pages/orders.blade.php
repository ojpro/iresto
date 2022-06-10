<x-dashboard-layout>
    <div class="flex justify-between items-center">

        <h3 class="text-gray-700 text-3xl font-medium">Orders</h3>

    </div>
    <div class="mt-8">
        <!-- component -->
        <div class="overflow-x-auto">
            <div class="w-full shadow-md">
                <div class="bg-white shadow-md rounded">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                        <tr class="bg-gray-300 text-gray-600 uppercase text-sm leading-normal rounded">
                            <th class="py-3 px-6 text-left">#ID</th>
                            <th class="py-3 px-6 text-left">Plate ID</th>
                            <th class="py-3 px-6 text-center">Quantity</th>
                            <th class="py-3 px-6 text-center">Client</th>
                            <th class="py-3 px-6 text-center">Actions</th>
                        </tr>
                        </thead>
                        {{-- TODO: needs more improvement --}}
                        <tbody class="text-gray-600 text-sm font-light">
                        @foreach($orders as $order)

                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{ $order->id }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="">

                                        <a href="{{ route('plates.edit',$order->plate_id) }}" class="text-blue-400 flex items-center">
                                            <img class="w-8 h-8 overflow-hidden mr-2"
                                                 src="/{{  \App\Models\Plate::where('id',$order->plate_id)->first()->thumbnail() }}"
                                                 alt="">
                                            {{ \App\Models\Plate::where('id',$order->plate_id)->first()->name }}</a>
                                    </div>
                                </td>
                                <td class="text-center">
                                    {{ $order->quantity }}
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">
                                        {{ $client = \App\Models\Client::where('id',\App\Models\OrderDetail::where('id',$order->order_details_id)->get()[0]->client_id)->first()->first_name }}
                                    </span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <a href="">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                     stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                                </svg>
                                            </a>
                                        </div>
                                        <form action="{{ route('orders.destroy',$order->order_details_id) }}"
                                              method="post"
                                              class="w-4 mr-2 transform hover:text-red-500 hover:scale-110">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="w-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                     stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-2">

                {{ $orders->links() }}
            </div>
        </div>
    </div>
</x-dashboard-layout>