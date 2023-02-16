@section('title', 'Create a new account')


<div>
    <div class="sm:mx-auto sm:w-full sm:max-w-xl">
        <a href="{{ route('welcome') }}">
            <x-atoms::logo class="w-auto h-24 mx-auto text-primary-600" />
        </a>

        <h2 class="mt-6 text-2xl font-bold leading-9 text-center text-gray-900">
            {{ __('Reset your password') }}
        </h2>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <x-card class="border-0" rounded="rounded-xl">
            <form wire:submit.prevent="register" class="p-4 space-y-4">

                <input wire:model="token" type="hidden">
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
