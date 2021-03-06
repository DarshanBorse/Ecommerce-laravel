<x-app-layout>
    <div class="bg-gray-100">
        <div class="w-11/12  mx-auto">
            <div class="flex flex-row ">
                <div class="mt-8 mx-6 w-6/12 my-6">
                    <div class="flow-root">
                        @foreach ($cart as $product)
                            @if ($session == $product->session or $product->user_id == $user)
                                <ul role="list" class="-my-6 divide-y divide-gray-200">
                                    <li class="py-6 flex">
                                        <div
                                            class="flex-shrink-0 w-24 h-28 border border-gray-200 rounded-md overflow-hidden">
                                            <img src="{{ Storage::disk('public')->url($product->product->thumbnail) }}"
                                                alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt."
                                                class="w-full h-full object-center object-cover">
                                        </div>
                                        <div class="ml-4 flex-1 flex flex-col">
                                            <div>
                                                <div class="flex justify-between text-base font-medium text-gray-900">
                                                    <h3>
                                                        <a href="#">
                                                            {{ $product->product->product }}
                                                        </a>
                                                    </h3>
                                                    <p class="ml-4 text-lg">
                                                        ₹{{ number_format(($product->product->price - $product->product->discount) * $product->qty) }}
                                                    </p>
                                                </div>
                                                <div class="flex flex-1 text-base  font-medium text-gray-900">
                                                    <p class="mt-1 mb-3 text-sm text-gray-500">
                                                        Color : {{ $product->product->color->color }}
                                                    </p>
                                                    <div class="ml-auto">
                                                        <del class="ml-4 text-slate-400 text-left">
                                                            ₹{{ number_format($product->product->discount * $product->qty) }}
                                                        </del>
                                                    </div>
                                                    <p class="ml-4 text-green-600">
                                                        {{ number_format(($product->product->discount / $product->product->price) * 100) }}%
                                                        off
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="flex-1 flex items-end justify-between text-sm">
                                                <div class="flex">
                                                    @if ($product->product->stock != 0)
                                                    <form action="{{ route('cart.update', $product->id) }}"
                                                        method="post" id="pro">
                                                        @csrf
                                                        @method("PUT")
                                                        <input type="number" name="quantity" id="quantity"
                                                            value="{{ $product->qty }}" min="1"
                                                            max="{{ $product->product->stock }}"
                                                            class="w-20 h-9 rounded cursor-default da-num "
                                                            onchange="this.form.submit();" onkeydown="return false">
                                                    </form>
                                                    @else
                                                        <h3 class="text-red-500 font-semibold">Out of stock</h3>
                                                    @endif
                                                </div>
                                                <div class="flex">
                                                    <form action="{{ route('cart.destroy', $product->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method("DELETE")
                                                        <input type="submit" value="Remove"
                                                            class="font-medium text-indigo-600 hover:text-indigo-500 cursor-pointer">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            @endif
                        @endforeach

                        @if ($key != 0)
                            @if ($zero != 0)
                                <div class="mt-3 flex">
                                    <a type="button" href="{{ route('user.create') }}"
                                        class="text-white ml-auto bg-gray-800 hover:bg-gray-900 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-800 dark:border-gray-700">Checkout
                                        & Place Order</a>
                                </div>
                            @endif
                        @endif

                    </div>
                </div>

                {{-- Left Side bar --}}
                @if ($key != 0)
                    <div class="bg-white shadow overflow-hidden sm:rounded-lg w-4/12 my-5 mx-auto">
                        <div class="px-4 py-5 sm:px-6">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                {{ __('Price Details') }}
                            </h3>
                        </div>
                        <div class="border-t border-gray-200">
                            <dl>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        {{ __('Price') }} ({{ $key }} {{ __('Item') }})
                                    </dt>
                                    <dd class="mt-1 text-center text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        ₹{{ number_format($total) }}
                                    </dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        {{ __('Discount') }}
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 text-center">
                                        ₹{{ number_format($discount) }}
                                    </dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        {{ __('Delivery Charge') }}
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 text-center">
                                        Free
                                    </dd>
                                </div>
                                <hr>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm  font-bold text-black">
                                        {{ __('Total amount') }}
                                    </dt>
                                    <dd class="mt-1 text-sm  sm:mt-0 sm:col-span-2 text-center font-bold text-black">
                                        ₹{{ number_format($total) }}
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
    @if ($key == 0)
        <div class="text-center font-bold text-blue-900">
            Your cart has been empty
        </div>
    @endif
</x-app-layout>
