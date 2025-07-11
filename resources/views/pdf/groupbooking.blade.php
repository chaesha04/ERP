<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Group Booking Confirmation</title>
    <style>
        @page {
            margin: 0.7cm;
        }

        * {
            font-family: "Times New Roman", Times, serif;
            box-sizing: border-box;
        }

        body {
            font-family: sans-serif;
            margin: 0;
            padding: 1cm;
            font-size: 12px;
        }

        table {
            width: 100%;
            table-layout: fixed;
            border-collapse: collapse;
        }

        .main-table {
            margin-top: 20px;
        }

        .summary-table {
            background-color: #d9e1f2;
            margin-top: 20px;
        }

        .note-table,
        .budget-table {
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
            word-break: break-word;
        }

        .no-border td {
            border: none;
        }

        .text-block {
    margin-top: 20px;
    word-wrap: break-word;
    word-break: break-word;
    text-align: justify;
    letter-spacing: -0.3px; 
    line-height: 1.2; 
    }
    .text-block ul {
        margin-top: 3px;
        margin-bottom: 3px;
        padding-left: 18px;
    }
    .text-block li {
        margin-bottom: 2px; 
    }


        ul {
            padding-left: 20px;
            margin-top: 10px;
            text-align: justify;
        }

        li {
            margin-bottom: 6px;
            word-break: break-word;
        }

        .footer {
        position: fixed;
        bottom: 0;
        left: 0px;
        right: 0;
        height: 100px;
        font-size: 12px;
        text-align: left;
        z-index: 1000;
        justify-content: center;    
        letter-spacing: -0.3px; 
        line-height: 1.2; 
        margin-left: 25px;
        font-style: italic;
    }

    .footer-table {
        width: 100%;
        border: none;
        justify-content: center;
    }

    .footer-table td {
        border: none;
        padding: 5px;
    }
    </style>
