// $('.a').append(' <a class="dropdown-item type" href="#pain_pain_types" id="'+response.data[i].pain_type_english+'">'+response.data[i].pain_type_english+'</a>')
//    $('.a').append("<option value='"+response.data[i].pain_type_english+"' >"+response.data[i].pain_type_english+" ("+response.data[i].pain_type_korean+")</option>")
            //    }
            //     $('input[type="checkbox"]').not(this).prop("checked", false); //uncheck all checkboxes
//   $(this).attr("checked", true);
//     if(this.checked===true){
//         pain_type=$(this).attr('id')
//         alert(pain_type)
//     }
//     else{
//         pain_type=''
//     }
// function myFunction() {
//   var search_words=$('#myInput').val();
// //   $('#show-list-english').html('')
// //   $('#show-list-korean').html('')

// $.ajax({

//     type:"get",
//     url:"{{route('pain-listing')}}",
//     data:{search_words:search_words},

//     success:function(response){

//      for (let i = 0; i < response.data.length; i++) {
//         $("#show-list-english").html('<li> <input type="checkbox" class="checkbox" id="'+response.data[i].id+'">'+response.data[i].pain_in_english+'  </li>');
//          $("#show-list-korean").html('<li>'+response.data[i].pain_in_korean+'  </li>');
//      }

//     }

// })
// }
// $('#checkbox').on('change',function(){
// alert("sss")
// })
public function indexx(Request $request){

        if ($request->ajax()) {
            $data = Pain::all();

            return Datatables::of($data)

                    ->addColumn('checkbox',function($row){

                        $checkbox='<input type="checkbox" id="'.$row->id.'" name="checkbox[]" value="'.$row->id.'" class="c" />';
                        return $checkbox;

                    })
                    ->addColumn('action', function($row){

                           $btn = '<div colspan="2"><a href="/admin/pains/'.$row->id.'" class="view btn btn-primary btn-sm" style="font-size: 10px;">View</a>
                           <a href="/admin/pains/'.$row->id.'/edit" class="edit btn btn-info btn-sm" style="font-size: 10px;">Edit</a>
                           <a href="javascript:void(0);" id="delete-link-packages" data-form-id="' . $row->id . '" class="view btn btn-danger btn-sm" style="font-size: 10px;">Delete</a>


                           <input type="hidden" name="_token" value="' . csrf_token() . '"/>

                           <input type="hidden" name="_method" value="delete"/>

                       </form>

                           </div>';

                            return $btn;
                    })

                    ->rawColumns(['action','checkbox'])
                    ->make(true);
        }

        return view('users');
    }
    // paintype controller
    // abort_if(Gate::denies('pain_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

// $pains = Pain::with(['created_by'])->get();

// $users = User::get();
if ($request->ajax()) {

    $data = Pain::all();

    return Datatables::of($data)

            ->addColumn('checkbox',function($row){

                $checkbox='<input type="checkbox" id="'.$row->id.'" name="checkbox[]" value="'.$row->id.'" class="c" />';
                return $checkbox;

            })
            ->addColumn('action', function($row){

                   $btn = '<div colspan="2"><a href="/admin/pains/'.$row->id.'" class="view btn btn-primary btn-sm" style="font-size: 10px;">View</a>
                   <a href="/admin/pains/'.$row->id.'/edit" class="edit btn btn-info btn-sm" style="font-size: 10px;">Edit</a>
                   <a href="javascript:void(0);" id="delete-link-packages" data-form-id="' . $row->id . '" class="view btn btn-danger btn-sm" style="font-size: 10px;">Delete</a>
                   <form method="POST" id="delete-packages' . $row->id . '" action="' .route('admin.pains.destroy', $row->id) . '">

                   <input type="hidden" name="_token" value="' . csrf_token() . '"/>

                   <input type="hidden" name="_method" value="delete"/>

               </form>

                   </div>';

                    return $btn;
            })

            ->rawColumns(['action','checkbox'])
            ->make(true);
}

return view('admin.pains.index');
//
@php
$addProductPermission = user()->permission('add_product');
@endphp

