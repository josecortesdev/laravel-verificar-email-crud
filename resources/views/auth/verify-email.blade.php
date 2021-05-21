<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
             
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Gracias por iniciar sesión. Antes de empezar, ¿puedes verificar tu cuenta de correo pulsando en el enlace que te hemos enviado? Si no has recibido el correo, te podemos enviar otro.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('Un nuevo enlace de verificación ha sido enviado al correo que has proporcionado en el registro.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button>
                        {{ __('Reenviar el correo de verificación') }}
                    </x-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Cerrar sesión') }}
                </button>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
