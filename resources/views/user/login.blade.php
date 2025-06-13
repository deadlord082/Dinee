<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <title>Login</title>
        @vite('resources/css/app.css')
    </head>
    <body>
        <form method="POST" action="/authenticate">
        @csrf
        <div class="flex min-h-full flex-col justify-center px-6 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                 <x-logo class=" h-100 w-100" />
            </div>

            <div class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm -translate-y-15">
              <h2 class="text-center text-2xl/9 font-bold tracking-tight text-gray-900">Connectez-vous à votre compte</h2>
              <form class="space-y-6" action="#" method="POST">
                <div>
                    <label for="email" class="block text-sm/6 font-medium text-gray-900">Addresse email</label>
                    <div class="mt-2">
                    <input type="email" name="email" value="test@example.com" id="email" autocomplete="email" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm/6 font-medium text-gray-900">mot de passe</label>
                    <div class="text-sm">
                        <a href="#" class="font-semibold text-dinee hover:text-dinee-secondary">Mot de passe oublié?</a>
                    </div>
                    </div>
                    <div class="mt-2">
                    <input type="password" name="password" value="12345678" id="password" autocomplete="current-password" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    </div>
                </div>
                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-dinee px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-dinee-secondary focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Se connecter</button>
                </div>
                </form>

                <p class="mt-10 text-center text-sm/6 text-gray-500">
                Vous n'avez pas de compte ?
                <a href="{{ route('register') }}" class="font-semibold text-dinee hover:text-dinee-secondary">Créer un compte</a>
            </p>
        </div>
    </div>
</form>


    </body>
</html>