<!-- CREATE INVOICE START -->
<div class="bg-white rounded b-shadow-4 create-inv">
    <!-- HEADING START -->
    <div class="px-lg-4 px-md-4 px-3 py-3">
        <h4 class="mb-0 f-21 font-weight-normal text-capitalize">@lang('app.invoice') @lang('app.details')</h4>
    </div>
    <!-- HEADING END -->
    <hr class="m-0 border-top-grey">
    <!-- FORM START -->
    <x-form class="c-inv-form" id="saveInvoiceForm">
        @if (isset($type) && $type == 'proposal')
            <input type="hidden" name="proposal_id" value="{{ $proposalId }}">
        @endif
        @if (isset($type) && $type == 'estimate')
            <input type="hidden" name="estimate_id" value="{{ $estimateId }}">
        @endif

        <!-- INVOICE NUMBER, DATE, DUE DATE, FREQUENCY START -->
        <div class="row px-lg-4 px-md-4 px-3 py-3">
            <!-- INVOICE NUMBER START -->
            <div class="col-md-3">
                <div class="form-group mb-lg-0 mb-md-0 mb-4">
                    <x-forms.label class="mb-12" fieldId="invoice_number"
                        :fieldLabel="__('modules.invoices.invoiceNumber')" fieldRequired="true">
                    </x-forms.label>
                    <x-forms.input-group>
                        <x-slot name="prepend">
                            <span
                                class="input-group-text">{{ invoice_setting()->invoice_prefix }}#{{ $zero }}</span>
                        </x-slot>
                        <input type="text" name="invoice_number" id="invoice_number" class="form-control height-35 f-15"
                            value="{{ is_null($lastInvoice) ? 1 : $lastInvoice }}">
                    </x-forms.input-group>
                </div>
            </div>

            <!-- INVOICE NUMBER END -->
            <!-- INVOICE DATE START -->
            <div class="col-md-3">
                <div class="form-group mb-lg-0 mb-md-0 mb-4">
                    <x-forms.label fieldId="due_date" :fieldLabel="__('modules.invoices.invoiceDate')">
                    </x-forms.label>
                    <div class="input-group">
                        <input type="text" id="invoice_date" name="issue_date"
                            class="px-6 position-relative text-dark font-weight-normal form-control height-35 rounded p-0 text-left f-15"
                            placeholder="@lang('placeholders.date')"
                            value="{{ now($global->timezone)->format($global->date_format) }}">
                    </div>
                </div>
            </div>
            <!-- INVOICE DATE END -->
            <!-- DUE DATE START -->
            <div class="col-md-3">
                <div class="form-group mb-lg-0 mb-md-0 mb-4">
                    <x-forms.label fieldId="due_date" :fieldLabel="__('app.dueDate')"></x-forms.label>
                    <div class="input-group ">
                        <input type="text" id="due_date" name="due_date"
                            class="px-6 position-relative text-dark font-weight-normal form-control height-35 rounded p-0 text-left f-15"
                            placeholder="@lang('placeholders.date')"
                            value="{{ Carbon\Carbon::now($global->timezone)->addDays($invoiceSetting->due_after)->format($global->date_format) }}">
                    </div>
                </div>
            </div>
            <!-- DUE DATE END -->
            <!-- FREQUENCY START -->
            <div class="col-md-3">
                <div class="form-group c-inv-select mb-lg-0 mb-md-0 mb-4">
                    <x-forms.label fieldId="currency_id" :fieldLabel="__('modules.invoices.currency')">
                    </x-forms.label>

                    <div class="select-others height-35 rounded">
                        <select class="form-control select-picker" name="currency_id" id="currency_id">
                            @foreach ($currencies as $currency)
                                <option @if (isset($estimate))
                                    @if ($currency->id == $estimate->currency_id) selected @endif
                                @else
                                    @if ($currency->id == $global->currency_id)
                                        selected @endif
                            @endif
                            value="{{ $currency->id }}">
                            {{ $currency->currency_code . ' (' . $currency->currency_symbol . ')' }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <!-- FREQUENCY END -->
        </div>
        <!-- INVOICE NUMBER, DATE, DUE DATE, FREQUENCY END -->

        <hr class="m-0 border-top-grey">

        <!-- CLIENT, PROJECT, GST, BILLING, SHIPPING ADDRESS START -->
        <div class="row px-lg-4 px-md-4 px-3 pt-3">
            <!-- CLIENT START -->
            <div class="col-md-4">

                @if (isset($client) && !is_null($client))
                    <div class="form-group mb-lg-0 mb-md-0 mb-4">
                        <x-forms.label fieldId="due_date" :fieldLabel="__('app.client')">
                        </x-forms.label>
                        <div class="input-group">
                            <input type="hidden" name="client_id" id="client_id" value="{{ $client->id }}">
                            <input type="text" value="{{ $client->name }}"
                                class="form-control height-35 f-15 readonly-background" readonly>
                        </div>
                    </div>
                @else
                    <x-client-selection-dropdown :clients="$clients" :selected="$estimate->client_id ?? null" />
                @endif

            </div>
            <!-- CLIENT END -->

            <!-- PROJECT START -->
            <div class="col-md-4">
                @if (isset($project) && !is_null($project))
                    <div class="form-group mb-lg-0 mb-md-0 mb-4">
                        <x-forms.label fieldId="due_date" :fieldLabel="__('app.project')">
                        </x-forms.label>
                        <div class="input-group">
                            <input type="hidden" name="project_id" id="project_id" value="{{ $project->id }}">
                            <input type="text" value="{{ $project->project_name }}"
                                class="form-control height-35 f-15 readonly-background" readonly>
                        </div>
                    </div>
                @else
                    <div class="form-group c-inv-select mb-4">
                        <x-forms.label fieldId="project_id" :fieldLabel="__('app.project')">
                        </x-forms.label>
                        <div class="select-others height-35 rounded">
                            <select class="form-control select-picker" data-live-search="true" data-size="8"
                                name="project_id" id="project_id">
                                <option value="">--</option>
                                @if (isset($estimate) && $estimate->client)
                                    @foreach ($estimate->client->projects as $item)
                                        <option value="{{ $item->id }}">{{ $item->project_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                @endif
            </div>
            <!-- PROJECT END -->

            <div class="col-md-4">
                <div class="form-group c-inv-select mb-4">
                    <x-forms.label fieldId="calculate_tax" :fieldLabel="__('modules.invoices.calculateTax')">
                    </x-forms.label>
                    <div class="select-others height-35 rounded">
                        <select class="form-control select-picker" data-live-search="true" data-size="8"
                            name="calculate_tax" id="calculate_tax">
                            <option value="after_discount" @if (isset($estimate) && $estimate->calculate_tax == 'after_discount') selected @endif>
                                @lang('modules.invoices.afterDiscount')</option>
                            <option value="before_discount" @if (isset($estimate) && $estimate->calculate_tax == 'before_discount') selected @endif>
                                @lang('modules.invoices.beforeDiscount')</option>
                        </select>
                    </div>
                </div>
            </div>

        </div>
        <div class="row px-lg-4 px-md-4 px-3 py-3">
            <!-- BILLING ADDRESS START -->
            <div class="col-md-4">
                <div class="form-group c-inv-select mb-0">
                    <label class="f-14 text-dark-grey mb-12 text-capitalize w-100"
                        for="usr">@lang('modules.invoices.billingAddress')</label>
                    <p class="f-15" id="client_billing_address">
                        @if (isset($estimate) && $estimate->client)
                            {!! nl2br($estimate->client->clientDetails->address) !!}
                        @elseif (isset($estimate) && isset($client))
                            {!! nl2br($client->clientDetails->address) !!}
                        @else
                            <span class="text-lightest">@lang('messages.selectCustomerForBillingAddress')</span>
                        @endif
                    </p>
                </div>
            </div>
            <!-- BILLING ADDRESS END -->
            <!-- SHIPPING ADDRESS START -->
                    <!-- <div class="col-md-4">
                        <div class="form-group c-inv-select mb-lg-0 mb-md-0 mb-4">
                            <label class="f-14 text-dark-grey mb-12 text-capitalize w-100"
                                for="usr">@lang('modules.invoices.shippingAddress') </label>
                            <p class="f-15" id="client_shipping_address">
                                @if (isset($estimate) && $estimate->client && $estimate->client->clientDetails->shipping_address)
                                    {!! nl2br($estimate->client->clientDetails->shipping_address) !!}
                                @elseif(isset($client) && $client->clientDetails &&
                                    $client->clientDetails->shipping_address))
                                    {!! nl2br($client->clientDetails->shipping_address) !!}
                                @else
                                    <a href="javascript:;" class="text-capitalize" id="show-shipping-field"><i
                                            class="f-12 mr-2 fa fa-plus"></i>@lang('app.addShippingAddress')</a>
                                @endif
                            </p>
                            <p class="d-none" id="add-shipping-field">
                                <textarea class="form-control f-14 pt-2" rows="3" placeholder="@lang('placeholders.address')"
                                    name="shipping_address" id="shipping_address">@if (isset($estimate) && $estimate->client) {!! nl2br($estimate->client->clientDetails->shipping_address) !!} @endif</textarea>
                            </p>
                        </div>
                    </div> -->
            <!-- SHIPPING ADDRESS END -->

            <div class="col-md-4">
                <div class="form-group c-inv-select mb-4">
                    <x-forms.label fieldId="company_address_id" :fieldLabel="__('modules.invoices.generatedBy')">
                    </x-forms.label>
                    <div class="select-others height-35 rounded">
                        <select class="form-control select-picker" data-live-search="true" data-size="8"
                            name="company_address_id" id="company_address_id">
                            @foreach ($companyAddresses as $item)
                                <option {{ $item->is_default ? 'selected' : '' }} value="{{ $item->id }}">
                                    {{ $item->address }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <!-- CLIENT, PROJECT, GST, BILLING, SHIPPING ADDRESS END -->

        @if (isset($fields) && count($fields) > 0)
            <div class="row px-lg-4 px-md-4 px-3 pt-3">
                @foreach ($fields as $field)
                    <div class="col-md-4">
                        @if ($field->type == 'text')
                            <x-forms.text fieldId="custom_fields_data[{{ $field->name . '_' . $field->id }}]"
                                :fieldLabel="$field->label"
                                fieldName="custom_fields_data[{{ $field->name . '_' . $field->id }}]"
                                :fieldPlaceholder="$field->label"
                                :fieldRequired="($field->required === 'yes') ? true : false">
                            </x-forms.text>
                        @elseif($field->type == 'password')
                            <x-forms.password fieldId="custom_fields_data[{{ $field->name . '_' . $field->id }}]"
                                :fieldLabel="$field->label"
                                fieldName="custom_fields_data[{{ $field->name . '_' . $field->id }}]"
                                :fieldPlaceholder="$field->label"
                                :fieldRequired="($field->required === 'yes') ? true : false">
                            </x-forms.password>
                        @elseif($field->type == 'number')
                            <x-forms.number fieldId="custom_fields_data[{{ $field->name . '_' . $field->id }}]"
                                :fieldLabel="$field->label"
                                fieldName="custom_fields_data[{{ $field->name . '_' . $field->id }}]"
                                :fieldPlaceholder="$field->label"
                                :fieldRequired="($field->required === 'yes') ? true : false">
                            </x-forms.number>
                        @elseif($field->type == 'textarea')
                            <x-forms.textarea :fieldLabel="$field->label"
                                fieldName="custom_fields_data[{{ $field->name . '_' . $field->id }}]"
                                fieldId="custom_fields_data[{{ $field->name . '_' . $field->id }}]"
                                :fieldRequired="($field->required === 'yes') ? true : false"
                                :fieldPlaceholder="$field->label">
                            </x-forms.textarea>
                        @elseif($field->type == 'radio')
                            <div class="form-group my-3">
                                <x-forms.label fieldId="custom_fields_data[{{ $field->name . '_' . $field->id }}]"
                                    :fieldLabel="$field->label"
                                    :fieldRequired="($field->required === 'yes') ? true : false">
                                </x-forms.label>
                                <div class="d-flex">
                                    @foreach ($field->values as $key => $value)
                                        <x-forms.radio fieldId="optionsRadios{{ $key . $field->id }}"
                                            :fieldLabel="$value"
                                            fieldName="custom_fields_data[{{ $field->name . '_' . $field->id }}]"
                                            :fieldValue="$value" :checked="($key == 0) ? true : false" />
                                    @endforeach
                                </div>
                            </div>
                        @elseif($field->type == 'select')
                            <div class="form-group my-3">
                                <x-forms.label fieldId="custom_fields_data[{{ $field->name . '_' . $field->id }}]"
                                    :fieldLabel="$field->label"
                                    :fieldRequired="($field->required === 'yes') ? true : false">
                                </x-forms.label>
                                {!! Form::select('custom_fields_data[' . $field->name . '_' . $field->id . ']', $field->values, isset($editUser) ? $editUser->custom_fields_data['field_' . $field->id] : '', ['class' => 'form-control select-picker']) !!}
                            </div>
                        @elseif($field->type == 'date')
                            <x-forms.datepicker custom="true"
                                fieldId="custom_fields_data[{{ $field->name . '_' . $field->id }}]"
                                :fieldRequired="($field->required === 'yes') ? true : false" :fieldLabel="$field->label"
                                fieldName="custom_fields_data[{{ $field->name . '_' . $field->id }}]"
                                :fieldValue="now()->timezone($global->timezone)->format($global->date_format)"
                                :fieldPlaceholder="$field->label" />
                        @elseif($field->type == 'checkbox')
                            <div class="form-group my-3">
                                <x-forms.label fieldId="custom_fields_data[{{ $field->name . '_' . $field->id }}]"
                                    :fieldLabel="$field->label"
                                    :fieldRequired="($field->required === 'yes') ? true : false">
                                </x-forms.label>
                                <div class="d-flex checkbox-{{ $field->id }}">
                                    <input type="hidden"
                                        name="custom_fields_data[{{ $field->name . '_' . $field->id }}]"
                                        id="{{ $field->name . '_' . $field->id }}">

                                    @foreach ($field->values as $key => $value)
                                        <x-forms.checkbox fieldId="optionsRadios{{ $key . $field->id }}"
                                            :fieldLabel="$value" fieldName="$field->name.'_'.$field->id.'[]'"
                                            :fieldValue="$value"
                                            onchange="checkboxChange('checkbox-{{ $field->id }}', '{{ $field->name . '_' . $field->id }}')"
                                            :fieldRequired="($field->required === 'yes') ? true : false" />
                                    @endforeach
                                </div>
                            </div>
                        @endif

                    </div>
                @endforeach
            </div>
        @endif

        <hr class="m-0 border-top-grey">

        <div class="d-flex px-4 py-3">
            <div class="form-group">
                <x-forms.input-group>
                    <select class="form-control select-picker" data-live-search="true" data-size="8" id="add-products">
                        <option value="">{{ __('app.select') . ' ' . __('app.product') }}</option>
                        @foreach ($products as $item)
                            <option data-content="{{ $item->name }}" value="{{ $item->id }}">
                                {{ $item->name }}</option>
                        @endforeach
                    </select>
                    @if ($addProductPermission == 'all' || $addProductPermission == 'added')
                        <x-slot name="append">
                            <a href="{{ route('products.create') }}" data-redirect-url="{{ url()->full() }}"
                                class="btn btn-outline-secondary border-grey openRightModal">@lang('app.add')</a>
                        </x-slot>
                    @endif
                </x-forms.input-group>

            </div>
        </div>

        <div id="sortable">
            @if (isset($estimate))
                @foreach ($estimate->items as $key => $item)
                    <!-- DESKTOP DESCRIPTION TABLE START -->
                    <div class="d-flex px-4 py-3 c-inv-desc item-row">

                        <div class="c-inv-desc-table w-100 d-lg-flex d-md-flex d-block">
                            <table width="100%">
                                <tbody>
                                    <tr class="text-dark-grey font-weight-bold f-14">
                                        <td width="{{ $invoiceSetting->hsn_sac_code_show ? '40%' : '50%' }}"
                                            class="border-0 inv-desc-mbl btlr">@lang('app.description')</td>
                                        @if ($invoiceSetting->hsn_sac_code_show)
                                            <td width="10%" class="border-0" align="right">@lang("app.hsnSac")
                                            </td>
                                        @endif
                                        <td width="10%" class="border-0" align="right">
                                            @lang("modules.invoices.qty")
                                        </td>
                                        <td width="10%" class="border-0" align="right">
                                            @lang("modules.invoices.unitPrice")</td>
                                        <td width="13%" class="border-0" align="right">
                                            @lang('modules.invoices.tax')
                                        </td>
                                        <td width="17%" class="border-0 bblr-mbl" align="right">
                                            @lang('modules.invoices.amount')</td>
                                    </tr>
                                    <tr>
                                        <td class="border-bottom-0 btrr-mbl btlr">
                                            <input type="text" class="form-control f-14 border-0 w-100 item_name"
                                                name="item_name[]" placeholder="@lang('modules.expenses.itemName')"
                                                value="{{ $item->item_name }}">
                                        </td>
                                        <td class="border-bottom-0 d-block d-lg-none d-md-none">
                                            <textarea class="f-14 border-0 w-100 mobile-description"
                                                placeholder="@lang('placeholders.invoices.description')"
                                                name="item_summary[]">{{ $item->item_summary }}</textarea>
                                        </td>
                                        @if ($invoiceSetting->hsn_sac_code_show)
                                            <td class="border-bottom-0">
                                                <input type="text"
                                                    class="form-control f-14 border-0 w-100 text-right hsn_sac_code"
                                                    value="{{ $item->hsn_sac_code }}" name="hsn_sac_code[]">
                                            </td>
                                        @endif
                                        <td class="border-bottom-0">
                                            <input type="number" min="1"
                                                class="form-control f-14 border-0 w-100 text-right quantity"
                                                value="{{ $item->quantity }}" name="quantity[]">
                                        </td>
                                        <td class="border-bottom-0">
                                            <input type="number" class="f-14 border-0 w-100 text-right cost_per_item"
                                                placeholder="0.00" value="{{ $item->unit_price }}"
                                                name="cost_per_item[]" min="1">
                                        </td>
                                        <td class="border-bottom-0">
                                            <div class="select-others height-35 rounded border-0">
                                                <select id="multiselect" name="taxes[{{ $key }}][]"
                                                    multiple="multiple"
                                                    class="select-picker type customSequence border-0" data-size="3">
                                                    @foreach ($taxes as $tax)
                                                        <option data-rate="{{ $tax->rate_percent }}"
                                                            @if (isset($item->taxes) && array_search($tax->id, json_decode($item->taxes)) !== false) selected @endif value="{{ $tax->id }}">
                                                            {{ $tax->tax_name }}:
                                                            {{ $tax->rate_percent }}%</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td rowspan="2" align="right" valign="top" class="bg-amt-grey btrr-bbrr">
                                            <span
                                                class="amount-html">{{ number_format((float) $item->amount, 2, '.', '') }}</span>
                                            <input type="hidden" class="amount" name="amount[]"
                                                value="{{ $item->amount }}">
                                        </td>
                                    </tr>
                                    <tr class="d-none d-md-block d-lg-table-row">
                                        <td colspan="{{ $invoiceSetting->hsn_sac_code_show ? '5' : '4' }}"
                                            class="dash-border-top bblr">
                                            <textarea class="f-14 border-0 w-100 desktop-description"
                                                name="item_summary[]"
                                                placeholder="@lang('placeholders.invoices.description')">{{ $item->item_summary }}</textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <a href="javascript:;"
                                class="d-flex align-items-center justify-content-center ml-3 remove-item"><i
                                    class="fa fa-times-circle f-20 text-lightest"></i></a>
                        </div>
                    </div>
                    <!-- DESKTOP DESCRIPTION TABLE END -->
                @endforeach
            @else
                <!-- DESKTOP DESCRIPTION TABLE START -->
                <div class="d-flex px-4 py-3 c-inv-desc item-row">

                    <div class="c-inv-desc-table w-100 d-lg-flex d-md-flex d-block">
                        <table width="100%">
                            <tbody>
                                <tr class="text-dark-grey font-weight-bold f-14">
                                    <td width="{{ $invoiceSetting->hsn_sac_code_show ? '40%' : '50%' }}"
                                        class="border-0 inv-desc-mbl btlr">@lang('app.description')</td>
                                    @if ($invoiceSetting->hsn_sac_code_show)
                                        <td width="10%" class="border-0" align="right">@lang("app.hsnSac")</td>
                                    @endif
                                    <td width="10%" class="border-0" align="right">@lang("modules.invoices.qty")
                                    </td>
                                    <td width="10%" class="border-0" align="right">
                                        @lang("modules.invoices.unitPrice")
                                    </td>
                                    <td width="13%" class="border-0" align="right">@lang('modules.invoices.tax')
                                    </td>
                                    <td width="17%" class="border-0 bblr-mbl" align="right">
                                        @lang('modules.invoices.amount')</td>
                                </tr>
                                <tr>
                                    <td class="border-bottom-0 btrr-mbl btlr">
                                        <input type="text" class="form-control f-14 border-0 w-100 item_name"
                                            name="item_name[]" placeholder="@lang('modules.expenses.itemName')">
                                    </td>
                                    <td class="border-bottom-0 d-block d-lg-none d-md-none">
                                        <textarea class="form-control f-14 border-0 w-100 mobile-description"
                                            name="item_summary[]"
                                            placeholder="@lang('placeholders.invoices.description')"></textarea>
                                    </td>
                                    @if ($invoiceSetting->hsn_sac_code_show)
                                        <td class="border-bottom-0">
                                            <input type="text"
                                                class="form-control f-14 border-0 w-100 text-right hsn_sac_code"
                                                placeholder="" name="hsn_sac_code[]">
                                        </td>
                                    @endif
                                    <td class="border-bottom-0">
                                        <input type="number" min="1"
                                            class="form-control f-14 border-0 w-100 text-right quantity" value="1"
                                            name="quantity[]">
                                    </td>
                                    <td class="border-bottom-0">
                                        <input type="number" min="1"
                                            class="f-14 border-0 w-100 text-right cost_per_item" placeholder="0.00"
                                            value="0" name="cost_per_item[]">
                                    </td>
                                    <td class="border-bottom-0">
                                        <div class="select-others height-35 rounded border-0">
                                            <select id="multiselect" name="taxes[0][]" multiple="multiple"
                                                class="select-picker type customSequence border-0" data-size="3">
                                                @foreach ($taxes as $tax)
                                                    <option data-rate="{{ $tax->rate_percent }}"
                                                        value="{{ $tax->id }}">{{ $tax->tax_name }}:
                                                        {{ $tax->rate_percent }}%</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td rowspan="2" align="right" valign="top" class="bg-amt-grey btrr-bbrr">
                                        <span class="amount-html">0.00</span>
                                        <input type="hidden" class="amount" name="amount[]" value="0">
                                    </td>
                                </tr>
                                <tr class="d-none d-md-table-row d-lg-table-row">
                                    <td colspan="{{ $invoiceSetting->hsn_sac_code_show ? '5' : '4' }}"
                                        class="dash-border-top bblr">
                                        <textarea class="f-14 border-0 w-100 desktop-description" name="item_summary[]"
                                            placeholder="@lang('placeholders.invoices.description')"></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <a href="javascript:;"
                            class="d-flex align-items-center justify-content-center ml-3 remove-item"><i
                                class="fa fa-times-circle f-20 text-lightest"></i></a>
                    </div>
                </div>
                <!-- DESKTOP DESCRIPTION TABLE END -->
            @endif

        </div>
        <!--  ADD ITEM START-->
        <div class="row px-lg-4 px-md-4 px-3 pb-3 pt-0 mb-3  mt-2">
            <div class="col-md-12">
                <a class="f-15 f-w-500" href="javascript:;" id="add-item"><i
                        class="icons icon-plus font-weight-bold mr-1"></i>@lang('modules.invoices.addItem')</a>
            </div>
        </div>
        <!--  ADD ITEM END-->

        <hr class="m-0 border-top-grey">

        <!-- TOTAL, DISCOUNT START -->
        <div class="d-flex px-lg-4 px-md-4 px-3 pb-3 c-inv-total">
            <table width="100%" class="text-right f-14 text-capitalize">
                <tbody>
                    <tr>
                        <td width="50%" class="border-0 d-lg-table d-md-table d-none"></td>
                        <td width="50%" class="p-0 border-0 c-inv-total-right">
                            <table width="100%">
                                <tbody>
                                    <tr>
                                        <td colspan="2" class="border-top-0 text-dark-grey">
                                            @lang('modules.invoices.subTotal')</td>
                                        <td width="30%" class="border-top-0 sub-total">0.00</td>
                                        <input type="hidden" class="sub-total-field" name="sub_total" value="0">
                                    </tr>
                                    <tr>
                                        <td width="20%" class="text-dark-grey">@lang('modules.invoices.discount')
                                        </td>
                                        <td width="40%" style="padding: 5px;">
                                            <table width="100%">
                                                <tbody>
                                                    <tr>
                                                        <td width="70%" class="c-inv-sub-padding">
                                                            <input type="number" min="0" name="discount_value"
                                                                class="form-control f-14 border-0 w-100 text-right discount_value"
                                                                placeholder="0"
                                                                value="{{ isset($estimate) ? $estimate->discount : '0' }}">
                                                        </td>
                                                        <td width="30%" align="left" class="c-inv-sub-padding">
                                                            <div
                                                                class="select-others select-tax height-35 rounded border-0">
                                                                <select class="form-control select-picker"
                                                                    id="discount_type" name="discount_type">
                                                                    <option @if (isset($estimate) && $estimate->discount_type == 'percent') selected @endif value="percent">%
                                                                    </option>
                                                                    <option @if (isset($estimate) && $estimate->discount_type == 'fixed') selected @endif value="fixed">
                                                                        @lang('modules.invoices.amount')</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td><span
                                                id="discount_amount">{{ isset($estimate) ? number_format((float) $estimate->discount, 2, '.', '') : '0.00' }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>@lang('modules.invoices.tax')</td>
                                        <td colspan="2" class="p-0 border-0">
                                            <table width="100%" id="invoice-taxes">
                                                <tr>
                                                    <td colspan="2"><span class="tax-percent">0.00</span></td>
                                                </tr>
                                            </table>
                                        </td>

                                    </tr>
                                    <tr class="bg-amt-grey f-16 f-w-500">
                                        <td colspan="2">@lang('modules.invoices.total')</td>
                                        <td><span class="total">0.00</span></td>
                                        <input type="hidden" class="total-field" name="total" value="0">
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- TOTAL, DISCOUNT END -->

        <!-- NOTE AND TERMS AND CONDITIONS START -->
        <div class="d-flex flex-wrap px-lg-4 px-md-4 px-3 py-3">
            <div class="col-md-6 col-sm-12 c-inv-note-terms p-0 mb-lg-0 mb-md-0 mb-3">
                <x-forms.label fieldId="" class="text-capitalize" :fieldLabel="__('modules.invoices.note')">
                </x-forms.label>
                <textarea class="form-control" name="note" id="note" rows="4"
                    placeholder="@lang('placeholders.invoices.note')"></textarea>
            </div>
            <div class="col-md-6 col-sm-12 p-0 c-inv-note-terms">
                <x-forms.label fieldId="" :fieldLabel="__('modules.invoiceSettings.invoiceTerms')">
                </x-forms.label>
                <p>
                    {!! nl2br($invoiceSetting->invoice_terms) !!}
                </p>
            </div>
        </div>
        <!-- NOTE AND TERMS AND CONDITIONS END -->

        <!-- CANCEL SAVE SEND START -->
        <x-form-actions class="c-inv-btns d-block d-lg-flex d-md-flex">
            <div class="d-flex mb-3 mb-lg-0 mb-md-0">

                <div class="inv-action dropup mr-3">
                    <button class="btn-primary dropdown-toggle" type="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        @lang('app.save')
                        <span><i class="fa fa-chevron-up f-15 text-white"></i></span>
                    </button>
                    <!-- DROPDOWN - INFORMATION -->
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuBtn" tabindex="0">
                        <li>
                            <a class="dropdown-item f-14 text-dark save-form" href="javascript:;" data-type="save">
                                <i class="fa fa-save f-w-500 mr-2 f-11"></i> @lang('app.save')
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item f-14 text-dark save-form" href="javascript:void(0);"
                                data-type="send">
                                <i class="fa fa-paper-plane f-w-500  mr-2 f-12"></i> @lang('app.saveSend')
                            </a>
                        </li>
                    </ul>
                </div>

                <x-forms.button-secondary data-type="draft" class="save-form mr-3">@lang('app.saveDraft')
                </x-forms.button-secondary>

            </div>

            <x-forms.button-cancel :link="route('invoices.index')" class="border-0 ">@lang('app.cancel')
            </x-forms.button-cancel>

        </x-form-actions>
        <!-- CANCEL SAVE SEND END -->

    </x-form>
    <!-- FORM END -->
</div>
<!-- CREATE INVOICE END -->
<script>
    $(document).ready(function() {

        const hsn_status = {{ $invoiceSetting->hsn_sac_code_show }};
        const defaultClient = "{{ request('client_id') }}";

        if ($('.custom-date-picker').length > 0) {
            datepicker('.custom-date-picker', {
                position: 'bl',
                ...datepickerConfig
            });
        }

        const dp1 = datepicker('#invoice_date', {
            position: 'bl',
            ...datepickerConfig
        });
        const dp2 = datepicker('#due_date', {
            position: 'bl',
            ...datepickerConfig
        });

        $('#client_list_id').change(function() {
            var id = $(this).val();
            changeClient(id);
        });

        function changeClient(id) {

            if (id == '') {
                id = 0;
            }

            var url = "{{ route('clients.project_list', ':id') }}";
            url = url.replace(':id', id);
            var token = "{{ csrf_token() }}";

            $.easyAjax({
                url: url,
                container: '#saveInvoiceForm',
                type: "POST",
                blockUI: true,
                data: {
                    _token: token
                },
                success: function(response) {
                    if (response.status == 'success') {
                        $('#project_id').html(response.data);
                        $('#project_id').selectpicker('refresh');
                    }
                }
            });

            var url = "{{ route('clients.ajax_details', ':id') }}";
            url = url.replace(':id', id);

            $.easyAjax({
                url: url,
                container: '#saveInvoiceForm',
                type: "POST",
                blockUI: true,
                data: {
                    _token: token
                },
                success: function(response) {
                    if (response.status == 'success') {
                        if (response.data !== null) {
                            $('#client_billing_address').html(nl2br(response.data.client_details
                                .address));
                            $('#add-shipping-field').addClass('d-none');
                            $('#client_shipping_address').removeClass('d-none');

                            if (response.data.client_details.shipping_address === null) {
                                var addShippingLink =
                                    '<a href="javascript:;" class="text-capitalize" id="show-shipping-field"><i class="f-12 mr-2 fa fa-plus"></i>@lang("app.addShippingAddress")</a>';
                                $('#client_shipping_address').html(addShippingLink);
                            } else {
                                $('#client_shipping_address').html(nl2br(response.data
                                    .client_details
                                    .shipping_address));
                            }

                        } else {
                            $('#client_billing_address').html(
                                '<span class="text-lightest">@lang("messages.selectCustomerForBillingAddress")</span>'
                            );
                        }
                    } else {
                        var addShippingLink =
                            '<a href="javascript:;" class="text-capitalize" id="show-shipping-field"><i class="f-12 mr-2 fa fa-plus"></i>@lang("app.addShippingAddress")</a>';
                        $('#client_shipping_address').html(addShippingLink);
                    }
                }
            });

        }

        $('body').on('click', '#show-shipping-field', function() {
            $('#add-shipping-field, #client_shipping_address').toggleClass('d-none');
        });

        $('#add-products').on('changed.bs.select', function(e, clickedIndex, isSelected, previousValue) {
            e.stopImmediatePropagation()
            var id = $(this).val();
            if (previousValue != id && id != '') {
                addProduct(id);
            }
        });

        function addProduct(id) {
            var currencyId = $('#currency_id').val();

            $.easyAjax({
                url: "{{ route('invoices.add_item') }}",
                type: "GET",
                data: {
                    id: id,
                    currencyId: currencyId
                },
                blockUI: true,
                success: function(response) {
                    $(response.view).hide().appendTo("#sortable").fadeIn(500);
                    calculateTotal();

                    var noOfRows = $(document).find('#sortable .item-row').length;
                    var i = $(document).find('.item_name').length - 1;
                    var itemRow = $(document).find('#sortable .item-row:nth-child(' + noOfRows +
                        ') select.type');
                    itemRow.attr('id', 'multiselect' + i);
                    itemRow.attr('name', 'taxes[' + i + '][]');
                    $(document).find('#multiselect' + i).selectpicker();
                }
            });
        }

        $(document).on('click', '#add-item', function() {

            var i = $(document).find('.item_name').length;
            var item =
                ` <div class="d-flex px-4 py-3 c-inv-desc item-row">
                <div class="c-inv-desc-table w-100 d-lg-flex d-md-flex d-block">
                <table width="100%">
                <tbody>
                <tr class="text-dark-grey font-weight-bold f-14">
                <td width="{{ $invoiceSetting->hsn_sac_code_show ? '40%' : '50%' }}" class="border-0 inv-desc-mbl btlr">@lang("app.description")</td>`;

            if (hsn_status) {
                item += `<td width="10%" class="border-0" align="right">@lang("app.hsnSac")</td>`;
            }

            item += `
                    <td width="10%" class="border-0" align="right">@lang("modules.invoices.qty")</td>
                    <td width="10%" class="border-0" align="right">@lang("modules.invoices.unitPrice")</td>
                    <td width="13%" class="border-0" align="right">@lang("modules.invoices.tax")</td>
                    <td width="17%" class="border-0 bblr-mbl" align="right">@lang("modules.invoices.amount")</td>
                </tr>
                <tr>
                    <td class="border-bottom-0 btrr-mbl btlr">
                    <input type="text" class="form-control f-14 border-0 w-100 item_name" name="item_name[]" placeholder="@lang("modules.expenses.itemName")">
                    </td>
                    <td class="border-bottom-0 d-block d-lg-none d-md-none">
                    <textarea class="f-14 border-0 w-100 mobile-description" name="item_summary[]" placeholder="@lang("placeholders.invoices.description")"></textarea>
                    </td>
                `;

            if (hsn_status) {
                item += `<td class="border-bottom-0">
                    <input type="text" min="1" class="form-control f-14 border-0 w-100 text-right hsn_sac_code" name="hsn_sac_code[]" >
                    </td>`;
            }
            item += `<td class="border-bottom-0">
                <input type="number" min="1" class="form-control f-14 border-0 w-100 text-right quantity" value="1" name="quantity[]">
                </td>
                <td class="border-bottom-0">
                <input type="number" min="1" class="f-14 border-0 w-100 text-right cost_per_item" placeholder="0.00" value="0" name="cost_per_item[]">
                </td>
                <td class="border-bottom-0">
                <div class="select-others height-35 rounded border-0">
                <select id="multiselect${i}" name="taxes[${i}][]" multiple="multiple" class="select-picker type customSequence" data-size="3">
            @foreach ($taxes as $tax)
                <option data-rate="{{ $tax->rate_percent }}" value="{{ $tax->id }}">
                    {{ $tax->tax_name }}:{{ $tax->rate_percent }}%</option>
            @endforeach

                </select>
                </div>
                </td>
                <td rowspan="2" align="right" valign="top" class="bg-amt-grey btrr-bbrr">
                <span class="amount-html">0.00</span>
                <input type="hidden" class="amount" name="amount[]" value="0">
                </td>
                </tr>
                <tr class="d-none d-md-table-row d-lg-table-row">
                <td colspan="{{ $invoiceSetting->hsn_sac_code_show ? 5 : 4 }}" class="dash-border-top bblr">
                <textarea class="f-14 border-0 w-100 desktop-description" name="item_summary[]" placeholder="@lang("placeholders.invoices.description")"></textarea>
                </td>
                </tr>
                </tbody>
                </table>
                </div>
                <a href="javascript:;" class="d-flex align-items-center justify-content-center ml-3 remove-item"><i class="fa fa-times-circle f-20 text-lightest"></i></a>
                </div>`;
            $(item).hide().appendTo("#sortable").fadeIn(500);
            $('#multiselect' + i).selectpicker();
        });

        $('#saveInvoiceForm').on('click', '.remove-item', function() {
            $(this).closest('.item-row').fadeOut(300, function() {
                $(this).remove();
                $('select.customSequence').each(function(index) {
                    $(this).attr('name', 'taxes[' + index + '][]');
                    $(this).attr('id', 'multiselect' + index + '');
                });
                calculateTotal();
            });
        });

        $('.save-form').click(function() {
            var type = $(this).data('type');

            if (KTUtil.isMobileDevice()) {
                $('.desktop-description').remove();
            } else {
                $('.mobile-description').remove();
            }

            calculateTotal();

            var discount = $('#discount_amount').html();
            var total = $('.sub-total-field').val();

            if (parseFloat(discount) > parseFloat(total)) {
                Swal.fire({
                    icon: 'error',
                    text: "{{ __('messages.discountExceed') }}",

                    customClass: {
                        confirmButton: 'btn btn-primary',
                    },
                    showClass: {
                        popup: 'swal2-noanimation',
                        backdrop: 'swal2-noanimation'
                    },
                    buttonsStyling: false
                });
                return false;
            }

            $.easyAjax({
                url: "{{ route('invoices.store') }}",
                container: '#saveInvoiceForm',
                type: "POST",
                blockUI: true,
                redirect: true,
                data: $('#saveInvoiceForm').serialize() + "&type=" + type,
                success: function(response) {
                    if (response.status == 'success') {
                        window.location.href = response.redirectUrl;
                    }
                }
            })
        });

        $('#saveInvoiceForm').on('click', '.remove-item', function() {
            $(this).closest('.item-row').fadeOut(300, function() {
                $(this).remove();
                $('select.customSequence').each(function(index) {
                    $(this).attr('name', 'taxes[' + index + '][]');
                    $(this).attr('id', 'multiselect' + index + '');
                });
                calculateTotal();
            });
        });

        $('#saveInvoiceForm').on('keyup', '.quantity,.cost_per_item,.item_name, .discount_value', function() {
            var quantity = $(this).closest('.item-row').find('.quantity').val();
            var perItemCost = $(this).closest('.item-row').find('.cost_per_item').val();
            var amount = (quantity * perItemCost);

            $(this).closest('.item-row').find('.amount').val(decimalupto2(amount));
            $(this).closest('.item-row').find('.amount-html').html(decimalupto2(amount));

            calculateTotal();
        });

        $('#saveInvoiceForm').on('change', '.type, #discount_type, #calculate_tax', function() {
            var quantity = $(this).closest('.item-row').find('.quantity').val();
            var perItemCost = $(this).closest('.item-row').find('.cost_per_item').val();
            var amount = (quantity * perItemCost);

            $(this).closest('.item-row').find('.amount').val(decimalupto2(amount));
            $(this).closest('.item-row').find('.amount-html').html(decimalupto2(amount));

            calculateTotal();
        });

        $('#saveInvoiceForm').on('input', '.quantity', function() {
            var quantity = $(this).closest('.item-row').find('.quantity').val();
            var perItemCost = $(this).closest('.item-row').find('.cost_per_item').val();
            var amount = (quantity * perItemCost);

            $(this).closest('.item-row').find('.amount').val(decimalupto2(amount));
            $(this).closest('.item-row').find('.amount-html').html(decimalupto2(amount));

            calculateTotal();
        });

        calculateTotal();

        init(RIGHT_MODAL);

        if (defaultClient != "") {
            changeClient(defaultClient);
        }
    });

    function checkboxChange(parentClass, id) {
        var checkedData = '';
        $('.' + parentClass).find("input[type= 'checkbox']:checked").each(function() {
            checkedData = (checkedData !== '') ? checkedData + ', ' + $(this).val() : $(this).val();
        });
        $('#' + id).val(checkedData);
    }
</script>
<!-- new -->
@php
$addProductPermission = user()->permission('add_product');
@endphp

<!-- CREATE INVOICE START -->
<div class="bg-white rounded b-shadow-4 create-inv">
    <!-- HEADING START -->
    <div class="px-lg-4 px-md-4 px-3 py-3">
        <h4 class="mb-0 f-21 font-weight-normal text-capitalize">@lang('app.invoice') @lang('app.details')</h4>
    </div>
    <!-- HEADING END -->
    <hr class="m-0 border-top-grey">
    <!-- FORM START -->
    <x-form class="c-inv-form" id="saveInvoiceForm">
        @if (isset($type) && $type == 'proposal')
            <input type="hidden" name="proposal_id" value="{{ $proposalId }}">
        @endif
        @if (isset($type) && $type == 'estimate')
            <input type="hidden" name="estimate_id" value="{{ $estimateId }}">
        @endif

        <!-- INVOICE NUMBER, DATE, DUE DATE, FREQUENCY START -->
        <div class="row px-lg-4 px-md-4 px-3 py-3">
            <!-- INVOICE NUMBER START -->
            <div class="col-md-3">
                <div class="form-group mb-lg-0 mb-md-0 mb-4">
                    <x-forms.label class="mb-12" fieldId="invoice_number"
                        :fieldLabel="__('modules.invoices.invoiceNumber')" fieldRequired="true">
                    </x-forms.label>
                    <x-forms.input-group>
                        <x-slot name="prepend">
                            <span
                                class="input-group-text">{{ invoice_setting()->invoice_prefix }}#{{ $zero }}</span>
                        </x-slot>
                        <input type="text" name="invoice_number" id="invoice_number" class="form-control height-35 f-15"
                            value="{{ is_null($lastInvoice) ? 1 : $lastInvoice }}">
                    </x-forms.input-group>
                </div>
            </div>

            <!-- INVOICE NUMBER END -->
            <!-- INVOICE DATE START -->
            <div class="col-md-3">
                <div class="form-group mb-lg-0 mb-md-0 mb-4">
                    <x-forms.label fieldId="due_date" :fieldLabel="__('modules.invoices.invoiceDate')">
                    </x-forms.label>
                    <div class="input-group">
                        <input type="text" id="invoice_date" name="issue_date"
                            class="px-6 position-relative text-dark font-weight-normal form-control height-35 rounded p-0 text-left f-15"
                            placeholder="@lang('placeholders.date')"
                            value="{{ now($global->timezone)->format($global->date_format) }}">
                    </div>
                </div>
            </div>
            <!-- INVOICE DATE END -->
            <!-- DUE DATE START -->
            <div class="col-md-3">
                <div class="form-group mb-lg-0 mb-md-0 mb-4">
                    <x-forms.label fieldId="due_date" :fieldLabel="__('app.dueDate')"></x-forms.label>
                    <div class="input-group ">
                        <input type="text" id="due_date" name="due_date"
                            class="px-6 position-relative text-dark font-weight-normal form-control height-35 rounded p-0 text-left f-15"
                            placeholder="@lang('placeholders.date')"
                            value="{{ Carbon\Carbon::now($global->timezone)->addDays($invoiceSetting->due_after)->format($global->date_format) }}">
                    </div>
                </div>
            </div>
            <!-- DUE DATE END -->
            <!-- FREQUENCY START -->
            <div class="col-md-3">
                <div class="form-group c-inv-select mb-lg-0 mb-md-0 mb-4">
                    <x-forms.label fieldId="currency_id" :fieldLabel="__('modules.invoices.currency')">
                    </x-forms.label>

                    <div class="select-others height-35 rounded">
                        <select class="form-control select-picker" name="currency_id" id="currency_id">
                            @foreach ($currencies as $currency)
                                <option @if (isset($estimate))
                                    @if ($currency->id == $estimate->currency_id) selected @endif
                                @else
                                    @if ($currency->id == $global->currency_id)
                                        selected @endif
                            @endif
                            value="{{ $currency->id }}">
                            {{ $currency->currency_code . ' (' . $currency->currency_symbol . ')' }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <!-- FREQUENCY END -->
        </div>
        <!-- INVOICE NUMBER, DATE, DUE DATE, FREQUENCY END -->

        <hr class="m-0 border-top-grey">

        <!-- CLIENT, PROJECT, GST, BILLING, SHIPPING ADDRESS START -->
        <div class="row px-lg-4 px-md-4 px-3 pt-3">
            <!-- CLIENT START -->
            <div class="col-md-4">

                @if (isset($client) && !is_null($client))
                    <div class="form-group mb-lg-0 mb-md-0 mb-4">
                        <x-forms.label fieldId="due_date" :fieldLabel="__('app.client')">
                        </x-forms.label>
                        <div class="input-group">
                            <input type="hidden" name="client_id" id="client_id" value="{{ $client->id }}">
                            <input type="text" value="{{ $client->name }}"
                                class="form-control height-35 f-15 readonly-background" readonly>
                        </div>
                    </div>
                @else
                    <x-client-selection-dropdown :clients="$clients" :selected="$estimate->client_id ?? null" />
                @endif

            </div>
            <!-- CLIENT END -->

            <!-- PROJECT START -->
            <div class="col-md-4">
                @if (isset($project) && !is_null($project))
                    <div class="form-group mb-lg-0 mb-md-0 mb-4">
                        <x-forms.label fieldId="due_date" :fieldLabel="__('app.project')">
                        </x-forms.label>
                        <div class="input-group">
                            <input type="hidden" name="project_id" id="project_id" value="{{ $project->id }}">
                            <input type="text" value="{{ $project->project_name }}"
                                class="form-control height-35 f-15 readonly-background" readonly>
                        </div>
                    </div>
                @else
                    <div class="form-group c-inv-select mb-4">
                        <x-forms.label fieldId="project_id" :fieldLabel="__('app.project')">
                        </x-forms.label>
                        <div class="select-others height-35 rounded">
                            <select class="form-control select-picker" data-live-search="true" data-size="8"
                                name="project_id" id="project_id">
                                <option value="">--</option>
                                @if (isset($estimate) && $estimate->client)
                                    @foreach ($estimate->client->projects as $item)
                                        <option value="{{ $item->id }}">{{ $item->project_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                @endif
            </div>
            <!-- PROJECT END -->

            <div class="col-md-4">
                <div class="form-group c-inv-select mb-4">
                    <x-forms.label fieldId="calculate_tax" :fieldLabel="__('modules.invoices.calculateTax')">
                    </x-forms.label>
                    <div class="select-others height-35 rounded">
                        <select class="form-control select-picker" data-live-search="true" data-size="8"
                            name="calculate_tax" id="calculate_tax">
                            <option value="after_discount" @if (isset($estimate) && $estimate->calculate_tax == 'after_discount') selected @endif>
                                @lang('modules.invoices.afterDiscount')</option>
                            <option value="before_discount" @if (isset($estimate) && $estimate->calculate_tax == 'before_discount') selected @endif>
                                @lang('modules.invoices.beforeDiscount')</option>
                        </select>
                    </div>
                </div>
            </div>

        </div>
        <div class="row px-lg-4 px-md-4 px-3 py-3">
            <!-- BILLING ADDRESS START -->
            <div class="col-md-4">
                <div class="form-group c-inv-select mb-0">
                    <label class="f-14 text-dark-grey mb-12 text-capitalize w-100"
                        for="usr">@lang('modules.invoices.billingAddress')</label>
                    <p class="f-15" id="client_billing_address">
                        @if (isset($estimate) && $estimate->client)
                            {!! nl2br($estimate->client->clientDetails->address) !!}
                        @elseif (isset($estimate) && isset($client))
                            {!! nl2br($client->clientDetails->address) !!}
                        @else
                            <span class="text-lightest">@lang('messages.selectCustomerForBillingAddress')</span>
                        @endif
                    </p>
                </div>
            </div>
            <!-- BILLING ADDRESS END -->
            <!-- SHIPPING ADDRESS START -->
                    <!-- <div class="col-md-4">
                        <div class="form-group c-inv-select mb-lg-0 mb-md-0 mb-4">
                            <label class="f-14 text-dark-grey mb-12 text-capitalize w-100"
                                for="usr">@lang('modules.invoices.shippingAddress') </label>
                            <p class="f-15" id="client_shipping_address">
                                @if (isset($estimate) && $estimate->client && $estimate->client->clientDetails->shipping_address)
                                    {!! nl2br($estimate->client->clientDetails->shipping_address) !!}
                                @elseif(isset($client) && $client->clientDetails &&
                                    $client->clientDetails->shipping_address))
                                    {!! nl2br($client->clientDetails->shipping_address) !!}
                                @else
                                    <a href="javascript:;" class="text-capitalize" id="show-shipping-field"><i
                                            class="f-12 mr-2 fa fa-plus"></i>@lang('app.addShippingAddress')</a>
                                @endif
                            </p>
                            <p class="d-none" id="add-shipping-field">
                                <textarea class="form-control f-14 pt-2" rows="3" placeholder="@lang('placeholders.address')"
                                    name="shipping_address" id="shipping_address">@if (isset($estimate) && $estimate->client) {!! nl2br($estimate->client->clientDetails->shipping_address) !!} @endif</textarea>
                            </p>
                        </div>
                    </div> -->
            <!-- SHIPPING ADDRESS END -->

            <div class="col-md-4">
                <div class="form-group c-inv-select mb-4">
                    <x-forms.label fieldId="company_address_id" :fieldLabel="__('modules.invoices.generatedBy')">
                    </x-forms.label>
                    <div class="select-others height-35 rounded">
                        <select class="form-control select-picker" data-live-search="true" data-size="8"
                            name="company_address_id" id="company_address_id">
                            @foreach ($companyAddresses as $item)
                                <option {{ $item->is_default ? 'selected' : '' }} value="{{ $item->id }}">
                                    {{ $item->address }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <!-- CLIENT, PROJECT, GST, BILLING, SHIPPING ADDRESS END -->

        @if (isset($fields) && count($fields) > 0)
            <div class="row px-lg-4 px-md-4 px-3 pt-3">
                @foreach ($fields as $field)
                    <div class="col-md-4">
                        @if ($field->type == 'text')
                            <x-forms.text fieldId="custom_fields_data[{{ $field->name . '_' . $field->id }}]"
                                :fieldLabel="$field->label"
                                fieldName="custom_fields_data[{{ $field->name . '_' . $field->id }}]"
                                :fieldPlaceholder="$field->label"
                                :fieldRequired="($field->required === 'yes') ? true : false">
                            </x-forms.text>
                        @elseif($field->type == 'password')
                            <x-forms.password fieldId="custom_fields_data[{{ $field->name . '_' . $field->id }}]"
                                :fieldLabel="$field->label"
                                fieldName="custom_fields_data[{{ $field->name . '_' . $field->id }}]"
                                :fieldPlaceholder="$field->label"
                                :fieldRequired="($field->required === 'yes') ? true : false">
                            </x-forms.password>
                        @elseif($field->type == 'number')
                            <x-forms.number fieldId="custom_fields_data[{{ $field->name . '_' . $field->id }}]"
                                :fieldLabel="$field->label"
                                fieldName="custom_fields_data[{{ $field->name . '_' . $field->id }}]"
                                :fieldPlaceholder="$field->label"
                                :fieldRequired="($field->required === 'yes') ? true : false">
                            </x-forms.number>
                        @elseif($field->type == 'textarea')
                            <x-forms.textarea :fieldLabel="$field->label"
                                fieldName="custom_fields_data[{{ $field->name . '_' . $field->id }}]"
                                fieldId="custom_fields_data[{{ $field->name . '_' . $field->id }}]"
                                :fieldRequired="($field->required === 'yes') ? true : false"
                                :fieldPlaceholder="$field->label">
                            </x-forms.textarea>
                        @elseif($field->type == 'radio')
                            <div class="form-group my-3">
                                <x-forms.label fieldId="custom_fields_data[{{ $field->name . '_' . $field->id }}]"
                                    :fieldLabel="$field->label"
                                    :fieldRequired="($field->required === 'yes') ? true : false">
                                </x-forms.label>
                                <div class="d-flex">
                                    @foreach ($field->values as $key => $value)
                                        <x-forms.radio fieldId="optionsRadios{{ $key . $field->id }}"
                                            :fieldLabel="$value"
                                            fieldName="custom_fields_data[{{ $field->name . '_' . $field->id }}]"
                                            :fieldValue="$value" :checked="($key == 0) ? true : false" />
                                    @endforeach
                                </div>
                            </div>
                        @elseif($field->type == 'select')
                            <div class="form-group my-3">
                                <x-forms.label fieldId="custom_fields_data[{{ $field->name . '_' . $field->id }}]"
                                    :fieldLabel="$field->label"
                                    :fieldRequired="($field->required === 'yes') ? true : false">
                                </x-forms.label>
                                {!! Form::select('custom_fields_data[' . $field->name . '_' . $field->id . ']', $field->values, isset($editUser) ? $editUser->custom_fields_data['field_' . $field->id] : '', ['class' => 'form-control select-picker']) !!}
                            </div>
                        @elseif($field->type == 'date')
                            <x-forms.datepicker custom="true"
                                fieldId="custom_fields_data[{{ $field->name . '_' . $field->id }}]"
                                :fieldRequired="($field->required === 'yes') ? true : false" :fieldLabel="$field->label"
                                fieldName="custom_fields_data[{{ $field->name . '_' . $field->id }}]"
                                :fieldValue="now()->timezone($global->timezone)->format($global->date_format)"
                                :fieldPlaceholder="$field->label" />
                        @elseif($field->type == 'checkbox')
                            <div class="form-group my-3">
                                <x-forms.label fieldId="custom_fields_data[{{ $field->name . '_' . $field->id }}]"
                                    :fieldLabel="$field->label"
                                    :fieldRequired="($field->required === 'yes') ? true : false">
                                </x-forms.label>
                                <div class="d-flex checkbox-{{ $field->id }}">
                                    <input type="hidden"
                                        name="custom_fields_data[{{ $field->name . '_' . $field->id }}]"
                                        id="{{ $field->name . '_' . $field->id }}">

                                    @foreach ($field->values as $key => $value)
                                        <x-forms.checkbox fieldId="optionsRadios{{ $key . $field->id }}"
                                            :fieldLabel="$value" fieldName="$field->name.'_'.$field->id.'[]'"
                                            :fieldValue="$value"
                                            onchange="checkboxChange('checkbox-{{ $field->id }}', '{{ $field->name . '_' . $field->id }}')"
                                            :fieldRequired="($field->required === 'yes') ? true : false" />
                                    @endforeach
                                </div>
                            </div>
                        @endif

                    </div>
                @endforeach
            </div>
        @endif

        <hr class="m-0 border-top-grey">

        <div class="d-flex px-4 py-3">
            <div class="form-group">
                <x-forms.input-group>
                    <select class="form-control select-picker" data-live-search="true" data-size="8" id="add-products">
                        <option value="">{{ __('app.select') . ' ' . __('app.product') }}</option>
                        @foreach ($products as $item)
                            <option data-content="{{ $item->name }}" value="{{ $item->id }}">
                                {{ $item->name }}</option>
                        @endforeach
                    </select>
                    @if ($addProductPermission == 'all' || $addProductPermission == 'added')
                        <x-slot name="append">
                            <a href="{{ route('products.create') }}" data-redirect-url="{{ url()->full() }}"
                                class="btn btn-outline-secondary border-grey openRightModal">@lang('app.add')</a>
                        </x-slot>
                    @endif
                </x-forms.input-group>

            </div>
        </div>

        <div id="sortable">
            @if (isset($estimate))
                @foreach ($estimate->items as $key => $item)
                    <!-- DESKTOP DESCRIPTION TABLE START -->
                    <div class="d-flex px-4 py-3 c-inv-desc item-row">

                        <div class="c-inv-desc-table w-100 d-lg-flex d-md-flex d-block">
                            <table width="100%">
                                <tbody>
                                    <tr class="text-dark-grey font-weight-bold f-14">
                                        <td width="{{ $invoiceSetting->hsn_sac_code_show ? '40%' : '50%' }}"
                                            class="border-0 inv-desc-mbl btlr">@lang('app.description')</td>
                                        @if ($invoiceSetting->hsn_sac_code_show)
                                            <td width="10%" class="border-0" align="right">@lang("app.hsnSac")
                                            </td>
                                        @endif
                                        <td width="10%" class="border-0" align="right">
                                            @lang("modules.invoices.qty")
                                        </td>
                                        <td width="10%" class="border-0" align="right">
                                            @lang("modules.invoices.unitPrice")</td>
                                        <td width="13%" class="border-0" align="right">
                                            @lang('modules.invoices.tax')
                                        </td>
                                        <td width="17%" class="border-0 bblr-mbl" align="right">
                                            @lang('modules.invoices.amount')</td>
                                    </tr>
                                    <tr>
                                        <td class="border-bottom-0 btrr-mbl btlr">
                                            <input type="text" class="form-control f-14 border-0 w-100 item_name"
                                                name="item_name[]" placeholder="@lang('modules.expenses.itemName')"
                                                value="{{ $item->item_name }}">
                                        </td>
                                        <td class="border-bottom-0 d-block d-lg-none d-md-none">
                                            <textarea class="f-14 border-0 w-100 mobile-description"
                                                placeholder="@lang('placeholders.invoices.description')"
                                                name="item_summary[]">{{ $item->item_summary }}</textarea>
                                        </td>
                                        @if ($invoiceSetting->hsn_sac_code_show)
                                            <td class="border-bottom-0">
                                                <input type="text"
                                                    class="form-control f-14 border-0 w-100 text-right hsn_sac_code"
                                                    value="{{ $item->hsn_sac_code }}" name="hsn_sac_code[]">
                                            </td>
                                        @endif
                                        <td class="border-bottom-0">
                                            <input type="number" min="1"
                                                class="form-control f-14 border-0 w-100 text-right quantity"
                                                value="{{ $item->quantity }}" name="quantity[]">
                                        </td>
                                        <td class="border-bottom-0">
                                            <input type="number" class="f-14 border-0 w-100 text-right cost_per_item"
                                                placeholder="0.00" value="{{ $item->unit_price }}"
                                                name="cost_per_item[]" min="1">
                                        </td>
                                        <td class="border-bottom-0">
                                            <div class="select-others height-35 rounded border-0">
                                                <select id="multiselect" name="taxes[{{ $key }}][]"
                                                    multiple="multiple"
                                                    class="select-picker type customSequence border-0" data-size="3">
                                                    @foreach ($taxes as $tax)
                                                        <option data-rate="{{ $tax->rate_percent }}"
                                                            @if (isset($item->taxes) && array_search($tax->id, json_decode($item->taxes)) !== false) selected @endif value="{{ $tax->id }}">
                                                            {{ $tax->tax_name }}:
                                                            {{ $tax->rate_percent }}%</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td rowspan="2" align="right" valign="top" class="bg-amt-grey btrr-bbrr">
                                            <span
                                                class="amount-html">{{ number_format((float) $item->amount, 2, '.', '') }}</span>
                                            <input type="hidden" class="amount" name="amount[]"
                                                value="{{ $item->amount }}">
                                        </td>
                                    </tr>
                                    <tr class="d-none d-md-block d-lg-table-row">
                                        <td colspan="{{ $invoiceSetting->hsn_sac_code_show ? '5' : '4' }}"
                                            class="dash-border-top bblr">
                                            <textarea class="f-14 border-0 w-100 desktop-description"
                                                name="item_summary[]"
                                                placeholder="@lang('placeholders.invoices.description')">{{ $item->item_summary }}</textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <a href="javascript:;"
                                class="d-flex align-items-center justify-content-center ml-3 remove-item"><i
                                    class="fa fa-times-circle f-20 text-lightest"></i></a>
                        </div>
                    </div>
                    <!-- DESKTOP DESCRIPTION TABLE END -->
                @endforeach
            @else
                <!-- DESKTOP DESCRIPTION TABLE START -->
                <div class="d-flex px-4 py-3 c-inv-desc item-row">

                    <div class="c-inv-desc-table w-100 d-lg-flex d-md-flex d-block">
                        <table width="100%">
                            <tbody>
                                <tr class="text-dark-grey font-weight-bold f-14">
                                    <td width="{{ $invoiceSetting->hsn_sac_code_show ? '40%' : '50%' }}"
                                        class="border-0 inv-desc-mbl btlr">@lang('app.description')</td>
                                    @if ($invoiceSetting->hsn_sac_code_show)
                                        <td width="10%" class="border-0" align="right">@lang("app.hsnSac")</td>
                                    @endif
                                    <td width="10%" class="border-0" align="right">@lang("modules.invoices.qty")
                                    </td>
                                    <td width="10%" class="border-0" align="right">
                                        @lang("modules.invoices.unitPrice")
                                    </td>
                                    <td width="13%" class="border-0" align="right">@lang('modules.invoices.tax')
                                    </td>
                                    <td width="17%" class="border-0 bblr-mbl" align="right">
                                        @lang('modules.invoices.amount')</td>
                                </tr>
                                <tr>
                                    <td class="border-bottom-0 btrr-mbl btlr">
                                        <input type="text" class="form-control f-14 border-0 w-100 item_name"
                                            name="item_name[]" placeholder="@lang('modules.expenses.itemName')">
                                    </td>
                                    <td class="border-bottom-0 d-block d-lg-none d-md-none">
                                        <textarea class="form-control f-14 border-0 w-100 mobile-description"
                                            name="item_summary[]"
                                            placeholder="@lang('placeholders.invoices.description')"></textarea>
                                    </td>
                                    @if ($invoiceSetting->hsn_sac_code_show)
                                        <td class="border-bottom-0">
                                            <input type="text"
                                                class="form-control f-14 border-0 w-100 text-right hsn_sac_code"
                                                placeholder="" name="hsn_sac_code[]">
                                        </td>
                                    @endif
                                    <td class="border-bottom-0">
                                        <input type="number" min="1"
                                            class="form-control f-14 border-0 w-100 text-right quantity" value="1"
                                            name="quantity[]">
                                    </td>
                                    <td class="border-bottom-0">
                                        <input type="number" min="1"
                                            class="f-14 border-0 w-100 text-right cost_per_item" placeholder="0.00"
                                            value="0" name="cost_per_item[]">
                                    </td>
                                    <td class="border-bottom-0">
                                        <div class="select-others height-35 rounded border-0">
                                            <select id="multiselect" name="taxes[0][]" multiple="multiple"
                                                class="select-picker type customSequence border-0" data-size="3">
                                                @foreach ($taxes as $tax)
                                                    <option data-rate="{{ $tax->rate_percent }}"
                                                        value="{{ $tax->id }}">{{ $tax->tax_name }}:
                                                        {{ $tax->rate_percent }}%</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td rowspan="2" align="right" valign="top" class="bg-amt-grey btrr-bbrr">
                                        <span class="amount-html">0.00</span>
                                        <input type="hidden" class="amount" name="amount[]" value="0">
                                    </td>
                                </tr>
                                <tr class="d-none d-md-table-row d-lg-table-row">
                                    <td colspan="{{ $invoiceSetting->hsn_sac_code_show ? '5' : '4' }}"
                                        class="dash-border-top bblr">
                                        <textarea class="f-14 border-0 w-100 desktop-description" name="item_summary[]"
                                            placeholder="@lang('placeholders.invoices.description')"></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <a href="javascript:;"
                            class="d-flex align-items-center justify-content-center ml-3 remove-item"><i
                                class="fa fa-times-circle f-20 text-lightest"></i></a>
                    </div>
                </div>
                <!-- DESKTOP DESCRIPTION TABLE END -->
            @endif

        </div>
        <!--  ADD ITEM START-->
        <div class="row px-lg-4 px-md-4 px-3 pb-3 pt-0 mb-3  mt-2">
            <div class="col-md-12">
                <a class="f-15 f-w-500" href="javascript:;" id="add-item"><i
                        class="icons icon-plus font-weight-bold mr-1"></i>@lang('modules.invoices.addItem')</a>
            </div>
        </div>
        <!--  ADD ITEM END-->

        <hr class="m-0 border-top-grey">

        <!-- TOTAL, DISCOUNT START -->
        <div class="d-flex px-lg-4 px-md-4 px-3 pb-3 c-inv-total">
            <table width="100%" class="text-right f-14 text-capitalize">
                <tbody>
                    <tr>
                        <td width="50%" class="border-0 d-lg-table d-md-table d-none"></td>
                        <td width="50%" class="p-0 border-0 c-inv-total-right">
                            <table width="100%">
                                <tbody>
                                    <tr>
                                        <td colspan="2" class="border-top-0 text-dark-grey">
                                            @lang('modules.invoices.subTotal')</td>
                                        <td width="30%" class="border-top-0 sub-total">0.00</td>
                                        <input type="hidden" class="sub-total-field" name="sub_total" value="0">
                                    </tr>
                                    <tr>
                                        <td width="20%" class="text-dark-grey">@lang('modules.invoices.discount')
                                        </td>
                                        <td width="40%" style="padding: 5px;">
                                            <table width="100%">
                                                <tbody>
                                                    <tr>
                                                        <td width="70%" class="c-inv-sub-padding">
                                                            <input type="number" min="0" name="discount_value"
                                                                class="form-control f-14 border-0 w-100 text-right discount_value"
                                                                placeholder="0"
                                                                value="{{ isset($estimate) ? $estimate->discount : '0' }}">
                                                        </td>
                                                        <td width="30%" align="left" class="c-inv-sub-padding">
                                                            <div
                                                                class="select-others select-tax height-35 rounded border-0">
                                                                <select class="form-control select-picker"
                                                                    id="discount_type" name="discount_type">
                                                                    <option @if (isset($estimate) && $estimate->discount_type == 'percent') selected @endif value="percent">%
                                                                    </option>
                                                                    <option @if (isset($estimate) && $estimate->discount_type == 'fixed') selected @endif value="fixed">
                                                                        @lang('modules.invoices.amount')</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td><span
                                                id="discount_amount">{{ isset($estimate) ? number_format((float) $estimate->discount, 2, '.', '') : '0.00' }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>@lang('modules.invoices.tax')</td>
                                        <td colspan="2" class="p-0 border-0">
                                            <table width="100%" id="invoice-taxes">
                                                <tr>
                                                    <td colspan="2"><span class="tax-percent">0.00</span></td>
                                                </tr>
                                            </table>
                                        </td>

                                    </tr>
                                    <tr class="bg-amt-grey f-16 f-w-500">
                                        <td colspan="2">@lang('modules.invoices.total')</td>
                                        <td><span class="total">0.00</span></td>
                                        <input type="hidden" class="total-field" name="total" value="0">
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- TOTAL, DISCOUNT END -->

        <!-- NOTE AND TERMS AND CONDITIONS START -->
        <div class="d-flex flex-wrap px-lg-4 px-md-4 px-3 py-3">
            <div class="col-md-6 col-sm-12 c-inv-note-terms p-0 mb-lg-0 mb-md-0 mb-3">
                <x-forms.label fieldId="" class="text-capitalize" :fieldLabel="__('modules.invoices.note')">
                </x-forms.label>
                <textarea class="form-control" name="note" id="note" rows="4"
                    placeholder="@lang('placeholders.invoices.note')"></textarea>
            </div>
            <div class="col-md-6 col-sm-12 p-0 c-inv-note-terms">
                <x-forms.label fieldId="" :fieldLabel="__('modules.invoiceSettings.invoiceTerms')">
                </x-forms.label>
                <p>
                    {!! nl2br($invoiceSetting->invoice_terms) !!}
                </p>
            </div>
        </div>
        <!-- NOTE AND TERMS AND CONDITIONS END -->

        <!-- CANCEL SAVE SEND START -->
        <x-form-actions class="c-inv-btns d-block d-lg-flex d-md-flex">
            <div class="d-flex mb-3 mb-lg-0 mb-md-0">

                <div class="inv-action dropup mr-3">
                    <button class="btn-primary dropdown-toggle" type="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        @lang('app.save')
                        <span><i class="fa fa-chevron-up f-15 text-white"></i></span>
                    </button>
                    <!-- DROPDOWN - INFORMATION -->
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuBtn" tabindex="0">
                        <li>
                            <a class="dropdown-item f-14 text-dark save-form" href="javascript:;" data-type="save">
                                <i class="fa fa-save f-w-500 mr-2 f-11"></i> @lang('app.save')
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item f-14 text-dark save-form" href="javascript:void(0);"
                                data-type="send">
                                <i class="fa fa-paper-plane f-w-500  mr-2 f-12"></i> @lang('app.saveSend')
                            </a>
                        </li>
                    </ul>
                </div>

                <x-forms.button-secondary data-type="draft" class="save-form mr-3">@lang('app.saveDraft')
                </x-forms.button-secondary>

            </div>

            <x-forms.button-cancel :link="route('invoices.index')" class="border-0 ">@lang('app.cancel')
            </x-forms.button-cancel>

        </x-form-actions>
        <!-- CANCEL SAVE SEND END -->

    </x-form>
    <!-- FORM END -->
</div>
<!-- CREATE INVOICE END -->
<script>
    $(document).ready(function() {

        const hsn_status = {{ $invoiceSetting->hsn_sac_code_show }};
        const defaultClient = "{{ request('client_id') }}";

        if ($('.custom-date-picker').length > 0) {
            datepicker('.custom-date-picker', {
                position: 'bl',
                ...datepickerConfig
            });
        }

        const dp1 = datepicker('#invoice_date', {
            position: 'bl',
            ...datepickerConfig
        });
        const dp2 = datepicker('#due_date', {
            position: 'bl',
            ...datepickerConfig
        });

        $('#client_list_id').change(function() {
            var id = $(this).val();
            changeClient(id);
        });

        function changeClient(id) {

            if (id == '') {
                id = 0;
            }

            var url = "{{ route('clients.project_list', ':id') }}";
            url = url.replace(':id', id);
            var token = "{{ csrf_token() }}";

            $.easyAjax({
                url: url,
                container: '#saveInvoiceForm',
                type: "POST",
                blockUI: true,
                data: {
                    _token: token
                },
                success: function(response) {
                    if (response.status == 'success') {
                        $('#project_id').html(response.data);
                        $('#project_id').selectpicker('refresh');
                    }
                }
            });

            var url = "{{ route('clients.ajax_details', ':id') }}";
            url = url.replace(':id', id);

            $.easyAjax({
                url: url,
                container: '#saveInvoiceForm',
                type: "POST",
                blockUI: true,
                data: {
                    _token: token
                },
                success: function(response) {
                    if (response.status == 'success') {
                        if (response.data !== null) {
                            $('#client_billing_address').html(nl2br(response.data.client_details
                                .address));
                            $('#add-shipping-field').addClass('d-none');
                            $('#client_shipping_address').removeClass('d-none');

                            if (response.data.client_details.shipping_address === null) {
                                var addShippingLink =
                                    '<a href="javascript:;" class="text-capitalize" id="show-shipping-field"><i class="f-12 mr-2 fa fa-plus"></i>@lang("app.addShippingAddress")</a>';
                                $('#client_shipping_address').html(addShippingLink);
                            } else {
                                $('#client_shipping_address').html(nl2br(response.data
                                    .client_details
                                    .shipping_address));
                            }

                        } else {
                            $('#client_billing_address').html(
                                '<span class="text-lightest">@lang("messages.selectCustomerForBillingAddress")</span>'
                            );
                        }
                    } else {
                        var addShippingLink =
                            '<a href="javascript:;" class="text-capitalize" id="show-shipping-field"><i class="f-12 mr-2 fa fa-plus"></i>@lang("app.addShippingAddress")</a>';
                        $('#client_shipping_address').html(addShippingLink);
                    }
                }
            });

        }

        $('body').on('click', '#show-shipping-field', function() {
            $('#add-shipping-field, #client_shipping_address').toggleClass('d-none');
        });

        $('#add-products').on('changed.bs.select', function(e, clickedIndex, isSelected, previousValue) {
            e.stopImmediatePropagation()
            var id = $(this).val();
            if (previousValue != id && id != '') {
                addProduct(id);
            }
        });

        function addProduct(id) {
            var currencyId = $('#currency_id').val();

            $.easyAjax({
                url: "{{ route('invoices.add_item') }}",
                type: "GET",
                data: {
                    id: id,
                    currencyId: currencyId
                },
                blockUI: true,
                success: function(response) {
                    $(response.view).hide().appendTo("#sortable").fadeIn(500);
                    calculateTotal();

                    var noOfRows = $(document).find('#sortable .item-row').length;
                    var i = $(document).find('.item_name').length - 1;
                    var itemRow = $(document).find('#sortable .item-row:nth-child(' + noOfRows +
                        ') select.type');
                    itemRow.attr('id', 'multiselect' + i);
                    itemRow.attr('name', 'taxes[' + i + '][]');
                    $(document).find('#multiselect' + i).selectpicker();
                }
            });
        }

        $(document).on('click', '#add-item', function() {

            var i = $(document).find('.item_name').length;
            var item =
                ` <div class="d-flex px-4 py-3 c-inv-desc item-row">
                <div class="c-inv-desc-table w-100 d-lg-flex d-md-flex d-block">
                <table width="100%">
                <tbody>
                <tr class="text-dark-grey font-weight-bold f-14">
                <td width="{{ $invoiceSetting->hsn_sac_code_show ? '40%' : '50%' }}" class="border-0 inv-desc-mbl btlr">@lang("app.description")</td>`;

            if (hsn_status) {
                item += `<td width="10%" class="border-0" align="right">@lang("app.hsnSac")</td>`;
            }

            item += `
                    <td width="10%" class="border-0" align="right">@lang("modules.invoices.qty")</td>
                    <td width="10%" class="border-0" align="right">@lang("modules.invoices.unitPrice")</td>
                    <td width="13%" class="border-0" align="right">@lang("modules.invoices.tax")</td>
                    <td width="17%" class="border-0 bblr-mbl" align="right">@lang("modules.invoices.amount")</td>
                </tr>
                <tr>
                    <td class="border-bottom-0 btrr-mbl btlr">
                    <input type="text" class="form-control f-14 border-0 w-100 item_name" name="item_name[]" placeholder="@lang("modules.expenses.itemName")">
                    </td>
                    <td class="border-bottom-0 d-block d-lg-none d-md-none">
                    <textarea class="f-14 border-0 w-100 mobile-description" name="item_summary[]" placeholder="@lang("placeholders.invoices.description")"></textarea>
                    </td>
                `;

            if (hsn_status) {
                item += `<td class="border-bottom-0">
                    <input type="text" min="1" class="form-control f-14 border-0 w-100 text-right hsn_sac_code" name="hsn_sac_code[]" >
                    </td>`;
            }
            item += `<td class="border-bottom-0">
                <input type="number" min="1" class="form-control f-14 border-0 w-100 text-right quantity" value="1" name="quantity[]">
                </td>
                <td class="border-bottom-0">
                <input type="number" min="1" class="f-14 border-0 w-100 text-right cost_per_item" placeholder="0.00" value="0" name="cost_per_item[]">
                </td>
                <td class="border-bottom-0">
                <div class="select-others height-35 rounded border-0">
                <select id="multiselect${i}" name="taxes[${i}][]" multiple="multiple" class="select-picker type customSequence" data-size="3">
            @foreach ($taxes as $tax)
                <option data-rate="{{ $tax->rate_percent }}" value="{{ $tax->id }}">
                    {{ $tax->tax_name }}:{{ $tax->rate_percent }}%</option>
            @endforeach

                </select>
                </div>
                </td>
                <td rowspan="2" align="right" valign="top" class="bg-amt-grey btrr-bbrr">
                <span class="amount-html">0.00</span>
                <input type="hidden" class="amount" name="amount[]" value="0">
                </td>
                </tr>
                <tr class="d-none d-md-table-row d-lg-table-row">
                <td colspan="{{ $invoiceSetting->hsn_sac_code_show ? 5 : 4 }}" class="dash-border-top bblr">
                <textarea class="f-14 border-0 w-100 desktop-description" name="item_summary[]" placeholder="@lang("placeholders.invoices.description")"></textarea>
                </td>
                </tr>
                </tbody>
                </table>
                </div>
                <a href="javascript:;" class="d-flex align-items-center justify-content-center ml-3 remove-item"><i class="fa fa-times-circle f-20 text-lightest"></i></a>
                </div>`;
            $(item).hide().appendTo("#sortable").fadeIn(500);
            $('#multiselect' + i).selectpicker();
        });

        $('#saveInvoiceForm').on('click', '.remove-item', function() {
            $(this).closest('.item-row').fadeOut(300, function() {
                $(this).remove();
                $('select.customSequence').each(function(index) {
                    $(this).attr('name', 'taxes[' + index + '][]');
                    $(this).attr('id', 'multiselect' + index + '');
                });
                calculateTotal();
            });
        });

        $('.save-form').click(function() {
            var type = $(this).data('type');

            if (KTUtil.isMobileDevice()) {
                $('.desktop-description').remove();
            } else {
                $('.mobile-description').remove();
            }

            calculateTotal();

            var discount = $('#discount_amount').html();
            var total = $('.sub-total-field').val();

            if (parseFloat(discount) > parseFloat(total)) {
                Swal.fire({
                    icon: 'error',
                    text: "{{ __('messages.discountExceed') }}",

                    customClass: {
                        confirmButton: 'btn btn-primary',
                    },
                    showClass: {
                        popup: 'swal2-noanimation',
                        backdrop: 'swal2-noanimation'
                    },
                    buttonsStyling: false
                });
                return false;
            }

            $.easyAjax({
                url: "{{ route('invoices.store') }}",
                container: '#saveInvoiceForm',
                type: "POST",
                blockUI: true,
                redirect: true,
                data: $('#saveInvoiceForm').serialize() + "&type=" + type,
                success: function(response) {
                    if (response.status == 'success') {
                        window.location.href = response.redirectUrl;
                    }
                }
            })
        });

        $('#saveInvoiceForm').on('click', '.remove-item', function() {
            $(this).closest('.item-row').fadeOut(300, function() {
                $(this).remove();
                $('select.customSequence').each(function(index) {
                    $(this).attr('name', 'taxes[' + index + '][]');
                    $(this).attr('id', 'multiselect' + index + '');
                });
                calculateTotal();
            });
        });

        $('#saveInvoiceForm').on('keyup', '.quantity,.cost_per_item,.item_name, .discount_value', function() {
            var quantity = $(this).closest('.item-row').find('.quantity').val();
            var perItemCost = $(this).closest('.item-row').find('.cost_per_item').val();
            var amount = (quantity * perItemCost);

            $(this).closest('.item-row').find('.amount').val(decimalupto2(amount));
            $(this).closest('.item-row').find('.amount-html').html(decimalupto2(amount));

            calculateTotal();
        });

        $('#saveInvoiceForm').on('change', '.type, #discount_type, #calculate_tax', function() {
            var quantity = $(this).closest('.item-row').find('.quantity').val();
            var perItemCost = $(this).closest('.item-row').find('.cost_per_item').val();
            var amount = (quantity * perItemCost);

            $(this).closest('.item-row').find('.amount').val(decimalupto2(amount));
            $(this).closest('.item-row').find('.amount-html').html(decimalupto2(amount));

            calculateTotal();
        });

        $('#saveInvoiceForm').on('input', '.quantity', function() {
            var quantity = $(this).closest('.item-row').find('.quantity').val();
            var perItemCost = $(this).closest('.item-row').find('.cost_per_item').val();
            var amount = (quantity * perItemCost);

            $(this).closest('.item-row').find('.amount').val(decimalupto2(amount));
            $(this).closest('.item-row').find('.amount-html').html(decimalupto2(amount));

            calculateTotal();
        });

        calculateTotal();

        init(RIGHT_MODAL);

        if (defaultClient != "") {
            changeClient(defaultClient);
        }
    });

    function checkboxChange(parentClass, id) {
        var checkedData = '';
        $('.' + parentClass).find("input[type= 'checkbox']:checked").each(function() {
            checkedData = (checkedData !== '') ? checkedData + ', ' + $(this).val() : $(this).val();
        });
        $('#' + id).val(checkedData);
    }
</script>
<!-- admin errors bag -->
   @if($errors->count() > 0)
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- table -->
<!-- form -->
<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.pain.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pains.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="pain_in_english">Category English</label>
                <input class="form-control {{ $errors->has('pain_in_korean') ? 'is-invalid' : '' }}" type="text" name="pain_in_english" id="pain_in_english" value="{{ old('pain_in_english', '') }}" >
                @if($errors->has('pain_in_english'))

                <span class="text-danger">{{ $errors->first('pain_in_english') }}</span>
                @endif

                <span class="help-block">{{ trans('cruds.pain.fields.pain_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="pain_in_korean">Category Korean</label>
                <input class="form-control {{ $errors->has('pain_in_korean') ? 'is-invalid' : '' }}" type="text" name="pain_in_korean" id="pain_in_korean" value="{{ old('pain_in_korean', '') }}" >
                @if($errors->has('pain_in_korean'))
                    <span class="text-danger">{{ $errors->first('pain_in_korean') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pain.fields.pain_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="pain_in_spanish">Category Spanish</label>
                <input class="form-control {{ $errors->has('pain_in_spanish') ? 'is-invalid' : '' }}" type="text" name="pain_in_spanish" id="pain_in_spanish" value="{{ old('pain_in_spanish', '') }}" >
                @if($errors->has('pain_in_spanish'))

                <span class="text-danger">{{ $errors->first('pain_in_spanish') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pain.fields.pain_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="pain_in_spanish">Category Vietnamese</label>
                <input class="form-control {{ $errors->has('pain_in_vietnamese') ? 'is-invalid' : '' }}" type="text" name="pain_in_vietnamese" id="pain_in_vietnamese" value="{{ old('pain_in_vietnamese', '') }}" >
                @if($errors->has('pain_in_vietnamese'))
                <span class="text-danger">{{ $errors->first('pain_in_vietnamese') }}</span>
                @endif

                <span class="help-block">{{ trans('cruds.pain.fields.pain_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>

<!-- javscript -->

// $(".male-body-part").on("click", function () {
        //   $(this).toggleClass("active");
        //   $("#selectedMaleParts").html('');
        //   $(".male-body-part.active").each(function () {
        //     $("#selectedMaleParts").append('<span>' + $(this).data("name") + '</span>');
        //   });
        // });


<!-- arabic -->
<?php


namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
$check=0;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Advertisement extends Widget_Base{


    public function get_name(){
      return 'price counter';
    }

    public function get_title(){
      return 'PriceCounter';
    }

    public function get_icon(){
      return 'fa fa-camera';
    }

    public function get_categories(){
      return ['general'];
    }

  protected function _register_controls(){

    $this->start_controls_section(
      'section_content',
      [
        'label' => 'Settings',
      ]
    );

    $this->add_control(
      'label_heading',
      [
        'label' => 'Label Heading',
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => 'My Example Heading'
      ]
    );





    $this->end_controls_section();
  }



public function render(){

  $url= get_site_url()."/wp-content/themes/twentytwenty";


  echo '
  <a href="javascript:void(0)" id="coupon">Have a coupoon code?</a><br>
  <form action="" method="post" enctype="multipart/form-data" id="form" ">
  <div>
    <input type="hidden" autocomplete="off" name="text" id="text" class="resizedTextbox" />
  </div>

  <div class="file">
  <label for="file" class="custom-file-input">Upload Your CSV</label>
    <input type="file"  id="file" name="file" value="submit" style="display:none;" accept=".csv"/>

  </div>

    </form>';

  if ( isset($_FILES['file'])) {



    if ( isset($_FILES["file"])) {

        if ($_FILES["file"]["error"] > 0) {
             echo '<div class="box">
             <p class="alert alert-danger"> Please Select File</p>
             </div>';
        }
      else {
              $temp = explode(".", $_FILES["file"]["name"]);
              $newfilename = round(microtime(true)) . '.' . end($temp);

              $user = wp_get_current_user();
              $root=str_replace('/','\\',ABSPATH) .'wp-content\uploads';

              $filename=$_FILES["file"]["name"];
              $ext = pathinfo($filename, PATHINFO_EXTENSION);
              $path=$root."\\".$newfilename . $_FILES["file"]["name"];

              if(!($ext=='csv')){

                  echo ('<p class="alert alert-danger">The file should be in csv format.</p>');

              }
          else{
                move_uploaded_file($_FILES["file"]["tmp_name"],$path);
            if (($handle = fopen($path, "r")) !== FALSE) {
                  $first_row=fgetcsv(($handle));

                  if($first_row[0]=='First Name' && $first_row[1]=='Last Name' && $first_row[2]=='Address' && $first_row[3]=='City' &&  $first_row[4]=='State' && $first_row[5]=='Zip')
                  {
                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
                    {
                          if($data[0]=='' || $data[1]=='' || $data[2]=='' || $data[3]=='' || $data[4]=='' || $data[5]==''){
                            $check=1;
                            echo '<p class="alert alert-danger">This file has blank spaces</p>';

                          }
                        if(!empty($temp)){
                            if($temp[2]==$data[2]){
                            continue;
                            }
                            else{
                              $records[]=$data;
                            }
                        }
                        else{
                          $records[]=$data;
                        }
                          $temp=$data;

                    }
                    fclose($handle);
                    if($check==0){
                      if(isset($coupon_code)){

                      }
                      $count=count($records);
                          if(isset($_POST['text'])){
                            $coupon_code=$_POST['text'];
                             global $wpdb;
                            $results = $wpdb->get_results("SELECT * FROM ypq_coupon_codes WHERE `code` = '".$coupon_code."'" );
                          }

                      if($results){
                        $price=($count)*0.06;
                      }
                      else{
                        $price=($count)*0.08;
                      }
                      echo  "<p class='alert alert-success'>Your Price will be $$price </p>";
                      $wpdb->insert('ypq_files_data', array(
                        'path' => $path,

                    ));
                    //   $sql = "INSERT INTO MyGuests (firstname, lastname, email)
                    //   VALUES ('John', 'Doe', 'john@example.com')";
                    //   global $wpdb;
                    //   $table_name = $wpdb->prefix . "csvdata";
                    //   $wpdb->insert($table_name, array('id' => $user->id, 'filepath' => $path,'price'=>$price) );
                    }

                  }

                  else{
                    echo '<p class="column-alert">Oops! The columns headers do not seem to be in the right format.
                    Please make sure it matches the sample template!</p>';

                  }

            }
          }
      }

    }

  }

}
}

// "barryvdh/laravel-dompdf": "^1.0",

<body>


    {{-- <h1 id="logo-heading">Cipdar</h1> --}}
    <div class="logo">
        <img id ="logo-heading "src="{{asset('images/logo.png')}}" alt="not found">
    </div>

    <h3 id="head">Patient Name :  {{auth()->user()->first_name}}</h3>
    <h5 id="head">Date :  {{$record->created_at->format('d/m/Y')}}</h5>
    <div class="eng-table">
        <table>
            <tr>
                <th>Category English</th>
                <th>Pain Type English</th>
                <th>Severity English</th>
            </tr>
            <tr>
                <td>{{ ucfirst($record->pains->english) }}</td>
                <td>{{ ucfirst($record->painTypes->english) }}</td>
                <td>{{ ucfirst($record->severity->english) }}</td>
            </tr>
        </table>
    </div>

    @if($language!='english')

    <div class="language-table">
        <table>
            <tr>
                <th>Category ({{$language}})</th>
                <th>Pain Type ({{$language}})</th>
                <th>Severity ({{$language}})</th>
            </tr>

            <tr>
                <td>{{ ucfirst($record->pains->$language) }}</td>
                <td>{{ ucfirst($record->painTypes->$language) }}</td>
                <td>{{ ucfirst($record->severity->$language) }}</td>
            </tr>
        </table>
    </div>
    @endif

    <div class="contact-sec">
        <ul>
        <h4>For More Information:</h4>
            <li>Contact us:9989876154</li>
            <li>Visit us: <a href="http://cipdar.clickysoft.us">cipdar.clickysoft.us</a></li>
        </ul>
    </div>

    <div id="a">

    </div>

        {{-- <h1>Category </h1>
        <span>{{ ucfirst($record->pains->$language) }}</span>

        <h1>Pain Type</h1>
        <p>{{ ucfirst($record->painTypes->$language) }}</p>

        <h1>Severity</h1>
        <p>{{ ucfirst($record->severity->$language) }}</p> --}}


</body>


<style>
    *{margin: 0px;padding: 0px;}

    .logo img{display:block;margin: 30px auto;}
    #head{text-align:left;margin-bottom: 30px}
    table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    font-size:17px;

    }
    table th {padding: 0px 15px 0px}
    .eng-table table td{font-size: 15px;letter-spacing: 1px;padding:0px 15px 0px;}
    .language-table table td{font-size: 15px;letter-spacing: 1px;padding:0px 15px 0px;}
    .eng-table{margin-bottom: 30px;}
    .language-table{margin-bottom:30px}
    .contact-sec li{list-style: disc;}



</style>


// pdffile
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">



<style>


@font-face {
    font-family: "NotoSansKR-Black";
    font-size: 15px;


    src:url({{storage_path('fonts/NotoSansKR-Black.otf')}});

}



  body{ font-family: 'NotoSansKR-Black', arial ,sans-serif; }


    *{margin: 0px;padding: 0px;}

    .logo img{display:block;margin: 30px auto;}
    #head{text-align:left;margin-bottom: 30px}
    table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    font-size:17px;

    }
    table th {padding: 0px 15px 0px}
    .eng-table table td{font-size: 15px;letter-spacing: 1px;padding:0px 15px 0px;}
    .language-table table td{font-size: 15px;letter-spacing: 1px;padding:0px 15px 0px;}
    .eng-table{margin-bottom: 30px;}
    .language-table{margin-bottom:30px}
    .contact-sec li{list-style: disc;}


</style>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>

</head>

<body>


    <div class="logo">
        <img id ="logo-heading "src="{{asset('images/logo.png')}}" alt="not found">
    </div>

    <h3 id="head">Patient Name :  {{auth()->user()->first_name}}</h3>
    <h5 id="head">Date :  {{$record->created_at->format('d/m/Y')}}</h5>
    <div class="eng-table">
        <table>
            <tr>
                <th>Category English</th>
                <th>Pain Type English</th>
                <th>Severity English</th>
            </tr>
            <tr>
                <td>{{ ucfirst($record->pains->english) }}</td>
                <td>{{ ucfirst($record->painTypes->english) }}</td>
                <td>{{ ucfirst($record->severity->english) }}</td>
            </tr>
        </table>
    </div>

    @if($language!='english')

    <div class="language-table">
        <table>
            <tr>
                <th>Category ({{$language}})</th>
                <th>Pain Type ({{$language}})</th>
                <th>Severity ({{$language}})</th>
            </tr>

            <tr>
                <td>{{ ucfirst($record->pains->$language) }}</td>
                <td>{{ ucfirst($record->painTypes->$language) }}</td>
                <td>{{ ucfirst($record->severity->$language) }}</td>
            </tr>
        </table>
    </div>
    @endif

    <div class="contact-sec">
        <ul>
        <h4>For More Information:</h4>
            <li>Contact us:9989876154</li>
            <li>Visit us: <a href="http://cipdar.clickysoft.us">cipdar.clickysoft.us</a></li>
        </ul>
    </div>

    <div id="avatar"  width="100" height="100">
        {!! $record->html !!}
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>

</html>

// config.snappy

<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Snappy PDF / Image Configuration
    |--------------------------------------------------------------------------
    |
    | This option contains settings for PDF generation.
    |
    | Enabled:
    |
    |    Whether to load PDF / Image generation.
    |
    | Binary:
    |
    |    The file path of the wkhtmltopdf / wkhtmltoimage executable.
    |
    | Timout:
    |
    |    The amount of time to wait (in seconds) before PDF / Image generation is stopped.
    |    Setting this to false disables the timeout (unlimited processing time).
    |
    | Options:
    |
    |    The wkhtmltopdf command options. These are passed directly to wkhtmltopdf.
    |    See https://wkhtmltopdf.org/usage/wkhtmltopdf.txt for all options.
    |
    | Env:
    |
    |    The environment variables to set while running the wkhtmltopdf process.
    |
    */

    'pdf' => array(
        'enabled' => true,
         'binary' => base_path('vendor/h4cc/wkhtmltopdf-amd64/bin/wkhtmltopdf-amd64'),

        'options' => array(),
        'env'     => array(),
    ),
    'image' => array(
        'enabled' => true,
         'binary'  => 'vendor/h4cc/wkhtmltoimage-amd64/wkhtmltoimage',

        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),

];
