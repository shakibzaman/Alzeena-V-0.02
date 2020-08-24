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
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect2">Search By Date</label>
                                                <input type="date" required="" class="form-control" v-model="form.date">
                                            </div>
                                        </div><br>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Courier</label>
                                                <select class="form-control" id="exampleFormControlSelect1" v-model="form.cat_id">
                                                    <option :value="company.id" v-for="company in companies">{{ company.company_name }}</option>
                                                </select>
                                                <small class="text-danger" v-if="errors.cat_id">{{ errors.cat_id[0] }}</small>
                                            </div>
                                        </div><br>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Status</label>
                                                <select class="form-control" id="exampleFormControlSelect1" v-model="form.sta_id">
                                                    <option :value="status.id" v-for="status in statuss">{{ status.status_name }}</option>
                                                </select>
                                                <small class="text-danger" v-if="errors.sta_id">{{ errors.sta_id[0] }}</small>
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
                                        <div class="col-md-4">
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
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Courier</label>
                                                <select class="form-control" id="exampleFormControlSelect1" v-model="form.cat_idM">
                                                    <option :value="company.id" v-for="company in companies">{{ company.company_name }}</option>
                                                </select>
                                                <small class="text-danger" v-if="errors.cat_idM">{{ errors.cat_idM[0] }}</small>
                                            </div>
                                        </div><br>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Status</label>
                                                <select class="form-control" id="exampleFormControlSelect1" v-model="form.staM_id">
                                                    <option :value="status.id" v-for="status in statuss">{{ status.status_name }}</option>
                                                </select>
                                                <small class="text-danger" v-if="errors.staM_id">{{ errors.staM_id[0] }}</small>
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
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect2">Start Date</label>
                                                <input type="date" required="" class="form-control" v-model="form.date1">
                                            </div>
                                        </div><br>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect2">End Date</label>
                                                <input type="date" required="" class="form-control" v-model="form.date2">
                                            </div>
                                        </div><br>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Courier</label>
                                                <select class="form-control" id="exampleFormControlSelect1" v-model="form.cat_idD">
                                                    <option :value="company.id" v-for="company in companies">{{ company.company_name }}</option>
                                                </select>
                                                <small class="text-danger" v-if="errors.cat_idD">{{ errors.cat_idD[0] }}</small>
                                            </div>
                                        </div><br>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Status</label>
                                                <select class="form-control" id="exampleFormControlSelect1" v-model="form.staD_id">
                                                    <option :value="status.id" v-for="status in statuss">{{ status.status_name }}</option>
                                                </select>
                                                <small class="text-danger" v-if="errors.staD_id">{{ errors.staD_id[0] }}</small>
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
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Total</th>
                                        <th>due</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    <tr v-for="order in orders" :key="order.id">
                                        <td>{{ order.id }}</td>
                                        <td>{{ order.order_date }}</td>
                                        <td>{{ order.name }}</td>
                                        <td>{{ order.address }}</td>
                                        <td>{{ order.phone }}</td>
                                        <td>{{ order.total }}</td>
                                        <td>{{ order.due }}</td>

                                    </tr>
                                    <tr v-for="order in ordersTotal" :key="order.id">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>{{ order.total }}</td>
                                        <td>{{ order.due }}</td>

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
            axios.get('/api/deli-company')
                .then(({data}) => (this.companies = data))
            axios.get('/api/status')
                .then(({data}) => (this.statuss = data))
        },
        data(){
            return{
                form:{
                    date :'',
                    date1 :'',
                    date2 :'',
                    month:'',
                    cat_id:'',
                    cat_idM:'',
                    cat_idD:'',
                    sta_id:'',
                    staM_id:'',
                    staD_id:'',
                },
                errors:{},
                orders:[],
                ordersTotal:[],
                companies:[],
                statuss:[],
            }
        },


        methods:{
            searchDate(){
                axios.post('/api/report/order/company',this.form)
                    .then(({data}) => (this.orders = data))
                    // // Notification.success()
                    .catch(error => this.errors = error.response.data.errors)

                axios.post('/api/report/order/company/total',this.form)
                .then(({data}) => (this.ordersTotal = data))
                // // Notification.success()
                .catch(error => this.errors = error.response.data.errors)
            },
            searchBtwDate(){
                axios.post('/api/report/date/company',this.form)
                    .then(({data}) => (this.orders = data))
                    // Notification.success()
                    .catch(error => this.errors = error.response.data.errors)
                axios.post('/api/report/date/company/total',this.form)
                    .then(({data}) => (this.ordersTotal = data))
                    // Notification.success()
                    .catch(error => this.errors = error.response.data.errors)
            },
            searchMonth(){
                axios.post('/api/report/month/company',this.form)
                    .then(({data}) => (this.orders = data))
                    //  // Notification.success()
                    .catch(error => this.errors = error.response.data.errors)
                axios.post('api/report/month/company/total',this.form)
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
