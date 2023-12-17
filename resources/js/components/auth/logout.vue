<template>



</template>


<script type="text/javascript">
import axios from "axios";
import AppStorage from "../../Helper/AppStorage";
export default {
    created() {
       AppStorage.clear();
       this.$swal({
            icon:'success',
            title:'Logout successfully',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            onOpen: (toast) =>{
                toast.addEventListener('mouseenter',Swal.stopTimer)
                toast.addEventListener('mouseleave',Swal.resumeTimer)
            }
        });
       this.$router.push({ name: 'login' });
    },

};
</script>

<style type="text/css"></style>
