<div>
    
    <div class="py-2 px-4 bg-gray-200 flex justify-between">
        <span>Perpus app</span>
        <span>Welcome @if(Auth::user()) {{Auth::user()->name}} @else Guest @endif  </span>
    </div>
    <div class="bg-gray-100 px-6 ">
        <div class="flex justify-between">
            <div>
                <a href="{{route('dashboard')}}" class="hover:bg-gray-300 p-2 transition-all duration-200 inline-block">Home</a>
                @if(Auth::user()->role_id ==1)
                <a href="{{route('addAdmin')}}" class="hover:bg-gray-300 p-2 transition-all duration-200 inline-block">Add Admin</a>
                @endif
            </div>
            <div>
                
                <a href="{{route('logout')}}" class="hover:bg-red-300 p-2 transition-all duration-200 inline-block">LogOut</a>
            </div>
        </div>
    </div>
</div>