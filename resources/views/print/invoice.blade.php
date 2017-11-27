@extends('layouts.print') 
@section('content')
<div class="print_container">
  <div class="print__header">
    <div class="print__header__logo">
      <img src="{{ asset('images/toa-logo-print.png') }}">
    </div>
    <div class="print__header__issuer">
      <p class="text-bold">
        บริษัท ทีโอเอ เพ้นท์ (ประเทศไทย) จํากัด
      </p>
      <p>สำนักงาน และศูนต์อุตสาหกรรม ทีโอเอ บางนา-ตราด 31/2 หมู่ 3 ถนนบางนา-ตราด กม.23</p>
      <p>ต.บางเสาธง อ.บางเสาธง จ.สมุทรปราการ 10540 โทร. 02-335-5555</p>
    </div>
    <div class="print__header--option">
      <table cellpadding="0" cellspacing="0">
        <tr>
          <td width="50" align="right" class="text-bold">
            วันที่&nbsp;
          </td>
          <td>01/02/2560</td>
        </tr>
        <tr>
          <td width="50" align="right" class="text-bold">
            เลขที่&nbsp;
          </td>
          <td>TW02001000</td>
        </tr>
      </table>
    </div>
  </div>
  <div class="print__title">
    ใบสั่งซื้อ
  </div>
  <div class="print__client">
    <div class="print__client__left" style="height: 199px">
      <table>
        <tr>
          <td class="text-bold" width="60">
            ชื่อร้านค้า
          </td>
          <td>บริษัท สีเพชรเกษม (1981) จำกัด</td>
        </tr>
        <tr>
          <td class="text-bold" width="60">
            ที่อยู่
          </td>
          <td>ถ.กิ่งแก้ว, เขตลาดกระบัง</td>
        </tr>
        <tr>
          <td class="text-bold" width="60">
            อีเมล์
          </td>
          <td>example@gmail.com</td>
        </tr>
        <tr>
          <td class="text-bold" width="60">
            บริษัทขนส่ง
          </td>
          <td>กิจทองขนส่งโท4482936</td>
        </tr>
      </table>
    </div>
    <div class="print__client__right" style="height: 199px">
      <table>
        <tr>
          <td class="text-bold" width="60">
            วันที่ต้องการ
          </td>
          <td>03/06/2560</td>
        </tr>
        <tr>
          <td class="text-bold" width="60">
            PO Number
          </td>
          <td>PO6007001</td>
        </tr>
        <tr>
          <td class="text-bold" width="60">
            การจัดส่ง
          </td>
          <td>มารับเอง</td>
        </tr>
        <tr>
          <td class="text-bold" width="60">
            การชำระเงิน
          </td>
          <td>เงินสด</td>
        </tr>
        <tr>
          <td class="text-bold" width="60">
            สถานที่ส่ง
          </td>
          <td>ออลมอเตอร์เวย์ k.ประเทือง</td>
        </tr>
        <tr>
          <td class="text-bold" width="60">
            ที่อยู่สถานที่ส่ง
          </td>
          <td>ถ.กิ่งแก้ว, เขตลาดกระบัง</td>
        </tr>
      </table>
    </div>
  </div>
  <div class="print__order">
    <table>
      <thead>
        <tr>
          <th width="30" align="center">
            ลำดับ
          </th>
          <th align="center">
            ผลิตภัณฑ์
          </th>
          <th width="50" align="center">
            จำนวน
          </th>
          <th width="80" align="center">
            ราคา / หน่วย <span class="text-red">*</span>
          </th>
          <th width="80" align="center">
            จำนวนเงิน (บาท)
          </th>
        </tr>
      </thead>
      <tbody>
        @for ($i = 0; $i < 25; $i++) 
          <tr>
            <td align="center">{{ $i + 1 }}</td>
            <td>test</td>
            <td align="center">1 กล่อง</td>
            <td align="right">000.00</td>
            <td align="right">0000.00</td>
          </tr>
        @endfor
      </tbody>
      <tfoot>
        <tr>
          <th colspan="2" align="center">
            ยอดรวมมูลค่าสินค้า (ยังไม่รวม vat)
          </th>
          <th colspan="2" align="center">
            25 รายการ
          </th>
          <th align="right">
            000000.00
          </th>
        </tr>
      </tfoot>
    </table>
  </div>
  <div class="w100 text-red">
    * ราคาต่อหน่วยหลังหักส่วนลดมาตราฐานเท่านั้น
  </div>
</div>
@endsection