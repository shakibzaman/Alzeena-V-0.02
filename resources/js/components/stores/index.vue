 <template>
    <div>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">All Shop</li>
        </ol>
        <!-- Icon Cards-->
       <div class="row card container">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Shop Insert
            <router-link :to="{name:'add-store'}" class="btn btn-sm btn-info" id="add_new"> Add New</router-link>
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
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>

                    <tr v-for="shop in filtersearch" :key="shop.id">
                      <td>{{ shop.shop_name }}</td>

                      <td>
                        <router-link :to="{name: 'edit-store', params:{id: shop.id} }" class="btn btn-sm btn-info">Edit</router-link>
                        <a @click="deleteShop(shop.id)" class="btn btn-sm btn-danger">Delete</a>
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
        this.allCategory();
        },

        data(){
          return{
            shops:[],
            searchTerm:'',
          }
        },
       computed:{
         filtersearch(){
          return this.shops.filter(shop => {
             return shop.shop_name.match(this.searchTerm)
           })
         }
       },
        methods:{
          allCategory(){
            axios.get('/api/store/')
            .then(({data}) => (this.shops = data))
            .catch()
          },
            deleteShop(id){
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
              axios.delete('/api/store/'+id)
              .then(()=>{
                 this.shops = this.shops.filter(shop =>{
                    return shop.id !=id
                 })
              })
              .catch(()=>{
                 this.$router.push({name: 'store-list'})
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
