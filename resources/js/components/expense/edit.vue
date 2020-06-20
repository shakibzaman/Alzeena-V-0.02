 <template>
    <div>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Expense</li>
        </ol>
        <!-- Icon Cards-->
       <div class="row container">
         <div class="card col-lg-12">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Expense Updated
            <router-link to="/expense" class="btn btn-sm btn-info" id="add_new"> All Expense</router-link>
          </div>
          <form @submit.prevent="expenseUpdate">
            <div class="card-body">
                <div class="form-group">
	              <div class="form-row">
	               <div class="col-md-12">
                   <div class="form-group">
                           <label for="exampleFormControlSelect1">Category</label>
                           <select class="form-control" id="exampleFormControlSelect1" v-model="form.exp_category_id">
                               <option :value="category.id" v-for="category in categories">{{ category.category_name }}</option>
                           </select>
                           <small class="text-danger" v-if="errors.exp_category_id">{{ errors.exp_category_id[0] }}</small>
                       </div>
	               	<div class="form-group">
				       <label for="exampleFormControlTextarea1">Details Of Expense</label>
				       <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" v-model="form.details"></textarea>
				       <small class="text-danger" v-if="errors.details">{{ errors.details[0] }}</small>
				     </div>
	               </div>
	               <div class="col-lg-12">
<!--	               	<div class="form-label-group">-->
<!--                        <label for="Expense">Expense Amount</label>-->
<!--                        <input type="text" v-model="form.amount" class="form-control"   required="">-->
<!--                        <small class="text-danger" v-if="errors.amount">{{ errors.amount[0] }}</small>-->
<!--                    </div><br>-->
                       <div class="form-group">
                           <div class="col-md-12">
                               <div class="form-label-group">
                                   <input type="text" v-model="form.amount" class="form-control"  required="">
                                   <label for="ExpenseAmount">Expense Amount </label>
                                   <small class="text-danger" v-if="errors.amount">{{ errors.amount[0] }}</small>
                               </div>
                           </div>

                       </div><br>
                   <div class="form-group">
                       <div class="col-md-12">
                           <div class="form-label-group">
                               <input type="date" v-model="form.expense_date" class="form-control"  required="">
                               <label for="Date">Date </label>
                               <small class="text-danger" v-if="errors.expense_date">{{ errors.expense_date[0] }}</small>
                           </div>
                       </div>

                       </div><br>
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
</template>

<script>

    export default {

        data(){
        	return{
        		form:{
                    details :'',
                    amount:'',
                    exp_category_id:'',
                    expense_date:''
        		},
        		errors:{},
                categories:{},
        	}
        },
        created(){
        	let id = this.$route.params.id
        	axios.get('/api/expense/'+id)
        	.then(({data}) => (this.form = data))
        	.catch()

            axios.get('/api/expense-category')
                .then(({data}) => (this.categories = data))
        },
        methods:{
        	expenseUpdate(){
        		let id = this.$route.params.id
        		axios.patch('/api/expense/'+id,this.form)
        		.then(() => {
        			this.$router.push({ name: 'expense' })
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
