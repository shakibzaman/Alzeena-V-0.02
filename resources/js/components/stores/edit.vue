 <template>
    <div>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Stores</li>
        </ol>
        <!-- Icon Cards-->
       <div class="row container">
         <div class="card col-lg-12">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Store Update
            <router-link to="/category" class="btn btn-sm btn-info" id="add_new"> All Stores</router-link>
          </div>
          <div class="card-body">
          	  <form @submit.prevent="shopUpdate">
                <div class="form-group">
	              <div class="form-row">
	               <div class="col-md-12">
	                <div class="form-label-group">
	                  <input type="text" v-model="form.shop_name" class="form-control"   required="">
	                  <small class="text-danger" v-if="errors.shop_name">{{ errors.shop_name[0] }}</small>
	                  <label for="firstName">Shop Name</label>
	                </div>
	               </div>
	             </div>
	          </div>
              <button type="submit" class="btn btn-success">Update</button>
           </form>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
         </div>
       </div>
   </div>
</template>

<script>

    export default {

        data(){
        	return{
        		form:{
        			shop_name :''

        		},
        		errors:{},
        	}
        },
        created(){
        	let id = this.$route.params.id
        	axios.get('/api/store/'+id)
        	.then(({data}) => (this.form = data))
        	.catch()
        },
        methods:{
        	shopUpdate(){
        		let id = this.$route.params.id
        		axios.patch('/api/store/'+id,this.form)
        		.then(() => {
        			this.$router.push({ name: 'store-list' })
        			Notification.success()
        		})
        		.catch(error => this.errors = error.response.data.errors)
        	},

        }


    }




</script>

<style>

#add_new{
	float: right;
}

</style>
