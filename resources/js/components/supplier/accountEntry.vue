<template>
    <div>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Expense</li>
        </ol>
        <!-- Icon Cards-->
        <div class="row container">
            <div class="card col-lg-12">
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Expense Insert
                    <router-link to="/expense" class="btn btn-sm btn-info" id="add_new"> All Accounts</router-link>
                </div>
                <form @submit.prevent="SupplierAccountInsert">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Supplier</label>
                                        <select class="form-control" id="exampleFormControlSelect1" v-model="form.sup_id">
                                            <option :value="supplier.id" v-for="supplier in suppliers">{{ supplier.name }}</option>
                                        </select>
                                        <small class="text-danger" v-if="errors.sup_id">{{ errors.sup_id[0] }}</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="firstName">Amount</label>
                                        <input type="text" v-model="form.amount" class="form-control"   required="">
                                        <small class="text-danger" v-if="errors.amount">{{ errors.amount[0] }}</small>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="firstName">Pay</label>
                                        <input type="text" v-model="form.pay" class="form-control"   required="">
                                        <small class="text-danger" v-if="errors.pay">{{ errors.pay[0] }}</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="firstName">Due</label>
                                        <input type="text" v-model="form.due" class="form-control"   required="">
                                        <small class="text-danger" v-if="errors.due">{{ errors.due[0] }}</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="nid">Date</label>
                                        <input type="date" v-model="form.entry_date" class="form-control"  required="">
                                        <small class="text-danger" v-if="errors.entry_date">{{ errors.entry_date[0] }}</small>
                                    </div><br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>
</template>

<script>

    export default {
        data(){
            return{
                form:{
                    due :'',
                    pay:'',
                    amount:'',
                    sup_id:'',
                    entry_date:''
                },
                suppliers:{},
                errors:{},
            }
        },


        methods:{
            SupplierAccountInsert(){
                axios.post('/api/supplier-account/',this.form)
                    .then(() => {
                        this.$router.push({ name: 'supplier' })
                        Notification.success()
                    })
                    .catch(error => this.errors = error.response.data.errors)
            },

        },
        created(){
            axios.get('/api/supplier')
                .then(({data}) => (this.suppliers = data))

        },


    }




</script>

<style>

    #add_new{
        float: right;
    }

</style>
