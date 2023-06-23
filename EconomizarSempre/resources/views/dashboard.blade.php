 <x-app-layout>
     <x-slot name="header">
         <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
             {{ __('GESTÃO FINANCEIRA') }}

         </h2>
     </x-slot>

     <div class="py-12">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                 <div class="p-6 text-gray-900 dark:text-gray-100">

                     <!-- {{ __("You're logged in!") }} -->
                     <p>Bem-vindo(a) {{ Auth::user()->name }}!</p>

                     <div class="p-6 text-gray-900 dark:text-gray-100">
                        <!-- Adicione o conteúdo específico de gestão financeira aqui -->
                        <a href="{{ route('financas') }}" class="text-blue-500 hover:text-blue-700">Acesse a página de Gestão Financeira</a>
                    </div>
                    </div>
                    </div>
                 </div>
                 
             </div>
         </div>
     </div>
 </x-app-layout>
