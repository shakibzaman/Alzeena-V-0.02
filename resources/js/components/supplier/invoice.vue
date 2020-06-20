<template>
    <div>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Suppliers Invoice</li>
        </ol>
        <!-- Icon Cards-->
        <div class="row container">
            <div class="card col-lg-12">
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Supplier Invoice
                    <router-link to="/supplier" class="btn btn-sm btn-info" id="add_new"> All Invoice</router-link>
                </div>
                <form @submit.prevent="supplierInsert" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Supplier</label>
                                        <select class="form-control" id="exampleFormControlSelect1" v-model="this.invoice_products.supplier_id">
                                            <option :value="supplier.id" v-for="supplier in suppliers">{{ supplier.name }}</option>
                                        </select>
                                        <small class="text-danger" v-if="errors.supplier_id">{{ errors.supplier_id[0] }}</small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-label-group">
                                        <input type="date" v-model="this.invoice_products.buying_date" class="form-control"  required="">
                                        <label for="buydate">Buying Date</label>
                                        <small class="text-danger" v-if="errors.buying_date">{{ errors.buying_date[0] }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Products</label>
                                    <select class="form-control" id="exampleFormControlSelect1" v-model="this.invoice_products.product_id">
                                        <option :value="product.id" v-for="product in products">{{ product.product_name }}</option>
                                    </select>
                                    <small class="text-danger" v-if="errors.product_id">{{ errors.product_id[0] }}</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-label-group">
                                    <input type="text" v-model="this.invoice_products.pro_code" class="form-control"  required="">
                                    <label for="code">Product Code</label>
                                    <small class="text-danger" v-if="errors.pro_code">{{ errors.pro_code[0] }}</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-label-group">
                                    <input type="text" v-model="this.invoice_products.buy_price" class="form-control"  required="">
                                    <label for="buyprice">Buying Price</label>
                                    <small class="text-danger" v-if="errors.buy_price">{{ errors.buy_price[0] }}</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-label-group">
                                    <input type="text" v-model="this.invoice_products.pro_qty" class="form-control"  required="">
                                    <label for="qty">Quantity</label>
                                    <small class="text-danger" v-if="errors.pro_qty">{{ errors.pro_qty[0] }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type='button' class="btn btn-info" @click="addNewRow">
                        <i class="fas fa-plus-circle"></i>
                        Add
                    </button>
                    <br>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted(){
            if (!User.loggedIn()) {
                this.$router.push({ name:'/' })
            }
        },
        data(){
            return{
                invoice_products: [{
                    buying_date: '',
                    product_id: '',
                    supplier_id: '',
                    buy_price: '',
                    pro_code:'',
                    pro_qty: '',
                }],
                suppliers:{},
                errors:{},
                products:{},
            }
        },


        methods:{
            supplierInsert(){
                axios.post('/api/supplier/',this.form)
                    .then(() => {
                        this.$router.push({ name: 'supplier' })
                        Notification.success()
                    })
                    .catch(error => this.errors = error.response.data.errors)
            },
            addNewRow() {
                this.invoice_products.push({
                    invoice_products: [{
                        buying_date: '',
                        product_id: '',
                        supplier_id: '',
                        buy_price: '',
                        pro_code:'',
                        pro_qty: '',
                    }]
                });
            }

        },
        created(){
            axios.get('/api/product')
                .then(({data}) => (this.products = data))

            axios.get('/api/supplier/')
                .then(({data}) => (this.suppliers = data))

            axios.get('/api/size/')
                .then(({data}) => (this.sizes = data))
        },


    }
</script>

<style scoped>

</style>
