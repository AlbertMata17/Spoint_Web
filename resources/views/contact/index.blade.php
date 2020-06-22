@extends('layouts.app')
@section('title', __('lang_v1.'.$type.'s'))

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1> @lang('lang_v1.'.$type.'s')
        <small>@lang( 'contact.manage_your_contact', ['contacts' =>  __('lang_v1.'.$type.'s') ])</small>
    </h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
<style>

.dropdown-menu{
    margin: -47px 64px 13px !important;

    
}
</style>
</section>

<!-- Main content -->
<section class="content">
    <input type="hidden" value="{{$type}}" id="contact_type">
    @component('components.widget', ['class' => 'box-primary', 'title' => __( 'contact.all_your_contact', ['contacts' => __('lang_v1.'.$type.'s') ])])
    @if($type=='customer')

    <div class="box-tools1" style="position: absolute;right: 94px; top: 5px;">

    <a class="btn  btn-primary" href="{{action('CustomerGroupController@index')}}"><i class="fa fa-users"></i> @lang('lang_v1.customer_groups')</a>

        </div>
        @endif

        @if(auth()->user()->can('supplier.create') || auth()->user()->can('customer.create'))
            @slot('tool')
                <div class="box-tools">
                    <button type="button" class="btn btn-block btn-primary btn-modal" 
                    data-href="{{action('ContactController@create', ['type' => $type])}}" 
                    data-container=".contact_modal">
                    <i class="fa fa-plus"></i> @lang('messages.add')</button>
                </div>
            @endslot
        @endif
        @if(auth()->user()->can('supplier.view') || auth()->user()->can('customer.view'))
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-responsive" id="contact_table" style="width:100%!important;">
                    <thead>
                        <tr>
                            <th>@lang('lang_v1.contact_id')</th>
                            @if($type == 'supplier') 
                                <th>@lang('business.business_name')</th>
                                <th style="width:233px !important;">@lang('contact.name')</th>
                                <th>@lang('lang_v1.added_on')</th>
                                <th>@lang('contact.mobile')</th>
                                <th>@lang('contact.total_purchase_due')</th>
                                <th>@lang('lang_v1.total_purchase_return_due')</th>
                                <th>@lang('messages.action')</th>
                            @elseif( $type == 'customer')
                                <th style="width:260px !important;">@lang('user.name')</th>
                                <th>@lang('lang_v1.added_on')</th>
                                @if($reward_enabled)
                                    <th id="rp_col">{{session('business.rp_name')}}</th>
                                @endif
                                <th>@lang('lang_v1.customer_group')</th>
                                <th style="width:232px !important;">@lang('business.address')</th>
                                <th>@lang('contact.mobile')</th>
                                <th >@lang('contact.total_sale_due')</th>
                                <th hidden>@lang('lang_v1.total_sell_return_due')</th>
                                <th>@lang('messages.action')</th>
                            @endif
                        </tr>
                    </thead>
                    <tfoot>
                        <tr class="bg-gray font-17 text-center footer-total">
                            <td @if($type == 'supplier') colspan="5" @elseif( $type == 'customer') @if($reward_enabled) colspan="7" @else colspan="6" @endif @endif><strong>@lang('sale.total'):</strong></td>
                            <td><span class="display_currency" id="footer_contact_due" data-currency_symbol ="true"></span></td>
                            <td><span class="display_currency" id="footer_contact_return_due" data-currency_symbol ="true"></span></td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        @endif
    @endcomponent

    <div class="modal fade contact_modal" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
    </div>
    <div class="modal fade pay_contact_due_modal" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel">
    </div>

</section>
<!-- /.content -->

@endsection
