 <template>
    <div>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Shop</li>
        </ol>
        <!-- Icon Cards-->
       <div class="row container">
         <div class="card col-lg-12">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Shop Insert
            <router-link to="/store-list" class="btn btn-sm btn-info" id="add_new"> All Shop</router-link>
          </div>
          <form @submit.prevent="shopInsert">
            <div class="card-body">
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
	          </div>
              <button type="submit" class="btn btn-success">Submit</button>
            </form>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
         </div>
       </div>
</template>

<script>

    export default {

        data(){
        	return{
        		form:{
                    shop_name:''
        		},
        		errors:{},
        	}
        },


        methods:{
            shopInsert(){
        		axios.post('/api/store/',this.form)
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
