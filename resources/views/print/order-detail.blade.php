@extends('layouts.print') 
@section('content')
<div class="print_container landscape">
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
    รายละเอียดการสั่งซื้อ
  </div>
  <div class="print__client">
    <div class="print__client__full">
      <div class="print__client__full__left">
        <table>
          <tr>
            <td class="text-bold" width="60">
              ชื่อร้านค้า
            </td>
            <td>บริษัท สีเพชรเกษม (1981) จำกัด</td>
          </tr>
          <tr>
            <td class="text-bold" width="60">
              เลขใบสั่งซื้อ
            </td>
            <td>110000000000</td>
          </tr>
          <tr>
            <td class="text-bold" width="60">
              เลขเอกสารอ้างอิง
            </td>
            <td>123456789 วันที่ 24/08/2560</td>
          </tr>
        </table>
      </div>
      <div class="print__client__full__right">
        <table>
          <tr>
            <td class="text-bold" width="60">
              สถานที่จัดส่ง
            </td>
            <td>19010032 อมรเคหะกิจ</td>
          </tr>
          <tr>
            <td class="text-bold" width="60">
              จัดส่ง
            </td>
            <td>B13 สุขุมวิท 130-อุดมสุขมประเวศ, อ.</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <div class="print__order">
    <table>
      <thead>
        <tr>
          <th align="center">
            รายการสินค้า
          </th>
          <th align="center" width="50">
            สั่งซื้อ
          </th>
          <th align="center" width="50">
            ออกบิล
          </th>
          <th align="center" width="50">
            การจอง
          </th>
          <th align="center" width="50">
            คงค้าง
          </th>
          <th align="center" width="50">
            ยกเลิก
          </th>
          <th align="center" width="50">
            หน่วย
          </th>
        </tr>
      </thead>
      <tbody>
        @for ($i = 0; $i < 5; $i++)
          <tr>
            <td>F000001231213 สีทาไม้</td>
            <td align="center">
              5
            </td>
            <td align="center">
              5
            </td>
            <td align="center">
              5
            </td>
            <td align="center">
              5
            </td>
            <td align="center">
              5
            </td>
            <td align="center">
              5
            </td>
          </tr>
        @endfor
      </tbody>
      <tfoot>
        <tr>
          <th align="center">
            รวม
          </th>
          <th align="center">
            0
          </th>
          <th align="center">
            0
          </th>
          <th align="center">
            0
          </th>
          <th align="center">
            0
          </th>
          <th align="center">
            0
          </th>
          <th align="center">
            0
          </th>
        </tr>
      </tfoot>
    </table>
  </div>
  <div class="print__note">
    <span class="text-bold" style="font-size: 20px;">
      ออกบิล
    </span>
    <table>
      <tr>
        <td width="35">สั่งซื้อ</td>
        <td>จำนวนสินค้าที่สั่งซื้อ</td>
      </tr>
      <tr>
        <td width="35">ออกบิล</td>
        <td>จำนวนสินค้าที่เปิดบิลแล้ว</td>
      </tr>
      <tr>
        <td width="35">การจอง</td>
        <td>จำนวนสินค้าที่ได้รับการจองและเปิดบิล</td>
      </tr>
      <tr>
        <td width="35">คงค้าง</td>
        <td>จำนวนสินค้ารอดำเนินการ</td>
      </tr>
      <tr>
        <td width="35">ยกเลิก</td>
        <td>จำนวนสินค้าที่ทำการยกเลิก</td>
      </tr>
    </table>
  </div>
</div>