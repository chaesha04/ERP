<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Banquet Event Order</title>
    <style>
    @page {
        margin: 0.5cm;
        font-family: 'Calibri', 'Arial', sans-serif;  
        font-size: 10px;
        vertical-align: bottom;
    }
    

    table {
        width: 100%;
        border-collapse: collapse;
        table-layout: fixed;
        padding: 0; 
        line-height: 1;
        margin: 0;
        border: 2px solid black;
    }
    th, td {
        padding: 5px 10px;
        border: 1px solid #000;
    }

    td.pink {
        font-weight: bold;
        background-color: #eac2c5;
        text-align: center;
        text-transform: uppercase;
    }
    td.logo{
        text-align: center;
    }

    th.title{
        font-size: large;
    }
    </style>
</head>
<body>
    <table>
        {{-- ini kop suratnya --}}
        <tr>
            <td colspan="3" rowspan="3" class="logo"><img src="{{ public_path('logotj.png') }}" alt="Logo TJ" style="height: 90px; display: inline-block; "></td>
            <th colspan="5" class="title">BANQUET EVENT ORDER <br> <hr></th>
            <td>Hotline</td>
            <td>: 0253 - 802902, 802 771</td>
        </tr>
        <tr>
            <td colspan="5" rowspan="2">Tanjung Lesung Beach Hotel <br> Tanjung Lesung Kav. R 14A & R14C Kab. Pandeglang - Banten</td>
            <td>Fax</td>
            <td>: 0253 - 802900</td>
        </tr>
        <tr>
            <td colspan="2">https://www.tanjunglesung.com/</td>
        </tr>

        {{-- pink pertama / data --}}
        <tr>
            <td colspan="4" class="pink">BEO : {{ $groupbooking->slug }}</td>
            @php
            use Carbon\Carbon;

            // Atur timezone ke Indonesia
            $date = Carbon::now('Asia/Jakarta');

            // Format dalam English (tidak pakai translatedFormat, langsung format())
            $formattedDate = $date->format('l, F d, Y');
            @endphp

            <td colspan="4" class="pink">
              Date Of Issued : {{ $formattedDate }}
            </td>
            <td colspan="2" class="pink">Sales By : {{ $groupbooking->SalesDetail->name }}</td>
        </tr>

        {{-- data group --}}
        <tr>
            <td colspan="4"><b>GROUP INFORMATION</b></td>
            <td colspan="4"><b> NAME & ADDRESS OF CLIENT</b></td>
            <td colspan="2"><b>PAYMENT</b></td>
        </tr>
        <tr>
            <td colspan="1">Name of Group</td>
            <td colspan="3"><b>: {{ $groupbooking->VisitorDetail->group_name }}</b></td>
            <td colspan="1">CP</td>
            <td colspan="3">:{{$groupbooking->SalesDetail->name}}</td>
            <td colspan="2" rowspan="7" style="text-align: right">{{ $groupbooking->deposit }}</td>
        </tr>
        <tr>
            <td colspan="1">Day of Event</td>
            <td colspan="3" style="text-transform:uppercase;">: {{ Carbon::parse($groupbooking->check_in)->translatedFormat('l') }} TO {{ Carbon::parse($groupbooking->check_out)->translatedFormat('l') }}</td>
            <td colspan="1">Company</td>
            <td colspan="3">: {{ $groupbooking->VisitorDetail->group_name }}</td>
        </tr>
        <tr>
            <td colspan="1">Date of Event</td>
            <td colspan="3">: {{ $groupbooking->check_in }} - {{ $groupbooking->check_out }}</td>
            <td colspan="1" rowspan="3">Address</td>
            <td colspan="3" rowspan="3">: {{ $groupbooking->VisitorDetail->group_address}}</td>
        </tr>
        <tr>
            <td colspan="1">Type of Event</td>
            <td colspan="3">: {{ $groupbooking->event_type }}</td>
        </tr>
        <tr>
            <td colspan="1">Venue</td>
            <td colspan="3">: {{ $groupbooking->ProductDetail->hotel_name }}</td>
        </tr>
        <tr>
            <td colspan="1">Room</td>
            <td colspan="3">: {{ $groupbooking->qty_room }} Rooms + {{ $groupbooking->extrabed }} Extra Bed</td>
            <td colspan="1">Tlp</td>
            <td colspan="3">: {{ $groupbooking->VisitorDetail->phone_number }}</td>
        </tr>
        <tr>
            <td colspan="1">Attend Guaranted</td>
            <td colspan="3">: {{ ($groupbooking->adult)+($groupbooking->child)+($groupbooking->baby) }} Pax ({{ $groupbooking->adult }} Adult + {{ $groupbooking->child }} Children + {{ $groupbooking->baby }} Baby)</td>
            <td colspan="1">Email</td>
            <td colspan="3">: {{$groupbooking->VisitorDetail->email}} </td>
        </tr>
        <tr>
            <td class="pink" colspan="10">Department Jobs</td>
        </tr>
        <tr>
            <td class="pink" colspan="5">{{ $groupbooking->package }}</td>
            <td class="pink" colspan="5">Food & Beverage Banquet</td>
        </tr>
        <tr>
            <td colspan="4">{{ $groupbooking->VisitorDetail->group_name }}</td>
            <td style="text-align: center;" colspan="1" rowspan="2">REVENUE</td>
            <td style="text-align: center;" colspan="5" rowspan="2">RUNDOWN</td>
        </tr>
        <tr>
            <td>SINGLE</td>
            <td>TWIN</td>
            <td>TRIPLE</td>
            <td>CHILD</td>
          </tr>
          <tr>
            <td style="text-align: right;">{{ $groupbooking->singleroom_price }}</td>
            <td style="text-align: right;">{{ $groupbooking->twinroom_price }}</td>
            <td style="text-align: right;">{{ $groupbooking->tripleroom_price }}</td>
            <td style="text-align: right;">{{ $groupbooking->childroom_price }}</td>
            <td style="text-align: right;" rowspan="2">{{ $groupbooking->grand_total }}</td>
            <td colspan="5" style="text-align: center">Check In: {{ $groupbooking->check_in }}</td>
          </tr>
          <tr>
            <td style="text-align: right;">{{ ($groupbooking->singleroom_price)*($groupbooking->single_room)*($groupbooking->night) }}</td>
            <td style="text-align: right;">{{ ($groupbooking->twinroom_price)*($groupbooking->twin_room)*($groupbooking->night) }}</td>
            <td style="text-align: right;">{{ ($groupbooking->tripleroom_price)*($groupbooking->triple_room)*($groupbooking->night) }}</td>
            <td style="text-align: right;">{{ ($groupbooking->child_room)*($groupbooking->child_room)*($groupbooking->night) }}</td>
            <td colspan="5" style="text-align: center">Check Out: {{ $groupbooking->check_out }}</td>
            {{-- <td>19,500,000</td>
            <td>10,500,000</td>
            <td>3,750,000</td> --}}
        </tr>
        <tr>
            <td class="pink" colspan="5">BREAKDOWN</td>
            <td class="pink">Date</td>
            <td class="pink">Time</td>
            <td class="pink" colspan="2">Activities</td>
            <td class="pink">Place</td>
        </tr>
        <tr>
            <td colspan="5">
                <table style="width: 100%; border-collapse: collapse; font-size: 10px;">
                    <thead>
                        <tr style="background-color: #eac2c5;">
                            <th>Product</th>
                            <th>Price</th>
                            <th>Unit</th>
                            <th>Night</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                        <tr>
                            <td>{{ $row['product'] }}</td>
                            <td style="text-align: right;">{{ number_format($row['price']) }}</td>
                            <td style="text-align: right;">{{ $row['unit'] }}</td>
                            <td style="text-align: right;">{{ $row['night'] }}</td>
                            <td style="text-align: right;">{{ number_format($row['total']) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </td>
            <td colspan="5">
                <table style="width: 100%; border-collapse: collapse; font-size: 10px;">
                    <tbody>
                        @foreach($event as $row)
                        <tr>
                            <td style="width: 20%; ">{{ $row['date'] }}</td>
                            <td style="width: 20%; ">{{ $row['start'] }} - {{ $row['end'] }}</td>
                            <td style="width: 40%; text-align: right;">{{ $row['activities'] }}</td>
                            <td style="width: 20%; text-align: right;">{{ $row['place'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </td>
          <tr>
            <td colspan="5" class="pink">HOUSE KEEPING HOTEL</td>
            <td colspan="5" class="pink"></td>
          </tr>
          <tr>
            <td colspan="5">{{ $groupbooking->NoteBEO->note_housekeeping}}</td>
            <td colspan="5"></td>
          </tr>
          <tr>
            <td colspan="5" class="pink">ENGINEERING HOTEL</td>
            <td colspan="5" class="pink">ACCOUNTING</td>
          </tr>
          <tr>
            <td colspan="5">{{ $groupbooking->NoteBEO->note_engineer}}</td>
            <td colspan="5">{{ $groupbooking->NoteBEO->note_accounting}}</td>
          </tr>
          <tr>
            <td colspan="5" class="pink">KITCHEN</td>
            <td colspan="5" class="pink">SPORT & LEISURE</td>
          </tr>
          <tr>
            <td colspan="5">{{ $groupbooking->NoteBEO->note_kitchen}}</td>
            <td colspan="5">{{ $groupbooking->NoteBEO->note_sport}}</td>
          </tr>
          <tr>
            <td colspan="5" class="pink">FOOD AND BEVERAGE</td>
            <td colspan="5" class="pink">LALASSA BEACH CLUB</td>
          </tr>
          <tr>
            <td colspan="5">{{ $groupbooking->NoteBEO->note_fnb}}</td>
            <td colspan="5">{{ $groupbooking->NoteBEO->note_lalassa}}</td>            
          </tr>
          <tr>
            <td colspan="10" class="pink">COPY FILE TO : GM,FOM,FC,SM,EXECHEF,FBM,EXEHK,SEC,HRM,Purch</td>
          </tr>
          <tr>
            <td>Prepared by:</td>
            <td colspan="2">Signature</td>
            <td>Acknowledge by,</td>
            <td  colspan="3">Signature</td>
            <td>Approved by,</td>
            <td colspan="2">Signature</td>
          </tr>
          <tr>
            <td><b>Reservation</b></td>
            <td colspan="2"></td>
            <td><b>FO Manager</b></td>
            <td  colspan="3"></td>
            <td><b>General Manager</b></td>
            <td colspan="2"></td>
          </tr>
    </table>
</body>
</html>