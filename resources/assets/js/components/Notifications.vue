<template>
    <div v-if="notifications.length > 0" class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
            <span class="fa fa-bell-o"></span> <span class="badge badge-danger">{{ notifications.length }}</span>
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item" v-for="notification in notifications" :href="link(notification)">
                <img style="max-height: 2rem;" :src="notification.data.message.image">
                {{ format(notification) }}
            </a>
        </div>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            user_id: null,
            notifications: [],
        }
    },
    methods: {
        format: notification => {
            switch (notification.type) {
                case 'App\\Notifications\\MessageLiked':
                    return 'A @' + notification.data.user.username + ' le ha gustado tu mensaje!';
                case 'App\\Notifications\\MessageReposted':
                    return '@' + notification.data.user.username + ' a reposteado tu mensaje!';
            }
        },
        link: notification => {
            switch (notification.type) {
                case 'App\\Notifications\\MessageLiked':
                    return '/messages/' + notification.data.message.id;
                case 'App\\Notifications\\MessageReposted':
                    return '/messages/' + notification.data.repost.id;
            }
        }
    },
    mounted() {
        axios.get('/notifications')
            .then(({ data }) => {

                this.notifications = data.notifications;
                this.user_id = data.user_id;

                Echo.private(`App.User.${this.user_id}`)
                    .notification(notification => {
                        this.notifications.unshift(notification);
                    });
            });
    }
}
</script>