</head>
<body>
    <div class="footer">
        <hr style="border: 1px solid black; margin-top: 10px;">
        <table class="footer-table">
            <tr>
                <td style="text-align:left;">Tanjung Lesung Sales Office</td>
                <td style="text-align:center;">Tanjung Lesung Beach Hotel & Resort</td>
            </tr>          
            <tr>
                <td style="text-align: left;">Jl. KH.Mas Mansyur Kav.126 Karet Tengsin</td>
                <td style="text-align: center;">Tanjung Lesung Kav. R 14 A PO BOX 03</td>
            </tr>  
            <tr>
                <td style="text-align: left;">Jakarta - Pusat</td>
                <td style="text-align: center;">Pandeglang – 42281 BANTEN</td>
            </tr>
            <tr>
                <td style="text-align: left;">Menara Batavia Lt.GF</td>
            </tr>            
        </table>
    </div>
    <div class="kop-surat">
        <table style="border:none; border-collapse: collapse;">
            <tr>
                <td style="border:none; text-align:left;"><img src="{{ public_path('logokv.png') }}" alt="Logo KV" style="height: 75px; display: inline-block; "></td>
                <td style="border:none; text-align:center;"><img src="{{ public_path('logotj.png') }}" alt="Logo TJ" style="height: 90px; display: inline-block; "></td>
                <td style="border:none; text-align:right;"><img src="{{ public_path('logolbv.png') }}" alt="Logo LBV" style="height: 75px; display: inline-block;"></td>
            </tr>
        </table>   
        <hr style="border: 2px solid black; margin-top: 10px;">
    </div>

    <table class="main-table">
        <tr>
            <td style="vertical-align: top; width: 50%;">
                <div style="text-align: center; font-weight: bold; margin-bottom: 10px;">
                    {{ $groupbooking->slug }}
                </div>
                <table class="no-border">
                    <tr><td>Sales Person:</td><td>{{ $groupbooking->SalesDetail->name }}</td></tr>
                    <tr><td>Title:</td><td>{{ $groupbooking->SalesDetail->division }}</td></tr>
                    <tr><td style="padding-top: 20px;">Date Prepared:</td><td style="padding-top: 20px;">{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</td></tr>
                </table>
            </td>
            <td style="vertical-align: top; width: 50%;">
                <div style="text-align: center; font-weight: bold; margin-bottom: 10px;">
                    CONFIRMATION LETTER - REVISION
                </div>
                <table class="no-border">
                    <tr><td>To</td><td>{{ $groupbooking->VisitorDetail->visitor_name }}</td></tr>
                    <tr><td>Company</td><td>{{ $groupbooking->VisitorDetail->group_name }}</td></tr>
                    <tr><td>Address</td><td>{{ $groupbooking->VisitorDetail->group_address }}</td></tr>
                    <tr><td>Mobile</td><td>{{ $groupbooking->VisitorDetail->phone_number }}</td></tr>
                </table>
            </td>
        </tr>
    </table>

    <div>
        <h4><i>Warmest greetings from Tanjung Lesung Beach Hotel!</i></h4>
        <p>Following to our correspondence, we have pleasure in submitting the enclosed agreement based on your preliminary requirements.</p>
        <p>Kindly sign back this proposal/agreement as acceptance of all terms & conditions by the latest by:</p>
        <table style="border: none; padding: 0; border-collapse: collapse; width: 100%;">
            <tr>
                <td style="border:0; padding:0;width: 35%;">Group Name</td>
                <td style="border:0; padding:0;width: 5%;">:</td>
                <td style="border:0; padding:0;width: 60%;">"{{ $groupbooking->VisitorDetail->group_name }}"</td>
            </tr>
            <tr>
                <td style="border:0; padding:0;">Arrival Date</td>
                <td style="border:0; padding:0;">:</td>
                <td style="border:0; padding:0;">{{ $groupbooking->check_in }}</td>
            </tr>
            <tr>
                <td style="border:0; padding:0;">Departure Date</td>
                <td style="border:0; padding:0;">:</td>
                <td style="border:0; padding:0;">{{ $groupbooking->check_out }}</td>
            </tr>
            <tr>
                <td style="border:0; padding:0;">Total of Person</td>
                <td style="border:0; padding:0;">:</td>
                <td style="border:0; padding:0;">{{ ($groupbooking->adult)+($groupbooking->child)+$groupbooking->baby }} Pax ({{ $groupbooking->adult }} Adult + {{ $groupbooking->child }} Children + {{ $groupbooking->baby}} Baby)</td>
            </tr>
            <tr>
                <td style="border:0; padding:0;">Total of Room</td>
                <td style="border:0; padding:0;">:</td>
                <td style="border:0; padding:0;">{{ $groupbooking->qty_room }} Room + {{ $groupbooking->extrabed }} Extra Bed</td>
            </tr>
            <tr>
                <td style="border:0; padding:0;">Total of Night</td>
                <td style="border:0; padding:0;">:</td>
                <td style="border:0; padding:0;">{{ $groupbooking->night }} Night</td>
            </tr>
            <tr>
                <td style="border:0; padding:0;">Rate</td>
                <td style="border:0; padding:0;">:</td>
                <td style="border:0; padding:0;">{{ $groupbooking->rate_desc }}</td>
            </tr>
            <tr>
                <td style="border:0; padding:0;">Check In Time</td>
                <td style="border:0; padding:0;">:</td>
                <td style="border:0; padding:0;">
                    14.00 PM
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    Check Out Time : 11.00 PM
                </td>
            </tr>
        </table>
        

    </div>

    <table class="budget-table">
        <tr><td colspan="9" style="border-top:1px solid black; border-left:1px solid black; border-right:1px solid black; border-bottom:none; text-align: center; font-weight: bold;">BUDGET ESTIMATED<br>{{ $groupbooking->hotel_name }}</td></tr>
        <tr><td colspan="9" style="border-top:none; border-left:1px solid black; border-right:1px solid black; border-bottom:none;">Fullboard Package</td></tr>
        <tr>
            <td style="width:16%;border-top:none; border-left:1px solid black; border-right:none; border-bottom:none; width: 20%;">Twin Share Occp.</td>
            <td style="width:5%;  text-align: center; border: none;">:</td>
            <td style="width:16%;border: none; text-align: right;">{{ (number_format($groupbooking->twinroom_price, 0, ',', '.')) }}</td>
            <td style="width:5%; text-align:center; border: none; ">x</td>
            <td style="width:16%;border: none; text-align: center; ">{{ $groupbooking->twin_room }}</td>
            <td style="width:5%; border: none; text-align:center;">x</td>
            <td style="width:16%;border: none; text-align: center; ">{{ $groupbooking->night }}</td>
            <td style="width:5%; border: none;  text-align: center;"> = </td>
            <td style="width:16%;border-top:none; border-left:none; border-right:1px solid black; border-bottom:none; width: 25%; text-align: right;">{{ (number_format(($groupbooking->twinroom_price)*($groupbooking->twin_room)*($groupbooking->night), 0, ',', '.')) }}</td>
        </tr>
        <tr>
            <td style="border-top:none; border-left:1px solid black; border-right:none; border-bottom:none;">Triple Share Occp.</td>
            <td style=" text-align: center; border: none;">:</td>
            <td style="border: none; text-align: right">{{ number_format(($groupbooking->tripleroom_price), 0, ',', '.') }}</td>
            <td style="text-align:center; border: none; ">x</td>
            <td style="border: none; text-align: center;">{{ $groupbooking->triple_room }}</td>
            <td style="border: none; text-align:center;">x</td>
            <td style="border: none; text-align: center;">{{ $groupbooking->night }}</td>
            <td style="border: none; text-align: center;"> = </td>
            <td style="border-top:none; border-left:none; border-right:1px solid black; border-bottom:none; text-align: right">{{ (number_format(($groupbooking->tripleroom_price)*($groupbooking->triple_room)*($groupbooking->night),0,',','.')) }}</td>
        </tr>
        <tr>
            <td style="border-top:none; border-left:1px solid black; border-right:none; border-bottom:none;">Children</td>
            <td style=" text-align: center; border: none;">:</td>
            <td style="border: none; text-align: right">{{ number_format(($groupbooking->childroom_price), 0, ',', '.') }}</td>
            <td style="text-align:center; border: none; ">x</td>
            <td style="border: none; text-align: center;">{{ $groupbooking->child_room }}</td>
            <td style="border: none; text-align:center;">x</td>
            <td style="border: none; text-align: center;">{{ $groupbooking->night }}</td>
            <td style="border: none; text-align: center;"> = </td><td style="border-top:none; border-left:none; border-right:1px solid black; border-bottom:none; text-align: right"> {{ number_format(($groupbooking->childroom_price)*($groupbooking->child_room)*($groupbooking->night), 0, ',', '.') }}</td>
        </tr>
        <tr style="border: none; font-weight: bold;">
            <td colspan="5" style="border-top:none; border-left:1px solid black; border-right:none; border-bottom:none;"></td>
            <td colspan="2" style="background-color:rgb(191, 216, 237); border: none; text-align: left">Total</td>
            <td colspan="2" style="background-color:rgb(191, 216, 237); border-top:none; border-left:none; border-right:1px solid black; border-bottom:none; text-align: right">{{ number_format($groupbooking->grand_total, 0, ',','.') }}</td>
        </tr>
        <tr style="border: none; font-weight: bold;">
            <td colspan="5" style="border-top:none; border-left:1px solid black; border-right:none; border-bottom:none;"></td>
            <td colspan="2" style="background-color:rgb(191, 216, 237); border: none; color: red; text-align: left;">Deposit</td>
            <td colspan="2" style="background-color:rgb(191, 216, 237); border-top:none; border-left:none; border-right:1px solid black; border-bottom:none; color: red; text-align: right;">{{ number_format($groupbooking->deposit, 0, ',','.') }}</td>
        </tr>
        <tr style="border: none; font-weight: bold;">
            <td colspan="5" style="border-top:none; border-left:1px solid black; border-right:none; border-bottom:none;"></td>
            <td colspan="2" style="background-color:rgb(191, 216, 237); border: none;text-align:left;">Balance</td>
            <td colspan="2" style="background-color:rgb(191, 216, 237); border-top:none; border-left:none; border-right:1px solid black; border-bottom:none; text-align: right">{{number_format(($groupbooking->grand_total - $groupbooking->deposit),0,',','.')}}</td>
        </tr>
        <td colspan="9" style="border-top:none; border-left:1px solid black;solid black; border-bottom:1px solid black;">
            <b>All Rate are Inclusive of:</b><br><br>
            • 21% government tax service charge.<br>
            • Welcome Dance<br>
            • Welcome Drink<br>
            • Accommodation Room 2D1N at Cottage<br>
            • 1x Breakfast, 1x Lunch & 1x Dinner<br>
            • Free Entry to Lalassa Beach Club & Bodur Beach<br>
            • Hotel facility: swimming pool, jogging track, table tennis, mini soccer & volley beach
        </td>
    </table>

    <div style="page-break-before: always;"></div>


    <div class="text-block">
        <b>GROUP RATE POLICY:</b>
        <ul>
            <li>Your special rate only valid for the above mentioned group and cannot be used for future reference.</li>
            <li>This group booking contract remains confidential between both parties and any disclosure will automatically terminate this agreement.</li>
        </ul>
    </div>

    <div class="text-block" style="justify-content: center;">
        <b>BILLING INSTRUCTION & PAYMENT METHOD:</b>
        <ul>
            <li>A pro-forma invoice will be sent to the client after the hotel receives the signed agreement.</li>
            <li>Payment can be made in cash, bank transfer, or credit card.</li>
            <li>The Hotel reserves the right to reject any application for a credit facility without assigning any reason.</li>
            <li>All the deposit payment is non-refundable.</li>
            <li>The contract signatory is personally liable to pay all monies in full pursuant to this agreement.</li>
        </ul>
    </div>

    <div class="text-block" style="text-align: center">
        <table>
            <tr>
                <td colspan="5" style="border:0; text-align: center; font-weight: bold;">In the event of bank transfer, please transfer all payment to our account as follow:</td>
            </tr>
            <tr>
                <td style="font-weight:bold; border:0; width: 30%"></td>
                <td style="font-weight:bold; border:0; width: 14">Bank Name</td>
                <td style="font-weight:bold; border:0; width: 2% ">:</td>
                <td style="font-weight:bold; border:0; width: 14">Bank Central Asia</td>
                <td style="font-weight:bold; border:0; width: 30%"></td>
            </tr>
            <tr>
                <td style="font-weight:bold; border: 0;"></td><td style="font-weight:bold; border: 0;">Bank Branch</td><td style="font-weight:bold; border: 0;">:</td><td style="font-weight:bold; border: 0;">Labuan</td><td style="font-weight:bold; border: 0;"></td>
            </tr>
            <tr>
                <td style="font-weight:bold; border: 0;"></td><td style="font-weight:bold; border: 0;">Account Number</td><td style="font-weight:bold; border: 0;">:</td><td style="font-weight:bold; border: 0;">493 – 030 – 6148</td><td style="font-weight:bold; border: 0;"></td>
            </tr>
            <tr>
                <td style="font-weight:bold; border: 0;"></td><td style="font-weight:bold; border: 0;">Under Name</td><td style="font-weight:bold; border: 0;">:</td><td style="font-weight:bold; border: none;">PT. Banten West Java</td><td style="font-weight:bold; border: none;"></td>
            </tr>
        </table>
    </div>


    <div class="text-block">
        <b>Payment Terms:</b>
        <ul>
            <li>50% DEPOSIT is required upon confirmation and balance should be settled <i><b>at the latest 21 days prior to group arrival.</b></i></li>
            <li>Any additional expenses must be settled upon departure.</li>
        </ul>
    </div>

    <div class="text-block">
        <b>CANCELLATION PROCEDURE:</b>
        <ul>
            <li>Hotel will allow a partial cancellation of rooms blocked without incurring any penalty based on hotel policy.</li>
            <li>Any cancellation above the following days will be subject to penalty equivalent to one (1) room night rate for each cancelled room night.</li>
            <li>Balance settlement needs to be settled at the latest 1 day prior to group arrival after receiving complete documents for invoicing method.</li>
            <li>Cancellation policy applied <b>at the latest 14 days prior to group arrival.</b></li>
            <li>Rooming list and meeting agenda should be received <b>at the latest 3 days prior to arrival.<b></li>
            <li>Any revision and reduction <b>at the latest 3 days prior to group arrival.</b></li>
        </ul>
    </div>

    <div class="text-block">
        <b>FORCE MAJEURE:</b>
        <ul>
            <li>If for any beyond its control, but no limited to strike, labor dispute, accident, act of war, natural 
                disaster, weather conditions and other emergency circumstances, the hotel is unable to perform its 
                obligation under this agreement without further liability of any nature, upon return of the clients 
                deposit. The hotel shall not be liable for any consequential damages or any nature for any consequential 
                damages or any nature for any reason whatever. </li>
        </ul>
    </div>

    <div class="text-block">
        <b>Signature</b>
        <ul>
            <b><i>Please acknowledge acceptance by signing and returning the signed copy of the form by “{{ $groupbooking->VisitorDetail->group_name }}”.  If not received as required, the above room rates will be deemed
                to have lapsed and the hotel reserves the right to withdraw our offer. </i></b>
        </ul>
    </div>

    <table class="note-table" style="border: 0; width: 100%;">
        <tr>
            <th colspan="2" style="border: 0;">Offered By</th>
            <th colspan="1" style="border: 0;">Agreed By</th>
        </tr>
        <tr>
            <th style="border: none;" colspan="2">{{ $groupbooking->hotel_name }}</th>
            <th style="border: none;">{{ $groupbooking->VisitorDetail->group_name }}</th>
        </tr>
        <tr>
            <th style="border:none; height: 68px"></th>
            <th style="border:none; height: 68px"></th>
            <th style="border:none; height: 68px"></th>
        </tr>
        <tr>
            <th style="border: none;">{{ $groupbooking->SalesDetail->name }}</th>
            <th style="border: none;">Arie Thomson</th>
            <th style="font-weight:bold; border: none;">Name:</th>
        </tr>
        <tr>
            <th style="border: none;">{{ $groupbooking->SalesDetail->role }}</th>
            <th style="border: none;">Head of Sales Hospitality</th>
            <th style="font-weight:bold; border: none;">Title:</th>
        </tr>
        <tr>
            <th style="border: none;"></th>
            <th style="border: none;"></th>
            <th style="font-weight:bold; border: none;">Date: </th>
        </tr>
    </table>
</body>
</html>
