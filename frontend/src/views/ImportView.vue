<script setup>
import FileUpload from 'primevue/fileupload';
import Toast from 'primevue/toast';
import { useToast } from "primevue/usetoast";
const toast = useToast();

const onUpload = () => {
  toast.add({ severity: 'info', summary: 'Success', detail: 'File Uploaded', life: 3000 });
};

const uploadFile = async (event) => {
  const file = event.target.files[0];
  const formData = new FormData();
  formData.append('file', file);

  const response = await fetch('http://localhost:80/doRead', {
    method: 'POST',
    body: formData
  });

  const data = await response.text();
  console.log(data);
}
const onTest = () => async (event) => {

    const response = await fetch('http://localhost:80/test', {
      method: 'GET',
    });

    const data = await response.text();
    console.log(data);
  };



</script>

<template>
  <div class="card flex justify-content-center">
    <Toast />
    <!--<FileUpload mode="basic" name="demo[]" url="/api/upload" accept="image/*" :maxFileSize="1000000" @upload="onUpload" />-->
    <input type="file" @change="uploadFile" accept="*.xlsx*" />
  </div>
</template>

<script>

</script>
