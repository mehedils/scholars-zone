<!-- Sidebar -->
<aside class="bg-gray-800 text-white w-64 min-h-screen flex-shrink-0">
    <div class="p-6">
        <div class="flex items-center space-x-3">
            <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center">
                <i class="fas fa-graduation-cap text-white"></i>
            </div>
            <h1 class="text-xl font-bold">@siteName</h1>
        </div>
    </div>
    
    <nav class="mt-6">
        <div class="px-4 mb-4">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Main</p>
        </div>
        
        <ul class="space-y-2 px-4">
            <li>
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center space-x-3 px-3 py-2 rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                    <i class="fas fa-tachometer-alt w-5"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            
            <li>
                <a href="{{ route('admin.users') }}" 
                   class="flex items-center space-x-3 px-3 py-2 rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.users*') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                    <i class="fas fa-users w-5"></i>
                    <span>Users</span>
                </a>
            </li>
            
            <li>
                <a href="{{ route('admin.destinations') }}" 
                   class="flex items-center space-x-3 px-3 py-2 rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.destinations*') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                    <i class="fas fa-globe w-5"></i>
                    <span>Destinations</span>
                </a>
            </li>
            
            <li>
                <a href="{{ route('admin.consultations') }}" 
                   class="flex items-center space-x-3 px-3 py-2 rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.consultations*') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                    <i class="fas fa-comments w-5"></i>
                    <span>Consultations</span>
                </a>
            </li>
        </ul>
        
        <div class="px-4 mb-4 mt-8">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Settings</p>
        </div>
        
        <ul class="space-y-2 px-4">
            <li>
                <a href="{{ route('admin.settings.general') }}" 
                   class="flex items-center space-x-3 px-3 py-2 rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.settings.general') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                    <i class="fas fa-cog w-5"></i>
                    <span>General</span>
                </a>
            </li>
            
            <li>
                <a href="{{ route('admin.settings.email') }}" 
                   class="flex items-center space-x-3 px-3 py-2 rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.settings.email') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                    <i class="fas fa-envelope w-5"></i>
                    <span>Email</span>
                </a>
            </li>
            
            <li>
                <a href="{{ route('admin.settings.security') }}" 
                   class="flex items-center space-x-3 px-3 py-2 rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.settings.security') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                    <i class="fas fa-shield-alt w-5"></i>
                    <span>Security</span>
                </a>
            </li>
            
            <li>
                <a href="{{ route('admin.settings.notifications') }}" 
                   class="flex items-center space-x-3 px-3 py-2 rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.settings.notifications') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                    <i class="fas fa-bell w-5"></i>
                    <span>Notifications</span>
                </a>
            </li>
            
            <li>
                <a href="{{ route('admin.social-media.index') }}" 
                   class="flex items-center space-x-3 px-3 py-2 rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.social-media*') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                    <i class="fas fa-share-alt w-5"></i>
                    <span>Social Media</span>
                </a>
            </li>
            
            <li>
                <a href="{{ route('admin.profile') }}" 
                   class="flex items-center space-x-3 px-3 py-2 rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.profile*') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                    <i class="fas fa-user-cog w-5"></i>
                    <span>Profile</span>
                </a>
            </li>
        </ul>
    </nav>
    
    <!-- User Info at Bottom -->
    <div class="absolute bottom-0 w-64 p-4 border-t border-gray-700">
        <div class="flex items-center space-x-3">
            <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                <i class="fas fa-user text-white text-sm"></i>
            </div>
            <div class="flex-1">
                <p class="text-sm font-medium text-white">{{ auth()->user()->name }}</p>
                <p class="text-xs text-gray-400">Administrator</p>
            </div>
        </div>
    </div>
</aside>
