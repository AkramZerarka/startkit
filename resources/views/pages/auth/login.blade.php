@section('title', trans('Sign in to your account'))

<div>
    <div class="sm:mx-auto sm:w-full sm:max-w-xl">
        <a href="{{ route('welcome') }}">
            <x-atoms::logo class="w-auto h-24 mx-auto text-primary-600" />
        </a>

        <h2 class="mt-6 text-2xl font-bold leading-9 text-center text-gray-900">
            {{ __('Sign in to your account') }}
        </h2>
        @if (Route::has('register'))
            <p class="mt-2 text-sm leading-5 text-center text-gray-900 max-w">
                {{ __('Or') }}
                <a href="{{ route('register') }}"
                    class="font-normal transition duration-150 ease-in-out text-primary-600 hover:text-primary-500 focus:outline-none focus:underline">
                    {{ __('create a new account') }}
                </a>
            </p>
        @endif
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <x-card class="border-0">
            <form wire:submit.prevent="authenticate" class="p-4 space-y-4">
                <div>
                    <x-input label="{{ __('Email') }}" wire:model.defer="state.email" id="email" />
                </div>

                <div>
                    <x-inputs.password label="{{ __('Password') }}" wire:model.defer="state.password" id="password"
                        type="password" />
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <x-checkbox id="remember" label="{{ __('Remember') }}" wire:model.defer="state.remember" />
                    </div>

                    <div class="text-sm leading-5">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                                class="font-normal transition duration-150 ease-in-out text-primary-600 hover:text-primary-500 focus:outline-none focus:underline">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>
                </div>

                <div>
                    <x-button type="submit" label="{{ __('Login') }}" primary spinner
                        class="block w-full rounded-lg" />
                </div>
            </form>
        </x-card>
    </div>
</div>
