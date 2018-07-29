<template>
	<div class="modal_container">
		<h1 class="modal_title">{{ type | capitalize }}</h1>
		<ul v-show="hasError">
			<li v-for="message in errorMessage" :key="message.index">{{ message }}</li>
		</ul>
		<div class="modal_input">
			<input type="text" v-model="username" placeholder="Username">
		</div>
		<div class="modal_input" v-if="isRegister">
			<input type="email" v-model="email" placeholder="example@email.com">
		</div>
		<div class="modal_input">
			<input type="password" v-model="password" placeholder="Password">
		</div>
		<div class="modal_input" v-if="isRegister">
			<input type="password" v-model="password_conf" placeholder="Password Confirmation">
		</div>
		<div class="modal_button_group">
			<button class="btn" @click="clearField" @keyup.enter="">Cancel</button>
			<button class="btn isGreen"
					v-text="submitText"
					@click="submitForm">
			</button>
		</div>
	</div>
</template>
<script>
	export default {
		name: 'modal-container',
		props: {
			type: { required: true }
		},
		data() {
			return {
				username: '',
				email: '',
				password: '',
				password_conf: '',
				title: '',
				isRegister: false,
				submitText: 'Login',
				hasError: false,
				errorMessage: [],
			}
		},
		mounted(){
			this.title = this.type;
			if(this.type == 'register'){
				this.isRegister = true;
				this.submitText = 'Register';
			}
		},
		filters: {
			capitalize(value) {
				if(!value) return '';
				value = value.toString();
				return value.toUpperCase();
			}
		},
		methods: {
			clearField() {
				this.username = this.password = this.password_conf = '';
				this.$emit('modal-form');
			},
			validation() {
				this.errorMessage = [];
				const url = this.isRegister ? '/register' : '/login';
				if(this.isRegister){
					if(!this.username) this.errorMessage.push('Username can\'t be blank');
					if(!this.email) this.errorMessage.push('Email can\'t be blank');
					if(this.password !== this.password_conf) this.errorMessage.push('password doesn\'t match');
					if(!this.password && !this.password_conf) this.errorMessage.push('please enter password');
				}else{
					if(!this.username) this.errorMessage.push('please enter username');
					if(!this.password) this.errorMessage.push('please enter password');
				}
				this.hasError = (this.errorMessage.length > 0);
				return url;
			},
			submitForm() {
				const url = this.validation();
				if(this.hasError) return false;
				axios.post(url, {
					username: this.username,
					email: this.email,
					password: this.password,
				}).then(response => {
					console.log(response.data);
					if(!response.data.url){
						this.hasError = !this.hasError;
						this.errorMessage.push('Login Failed');
						return false;
					}
					window.location.href = response.data.url;
				}).catch(error => {
					console.log(error);
				});
			}
		}
	}
</script>
<style scoped lang="scss">
.modal{
	&_container{
		box-sizing: border-box;
		background-color: #fff;
		min-width: 400px;
		padding: 25px;
		box-shadow: 0px 0px 15px 1px #272727c9;
	}
	&_title{
		font-size: 1.5rem;
		margin-bottom: 15px;
	}
	&_input{
		&:not(:last-child){
			margin-bottom: 20px;
		}
		input{
			font-size: 1rem;
			padding: 10px;
			border: 1px solid #999;
			border-radius: 5px;
			box-sizing:border-box;
			width: 100%;
			box-shadow: inset 0px 0px 0px 0px #fff;
			transition: .5s;
			&:focus{
				outline: none;
				box-shadow: inset 0px 0px 5px 1px #7276f585;
			}
		}
	}
	&_button_group{
		button:first-child{
			margin-right: 20px;
		}
	}
}

</style>
