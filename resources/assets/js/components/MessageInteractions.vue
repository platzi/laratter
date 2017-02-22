<template>
    <div class="message-interactions">
        <a class="card-link text-danger" href="#" v-on:click="toggleLike">
            <span class="fa" v-bind:class="likeIcon"></span>
        </a>
        <a class="card-link" v-bind:class="repostIcon" href="#" v-on:click="toggleRepost">
            <span class="fa fa-retweet"></span>
        </a>
    </div>
</template>

<script>
export default {
    props: ['message', 'liked', 'reposted'],
    data: function () {
        return {
            isLiked: this.liked,
            isReposted: this.reposted
        };
    },
    computed: {
        likeIcon: function () {
            return this.isLiked ? 'fa-heart' : 'fa-heart-o'
        },
        repostIcon: function () {
            return this.isReposted ? 'text-success' : 'text-primary'
        },
    },
    methods: {
        toggleLike: function (ev) {
            ev.preventDefault();
            axios.post('/messages/' + this.message + '/like').then(({data}) => {
                this.isLiked = data.liked;
            });
        },
        toggleRepost: function (ev) {
            ev.preventDefault();
            axios.post('/messages/' + this.message + '/repost').then(({data}) => {
                this.isReposted = data.reposted;
            });
        }
    }
}
</script>