<script setup>
import { ref } from 'vue';
import InputText from 'primevue/inputtext';
import Button from 'primevue/button';
import {RouterLink} from "vue-router";
import axios from "axios";
import { useRouter } from 'vue-router';

const email = ref('')
const password = ref('')
const router = useRouter()

const login = async () => {
  try {
    console.log(email.value, password.value)
    const response = await axios.post('http://localhost/authenticate/login', {
      email: email.value,
      password: password.value,
    });

    if (response.status === 200) {
      const token = response.data.token;
      localStorage.setItem('jwt', token);
      //await router.push({name: 'home'})
    }
  } catch (error) {
    console.error('Login failed', error.response ? error.response.data : error.message);
  }
};
</script>

<template>
  <div class="body">
    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <h1 class="headline">Login - SBA</h1>
          <form @submit.prevent="login">
            <div class="form-group">
              <div class="input-wrapper">
                <InputText id="email" v-model="email" class="form-control" placeholder="E-Mail" />
              </div>
              <div class="input-wrapper">
                <InputText id="password" v-model="password" class="form-control" type="password" placeholder="Passwort" />
              </div>
              <div class="input-wrapper">
                <Button @click="login" label="Login" type="submit" class="btn btn-primary" />
              </div>
              <router-link :to="{name: 'registerView'}" class="router-link ancReg">
                <Button label="register" class="btn"/>
              </router-link>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</template>

<style scoped>
@import 'primevue/resources/primevue.min.css';
@import 'primeicons/primeicons.css';
@import 'primevue/resources/themes/aura-dark-indigo/theme.css';

.body{
  background: #2A292E;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
.container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  margin-right: 10%;
}

.form-group {
  width: 150%;
  border: 5px solid #652EA8;
  border-radius: 5px;
  padding: 20px;
  background-color: #2a292e;
}

.input-wrapper {
  display: flex;
  align-items: center;
  margin-bottom: 10px;
  width: 100%;
}

.form-control, .btn-primary {
  flex-grow: 1;
  margin-left: 10px;
  width: 100%;
}

.btn-primary {
  display: flex;
  margin-top: 20px;
  background-color: #652EA8;
  color: white;
}

.input-wrapper:hover {
  border-color: #652EA8;
}

.headline {
  color: #652EA8;
  text-align: right;
  font-weight: bold;
}

.body{
  background: #ffffff;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

.book-icon {
  position: absolute;
  top: 0;
  left: 0;
  width: 50px;
  height: 50px;
}

.icon-book{
  width: 2rem;
  height: 2rem;
  margin-right: 1rem;
}
.menubar {
  background-color: #4C4A51;
}

.ancReg {
  display: flex;
  justify-content:center;
  text-decoration: none;
}

</style>