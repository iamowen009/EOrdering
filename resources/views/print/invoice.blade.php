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
    <div class="print__client__left" style="height: 350px"> <!--199-->
      <table>
        <tr>
          <td class="text-bold" width="60">
            ชื่อร้านค้า
          </td>
          <td>@{{ inv.customerCode }} : @{{ inv.customerName }}</td>
        </tr>
        <tr ng-hide="inv.cityCode =='' || inv.cityCode == null">
          <td class="text-bold text-blue">ที่อยู่</td>
          <td>@{{ inv.address }} &nbsp;@{{inv.street}} &nbsp;@{{inv.subDistrictName}}
            <br>&nbsp;@{{inv.districtName}} &nbsp;@{{inv.cityName}}
          </td>
        </tr>
        <!-- <tr ng-if="inv.cityCode =='' || inv.cityCode == null">
          <td class="text-bold text-blue">ที่อยู่</td>
        <td>-</td>
        </tr> -->
        <tr ng-hide="inv.customerEmail == '' || inv.customerEmail == null">
          <td class="text-bold text-blue">อีเมล</td>
          <td>@{{ inv.customerEmail }}</td>
        </tr>
        <!-- <tr ng-if="inv.customerEmail == '' || inv.customerEmail == null">
          <td class="text-bold text-blue">อีเมล</td>
          <td>-</td>
        </tr> -->
        <tr ng-hide="inv.customerTelNo == '' || inv.customerTelNo == null">
          <td class="text-bold" width="60">โทรศัพท์</td>
          <td>@{{ inv.customerTelNo }}</td>
        </tr>
        <!-- <tr ng-if="inv.customerTelNo == '' || inv.customerTelNo == null">
          <td class="text-bold" width="60">โทรศัพท์</td>
          <td>-</td>
        </tr> -->
        <tr ng-hide="inv.shipName == '' || inv.shipName == null">
          <td class="text-bold" width="60">สถานที่ส่ง</td>
          <td> @{{inv.shipCode.substring(2, 10)}} : @{{ inv.shipName }}</td>
        </tr>
        <tr ng-hide="inv.shipName == '' || inv.shipName == null">
          <td class="text-bold" width="60">ที่อยู่สถานที่ส่ง</td>
          <td>@{{ inv.shipHouseNo }} @{{ inv.shipAddress }} @{{ inv.shipDistrictName }} @{{ inv.shipCityName }} @{{ inv.shipPostCode
            }}</td>
        </tr>
        <!-- <tr ng-if="inv.shipName == '' || inv.shipName == null">
          <td class="text-bold text-blue">สถานที่ส่ง</td>
          <td>-</td>
        </tr>
        <tr ng-if="inv.shipName == '' || inv.shipName == null">
          <td class="text-bold text-blue">ที่อยู่สถานที่ส่ง</td>
          <td>-</td>
        </tr> -->
      </table>
    </div>
    <div class="print__client__right" style="height: 199px">
      <table>
        <tr>
          <td class="text-bold" width="60"> 
            เลขที่ใบสั่งซื้อ 
          </td>
          <td>@{{ inv.documentNumber }} 
                    <span class="text-bold text-blue"> / วันที่</span> @{{ inv.documentDate | date:'dd/MM/yyyy' }}
          </td>
        </tr>
        <!-- <tr ng-if="inv.customerPO == '' || inv.customerPO == null">
        <td class="text-bold" width="60">PO number</td>
        <td>-</td>
        </tr> -->
        <tr ng-hide="inv.customerPO == '' || inv.customerPO == null">
        <td class="text-bold" width="60">
          PO number</td>
          <td>@{{ inv.customerPO }}</td>
        </tr>
        <tr ng-hide="inv.requestDate == '' | inv.requestDate == null">
          <td class="text-bold" width="60">Request Date</td>
          <td>@{{ inv.requestDate | date:'dd/MM/yyyy' }}</td>
        </tr>
        <!-- <tr ng-if="inv.requestDate == '' || inv.requestDate == null">
          <td class="text-bold" width="60">Request Date</td>
          <td>-</td>
        </tr> -->

        <tr>
          <td class="text-bold" width="60">การชำระเงิน</td>
          <td>@{{ inv.paymentTerm === 'CASH' || inv.paymentTerm === 'CA02' ? 'เงินสด' :( inv.paymentTerm !== 'CASH' ? 'เครดิต' : '' ) }}</td>
        </tr>
        <tr ng-hide="inv.transportZoneDesc == '' || inv.transportZoneDesc == null">
          <td class="text-bold" width="60">จัดส่งโดย</td>
          <td>@{{ inv.transportZone }} : @{{ inv.transportZoneDesc }}</td>
        </tr>
        <!-- <tr ng-if="inv.shipCondition == '01' && inv.isReceive !== null">
          <td class="text-bold" width="60">จัดส่งโดย</td>
          <td>ลูกค้ารับสินค้าเอง</td>
        </tr> -->
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
@section('footer')
<script src="<?= asset('app/controllers/orderController.js') ?>"></script>
<script src="<?= asset('node_modules/ng-flat-datepicker/dist/ng-flat-datepicker.js') ?>"></script>
<script src="<?= asset('vendors/nestable/jquery.nestable.js') ?>"></script>
@stop