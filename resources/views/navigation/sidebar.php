
    
    <div class="flex-grow overflow-y-auto sidebar-scroll">
    <p class="px-5 py-2 text-xs text-gray-500 uppercase tracking-wider font-medium">Platform</p>

    <nav class="mb-auto">
       

        
            <ul>
                <li class="mb-1">
                    <a href="{{route('home')}}"
                        class="flex items-center px-5 py-3 text-sm 
                ">
                        <i class="fas fa-home w-5 mr-3 text-center"></i>
                        Dashboard
                    </a>
                </li>

                

                <li class="mb-1">
                    <a href="{{ route('tasks.index') }}"
                        class="flex items-center px-5 py-3 text-sm ">
                        <i class="fas fa-briefcase w-5 mr-3 text-center"></i>
                        All Jobs
                    </a>
                </li>

            </ul>
        
    </nav>



    <!-- Add spacer to push admin section to bottom -->
    <div class="flex-grow"></div>
</div>