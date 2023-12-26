<template>
    <div>
        <div class="row">
            <router-link to="/all-warehouse" class="btn btn-primary">All warehouse</router-link>
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
                      <h1 class="h4 text-gray-900 mb-4">Add warehouse</h1>
                    </div>
                    <div class="card-body">
                    <form class="user" @submit.prevent="warehouseInsert" enctype="multipart/form-data">
                      <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Warehouse Name</label>
                                <input type="text" class="form-control" id="warehouse_name" placeholder="Enter Warehouse Name" v-model="form.warehouse_name">
                                <small class="text-danger" v-if="errors.warehouse_name">{{ errors.warehouse_name[0] }}</small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Person Name</label>
                                <input type="text" class="form-control" id="warehouse_contact" placeholder="Enter Person Name" v-model="form.warehouse_contact">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Email</label>
                                <input type="text" class="form-control" id="warehouse_email" placeholder="Enter Email" v-model="form.warehouse_email">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Mobile</label>
                                <input type="text" class="form-control" id=" warehouse_mobile" placeholder="Enter Mobile Number" v-model="form. warehouse_mobile">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Address</label>
                                <input type="text" class="form-control" id="warehouse_address" placeholder="Enter Address" v-model="form.warehouse_address">
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
                warehouse_name: null,
                warehouse_contact:null,
                warehouse_email:null,
                warehouse_mobile:null,
                warehouse_address:null,
            },
            errors:{

            }
        };
    },
    methods: {

        warehouseInsert() {
            axios.post("/api/warehouse", this.form)
                .then(() => {
                    Notification.success('Warehouse Save in successfully');
                    this.$router.push({ name: 'all-warehouse' });
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

