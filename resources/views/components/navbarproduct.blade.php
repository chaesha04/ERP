<div class="navlink">
    <ul>
        <li><a href="/product/accommodation" class="{{ request()->is('product/accommodation*') ? 'active' : '' }}">Accomodation</a></li>
        <li><a href="/product/beach" class="{{ request()->is('product/beach*') ? 'active' : '' }}">Beach</a></li>
        <li><a href="/product/meetingroom" class="{{ request()->is('product/meetingroom*') ? 'active' : '' }}">Meeting Room</a></li>
        <li><a href="/product/watersport" class="{{ request()->is('product/watersport*') ? 'active' : '' }}">Watersport</a></li>
    </ul>
</div>
