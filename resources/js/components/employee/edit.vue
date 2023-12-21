
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
                      <h1 class="h4 text-gray-900 mb-4">Edit Employee</h1>
                    </div>
                    <div class="card-body">
                    <form class="user" @submit.prevent="employeeUpdate" enctype="multipart/form-data">
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
                                <input type="text" class="form-control" id="phoneNumber" placeholder="Enter Your Phone Number" v-model="form.phone">
                                <small class="text-danger" v-if="errors.phone">{{ errors.phone[0] }}</small>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleFormControlSelect1">Branch Name</label>
                                <select class="form-control" id="exampleFormControlSelect1" v-model="form.branch_id">
                                    <option :value="branch.id" v-for="branch in branches" :key="branch.id">{{ branch.branch_name }}</option>
                                </select>
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Designation Name</label>
                                <select class="form-control" id="exampleFormControlSelect1" v-model="form.designation_id">
                                    <option :value="designation.id" v-for="designation in designations" :key="designation.id">{{ designation.designation_name }}</option>
                                    <small class="text-danger" v-if="errors.designation_id">{{ errors.designation_id[0] }}</small>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Department Name</label>
                                <select class="form-control" id="exampleFormControlSelect1" v-model="form.department_id">
                                    <option :value="department.id" v-for="department in departments" :key="department.id">{{ department.department_name }}</option>
                                    <small class="text-danger" v-if="errors.department_id">{{ errors.department_id[0] }}</small>
                                </select>
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Shift Name</label>
                                <select class="form-control" id="exampleFormControlSelect1" v-model="form.shift_id">
                                    <option :value="shift.id" v-for="shift in shifts" :key="shift.id">{{ shift.shift_name }}</option>
                                    <small class="text-danger" v-if="errors.shift_id">{{ errors.shift_id[0] }}</small>
                                </select>
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
                                    :src="form.newPhoto"
                                    style="
                                        height: 40px;
                                        width: 40px;
                                    "
                                />
                            </div>
                        </div>
                    </div>



                      <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Update</button>
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
        let id = this.$route.params.id
        axios.get('/api/employee/'+id)
        .then(({data}) => (this.form =data))
        .catch()
        axios.get('/api/branch/').then(({data})=>(this.branches=data));
        axios.get('/api/department/').then(({data})=>(this.departments=data));
        axios.get('/api/designation/').then(({data})=>(this.designations=data));
        axios.get('/api/shift/').then(({data})=>(this.shifts=data));

    },
    data() {
        return {
            form: {
                name: '',
                email: '',
                address: '',
                salary: '',
                address: '',
                joining_date: '',
                nid: '',
                phone: '',
                photo: '',
                newPhoto: '',
                branch_id:'',
                department_id:'',
                designation_id:'',
                shift_id:'',
            },
            errors:{},
            branches:{},
            departments:{},
            designations:{},
            shifts:{},
        };
    },

    methods: {
        onFileSelected(event){
            let file = event.target.files[0];
            if (file.size > 1048770) {
            Notification.image_validation()
            }else{
            let reader = new FileReader();
            reader.onload = event =>{
                this.form.newPhoto = event.target.result

            };
            reader.readAsDataURL(file);
            }

        },
        employeeUpdate(){
            let id = this.$route.params.id
            axios.patch('/api/employee/'+id,this.form)
            .then(() => {
                this.$router.push({ name: 'all-employee'})
                Notification.success('Updated Successfully')
            })
            .catch(error =>this.errors = error.response.data.errors)
            },


    },
};
</script>

<style type="text/css">
    #em_photo{
        width: 40px;
        height: 40px;
    }
</style>

