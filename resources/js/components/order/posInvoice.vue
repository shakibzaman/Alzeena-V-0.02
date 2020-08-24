<template>
    <div>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    Invoice
                    <strong>{{ orders.order_date }}</strong>
                    <span class="float-right"> <strong>Status:</strong> Pending</span>

                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <h6 class="mb-3">Customer Details</h6>
                            <div>
                                <strong>{{ orders.name }}</strong>
                            </div>
                            <div>{{ orders.address }}</div>
                            <div>{{ orders.phone }}</div>
                            <div>{{ orders.email }}</div>
                        </div>

                        <div class="col-sm-6">
                            <h6 class="mb-3">Shop Address</h6>
                            <div>
                                <strong>Alzeena Fashion</strong>
                            </div>
                            <div>Attn: Daniel Marek</div>
                            <div>43-190 Mikolow, Poland</div>
                            <div>Email: marek@daniel.com</div>
                            <div>Phone: +48 123 456 789</div>
                        </div>



                    </div>

                    <div class="table-responsive-sm">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Item</th>
                                <th>Unit Cost</th>
                                <th>Qty</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr  v-for="detail in details">
                                <td>*</td>
                                <td>{{ detail.product_name }}</td>
                                <td>{{ detail.product_price }}</td>
                                <td>{{ detail.pro_quantity }}</td>
                                <td>{{ detail.sub_total }}</td>
                            </tr>


                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-5">

                        </div>

                        <div class="col-lg-4 col-sm-5 ml-auto">
                            <table class="table table-clear">
                                <tbody>
                                <tr>
                                    <td class="left">
                                        <strong>Subtotal</strong>
                                    </td>
                                    <td class="right">{{ orders.sub_total }}</td>
                                </tr>
                                <tr>
                                    <td class="left">
                                        <strong>Discount %</strong>
                                    </td>
                                    <td class="right">{{ orders.vat }}</td>
                                </tr>

                                <tr>
                                    <td class="left">
                                        <strong>Total</strong>
                                    </td>
                                    <td class="right">
                                        <strong>{{ orders.total }}</strong>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        </div>

                    </div>

                </div>
                <div class="card-footer text-muted">
                    <div class="row">
                        <div class="col-md-6">
                            <p><b>Condition</b></p>
                            <li> Condition 1</li>
                            <li> Condition 1</li>
                            <li> Condition 1</li>
                        </div>
                        <div class="col-md-6"><p>Thanks for Comming</p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "posInvoice",
        data(){
            return{
                errors:{},
                orders:{},
                details:{},
            }
        },
        created(){

            let id = this.$route.params.id
            axios.get('/api/order/details/'+id)
                .then(({data}) => (this.orders = data))
                .catch()

            axios.get('/api/order/orderdetails/'+id)
                .then(({data}) => (this.details = data))
                .catch()

        },
    }
</script>

<style scoped>

</style>
