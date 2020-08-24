 <template>
    <div>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">All Product</li>
        </ol>
        <!-- Icon Cards-->
       <div class="row card container">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Product Insert
            <router-link :to="{name: 'store-product'}" class="btn btn-sm btn-info" id="add_new"> Add New</router-link>
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
                      <th>Image</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>

                    <tr v-for="product in filtersearch" :key="product.id">
                      <td>{{ product.product_name}}</td>
                      
                      <!-- <td><img :src="product.image" id="em_photo"></td> -->
                      <td><img :src="'/'+product.image" id="em_photo"></td>
                      
                      <td v-if="product.feature==0">
                          Inctive</td>
                      
                          <td v-else="product.feature==1">
                          Active</td>
                      <td>
                        <!-- <router-link :to="{name: 'change-feature', params:{id: product.id} }" class="btn btn-sm btn-info">Change</router-link> -->
                        <a @click="changeFeature(product.id)" class="btn btn-sm btn-success">Change</a>
                      </td>
                    </tr>

                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>
       </div>
       <div>
  </div>
   </div>
</template>

<script>
    export default {

        created(){
         this.allProduct();
        },

        data(){
          return{
            products:[],
            searchTerm:'',
          }
        },
       computed:{
        
         filtersearch(){
          return this.products.filter(product => {
             return product.product_name.match(this.searchTerm)
           })
         }
       },
        methods:{
          allProduct(){
            axios.get('/api/product/')
            .then(({data}) => (this.products = data))
            .catch()
          },
          changeFeature(id){
              axios.post('/api/feature/'+id)
              
              
            .then(() => {
                        this.$router.push({ name: 'feature' })
                        window.location.reload();
                        Notification.success()
                    })
                .catch(error => this.errors = error.response.data.errors)

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
