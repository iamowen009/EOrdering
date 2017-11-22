@extends('layouts.print')
@section('content')
    <page size="A4">
        <div class="print__container">
            <div class="print__header">
                <div class="print__header--issuer">
                    <img src="{{ asset('images/toa-logo-big.gif') }}">
                    <ul>
                        <li>
                            <strong>บริษัท ทีโอเอ เพ้นท์ (ประเทศไทย) จํากัด</strong>
                        </li>
                        <li>สำนักงาน และศูนต์อุตสาหกรรม ทีโอเอ บางนา-ตราด 31/2 หมู่ 3 ถนนบางนา-ตราด กม.23</li>
                        <li>ต.บางเสาธง อ.บางเสาธง จ.สมุทรปราการ 10540 โทร. 02-335-5555</li>
                    </ul>
                </div>
                <div class="print__header--option">
                    <table>
                        <tr>
                            <td width="50" align="right">
                                <strong>วันที่</strong>
                            </td>
                            <td>{{ $info['requestDate'] }}</td>
                        </tr>
                        <tr>
                            <td width="50" align="right">
                                <strong>เลขที่</strong>
                            </td>
                            <td>{{ $info['documentNumber'] }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="print__title">
                <h2>ใบสั่งซื้อ</h2>
            </div>
            <div class="print__content">
                <div class="print__content--left">
                    <div class="p-10">
                        <table>
                            <tr>
                                <td width="80">
                                    <strong>ชื่อร้านค้า</strong>
                                </td>
                                <td>
                                    {{ $info['customerName'] }}
                                </td>
                            </tr>
                            <tr>
                                <td width="80">
                                    <strong>ที่อยู่</strong>
                                </td>
                                <td>
                                    {{ $info['address'] }} {{ $info['street' ]}} <br>
                                    {{ $info['subDistrictName' ]}} {{ $info['districtName'] }} {{ $info['cityName' ]}} {{ $info['postCode'] }}
                                </td>
                            </tr>
                            <tr>
                                <td width="80">
                                    <strong>โทร</strong>
                                </td>
                                <td>
                                    {{ $info['customerTelNo'] }}
                                </td>
                            </tr>
                            <tr>
                                <td width="80">
                                    <strong>อีเมล</strong>
                                </td>
                                <td>
                                    -
                                </td>
                            </tr>
                            <tr>
                                <td width="80">
                                    <strong>บริษัทขนส่ง</strong>
                                </td>
                                <td>
                                    -
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="print__content--right">
                    <div class="p-10">
                        <table>
                            <tr>
                                <td width="80">
                                    <strong>การจัดส่ง</strong>
                                </td>
                                <td>
                                    -
                                </td>
                            </tr>
                            <tr>
                                <td width="80">
                                    <strong>การชำระเงิน</strong>
                                </td>
                                <td>
                                    {{ ($info['paymentTerm'] == 'CASH') ? 'เงินสด' : 'บัตรเครดิต' }}
                                </td>
                            </tr>
                            <tr>
                                <td width="80">
                                    <strong>สถานที่ส่ง</strong>
                                </td>
                                <td>
                                    -
                                </td>
                            </tr>
                            <tr>
                                <td width="80">
                                    <strong>ที่อยู่สถานที่ส่ง</strong>
                                </td>
                                <td>
                                    -
                                </td>
                            </tr>
                            <tr>
                                <td width="80">
                                    <strong>วันที่ต้องการ</strong>
                                </td>
                                <td>
                                    {{ $info['requestDate'] }}
                                </td>
                            </tr>
                            <tr>
                                <td width="80">
                                    <strong>เลขที่ PO</strong>
                                </td>
                                <td>
                                    {{ $info['customerPO'] }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="print__product">
                <table>
                    <thead>
                        <tr>
                            <th width="30">ลำดับ</th>
                            <th>ผลิตภัณฑ์</th>
                            <th width="80">จำนวน</th>
                            <th align="right" width="80">* ราคา/หน่วย</th>
                            <th align="right" width="100">จำนวนเงิน (บาท)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key => $product)
                            <tr>
                                <td align="center">
                                    {{ $key + 1 }}
                                </td>
                                <td>
                                    {{ $product['productNameTh'] }} 
                                </td>
                                <td align="center">
                                    {{ $product['qty'] }} 
                                </td>
                                <td align="right">
                                    {{ $product['amount'] }}    
                                </td>
                                <td align="right">
                                    {{ $product['totalAmount'] }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2">
                                ยอดรวมมูลค่าสินค้า (ยังไม่รวม vat)
                            </th>
                            <th>{{ count($products) }} รายการ</th>
                            <th></th>
                            <th align="right">
                                {{ $info['totalAmount'] }}
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="print__note text-red">
                * ราคาต่อหน่วยหลังหักส่วนลดมาตราฐานเท่านั้น
            </div>
        </div>
    </page>
@endsection