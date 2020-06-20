<template>
    <div>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">All Suppliers</li>
        </ol>
        <!-- Icon Cards-->
        <div class="row card container">
            <div class="card-header">
                <i class="fas fa-chart-area"></i>
                Supplier Insert
                <router-link to="/store-supplier" class="btn btn-sm btn-info" id="add_new"> Add New</router-link>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <div class="table-responsive">
                        <label>Search</label>
                        <input type="text" v-model="searchTerm" class="form-control" style="width:200px; "><br>
                        <table class="table table-bordered" id="" width="100%" cellspacing="0">

                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Total Amount</th>
                                <th>Pay</th>
                                <th>Due</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>

                            <tr v-for="supplier in suppliers" :key="supplier.id">
                                <td>{{ supplier.name }}</td>
                                <td>{{ supplier.entry_date }}</td>
                                <td>{{ supplier.amount }}</td>
                                <td>{{ supplier.pay }}</td>
                                <td>{{ supplier.due }}</td>
                                <td>
                                    <router-link :to="{name: 'editSupplierAccount', params:{id: supplier.id} }" class="btn btn-sm btn-info">Pay</router-link>
                                    <a @click="deleteSupplier(supplier.id)" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                            <tr v-for="supplier in suppliersAmount" :key="supplier.id">
                                <td></td>
                                <td><b>Total: </b></td>
                                <td><b>{{supplier.amount}}</b></td>
                                <td><b>{{supplier.pay}}</b></td>
                                <td><b>{{supplier.due}}</b></td>
                                <td></td>


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
        mounted(){
            if (!User.loggedIn()) {
                this.$router.push({ name:'/' })
            }
        },

        created(){

            let id = this.$route.params.id
            axios.get('/api/supplier/'+id)
                .then(({data}) => (this.suppliers = data))
                .catch()
            //axios.get('/api/supplier-total-amount/')
                // .then(({data}) => (this.suppliersAmount = data))
                // .catch()
            axios.get('/api/supplier-total-amount/'+id)
                // .then(({data}) => (this.suppliersAmount = data))
                // .catch()
        },

        data(){
            return{
                suppliersDetails:[],
                searchTerm:'',
                suppliers:'',
                suppliersAmount:'',
                suppl_id:''
            }
        },
        computed:{
            filtersearch(){
                return this.suppliers.filter(supplier => {
                    return supplier.phone.match(this.searchTerm)
                })
            }
        },
        methods:{
            deleteSupplier(id){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        axios.delete('/api/supplier/'+id)
                            .then(()=>{
                                this.suppliers = this.suppliers.filter(supplier =>{
                                    return supplier.id !=id
                                })
                            })
                            .catch(()=>{
                                this.$router.push({name: 'supplier'})
                            })
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            }
        },

    }



</script>

<style>

    #add_new{
        float: right;
    }
    #em_photo{
        height: 40px;
        width: 40px;
    }

</style>
