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
    Order / Billing Tracking
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
    <div class="text-bold" style="font-size: 20px;">
      ออกบิล
    </div>
    <table class="mt-10 mb-10">
      <thead>
        <tr>
          <th width="70" align="center">เลขที่บิล</th>
          <th width="80" align="center">ใบนำสั่ง / วันเวลา รถออกจากบริษัท</th>
          <th width="80" align="center">
            Fwd Agent
          </th>
          <th width="70" align="center">
            ทะเบียนรถ / ชื่อคนขับรถ
          </th>
          <th width="60" align="center">
            วัน - เวลา <br>รับบิล
          </th>
          <th width="60" align="center">
            รหัสสินค้า
          </th>
          <th align="center">
            ชื่อสินค้า
          </th>
          <th width="50" align="center">
            จำนวนสั่งซื้อ
          </th>
          <th width="55" align="center">
            จำนวนออกบิล
          </th>
          <th width="50" align="center">
            จำนวนเงิน
          </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td align="center">
            1145169341<br>25/8/2560
          </td>
          <td align="center">
            1100641917<br>25/8/2560
          </td>
          <td align="center">
            หจก.ศิรประภาขนส่ง ถณ-4101
          </td>
          <td align="center">
            สวิช ศรสลับ <br> 083-1113949
          </td>
          <td align="center">
            27/08/2560<br>14:12:00
          </td>
          <td>
            F01112330000
          </td>
          <td>
            asdfasdfasdfasdfasfdffdasds
          </td>
          <td align="center">
            0
          </td>
          <td align="center">
            0
          </td>
          <td align="right">
            00000.00
          </td>
        </tr>
      </tbody>
    </table>
    <div class="text-bold" style="font-size: 20px;">
      ยังไม่ออกบิล
    </div>
    <table class="mt-10">
      <thead>
        <tr>
          <th width="100" align="center">
            รหัสสินค้า
          </th>
          <th align="center">
            ชื่อสินค้า
          </th>
          <th width="80" align="center">
            จำนวนสั่งซื้อ
          </th>
          <th width="80"align="center">
            จำนวนออกบิล
          </th>
          <th width="80" align="center">
            จำนวนเงิน
          </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>F01122010000</td>
          <td>asdajsdfasdfasd</td>
          <td>6</td>
          <td>2</td>
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>