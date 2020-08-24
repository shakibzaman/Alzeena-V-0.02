<template>
    <div>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Pending Order</li>
        </ol>
        <!-- Icon Cards-->
        <div class="row card container">
            <div class="card-header">
                <i class="fas fa-chart-area"></i>
                Orders Table
            </div>
            <div class="card-body">
                <div class="card-body">
                    <form @submit.prevent="orderCheck" >
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Order</label>
                            <select class="form-control" id="exampleFormControlSelect1" v-model="form.order_status">
                                <option :value="status.id" v-for="status in statuss">{{ status.status_name }}</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Show Orders</button>
                    </form><br>
                    <div class="table-responsive">
                        <label>Search</label>
                        <input type="text" v-model="searchTerm" class="form-control" style="width:200px; "><br>
                        <table class="table table-bordered" id="" width="100%" cellspacing="0">

                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Total Amount</th>
                                <th>Pay</th>
                                <th>Due</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>

                            <tr v-for="order in filtersearch" :key="order.id">
                                <td>{{ order.id }}</td>
                                <td>{{ order.name }}</td>
                                <td>{{ order.total }}</td>
                                <td>{{ order.pay }}</td>
                                <td>{{ order.due }}</td>
                                <td>{{ order.status_name }}</td>
                                <td>
                                    <router-link :to="{name: 'view-order', params:{id: order.id} }" class="btn btn-sm btn-info">view</router-link>
                                    <router-link :to="{name: 'orderStatusChange', params:{id: order.id} }" class="btn btn-sm btn-info">Status</router-link>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        created(){
            axios.get('/api/status/')
                .then(({data}) => (this.statuss = data))
        },

        data(){
            return{
                form:{
                    order_status :'',
                },
                orders:[],
                searchTerm:'',
                statuss:''
            }
        },
        computed:{
            filtersearch(){
                return this.orders.filter(order => {
                    return order.name.match(this.searchTerm)
                })
            }
        },
        methods:{
            orderCheck(){
                axios.post('/api/status-orders',this.form)
                    .then(({data}) => (this.orders = data))
                    // // Notification.success()
                    .catch(error => this.errors = error.response.data.errors)
            },


        },

    }



</script>

<style>



</style>
