@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="flex justify-center">
        <div class="w-8/12">
            <div class="bg-white p-8 rounded shadow-md">
                <div class="text-xl font-bold mb-4">{{ __('Verify Your Email Address') }}</div>

                <div class="mb-4">
                    @if (session('resent'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                </div>

                <form class="inline-block" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="text-blue-500 hover:underline focus:outline-none">
                        {{ __('click here to request another') }}
                    </button>.
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
