<template>
    <!-- <span>MBoss Invoice Financing System</span> -->
    <div class="card">
        <strong>
            <div class="card-header text-center h2">Add Invoice Amount</div>
            <div class="col-12 text-warning">
                * refers to required information
            </div>
        </strong>

        <form
            action="/admin/invoice/approve"
            class="form newtopic"
            @submit.prevent="updateInvoice"
            ref="form"
            method="post"
        >
            <slot></slot>

            <div class="card-body" id="app">
                <!-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif -->
                <!-- <div v-if="errors.length = 0"></div> -->
                <div v-if="errors.length != 0">
                    <div class="alert alert-danger">
                        <b>Please correct the following error(s):</b>
                        <ul>
                            <li v-for="error in errors" :key="error">
                                {{ error }}
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-12">
                    <input type="hidden" id="id" name="id" v-model="new_invoice.id" />
                </div>
                <div class="form-group row">
                    <label for="price" class="col-md-3 col-form-label"
                        >Original Invoice Amount* :</label
                    >

                    <div class="col-md-8">
                        <input
                            type="number"
                            name="price"
                            v-model="new_invoice.price"
                            class="form-control"
                            v-on:change="calculateDiscountRate"
                            placeholder="Original Invoice Amount"
                            required
                        />
                    </div>
                </div>
                <!--form-group-->

                <div
                    class="h4 form-group row col-md-2"
                    style="text-decoration: underline"
                >
                    For Buyer Pricing
                </div>

                <div class="form-group row">
                    <label for="purchase_amount" class="col-md-3 col-form-label"
                        >Purchase Amount*</label
                    >

                    <div class="col-md-8">
                        <input
                            type="number"
                            name="purchase_amount"
                            v-model="new_invoice.purchase_amount"
                            class="form-control"
                            placeholder="Purchase Amount"
                            required
                        />
                    </div>
                </div>
                <!--form-group-->
                <div class="form-group row">
                    <label
                        for="receivable_amount"
                        class="col-md-3 col-form-label"
                        >Receivable Amount*</label
                    >

                    <div class="col-md-8">
                        <input
                            type="number"
                            name="receivable_amount"
                            v-model="new_invoice.receivable_amount"
                            class="form-control"
                            placeholder="Receivable Amount"
                            required
                        />
                    </div>
                </div>
                <!--form-group-->
                <div class="form-group row">
                    <label for="discount_rate" class="col-md-3 col-form-label"
                        >Discount Rate (%)*</label
                    >

                    <div class="col-md-8">
                        <input
                            type="number"
                            min="0"
                            max="100"
                            step="0.01"
                            name="discount_rate"
                            v-model="new_invoice.discount_rate"
                            class="form-control"
                            placeholder="Discount Rate"
                            required
                        />
                    </div>
                </div>
                <!--form-group-->

                <div
                    class="h4 form-group row col-md-2"
                    style="text-decoration: underline"
                >
                    For Seller Pricing
                </div>

                <div class="form-group row">
                    <label
                        for="invoice_issued_date"
                        class="col-md-3 col-form-label"
                        >Invoice Issued Date*</label
                    >

                    <div class="col-md-8">
                        <input
                            type="date"
                            name="invoice_issued_date"
                            v-model="new_invoice.invoice_issued_date"
                            v-on:change="diffBetweenDay"
                            class="form-control"
                            placeholder="Invoice Issued Date"
                            maxlength="100"
                            required
                        />
                    </div>
                </div>
                <!--form-group-->

                <div class="form-group row">
                    <label
                        for="invoice_selling_date"
                        class="col-md-3 col-form-label"
                        >Invoice Selling Date*</label
                    >

                    <div class="col-md-8">
                        <input
                            type="date"
                            name="invoice_selling_date"
                            v-model="new_invoice.invoice_selling_date"
                            v-on:change="diffBetweenDay"
                            class="form-control"
                            placeholder="Invoice Selling Date"
                            maxlength="100"
                            required
                        />
                    </div>
                </div>
                <!--form-group-->

                <div class="form-group row">
                    <label for="remaining_day" class="col-md-3 col-form-label"
                        >Remaining Days *</label
                    >

                    <div class="col-md-8">
                        <input
                            type="number"
                            name="remaining_day"
                            v-model="new_invoice.remaining_day"
                            v-on:change="calculateDiscountRate"
                            class="form-control"
                            placeholder="Remaining Days"
                            maxlength="100"
                            readonly
                        />
                    </div>
                </div>
                <!--form-group-->

                <div class="form-group row">
                    <label for="day_delays" class="col-md-3 col-form-label"
                        >Day Delays *</label
                    >

                    <div class="col-md-8">
                        <input
                            type="number"
                            name="day_delays"
                            v-model="new_invoice.day_delays"
                            v-on:change="calculateDiscountRate"
                            class="form-control"
                            placeholder="Day Delays"
                            maxlength="100"
                            required
                        />
                    </div>
                </div>
                <!--form-group-->

                <div class="form-group row">
                    <label
                        for="daily_discount_rate"
                        class="col-md-3 col-form-label"
                        >Daily Discount Rate (%)*</label
                    >

                    <div class="col-md-8">
                        <input
                            type="number"
                            min="0"
                            max="100"
                            step="0.01"
                            name="daily_discount_rate"
                            v-on:change="calculateDiscountRate"
                            v-model="new_invoice.daily_discount_rate"
                            class="form-control"
                            placeholder="Daily Discount Rate"
                            maxlength="100"
                            required
                        />
                    </div>
                </div>
                <!--form-group-->

                <div class="form-group row">
                    <label
                        for="seller_discount_rate"
                        class="col-md-3 col-form-label"
                        >Discount Rate (%)*</label
                    >

                    <div class="col-md-8">
                        <input
                            type="number"
                            min="0"
                            max="100"
                            step="0.01"
                            name="seller_discount_rate"
                            v-model="new_invoice.seller_discount_rate"
                            v-on:change="calculateDiscountRate"
                            class="form-control"
                            placeholder="Discount Rate"
                            maxlength="100"
                            readonly
                        />
                    </div>
                </div>
                <!--form-group-->

                <div class="form-group row">
                    <label
                        for="discounted_amount"
                        class="col-md-3 col-form-label"
                        >Discounted Amount*</label
                    >

                    <div class="col-md-8">
                        <input
                            type="number"
                            name="discounted_amount"
                            v-model="new_invoice.discounted_amount"
                            class="form-control"
                            placeholder="Discounted Amount"
                            maxlength="100"
                            readonly
                        />
                    </div>
                </div>
                <!--form-group-->

                <div class="form-group row">
                    <label for="service_fees" class="col-md-3 col-form-label"
                        >Service Fees (%)*</label
                    >

                    <div class="col-md-8">
                        <input
                            type="number"
                            min="0"
                            max="100"
                            step="0.01"
                            name="service_fees"
                            v-model="new_invoice.service_fees"
                            v-on:change="calculateDiscountRate"
                            class="form-control"
                            placeholder="Service Fees"
                            maxlength="100"
                            required
                        />
                        <!-- <br />
                    You typed: <b>{{ this.service_fees }}</b> -->
                    </div>
                </div>
                <!--form-group-->

                <div class="form-group row">
                    <label for="service_fees" class="col-md-3 col-form-label"
                        >Service Fees Amount*</label
                    >

                    <div class="col-md-8">
                        <input
                            type="number"
                            name="service_fee_amount"
                            v-model="new_invoice.service_fee_amount"
                            class="form-control"
                            placeholder="Service Fee Amount"
                            maxlength="100"
                            readonly
                        />
                        <!-- <br />
                    You typed: <b>{{ this.service_fees }}</b> -->
                    </div>
                </div>
                <!--form-group-->

                <div class="form-group row">
                    <label
                        for="seller_receivable_amount"
                        class="col-md-3 col-form-label"
                        >Receivable Amount*</label
                    >

                    <div class="col-md-8">
                        <input
                            type="number"
                            name="seller_receivable_amount"
                            v-model="new_invoice.seller_receivable_amount"
                            class="form-control"
                            placeholder="Receivable Amount"
                            maxlength="100"
                            readonly
                        />
                    </div>
                </div>

                <!--form-group-->
            </div>

            <div class="card-footer text-center h2">
                <button type="submit" class="btn btn-primary float-right">
                    Approve Invoice
                </button>
            </div>
        </form>
    </div>
