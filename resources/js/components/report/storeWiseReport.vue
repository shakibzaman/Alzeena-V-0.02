<template>
    <div>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Search Order</li>
        </ol>
        <!-- Icon Cards-->
        <div class="row container">
            <div class="card col-lg-12">
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Search Orders
                    <router-link to="/order" class="btn btn-sm btn-info" id="add_new"> Today Order</router-link>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-header">
                            <i class="fas fa-chart-area"></i>
                            Search By Date
                        </div>
                        <form @submit.prevent="searchDate">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect2">Search By Date</label>
                                                <input type="date" required="" class="form-control" v-model="form.date">
                                            </div>
                                        </div><br>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Shop</label>
                                                <select class="form-control" id="exampleFormControlSelect1" v-model="form.st_id">
                                                    <option :value="store.id" v-for="store in stores">{{ store.shop_name }}</option>
                                                </select>
                                                <small class="text-danger" v-if="errors.shop">{{ errors.shop[0] }}</small>
                                            </div>
                                        </div><br>
                                        <button type="submit" class="btn btn-success">Search</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="col-lg-12">
                        <div class="card-header">
                            <i class="fas fa-chart-area"></i>
                            Search By Month
                        </div>
                        <form @submit.prevent="searchMonth">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect2">Search By Month</label>
                                                <select  class="form-control" id="exampleFormControlSelect2" v-model="form.month">
                                                    <option value="January">January</option>
                                                    <option value="February">February</option>
                                                    <option value="March">March</option>
                                                    <option value="April">April</option>
                                                    <option value="May">May</option>
                                                    <option value="june">june</option>
                                                    <option value="July">July</option>
                                                    <option value="August">August</option>
                                                    <option value="September">September</option>
                                                    <option value="October">October</option>
                                                    <option value="November">November</option>
                                                    <option value="December">December</option>
                                                </select>
                                            </div>
                                        </div><br>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Shop</label>
                                                <select class="form-control" id="exampleFormControlSelect1" v-model="form.st_idM">
                                                    <option :value="store.id" v-for="store in stores">{{ store.shop_name }}</option>
                                                </select>
                                                <small class="text-danger" v-if="errors.shop">{{ errors.shop[0] }}</small>
                                            </div>
                                        </div><br>
                                        <button type="submit" class="btn btn-success">Search</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>

                    <div class="col-lg-12">
                        <div class="card-header">
                            <i class="fas fa-chart-area"></i>
                            Search By Date to Date
                        </div>
                        <form @submit.prevent="searchBtwDate">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect2">Start Date</label>
                                                <input type="date" required="" class="form-control" v-model="form.date1">
                                            </div>
                                        </div><br>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect2">End Date</label>
                                                <input type="date" required="" class="form-control" v-model="form.date2">
                                            </div>
                                        </div><br>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Shop</label>
                                                <select class="form-control" id="exampleFormControlSelect1" v-model="form.st_idD">
                                                    <option :value="store.id" v-for="store in stores">{{ store.shop_name }}</option>
                                                </select>
                                                <small class="text-danger" v-if="errors.shop">{{ errors.shop[0] }}</small>
                                            </div>
                                        </div><br>
                                        <button type="submit" class="btn btn-success">Search</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>

                    <div class="card-body">
                        <div class="card-body">
                            <div class="table-responsive">
                                <label>Search</label>
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">

                                    <thead>

                                    <tr>
                                        <th>ID</th>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Buy Price</th>
                                        <th>Sell Price</th>
                                        <th>Discount</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>

                                    </thead>

                                    <tbody>

                                    <tr v-for="order in orders" :key="order.id">
                                        <td>{{ order.id }}</td>
                                        <td>{{ order.order_date }}</td>
                                        <td>{{ order.product_name }}</td>
                                        <td>{{ order.buying_price }}</td>
                                        <td>{{ order.selling_price }}</td>
                                        <td>{{ order.discount }}</td>
                                        <td>{{ order.qty }}</td>
                                        <td>{{ order.total }}</td>
                                    </tr>
                                    <tr v-for="order in ordersTotal" :key="order.id">
                                        <td></td>
                                        <td></td>
                                        <td><b>Total:</b>{{ order.buy }}</td>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>Total:</b>{{ order.qty }}</td>
                                        <td><b>Total:</b>{{ order.total }}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</template>

<script>

    export default {
        created(){
            axios.get('/api/store')
                .then(({data}) => (this.stores = data))
        },
        data(){
            return{
                form:{
                    date :'',
                    date1 :'',
                    date2 :'',
                    month:'',
                    st_id:'',
                    st_idM:'',
                    st_idD:'',
                },
                errors:{},
                orders:[],
                ordersTotal:[],
                stores:[],
            }
        },


        methods:{
            searchDate(){
                axios.post('/api/report/order/shop',this.form)
                    .then(({data}) => (this.orders = data))
                    // // Notification.success()
                    .catch(error => this.errors = error.response.data.errors)

                axios.post('/api/report/order/shop/total',this.form)
                .then(({data}) => (this.ordersTotal = data))
                // // Notification.success()
                .catch(error => this.errors = error.response.data.errors)
            },
            searchBtwDate(){
                axios.post('/api/report/date/shop',this.form)
                    .then(({data}) => (this.orders = data))
                    // Notification.success()
                    .catch(error => this.errors = error.response.data.errors)
                axios.post('/api/report/date/shop/total',this.form)
                    .then(({data}) => (this.ordersTotal = data))
                    // Notification.success()
                    .catch(error => this.errors = error.response.data.errors)
            },
            searchMonth(){
                axios.post('/api/report/month/shop',this.form)
                    .then(({data}) => (this.orders = data))
                    //  // Notification.success()
                    .catch(error => this.errors = error.response.data.errors)
                axios.post('api/report/month/shop/total',this.form)
                    .then(({data}) => (this.ordersTotal = data))
                    //  // Notification.success()
                    .catch(error => this.errors = error.response.data.errors)
            }


        }


    }



</script>

<style>

    #add_new{
        float: right;
    }

</style>
