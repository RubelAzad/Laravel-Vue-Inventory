<template>
    <div>
        <div class="row">
            <router-link to="/all-unit" class="btn btn-primary">All unit</router-link>
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
                      <h1 class="h4 text-gray-900 mb-4">Add unit</h1>
                    </div>
                    <div class="card-body">
                    <form class="user" @submit.prevent="unitInsert" enctype="multipart/form-data">
                      <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Unit Name</label>
                                <input type="text" class="form-control" id="unit_name" placeholder="Enter unit Name" v-model="form.unit_name">
                                <small class="text-danger" v-if="errors.unit_name">{{ errors.unit_name[0] }}</small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Unit Code </label>
                                <input type="text" class="form-control" id="unit_code" placeholder="Enter unit Percent" v-model="form.unit_code">
                                <small class="text-danger" v-if="errors.unit_code">{{ errors.unit_code[0] }}</small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Unit Operation Value</label>
                                <input type="text" class="form-control" id="unit_op_value" placeholder="Enter Unit Operation Value" v-model="form.unit_op_value">
                                <small class="text-danger" v-if="errors.unit_op_value">{{ errors.unit_op_value[0] }}</small>
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
                unit_name: null,
                unit_code:null,
                unit_op_value:null,
            },
            errors:{

            }
        };
    },
    methods: {

        unitInsert() {
            axios.post("/api/unit", this.form)
                .then(() => {
                    Notification.success('Unit Save in successfully');
                    this.$router.push({ name: 'all-unit' });
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

