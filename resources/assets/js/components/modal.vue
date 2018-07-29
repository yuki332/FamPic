<template>
	<div class="modal" @click="modal()">
		<slot></slot>
	</div>
</template>

<script>
export default{
	name: 'modal',
	methods: {
		modal() {
			window.onclick = e => {
				if(e.target.className == 'modal'){
					this.$emit('modal-form');
				}
			}
		}
	}
}
</script>
<style scoped lang="scss">
.modal{
	height: 100vh;
	width: 100vw;
	background-color: rgba(0, 0, 0, 0.4);
	position: fixed;
	z-index: 1;
	display: flex;
	justify-content: center;
	align-items: center;
}

</style>
