<!-- business information here -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- <link rel="stylesheet" href="style.css"> -->
        <title>Receipt-{{$receipt_details->invoice_no}}</title>
    </head>
    <body>
        <div class="ticket">

        	<!-- Logo -->
        	@if(!empty($receipt_details->logo))
            	<img class="center-block" src="{{$receipt_details->logo}}" alt="Logo">
            @endif


            <p class="centered">

            	<!-- Header text -->
            	@if(!empty($receipt_details->header_text))
            		<span class="headings">{!! $receipt_details->header_text !!}</span>
					<br/>
				@endif

				<!-- business information here -->
				@if(!empty($receipt_details->display_name))
					<span class="headings">
						{{$receipt_details->display_name}}
					</span>
					<br/>
				@endif
				
				@if(!empty($receipt_details->address))
					{!! $receipt_details->address !!}
					<br/>
				@endif

				{{--
				@if(!empty($receipt_details->contact))
					<br/>{{ $receipt_details->contact }}
				@endif
				@if(!empty($receipt_details->contact) && !empty($receipt_details->website))
					, 
				@endif
				@if(!empty($receipt_details->website))
					{{ $receipt_details->website }}
				@endif
				@if(!empty($receipt_details->location_custom_fields))
					<br>{{ $receipt_details->location_custom_fields }}
				@endif
				--}}

				@if(!empty($receipt_details->sub_heading_line1))
					{{ $receipt_details->sub_heading_line1 }}<br/>
				@endif
				@if(!empty($receipt_details->sub_heading_line2))
					{{ $receipt_details->sub_heading_line2 }}<br/>
				@endif
				@if(!empty($receipt_details->sub_heading_line3))
					{{ $receipt_details->sub_heading_line3 }}<br/>
				@endif
				@if(!empty($receipt_details->sub_heading_line4))
					{{ $receipt_details->sub_heading_line4 }}<br/>
				@endif		
				@if(!empty($receipt_details->sub_heading_line5))
					{{ $receipt_details->sub_heading_line5 }}<br/>
				@endif

				@if(!empty($receipt_details->tax_info1))
					<b>{{ $receipt_details->tax_label1 }}</b> {{ $receipt_details->tax_info1 }}
				@endif

				@if(!empty($receipt_details->tax_info2))
					<b>{{ $receipt_details->tax_label2 }}</b> {{ $receipt_details->tax_info2 }}
				@endif
				</p>
<table style="float: right;">
<tr>
					<th>{!! $receipt_details->date_label !!}</th>
					<td>
						{{$receipt_details->invoice_date}}
					</td>
				</tr>
</table>
<p class="centered">
				<!-- Title of receipt -->
				@if(!empty($receipt_details->invoice_heading))
					<br/><span class="sub-headings">{!! $receipt_details->invoice_heading !!}</span>
				@endif
			</p>

			<table style="width: 100% !important; float: left">
				<tr>
					<th>{!! $receipt_details->invoice_no_prefix !!}</th>

					<td><span style="margin-left:-200px;">
						{{$receipt_details->invoice_no}}
						</span>
					</td>

				</tr>
		
				</table>
				<p><span style="font-weight:bold">{{$receipt_details->customer_label}}</span>: {{ $receipt_details->customer_name }} </p>

				<table style="width: 100% !important; float: left; margin-top:-10px;">
				<tr>
				@if(!empty($receipt_details->ncf))

				<th>Ncf:</th>
				<td><span style="margin-left:-180px;">
					{{$receipt_details->ncf}}
					</span>
					</td>
				</tr>
				<tr>
				@if(!empty($receipt_details->vencencf))

				<th>Vencimiento:</th>
				<td><span style="margin-left:-180px;">
					{{$receipt_details->vencencf}}
					</span>
					</td>
				</tr>
				@endif
				@if(!empty($receipt_details->rnc))
				<tr>

<th>RNC:</th>
<td><span style="margin-left:-180px;">
	{{$receipt_details->rnc}}
	</span>
	</td>
</tr>
@endif
				@endif
			
			
				@if(!empty($receipt_details->due_date_label))
					<tr>
						<th>{{$receipt_details->due_date_label}}</th>
						<td>{{$receipt_details->due_date ?? ''}}</td>
					</tr>
				@endif
				</table>
				@if(!empty($receipt_details->sales_person_label))

				<p style="margin-top:-15px;"><span style="font-weight:bold">{{$receipt_details->sales_person_label}}</span> {{$receipt_details->sales_person}} </p>
				@endif
