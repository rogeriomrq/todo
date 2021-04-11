<template>
    <form class="table-form">
        <div>
            <label 
                class="label-form"
                for="title"
            >Titulo</label>
            <input 
                class="input-form"
                id="title"
                placeholder="Insira o titulo"
                type="text" 
                v-model="title"
            />
        </div>
        <div>
            <label 
                class="label-form"
                for="title"
            >Descrição</label>
            <input 
                class="input-form"
                id="description"
                placeholder="Insira a descrição"
                type="text" 
                v-model="description"
            />
        </div>
        <div 
            class="create-fail" 
            v-if="!validate"
        >
            <span>O Titulo é obrigatorio!</span>
        </div>
        <div 
            class="create-success" 
            v-if="createStatus"
        >
            <span>Criado com sucesso!</span>
        </div>
        <div>
            <button 
                class="button button-secondary"
                @click="backToHome"
            >Voltar</button>
            <button 
                class="button button-primary"
                @click="tryCreateTask"
            >Criar</button>
        </div>
    </form>
</template>

<script>
import { mapActions, mapState } from 'vuex'
import auth from '@/mixins/auth'

export default {
    name: "Form",
    
    data() {
        return {
            createStatus: false,
            description: '',
            title: '',
            validate: true,
        }
    },
    created() {
        if(!auth.verifyAuth()) {
            this.$router.push('/')
        }    
    },
    
    computed: {
        ...mapState(['taskTypes']),
    },
    
    methods: {
        ...mapActions(['createTask']),
        
        backToHome() {
            this.$router.push('/home')
        },
        
        tryCreateTask() {            
            const task = {
                description: this.description,
                title: this.title,
                task_type_id: this.taskTypes[0].id
            }
            
            this.createTask(task)
            .then(() => {
                this.createStatus = true
                this.validade = true
            }).catch(() => {
                this.validate = false
            })
        }
    }
}
</script>

<style scoped>
.button {
    margin: 1%;
    width: 48%;
}
.create-fail {
    color: red;
}

.create-success {
    color: darkblue;
}
</style>