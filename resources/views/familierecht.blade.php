<x-layout>
    <x-slot:heading>
        Familierecht
    </x-slot:heading>
    <head>

    <div class="container mx-auto py-6">
        <!-- Header Section -->
        <h2 class="text-2xl font-bold">Familierecht</h2>
        <p class="mt-4 text-gray-600">Hulp bij verkeersovertredingen en verkeersgerelateerde juridische problemen.</p>
        <img src="/images/familierecht.jpeg" alt="familierecht" class="w-full mt-6 rounded-lg">

        @if ($errors->has('g-recaptcha-response'))
            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
        @endif
        <!-- Form Section -->

        <form action="{{ route('submit_casus') }}" method="post" enctype="multipart/form-data" class="box p-6 mt-8 border rounded-lg shadow-lg">
            @csrf
            <div class="content">
                <h2 class="text-xl font-semibold mb-4">Leg het ons uit!</h2>

                <div class="mb-4">
                    <label for="naam" class="block text-gray-700">Naam:</label>
                    <input type="text" id="naam" name="naam" required class="input-field border rounded w-full py-2 px-3 mt-1">
                </div>

                <div class="mb-4">
                    <label for="voornaam" class="block text-gray-700">Voornaam:</label>
                    <input type="text" id="voornaam" name="voornaam" required class="input-field border rounded w-full py-2 px-3 mt-1">
                </div>

                <div class="mb-4">
                    <label for="username" class="block text-gray-700">Gebruikersnaam:</label>
                    <input type="text" id="username" name="username" required class="input-field border rounded w-full py-2 px-3 mt-1">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700">E-mailadres:</label>
                    <input type="email" id="email" name="email" required class="input-field border rounded w-full py-2 px-3 mt-1">
                </div>

                <div class="mb-4">
                    <label for="beschrijving" class="block text-gray-700">Beschrijving van de casus:</label>
                    <textarea id="beschrijving" name="beschrijving" required class="input-field border rounded w-full py-2 px-3 mt-1" rows="8" style="min-height: 150px;"></textarea>
                </div>

                <div class="mb-4">
                    <label for="bijlage" class="block text-gray-700">Bijlage toevoegen:</label>
                    <input type="file" id="bijlage" name="bijlage" class="input-field border rounded w-full py-2 px-3 mt-1">
                </div>
                <input type="hidden" name="type" value="familierecht">

                <button type="submit" class="submit-button bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Verzenden</button>
            </div>
        </form>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script type="text/javascript">
            function callbackThen(response) {
                // read Promise object
                response.json().then(function(data) {
                    console.log(data);
                    if(data.success && data.score > 0.5) {
                        console.log('valid recpatcha');
                    } else {
                        document.getElementById('registerForm').addEventListener('submit', function(event) {
                            event.preventDefault();
                            alert('recpatcha error');
                        });
                    }
                });
            }

            function callbackCatch(error){
                console.error('Error:', error)
            }
        </script>

        {!! htmlScriptTagJsApi([
            'callback_then' => 'callbackThen',
            'callback_catch' => 'callbackCatch',
        ]) !!}

    </div>
    </head>
</x-layout>
