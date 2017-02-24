<template>
	<div class="dropdown-menu">
		<a :href="'/' + notification.data.follower.username" class="dropdown-item" v-for="notification in notifications">
			@{{ notification.data.follower.username }} te ha seguido!
		</a>
	</div>
</template>

<script>
export default {
	data() {
		return {
			notifications: []
		}
	},
	mounted() {
		axios.get('/api/notifications')
			.then(response => {
				this.notifications = response.data;
			});
	}
}
</script>