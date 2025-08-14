<x-layoutinventory>
    <x-slot:title>{{ $title }}</x-slot:title>
        <div class="settings">
            <x-navbarproduct></x-navbarproduct>
            <table class="header">
                <tr>
                    <td><h1>Accommodation List</h1></td>
                    <td><a href="/product/accommodation/addnew">+</a></td>
                </tr>
            </table>
            <table class="data">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 10%">Hotel ID</th>
                        <th style="width: 40%">Hotel Name</th>
                        <th style="width: 25%">Hotline</th>
                        <th style="width: 25%">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($accomodations as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->hotel_name }}</td>
                            <td>{{ $item->hotline }}</td> 
                            <td>
                                    <a href="{{ url('/product/accommodation/'.$item->id) }}">See Details</a>
                                </td>
                                
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No data found.</td>
                            </tr>
                        @endforelse
                    </tbody>
            </table>
            </div>

</x-layoutinventory>
    