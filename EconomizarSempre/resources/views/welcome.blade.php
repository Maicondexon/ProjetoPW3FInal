<link rel="stylesheet" href="https://unpkg.com/chota@latest">

<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="text-center">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQOcFZMl_N4Dm7V9MXrMgDmz6FR95iDhaHR1YcbJ_rAvuOTpntR5UfA8ThPaHm_m9-UL_A&usqp=CAU"
            alt="Logo" class="w-20 h-20">
        <h1 class="text-3xl font-semibold mb-2">Projeto Gestão Financeira</h1>
        @if (Route::has('login'))
            <div class="mb-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="button is-secondary">Voltar para Tela de gestão</a>
                @else
                    <a href="{{ route('login') }}" class="button is-primary">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="button is-link ml-2">Register</a>
                    @endif
            @endif
            @endif
        </div>
    </div>
