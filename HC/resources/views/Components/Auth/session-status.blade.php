<div>
    <!-- Your component's HTML content here -->
    @if (Auth::check())
        <div>
            You are logged in.
        </div>
    @else
        <div>
            You are not logged in.
        </div>
    @endif
</div>