</template>

<script>
// import moment from 'moment'
var moment = require('moment');
export default {
    
    props: ["invoice"],
    data() {
        return {
            errors: [],
            total_deducted_amt: 0,
            issued_date: 0,
            selling_date: 0,
            new_invoice: {
                id: this.invoice.id,
                price: "",
                purchase_amount: "",
                receivable_amount: "",
                discount_rate: "",
                invoice_issued_date: "",
                invoice_selling_date: "",
                remaining_day: 0,
                day_delays: 0,
                daily_discount_rate: 0,
                seller_discount_rate: 0,
                discounted_amount: 0,
                service_fees: 2,
                service_fee_amount: 0,
                seller_receivable_amount: 0,
            },
        };
    },
    methods: {
        updateInvoice() {
            if (
                this.new_invoice.price &&
                this.new_invoice.purchase_amount &&
                this.new_invoice.receivable_amount &&
                this.new_invoice.discount_rate &&
                this.new_invoice.invoice_issued_date &&
                this.new_invoice.invoice_selling_date &&
                this.new_invoice.remaining_day &&
                this.new_invoice.day_delays &&
                this.new_invoice.daily_discount_rate &&
                this.new_invoice.seller_discount_rate &&
                this.new_invoice.discounted_amount &&
                this.new_invoice.service_fees &&
                this.new_invoice.service_fee_amount &&
                this.new_invoice.seller_receivable_amount
            ) {
                console.log(this.$refs.form);
                this.$refs.form
                    .submit()
                    .then((response) => {
                        console.log(response);
                        this.$router.push({ name: "admin.invoice.finished" });
                        // window.location = response.data.redirect;
                    })
                    // .then(location.reload())
                    .catch(function (error) {
                        console.log(error);
                    });
            }

            this.errors = [];

            if (!this.new_invoice.price) {
                this.errors.push("Original Invoice Amount required.");
            }
            if (!this.new_invoice.purchase_amount) {
                this.errors.push("Purchase Amount required.");
            }
            if (!this.new_invoice.receivable_amount) {
                this.errors.push("Receivable Amount required.");
            }
            if (!this.new_invoice.discount_rate) {
                this.errors.push("Discount Rate required.");
            }
            if (!this.new_invoice.invoice_issued_date) {
                this.errors.push("Invoice Issued Date required.");
            }
            if (!this.new_invoice.invoice_selling_date) {
                this.errors.push("Invoice Selling Date required.");
            }
            if (!this.new_invoice.remaining_day) {
                this.errors.push("Remaining Days required.");
            }
            if (!this.new_invoice.day_delays) {
                this.errors.push("Day Delays required.");
            }
            if (!this.new_invoice.daily_discount_rate) {
                this.errors.push("Daily Discount Rate required.");
            }
            if (!this.new_invoice.seller_discount_rate) {
                this.errors.push("Discount Rate required.");
            }
            if (!this.new_invoice.discounted_amount) {
                this.errors.push("Discounted Amount required.");
            }
            if (!this.new_invoice.service_fees) {
                this.errors.push("Service Fees required.");
            }
            if (!this.new_invoice.service_fee_amount) {
                this.errors.push("Service Fee Amount required.");
            }
            if (!this.new_invoice.seller_receivable_amount) {
                this.errors.push("Receivable Amount required.");
            }
            // e.preventDefault();
        },
        diffBetweenDay() {
            // console.log(moment())
            this.issued_date = moment(new Date(this.new_invoice.invoice_issued_date));
            this.selling_date = moment(new Date(this.new_invoice.invoice_selling_date));
            
            this.new_invoice.remaining_day = this.selling_date.diff(this.issued_date, 'days')
        },
        calculateDiscountRate() {
            this.new_invoice.seller_discount_rate =
                (Math.floor(this.new_invoice.remaining_day) + Math.floor(this.new_invoice.day_delays)) *
                this.new_invoice.daily_discount_rate;
            // console.log(this.new_invoice.seller_discount_rate);

            this.new_invoice.discounted_amount =
                (this.new_invoice.price *
                    this.new_invoice.seller_discount_rate) /
                100;
                // console.log( 'this is discounted amount ' + this.new_invoice.discounted_amount)

            this.total_deducted_amt =
                (this.new_invoice.price *
                (this.new_invoice.seller_discount_rate +
                    this.new_invoice.service_fees)) / 100;
            // console.log( 'this is deducted amt' + this.total_deducted_amt);

            this.new_invoice.service_fee_amount = this.new_invoice.price * (this.new_invoice.service_fees / 100)
            // console.log('service fee' + this.new_invoice.service_fee_amount)

            this.new_invoice.seller_receivable_amount =
                this.new_invoice.price - this.total_deducted_amt;
        },
    },
    mounted() {
        // console.log(this.invoice);
        // console.log(this.errors.length);
    },
};
</script>
