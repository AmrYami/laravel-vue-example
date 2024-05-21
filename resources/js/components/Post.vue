<template>

    <div>
        <form>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Recipient:</label>
                <input type="text" class="form-control" id="recipient-name" v-model="post.title">
            <div v-if="errors.title">{{errors.title[0]}}</div>
            </div>
            <div class="form-group">
                <label for="message-text" class="col-form-label">Message:</label>
                <textarea class="form-control" id="message-text" v-model="post.body"></textarea>
                <div v-if="errors.body">{{errors.body[0]}}</div>
            </div>

            <button type="button" class="btn btn-primary" @click="createPost">Send message</button>
        </form>

        <div v-for="post in posts" :key="post.id">
            <h4>{{post.title}}</h4>
            <div>{{post.body}}</div>
        </div>

    </div>

</template>

<script>
export default {
    data() {
        return {
            post: {
                id: '',
                title: '',
                body: '',
            },
            errors: [],
            posts: []
        }
    },
    methods: {
        createPost() {
            axios.post('api/createpost', this.post).then(
                response => {
                    if (response.data.status == 'error'){
                        this.errors = response.data.errors;
                    }
                });
        },
        getPosts(){
            axios.get('api/posts').then(
                response => {
                    if (response.data.success){
                        this.posts = response.data.data;
                    }
                });
        }
    },
    created() {
        this.getPosts();
    }
}
</script>
