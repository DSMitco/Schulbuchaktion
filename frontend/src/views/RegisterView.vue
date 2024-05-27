<script setup>
import InputText from 'primevue/inputtext';
import Button from 'primevue/button';

const reg = () => {
    console.log("You clicked register")
};

</script>

<template>
  <div class="body">
    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <h1 class="headline">Registrierung - SBA</h1>
          <form @submit.prevent="register">
            <div class="form-group">
              <div class="input-wrapper">
                <InputText id="email" v-model="email" class="form-control" placeholder="E-Mail" />
              </div>
              <div class="input-wrapper">
                <InputText id="password" v-model="password" class="form-control" type="password" placeholder="Passwort" />
              </div>
              <div class="input-wrapper">
                <InputText id="passwordconfirm" v-model="passwordconfirm" class="form-control" type="password" placeholder="Passwort wiederholen" />
              </div>
              <div class="input-wrapper">
                <Button @click="reg" label="Registrieren" type="submit" class="btn btn-primary" />
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

</template>

<script>
import axios from 'axios';

export default {
  name: 'Register',
  data() {
    return {
      email: '',
      password: '',
      passwordconfirm: '',
    }
  },
  methods: {
    async register() {
      try {
        const response = await axios.post('http://localhost:80/authenticate/register', {
          email: this.email,
          password: this.password,
          passwordconfirm: this.passwordconfirm
        })
        console.log(response)
        this.$router.push('/login')
        console.log('Registered')
      } catch (error) {
        console.error('Registration failed ', error)
      }
    }
  }
}

</script>

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
</style>