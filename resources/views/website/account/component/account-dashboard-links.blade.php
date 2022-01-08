<div class="col-12">
    <ul class="dashboard-links">
        <li class="{{ (Route::is("my-account"))  ? "active" : ""  }}"><a href="{{route("my-account")}}"><i class="fas fa-desktop"></i>My Dashboard</a></li>
        <li class="{{ (Route::is("order-history")) ? "active" : ""  }}"><a href="{{route("order-history")}}"><i class="fas fa-history"></i>Order History</a></li>
        <li class="{{ (Route::is("my-wishlist")) ? "active" : ""  }}"><a href="{{route("my-wishlist")}}"><i class="fas fa-heart"></i>My Wish List</a></li>
        <li class="{{ (Route::is("manage-address")) ? "active" : ""  }}"><a href="{{route('manage-address')}}"><i class="fas fa-list"></i>My Address</a></li>
        <li class="{{ (Route::is("user-settings")) ? "active" : ""  }}"><a href="{{route('user-settings')}}"><i class="fas fa-cog"></i>Other Settings</a></li>
        <li class="{{ (Route::is("support-center")) ? "active" : ""  }}"><a href="{{route('support-center')}}"><i class="far fa-life-ring"></i>Support Centre</a></li>
    </ul>
</div>
