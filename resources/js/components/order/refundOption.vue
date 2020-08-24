<template>
    <div>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Product</li>
        </ol>
        <!-- Icon Cards-->
        <div class="row container">
            <div class="card col-lg-12">
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Product Stock Transfer
                </div>
                <form @submit.prevent="orderRefund" >
                    <div class="card-body">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <input type="text" v-model="form.pro_quantity" class="form-control" >
                                    <label for="phone">Quantity  </label>
                                    <!--                                    <small class="text-danger" v-if="errors.pro_quantity">{{ errors.pro_quantity[0] }}</small>-->
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <button type="submit" class="btn btn-success">Stock Update</button>
                </form><br>
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
                    pro_quantity:'',
                },
                errors:{},
                stores:{},
                refundsDetails:{}

            }
        },
        created(){
            let id = this.$route.params.id
            axios.get('/api/order-product-details/'+id)
                .then(({data}) => (this.form = data))
                .catch()

            // axios.get('/api/order-product-details/'+id)
            //     .then(({data}) => (this.refundsDetails = data))
            //     .catch()
        },
        methods:{

            orderRefund(){
                let id = this.$route.params.id
                 //var data = {old_pro_quantity:this.pro_quantity,pro_quantity:this.form.pro_quantity,order_status:this.order_status}
                axios.put('/api/order-product-details/'+id,this.form)
                    .then(() => {
                        // this.$router.push({ name: 'order' })
                        // Notification.success()
                    })
                    .catch(error => this.errors = error.response.data.errors)

            },

        }


    }




</script>

<style>


</style>
