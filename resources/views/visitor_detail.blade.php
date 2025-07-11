<style>
    .visitor-footer {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    gap: 10px;
    margin-top: 10px;
    font-weight: bold;
}

</style>
<x-layout-sales>
    <x-slot:title>{{ $title }}</x-slot:title>
    <main>
        <div class="settings">
            <div class="form-customer">
                <table style="width: 100%">
                    <tr>
                        <td style="width:50%">
                                <form method="GET" action="/visitor">
                                <select name="field">
                                    <option value="visitor_name">Visitor Name</option>
                                    <option value="sex">Sex</option>
                                    <option value="phone_number">Phone</option>
                                    <option value="group_name">Group Name</option>
                                    <option value="company_number">Company Number</option>
                                    <option value="country">Country</option>
                                    <option value="email">Email</option>
                                </select>
                                <input type="text" name="keyword" placeholder="Search" value="{{ request('keyword') }}">
                                <button type="submit">Search</button>
                                <a href="/visitor"><button type="button">Cancel</button></a>
                            </form>
                        </td>
                        <td>
                            <p style="text-align:right; color: #6e6e6e;">{{ $visitorDetail->count() }} Visitor Data | Page {{ $visitorDetail->currentPage() }} of {{ $visitorDetail->lastPage() }}</p>
                        </td>
                    </tr>

            </div>
            <div class="visitor-data">
                <table class="data">
                    <thead>
                        <tr>
                            <th>Visitor Name</th>
                            <th>Sex</th>
                            <th>Phone Number</th>
                            <th>Group Name</th>
                            <th>Company Number</th>
                            <th>Country</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @forelse ($visitorDetail as $item)
                                        <tr>
                                            <td style="width:15%;">{{ $item->visitor_name }}</td>
                                            <td style="width:8%;">{{ $item->sex }}</td>
                                            <td style="width:15%;">{{ $item->phone_number }}</td>
                                            <td style="width:15%;">{{ $item->group_name }}</td>
                                            <td style="width:15%;">{{ $item->company_number }}</td>
                                            <td style="width:15%;">{{ $item->country }}</td>
                                            <td style="width:15%;">{{ $item->email }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" style="text-align: center;">No data has found</td>
                                        </tr>
                                    @endforelse
                        </tr>
                        <tr>

                        </tr>
                    </tbody>
                </table>
                <div class="form-customer">
                    {{-- <table>
                        <td style="width:50%; text-align: right;">
                            <button><</button>
                            <button>></button>
                            Page: 
                        </td>
                    </table>
                        <td> maunya nampilin ini page berapa </td> --}}
                </div>
                                <div class="visitor-footer">
                    {{-- Tombol Prev --}}
                    @if ($visitorDetail->onFirstPage())
                        <button disabled><</button>
                    @else
                        <a href="{{ $visitorDetail->previousPageUrl() }}&field={{ request('field') }}&keyword={{ request('keyword') }}"><button><</button></a>
                    @endif

                    {{-- Tombol Next --}}
                    @if ($visitorDetail->hasMorePages())
                        <a href="{{ $visitorDetail->nextPageUrl() }}&field={{ request('field') }}&keyword={{ request('keyword') }}"><button>></button></a>
                    @else
                        <button disabled>></button>
                    @endif
                </div>
            </div>
        </div>
    </main>
</x-layout-sales>
