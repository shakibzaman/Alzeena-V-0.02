<template>

    <div>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-primary o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-comments"></i>
                        </div>
                        <div class="mr-5">{{products}} Godwan Products!</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-primary o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-comments"></i>
                        </div>
                        <div class="mr-5">{{storesProducts}} Stores Products!</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-primary o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-comments"></i>
                        </div>
                        <div class="mr-5">{{onlineProducts}} Online Products!</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-warning o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-list"></i>
                        </div>
                        <div class="mr-5">{{category}} Products Category!</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-success o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-shopping-cart"></i>
                        </div>
                        <div class="mr-5">{{todayOrder}} Today's Order!</div>
                        <div class="mr-5" v-for="order in todayOrderAmount" :key="order.id">
                            {{order.amount}} Taka!
                        </div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-danger o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-life-ring"></i>
                        </div>
                        <div class="mr-5">{{MonthOrder}} This Month's Order!</div>
                        <div class="mr-5" v-for="order in MonthOrderAmount" :key="order.id">
                            {{order.amount}} Taka!
                        </div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-danger o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-life-ring"></i>
                        </div>
                        <div class="mr-5">{{MonthPendingOrder}} Pending Order!</div>
                        <div class="mr-5" v-for="order in PendingOrderAmount" :key="order.id">
                            {{order.amount}} Taka!
                        </div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-danger o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-life-ring"></i>
                        </div>
                        <div class="mr-5">{{MonthDeliveredOrder}} Delivered Order!</div>
                        <div class="mr-5" v-for="order in DeliveredOrderAmount" :key="order.id">
                            {{order.amount}} Taka!
                        </div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-danger o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-life-ring"></i>
                        </div>
                        <div class="mr-5" v-for="order in TodaysExpense" :key="order.id">
                            {{order.amount}} Today's Expense!
                        </div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-danger o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-life-ring"></i>
                        </div>
                        <div class="mr-5" v-for="order in MonthExpense" :key="order.id">
                            {{order.amount}} Monthly Expense!
                        </div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Area Chart Example-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-chart-area"></i>
                Area Chart Example</div>
            <div class="card-body">
                <canvas id="myAreaChart" width="100%" height="30"></canvas>
                <h2>{{name}}</h2>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>

</template>

<script type="text/javascript">
    export default {
        created(){
            if (!User.loggedIn()) {
                this.$router.push({name : '/'})
            }
            this.name=User.id();
            axios.get('/api/product-count')
                .then(({data}) => (this.products = data))
            axios.get('/api/stores-product-count')
                .then(({data}) => (this.storesProducts = data))
            axios.get('/api/online-product-count')
                .then(({data}) => (this.onlineProducts = data))
            axios.get('/api/product-count')
                .then(({data}) => (this.category = data))
            // order Section
            axios.get('/api/today-order-count')
                .then(({data}) => (this.todayOrder = data))
            axios.get('/api/today-order-amount')
                .then(({data}) => (this.todayOrderAmount = data))
            axios.get('/api/this-month-order-count')
                .then(({data}) => (this.MonthOrder = data))
            axios.get('/api/month-order-amount')
                .then(({data}) => (this.MonthOrderAmount = data))
            axios.get('/api/this-month-pending-order-count')
                .then(({data}) => (this.MonthPendingOrder = data))
            axios.get('/api/this-month-pending-order-amount')
                .then(({data}) => (this.PendingOrderAmount = data))
            axios.get('/api/this-month-delivered-order-count')
                .then(({data}) => (this.MonthDeliveredOrder = data))
            axios.get('/api/this-month-delivered-order-amount')
                .then(({data}) => (this.DeliveredOrderAmount = data))
            // expense
            axios.get('/api/today-expense-amount')
                .then(({data}) => (this.TodaysExpense = data))
            axios.get('/api/month-expense-amount')
                .then(({data}) => (this.MonthExpense = data))

        },
        data()
        {
            return{
                name: '',
                products:'',
                storesProducts:'',
                onlineProducts:'',
                category:'',
                todayOrder:'',
                todayOrderAmount:'',
                MonthOrder:'',
                MonthOrderAmount:'',
                MonthPendingOrder:'',
                PendingOrderAmount:'',
                MonthDeliveredOrder:'',
                DeliveredOrderAmount:'',
                TodaysExpense:'',
                MonthExpense:''
            }

        }
        ,
    }
</script>

<style type="text/css">

</style>
