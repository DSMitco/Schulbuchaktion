<script>
import { defineComponent, ref } from 'vue'
import axios from 'axios'

export default defineComponent({
  name: 'HelloWorld',
  setup() {
    const message = ref('')
    var mess1;

    const fetchMessage = async () => {
      try {
        const response = await axios.get('/api/hello')
        console.log(response.data.message);
        message.value = response.data.message

        mess1 = response.data.message
        console.log(mess1)

        console.log(message.value)
        console.log('In Fetch')
      } catch (error) {
        console.log(error)
      }
    }

    return {
      message,
      fetchMessage
    }
  }
})


</script>

<template>
  <p>Hello i am in Login</p>
  <div>

    <button @click="fetchMessage">Fetch Message</button>
  </div>
  <p>{{ message }}</p>
</template>

<style scoped>



</style>