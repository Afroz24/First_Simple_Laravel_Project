<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body>

    @if(Auth::user())
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
        </a>

        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>
    @endif


    {{--
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
        </a>

        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li> --}}




    <center>
        <h1> Welcome to LAPTOP World Please Enter Below Details </h1>

        <div>
            <form method="POST" action=" {{ route('store') }} ">
                @csrf
                @method('post')

                <div>
                    <label> Name :</label>
                    <input type="text" name="fname" value="{{ old('fname') }}" placeholder=" Enter laptop name" />
                    @error('fname')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror
                </div> <br>

                <div>
                    <label> RAM :</label>
                    <input type="text" name="fram" value="{{ old('fram') }}" placeholder=" Enter RAM in GB" />
                    @error('fram')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror
                </div><br>

                <div>
                    <label> Processor :</label>
                    <input type="text" name="fprocessor" value="{{ old('fprocessor') }}"
                        placeholder=" Enter Processor name" />
                    @error('fprocessor')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror
                </div><br>

                <div>
                    <label> Windows Version :</label>
                    <input type="text" name="fwversion" value="{{ old('fwversion') }}"
                        placeholder=" Enter Version of Windows" />
                    @error('fwversion')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror
                </div><br>

                <div>
                    <label> Price :</label>
                    <input type="text" name="fprice" value="{{ old('fprice') }}" placeholder=" Enter the Price" />
                    @error('fprice')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror
                </div><br>

                <div>
                    <button type="submit"> Submit </button>
                </div>

            </form>
        </div>
    </center>



</body>

</html>