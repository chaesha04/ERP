<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Guarantee Letter</title>
  <style>
    body {
      font-family: 'Times New Roman', Times, serif;
      margin: 40px;
      line-height: 1.6;
    }
    .center {
      text-align: center;
      font-weight: bold;
      margin-bottom: 30px;
    }
    .content {
      max-width: 700px;
    }
    .field {
      display: flex;
      margin-bottom: 5px;
    }
    .field span:first-child {
      width: 140px;
      display: inline-block;
    }
  </style>
</head>
<body>
  <div class="content">
    <div class="center">GUARANTEE LETTER</div>

    <p>To&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Tanjung Lesung Resort Management<br>
       Subject&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Guarantee Letter</p>

    <p>Dear Sir/Madam<br>
    With Respect,</p>

    <p>Kindly accept this letter as a Guarantee Letter for {{ $groupbooking->ProductDetail->hotel_name }} and Full Board Package Booking in Tanjung Lesung Beach Hotel & Villa upon agreement. The detail as follow:</p>
    @php
    use Carbon\Carbon;
    Carbon::setLocale('id'); 
    @endphp

    <div class="field">
      <span>Date</span>: 
      {{ Carbon::parse($groupbooking->check_in)->format('l, d F Y') }} - 
      {{ Carbon::parse($groupbooking->check_out)->format('l, d F Y') }}
    </div>
    <div class="field"><span>Nama Event</span>: </div>
    <div class="field"><span>Total</span>: </div>

    @php
      $paymentDeadline = Carbon::parse($groupbooking->check_in)->addWeeks(3);
    @endphp

    <p>
      Please accept by way of this letter, our payment will be made maximum on 
      {{ $paymentDeadline->format('jS F Y') }}.<br>
      Thank you for your understanding.
    </p>

    <br><br><br>
    <table style="width: 40%">
        <tr><td></td></tr>
        <tr><td><hr></td></tr>
        <tr><td>{{ $groupbooking->VisitorDetail->visitor_name }}</td></tr>
    </table>
  </div>
</body>
</html>
