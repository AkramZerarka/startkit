@section('title', 'Create a new account')


<div>
    <div class="sm:mx-auto sm:w-full sm:max-w-xl">
        <a href="{{ route('welcome') }}">
            <x-atoms::logo class="w-auto h-24 mx-auto text-primary-600" />
        </a>

        <h2 class="mt-6 text-3xl font-extrabold leading-9 text-center text-zinc-900">
            {{ __('Create a new account') }}
        </h2>
        @if (Route::has('login'))
            <p class="mt-2 text-sm leading-5 text-center text-zinc-900 max-w">
                {{ __('Or') }}
                <a href="{{ route('login') }}"
                    class="font-normal transition duration-150 ease-in-out text-primary-600 hover:text-primary-500 focus:outline-none focus:underline">
                    {{ __('sign in to your account') }}
                </a>
            </p>
        @endif
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <x-card class="border-0" rounded="rounded-xl">
            <form wire:submit.prevent="register" class="p-4 space-y-4">

                <div>
                    <x-input label="{{ __('Name') }}" wire:model.defer="state.name" />
                </div>

                <div>
                    <x-input wire:model.defer="state.email" class="pr-28" label="{{ __('Email') }}"
                        suffix="@mail.com" />
                </div>

                <div>
                    <x-inputs.password label="{{ __('Password') }}" wire:model.defer="state.password" id="password"
                        type="password" />
                </div>

                <div>
                    <x-inputs.password label="{{ __('Confirm Password') }}"
                        wire:model.defer="state.passwordConfirmation" id="password_confirmation" type="password" />
                </div>
                <div>
                    <x-button spinner type="submit" label="{{ __('Register') }}" primary
                        class="block w-full rounded-lg" />
                </div>
            </form>
        </x-card>
    </div>
</div>
