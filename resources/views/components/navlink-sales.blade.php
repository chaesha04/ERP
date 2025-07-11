<div class="navlink">
    <ul>
        <li><a href="/bookingandreservation/accommodation" class="{{ request()->is('bookingandreservation/accommodation*') ? 'active' : '' }}">Accommodation</a></li>
        <li><a href="/bookingandreservation/beach" class="{{ request()->is('bookingandreservation/beach*') ? 'active' : '' }}">Beach</a></li>
        <li><a href="/bookingandreservation/groupbookingorder" class="{{ request()->is('bookingandreservation/groupbookingorder*') ? 'active' : '' }}">Group Booking Order</a></li>
        {{-- <li><a href="/bookingandreservation/meetingroom" class="{{ request()->is('bookingandreservation/meetingroom*') ? 'active' : '' }}">Meeting Room</a></li>
        <li><a href="/bookingandreservation/trip" class="{{ request()->is('bookingandreservation/trip') ? 'active' : '' }}">Trip</a></li>
        <li><a href="/bookingandreservation/visitor" class="{{ request()->is('bookingandreservation/visitor') ? 'active' : '' }}">Accomodation</a></li>
        <li><a href="/bookingandreservation/watersport" class="{{ request()->is('bookingandreservation/watersport') ? 'active' : '' }}">Watersport</a></li> --}}
    </ul>
</div>
