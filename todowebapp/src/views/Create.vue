<template>
    <section class="create-form">
        <Form />
    </section>
</template>

<script>
import Form from '@/components/create/Form'

export default {
    name: "Create",
    
    components: {
        Form
    }
}
</script>

<style scoped>
.create-form {
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>