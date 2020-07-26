<template>
    <div>
        <form @submit.prevent="supOrderInsert">


        <div class="card">
            <div class="card-header">
                Products
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Supplier</label>
                    <select class="form-control" id="exampleFormControlSelect1" v-model="form.supplier_id">
                        <option :value="supplier.id" v-for="supplier in suppliers">{{ supplier.name }}</option>
                    </select>
                    <small class="text-danger" v-if="errors.supplier_id">{{ errors.supplier_id[0] }}</small>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-label-group">
                    <input type="date" v-model="form.buying_date" class="form-control"  required="">
                    <label for="buydate">Buying Date</label>
                    <small class="text-danger" v-if="errors.buying_date">{{ errors.buying_date[0] }}</small>
                </div>
            </div>
            <div class="card-body">
                <table class="table" id="products_table">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr id="product0">
                        <td>
                            <select class="form-control" id="exampleFormControlSelect1" v-model="form.prod">
                                <option :value="product.id" v-for="product in products">{{ product.product_name }}</option>
                            </select>
                        </td>
                        <td>
                            <input type="number" v-model="form.quantities" class="form-control" />
                        </td>
                    </tr>
                    <tr id="product1"></tr>
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-md-12">
                        <button id="add_row" class="btn btn-default pull-left">+ Add Row</button>
                        <button id='delete_row' class="pull-right btn btn-danger">- Delete Row</button>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
        </form>
    </div>
</template>

<script>

    export default {
        data(){
            return{
                form:{
                    supplier_id :'',
                    buying_date:'',
                    prod:[],
                    quantities:[],
                    buying_date:'',

                },
                suppliers:{},
                products:{},
                errors:{},
            }
        },


        methods:{
            supOrderInsert(){
                axios.post('/api/supplierOrder/',this.form)
                    // .then(() => {
                    //     this.$router.push({ name: 'expense' })
                    //     Notification.success()
                    // })
                    // .catch(error => this.errors = error.response.data.errors)
            },

        },
        created(){
            axios.get('/api/product')
                .then(({data}) => (this.products = data))
            axios.get('/api/supplier/')
                .then(({data}) => (this.suppliers = data))
        },


    }


    $(document).ready(function(){
        let row_number = 1;
        $("#add_row").click(function(e){
            e.preventDefault();
            let new_row_number = row_number - 1;
            $('#product' + row_number).html($('#product' + new_row_number).html()).find('td:first-child');
            $('#products_table').append('<tr id="product' + (row_number + 1) + '"></tr>');
            row_number++;
        });

        $("#delete_row").click(function(e){
            e.preventDefault();
            if(row_number > 1){
                $("#product" + (row_number - 1)).html('');
                row_number--;
            }
        });
    });

</script>

<style scoped>

</style>
