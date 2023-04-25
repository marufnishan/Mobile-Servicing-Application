<div>
    <!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                @if(Auth::user()->utype === 'Admin')
                <a href="{{ route('allusers') }}"><button class="btn btn-success">All Users</button></a>
                @endif
            </h2>
        </x-slot>       
        

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" style="padding: 10px">
                    @if ($message = Session::get('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="btn-close pe-5" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <form  wire:submit.prevent="update" enctype="multipart/form-data">                       
                        
                        <div>
                            <x-jet-label for="customer_name" class="block mt-2 w-full" value="{{ __('Customer Name') }}" />
                            <x-jet-input id="customer_name" class="block mt-1 w-full" type="text" name="customer_name" :value="old('customer_name')" required autofocus autocomplete="customer_name" wire:model="customer_name" />
                        </div>
                        <div>
                            <x-jet-label for="problem" class="block mt-2 w-full" value="{{ __('Problem') }}" />
                            <x-jet-input id="problem" class="block mt-1 w-full" type="text" name="problem" :value="old('problem')" required autofocus autocomplete="problem" wire:model="problem" />
                        </div>

                        <div>
                            <x-jet-label for="phone" class="block mt-2 w-full" value="{{ __('Phone Number') }}" />
                            <x-jet-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" wire:model="phone" />
                        </div>
    
                        <div>
                            <x-jet-label for="imei" class="block mt-2 w-full" value="{{ __('Imei Number') }}" />
                            <x-jet-input id="imei" class="block mt-1 w-full" type="text" name="imei" :value="old('imei')" required autofocus autocomplete="imei" wire:model="imei" />
                        </div>
    
                        <div>
                            <x-jet-label for="new_image" class="block mt-2 w-full" value="{{ __('Image') }}" />
                            <x-jet-input id="new_image" class="block mt-2 p-3 w-full" type="file" name="new_image" wire:model="new_image" />
                        </div>
                        
                        <div>
                            <x-jet-label for="service_charge" class="block mt-2 w-full" value="{{ __('Service Charge') }}" />
                            <x-jet-input id="service_charge" class="block mt-1 w-full" type="text" name="service_charge" :value="old('service_charge')" required autofocus autocomplete="service_charge" wire:model="service_charge" />
                        </div>
            
                        <div class="flex items-center justify-end mt-4">
                            <x-jet-button class="ml-4">
                                {{ __('Update') }}
                            </x-jet-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>
</html>

</div>