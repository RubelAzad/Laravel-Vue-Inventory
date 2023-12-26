<template>
    <div>
        <div class="row">
            <router-link to="/all-tax" class="btn btn-primary">All tax</router-link>
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
                      <h1 class="h4 text-gray-900 mb-4">Add tax</h1>
                    </div>
                    <div class="card-body">
                    <form class="user" @submit.prevent="taxInsert" enctype="multipart/form-data">
                      <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Tax Name</label>
                                <input type="text" class="form-control" id="tax_name" placeholder="Enter Tax Name" v-model="form.tax_name">
                                <small class="text-danger" v-if="errors.tax_name">{{ errors.tax_name[0] }}</small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Tax Percent</label>
                                <input type="text" class="form-control" id="tax_name" placeholder="Enter Tax Percent" v-model="form.tax_percent">
                                <small class="text-danger" v-if="errors.tax_percent">{{ errors.tax_percent[0] }}</small>
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </div>

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
let reader = new FileReader();
export default {
    created(){
        if(!User.loggedIn()){
            this.$router.push({name:'/'})
        }
    },
    data() {
        return {
            form: {
                tax_name: null,
                tax_percent:null
            },
            errors:{

            }
        };
    },
    methods: {

        taxInsert() {
            axios.post("/api/tax", this.form)
                .then(() => {
                    Notification.success('Tax Save in successfully');
                    this.$router.push({ name: 'all-tax' });
                })
                .catch((error) => {
                    this.errors = error.response.data.errors;
                });
        },


    },
};
</script>

<style type="text/css">

</style>

