<x-layoutinventory>
    <x-slot:title> Product | Meeting Room: {{ $meetingroom->meetingroom_name }}</x-slot:title>
    <head>
        <style>
            .settings{
                display: flex;
            }    

        </style>
    </head>
    <main>
        <div class="settings">
            <div class="data" style="width:100%;">
                <table class="data" style="width: 100%">
                    <thead>
                        <tr>
                            <td colspan="5" style="text-align: left; font-size: 34px; background-color: transparent;">{{ $meetingroom->meetingroom_name }}</td>
                        </tr>
                        <tr>
                            <td colspan="5" style="text-align: left;background-color: transparent;">
                                <a href="#" onclick="Cancel({{ $meetingroom->id }})"><button>Cancel</button></a>
                                <a href="#" onclick="editProductMeetingRoom({{ $meetingroom->id }})"><button>Edit Product</button></a>
                                <a href="#" onclick="deleteProductAccommodation({{ $meetingroom->id }})"><button>Delete Product</button></a>
                            </td>
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
                            <td>{{ $meetingroom->id }}</td>
                            <td>{{ $meetingroom->location }}</td>
                            <td>{{ $meetingroom->hotline }}</td>
                            <td>{{ $meetingroom->note }}</td>
                        </tr>
                    </tbody>
                </table>
                <table class="data" style="margin-top:20px;">
                    <thead>
                        <th>Room Occupancy</th>
                        <th>Room Facilities</th>
                    </thead>
                </div>
            </div>
        </div>
    </main>
</x-layoutinventory>
<script>
    function deleteProductMeetingRoom(id){
        if(confirm('are you sure to delete this product?')){
            fetch('/product/meetingroom/'+ id,{
                method:'DELETE',
                headers: {
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}',
                    'Accept' : 'application/json'
                },
            })
            .then(response => {
                if(response.ok){
                    alert('Product Meeting Room deleted successfully!');
                    window.location.href='/product/meetingroom';
                }else{
                    alert('Failed to delete the Product.');
                }
            });
        }
    }
    function editProductMeetingRoom(id){
        window.location.href = '/product/meetingroom/'+id+'/edit';
    }
</script>
