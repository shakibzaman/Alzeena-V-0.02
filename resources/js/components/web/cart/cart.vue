<template>
    <div>
        <!-- Breadcrumb Section Begin -->
        <div class="breadcrumb-section" :style="{'background-image':'url(http://localhost:8000/web/img/breadcrumb.jpg)'}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb__text">
                            <h2>Checkout</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Section End -->
        <div class="row ">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-center">
                        Check Your Shoping Cart
                    </li>
                </ol>
            <div class="card col-lg-12">
                <div class="card-body">
                    <table class="table table-sm table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Unit</th>
                            <th scope="col">Total</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="card in cards" :key="card.id">
                            <th>{{ card.pro_name }}</th>
                            <td><input type="text" readonly="" style="width: 20px;" :value="card.pro_quantity">

                                <button @click.prevent="increment(card.id)" class="btn btn-sm btn-success">+</button>

                                <button  @click.prevent="decrement(card.id)" class="btn btn-sm btn-danger" v-if="card.pro_quantity >= 2">-</button>
                                <button class="btn btn-sm btn-danger" v-else="" disabled="">-</button>

                            </td>
                            <td>{{ card.product_price }}</td>
                            <td>{{ card.sub_total }}</td>
                            <td><a @click="removeItem(card.id)" class="btn btn-sm btn-danger">x</a></td>
                        </tr>

                        </tbody>
                    </table>
                    <hr>
                </div>
                <div class="card-footer row">
                    <ul class="list-group col-md-6">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Total Quantity:
                            <strong>{{ qty }}</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Sub Total:
                            <strong>{{ subtotal }} Tk</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Delivery Location<div class="col-md-4 pos-number-field">
                            <select class="form-control" v-model.number="delevary_charge">
                                <option value="60">Inside Dhaka</option>
                                <option value="120">Outside Dhaka</option>
                            </select>
                        </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Total:
                            <strong> {{discountTotal}} Tk</strong>
                            Delivery Total:
                            <strong> {{deliveryTotal}} Tk</strong>
                        </li>
                    </ul>
                    <br>
                    <div class="col-md-6">
                    <form @submit.prevent="orderdone">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="form-label-group">
                                        <input type="text" v-model="form.name" class="form-control"   required="">
                                        <small class="text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
                                        <label for="firstName">Full Name</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="form-label-group">
                                        <input type="text" v-model="form.address" class="form-control"  required="">
                                        <small class="text-danger" v-if="errors.address">{{ errors.address[0] }}</small>
                                        <label for="firstName">Address</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="form-label-group">
                                        <input type="text" v-model="form.phone" class="form-control"  required="">
                                        <label for="lastName">Phone</label>
                                        <small class="text-danger" v-if="errors.phone">{{ errors.phone[0] }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="optradio"> Cash On Delivary
                                </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="optradio">Bkash
                                </label>
                                </div>
                                <p>&nbsp;</p>
                                <div class="form-label-group">
                                        <input type="text" v-model="form.bkash" class="form-control"  required="" placeholder="Bkash Number">
                                        
                                        <small class="text-danger" v-if="errors.bkash">{{ errors.bkash[0] }}</small>
                                </div>
                                <p>&nbsp;</p>
                                <div class="form-label-group">
                                        <input type="text" v-model="form.tid" class="form-control"  required="" placeholder="TRN No.">
                                    
                                        <small class="text-danger" v-if="errors.tid">{{ errors.tid[0] }}</small>
                                </div>
                                
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <!-- Icon Cards-->


    </div>
</template>

<script>
    export default {
        created() {
            this.allProduct();
            this.allCategory();
            this.allCustomer();
            this.cartProduct();


            Reload.$on('AfterAdd', () => {
                this.cartProduct();
            })
        },
        data(){
            return{
                form:{
                    details :'',
                    amount:'',
                    name :'',
                    address:'',
                    phone:'',
                    bkash:'',
                    tid:'',
                },
                customer_id:'',
                pay:'',
                order_note:'',
                discount:'',
                delevary_charge:'',
                delevary_company:'',
                payby:'',
                products:[],
                categories:'',
                getproducts:[],
                searchTerm:'',
                getsearchTerm:'',
                customers:'',
                errors:'',
                cards:[],
                // user_id:'',
                // users:[],
                statuss:'',
                order_status:'',
                companies:'',
            }
        },
        computed:{
            filtersearch(){
                return this.products.filter(product => {
                    return product.product_name.match(this.searchTerm)
                })
            },
            getfiltersearch(){
                return this.getproducts.filter(getproduct => {
                    return getproduct.product_name.match(this.getsearchTerm)
                })
            },
            discountTotal(){
                let result=0;
                result=((this.subtotal)-(this.discount));

                return result;
            },

            deliveryTotal(){
                let result=0;
                result=((this.subtotal)-(this.discount))+this.delevary_charge;
                console.log(typeof(this.delevary_charge))

                return result;
            },
            Finaldue(){
                let result=0;
                let total =this.subtotal-this.discount;
                result=((total)-(this.pay));

                return result;
            },
            qty(){
                let sum=0;
                for(let i =0; i < this.cards.length; i++ ){
                    sum += (parseFloat(this.cards[i].pro_quantity));
                }
                return sum;
            },

            subtotal(){
                let sum=0;
                for(let i =0; i < this.cards.length; i++){
                    sum += (parseFloat(this.cards[i].pro_quantity) * parseFloat(this.cards[i].product_price));
                }
                return sum;
            },
        },
        methods:{
            //cart methods here
            AddToCart(id){
                axios.get('/apipublic/addTocart/'+id)
                    .then(() => {
                        Reload.$emit('AfterAdd');
                        Notification.cart_success()
                    })
            },
            cartProduct(){
                axios.get('/apipublic/cart/product')
                    .then(({data}) => (this.cards = data))
                    .catch()
            },
            removeItem(id){
                axios.get('/apipublic/remove/cart/'+id)
                    .then(() => {
                        Reload.$emit('AfterAdd');
                        Notification.success()
                    })
            },
            increment(id){
                axios.get('/apipublic/increment/'+id)
                    .then(() => {
                        Reload.$emit('AfterAdd');
                        Notification.success()
                    })
            },
            decrement(id){
                axios.get('/apipublic/decrement/'+id)
                    .then(() => {
                        Reload.$emit('AfterAdd');
                        Notification.success()
                    })
            },
            orderdone(){
                axios.post('/apipublic/customer/',this.form)
                let total =this.subtotal-this.discount;

                var data = {bkash:this.form.bkash,tid:this.form.tid,order_note:this.order_note,delevary_charge:this.delevary_charge,discount:this.discount,qty:this.qty, subtotal:this.subtotal, phone:this.form.phone, payby:this.payby, pay:this.pay,total:total,order_status:this.order_status}

                axios.post('/apipublic/orderdone/',data)
                    .then(() => {
                        Notification.success()
                        this.$router.push({ name: 'homepage' })
                    })
            },
            // end cart methods
            allProduct(){
                axios.get('/apipublic/online-product')
                    .then(({data}) => (this.products = data))
                    .catch()
            },
            allCategory(){
                axios.get('/apipublic/online-category/')
                    .then(({data}) => (this.categories = data))
                    .catch()
            },
            allCustomer(){
                axios.get('/apipublic/customer/')
                    .then(({data}) => (this.customers = data))
                    .catch(error => this.errors = error.response.data.errors)
            },
            subproduct(id)
            {
                axios.get('/apipublic/getting/product/'+id)
                    .then(({data}) => (this.getproducts = data))
                    .catch(error => this.errors = error.response.data.errors)
            },
            //image validationmethod
            onFileselected(event){
                let file=event.target.files[0];
                if (file.size > 1048770) {
                    Notification.image_validation()
                }else{
                    let reader = new FileReader();
                    reader.onload = event => {
                        this.form.photo = event.target.result

                        console.log(event.target.result);
                    };
                    reader.readAsDataURL(file);

                }
            },

            customerInsert(){

            }

        }


    }

</script>

<style>

    #add_new{
        float: right;
    }
    #em_photo{
        height: 100px;
        width: 90px;
    }

</style>
