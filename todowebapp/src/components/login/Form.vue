<template>
    <form
        class="table-form"
        @submit.prevent="tryTologin"
    >
        <div>
            <label
                class="label-form"
                for="email"
            >E-mail: </label>
            <input
                class="input-form"
                id="email"
                placeholder="Insira seu e-mail"
                type="text"
                v-model="email"
            />
        </div>
        <div>
            <label
                class="label-form"
                for="password"
            >Senha: </label>
            <input
                class="input-form"
                id="password"
                placeholder="Insira a senha"
                type="password"
                v-model="password"
            />
        </div>
        <div 
            class="login-fail" 
            v-if="!validate"
        >
            <span>Email/Senha errado!</span>
        </div>
        <div>
            <button class="button button-primary">Entrar</button>
        </div>
    </form>
</template>

<script>
import { mapActions } from 'vuex'

export default {
    name: "Form",
    data() {
        return {
            password: '',
            email: '',
            validate: true,
        }
    },
    methods: {
        ...mapActions([
            'initializeStore',
            'login'
        ]),
        
        tryTologin() {
            const user = {
                password: this.password,
                email: this.email
            }
            
            this.login(user)
            .then(() => {
                this.initializeStore()
                this.$router.push('/home')
            })
            .catch(() => {
                this.validate = false;
            })
        }
    }
}
</script>

<style scoped>
.button {
    width: 100%;
    margin-top: 5%;
}

.login-fail {
    color: red;
}
</style>