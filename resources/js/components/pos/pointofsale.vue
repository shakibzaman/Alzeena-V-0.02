 <template>
    <div>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Point Of sale</li>
           </ol>
               <div class="row ">
                 <div class="card col-lg-5">
                  <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Expense Insert
                    <a class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal" id="add_new"> Add Customer</a>
                  </div>

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
                    <div class="card-footer">
                      <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                         Total Quantity:
                          <strong>{{ qty }}</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                         Sub Total:
                          <strong>{{ subtotal }} Tk</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            discount <div class="col-md-4 pos-number-field"><input type="number" v-model.number="discount" class="form-control" >
                            </div>
                        </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                              Delivery Charge<div class="col-md-4 pos-number-field"><input type="number" v-model.number="delevary_charge" class="form-control" >
                          </div>
                          </li>
                         <li class="list-group-item d-flex justify-content-between align-items-center">
                          Total:
                         <strong> {{discountTotal}} Tk</strong>
                             Delivery Total:
                         <strong> {{deliveryTotal}} Tk</strong>
<!--                             <strong> {{delevary_charge}} Tk</strong>-->
                        </li>
                      </ul>
                      <br>
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
                      <label>Pay</label>
                      <input type="text" class="form-control" v-model="pay">

                      <label>Due</label>
<!--                      <input type="text" class="form-control">-->
                        <p><b>{{Finaldue}}</b></p>
                      <label>Pay By </label>
                      <select class="form-control" v-model="payby">
                         <option value="HandCash">Hand Cash</option>
                         <option value="Cheaque">Cheaque</option>
                         <option value="GiftCard">Gift Card</option>
                      </select>
                        <label>Status</label>
                        <select class="form-control" v-model="order_status">
                            <option :value="status.id" v-for="status in statuss">{{ status.status_name }}</option>
                        </select>

                      <br>
                        <label>Delivery Company</label>
                        <select class="form-control" v-model="delevary_company">
                            <option :value="company.id" v-for="company in companies">{{ company.company_name }}</option>
                        </select>
                        <br>
                        <label>Note</label>
                        <input type="text" class="form-control" v-model="order_note">
                        <br>
                      <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                  </div>
              </div>
          <div class="card col-lg-7">
            <div class="card-header">
              <i class="fas fa-chart-area"></i>
              Products
            </div>

            <div class="card-body">
               <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                 <li class="nav-item">
                   <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">All Product</a>
                 </li>

<!--                 <li class="nav-item" v-for="category in categories" :key="category.id">-->
<!--                   <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false" @click="subproduct(category.id)">{{ category.category_name }}</a>-->
<!--                 </li>-->

               </ul>
               <div class="tab-content" id="pills-tabContent">

                 <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                  <input type="text" v-model="searchTerm" class="form-control" placeholder="search"><br>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 col-sm-6 col-6" v-for="product in filtersearch" :key="product.id">
                       <button class="btn bt-sm" @click.prevent="AddToCart(product.id)">
                        <div class="card" style="width: 9rem; height: 180px;">
                          <img :src="product.image" class="card-img-top" style="height: 100px; width: 100px;">
                          <div class="card-body">
                            <small class="card-title">{{ product.product_name }}</small>
                            <span class="badge badge-success" v-if="product.product_quantity >= 1"> Availble ({{ product.product_quantity }}) </span>
                            <span class="badge badge-danger" v-else="">Stock Out</span>
                          </div>
                        </div>
                        </button>

                      </div>
                    </div>
                 </div>

                 <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                  <input type="text" v-model="getsearchTerm" class="form-control" placeholder="search"><br>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 col-sm-6 col-6" v-for="getproduct in getfiltersearch" :key="getproduct.id">
                       <button class="btn btn-sm" @click.prevent="AddToCart(getproduct.id)">
                        <div class="card" style="width: 9rem; height: 180px;">
                          <img :src="getproduct.image" class="card-img-top" style="height: 100px; width: 100px;">
                          <div class="card-body">
                            <small class="card-title">{{ getproduct.product_name }}</small>
                            <span class="badge badge-success" v-if="getproduct.product_quantity >= 1"> Availble ({{ getproduct.product_quantity }}) </span>
                            <span class="badge badge-danger" v-else="">Stock Out</span>
                          </div>
                        </div>
                        </button>
                      </div>
                    </div>
                 </div>
               </div>
            </div>
         </div>
                   {{user_id}}
                   {{users.role_id}}
                   {{users.name}}
        </div>
        <!-- Icon Cards-->


   </div>
</template>

<script>
    export default {
      mounted(){
            if (!User.loggedIn()) {
               this.$router.push({ name:'/' })
            }
        },
        created() {
            this.allProduct();
            this.allCategory();
            this.allCustomer();
            this.cartProduct();
            this.vat();
            this.id();


            Reload.$on('AfterAdd', () => {
                this.cartProduct();
            })
            axios.get('/api/status/')
                .then(({data}) => (this.statuss = data)),
                axios.get('/api/deli-company/')
                    .then(({data}) => (this.companies = data))
        },
        data(){
          return{
            form:{
              details :'',
              amount:'',
              name :'',
              address:'',
              phone:'',
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
            vats:'',
            user_id:'',
            users:[],
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
            axios.get('/api/addTocart/'+id)
            .then(() => {
               Reload.$emit('AfterAdd');
               Notification.cart_success()
            })
          },
          cartProduct(){
            axios.get('/api/cart/product')
            .then(({data}) => (this.cards = data))
            .catch()
          },
          removeItem(id){
            axios.get('/api/remove/cart/'+id)
            .then(() => {
               Reload.$emit('AfterAdd');
               Notification.success()
            })
          },
          increment(id){
            axios.get('/api/increment/'+id)
            .then(() => {
               Reload.$emit('AfterAdd');
               Notification.success()
            })
          },
          decrement(id){
            axios.get('/api/decrement/'+id)
            .then(() => {
               Reload.$emit('AfterAdd');
               Notification.success()
            })
          },
          vat(){
            axios.get('/api/vats')
             .then(({data}) => (this.vats = data))
             .catch()
          },
            id(){
                this.user_id=User.id();
                // console.log(this.user_id);

            },
          orderdone(){
              axios.post('/api/customer/',this.form)
            let total =this.subtotal-this.discount;

            var data = {order_note:this.order_note,delevary_company:this.delevary_company,delevary_charge:this.delevary_charge,discount:this.discount,qty:this.qty, subtotal:this.subtotal, phone:this.form.phone, payby:this.payby, pay:this.pay,total:total,user_id:this.user_id,order_status:this.order_status}

            axios.post('/api/orderdone/',data)
            .then(() => {
               Notification.success()
               this.$router.push({ name: 'order' })
            })
          },
          // end cart methods
            allProduct(){
                axios.get('/api/online-product')
                    .then(({data}) => (this.products = data))
                    .catch()
            },
          allCategory(){
            axios.get('/api/category/')
            .then(({data}) => (this.categories = data))
            .catch()
        },
        allCustomer(){
          axios.get('/api/customer/')
            .then(({data}) => (this.customers = data))
            .catch(error => this.errors = error.response.data.errors)
        },
        subproduct(id)
        {
          axios.get('/api/getting/product/'+id)
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