<table style="width: 100% !important; float: left">
				<!-- @if(!empty($receipt_details->sales_person_label))
					<tr>
					<span style="width:90px;">
						<th>{{$receipt_details->sales_person_label}}</th>
						</span>
						<span style="margin-left:18px;">

						<td>{{$receipt_details->sales_person}}</td>
						</span>
					</tr>
				@endif -->

				@if(!empty($receipt_details->serial_no_label) || !empty($receipt_details->repair_serial_no))
					<tr>
						<th>{{$receipt_details->serial_no_label}}</th>
					
						<td>{{$receipt_details->repair_serial_no}}</td>
					</tr>
				@endif

				@if(!empty($receipt_details->repair_status_label) || !empty($receipt_details->repair_status))
					<tr>
						<th>
							{!! $receipt_details->repair_status_label !!}
						</th>
						<td>
							{{$receipt_details->repair_status}}
						</td>
					</tr>
	        	@endif

	        	@if(!empty($receipt_details->repair_warranty_label) || !empty($receipt_details->repair_warranty))
		        	<tr>
		        		<th>
		        			{!! $receipt_details->repair_warranty_label !!}
		        		</th>
		        		<td>
		        			{{$receipt_details->repair_warranty}}
		        		</td>
		        	</tr>
	        	@endif

	        	<!-- Waiter info -->
				@if(!empty($receipt_details->service_staff_label) || !empty($receipt_details->service_staff))
		        	<tr>
		        		<th>
		        			{!! $receipt_details->service_staff_label !!}
		        		</th>
		        		<td>
		        			{{$receipt_details->service_staff}}
						</td>
		        	</tr>
		        @endif

		        <tr>
		        	<th colspan="2">&nbsp;</th>
		        </tr>
			</table>
			<table style="width: 49% !important; float: right;">
				
				@if(!empty($receipt_details->table_label) || !empty($receipt_details->table))
		        	<tr>
		        		<th>
		        			@if(!empty($receipt_details->table_label))
								<b>{!! $receipt_details->table_label !!}</b>
							@endif
		        		</th>
		        		<td>
		        			{{$receipt_details->table}}
		        		</td>
		        	</tr>
		        @endif

		        <!-- customer info -->
			
		   
				
				@if(!empty($receipt_details->client_id_label))
					<tr>
						<th>
							{{ $receipt_details->client_id_label }}
						</th>
						<td>
							{{ $receipt_details->client_id }}
						</td>
					</tr>
				@endif
				
				@if(!empty($receipt_details->customer_tax_label))
					<tr>
						<th>
							{{ $receipt_details->customer_tax_label }}
						</th>
						<td>
							{{ $receipt_details->customer_tax_number }}
						</td>
					</tr>
				@endif

				@if(!empty($receipt_details->customer_custom_fields))
					<tr>
						<td colspan="2">
							{{ $receipt_details->customer_custom_fields }}
						</td>
					</tr>
				@endif
				
				@if(!empty($receipt_details->customer_rp_label))
					<tr>
						<th>
							{{ $receipt_details->customer_rp_label }}
						</th>
						<td>
							{{ $receipt_details->customer_total_rp }}
						</td>
					</tr>
				@endif
				
			</table>
				<!-- detalles de la venta -->
            <table style="padding-top: 5px !important" class="border-bottom width-100">
                <thead class="border-top border-bottom">
                    <tr>
                        <!-- <th class="serial_number">#</th> -->
                        <th class="description">
                        	{{$receipt_details->table_product_label}}
                        </th>
                        <th class="quantity text-right">
                        	{{$receipt_details->table_qty_label}}
                        </th>
                        <th class="unit_price text-right">
                        	{{$receipt_details->table_unit_price_label}}
                        </th>
                        <th class="price text-right">{{$receipt_details->table_subtotal_label}}</th>
                    </tr>
                </thead>
                <tbody>
                	@forelse($receipt_details->lines as $line)
	                    <tr>
	                        <!-- <td class="serial_number">
	                        	{{$loop->iteration}}
	                        </td> -->
	                        <td class="description" style="width: 200px;">
	                        	{{$line['name']}} {{$line['product_variation']}} {{$line['variation']}} 
	                        	@if(!empty($line['sub_sku'])), {{$line['sub_sku']}} @endif @if(!empty($line['brand'])), {{$line['brand']}} @endif @if(!empty($line['cat_code'])), {{$line['cat_code']}}@endif
	                        	@if(!empty($line['product_custom_fields'])), {{$line['product_custom_fields']}} @endif
	                        	@if(!empty($line['sell_line_note']))({{$line['sell_line_note']}}) @endif 
	                        	@if(!empty($line['lot_number']))<br> {{$line['lot_number_label']}}:  {{$line['lot_number']}} @endif 
	                        	@if(!empty($line['product_expiry'])), {{$line['product_expiry_label']}}:  {{$line['product_expiry']}} @endif
	                        </td>
	                        <td class="quantity text-right" style="width: 10px;">{{$line['quantity']}} {{$line['units']}}</td>
	                        <td class="unit_price text-right">{{$line['unit_price_inc_tax']}}</td>
	                        <td class="price text-right">{{$line['line_total']}}</td>
	                    </tr>
                    @endforeach
                    <tr>
                    	<td colspan="5">&nbsp;</td>
                    </tr>
                </tbody>
            </table>

            <table class="border-bottom width-100">
                <tr>
                    <th class="left text-right sub-headings">
                    	{!! $receipt_details->subtotal_label !!}
                    </th>
                    <td class="width-50 text-right sub-headings">
                    	{{$receipt_details->subtotal}}
                    </td>
                </tr>

                <!-- Shipping Charges -->
				@if(!empty($receipt_details->shipping_charges))
					<tr>
						<th class="left text-right">
							{!! $receipt_details->shipping_charges_label !!}
						</th>
						<td class="width-50 text-right">
							{{$receipt_details->shipping_charges}}
						</td>
					</tr>
				@endif

				<!-- Discount -->
				@if( !empty($receipt_details->discount) )
					<tr>
						<th class="width-50 text-right">
							{!! $receipt_details->discount_label !!}
						</th>

						<td class="width-50 text-right">
							(-) {{$receipt_details->discount}}
						</td>
					</tr>
				@endif

				@if(!empty($receipt_details->reward_point_label) )
					<tr>
						<th class="width-50 text-right">
							{!! $receipt_details->reward_point_label !!}
						</th>

						<td class="width-50 text-right">
							(-) {{$receipt_details->reward_point_amount}}
						</td>
					</tr>
				@endif

				<tr>
					<th class="width-50 text-right">
						{!! $receipt_details->total_label !!}
					</th>
					<td class="width-50 text-right">
						{{$receipt_details->total}}
					</td>
				</tr>

				<!-- Total Paid-->
				@if(!empty($receipt_details->total_paid))
					<tr>
						<th class="width-50 text-right">
							{!! $receipt_details->total_paid_label !!}
						</th>
						<td class="width-50 text-right">
							{{$receipt_details->total_paid}}
						</td>
					</tr>
				@endif

				<!-- Total Due-->
				@if(!empty($receipt_details->total_due))
					<tr>
						<th class="width-50 text-right">
							{!! $receipt_details->total_due_label !!}
						</th>
						<td class="width-50 text-right">
							{{$receipt_details->total_due}}
						</td>
					</tr>
				@endif

				@if(!empty($receipt_details->all_due))
					<tr>
						<th class="width-50 text-right">
							{!! $receipt_details->all_bal_label !!}
						</th>
						<td class="width-50 text-right">
							{{$receipt_details->all_due}}
						</td>
					</tr>
				@endif
            </table>

            <!-- tax -->
            @if(!empty($receipt_details->taxes))
            	<div style="text-align: center;">
            		<b>{{$receipt_details->tax_label}}</b>
            	</div>
            	<table class="border-bottom width-100">
            		@foreach($receipt_details->taxes as $key => $val)
            			<tr>
            				<td class="left">{{$key}}</td>
            				<td class="right">{{$val}}</td>
            			</tr>
            		@endforeach
            	</table>
            @endif


            @if(!empty($receipt_details->additional_notes))
	            <p class="centered" >
	            	{{$receipt_details->additional_notes}}
	            </p>
            @endif

            {{-- Barcode --}}
			@if($receipt_details->show_barcode)
				<br/>
				<img class="center-block" src="data:image/png;base64,{{DNS1D::getBarcodePNG($receipt_details->invoice_no, 'C128', 2,30,array(39, 48, 54), true)}}">
			@endif

			@if(!empty($receipt_details->footer_text))
				<p class="centered">
					{!! $receipt_details->footer_text !!}
				</p>
			@endif
        </div>
        <!-- <button id="btnPrint" class="hidden-print">Print</button>
        <script src="script.js"></script> -->
    </body>
