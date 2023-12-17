<template>



</template>


<script type="text/javascript">
import axios from "axios";
import AppStorage from "../../Helper/AppStorage";
import Notification from "../../Helper/Notification";
export default {
    created() {
       AppStorage.clear();
       Notification.success('Logout in successfully');
       this.$router.push({ name: '/' });
    },

};
</script>

<style type="text/css"></style>
