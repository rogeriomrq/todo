<template>
    <div class="navbar">
        <div class="name">{{user.name}}</div>
        <div class="actions">
            <button 
                class="button button-secondary" 
                @click="redirectToCreate"
            >
                Criar
            </button>   
            <button 
                class="button button-danger"
                @click="logoutSystem"
            >
                Sair
            </button>
        </div>
    </div>
</template>

<script>
import { mapActions, mapState } from 'vuex'

export default {
    name: 'Nav',
    
    computed: {
        ...mapState(['user'])
    },
    
    methods: {
        ...mapActions(['logout']),
        
        logoutSystem() {
            this.logout()
            
            this.$router.push('/')
        },
        
        redirectToCreate() {
            this.$router.push('/create')
        }
    }
}
</script>

<style scoped>
.actions {
    display: flex;
    justify-content: space-between;
    width: 10%;
    margin-right: 10px;
}

.button {
    margin-right: 1%;
}

.name{
    margin-left: 2%;    
    color: white;
}

.navbar {
    overflow: hidden;
    background-color: cadetblue;
    position: fixed;
    top: 0;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 1%;
    padding-bottom: 1%;
    box-shadow: -2px 3px 9px 0px rgba(0,0,0,0.35);
    -webkit-box-shadow: -2px 3px 9px 0px rgba(0,0,0,0.35);
    -moz-box-shadow: -2px 3px 9px 0px rgba(0,0,0,0.35);
}
</style>