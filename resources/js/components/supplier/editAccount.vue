 <template>
    <div>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Product</li>
        </ol>
        <!-- Icon Cards-->
       <div class="row container">
         <div class="card col-lg-12">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Product Stock Update
          </div>
           <form @submit.prevent="accountUpdate" >
          <div class="card-body">
   	          <div class="form-group">
   	               <div class="col-md-12">
                       <div class="form-label-group">
                           <input type="text" v-model="form.due" class="form-control">
                           <label for="phone" v-model="form.due">Due {{form.due}}</label>
                           <small class="text-danger" v-if="errors.due">{{ errors.due[0] }}</small>

                       </div><br>
                       <div class="form-label-group">
                           <input type="text" v-model="form.newPay" class="form-control"  required="">
                           <label for="phone">Pay  </label>
                           <small class="text-danger" v-if="errors.newPay">{{ errors.newPay[0] }}</small>
                       </div><br>
                       <p><b> Final Due </b>{{finalDue}}</p>
   	               </div>
   	             </div>
   	          </div><br>
              <button type="submit" class="btn btn-success">Stock Update</button>
             </form><br>
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
                    due:'',
                    newPay:'',
        		},
        		errors:{},

        	}
        },
        created(){
        	let id = this.$route.params.id

            axios.get('/api/supplier-account/'+id)
        	.then(({data}) => (this.form = data))
        	.catch()


        },
        methods:{
            newDueCal(){
                return this.newDue
            },

            accountUpdate(){
        		let id = this.$route.params.id
        		axios.post('/api/supplier-account/update/'+id,this.form)
        		.then(() => {
        			this.$router.push({ name: 'detailssupplier' })
        			Notification.success()
        		})
        		.catch(error => this.errors = error.response.data.errors)

        	}


        },
        computed: {
            finalDue() {
                let result=0;
                 result=(this.form.due)-(this.form.newPay);
                return result;
            }
        }


    }




</script>

<style>


</style>
