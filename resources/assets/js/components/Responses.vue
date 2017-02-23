<template>
    <div class="responses">
        <div v-for="response in responses" class="card mt-2">
            <div class="card-header">
                <a :href="'/' + response.user.username">{{ response.user.name }}</a> dice...
            </div>
            <div class="card-block">
                {{ response.content }}
            </div>
            <div class="card-footer">
                <div class="card-text text-muted float-right">
                    {{ response.created_at }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['message'],
    data() {
        return {
            responses: []
        }
    },
    mounted() {
        axios.get('/messages/' + this.message + '/responses')
            .then(response => {
                this.responses = response.data;
            });
    }
}
</script>