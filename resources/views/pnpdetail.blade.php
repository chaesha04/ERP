<x-layoutinventory>
    <head>
        <x-slot:title>{{ $title }}</x-slot:title>
    </head>
    <main>
        <button>Add New Procurement</button>
        <button>Delete</button>
        <main>
            <div class="container mt-4">
                <table>
                    <thead>
                        <tr>
                            <th>Process ID</th>
                            <th>Vendor</th>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $pnp->id }}</td>
                            <td>{{ $pnp->procurement->vendor->vendor_name }}</td>
                            <td>{{ $pnp->procurement->product }}</td> 
                            <td>{{ $pnp->procurement->qty }}</td> 
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <br><br>
            <h1>Procurement</h1>
            <div class="procurement">
            <div class="detail-procurement">
                <table>
                    <tr>
                        <td>Vendor Name</td>
                        <td>{{ $pnp->procurement->vendor->vendor_name }}</td>
                        <td>Vendor PIC Name</td>
                        <td>{{ $pnp->procurement->vendor->vendor_pic }}</td>
                    </tr>
                    <tr>
                        <td>Vendor Number</td>
                        <td>{{ $pnp->procurement->vendor->vendor_number }}</td>
                        <td>Vendor Email</td>
                        <td>{{ $pnp->procurement->vendor->vendor_email }}</td>

                    </tr>
                    <tr>
                        <td>Place</td>
                        <td>(lupa bikin table)</td>
                        <td>PIC Inventory</td>
                        <td>{{ $pnp->procurement->vendor->pic_inventory }}</td>
                    </tr>
                    <tr>
                        <td>PIC Number</td>
                        <td>{{ $pnp->procurement->vendor->pic_number }}</td>
                    </tr>
            </table>
            </div>
            <br><br>
            <div class="table-procurement">
                <table border="1" cellspacing="0" cellpadding="5">
                    <tr>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price/Qty</th>
                        <th>Total</th>
                    </tr>
                    <tr>
                        <td>{{ $pnp->procurement->product }}</td>
                        <td>{{ $pnp->procurement->qty }}</td>
                        <td>{{ $pnp->procurement->price }}</td>
                        <td>{{ $pnp->procurement->total }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" align="right">Total</td>
                        <td>{{ $pnp->procurement->total }}</td>
                    </tr>
                </table>
            </div>

            </div>
            <br>
            <a href="#"><button>Approve</button></a>

            <br><br>

            <h1>Purchasing</h1>
            <div class="purchasing">
                <div class="detail-purchasing">
                    <table>
                        <tr>
                            <td>Vendor Name</td>
                            <td>{{ $pnp->procurement->vendor->vendor_name }}</td>
                            <td>Vendor PIC Name</td>
                            <td>{{ $pnp->procurement->vendor->vendor_pic }}</td>
                        </tr>
                        <tr>
                            <td>Vendor Number</td>
                            <td>{{ $pnp->procurement->vendor->vendor_number }}</td>
                            <td>Vendor Email</td>
                            <td>{{ $pnp->procurement->vendor->vendor_email }}</td>
                            
                        </tr>
                        <tr>
                            <td>Payment Method</td>
                            <td>{{ $pnp->payment->paymentMethod->payment_method}}</td>
                            <td>Penerima</td>
                            <td>(lupa bikin table)</td>
                        </tr>
                        <tr>
                            <td>Date</td>
                            <td>{{ $pnp->payment->date}}</td>
                            <td>Total Transfer</td>
                            <td>{{ $pnp->payment->total_transfer}}</td>
                        </tr>
                </table>
                </div>
                <br><br>
                <div class="table-purchasing">
                    <table border="1" cellspacing="0" cellpadding="5">
                        <tr>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Price/Qty</th>
                            <th>Total</th>
                        </tr>
                        <tr>
                            <td>{{ $pnp->procurement->product }}</td>
                            <td>{{ $pnp->procurement->qty }}</td>
                            <td>{{ $pnp->procurement->price }}</td>
                            <td>{{ $pnp->procurement->total }}</td>
                        </tr>
                        <tr>
                            <th colspan="3" align="right">Selisih</th>
                            <td>{{ $pnp->procurement->total - $pnp->payment->total_transfer }}  </td>
                        </tr>
                    </table>
                </div>
    
            </div>
            <br>
            <a href="#"><button>Back</button></a>
            <a href="#"><button>Approve</button></a>

            <br><br>

            <h1>Receive</h1>
            <div class="receive">
                <div class="detail-receive">
                    <table>
                        <tr>
                            <td>Vendor Name</td>
                            <td>{{ $pnp->procurement->vendor->vendor_name }}</td>
                            <td>Vendor PIC Name</td>
                            <td>{{ $pnp->procurement->vendor->vendor_pic }}</td>
                        </tr>
                        <tr>
                            <td>Vendor Number</td>
                            <td>{{ $pnp->procurement->vendor->vendor_number }}</td>
                            <td>Vendor Email</td>
                            <td>{{ $pnp->procurement->vendor->vendor_email }}</td>
                            
                        </tr>
                        <tr>
                            <td>Payment Method</td>
                            <td>{{ $pnp->payment->paymentMethod->payment_method}}</td>
                            <td>Penerima</td>
                            <td>(lupa bikin table)</td>
                        </tr>
                        <tr>
                            <td>Place</td>
                            <td>(lupa bikin table)</td>
                            <td>PIC Inventory</td>
                            <td>{{ $pnp->procurement->vendor->pic_inventory }}</td>
                        </tr>
                        <tr>
                            <td>Date</td>
                            <td>{{ $pnp->payment->date}}</td>
                            <td>Total Transfer</td>
                            <td>{{ $pnp->payment->total_transfer}}</td>
                        </tr>
                        <tr>
                            <td>PIC Number</td>
                            <td>{{ $pnp->procurement->vendor->pic_number }}</td>
                        </tr>
                </table>
                </div>
                <br><br>
                <div class="table-receive">
                    <p><b>Table Purchase</b></p>
                    <table border="1" cellspacing="0" cellpadding="5">
                        <tr>
                            <th colspan="2" align="right">Table Purchasing</th>
                        </tr>
                        <tr>
                            <th>Product</th>
                            <th>Qty</th>
                        </tr>
                        <tr>
                            <tr>
                                <td>{{$pnp->payment->purchasing->purchasing_product}}</td>
                                <td>{{$pnp->payment->purchasing->purchasing_qty}}</td>
                            </tr>
                            
                        </tr>
                    </table>
                </div>

                <div class="table-receive">
                    <p><b>Table Receive</b></p>
                    <table border="1" cellspacing="0" cellpadding="5">
                        <tr>
                            <th colspan="2" align="right">Table Receive</th>
                        </tr>
                        <tr>
                            <th>Product</th>
                            <th>Qty</th>
                        </tr>
                        <tr>
                            <tr>
                                <td>{{$pnp->receiving->product_receive}}</td>
                                <td>{{$pnp->receiving->receive_qty}}</td>
                            </tr>
                            
                        </tr>
                    </table>
                </div>

            </div>
            <br>
            <a href="#"><button>Back</button></a>
            <a href="#"><button>Approve</button></a>
        </main> 
    </main>
</x-layoutinventory>
