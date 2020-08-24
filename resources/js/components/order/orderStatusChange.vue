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
                    Order Status Update
                </div>
                <form @submit.prevent="statusUpdate" >
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Status</label>
                            <select class="form-control" id="exampleFormControlSelect1" v-model="form.order_status">
                                <option :value="status.id" v-for="status in statuss">{{ status.status_name }}</option>
                            </select>
                            <small class="text-danger" v-if="errors.order_status">{{ errors.order_status[0] }}</small>
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
                    order_status:''
                },
                errors:{},
                statuss:{}

            }
        },
        created(){
            let id = this.$route.params.id
            axios.get('/api/order/details/'+id)
                .then(({data}) => (this.form = data))
                .catch()
            axios.get('/api/status')
                .then(({data}) => (this.statuss = data))
        },
        methods:{

            statusUpdate(){
                let id = this.$route.params.id
                axios.post('/api/orders/'+id,this.form)
                    .then(() => {
                        this.$router.push({ name: 'allorder' })
                        Notification.success()
                    })
                    .catch(error => this.errors = error.response.data.errors)

            },

        }


    }




</script>

<style>


</style>
