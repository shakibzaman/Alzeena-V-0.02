<template>
<div>
    Select Product for Barcode
    <form @submit.prevent="productBarcode">
        <div class="card-body">
            <div class="form-group">
                <div class="form-row">
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Products</label>
                            <select class="form-control" id="exampleFormControlSelect1" v-model="form.product_name">
                                <option :value="product.product_name" v-for="product in products">{{ product.product_name }}</option>
                            </select>
                            <small class="text-danger" v-if="errors.product">{{ errors.product[0] }}</small>
                        </div>
                    </div><br>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Quentity</label>
                            <input type="text" required="" class="form-control" v-model.number="form.number">
                        </div>
                    </div><br>
                </div>
            </div>
        </div>
    </form>


    <div class="card-body"> 
        <div id='content'>       
        <div class="row">
            
            <div v-for='index in form.number' :key='index' class="col-md-3">
                
                    <div>
                    <barcode v-bind:value="form.product_name">
                    rendering fails.
                    </barcode>
                    </div>      
                </div>    
            </div>
        </div>
        <!-- <input type="text" v-model="varName"> -->

     <a @click.prevent="printme" target="_blank" class="btn btn-success custom-btn"><i class="fa fa-print"></i> Print</a>
    </div>
</div>
</template>
  
  <script>
      import VueBarcode from 'vue-barcode';
      import jspdf from 'jspdf';
      import html2canvas from 'html2canvas';
      import domtoimage from 'dom-to-image';
  export default {
        created(){
            axios.get('/api/product')
                .then(({data}) => (this.products = data))
        },
        data(){
            return{
                form:{  
                    product_name:'',
                    number:'',
                },
                varName:"this is text",
                errors:{},
                orders:[],
                products:[],
            }
        },

       components: {
            'barcode': VueBarcode
        },
        methods:{
            printme(){
                // const doc=new jspdf();
                // const html=this.$refs.content.innerHTML;
                // doc.fromHTML(html,15,15);
                // //console.log(html)
                // // doc.text(this.varName,15,15);
                // doc.save("barcode.pdf")

                domtoimage.toJpeg(document.getElementById('content'), { quality: 1 })
                .then(function (dataUrl) {
                    var link = document.createElement('a');
                    link.download = 'my-image-name.jpeg';
                    link.href = dataUrl;
                    link.click();
                });
                
                
            }
        },


    }
  </script>
  
  <style>
    
    a.btn.btn-default {
        background: #fff;
    }
    svg.vue-barcode-element {
    width: 100%;
}
  </style>