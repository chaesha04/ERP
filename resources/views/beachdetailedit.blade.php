<x-layoutinventory>
    <x-slot:title></x-slot:title>
    <main>
        <div class="settings">
            <div class="product-detail" style="border: 1px solid ">
                <form action="{{ url('/product/beach/' . $beaches->id) . '/edit' }}" method="POST">
                <table class="header-detail">
                <tr>
                    <td rowspan="2"><p><a href="/product/beach">Edit Beach Data: [{{ $beaches->id }}] - {{ $beaches->beach_name }}</a></p></td>
                    <td colspan="2"></td>
                </tr>
                <tr></tr>
                <tr>   
                    <td>
                        <a href="#"><button type="button" onclick="history.back()">Cancel</button></a>
                        <button type="submit">Update</button>

                    </td>
                </tr>
            </table>
            <div class="form-edit" style="padding: 20px">
                        @csrf
                        @method('PUT')

                        <div class="form-row">
                            <div class="form-group">
                                <label for="beach_name">Beach Name</label>
                                <input type="text" name="beach_name" id="beach_name" value="{{ old('beach_name', $beaches->beach_name) }}">
                                <label for="location">Location</label>
                                <input type="text" name="location" id="location" value="{{ old('location', $beaches->location) }}">

                                <label for="hotline">Hotline</label>
                                <input type="text" name="hotline" id="hotline" value="{{ old('hotline', $beaches->hotline) }}">                                
                            </div>

                            <div class="form-group note-group ">
                                @if ($beaches->note == 'Note')                                  
                                    <label for="note">Note</label>
                                    <textarea name="note" id="note" rows="14" cols="48"></textarea>
                                    @else
                                    <label for="note">Note</label>
                                    <textarea name="note" id="note" rows="14" cols="48">{{ old('note', $beaches->note) }}</textarea>
                                @endif
                            </div>
                        </div>
                        <div class="form-submit">
                        </div>

                        <br><br>
                </form>
            </div>  
        </div>
    </main>
</x-layoutinventory>
