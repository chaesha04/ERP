<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
    @include('pdf.styleoffering')
    <div class="kop-surat">
        <table style="border:none; border-collapse: collapse;">
            <tr>
                <td style="border:none; text-align:left;"><img src="{{ public_path('logokv.png') }}" alt="Logo KV" style="height: 75px; display: inline-block; "></td>
                <td style="border:none; text-align:center;"><img src="{{ public_path('logotj.png') }}" alt="Logo TJ" style="height: 90px; display: inline-block; "></td>
                <td style="border:none; text-align:right;"><img src="{{ public_path('logolbv.png') }}" alt="Logo LBV" style="height: 75px; display: inline-block;"></td>
            </tr>
        </table>   
    </div>
    <div class="client-table">
        <table class="no-padding">
            <tr>
                <th class="client-data" style="background-color: #053D77; color: white; text-align: left;" colspan="2">CLIENT</th>
                <th class="client-data" style="background-color: #053D77; color: white;" colspan="2">2025</th>
            </tr>
            <tr>
                <td class="client-data">Contact Name</td>
                <td class="client-data-input">{{ $groupbooking->VisitorDetail->visitor_name }} | {{ $groupbooking->VisitorDetail->group_name }}</td>
                <td class="client-data">Date Check In</td>
                <td class="client-data-input">{{ $groupbooking->check_in}}</td>
            </tr>
            <tr>
                <td class="client-data">Address</td>
                <td class="client-data-input">{{ $groupbooking->VisitorDetail->group_address }}</td>
                <td class="client-data">Date Check Out</td>
                <td class="client-data-input">{{ $groupbooking->check_out}}</td>
            </tr>
            <tr>
                <td class="client-data">Phone</td>
                <td class="client-data-input">{{ $groupbooking->VisitorDetail->company_number}}</td>
                <td class="client-data" colspan="2"></td>
            </tr>
            <tr>
                <td class="client-data">Mob. Phone</td>
                <td class="client-data-input">{{ $groupbooking->VisitorDetail->phone_number }}</td>
                <td class="client-data" colspan="2"></td>
            </tr>
            <tr>
                <td class="client-data">Email</td>
                <td class="client-data-input">{{ $groupbooking->VisitorDetail->email }}</td>
                <td class="client-data" colspan="2"></td>
            </tr>      
        </table>
    </div>
    <br>

    <div class="accomodation-type">
        <table border="1" cellspacing="0" cellpadding="8">
            <tr>
                <th colspan="5"> ACCOMMODATION - Unit Price (per night)</th>
            </tr>
            <tr>
                <th class="hoteltype" colspan="5" style="font-weight: bold;">
                    KALICAA VILLA
                </th>
            </tr>
            <tr>
                <th class="roomtype">Courtyard Pool</th>
                <th class="roomtype">Courtyard 2 Pool</th>
                <th class="roomtype">Fiji 2 Pool</th>
                <th class="roomtype">Fiji 3 Pool</th>
                <th class="roomtype">Bora 2 Pool</th>
            </tr>
            <tr>
                <td>1 Room (5 Unit)</td>
                <td>2 Room (4 Unit)</td>
                <td>2 Room (8 Unit)</td>
                <td>3 Room (1 Unit)</td>
                <td>2 Room (4 Unit)</td>
            </tr>
            <tr>
                <td>1 King</td>
                <td>1 King & 1 Twin</td>
                <td>1 King & 1 Twin</td>
                <td>1 King & 2 Twin</td>
                <td>1 King & 1 Twin</td>
            </tr>
            <tr>
                <td class="price">3,000,000</td>
                <td class="price">5,000,000</td>
                <td class="price">4,000,000</td>
                <td class="price">6,500,000</td>
                <td class="price">4,500,000</td>
            </tr>
            <tr>
                <td colspan="5"></td>
            </tr>
            <tr>
                <th class="roomtype">Bora 3 Pool</th>
                <th class="roomtype">Bora 3</th>
                <th class="roomtype">Bora 4</th>
                <th class="roomtype">Villa Ungu</th>
                <th class="roomtype">Teras 3 Pool</th>
            </tr>
            <tr>
                <td>3 Room (2 Unit)</td>
                <td>3 Room (2 Unit)</td>
                <td>4 Room (1 Unit)</td>
                <td>4 Room (1 Unit)</td>
                <td>3 Room (2 Unit)</td>
            </tr>
            <tr>
                <td>2 King & 1 Twin</td>
                <td>2 King & 1 Twin</td>
                <td>4 King</td>
                <td>4 King</td>
                <td>2 King & 1 Twin</td>
            </tr>
            <tr>
                <td class="price">6,500,000</td>
                <td class="price">4,800,000</td>
                <td class="price">5,000,000</td>
                <td class="price">5,000,000</td>
                <td class="price">8,800,000</td>
            </tr>
        </table>
    
        <br>
        <table border="1" cellspacing="0" cellpadding="8">
            <tr>
                <th class="hoteltype" colspan="3" style="font-weight: bold;">TANJUNG LESUNG BEACH HOTEL</th>
            </tr>
            <tr>
                <th class="roomtype">Zamrud</th>
                <th class="roomtype">Mutiara</th>
                <th class="roomtype">Berlian</th>
            </tr>
            <tr>
                <td>1 Room (16 Unit)</td>
                <td>2 Room (28 Unit)</td>
                <td>4 Room (4 Unit)</td>
            </tr>
            <tr>
                <td>1 King</td>
                <td>1 King & 1 Twin</td>
                <td>1 King</td>
            </tr>
        </table>
        <br>
        <table border="1" cellspacing="0" cellpadding="8">
            <tr>
                <th class="hoteltype" colspan="3" style="font-weight: bold;">TANJUNG LESUNG BEACH HOTEL</th>
            </tr>
            <tr>
                <th class="roomtype">Viriya 1</th>
                <th class="roomtype">Viriya 2</th>
                <th class="roomtype">Tara 1</th>
            </tr>
            <tr>
                <td>1 Room (11 Unit)</td>
                <td>2 Room (13 Unit)</td>
                <td>1 Room (25 Unit)</td>
            </tr>
            <tr>
                <td>1 King</td>
                <td>1 King & 1 Twin</td>
                <td>1 King</td>
            </tr>
            <tr>
                <td class="price">750,000</td>
                <td class="price">1,500,000</td>
                <td class="price">800,000</td>
            </tr>
        </table>
        <br>
        <table border="1" cellspacing="0" cellpadding="8">
            <tr>
                <th class="hoteltype">LALASSA BEACH CLUB</th>
            </tr>
            <tr>
                <td>1 Bed Room (10 Unit)</td>
            </tr>
            <tr>
                <td>1 King</td>
            </tr>
            <tr>
                <td class="price">550,000</td>
            </tr>
        </table>
    </div>

    <div class="tnc">
        <p><b><u>Terms & Conditions</u></b></p>
        <ul>
            <li>All rates are quoted in IDR and net inclusive of 21% tax and service change unless otherwise stated.</li>
            <li>All rates are valid for the specified event and dates only</li>
            <li>No blocking of space will be done until a duly signed confirmation letter together with required deposit is received by the hotel hence space is subject to availability</li>
            <li>Room inclusive breakfast for 2 person.</li>
        </ul>
    </div>

    
    <div style="page-break-before: always;"></div>
    <div class="kop-surat">
        <table style="border:none; border-collapse: collapse;">
            <tr>
                <td style="border:none; text-align:left;"><img src="{{ public_path('logokv.png') }}" alt="Logo KV" style="height: 75px; display: inline-block; "></td>
                <td style="border:none; text-align:center;"><img src="{{ public_path('logotj.png') }}" alt="Logo TJ" style="height: 90px; display: inline-block; "></td>
                <td style="border:none; text-align:right;"><img src="{{ public_path('logolbv.png') }}" alt="Logo LBV" style="height: 75px; display: inline-block;"></td>
            </tr>
        </table>   
    </div>
    <div class="meeting-package">
        <table>
            <tr>
                <th colspan="5" >MEETING PACKAGE - Price net Per Pax (min 30 pax)</th>
            </tr>
            <tr>
                <th colspan="5" class="hoteltype">HALF DAY MEETING</th>
            </tr>
            <tr>
                <th style="width:5%;" rowspan="4" class="idr-price">IDR</th>
                <th style="width:15%;" rowspan="4" class="price">250,000</th>
                <td style="width:40%;" class="desc">1x Coffe Break</td>
                <td style="width:40%;" colspan="2">Free usage of room meeting for 5 hours</td>
            </tr>
            <tr>
                <td class="desc">1x Lunch or Dinner</td>
                <td colspan="2">Free usage audio system for meeting</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">Free usage of screen & infocus</td>
            </tr>
            <tr>
                <td></td>
                <td>Mineral Waters & Mints</td>
                <td>Memo pads & pens</td>
            </tr>
            <tr>
                <th colspan="5" class="hoteltype">FULL DAY MEETING</th>
            </tr>
            <tr>
                <th rowspan="4" class="idr-price">IDR</th>
                <th rowspan="4" class="price">350,000</th>
                <td class="desc">1x Coffe Break Morning</td>
                <td colspan="2">Free usage of room meeting for 8 hours</td>
            </tr>
            <tr>
                <td class="desc">1x Lunch or Dinner</td>
                <td colspan="2">Free usage audio system for meeting</td>
            </tr>
            <tr>
                <td class="desc">1x Coffee Break Afternoon</td>
                <td colspan="2">Free usage of screen & infocus</td>
            </tr>
            <tr>
                <td></td>
                <td>Mineral Waters & Mints</td>
                <td>Memo pads & pens</td>
            </tr>
            <tr>
                <th colspan="5"class="hoteltype">ALL DAY MEETING</th>
            </tr>
            <tr>
                <th rowspan="4" class="idr-price">IDR</th>
                <th rowspan="4" class="price">550,000</th>
                <td class="desc">1x Coffe Break Morning</td>
                <td colspan="2">Free usage of room meeting for 12 hours</td>
            </tr>
            <tr>
                <td class="desc">1x Lunch or Dinner</td>
                <td colspan="2">Free usage audio system for meeting</td>
            </tr>
            <tr>
                <td class="desc">1x Coffee Break Afternoon</td>
                <td colspan="2">Free usage of screen & infocus</td>
            </tr>
            <tr>
                <td class="desc">1x Dinner</td>
                <td>Mineral Waters & Mints</td>
                <td>Memo pads & pens</td>
            </tr>

        </table>
    </div>
    <div class="holiday-package">
          <table>
            <tr><th colspan="4">HOLIDAY PACKAGE - Price net Per Pax (min 30 Pax)</th></tr>
            <tr><th colspan="4" class="hoteltype">ONE DAY TRIP HOLIDAY</th></tr>
            <tr>
                <th class="idr-price" rowspan="3" style="width:5%;">IDR</th>
                <th class="price" rowspan="3" style="width:15%;">350,000</th>
                <td class="desc" style="width:40%;">1x Lunch</td>
                <td style="width:40%;">Free usage of Restaurant for lunch & dinner</td>
            </tr>
            <tr>
                <td class="desc">1x Dinner BBQ</td>
                <td>Lunch 30 pax</td>
            </tr>
            <tr>
                <td></td>
                <td>Dinner 30 pax</td>
            </tr>
            <tr><th colspan="4"class="hoteltype">ONE DAY TRIP HOLIDAY</th></tr>
            <tr>
                <th rowspan="4" class="idr-price">IDR</th>
                <th rowspan="4" class="price">625,000</th>
                <td class="desc">1x Lunch</td>
                <td>Free usage of Restaurant for lunch & dinner</td>
            </tr>
            <tr>
                <td class="desc">1x Coffe Break</td>
                <td>Fun Games for 25 pax at Area Tanjung Lesung</td>
            </tr>
            <tr>
                <td class="desc">1x Dinner BBQ</td>
                <td>Music Entertainment on Dinner time</td>
            </tr>
            <tr>
                <td></td>
                <td>Games at Dinner</td>
            </tr>
        </table>
        <p> facility: jogging track, table tennis, mini soccer, volley beach and children playground.</p>
    </div>
    <div class="additional">
        <p><b>Additional:</b></p>
        <table style="width:50%;">
            <tr>
                <td style="width:24%;">Breakfast</td>
                <th style="width:6%;">IDR</th>
                <th style="width:24%;" class="price">150,000</th>
                <td style="width:24%;">per pax</td>
            </tr>
            <tr>
                <td>Lunch</td>
                <th>IDR</th>
                <th class="price">150,000</th>
                <td>per pax</td>
            </tr>
            <tr>
                <td>Dinner</td>
                <th>IDR</th>
                <th class="price">200,000</th>
                <td>per pax</td>
            </tr>
            <tr>
                <td>Dinner BBQ</td>
                <th>IDR</th>
                <th class="price">250,000</th>
                <td>per pax</td>
            </tr>
            <tr>
                <td>Coffee Break</td>
                <th>IDR</th>
                <th class="price">75,000</th>
                <td>per pax</td>
            </tr>
            <tr>
                <td>Kambing Guling</td>
                <th>IDR</th>
                <th class="price">3,500,000</th>
                <td>for 30 pax</td>
            </tr>
            <tr>
                <td>Camp Area</td>
                <th>IDR</th>
                <th class="price">100,000</th>
                <td>per camp</td>
            </tr>
            <tr>
                <td>Voucher Watersport</td>
                <th>IDR</th>
                <th class="price">100,000</th>
                <td>per camp</td>
            </tr>
            <tr>
                <td>Fun Game</td>
                <th>IDR</th>
                <th class="price">150,000</th>
                <td>per pax</td>
            </tr>
            <tr>
                <td>Team Building</td>
                <th>IDR</th>
                <th class="price" >250,000</th>
                <td>per pax</td>
            </tr>
            <tr>
                <td>Fun Bike</td>
                <th>IDR</th>
                <th class="price" >150,000</th>
                <td>per pax</td>
            </tr>
            <tr>
                <td>Fire Show</td>
                <th>IDR</th>
                <th class="price">3 ,000,000</th>
                <td>per show</td>
            </tr>
            <tr>
                <td>Solo Organ</td>
                <th>IDR</th>
                <th class="price">3 ,500,000</th>
                <td>per 3 hours</td>
            </tr>
            <tr>
                <td>Accoustic Band</td>
                <th>IDR</th>
                <th class="price">6 ,000,000</th>
                <td>per 6 hours</td>
            </tr>
        </table>
    </div>
    <div class="tnc">
        <p><b><u>Terms & Conditions</u></b></p>
        <ul>
            <li>All rates are quoted in IDR and net inclusive of 21% tax and service change unless otherwise stated.</li>
            <li>No blocking of space will be done until a duly signed confirmation letter together with required deposit is received by the hotel hence space is subject to availability</li>
        </ul>
    </div>
    <div style="page-break-before: always;"></div>
    <div class="kop-surat">
        <table style="border:none; border-collapse: collapse;">
            <tr>
                <td style="border:none; text-align:left;"><img src="{{ public_path('logokv.png') }}" alt="Logo KV" style="height: 75px; display: inline-block; "></td>
                <td style="border:none; text-align:center;"><img src="{{ public_path('logotj.png') }}" alt="Logo TJ" style="height: 90px; display: inline-block; "></td>
                <td style="border:none; text-align:right;"><img src="{{ public_path('logolbv.png') }}" alt="Logo LBV" style="height: 75px; display: inline-block;"></td>
            </tr>
        </table>   
    </div>

    <div class="residental">
        <table>
            <tr>
                <th colspan="8" class="title">RESIDENTAL ALLDAY PACKAGE (MEETING)</th>
            </tr>
            <tr><th colspan="8" class="title">Price net Per Pax - min 30 pax</th></tr>
            <tr>
                <th style="width:20%;" class="hoteltype">ALLBOARD</th>
                <th style="width:20%;" class="hoteltype" colspan="2">Kalicaa Villa</th>
                <th style="width:20%;" class="hoteltype" colspan="2">TL Beach Hotel</th>
                <th style="width:20%;" class="hoteltype" colspan="2">Ladda Bay Village</th>
                <th style="width:20%;" class="hoteltype">Inclusive</th>
            </tr>
            <tr>
                <td style="width:20%:"><b>Single (VIP)<br>1 Room for 1 Person</b></td>
                <td style="width:5%:" class="idr">IDR</td>
                <td style="width:15%:" class="idr-price">2,000,000</td>
                <td style="width:5%:" class="idr">IDR</td>
                <td style="width:15%:" class="idr-price">1,500,000</td>
                <td style="width:5%:" class="idr">IDR</td>
                <td style="width:15%:" class="idr-price">1,200,000</td>
                <td style="width:20%:" rowspan="4">
                    <b>
                        1x Breakfast <br>
                        2x Lunch <br>
                        1x Dinner <br>
                        2x Coffee Break <br>
                        Room meeting / others venue for 12 hours <br>
                        Audio system for meeting <br>
                        Screen & infocus <br>
                        Mineral Waters & Mints <br>
                        Memo pads & Pens
                    </b>
                </td>
            </tr>
            <tr>
                <td><b>Twin<br>1 Room for 2 Person</b></td>
                <td class="idr">IDR</td>
                <td class="idr-price">1,500,000</td>
                <td class="idr">IDR</td>
                <td class="idr-price">1,250,000</td>
                <td class="idr">IDR</td>
                <td class="idr-price">1,000,000</td>
            </tr>
            <tr>
                <td><b>Triple (w/extra bed)<br>1 Room for 3 Person</b></td>
                <td class="idr">IDR</td>
                <td class="idr-price">1,250,000</td>
                <td class="idr">IDR</td>
                <td class="idr-price">1,000,000</td>
                <td class="idr">IDR</td>
                <td class="idr-price">850,000</td>
            </tr>
            <tr>
                <td><b>Quodruple (w/extra bed)<br>1 Room for 4 Person</b></td>
                <td class="idr">IDR</td>
                <td class="idr-price">1,000,000</td>
                <td colspan="2">-</td>
                <td colspan="2">-</td>
            </tr>
        </table>
        <br><br>
        <table>
            <tr>
                <th colspan="8" class="title">RESIDENTAL ALLDAY PACKAGE (NON MEETING)</th>
            </tr>
            <tr><th colspan="8" class="title">Price net Per Pax - min 30 pax</th></tr>
            <tr>
                <th style="width:20%;" class="hoteltype">ALLBOARD</th>
                <th style="width:20%;" class="hoteltype" colspan="2">Kalicaa Villa</th>
                <th style="width:20%;" class="hoteltype" colspan="2">TL Beach Hotel</th>
                <th style="width:20%;" class="hoteltype" colspan="2">Ladda Bay Village</th>
                <th style="width:20%;" class="hoteltype">Inclusive</th>
            </tr>
            <tr>
                <td style="width:20%:"><b>Single (VIP)<br>1 Room for 1 Person</b></td>
                <td style="width:5%:" class="idr">IDR</td>
                <td style="width:15%:" class="idr-price">2,000,000</td>
                <td style="width:5%:" class="idr">IDR</td>
                <td style="width:15%:" class="idr-price">1,500,000</td>
                <td style="width:5%:" class="idr">IDR</td>
                <td style="width:15%:" class="idr-price">120%0,000</td>
                <td style="width:20%:" rowspan="4">
                    <b>
                        1x Breakfast <br>
                        2x Lunch <br>
                        1x Dinner <br>
                        Welcome Drink <br>
                        Welcome Dance <br>
                    </b>
                </td>
            </tr>
            <tr>
                <td><b>Twin<br>1 Room for 2 Person</b></td>
                <td class="idr">IDR</td>
                <td class="idr-price">1,500,000</td>
                <td class="idr">IDR</td>
                <td class="idr-price">1,250,000</td>
                <td class="idr">IDR</td>
                <td class="idr-price">1,000,000</td>
            </tr>
            <tr>
                <td><b>Triple (w/extra bed)<br>1 Room for 3 Person</b></td>
                <td class="idr">IDR</td>
                <td class="idr-price">1,250,000</td>
                <td class="idr">IDR</td>
                <td class="idr-price">1,000,000</td>
                <td class="idr">IDR</td>
                <td class="idr-price">850,000</td>
            </tr>
            <tr>
                <td><b>Quodruple (w/extra bed)<br>1 Room for 4 Person</b></td>
                <td class="idr">IDR</td>
                <td class="idr-price">1,000,000</td>
                <td colspan="2">-</td>
                <td colspan="2">-</td>
            </tr>
        </table>
        <br><br>
        <div class="tnc">
            <p><b><u>Terms & Conditions</u></b></p>
            <ul>
                <li>All rates are quoted in IDR and net inclusive of 21% tax and service change unless otherwise stated.</li>
                <li>All rates are valid for the specified event and dates only</li>
                <li>No blocking of space will be done until a duly signed confirmation letter together with required deposit is received by the hotel hence space is subject to availability</li>
                <li>Free Welcome Drinks</li>
                <li>Internet Wi-Fi in Public Area</li>
                <li>Facility: jogging track, table tennis, mini soccer, volley beach and children playground</li>
            </ul>
        </div>
        <div class="assign">
            <br>
            <br>
            <br>
            <br>
                <p><b><u>Arie Thomson</u></b></p>
                <p><b>Head of Hospitality</b></p>
        </div>
    </div>
    
</body>
</html>

