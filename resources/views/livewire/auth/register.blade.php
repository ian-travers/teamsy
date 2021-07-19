@section('title', 'Create a new account')

<div>
    <div class="min-h-screen bg-white flex">
        <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
            <div class="mx-auto w-full max-w-sm lg:w-96">
                <div>
                    <img class="h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
                         alt="Workflow">
                    <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                        Start your free trial
                    </h2>
                </div>

                <div class="mt-8">
                    <div class="mt-6">
                        <form wire:submit.prevent="register" class="space-y-6">
                            <x-text-input
                                wire:model.debounce.100ms="name"
                                label="Name"
                                required="true"
                                placeholder="Ian"
                            />

                            <x-text-input
                                wire:model.debounce.100ms="companyName"
                                label="Company Name"
                                required="true"
                                placeholder="My Company"
                            />

                            <x-text-input
                                wire:model.debounce.100ms="email"
                                label="Email"
                                type="email"
                                required="true"
                                placeholder="email@example.net"
                            />

                            <x-text-input
                                wire:model.debounce.100ms="password"
                                label="Password"
                                type="password"
                                required="true"
                            />

                            <div>
                                <button type="submit"
                                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Register
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden lg:block relative w-0 flex-1">
            <img class="absolute inset-0 h-full w-full object-cover"
                 src="https://images.unsplash.com/photo-1505904267569-f02eaeb45a4c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1908&q=80"
                 alt="">
        </div>
    </div>
</div>
