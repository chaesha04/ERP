<x-layoutinventory>
    <x-slot:title>Add New Room Type</x-slot:title>
    <main>
        <div class="settings">

            <h2>Add Room Type for {{ $accommodation->hotel_name }}</h2>
            <form action="{{ route('hotel-details.store') }}" method="POST">
                @csrf
                <input type="hidden" name="hotel_name" value="{{ $accommodation->id }}">
                <div class="form-row">
                    <div class="form-group">
                        <label>Room Type:</label>
                        <input type="text" name="room_type"><br>
                    </div>
                    <div class="form-group">
                        <label>Bedroom Quantity:</label>
                        <input type="number" name="bedroom_qty" min="0" value="0" style="text-align: right;"><br>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Extra Facility:</label>
                        <select name="extra_facility">
                            <option value="">--- Option ---</option>
                            <option value="Mini Garden">Mini Garden</option>
                            <option value="Private Pool">Private Pool</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Unit:</label>
                        <input type="number" name="unit" min="0" value="0" style="text-align: right;"><br>
                    </div>
                </div>
                <div style="justify-content:center; display: flex; align-items: center;">
                    <button type="submit" class="styled-button">Add Room</button>
                </div>
                
                
                
            </form>
        </div>
    </main>
</x-layoutinventory>
