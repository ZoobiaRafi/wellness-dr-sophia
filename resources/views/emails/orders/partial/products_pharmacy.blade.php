@foreach($OrderInfo->order_products as $op)
	
	@php
		$SessQty    = $op->quantity;
		$ProPrice   = $op->product_detail->pharmacy_price;
	@endphp
	<tr>
		<td class='py-25' style='border-bottom: 1px solid #ebebeb; padding-top: 10px; padding-bottom: 10px;'>
			<table width='100%' border='0' cellspacing='0' cellpadding='0'>
				<tr>
					<th class='column-top' valign='middle' width='180' style='font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:middle;'>
						<table width='100%' border='0' cellspacing='0' cellpadding='0'>
							<tr>
								<td class='text-16 lh-24' style='font-size:14px; color:#6e6e6e; font-family:`PT Sans`, Arial, sans-serif; text-align:left; min-width:auto !important; line-height: 24px;'>
								{{ ucwords(strtolower($op->product_detail->title)) }}
								</td>
							</tr>
						</table>
					</th>
					<!-- <th class='column-top mpb-15' valign='middle' width='20' style='font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:middle;'></th>
					<th class='column-top' valign='middle' width='100' style='font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:middle;'>
						<table width='100%' border='0' cellspacing='0' cellpadding='0'>
							<tr>
								<td class='text-16 lh-24' style='font-size:14px; color:#6e6e6e; font-family:`PT Sans`, Arial, sans-serif; text-align:left; min-width:auto !important; line-height: 24px; text-align: center;'>
									{{ $op->product_detail->model_no }}
								</td>
							</tr>
						</table>
					</th> -->
					<th class='column-top mpb-15' valign='middle' width='20' style='font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:middle;'></th>
					<th class='column-top' valign='middle' width='40' style='font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:middle;'>
						<table width='100%' border='0' cellspacing='0' cellpadding='0'>
							<tr>
								<td class='text-16 lh-24' style='font-size:14px; color:#6e6e6e; font-family:`PT Sans`, Arial, sans-serif; text-align:left; min-width:auto !important; line-height: 24px; text-align: center;'>
									&times;{{ $SessQty }}
								</td>
							</tr>
						</table>
					</th>
					<th class='column-top mpb-15' valign='middle' width='20' style='font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:middle;'></th>
					<th class='column-top' valign='middle' style='font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:middle;'>
						<table width='100%' border='0' cellspacing='0' cellpadding='0'>
							<tr>
								<td class='text-16 lh-24' style='font-size:14px; color:#6e6e6e; font-family:`PT Sans`, Arial, sans-serif; text-align:left; min-width:auto !important; line-height: 24px; text-align: right;'>
									&pound;{{ number_format($ProPrice,0) }}
								</td>
							</tr>
						</table>
					</th>
					<th class='column-top mpb-15' valign='middle' width='20' style='font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:middle;'></th>
					<th class='column-top' valign='middle' style='font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:middle;'>
						<table width='100%' border='0' cellspacing='0' cellpadding='0'>
							<tr>
								<td class='text-16 lh-24' style='font-size:14px; color:#6e6e6e; font-family:`PT Sans`, Arial, sans-serif; text-align:left; min-width:auto !important; line-height: 24px; text-align: right;'>
									&pound;{{ number_format($ProPrice*$SessQty,0) }}
								</td>
							</tr>
						</table>
					</th>
				</tr>
			</table>
		</td>
	</tr>
@endforeach

<tr>
	<td class="pt-30" style="border-top: 1px solid #000001; padding-top: 10px;">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<th class="column-top" valign="top" width="280" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						@if($OrderInfo->comment)
							<tr>
								<td class="text-16" style="font-size:12px; line-height:20px; color:#6e6e6e; font-family:'PT Sans', Arial, sans-serif; text-align:left; min-width:auto !important;">
									<span style='font-weight: bold;'>Remarks:</span> {!! $OrderInfo->comment !!}
								</td>
							</tr>
						@endif
					</table>
				</th>
				<th class="column-top mpb-15" valign="top" width="30" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;"></th>
				<th class="column-top" valign="top" width="180" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td align="right">
								<table border="0" cellspacing="0" cellpadding="0" class="mw-100p">
									<tr>
										<td class="title-20 lh-30 a-right mt-left pt-10" style="font-size:20px; color:#282828; font-family:'PT Sans', Arial, sans-serif; min-width:auto !important; line-height: 30px; text-align:right; padding-top: 10px;">
											<strong>TOTAL:</strong>
										</td>
										<td class="img mw-15 pt-10" style="width: 10px; font-size:0pt; line-height:0pt; text-align:left; padding-top: 10px;"></td>
										<td class="title-20 lh-30 c-purple pt-10 mt-right" style="font-size:20px; font-family:'PT Sans', Arial, sans-serif; text-align:left; min-width:auto !important; line-height: 30px; color:#0b1f8f; padding-top: 10px;">
											<strong>&pound;{{ number_format($OrderInfo->order_total,0) }}</strong>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</th>
			</tr>
		</table>
	</td>
</tr>