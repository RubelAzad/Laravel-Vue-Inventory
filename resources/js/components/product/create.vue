<template>
    <div>
        <div class="row">
            <router-link to="/all-product" class="btn btn-primary">All product</router-link>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-md-12">
          <div class="card shadow-sm my-5">
            <div class="card-body p-0">
              <div class="row">
                <div class="col-lg-12">
                  <div class="login-form">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">Add product</h1>
                    </div>
                    <div class="card-body">
                    <form class="user" @submit.prevent="productInsert" enctype="multipart/form-data">
                      <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Product Name</label>
                                <input type="text" class="form-control" id="product_name" placeholder="Enter Product Name" v-model="form.product_name">
                                <small class="text-danger" v-if="errors.product_name">{{ errors.product_name[0] }}</small>
                            </div>
                            <div class="col-md-6">
                                <label>Product Code</label>
                                <input type="text" class="form-control" id="product_code" aria-describedby="product_code"
                                placeholder="Enter Product Code" v-model="form.product_code">
                                <small class="text-danger" v-if="errors.product_code">{{ errors.product_code[0] }}</small>
                            </div>
                        </div>

                      </div>
                      <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Category</label>
                                <VueMultiselect
                                    v-model="form.category_id"
                                    :options="formattedCategories"
                                    :close-on-select="true"
                                    :clear-on-select="false"
                                    placeholder="Select one"
                                    label="name"
                                    track-by="id"  :select-label="'id'"
                                />
                                <small class="text-danger" v-if="errors.category_id">{{ errors.category_id[0] }}</small>
                            </div>
                            <div class="col-md-6">
                                <label>Brand Name</label>
                                <VueMultiselect
                                                v-model="form.brand_id"
                                                :options="formattedBrands"
                                                :close-on-select="true"
                                                :clear-on-select="false"
                                                placeholder="Select one"
                                                label="name"
                                                track-by="id"
                                                :select-label="''"
                                            />
                                            <small class="text-danger" v-if="errors.brand_id">{{ errors.brand_id[0] }}</small>
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Product Stock</label>
                                <input type="text" class="form-control" id="product_stock" placeholder="Enter Product Stock" v-model="form.product_stock">
                                <small class="text-danger" v-if="errors.product_stock">{{ errors.product_stock[0] }}</small>
                            </div>
                            <div class="col-md-6">
                                <label>Product Buying Price</label>
                                <input type="number" class="form-control" id="product_buying_price" aria-describedby="product_buying_price"
                                placeholder="Enter Product Buying Price" v-model="form.product_buying_price">
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Product Cost Price</label>
                                <input type="number" class="form-control" id="product_cost_price" aria-describedby="product_cost_price"
                                placeholder="Enter Product Cost Price" v-model="form.product_cost_price">
                            </div>
                            <div class="col-md-6">
                                <label>Product Selling Price</label>
                                <input type="number" class="form-control" id="product_selling_price" aria-describedby="product_selling_price"
                                placeholder="Enter Product Selling Price" v-model="form.product_selling_price">
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Product Buying Date</label>
                                <input type="date" class="form-control" id="product_buying_date" aria-describedby="product_buying_date"
                                placeholder="Enter Product Buying Date" v-model="form.product_buying_date">
                            </div>
                            <div class="col-md-6">
                                <label>Product Quantity</label>
                                <input type="number" class="form-control" id="product_qty" aria-describedby="product_qty"
                                placeholder="Enter Product Qty" v-model="form.product_qty">
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Supplier</label>
                                <VueMultiselect
                                                v-model="form.supplier_id"
                                                :options="formattedSuppliers"
                                                :close-on-select="true"
                                                :clear-on-select="false"
                                                placeholder="Select one"
                                                label="name"
                                                track-by="id"
                                                :select-label="''"
                                            />
                            </div>
                            <div class="col-md-6">
                                <label>Unit</label>
                                <VueMultiselect
                                                v-model="form.unit_id"
                                                :options="formattedUnits"
                                                :close-on-select="true"
                                                :clear-on-select="false"
                                                placeholder="Select one"
                                                label="name"
                                                track-by="id"
                                                :select-label="''"
                                            />
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Warehouse</label>
                                <VueMultiselect
                                                v-model="form.warehouse_id"
                                                :options="formattedWarehouses"
                                                :close-on-select="true"
                                                :clear-on-select="false"
                                                placeholder="Select one"
                                                label="name"
                                                track-by="id"
                                                :select-label="''"
                                            />
                            </div>
                            <div class="col-md-6">
                                <label>Tax</label>
                                <VueMultiselect
                                                v-model="form.tax_id"
                                                :options="formattedTaxs"
                                                :close-on-select="true"
                                                :clear-on-select="false"
                                                placeholder="Select one"
                                                label="name"
                                                track-by="id"
                                                :select-label="''"
                                            />
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Vat</label>
                                <VueMultiselect
                                                v-model="form.vat_id"
                                                :options="formattedVats"
                                                :close-on-select="true"
                                                :clear-on-select="false"
                                                placeholder="Select one"
                                                label="name"
                                                track-by="id"
                                                :select-label="''"
                                            />
                            </div>
                            <div class="col-md-6">
                                <label>Tax method</label>
                                <VueMultiselect
                                                v-model="form.tax_method"
                                                :options="taxMethods"
                                                :close-on-select="true"
                                                :clear-on-select="false"
                                                placeholder="Select one"
                                                label="name"
                                                track-by="id"
                                                :select-label="''"
                                            />

                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="feature_product" v-model="form.feature_product">
                                    <label class="form-check-label" for="feature_product">Feature Product</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="discount_product" v-model="form.discount_product">
                                    <label class="form-check-label" for="discount_product">Discount Product</label>
                                  </div>
                            </div>
                            <div class="col-md-6">
                                <div v-if="form.discount_product">

                                    <label>Discount Amount</label>
                                <input type="number" class="form-control" id="discount_product_price" aria-describedby="discount_product_price"
                                placeholder="Discount Amount" v-model="form.discount_product_price">

                                    <!-- Add more input fields as needed -->
                                  </div>
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-row">

                            <div class="col-md-6">
                                <div v-if="form.discount_product">
                                <label>Discount Product Start Date</label>
                                <input type="date" class="form-control" id="discount_product_start_date" aria-describedby="discount_product_start_date"
                                placeholder="Enter Product Start Date" v-model="form.discount_product_start_date">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div v-if="form.discount_product">
                                <label>Discount Product End Date</label>
                                <input type="date" class="form-control" id="discount_product_end_date" aria-describedby="discount_product_end_date"
                                placeholder="Enter Product End Date" v-model="form.discount_product_end_date">
                                </div>
                            </div>
                        </div>
                      </div>






                      <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <input
                                    type="file"
                                    class="custom-file-input"
                                    id="customFile"
                                    @change="onFileSelected"
                                />
                                <small
                                    class="text-danger"
                                    v-if="errors.photo"
                                >
                                    {{ errors.photo[0] }}
                                </small>
                                <label
                                    class="custom-file-label"
                                    for="customFile"
                                    >Choose file</label
                                >
                            </div>
                            <div class="col-md-6">
                                <img
                                    :src="form.photo"
                                    style="
                                        height: 40px;
                                        width: 40px;
                                    "
                                />
                            </div>
                        </div>
                    </div>



                      <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                      </div>
                    </form>
                </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</template>

