 <template>
    <div>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">All Size</li>
        </ol>
        <!-- Icon Cards-->
       <div class="row card container">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Size Insert
            <router-link :to="{name:'store-size'}" class="btn btn-sm btn-info" id="add_new"> Add New</router-link>
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

                    <tr v-for="size in filtersearch" :key="size.id">
                      <td>{{ size.size }}</td>

                      <td>
                        <router-link :to="{name: 'edit-size', params:{id: size.id} }" class="btn btn-sm btn-info">Edit</router-link>
                        <a @click="deleteSize(size.id)" class="btn btn-sm btn-danger">Delete</a>
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
        this.allSize();
        },

        data(){
          return{
            sizes:[],
            searchTerm:'',
          }
        },
       computed:{
         filtersearch(){
          return this.sizes.filter(size => {
             return size.size.match(this.searchTerm)
           })
         }
       },
        methods:{
          allSize(){
            axios.get('/api/size/')
            .then(({data}) => (this.sizes = data))
            .catch()
          },
            deleteSize(id){
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
              axios.delete('/api/size/'+id)
              .then(()=>{
                 this.shops = this.sizes.filter(size =>{
                    return size.id !=id
                 })
              })
              .catch(()=>{
                 this.$router.push({name: 'size'})
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
