<x-layouts.guest :title="$title">

        <nav class="nav max-w-6xl mx-auto">

            <div class="container relative mx-auto py-5 px-7 lg:px-0 uppercase flex items-center justify-between">

                <div class="nav__left">
                    <a href="" class="tracking-widest">
                        <img src="{{ asset('assets/logo.svg') }}" alt="Logo" class="w-25">
                    </a>
                </div>

                <div class="nav__left">
                   @guest
                    <a href="{{ route('register') }}" class="tracking-widest inline-block me-auto">Apply</a>
                    <a href="{{ route('login') }}" class="tracking-widest inline-block me-auto bg-indigo-600 hover:bg-indigo-500 cursor-pointer py-1 px-3 rounded-lg ms-4">Login</a>
                   @endguest

                   @auth
                       @if(auth()->user()->hasRole('administrator'))

                                <a href="{{ route('admin.dashboard') }}" class="tracking-widest inline-block me-auto bg-indigo-600 hover:bg-indigo-500 cursor-pointer py-1 px-3 rounded-lg ms-4">Dashboard</a>

                       @endif

                       @if(auth()->user()->hasRole('student'))

                            <a href="{{ route('admin.dashboard') }}" class="tracking-widest inline-block me-auto bg-indigo-600 hover:bg-indigo-500 cursor-pointer py-1 px-3 rounded-lg ms-4">Dashboard</a>

                       @endif
                   @endauth 
                </div>
                
            </div>

        </nav>

            <!-- Start Hero -->
            <section class="relative table w-full py-8 px-7 lg:px-0  overflow-hidden min-h-screen max-w-6xl mx-auto">
                <div class="container relative mx-auto">
                    <div class="relative grid md:grid-cols-12 grid-cols-1 items-center mt-10 gap-[30px]">
                        <div class="md:col-span-6">
                            <div class="md:me-8">
                                <h4 class="font-bold lg:leading-normal leading-normal text-4xl lg:text-5xl mb-5 text-black dark:text-white relative">Easiest way to <span class="before:block before:absolute before:-inset-1 before:-skew-y-3 before:bg-indigo-600 relative inline-block"><span class="relative text-white">manage</span></span> your students</h4>
                                <p class="text-slate-400 text-lg max-w-xl">Edusphere software application is designed to manage and automate various aspects of student data and administrative processes in schools.</p>

                                <p class="text-slate-400 text-lg max-w-xl mt-8">Don't yet have an account?  You can register.</p>
                            
                                <div class="mt-6 mb-3">
                                       <a href="{{ route('register') }}" class="tracking-widest inline-block me-auto bg-indigo-600 py-2 px-4 rounded hover:bg-indigo-500 uppercase ">Create Account</a>
                                </div>
                            </div>
                        </div><!--end col-->
    
                        <div class="md:col-span-6">
                            <div class="relative">
                                <div class="relative rounded-xl overflow-hidden shadow-md dark:shadow-gray-800">
                                    <div class="w-full py-72 bg-slate-400 bg-home bg-cover bg-no-repeat bg-top"></div>
                                </div>
    
                                <div class="absolute flex justify-between items-center md:bottom-10 bottom-5 md:-start-16 p-4 rounded-lg shadow-md dark:shadow-gray-800 bg-white dark:bg-slate-900 w-60 m-3">
                                    <div class="flex items-center">
                                        <div class="flex items-center justify-center h-[65px] min-w-[65px] bg-indigo-600/5 text-indigo-600 text-center rounded-full me-3">
                                         
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-monitor h-6 w-6"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
                                          
                                        </div>
                                        <div class="flex-1">
                                            <h6 class="text-slate-400">Visitor</h6>
                                            <p class="text-xl font-bold"><span class="counter-value" data-target="4589">2100</span></p>
                                        </div>
                                    </div>
    
                                    <span class="text-green-600"> 80%</span>
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end grid-->
                </div><!--end container-->
            </section><!--end section-->
            <!-- End Hero -->
 

    </html>

</x-layouts.guest>