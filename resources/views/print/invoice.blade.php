@extends('layouts.print')
@section('content')
    <div class="print__container">
        <div class="print__header">
            <div class="print__header--issuer">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAACpCAMAAABZLoJTAAAABGdBTUEAALGPC/xhBQAAAwBQTFRF+/v9////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////AAAA/fz9AABw60U760Q57Ek/hYzAt7va3N3s7u/2RE6f/vX03+Hv7VlQ7VdO5hIG4uTwvcDd8PH37l9WICyMbna0ZGyvf4W9qK3S85CK8oN9tLfYSFKg2tzs8oaA72lh/e7tPUebjZPE85WP+cXC/Orp9J2Y8ouE9JmU97Kt9/f7Vl+n9q2o60E27VZM9aWgTlej8HJr721l9aCb7FFI/OPi/f7+2Nrr8Xly+/v8+crH+tLP8X941dfp8/T56+31QUudanGyUVql+9fV+L26/Obl+c7LnKHMJDCOoKXOr7TW7E1D7mRbMTyU+fn86OnzxsniLjmTztDlpanQl53JKzaR6CkdlJrIwsXf+97c5xoOXGSreH+5yszjj5XF6CQY+fr86S4i//7+97i0/fLxub3b/vj36jsw6TMoiI7B5QsAHSmK5x4SNUCXZ2+wo6jPCBV/JzKP5hcK5QwA5hUICheA+vv8N0GX0dTn5AUA5hUJHyuLEh6E5ObxOkSZc3q25QkAAQ58/vr5GiWI5AEAGyeJ+/z9DBiBSFGgAAt65Q0A/v38g4m+q6/TIS2M5hMG/vv7EByEHCiJFCCFDhqC/P39/f3+Ex+F5RAD+vr8iY/CYGmt9aij+MK+GyaJBhN+BBF95AcAGCSH5Q8B+Pj7FiKG5hQH+fn7//79GSWI/v7/FyOH5hIF////RTYihgAAAFN0Uk5T+hjp6ObTHvdSHHlnECh9GuVCaRmyd+e97iZrFmGCcxIO7PaZzmVbMPAUpIf0rgnRtro1lFUfOkdMyT4rjdoj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">
                <ul>
                    <li style="font-size: 23px;">
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
                        <td class="pl-5">{{ $info['requestDate'] }}</td>
                    </tr>
                    <tr>
                        <td width="50" align="right">
                            <strong>เลขที่</strong>
                        </td>
                        <td class="pl-5">{{ $info['documentNumber'] }}</td>
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
                                {{ $info['address'] }} {{ $info['street' ]}} {{ $info['subDistrictName' ]}}  <br>
                                {{ $info['districtName'] }} {{ $info['cityName' ]}} {{ $info['postCode'] }}
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
                    <th align="center" width="30">ลำดับ</th>
                    <th>ผลิตภัณฑ์</th>
                    <th align="center" width="50">จำนวน</th>
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
                            {{ number_format($product['amount'], 2, '.', ',') }}
                        </td>
                        <td align="right">
                            {{ number_format($product['totalAmount'], 2, '.', ',') }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th colspan="2">
                        ยอดรวมมูลค่าสินค้า (ยังไม่รวม vat)
                    </th>
                    <th align="center">
                        {{ count($products) }} รายการ
                    </th>
                    <th></th>
                    <th align="right">
                        {{ number_format($info['totalAmount'], 2, '.', ',') }}
                    </th>
                </tr>
                </tfoot>
            </table>
        </div>
        <div class="print__note text-red">
            * ราคาต่อหน่วยหลังหักส่วนลดมาตราฐานเท่านั้น
        </div>
    </div>
@endsection