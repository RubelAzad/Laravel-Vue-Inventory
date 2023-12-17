<template>
    <div>
        <div class="row">
            <router-link to="/all-employee" class="btn btn-primary">All Employee</router-link>
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
                      <h1 class="h4 text-gray-900 mb-4">Add Employee</h1>
                    </div>
                    <div class="card-body">
                    <form class="user" @submit.prevent="employeeInsert" enctype="multipart/form-data">
                      <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Full Name</label>
                                <input type="text" class="form-control" id="Name" placeholder="Enter Full Name" v-model="form.name">
                                <small class="text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
                            </div>
                            <div class="col-md-6">
                                <label>Email</label>
                                <input type="email" class="form-control" id="Email" aria-describedby="email"
                                placeholder="Enter Email Address" v-model="form.email">
                                <small class="text-danger" v-if="errors.email">{{ errors.email[0] }}</small>
                            </div>
                        </div>

                      </div>
                      <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Address</label>
                                <input type="text" class="form-control" id="Address" placeholder="Enter Your Address" v-model="form.address">
                            </div>
                            <div class="col-md-6">
                                <label>Salary</label>
                                <input type="number" class="form-control" id="Salary" aria-describedby="emailHelp"
                                placeholder="Enter Your Salary" v-model="form.salary">
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Joining Date</label>
                                <input type="date" class="form-control" id="joining_date" placeholder="Enter Your Joining Date" v-model="form.joining_date">
                                <small class="text-danger" v-if="errors.joining_date">{{ errors.joining_date[0] }}</small>
                            </div>
                            <div class="col-md-6">
                                <label>NID Number</label>
                                <input type="text" class="form-control" id="NID" aria-describedby="nid"
                                placeholder="Enter Your NID" v-model="form.nid">
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Phone Number</label>
                                <input type="date" class="form-control" id="phoneNumber" placeholder="Enter Your Phone Number" v-model="form.phone">
                                <small class="text-danger" v-if="errors.phone">{{ errors.phone[0] }}</small>
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Upload Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" @change="onFileSelected">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                  </div>
                            </div>
                            <div class="col-md-6">
                                <label></label>
                                <img :src="form.photo" style="height:40px; weight:40px" alt="Image">
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
                name: null,
                email: null,
                address: null,
                salary: null,
                address: null,
                joining_date: null,
                nid: null,
                phone: null,
                photo: null,
            },
            errors:{

            }
        };
    },
    methods: {
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
        employeeInsert() {
            axios.post("/api/employee", this.form)
                .then(() => {
                    Notification.success('Employee Save in successfully');
                    this.$router.push({ name: 'all-employee' });
                })
                .catch((error) => {
                    this.errors = error.response.data.errors;
                });
        },


    },
};
</script>

<style>
</style>

