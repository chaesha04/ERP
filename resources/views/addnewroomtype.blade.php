<x-layoutinventory>
    <x-slot:title>Add New Room Type</x-slot:title>
    <main>
        <div class="settings">
            <table class="data" style="margin-bottom: 100px;">
                <thead>
                        <tr>
                            <td colspan="5" style="text-align: left; font-size: 34px; background-color: transparent; text-transform: uppercase; padding: 5px;">Add New Room Type : {{ $accommodation->hotel_name }}</td>
                        </tr>
                        <tr>
                            <th style="background-color:pink;">Hotel ID</th>
                            <th style="background-color:pink;">Location</th>
                            <th style="background-color:pink;">Hotline</th>
                            <th style="background-color:pink;">Note</th>
                        </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $accommodation->id }}</td>
                        <td>{{ $accommodation->location }}</td>
                        <td>{{ $accommodation->hotline }}</td>
                        <td>{{ $accommodation->note }}</td>
                    </tr>
                </tbody>
            </table>
            <form action="/product/accommodation/{id}/addnew_roomtype" method="POST">
                @csrf
                <input type="hidden" name="accommodation_id" value="{{ $accommodation->id }}">
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
                <div style="justify-content:center; display: flex; align-items: center; padding: 50px;">
                    <button type="submit" class="styled-button">Add Room</button>
                </div>
                
                
                
            </form>
        </div>
    </main>
</x-layoutinventory>