<script type="text/javascript">
import axios from "axios";
import User from "../../Helper/User";
import Notification from "../../Helper/Notification";
import VueMultiselect from 'vue-multiselect';
import "vue-multiselect/dist/vue-multiselect.css";
let reader = new FileReader();

export default {
    components: { VueMultiselect },
    created(){
        if(!User.loggedIn()){
            this.$router.push({name:'/'})
        }
        axios.get('/api/category/')
        .then(({ data }) => {
            this.categories = data;

            // Update the form data after fetching categories
            this.form.category_id = data.find(category => category.id === this.form.category_id);
        });
        axios.get('/api/brand/')
        .then(({ data }) => {
            this.brands = data;

            // Update the form data after fetching categories
            this.form.brand_id = data.find(brand => brand.id === this.form.brand_id);
        });
        axios.get('/api/supplier/')
        .then(({ data }) => {
            this.suppliers = data;

            // Update the form data after fetching categories
            this.form.supplier_id = data.find(supplier => supplier.id === this.form.supplier_id);
        });
        axios.get('/api/unit/')
        .then(({ data }) => {
            this.units = data;

            // Update the form data after fetching categories
            this.form.unit_id = data.find(unit => unit.id === this.form.unit_id);
        });
        axios.get('/api/warehouse/')
        .then(({ data }) => {
            console.log(data)
            this.warehouses = data;

            this.form.warehouse_id = data.find(warehouse => warehouse.id === this.form.warehouse_id);
        });
        axios.get('/api/tax/')
        .then(({ data }) => {
            this.taxs = data;

            // Update the form data after fetching categories
            this.form.tax_id = data.find(tax => tax.id === this.form.tax_id);
        });
        axios.get('/api/vat/')
        .then(({ data }) => {
            this.vats = data;

            // Update the form data after fetching categories
            this.form.vat_id = data.find(vat => vat.id === this.form.vat_id);
        });


    },
    computed: {

        paginatedproducts() {
            const startIndex = (this.currentPage - 1) * this.pageSize;
            return this.filteredproducts.slice(startIndex, startIndex + this.pageSize);
        },
        totalPages() {
            return Math.ceil(this.filteredproducts.length / this.pageSize);
        },
        formattedCategories() {

            return this.categories.map((category) => ({
                id: category.id,
                name: category.category_name,

            }));

        },
        formattedBrands() {

           return this.brands.map((brand) => ({
               id: brand.id,
               name: brand.brand_name,

           }));

       },
        formattedUnits() {

           return this.units.map((unit) => ({
               id: unit.id,
               name: unit.unit_name,

           }));

       },
        formattedSuppliers() {

           return this.suppliers.map((supplier) => ({
               id: supplier.id,
               name: supplier.supplier_name,

           }));

       },
       formattedWarehouses() {

           return this.warehouses.map((warehouse) => ({
               id: warehouse.id,
               name: warehouse.warehouse_name,

           }));

       },
       formattedTaxs() {

           return this.taxs.map((tax) => ({
               id: tax.id,
               name: tax.tax_name,

           }));

       },
       formattedVats() {

           return this.vats.map((vat) => ({
               id: vat.id,
               name: vat.vat_name,

           }));

       },

    },
    data() {
        return {
            brands:[],
            taxs:[],
            vats:[],
            units:[],
            categories:[],
            suppliers:[],
            warehouses:[],
            taxMethods:[
                {
                    "id": "",
                    "name": "Select Your Value",
                },
                {
                    "id": 1,
                    "name": "Included",
                },
                {
                    "id": 2,
                    "name": "Excluded",
                },

            ],
            form: {
                product_name: null,
                product_code: null,
                category_id: null,
                product_stock: null,
                product_buying_price: null,
                product_cost_price: null,
                product_selling_price: null,
                product_buying_date: null,
                product_selling_date: null,
                product_note:null,
                product_qty:null,
                supplier_id:null,
                tax_id:null,
                vat_id:null,
                unit_id:null,
                brand_id:null,
                warehouse_id:null,
                tax_method:null,
                discount_product: '', // initial state
                feature_product: '',
                discount_product_start_date: '',
                discount_product_end_date: '',
                discount_product_price: '',
                photo: "",
                newPhoto: "",

            },
            errors:{

            }
        };
    },
    methods: {
        validateForm() {
        // Clear previous errors
        this.errors = {};

        // Perform validation for each field
        if (!this.form.product_name) {
            this.errors.product_name = ['Product Name is required'];
        }

        // Add similar validations for other fields

        // Return true if there are no errors
        return Object.keys(this.errors).length === 0;
        },
        onFileSelected(event){
            let file = event.target.files[0];
            if(file.size > 1048770){
                Notification.warning('Image size Less then 1 MB');
            }else{
                let file = event.target.files[0];
                reader.onload =event =>{
                    this.form.photo = event.target.result
                    console.log(event.target.result);
                }
                reader.readAsDataURL(file);

            }
        },
        productInsert() {
            if (this.validateForm()) {
            // Validation passed, proceed with form submission

            // Your existing code for submitting the form
           // console.log(this.form);
                    this.form.category_id = this.form.category_id?.id ? this.form.category_id.id: null;
                    this.form.supplier_id = this.form.supplier_id?.id ?this.form.supplier_id.id:null;
                    this.form.tax_id = this.form.tax_id?.id? this.form.tax_id.id:null;
                    this.form.vat_id = this.form.vat_id?.id?this.form.vat_id.id:null;
                    this.form.unit_id = this.form.unit_id?.id?this.form.unit_id.id:null;
                    this.form.brand_id = this.form.brand_id?.id?this.form.brand_id.id:null;
                    this.form.warehouse_id = this.form.warehouse_id?.id?this.form.warehouse_id.id:null;
                    this.form.tax_method = this.form.tax_method?.id?this.form.tax_method.id:null;

                    axios.post("/api/product", this.form)
                        .then(() => {

                            Notification.success('Product Save in successfully');
                            this.$router.push({ name: 'all-product' });
                        })
                        .catch((error) => {
                            this.errors = error.response.data.errors;
                        });

            }

        },


    },
};
</script>

<style src=""></style>