</html>

<style type="text/css">

@media print {
	* {
    	font-size: 12px;
    	font-family: "Courier New", Courier, "Lucida Sans Typewriter", "Lucida Typewriter", monospace;
    	word-break: break-all;
	}

.headings{
	font-size: 20px;
	font-weight: 700;
	text-transform: uppercase;
}

.sub-headings{
	font-size: 15px;
	font-weight: 700;
}

.border-top{
    border-top: 1px dotted darkgrey;
}
.border-bottom{
	border-bottom: 1px dotted darkgrey;
}

td.serial_number, th.serial_number{
	width: 5%;
    max-width: 5%;
}

td.description,
th.description {
    width: 35%;
    max-width: 35%;
    word-break: break-all;
}

td.quantity,
th.quantity {
    width: 15%;
    max-width: 15%;
    word-break: break-all;
}
td.unit_price, th.unit_price{
	width: 25%;
    max-width: 25%;
    word-break: break-all;
}

td.price,
th.price {
    width: 20%;
    max-width: 20%;
    word-break: break-all;
}

.centered {
    text-align: center;
    align-content: center;
}

.ticket {
    width: 80mm;
    max-width: 80mm;
}

img {
    max-width: inherit;
    width: auto;
}

    .hidden-print,
    .hidden-print * {
        display: none !important;
    }
}
</style>