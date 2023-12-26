<template>
    <div>
        <div class="row">
            <router-link to="/all-vat" class="btn btn-primary">All Vat</router-link>
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
                      <h1 class="h4 text-gray-900 mb-4">Add Vat</h1>
                    </div>
                    <div class="card-body">
                    <form class="user" @submit.prevent="vatInsert" enctype="multipart/form-data">
                      <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Vat Name</label>
                                <input type="text" class="form-control" id="vat_name" placeholder="Enter Vat Name" v-model="form.vat_name">
                                <small class="text-danger" v-if="errors.vat_name">{{ errors.vat_name[0] }}</small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Vat Percent</label>
                                <input type="text" class="form-control" id="vat_name" placeholder="Enter Vat Percent" v-model="form.vat_percent">
                                <small class="text-danger" v-if="errors.vat_percent">{{ errors.vat_percent[0] }}</small>
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
                vat_name: null,
                vat_percent:null
            },
            errors:{

            }
        };
    },
    methods: {

        vatInsert() {
            axios.post("/api/vat", this.form)
                .then(() => {
                    Notification.success('Vat Save in successfully');
                    this.$router.push({ name: 'all-vat' });
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

