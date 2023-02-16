@section('title', 'Reset password')

<div>
    <div class="sm:mx-auto sm:w-full sm:max-w-xl">
        <a href="{{ route('welcome') }}">
            <x-atoms::logo class="w-auto h-16 mx-auto text-primary-600" />
        </a>

        <h2 class="mt-6 text-2xl font-bold leading-9 text-center text-gray-900">
            {{ __('Reset Password') }}
        </h2>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <x-card class="border-0">
            @if ($emailSentMessage)
                <div class="p-4 rounded-md bg-green-50">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>

                        <div class="ml-3">
                            <p class="text-sm font-medium leading-5 text-green-800">
                                {{ $emailSentMessage }}
                            </p>
                        </div>
                    </div>
                </div>
            @else
                <form wire:submit.prevent="sendResetPasswordLink">
                    <div>
                        <x-input label="{{ __('Email') }}" wire:model.lazy="email" id="email" type="email" />
                    </div>

                    <div class="mt-6">
                        <span class="block w-full rounded-md shadow-sm">
                            <x-button spinner type="submit" label="{{ __('Send password reset link') }}" primary
                                class="block w-full rounded-lg" />
                        </span>
                    </div>
                </form>
            @endif
        </x-card>
    </div>
</div>
