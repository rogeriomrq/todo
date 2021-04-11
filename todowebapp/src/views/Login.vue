<template>
    <div class="view-login">
        <Form/>
    </div>
</template>

<script>
import Form from "@/components/login/Form"
import { mapState } from "vuex"

export default {
    name: "Login",
    
    components: { Form },
    
    computed: {
        ...mapState(['accessToken'])
    }
}
</script>

<style scoped>
.view-login {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0px;
    height: 100%;
    background-color: #bcbcbc;
}
</style>